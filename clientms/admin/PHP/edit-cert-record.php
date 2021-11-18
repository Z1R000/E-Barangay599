<?php 
    $curr ="Update Certificate Record";
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
      header('location:logout.php');
      } else{
        if(isset($_POST['submit']))
        {
     
            if ($_POST['status']=="4"){
                
                $paid = $_POST['paid'];
                $cpayable  =$_POST['cpayable'];
                $time = new DateTime("now", new DateTimeZone('Asia/Manila'));
                $now= $time->format("Y-m-d h:i:s");
                if ($paid > $cpayable){
                   
                    $sql="update tblcreatecertificate set status=:status WHERE ID=:eid";
                    $query=$dbh->prepare($sql);
                    $query->bindParam(':status',$status,PDO::PARAM_STR);
                    $query->bindParam(':eid',$eid,PDO::PARAM_STR);
                    $query->execute();


                    /*$payup = "update tblpaymentlogs set 
                        dateAccepted = '".$now."',
                        refNum = ".$_POST['refNum'].",
                        payment = ".$paid."

                        where creationID = ".$eid."
                        ";

                    if ($con->query($payup)===TRUE){
                        echo '<script>alert("Certificate Record and payment log has been updated")</script>';
                        echo "<script>window.location.href ='payment-verification-cert.php?editid=".$eid."&change=".$diff."</script>";
                    }*/
                  
                }
                elseif ($paid<$cpayable){
                    $diff = $cpayable -$paid;
                    $time = new DateTime("now", new DateTimeZone('Asia/Manila'));
                    $sql="update tblcreatecertificate set status=:status WHERE ID=:eid";
                    $query=$dbh->prepare($sql);
                    $query->bindParam(':status',$status,PDO::PARAM_STR);
                    $query->bindParam(':eid',$eid,PDO::PARAM_STR);
                    $query->execute();

                    $payup = "update tblpaymentlogs set 
                        dateAccepted = '".$now."',
                        refNum = ".$_POST['refNum'].",
                        payment = ".$paid."
                        ";

                    if ($con->query($payup)===TRUE){
                        echo '<script>alert("Certificate Record and payment log has been updated")</script>';
                        echo "<script>window.location.href ='payment-verification-cert.php?editid=".$eid."&change=".$diff."</script>";
                    }

                }
                else{

                }

            }
            else{

                $eid=intval($_GET['editid']);
                $clientmsaid=$_SESSION['clientmsaid'];
                $status=$_POST['status'];
            
                $sql="update tblcreatecertificate set status=:status WHERE ID=:eid";
                $query=$dbh->prepare($sql);
                $query->bindParam(':status',$status,PDO::PARAM_STR);
                $query->bindParam(':eid',$eid,PDO::PARAM_STR);
                $query->execute();
                echo '<script>alert("Certificate Record has been updated")</script>';
                echo "<script>window.location.href ='edit-cert-record.php?editid=".$eid."'</script>";
            }

        }
        if(isset($_POST['delete']))
        {
            $eid=intval($_GET['editid']);
            $clientmsaid=$_SESSION['clientmsaid'];
            $status="8";
        
            $sql="update tblcreatecertificate set status=:status WHERE ID=:eid";
            $query=$dbh->prepare($sql);
            $query->bindParam(':status',$status,PDO::PARAM_STR);
            $query->bindParam(':eid',$eid,PDO::PARAM_STR);
            $query->execute();
            echo '<script>alert("Certificate Record has been updated")</script>';
            echo "<script>window.location.href ='edit-cert-record.php?editid=".$eid."'</script>";
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
                                            <div class="col-xl-5">
                                                <label for="cname" class= "black fw-bold fs-5">Requestor Name</label>
                                                <input id = "cname" class ="form-control"type="text" placeholder = "Requestor Name" name= "cnrame" disabled value="<?php echo "$rowe->FirstName $rowe->MiddleName $rowe->LastName $rowe->Suffix";?>">
                                            </div>
                                            <div class="col-xl-3">
                                            <label for="cname" class= "black fw-bold fs-5">Status</label>
                                            
                                                <?php 
                                                    $check = $rowe->status;
                                                    $cheme = $rowe->statusName;
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
                                                ?>
                                                </select>
                                            </div>
                                            <div class="col-xl-4">
                                                <label for="cname" class= "black fw-bold fs-5">Barangay Certification number</label>
                                                <input id = "cname" class ="form-control" type="text" placeholder = "bcn-###-##" name= "cname" readonly>
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
                                            <div class="col-xl-6">
                                                <label for="cname" class= "black fw-bold fs-5">Officer on Duty</label>
                                                <select id = "kod" class ="form-control " name= "cmeth" disabled>
                                                    <option value="<?php echo $rowe->cAdmin?>" id="" selected><?php echo $rowe->cAdmin?></option>
                                                </select>

                                            </div>
                                            <div class="col-xl-6" style= "display: none">
                                                <label for="cname" class= "black fw-bold fs-5">Business name <span class= "text-muted fs-6">( For business related only )</span></label>
                                                <input id = "cname" class ="form-control" type="text" placeholder = "business name here" name= "cname" value="<?php echo $rowe->bName?>" disabled>

                                            </div>
                                   
                                        </div>
                                        <?php 
                                   if ($checkstat == "7"){
                                       
                                        echo '<div class="row">
                                        <div class="col-xl-3">
                                            <label for="formFileSm" class="form-label">Upload Proof of Payment<span class="fs-6 text-muted"> (JPEG or PNG format)</span></label>
    
                                        </div>
                                        <div class="col-xl-3">
    
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="ctype" class="black fw-bold fs-5">Payment Details</label>
    
                                        </div>
                                        <div class="col-xl-3">
    
                                        </div>
    
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <input class="form-control form-control-sm" id="formFileSm" type="file">
                                            <br>
                                        </div>
                                        <div class="col-xl-3">
    
                                        </div>
                                        <div class="col-xl-3">
                                            <img src="images/barangaybackground.png" alt="Girl in a jacket" width="280" height="250">
    
                                        </div>
                                        <div class="col-xl-3">
                                        <label for="ctype" style="font-size:130%; font-weight:600;">Francine Voltaire Ledesma <br><span style="font-size:90%;font-style:italic; font-weight:600;"> 09056602669</span></label>
    
    
                                        </div>
    
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xl-3">
    
                                        </div>
                                        <div class="col-xl-3 ">
    
                                        </div>
                                        <div class="col-xl-3 ">
                                            <button type="submit" class="form-control btn btn-outline-danger" name="delete" id="delete">Cancel Request</button>
                                        </div>
                                        <div class="col-xl-3 ">
                                            <button type="submit" class="form-control btn btn-outline-success" name="submit" id="submit">Submit</button>
                                        </div>
                                    </div>';
                                    }else if ($checkstat == "4" || $checkstat == "6" || $checkstat == "3"){
                                        
                                        $sql ="select * from tblpaymentlogs where creationID = ".$_GET['editid']."";
                                        $query= $dbh->prepare($sql);
                                        $query->execute();
                                        $result = $query->fetchAll(PDO::FETCH_OBJ);
                                        foreach($result as $i){
                                            $cdate = date('F j, Y - h:i A', strtotime($i->paymentDate));
                                            echo'
                                            <div class="row gx-4 gy-3 px-5">
                                                <p class="fs-4 text-primary">Payment Verification</p>
                                                <div class="col-xl-6 border border-info">
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
                                                                        <input style= "text-align:right" type="number" name = "paid" id = "paid" value = '.$i->payment.' class="form-control" required>
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
                                                                    <input type="number" name = "cpayable" id = "topay" value = '.$rowe->CertificatePrice.' style = "text-align:right" class="form-control" readonly>
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
                                                    <button type="delete" name="delete" id="delete" class="btn btn-danger"><i class = "fa fa-trash mx-1"></i><span class="wal">Reject</span></button>';
                                                }
                                            ?>
                                            
                                    
                                                                            
                                                                       
                                        
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

        <div class="modal fade" id = "delete-record" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger" >
                    <div class="modal-header  white ">
                        <div class="modal-title bg-danger" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row">
                            <div class="col xl-4" align = "center">
                                <img src="../images/trash.png" alt="trash" class= " img-fluid " style ="width: 10%;">
                            </div>
                    
                        </div>
                        <div class="row">
                            <p class = "fs-4 text-center">You are about to delete an existing record, do you wish to continue?<br><span class="text-muted fs-6">*Select (<i class = "fa fa-check">)</i> if certain</span></p>
                        </div>
                        <div class="row justify-content-center" align = "center">
                            <form method = "POST" action = "#">
                            <div class="col-12">
                                <div class="float-end">
                                
                                <button type = "button" class="btn btn-success" data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                    <i class= 'fa fa-check mx-1 '></i> Confirm
                                </button>
                                <button type = "button" class="btn btn-danger" data-bs-dismiss = "modal"  name = "no" value ="No">
                                    <i class= "fa fa-times mx-1"></i> Cancel
                                </button>
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
        <div class="modal fade" id = "proof" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 border-0 border-bottom border-transparent ">
                    <div class="modal-header  bg-transparent border-bottom border-white  ">
                        
                        <button type="button" class="btn-close btn-primary" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-transparent border-0" align = "center" >
                    <img src="../images/proof.jpg" alt="proof of payment">
                       
                       
                
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
        
        <script src = '../ckeditor/ckeditor.js'></script>
        <script>
          CKEDITOR.replace('cont');
        </script>
 
</body>
</html>
<?php } ?>