<?php 
    $curr ="Update Certificate Request";
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
      header('location:logout.php');
      } else{
        $eid=intval($_GET['editid']);
        $aid=$_SESSION['clientmsaid'];
        if(isset($_POST['submit']))
        {
            
            $cont=$_POST['cont'];
            $status="2";
            $sqls = "Select tbladmin.*, tblresident.*, tblpositions.* from tblresident join tbladmin on tbladmin.residentID = tblresident.ID join tblpositions on tblpositions.ID = tbladmin.BarangayPosition WHERE tbladmin.ID = :aid";
            $querys=$dbh->prepare($sqls);
            $querys->bindParam(':aid', $aid, PDO::PARAM_STR);
            $querys->execute();
            $results=$querys->fetchAll(PDO::FETCH_OBJ);
            foreach ($results as $rows) {$getpos = "$rows->Position $rows->LastName";}

        $sql = "update tblcreatecertificate set status=:status, cAdmin=:getpos WHERE ID=:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':eid',$eid,PDO::PARAM_STR);
        $query->bindParam(':getpos', $getpos, PDO::PARAM_STR);
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
            $sqle="SELECT tblcertificate.*, tblcreatecertificate.*, tblcreatecertificate.resDate as getDate, tblresident.LastName, tblresident.FirstName, tblresident.MiddleName, tblresident.Suffix, tblstatus.* FROM tblcertificate join tblcreatecertificate on tblcreatecertificate.CertificateId = tblcertificate.ID join tblresident on tblcreatecertificate.Userid = tblresident.ID join tblstatus on tblstatus.ID = tblcreatecertificate.status WHERE tblcreatecertificate.ID = :eid";
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
                                    
                                                                            <a type="button" href ="#delete-record" data-bs-toggle = "modal" role = "button" class="btn btn-danger"><i class = "fa fa-trash mx-1"></i><span class="wal">Delete</span></a>
                                                                       
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