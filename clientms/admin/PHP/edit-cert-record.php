<?php 
    $curr ="Update Certificate Record";
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
      header('location:logout.php');
      } else{
        $eid=intval($_GET['editid']);
        $time = new DateTime("now", new DateTimeZone('Asia/Manila'));
        $mail = new PHPMailer(true);

        $sql= "select tblcreatecertificate.ID as cid, tblresident.ID as residd, tblresident.*, tblcreatecertificate.*, tblcertificate.* from tblcreatecertificate join tblresident on tblresident.ID = tblcreatecertificate.Userid join tblcertificate on tblcreatecertificate.CertificateId = tblcertificate.ID WHERE tblcreatecertificate.ID = :eid";
        $query = $dbh ->prepare($sql);
        $query->bindParam(':eid',$eid,PDO::PARAM_STR);
        $query ->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        foreach ($result as $r){
            $residd = $r->residd;
            $cname = $r->CertificateName;
        }
        function itexmo($number,$message,$apicode,$passwd){
            $ch = curl_init();
            $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
            curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
            curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, 
                        http_build_query($itexmo));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            return curl_exec ($ch);
            curl_close ($ch);
        }

        if(isset($_POST['submit']))
        {
            
            $clientmsaid=$_SESSION['clientmsaid'];
            $status=$_POST['status'];
            if ($_POST['pmod']=="Cash"){
                $sql = "Update tblcreatecertificate set status =".$_POST['status']." where ID = ".$eid."";
                if ($con->query($sql)===TRUE){
                    echo '<script>alert("Certificate Record and payment log has been updated")</script>';
                }
            }
            else{
            if ($status=="4"){
                
                $paid = $_POST['paid'];
                $cpayable  =$_POST['cpayable'];
                $time = new DateTime("now", new DateTimeZone('Asia/Manila'));
                $now= $time->format("Y-m-d h:i");

                if ($paid > $cpayable){

                    $diff = $paid - $cpayable;
                    $sql="update tblcreatecertificate set status=:status WHERE ID=:eid";
                    $query=$dbh->prepare($sql);
                    $query->bindParam(':status',$status,PDO::PARAM_STR);
                    $query->bindParam(':eid',$eid,PDO::PARAM_STR);
                    $query->execute();


                    $payup = "update tblpaymentlogs set 
                        dateAccepted = '".$now."',
                        refNum = ".$_POST['refNum'].",
                        payment = ".$paid."
                        where creationID = ".$eid."
                        ";

                    if ($con->query($payup)===TRUE){
                        echo '<script>alert("Certificate Record and payment log has been updated")</script>';
                        echo "<script>window.location.href ='payment-verification-cert.php?editid=".$eid."&diff=".$diff."&type=1'</script>";
                    }
                  
                }
                else if ($paid<$cpayable){

                    $diff = $cpayable - $paid;
                    $sql="update tblcreatecertificate set status=:status WHERE ID=:eid";
                    $query=$dbh->prepare($sql);
                    $query->bindParam(':status',$status,PDO::PARAM_STR);
                    $query->bindParam(':eid',$eid,PDO::PARAM_STR);
                    $query->execute();

                    $payup = "update tblpaymentlogs set 
                        dateAccepted = '".$now."',
                        refNum = ".$_POST['refNum'].",
                        payment = ".$paid."

                        where creationID = ".$eid."
                        ";

                    if ($con->query($payup)===TRUE){
                        echo '<script>alert("Certificate Record and payment log has been updated")</script>';
                        echo "<script>window.location.href ='payment-verification-cert.php?editid=".$eid."&diff=".$diff."&type=2'</script>";
                    }
                }
                else if($paid==$cpayable){
                    $diff = $cpayable - $paid;
                    $sql="update tblcreatecertificate set status=:status WHERE ID=:eid";
                    $query=$dbh->prepare($sql);
                    $query->bindParam(':status',$status,PDO::PARAM_STR);
                    $query->bindParam(':eid',$eid,PDO::PARAM_STR);
                    $query->execute();

                    $payup = "update tblpaymentlogs set 
                        dateAccepted = '".$now."',
                        refNum = ".$_POST['refNum'].",
                        payment = ".$paid."

                        where creationID = ".$eid."
                        ";

                    if ($con->query($payup)===TRUE){
                        echo '<script>alert("Certificate Record and payment log has been updated")</script>';
                        echo "<script>window.location.href ='payment-verification-cert.php?editid=".$eid."&diff=".$diff."'</script>";
                    }
                }

            }
            else{

                $sql = "SELECT * from tblcredits";
                $query=$dbh->prepare($sql);
                $query->execute();
                $result1=$query->fetchAll(PDO::FETCH_OBJ);
                foreach ($result1 as $row1) {
                    $api=$row1->ApiCode;
                    $passwd=$row1->ApiPassword;
                }
        
                
                $today = date('Y-m-d');
                $sdates = date('F j, Y - h:i A', strtotime($today));
                $text = "From Barangay 599 V. Mapa\n\nYour request for ".$cname." is ready for pick-up.\n\n This is a system-generated message. Please do not reply.";
        
                $sql = "SELECT * from tblresident WHERE Cellphnumber IS NOT NULL AND ID = :residd";
                $query=$dbh->prepare($sql);
                $query->bindParam(':residd', $residd, PDO::PARAM_STR);
                $query->execute();
                $result1=$query->fetchAll(PDO::FETCH_OBJ);
                foreach ($result1 as $row1) {
                    $number = $row1->Cellphnumber;
                    $result = itexmo($number, $text, $api, $passwd);
                    if ($result == "") {
                    echo "iTexMo: No response from server!!!
                Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
                Please CONTACT US for help. ";
                    } else if ($result == 0) {
                        
                    } else {
                    echo "Error Num " . $result . " was encountered!";
                    }
                }
        
                $sql ="Select tbladmin.*, tblresident.*, tblpositions.* from tblresident join tbladmin on tbladmin.residentID = tblresident.ID join tblpositions on tblpositions.ID = tbladmin.BarangayPosition where tbladmin.ID = :aid";
            $query = $dbh -> prepare($sql);
            $query->bindParam(':aid',$aid,PDO::PARAM_STR);
            $query->execute();
            foreach($results as $row)
            {$getpos = "$row->Position $row->LastName";}
        
            try {
                //Server settings
                                     //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'ebarangay599@gmail.com';                     //SMTP username
                $mail->Password   = '599-E-Barangay';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                $mail->setFrom('ebarangay599@gmail.com', $getpos);
        
                $sqle = "SELECT * from tblresident WHERE ID = :residd";
                $querye=$dbh->prepare($sqle);
                $querye->bindParam(':residd',$residd,PDO::PARAM_STR);
                $querye->execute();
                $resulte=$querye->fetchAll(PDO::FETCH_OBJ);
                foreach ($resulte as $rowe) {
                    $mid = $rowe->MiddleName;
                    $emails = $rowe->Email;
                    $mail->addAddress("$emails");
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Notification from Barangay 599 V. Mapa';
                    $mail->Body    = '<div class="">
                    <div class="aHl">
                
                    </div>
                    <div id=":2g8" tabindex="-1">
                
                    </div>
                    <div id=":2fx" class="ii gt" jslog="20277; u014N:xr6bB; 4:W251bGwsbnVsbCxbXV0.">
                        <div id=":2fw" class="a3s aiL msg-3877720715821999831"><u></u>
                <div style="color:#565a5c;background-color:#f2f5f6;margin:0px 0px 0px 0px">
                  <div style="color:#565a5c;font-family:&quot;Helvetica Neue&quot;,&quot;Helvetica&quot;,Helvetica,Arial,sans-serif;font-size:16px;border-collapse:collapse;max-width:800px;margin:0px auto;padding-top:25px;padding-left:25px;padding-right:25px">
                    <div>
                  <div>
                    <div id="m_-3877720715821999831header-wrapper" style="margin-bottom:16px">
                      <div>
                        <a href="https://barangay599.com/" style="text-decoration:none;outline:none" target="_blank" data-saferedirecturl="https://barangay599.com/">
                          <img style="width:120px;height:100px" src="https://scontent-sin6-2.xx.fbcdn.net/v/t1.15752-9/255421087_257470519597544_8116769992785817332_n.png?_nc_cat=105&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeHWhijsWVAHOygPG_m3voCBmxZz3dIYsgabFnPd0hiyBp9aH3-I_IUogzCpXWiHWsvjj7BGhoUj3j6LW5c0qklh&_nc_ohc=JDSRMi83fA4AX_33U-M&tn=cYgfj995MRwIySit&_nc_ht=scontent-sin6-2.xx&oh=5b77bbab7229a3a6cf8935f99c8ef96f&oe=61BCECF6" class="CToWUd">
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                    <div id="m_-3877720715821999831body-wrapper">
                      <div style="background-color:#ffffff;padding-top:1px">
                        <div class="m_-3877720715821999831content">
                          
                          <div style="margin:0;padding:0">
                            <div style="margin:0;padding:0;margin-top:1em">
                              Hi <b>'.ucfirst($rowe->FirstName)." ".ucfirst($mid[0]).". ".ucfirst($rowe->LastName)." ".ucfirst($rowe->Suffix).'</b>,
                            </div>
                
                            <div style="margin:0;padding:0;margin-top:1em">
                            Your request for '.$cname.' is ready for pick-up.
                            </div>
                
                            <div style="margin:0;padding:0;margin-top:1em">
                              
                            </div>
                
                            <div style="margin:0;padding:0;margin-top:1em">
                              <p>Please do not reply to this message. This is a system-generated email sent to <span>[<a href="mailto:'.$emails.'" target="_blank">'.$emails.'</a>]</span>.</p>
                              <p>Thank you !</p>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <div>
                  <div>
                  <div id="m_-3877720715821999831footer-wrapper">
                    <div align="center">
                      <table style="padding-top:30px;padding-bottom:30px;padding-left:30px;padding-right:30px;font-size:13px">
                        <tbody>
                        <tr>
                          <td style="text-align:center">
                            <div style="margin-top:20px">
                              <p style="text-decoration:none;outline:none;color:#9b9b9b;text-align:center">This is an electronic information from Barangay 599 Online System</p>
                            </div>
                          </td>
                        </tr>
                        </tbody>
                      </table><div class="yj6qo"></div><div class="adL">
                    </div></div><div class="adL">
                  </div></div><div class="adL">
                
                  </div></div><div class="adL">
                
                </div></div><div class="adL">
                
                  </div></div><div class="adL">
                
                </div></div><div class="adL">
                
                
                </div></div></div><div id=":2gc" class="ii gt" style="display:none"><div id=":2gd" class="a3s aiL "></div></div><div class="hi"></div></div>
                ';
                    $mail->AltBody = 'Barangay 599 V. Mapa';
                
                    $mail->send();
                    
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }


                
                $sql="update tblcreatecertificate set status=:status WHERE ID=:eid";
                $query=$dbh->prepare($sql);
                $query->bindParam(':status',$status,PDO::PARAM_STR);
                $query->bindParam(':eid',$eid,PDO::PARAM_STR);
                $query->execute();
                echo '<script>alert("Certificate Record has been updated")</script>';
                echo "<script>window.location.href ='payment-verification-cert.php?editid=".$eid."</script>";
            }
        }

        }
        if(isset($_POST['delete']))
        {
            $decr= $_POST['decr'];
        
            if (isset($_POST['spcr'])){
                $decr =$_POST['spcr'];
            }else{
                $decr =$_POST['decr'];
        
            
            $insert = "Update tblcreatecertificate set decreason = '".$decr."', remarks = '".$_POST['rmrks']."' where ID = ".$eid."";
            
          
            $eid=intval($_GET['editid']);
            $clientmsaid=$_SESSION['clientmsaid'];
            $status="8";
        
            $sql="update tblcreatecertificate set status=:status WHERE ID=:eid";
            $query=$dbh->prepare($sql);
            $query->bindParam(':status',$status,PDO::PARAM_STR);
            $query->bindParam(':eid',$eid,PDO::PARAM_STR);
            $query->execute();
            

            if($con->query($insert)===TRUE){

            }
            echo '<script>alert("Certificate Record '.$decr." ".$_POST['rmrks'].' has been updated")</script>';
            echo "<script>window.location.href ='admin-certificate.php'</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curr;?></title>
   
    <?php include ('link.php')?>

	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
    
        
        td{
            vertical-align: middle;
     
        }
        .btng{
            width: 50px;
        }
        .black{
          color: black;
        }
        .btnx{
          width: 150px;
        }

        #frame { 
          width: 850px; 
          height: 650px; 
          border: 1px solid black; 
        }
        #frame { 
          zoom: -100%;
          -webkit-transform:scale(0.76);
        
          -ms-transform: scale(0.75);
          -moz-transform: scale(0.75);
          -o-transform: scale(0.75);
          -webkit-transform: scale(0.75);
          transform: scale(0.75);

          -ms-transform-origin: 0 0;
          -moz-transform-origin: 0 0;
          -o-transform-origin: 0 0;
          -webkit-transform-origin: 0 0;
          transform-origin: 0 0;
        }
        

        @media screen and (-webkit-min-device-pixel-ratio:0) {
          #scaled-frame {
            zoom: 1;
          }
        }

        @media (max-width: 576px){
            .btnx{
              margin-bottom: 10px;
            }
          
            .row {
                overflow-x: auto;
            }
            .dis{
                font-size: 15px;
            }
            .ser{
                width: 100%;
            }
            .sepa{
              overflow-x: auto;
            }
           
           
        }
        .red{
            background:#8B0000;
            border: 1px solid #8B0000;
        }
        .white{
            color: white;
        }
    


            .sidebar li .submenu{ 
                list-style: none; 
                margin: 0; 
                padding: 0; 
                padding-left: 1rem; 
                padding-right: 1rem;
            }

          
                
    </style>
