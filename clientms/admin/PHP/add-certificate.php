<?php 
    $curr ="Add Certificate";
    session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
  if(isset($_POST['submit']))
  {
    $clientmsaid=$_SESSION['clientmsaid'];
      $cn=$_POST['cn'];
      $cp=$_POST['cp'];
      $ct=$_POST['ctype'];

      $sql="insert into tblcertificate (CertificateName, CertificatePrice, Type) VALUES (:cn, :cp, :ct)";
      $query=$dbh->prepare($sql);
      $query->bindParam(':cn',$cn,PDO::PARAM_STR);
      $query->bindParam(':cp',$cp,PDO::PARAM_STR);
      $query->bindParam(':ct',$ct,PDO::PARAM_STR);
      $query->execute();
      echo "<script>alert('New certificate has been made.')</script>";
      echo "<script type='text/javascript'> document.location ='admin-certificate.php'; </script>";
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
                <button type = "button" onclick = "window.history.back();" class = "btn btnx float-end btn-secondary mb-1"><i class= "fas fa-sign-out-alt me-2"></i>Cancel</button>           
            </div>
        </div>
    </div>
            <div class="container-fluid px-5 mb-5">
              <div class="row">
                <div class="col-xl-12"> 
                  <ul class="nav  nav-pills justify-content-center"> 
                  <li class="nav-item">
                        <a class="nav-link fs-5 active" href="#edit-cert" data-bs-toggle = "tab">Add Certification </a>
                    </li>   
                 
                  </ul>
                </div>
                <div class="col-xl-12">
                  <div class="tab-content">
                   
                    <div class="tab-pane show fade active" id="edit-cert">
                    <form method ="POST">
  
        <div class="container-fluid mb-3 ms-1 mx-5">
          <div class="row mx-1  py-2">
            <div class="col-xl-12 mx-auto  rounded-top white">
              <div class="row ">
                <div class="fs-4 text-center mt-3 bg-599">
                    Certificate Information
                  
                </div>
              </div>
              
              <div class="row bg-white pb-5 border">
                <form method = "POST">
                  <div class="row g-2 gy-1 px-5">
                    <div class="col-xl-6">
                    <label for="cn" class= "black fw-bold">Certification Name</label>
                    <input id = "cn" class ="form-control" type="text" placeholder = "Certfication Name" name= "cn" value =  "<?php echo htmlentities($row->CertificateName);?>">

                    </div>
                    <div class="col-xl-4">
                    <label for="cp" class= "black fw-bold" >Certification Fee</label>
                    <div class="input-group">
                      <button class="btn btn-secondary disabled">₱</button>
                    <input id = "cp" name="cp" class ="form-control" value = "<?php echo htmlentities($row->CertificatePrice);?>" type="text" placeholder = "Certfication fee" style = "text-align: right">

                    </div>
                   
                
             
                  </div>
                  <div class="row  g-2 ">
                    <div class="col-md-12 mx-auto">
                      <label for="cert-inf" class= "black fw-bold">Certification Contents</label>
                      <select class="form-control action" name="ctype" id="ctype" required style="width: 50%;">
                                                <option value="" selected disabled>--Select Type of Certification--</option>
                                                <option value="1" >Non-Business Certificate</option>
                                                <option value="2" >Business Certificate</option>
                                            </select>
                    </div>
                   
                  </div>
                  <div class="row g-2">
                    <div class="col-12">
                    <button type = "submit" name="submit" id="submit" class = "btn  btn-primary  my-2 float-end"><i class= "fas fa-save me-2"></i>Save</button>
                    </div>

                    </div>
                    </div>
                
                </form>
              </div>
            </div>
     
          
          </div>
      
        </div>
       
    

        <div class="modal fade" id = "save-cert" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-599 ">
                    <div class="modal-header bg-599  white p-2 ">
                        <div class="modal-title fs-5" id="delete">&nbsp;<i class = "fa fa-plus"></i>&nbsp;&nbsp;Create Certificate</div>    
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body g-0 bg-white">
                        <div class="row">
                            <div class="col xl-4" align = "center">
                                <!--img src="../images/question.png" alt="trash" class= " img-fluid " style ="width: 10%;">-->
                            </div>
                    
                        </div>
                        <div class="row">
                            <p class = "fs-4 text-center">A new certificate template is about to be created, do you wish to continue?<br></p>
                        </div>
                      <div class="row justify-content-center" align = "center">

                          <div class="col-xl-6">

                          
                            <input type = "button"  class="btn btn-success" href= "#success" data-bs-toggle="modal" data-bs-dismiss = "modal"  name = "conf" value ="Confirm">
                               <input type = "button" class="btn btn-secondary" href= "" data-bs-dismiss = "modal"  name = "create" value ="Cancel">
                               </div>
                        </form>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                     
                    </div>
                </div>
            </div>
        </div>              
      </div>
    </div>
  </div>
 </div>   
</div>
        
  
    
        

        <div class="modal fade" id = "success" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content g-0 bg-599 ">
                    <div class="modal-header bg-bg-599 white ">
                        <h5 class="modal-title" id="delete">&nbsp;<i class = "fa fa-save me-2"></i>&nbsp;&nbsp;Success</h5>    
                        <button type="submit"  name = "submit" class="btn-close"  aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row">
                            <div class="col xl-4" align = "center">
                                <img src="../images/check.png" alt="trash" class= " img-fluid " style ="width: 25%;">
                            </div>
                    
                        </div>
                        <div class="row">
                            <p class = "fs-4 text-center"> Certificate Successfully Added to the system.<br></p>
                        </div>
                
                    </div>
                   
                </div>
            </div>
        </div>
      </form>
        <?php   include('services.php');?>
        <script src = '../ckeditor/ckeditor.js'></script>
        <script>
          CKEDITOR.replace('cert-info');
        </script>
 
</body>
</html>
<?php } #edit-cert ?>