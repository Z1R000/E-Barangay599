<?php 
    $curr ="Update Certificate Request";
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
        $aid=$_SESSION['clientmsaid'];

        $mail = new PHPMailer(true);

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

    $sql= "select tblcreatecertificate.ID as cid, tblresident.ID as residd, tblresident.*, tblcreatecertificate.*, tblcertificate.* from tblcreatecertificate join tblresident on tblresident.ID = tblcreatecertificate.Userid join tblcertificate on tblcreatecertificate.CertificateId = tblcertificate.ID WHERE tblcreatecertificate.ID = :eid";
        $query = $dbh ->prepare($sql);
        $query->bindParam(':eid',$eid,PDO::PARAM_STR);
        $query ->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        foreach ($result as $r){
            $residd = $r->residd;
            $cname = $r->CertificateName;
        }


        if(isset($_POST['submit']))
        {
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
        $text = "From Barangay 599 V. Mapa\n\nYour certificate request for ".$cname." has been approved.\n\n This is a system-generated message. Please do not reply.";

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
                    Your certificate request for '.$cname.' has been approved.
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
            $cont=$_POST['cont'];
            $status="2";
            

        $sql = "update tblcreatecertificate set status=:status WHERE ID=:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':eid',$eid,PDO::PARAM_STR);
        $query->bindParam(':status',$status,PDO::PARAM_STR);
        $query->execute();
        echo '<script>alert("Certificate request has been approved.")</script>';
        echo "<script>window.location.href ='admin-certificate.php'</script>";
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
        table,td,tr,th{
            border: 1px solid #d3d3d3;
            text-align: left;
            font-size: 1em;
            padding: 100px;
            font-family: 'Noto Sans Display', sans-serif;
            
        }
        
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
                <a href="admin-cert-request.php" class = "btn btnx float-end btn-secondary mb-1"><i class= "fas fa-sign-out-alt me-2"></i>Cancel</a>           
            </div>
        </div>
    </div>
    
    <form method ="POST">
        <?php
            $eid=intval($_GET['editid']);
            $sqle="SELECT tblcertificate.*, tblcreatecertificate.*, tblcreatecertificate.resDate as getDate, tblresident.LastName, tblresident.FirstName, tblresident.MiddleName, tblresident.Suffix, tblstatus.*, tblpurposes.* FROM tblcertificate join tblcreatecertificate on tblcreatecertificate.CertificateId = tblcertificate.ID join tblresident on tblcreatecertificate.Userid = tblresident.ID join tblstatus on tblstatus.ID = tblcreatecertificate.status join tblpurposes on tblpurposes.ID = tblcreatecertificate.purpID WHERE tblcreatecertificate.ID = :eid";
            $querye = $dbh -> prepare($sqle);
            $querye->bindParam(':eid',$eid,PDO::PARAM_STR);
            $querye->execute();
            $resulte = $querye->fetchAll(PDO::FETCH_OBJ);
            foreach ($resulte as $rowe) {
                $gdate = $rowe->resDate;
                $cdate = date('F j, Y - h:i A', strtotime($gdate));
                    
        ?>
            <div class="container-fluid px-5 mb-5">
                <div class="row">
                    <div class="col-xl-12">
                        
                        <ul class="nav  nav-pills justify-content-center">
                           
                            <li class="nav-item">
                                <a class="nav-link active fs-5" href="#edit-cert" data-bs-toggle = "tab">Manage Certificate </a>
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
                                            <div class="col-xl-6">
                                                <label for="cname" class= "black fw-bold fs-5">Requestor Name</label>
                                                <input id = "cname" class ="form-control"type="text" placeholder = "Requestor Name" name= "cnrame" disabled value="<?php echo "$rowe->FirstName $rowe->MiddleName $rowe->LastName $rowe->Suffix";?>">
                                            </div>
                                            <div class="col-xl-2">
                                            <label for="cname" class= "black fw-bold fs-5">Status</label>
                                            <select id = "status" class ="form-select" name= "status" disabled>
                                                <option value="<?php echo "$rowe->statusName"?>"><?php echo "$rowe->statusName"?></option>
                                                
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
                                                <input id = "cname" class ="form-control" type="text" placeholder = "Certfication fee" name= "cname" value="<?php echo "$rowe->CertificatePrice";?>" disabled>
                                            </div>
                                            <div class="col-xl-3">
                                                <label for="cname" class= "black fw-bold fs-5">Mode of Payment</label>
                                                <select id = "cname" class ="form-select" name= "cmeth" disabled>
                                                    <option value="<?php echo "$rowe->pMode";?>" id=""><?php echo "$rowe->pMode";?></option>                                                
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
                                       
                                        <div class="row justify-content-end">
                                        <div class="col-12">
                                            <div class="float-end">

                                           
                                            <div class="btn-group">                               
                                            <button type = "submit" href = "#save-cert" name="submit" id="submit" data-bs-toggle = "modal" role= "button"class = "btn btn-success"><i class= "fas fa-save me-2"></i>Approve</button>
                                        </div>
                                        
                                        <div class="btn-group">
                                    
                                                                            <a type="button" href ="decline-req.php?editid='<?php echo $eid?>'" role = "button" class="btn btn-danger"><i class = "fa fa-trash mx-1"></i><span class="wal">Reject</span></a>
                                                                       
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
            </div>
            <?php } ?>

            
            </form>
            <div class="modal fade" id = "save-cert" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0  border-0  ">
                    <div class="modal-header  bg-599 border-599">
                        <div class="modal-title text-white " id="delete">&nbsp;<i class = "fa fa-edit"></i>&nbsp;&nbsp;Edit Certificate</div>       
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row">
                            <div class="col xl-4" align = "center">
                                <!--img src="../images/question.png" alt="trash" class= " img-fluid " style ="width: 10%;">-->
                            </div>
                    
                        </div>
                        <div class="row">
                            <p class = "fs-4 text-center">A new certificate template is about to be updated, do you wish to continue?<br></p>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="float-end">
                                    <div class="btn-group">
                                    <input type = "submit" class="btn btn-success" href= "#success" data-bs-toggle="modal" data-bs-dismiss = "modal"  name = "submit" id="submit" value ="Confirm">

                                    </div>
                                    <div class="btn-group">
                                        
                               <input type = "submit" class="btn btn-primary" href= "#success" data-bs-dismiss = "modal"  name = "canc" value ="Cancel">
        
                                    </div>
                                </div>
                            </div>
                        </div>
                
                    </div>
              
                </div>
            </div>
        </div>


        <?php   include('services.php'); ?>
        <div class="modal fade" id = "success" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content g-0 bg-success ">
                    <div class="modal-header bg-success white ">
                        <h5 class="modal-title" id="delete">&nbsp;<i class = ""></i>&nbsp;&nbsp;Success</h5>    
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row">
                            <div class="col xl-4" align = "center">
                                <img src="../images/check.png" alt="trash" class= " img-fluid " style ="width: 25%;">
                            </div>
                    
                        </div>
                        <div class="row">
                            <p class = "fs-4 text-center">New Certificate Successfully added.<br></p>
                        </div>
                
                    </div>
                   
                </div> 
            </div>
        </div>

        <div class="modal fade" id = "decline-req" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger ">
                    <div class="modal-header bg-danger bg-transparent ">
                        <div class="modal-title text-white" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Declining request?</div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row mt-2 me-3 ms-2">
                            <form action="" method = "POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="dname">Requestor Name</label>
                                        <input id = "dname" type="text" class="form-control" value = "Juan Dela Cruz" readonly>

                                    </div>
                           
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="contac">Contact Number</label>
                                        <input id = "contac" type="text" class="form-control" value = "09123456789" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Email Address</label>
                                        <input id = "emails" type="text" class="form-control" value = "juanDelaC@gmail.com" readonly>
                                        
                                    
                                    </div>
                                    <div class="col-md-12">
                                        <label for="decreason" >Decline Reason</label>
                                        <select name="" id="decreason" class= "form-select" onclick = "showOthersdec('other_txt-dec',this)">
                                            <option value="">Insufficient payment</option>
                                            <option value="">Invalid proof sent</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-0 my-2" id = "other_txt-dec" style= "display:none;">
                                 
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder= "Specify a reason here">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                        <label for="remarks" >Remarks</label>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;resize: none;"></textarea>
                                            <label for="floatingTextarea2">Remarks here (max 10 words)</label>
                                                
                                            </div>
                                        </div>
                                   
                                </div>
                                <div class="row mt-2">
                                    <label for="remarks" >Mode of delivery <i class= "fa fa-envelope"></i></label>
                                 
                                </div>
                                <div class="row justify-content-center" align = "center">
                                    
                                <div class="col-md-12">
                                        <div class="float-end">
                                            <div class="btn-group">
                                        <button href ="" onclick = "alert('Decline Message Sent')" type = "button" class="btn btn-success " data-bs-dismiss ="modal" data-bs-toggle= "modal" >
                                            <i class= 'fa fa-paper-plane py-1 me-2'></i>Send
                                        </button>
                                        </div>
                                        <div class="btn-group">

                                        
                                        <button type = "button" class="btn btn-danger " data-bs-dismiss = "modal"  name = "no" value ="No">
                                            <i class= "fa fa-times me-2"></i> Discard
                                        </button>
                                        </div>
                                        </div>
                                    </div>
                                    
                                </div>  
                            </form>

                        </div>
                      
                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>

        <script src = '../ckeditor/ckeditor.js'></script>
        <script>
          CKEDITOR.replace('cont');
        </script>
 
</body>
</html>
<?php } ?>