</head>
<body>
    <?php 
        include ('../includes/sidebar.php');
    ?> 
     <!--breadcrumb-->
     <div class="d-flex align-items-center">
                <div class="container  mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a  class= "text-decoration-none" data-bs-toggle="modal" href="#service-choice"><i class="fa fa-hand-paper"></i>&nbsp;Services</a></li>
                                <li class="breadcrumb-item"><a  class= "text-decoration-none" href="admin-certificate.php"><i class="fa fa-file"></i>&nbsp;Certificates</a></li>
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-list text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12"> 
                <a href="admin-certificate.php" class = "btn btnx float-end btn-secondary mb-1"><i class= "fas fa-sign-out-alt me-2"></i>Cancel</a>           
            </div>
        </div>
    </div>

    <form method ="POST">
        <?php
            $eid=intval($_GET['editid']);
            $sqle="SELECT tblcertificate.*, tblcreatecertificate.*, tblcreatecertificate.resDate as getDate, tblresident.*, tblstatus.*, tblpurposes.* FROM tblcertificate join tblcreatecertificate on tblcreatecertificate.CertificateId = tblcertificate.ID join tblresident on tblcreatecertificate.Userid = tblresident.ID join tblstatus on tblstatus.ID = tblcreatecertificate.status join tblpurposes on tblpurposes.ID = tblcreatecertificate.purpID WHERE tblcreatecertificate.ID = :eid";
            $querye = $dbh -> prepare($sqle);
            $querye->bindParam(':eid',$eid,PDO::PARAM_STR);
            $querye->execute();
            $resulte = $querye->fetchAll(PDO::FETCH_OBJ);

            foreach ($resulte as $rowe) {
                $checkstat = $rowe->status;
                $gdate = $rowe->resDate;
                $cdate = date('F j, Y - h:i A', strtotime($gdate));
                    
        ?>
            <div class="container-fluid px-5 mb-5">
                <div class="row">
                    <div class="col-xl-12">
                        
                        <ul class="nav  nav-pills justify-content-center">
                           
                            <li class="nav-item">
                                <a class="nav-link active fs-5" href="#edit-cert" data-bs-toggle = "tab">Manage Certification </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-5" href="#preview" data-bs-toggle = "tab">Preview</a>
                            </li>
                        </ul>   
                    </div>
                    <div class="col-xl-12">
                        <div class="tab-content">
                        <div class="tab-pane fade show" id="preview">    		
                            <div class="container my-3">
                                <div class="row g-0 ">
                                    <div class="col-xl-8  shadow-sm mx-auto  ">
                                        <div class="row  text-white bg-599 g-0 justify-content-center">
                                            <div class="col-12">
                                                <div class="display-6 border-start border-end border-bottom text-center">Certificate Template</div>
                                            </div>

                                        </div>
                            
                                
                                        <div class="row border-start border-end border-bottom py-3 g-0 justify-content-center">
                                            <div class="col-10 mx-auto">
                                                <div class="embed-responsive mx-auto embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" id = "frame" src="view-cert.php?viewid=<?php echo $eid;?>"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                         <div class="tab-pane fade show active" id="edit-cert">
                                <div class="container-fluid mb-3 ms-1 mx-auto px-5">
                                    <div class="row mx-1  py-2 ">
                                        <div class="col-xl-12 mx-auto  rounded-top white">
                                            <div class="row ">
                                                <div class="fs-4 text-center mt-3"  style= "background: #012f6e">
                                                Certificate Information
                                            </div>
                                        </div>
                                    <div class="row  border shadow-sm bg-white pt-2 pb-5 mb-3">
                                       
                                        <div class="row g-2 px-5">
                                            <div class="col-xl-8">
                                                <label for="cname" class= "black fw-bold fs-5">Requestor Name</label>
                                                <input id = "cname" class ="form-control"type="text" placeholder = "Requestor Name" name= "cnrame" disabled value="<?php echo "$rowe->FirstName $rowe->MiddleName $rowe->LastName $rowe->Suffix";?>">
                                            </div>
                                            <div class="col-xl-4">
                                            <label for="cname" class= "black fw-bold fs-5">Status</label>
                                            
                                                <?php 

                                                    $check = $rowe->status;
                                                    $cheme = $rowe->statusName;
                                                    $mcheck = $rowe->pMode;
                                                if ($mcheck=="G-Cash"){

                                                   

                                                    
                                                    if ($check == "6" || $check == "7" || $check == "2" || $check == "8"){
                                                        echo '<select id = "status" class ="form-select" name= "status" disabled><option value="'.$check.'" selected>'.$cheme.'</option>
                                                        ';
                                                    
                                                    }else if ($check == "3"){
                                                        echo '<select id = "status" class ="form-select" name= "status">';
                                                        $sqlst="SELECT * from tblstatus WHERE ID ='3' or ID ='4' or ID='7'";
                                                        $queryst=$dbh->prepare($sqlst);
                                                        $queryst->execute();
                                                        $resultst=$queryst->fetchAll(PDO::FETCH_OBJ);
                                                        foreach($resultst as $rowst){
                                                            echo '<option value="'.$rowst->ID.'">'.$rowst->statusName.'</option>
                                                           ';
                                                        }
                                                    
                                                    }else if ($check == "5"){
                                                        echo '<select id = "status" class ="form-select" name= "status">';
                                                        $sqlst="SELECT * from tblstatus WHERE ID = '5' or ID ='6'";
                                                        $queryst=$dbh->prepare($sqlst);
                                                        $queryst->execute();
                                                        $resultst=$queryst->fetchAll(PDO::FETCH_OBJ);
                                                        foreach($resultst as $rowst){
                                                            echo '<option value="'.$rowst->ID.'">'.$rowst->statusName.'</option>
                                                            ';
                                                        }
                                                    }
                                                    else if ($check == "4"){
                                                        echo '<select id = "status" class ="form-select" name= "status">';
                                                        $sqlst="SELECT * from tblstatus WHERE ID = '4' or ID ='5'";
                                                        $queryst=$dbh->prepare($sqlst);
                                                        $queryst->execute();
                                                        $resultst=$queryst->fetchAll(PDO::FETCH_OBJ);
                                                        foreach($resultst as $rowst){
                                                            echo '<option value="'.$rowst->ID.'">'.$rowst->statusName.'</option>
                                                            ';
                                                        }
                                                    }
                                                }
                                                else{
                                                    if ($check=="2"){
                                                        echo '<select id = "status" class ="form-select" name= "status">';
                                                        $sqlst="SELECT * from tblstatus WHERE ID ='3' or ID ='4' or ID='7'";
                                                        $queryst=$dbh->prepare($sqlst);
                                                        $queryst->execute();
                                                        $resultst=$queryst->fetchAll(PDO::FETCH_OBJ);
                                                        foreach($resultst as $rowst){
                                                            foreach($resultst as $rowst){
                                                               
                                                                if ($rowst->ID== $rowe->status){
                                                                    echo '<option selected value = "'.$rowst->ID.'">'.$rowst->statusName.'</option>';
    
                                                                }
                                                                else{
                                                                echo '<option value="'.$rowst->ID.'">'.$rowst->statusName.'</option>
                                                               ';
                                                                }   
                                                            }
                                                        }
                                                    
                                                    
                                                    }else if ($check == "3" || $check == "7"){
                                                        echo '<select id = "status" class ="form-select" name= "status">';
                                                        $sqlst="SELECT * from tblstatus WHERE ID ='3' or ID ='4' or ID='7'";
                                                        $queryst=$dbh->prepare($sqlst);
                                                        $queryst->execute();
                                                        $resultst=$queryst->fetchAll(PDO::FETCH_OBJ);
                                                        foreach($resultst as $rowst){
                                                           
                                                                if ($rowst->ID== $rowe->status){
                                                                    echo '<option selected value = "'.$rowst->ID.'">'.$rowst->statusName.'</option>';
    
                                                                }
                                                                else{
                                                                echo '<option value="'.$rowst->ID.'">'.$rowst->statusName.'</option>
                                                               ';
                                                                }
                                                            
                                                        }
                                                    
                                                    }else if ($check == "5"){
                                                        echo '<select id = "status" class ="form-select" name= "status">';
                                                        $sqlst="SELECT * from tblstatus WHERE ID = '5' or ID ='6'";
                                                        $queryst=$dbh->prepare($sqlst);
                                                        $queryst->execute();
                                                        $resultst=$queryst->fetchAll(PDO::FETCH_OBJ);
                                                        foreach($resultst as $rowst){
                                                            
                                                                if ($rowst->ID== $rowe->status){
                                                                    echo '<option selected value = "'.$rowst->ID.'">'.$rowst->statusName.'</option>';
    
                                                                }
                                                                else{
                                                                echo '<option value="'.$rowst->ID.'">'.$rowst->statusName.'</option>
                                                               ';
                                                                }
                                                            
                                                        }
                                                    }
                                                    else if ($check == "4"){
                                                        echo '<select id = "status" class ="form-select" name= "status">';
                                                        $sqlst="SELECT * from tblstatus WHERE ID = '4' or ID ='5'";
                                                        $queryst=$dbh->prepare($sqlst);
                                                        $queryst->execute();
                                                        $resultst=$queryst->fetchAll(PDO::FETCH_OBJ);
                                                        foreach($resultst as $rowst){
                                                            
                                                            if ($rowst->ID== $rowe->status){
                                                                echo '<option selected value = "'.$rowst->ID.'">'.$rowst->statusName.'</option>';

                                                            }
                                                            else{
                                                            echo '<option value="'.$rowst->ID.'">'.$rowst->statusName.'</option>
                                                           ';
                                                            }
                                                        }
                                                    }
                                                    else if ($check == "6"){
                                                        echo '<select disabled id = "status" class ="form-select" name= "status">';
                                                        $sqlst="SELECT * from tblstatus WHERE ID = '5' or ID ='6'";
                                                        $queryst=$dbh->prepare($sqlst);
                                                        $queryst->execute();
                                                        $resultst=$queryst->fetchAll(PDO::FETCH_OBJ);
                                                        foreach($resultst as $rowst){
                                                            if ($rowst->ID== $rowe->status){
                                                                echo '<option selected value = "'.$rowst->ID.'">'.$rowst->statusName.'</option>';

                                                            }
                                                            else{
                                                            echo '<option value="'.$rowst->ID.'">'.$rowst->statusName.'</option>
                                                           ';
                                                            }
                                                        }
                                                    }
                                                  

                                                }
                                                ?>
                                                </select>
                                            </div>
                                         
                                        </div>
                                        <div class="row g-2 px-5">
                                            <div class="col-xl-6">
                                                <label for="purp" class= "black fw-bold fs-5">Type of Certification</label>
                                                <select id = "purp" class ="form-select" name= "cmeth" disabled>
                                                    <option value="<?php echo "$rowe->CertificateName";?>" selected><?php echo "$rowe->CertificateName";?></option>                                                
                                                </select>

                                            </div>
                                            <div class="col-xl-3">
                                                <label for="cname" class= "black fw-bold fs-5">Certification fee</label>
                                                <input style = "text-align: right;" id = "cname" class ="form-control" type="text" placeholder = "Certfication fee" name= "cname" value="<?php echo "$rowe->CertificatePrice";?>" disabled>

                                            </div>
                                            <div class="col-xl-3">
                                                <label for="cname" class= "black fw-bold fs-5">Mode of Payment</label>
                                                <input type ="text" class= "form-control" name = "pmod"  value="<?php echo "$rowe->pMode";?>" id="" readonly>                                              
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row g-2 px-5">
                                            <div class="col-xl-6">
                                                <label for="purp" class= "black fw-bold fs-5">Purpose</label>
                                                <select id = "purp" class ="form-select" name= "cmeth" disabled>
                                                <?php $checkpurp = $rowe->Purpose;
                                                        if ($checkpurp =="OTHERS"){
                                                            $checkpurp = $rowe->other;
                                                            $checkpurp = strtoupper($checkpurp);
                                                        }
                                                ?>
                                                    <option value="<?php echo "$checkpurp";?>" selected><?php echo "$checkpurp";?></option>
                                                </select>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="cname" class= "black fw-bold fs-5">Date</label>
                                                <input id = "cdate" class ="form-control" type="text" placeholder = "Date of certification" name= "cdate" value="<?php echo $cdate;?>" disabled>
                                            </div>
                                        
                                            <div class="col-xl-6" style= "display: none">
                                                <label for="cname" class= "black fw-bold fs-5">Business name <span class= "text-muted fs-6">( For business related only )</span></label>
                                                <input id = "cname" class ="form-control" type="text" placeholder = "business name here" name= "cname" value="<?php echo $rowe->bName?>" disabled>

                                            </div>
                                   
                                        </div>
                                        <?php 

                                    if ($mcheck=="Cash"){
                                            if ($checkstat =="5" ||$checkstat=="6"){
                                                echo '
                                                <div class="row">
                                                <div class="col-12">
                                                <div class="float-end">
                                                <div class="btn-group">   
                                                <a type="" href ="view-cert-temp.php?viewid='.$eid.'"class="btn btn-success"><i class = "fa fa-print mx-1"></i><span class="wal">Print</span></a>                            
                                                </div> <div class="btn-group"> <button type = "sbumit" href = "#save-cert" name="submit" id="submit" class= "btn btn-primary"  my-2"><i class= "fas fa-save me-2"></i>Save</button></div>
                                                <div class="btn-group">                               
                                                <button type="delete" name="delete" id="delete" class="btn btn-danger"><i class = "fa fa-trash mx-1"></i><span class="wal">Reject</span></button>
                                                </div>
                                                </div>
                                                </div>';
                                            }else{
                                                echo '
                                                <div class="row">
                                                <div class="col-12">
                                                <div class="float-end">
                                                <div class="btn-group">                               
                                                </div> <div class="btn-group"> <button type = "sbumit" href = "#save-cert" name="submit" id="submit" class = "btn  btn-primary  my-2"><i class= "fas fa-save me-2"></i>Save</button></div>
                                                <div class="btn-group">                               
                                                <button type="button" data-bs-toggle ="modal" href= "#decline-proof"class="btn btn-danger"><i class = "fa fa-trash mx-1"></i><span class="wal">Reject</span></button>
                                                </div>
                                                </div>
                                                </div>';
                                            }
                                        
                                    }
                                    else{

                                    if ($checkstat == "3"){
                                        
                                        $sql ="select * from tblpaymentlogs where creationID = ".$_GET['editid']." and servicetype= 2";
                                        $query= $dbh->prepare($sql);
                                        $query->execute();
                                        $result = $query->fetchAll(PDO::FETCH_OBJ);
                                        foreach($result as $i){
                                            $cdate = date('F j, Y - h:i A', strtotime($i->paymentDate));
                                            echo'
                                            <div class="row gx-4 gy-3 px-5">
                                                <p class="fs-4 text-primary">Payment Verification</p>
                                                <div class="col-xl-6 border ">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <a target = "_blank" href = "'.$i->proof.'"><img src="'.$i->proof.'" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                        <div class="row g-2">
                                                       
                                                        <table>';
                                                        $select = "Select * from tblpaymentlogs where creationID = ".$eid."servicetype=1";
                                                        $query = $dbh->prepare($sql);
                                                        $query ->execute();
                                                        $plog = $query->fetchAll(PDO::FETCH_OBJ);
                                                        foreach($plog as $i){

                                                        
                                                        echo'
                                                            
                                                                    <table>
                                                                      <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="refnum" class="fs-5 text-primary pe-2">Date Submitted: </label> </td>  
                                                                        <td>
                                                                        <div class="fs-5 text-secondary"> '.$cdate.'</div>
                                                                        </td>
                                                                        </div>
                                                                    </tr>
                                                                      <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="refnum" class="fs-5 text-primary pe-2">Reference Number:</label> </td>  
                                                                        <td>
                                                                        <div class="col-10 py-2">         
                                                                        <input type="text" name = "refNum" id = "refnum" class="form-control" value = '.$i->refNum.' required>
                                                                        </td>
                                                                        </div>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="paid" class="fs-5 text-primary pe-2">Amount Paid:</label> </td>  
                                                                        <td>
                                                                        <div class="col-8 py-2">   
                                                                        <div class="input-group">
                                                                        <button class="btn btn-secondary disabled">₱</button>      
                                                                        <input style= "text-align:right" type=decimal name = "paid" id = "paid" value = '.$i->payment.' class="form-control" required>
                                                                        </div>
                                                                        </td>
                                                                    </div>
                                                                    <tr>
                                                                    <td><div class="input-group py-1">
                                                                    <label for="payable" style = "text-align:right" class="fs-5 text-primary pe-2">Amount to Pay :</label></td>   
                                                                    <td>
                                                                    <div class="col-8 py-2">         
                                                                    <div class="input-group">
                                                                    <button class="btn btn-secondary disabled">₱</button>
                                                                    <input type=decimal name = "cpayable" id = "topay" value = '.$rowe->CertificatePrice.' style = "text-align:right" class="form-control" readonly>
                                                                    </div>
                                                                    </td>
                                                                    </div>    
                                                                    </div>
                                                                    </tr>
                                                                    </table>
                                                                    </div>

                                                        </div>
                                                    
                                                    </div>
                                                </div>

                                            </div>';
                                                          
                                                        }
                                        }
                                    }
                                    else if ($checkstat=="5" || $checkstat=="6"){
                                        $sql ="select * from tblpaymentlogs where creationID = ".$_GET['editid']." and servicetype = 2";
                                        $query= $dbh->prepare($sql);
                                        $query->execute();
                                        $result = $query->fetchAll(PDO::FETCH_OBJ);
                                        foreach($result as $i){
                                            $cdate = date('F j, Y - h:i A', strtotime($i->paymentDate));
                                            $adate = date('F j, Y - h:i A', strtotime($i->dateAccepted));
                                            echo'
                                            <div class="row gx-4 gy-3 px-5">
                                                <p class="fs-4 text-primary">Payment Verification</p>
                                                <div class="col-xl-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <a target = "_blank" href = "'.$i->proof.'"><img src="'.$i->proof.'" alt="" class="img-fluid"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                        <div class="row g-2">
                                                       
                                                        <table>';
                                                        $select = "Select * from tblpaymentlogs where creationID = ".$eid."";
                                                        $query = $dbh->prepare($sql);
                                                        $query ->execute();
                                                        $plog = $query->fetchAll(PDO::FETCH_OBJ);

                                                        foreach($plog as $i){

                                                        
                                                        echo'
                                                            
                                                                    <table>
                                                                      <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="refnum" class="fs-5 text-primary pe-2">Date Submitted: </label> </td>  
                                                                        <td>
                                                                        <div class="fs-5 text-secondary"> '.$cdate.'</div>
                                                                        </td>
                                                                        </div>
                                                                    </tr>
                                                                      <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="refnum" class="fs-5 text-primary pe-2">Reference Number:</label> </td>  
                                                                        <td>
                                                                        <div class="col-10 py-2">         
                                                                        <input type="text" name = "refNum" id = "refnum" class="form-control" value = '.$i->refNum.' readonly>
                                                                        </td>
                                                                        </div>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="paid" class="fs-5 text-primary pe-2">Amount Paid:</label> </td>  
                                                                        <td>
                                                                        <div class="col-8 py-2">   
                                                                        <div class="input-group">
                                                                        <button class="btn btn-secondary disabled">₱</button>      
                                                                        <input style= "text-align:right" type="decimal" name = "paid" id = "paid" value = '.$i->payment.' class="form-control" readonly>
                                                                        </div>
                                                                        </td>
                                                                    </div>
                                                                    <tr>
                                                                    <td><div class="input-group py-1">
                                                                    <label for="payable" style = "text-align:right" class="fs-5 text-primary pe-2">Amount to Pay :</label></td>   
                                                                    <td>
                                                                    <div class="col-8 py-2">         
                                                                    <div class="input-group">
                                                                    <button class="btn btn-secondary disabled">₱</button>
                                                                    <input type="decimal" name = "cpayable" id = "topay" value = '.$rowe->CertificatePrice.' style = "text-align:right" class="form-control" readonly>
                                                                    </div>
                                                                    </td>
                                                                    </div>    
                                                                    </div>
                                                                    </tr>';
                                                                    $diff = 0;
                                                                if ($checkstat=="6"){
                                                                    if ($rowe->CertificatePrice<$i->payment){
                                                                        $diff = $i->payment-$rowe->CertificatePrice;
                                                                        $val = number_format($diff,2);
                                                                        echo '
                                                                        
                                                                        <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="payable" style = "text-align:right" class="fs-5 text-primary pe-2">Change :</label></td>   
                                                                        <td>
                                                                        <div class="col-8 py-2">         
                                                                        <div class="input-group">
                                                                        <button class="btn btn-secondary disabled">₱</button>
                                                                        <input type="decimal" name = "change" id = "topay" value = '.$val.' style = "text-align:right" class="form-control" readonly>
                                                                        </div>
                                                                        </td>
                                                                        </div>    
                                                                        </div>
                                                                        </tr>';
                                                                            
                                                                    }
                                                              
                                                                    else if ($rowe->CertificatePrice>$i->payment){
                                                                        $diff =  $rowe->CertificatePrice - $i->payment;
                                                                        $val = number_format($diff,2);
                                                                        

                                                                        
                                                                        echo '
                                                                        
                                                                        <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="payable" style = "text-align:right" class="fs-5 text-primary pe-2">Credit :</label></td>   
                                                                        <td>
                                                                        <div class="col-8 py-2">         
                                                                        <div class="input-group">
                                                                        <button class="btn btn-secondary disabled">₱</button>
                                                                        <input type= "decimal" name = "credit" id = "topay" value = '.$val.' style = "text-align:right" class="form-control" readonly>
                                                                        </div>
                                                                        </td>
                                                                        </div>    
                                                                        </div>
                                                                        </tr>';

                                                                    }
                                                                    else{

                                                                        
                                                                    }
                                                                    }
                                                                    echo'
                                                                    <tr>
                                                                    <td><div class="input-group py-1">
                                                                    <label for="refnum" class="fs-5 text-primary pe-2">Date Accepted: </label> </td>  
                                                                    <td>
                                                                    <div class="fs-5 text-secondary"> '.$adate.'</div>
                                                                    </td>
                                                                    </div>
                                                                    </tr>
                                                                    </table>
                                                                    </div>

                                                        </div>
                                                    
                                                    </div>
                                                </div>

                                            </div>';
                                                                }
                                                            }

                                    }
                                        
                                        else if ($checkstat == "4" ){
                                        
                                            $sql ="select * from tblpaymentlogs where creationID = ".$_GET['editid']." and servicetype = 2";
                                            $query= $dbh->prepare($sql);
                                            $query->execute();
                                            $result = $query->fetchAll(PDO::FETCH_OBJ);
                                            foreach($result as $i){
                                                $cdate = date('F j, Y - h:i A', strtotime($i->paymentDate));
                                                $adate = date('F j, Y - h:i A', strtotime($i->dateAccepted));
                                                echo'
                                                <div class="row gx-4 gy-3 px-5">
                                                    <p class="fs-4 text-primary">Payment Verification</p>
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <a target = "_blank" href = "'.$i->proof.'"><img src="'.$i->proof.'" alt="" class="img-fluid"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <div class="col-12">
                                                            <div class="row g-2">
                                                           
                                                            <table>';
                                                            $select = "Select * from tblpaymentlogs where creationID = ".$eid."";
                                                            $query = $dbh->prepare($sql);
                                                            $query ->execute();
                                                            $plog = $query->fetchAll(PDO::FETCH_OBJ);
    
                                                            foreach($plog as $i){
    
                                                            
                                                            echo'
                                                                
                                                                        <table>
                                                                          <tr>
                                                                            <td><div class="input-group py-1">
                                                                            <label for="refnum" class="fs-5 text-primary pe-2">Date Submitted: </label> </td>  
                                                                            <td>
                                                                            <div class="fs-5 text-secondary"> '.$cdate.'</div>
                                                                            </td>
                                                                            </div>
                                                                        </tr>
                                                                          <tr>
                                                                            <td><div class="input-group py-1">
                                                                            <label for="refnum" class="fs-5 text-primary pe-2">Reference Number:</label> </td>  
                                                                            <td>
                                                                            <div class="col-10 py-2">         
                                                                            <input type="text" name = "refNum" id = "refnum" class="form-control" value = '.$i->refNum.' readonly>
                                                                            </td>
                                                                            </div>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><div class="input-group py-1">
                                                                            <label for="paid" class="fs-5 text-primary pe-2">Amount Paid:</label> </td>  
                                                                            <td>
                                                                            <div class="col-8 py-2">   
                                                                            <div class="input-group">
                                                                            <button class="btn btn-secondary disabled">₱</button>      
                                                                            <input style= "text-align:right" type="decimal" name = "paid" id = "paid" value = '.$i->payment.' class="form-control" readonly>
                                                                            </div>
                                                                            </td>
                                                                        </div>
                                                                        <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="payable" style = "text-align:right" class="fs-5 text-primary pe-2">Amount to Pay :</label></td>   
                                                                        <td>
                                                                        <div class="col-8 py-2">         
                                                                        <div class="input-group">
                                                                        <button class="btn btn-secondary disabled">₱</button>
                                                                        <input type="decimal" name = "cpayable" id = "topay" value = '.$rowe->CertificatePrice.' style = "text-align:right" class="form-control" readonly>
                                                                        </div>
                                                                        </td>
                                                                        </div>    
                                                                        </div>
                                                                        </tr>';
                                                                        $diff = 0;
                                                                        if ($rowe->CertificatePrice<$i->payment){
                                                                            $diff = $i->payment-$rowe->CertificatePrice;
                                                                            $val = number_format($diff,2);
                                                                            echo '
                                                                            
                                                                            <tr>
                                                                            <td><div class="input-group py-1">
                                                                            <label for="payable" style = "text-align:right" class="fs-5 text-primary pe-2">Change :</label></td>   
                                                                            <td>
                                                                            <div class="col-8 py-2">         
                                                                            <div class="input-group">
                                                                            <button class="btn btn-secondary disabled">₱</button>
                                                                            <input type="decimal" name = "change" id = "topay" value = '.$val.' style = "text-align:right" class="form-control" readonly>
                                                                            </div>
                                                                            </td>
                                                                            </div>    
                                                                            </div>
                                                                            </tr>';
                                                                                
                                                                        }
                                                                        else if ($rowe->CertificatePrice>$i->payment){
                                                                            $diff =  $rowe->CertificatePrice - $i->payment;
                                                                            $val = number_format($diff,2);
                                                                            

                                                                            
                                                                            echo '
                                                                            
                                                                            <tr>
                                                                            <td><div class="input-group py-1">
                                                                            <label for="payable" style = "text-align:right" class="fs-5 text-primary pe-2">Credit :</label></td>   
                                                                            <td>
                                                                            <div class="col-8 py-2">         
                                                                            <div class="input-group">
                                                                            <button class="btn btn-secondary disabled">₱</button>
                                                                            <input type= "decimal" name = "credit" id = "topay" value = '.$val.' style = "text-align:right" class="form-control" readonly>
                                                                            </div>
                                                                            </td>
                                                                            </div>    
                                                                            </div>
                                                                            </tr>';

                                                                        }
                                                                        echo'
                                                                        <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="refnum" class="fs-5 text-primary pe-2">Date Accepted: </label> </td>  
                                                                        <td>
                                                                        <div class="fs-5 text-secondary"> '.$adate.'</div>
                                                                        </td>
                                                                        </div>
                                                                        </tr>
                                                                        </table>
                                                                        </div>
    
                                                            </div>
                                                        
                                                        </div>
                                                    </div>
    
                                                </div>';
                                            }
                                            }
                                    }
                                ?>
                                        <div class="row gy-2 mx-2 my-2 ">
                                            
                                        <div class="row justify-content-end">
                                        <div class="col-12">
                                            <div class="float-end">
                                        <?php 
                                                if ($rowe->status == "4"){
                                                    echo '
                                                    <div class="btn-group">                               
                                        <a type="" href ="view-cert-temp.php?viewid='.$eid.'"class="btn btn-success"><i class = "fa fa-print mx-1"></i><span class="wal">Print</span></a>
                                        </div> <div class="btn-group"> <button type = "sbumit" href = "#save-cert" name="submit" id="submit" data-bs-toggle = "modal" role= "button"class = "btn  btn-primary  my-2"><i class= "fas fa-save me-2"></i>Save</button></div>';
                                                }else if ($rowe->status == "3" || $rowe->status == "5"){
                                                    echo '
                                                    <div class="btn-group">        
                                        </div><button type = "sbumit" href = "#save-cert" name="submit" id="submit" role= "button"class = "btn  btn-primary  my-2"><i class= "fas fa-save me-2"></i>Save</button>';
                                                }
                                            ?>
                                        <div class="btn-group">     
                                        
                                        </div>
                                        <div class="btn-group">
                                        <?php 
                                                
                                                if ($rowe->status == "6" || $rowe->status == "7" || $rowe->status == "8"){
                                                    echo '
                                                    <div class="btn-group">                               
                                                    <a href="admin-certificate.php" class = "btn btnx float-end btn-secondary mb-1"><i class= "fas fa-sign-out-alt me-2"></i>Cancel</a>/div>';
                                                }else{
                                                    echo '
                                                    <div class="btn-group">                               
                                                    <button type="button" data-bs-toggle= "modal" href = "#decline-proof"  class="btn btn-danger"><i class = "fa fa-trash mx-1"></i><span class="wal">Reject</span></button>';
                                                }
                                            }?>
                                            
                                    
                                                                            
                                                            
                                        
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

         
       
        <div class="modal fade" id = "decline-proof" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger ">
                    <div class="modal-header bg-danger text-white bg-transparent ">
                        <div class="modal-title fs-5" id="delete">&nbsp;<i class = "fa fa-times-circle"></i>&nbsp;&nbsp;Declining registration </div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row mt-1 px-3">
                           
                        
                                <div class="row mt-2">
                                    
                                    
                                    <div class="col-md-12">
                                        <label for="decreason" >Decline Reason</label>
                                        <select name="decr" id="decreason" class= "form-select" onchange = "showOthersdec('other_txt-dec',this);">
                                            <option value="Insufficient credentials">Insufficient credentials</option>
                                            <option value="Detected inconsistency">Detected inconsistency</option>
                                            <option value="others">Others</option>
                                        </select>
                                        <div class="row g-0 my-2" id = "other_txt-dec" style= "display: none;">
                                 
                                 <div class="col-md-12">
                                     <input  type="text" class="form-control" placeholder= "Specify a reason here">
                                 </div>
                             </div>
                                    </div>
                                </div>
                               
                                <div class="row mt-2">
                                        <label for="remarks" >Remarks</label>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                            <textarea class="form-control" name= "rmrks" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;resize: none;"></textarea>
                                            <label for="floatingTextarea2">Remarks here (max 10 words)</label>
                                                
                                            </div>
                                        </div>
                                   
                                </div>
                                <div class="row mt-2">
                                   
                                </div>
                                <div class="row justify-content-center">
                                    
                                    <div class="col-md-12">
                                        <div class="float-end">
                                        <button  type = "submit" name= "delete" class= "btn btn-success">
                                            <i class= 'fa fa-paper-plane py-1 me-2'></i>Send
                                        </button>
                                        <button type = "button" class="btn btn-danger" data-bs-dismiss = "modal"  name = "no" value ="No">
                                            <i class= "fa fa-times me-2"></i>Discard
                                        </button>
                                        </div>
                                    </div>
                                    
                                </div>  
                         

                        </div>
                      
                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
        
                                        </form>
        <?php   include('services.php'); ?>
               
        <script src = '../ckeditor/ckeditor.js'></script>
        <script>
          CKEDITOR.replace('cont');
        </script>
 
</body>
</html>
<?php } ?>


            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $("select").change(function() {
                            $(this).find("option:selected").each(function() {
                                var optionValue = $(this).attr("value");
                                if (optionValue) {
                                    $(".box").not("." + optionValue).hide();
                                    $("." + optionValue).show();
                                } else {
                                    $(".box").hide();
                                }
                            });
                        }).change();
                    });
                </script>

                <script type="text/javascript">
                    function showDiv(divId, element) {
                        var rentype = document.getElementById('rt').value;
                        if (rentype == "Rental/Boarder") {
                            document.getElementById('hm').disabled = true;
                        } else {
                            document.getElementById('hm').disabled = false;
                        }
                        document.getElementById(divId).style.display = element.value == 'Rental/Boarder' ? 'block' : 'none';
                    }
                    function showOthersdec(divId, element) {
                        document.getElementById(divId).style.display = element.value == 'others' ? 'flex' : 'none';
                    }
                </script>