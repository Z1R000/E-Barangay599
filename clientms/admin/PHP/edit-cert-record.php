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
            $eid=intval($_GET['editid']);
            $clientmsaid=$_SESSION['clientmsaid'];
            $rest=$_POST['rest'];
            $lname=$_POST['lname'];
            $fname=$_POST['fname'];
            $mname=$_POST['mname'];
            $hu=$_POST['hu'];
            $vp=$_POST['vp'];
            $prk=$_POST['prk'];
            $stn=$_POST['stn'];
            $gnd=$_POST['gnd'];
            $contact=$_POST['contact'];
            $cstat=$_POST['cstat'];
            $vstat=$_POST['vstat'];
            $email=$_POST['email'];
            $sss=$_POST['sss'];
            $tin=$_POST['tin'];
            $bdt=$_POST['bdt'];
        
            $sql="update tblresident set ResidentType=:rest, Purok=:prk, houseUnit=:hu, streetName=:stn, LastName=:lname, FirstName=:fname, MiddleName=:mname, houseUnit=:hu, streetName=:stn, Purok=:prk, Cellphnumber=:contact, CivilStatus=:cstat, voter=:vstat, Email=:email where ID=:eid";
            $query=$dbh->prepare($sql);
            $query->bindParam(':rest',$rest,PDO::PARAM_STR);
            $query->bindParam(':vstat',$vstat,PDO::PARAM_STR);
            $query->bindParam(':lname',$lname,PDO::PARAM_STR);
            $query->bindParam(':fname',$fname,PDO::PARAM_STR);
            $query->bindParam(':mname',$mname,PDO::PARAM_STR);
            $query->bindParam(':hu',$hu,PDO::PARAM_STR);
            $query->bindParam(':stn',$stn,PDO::PARAM_STR);
            $query->bindParam(':prk',$prk,PDO::PARAM_STR);
            $query->bindParam(':contact',$contact,PDO::PARAM_STR);
            $query->bindParam(':cstat',$cstat,PDO::PARAM_STR);
            $query->bindParam(':email',$email,PDO::PARAM_STR);
            $query->bindParam(':eid',$eid,PDO::PARAM_STR);
            $query->execute();
            echo '<script>alert("Resident detail has been updated")</script>';
            echo "<script type='text/javascript'> document.location ='edit-resident-account.php?editid=" + $eid + "'; </script>";
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
    <form action="edit-cert-temp.php"method ="POST">
            <div class="container-fluid px-5 mb-5">
                <div class="row">
                    <div class="col-xl-12">
                        
                        <ul class="nav  nav-pills justify-content-center">
                           
                            <li class="nav-item">
                                <a class="nav-link active fs-5" href="#preview" data-bs-toggle = "tab">Preview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fs-5" href="#edit-cert" data-bs-toggle = "tab">Manage Certification </a>
                            </li>
                        </ul>   
                    </div>
                    <div class="col-xl-12">
                        <div class="tab-content">
                        <div class="tab-pane fade show active" id="preview">    		
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
                                                <iframe class="embed-responsive-item" id = "frame" src="view-cert.php"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        </div>
                         <div class="tab-pane fade show" id="edit-cert">
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
                                                <input id = "cname" class ="form-control"type="text" placeholder = "Requestor Name" name= "cnrame">
                                            </div>
                                            <div class="col-xl-2">
                                            <label for="cname" class= "black fw-bold fs-5">Status</label>
                                            <select id = "cname" class ="form-select" name= "cmeth">
                                                <option name="" id="">Settled</option>
                                                <option name="" id="">Unsettled</option>
                                                <option name="" id="">Cancelled</option>
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
                                                <select id = "purp" class ="form-select" name= "cmeth">
                                                    <option name="" id="" selected>for....</option>
                                                    <option name="" id="">Cert 1</option>
                                                    <option name="" id="">Cert 2</option>
                                                
                                                </select>

                                            </div>
                                            <div class="col-xl-3">
                                                <label for="cname" class= "black fw-bold fs-5">Certification fee</label>
                                                <input id = "cname" class ="form-control" type="text" placeholder = "Certfication fee" name= "cname">

                                            </div>
                                            <div class="col-xl-3">
                                                <label for="cname" class= "black fw-bold fs-5">Mode of Payment</label>
                                                <select id = "cname" class ="form-select" name= "cmeth">
                                                    <option name="" id="">Cash</option>
                                                    <option name="" id="">G-cash</option>
                                                
                                                </select>

                                            </div>
                                        </div>
                                        <div class="row g-2 px-5">
                                            <div class="col-xl-6">
                                                <label for="purp" class= "black fw-bold fs-5">Purpose</label>
                                                <select id = "purp" class ="form-select" name= "cmeth">
                                                    <option name="" id="" selected>for....</option>
                                                    <option name="" id="">for DSWD</option>
                                                    <option name="" id="">for PAG-IBIG</option>
                                                    <option name="" id="">for Employment purposes</option>
                                                    <option name="" id="">for loaning</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="cname" class= "black fw-bold fs-5">Date</label>
                                                <input id = "cname" class ="form-control" type="datetime-local" placeholder = "Date of certification" name= "cdate">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="cname" class= "black fw-bold fs-5">Kagwad on duty</label>
                                                <select id = "kod" class ="form-control " name= "cmeth">
                                                    <option name="" id="" selected>Kagawad on duty</option>
                                                    <option name="" id="">CRISANTO G. LORICA</option>
                                                    <option name="" id="">ALEXANDER S. CEÑO</option>
                                                    <option name="" id="">ALBERTO P. RAMOS</option>
                                                    <option name="" id="">JAIME S. CHOY</option>
                                                </select>

                                            </div>
                                            <div class="col-xl-6" style= "display: none">
                                                <label for="cname" class= "black fw-bold fs-5">Business name <span class= "text-muted fs-6">( For business related only )</span></label>
                                                <input id = "cname" class ="form-control" type="text" placeholder = "business name here" name= "cname">

                                            </div>
                                   
                                        </div>
                                        <div class="row gy-2 mx-2 my-2 ">
                                            <div class="col-md-12 mx-auto">
                                            <label for="cert-inf" class= "black fw-bold fs-5">Certification Contents</label>
                                            <textarea class= "" name="cert-info" id="cert-inf" cols="30" rows="4" style= "resize: none" placeholder= "Paragraph 1">hudassss</textarea>
                                        </div>
                                        <div class="row justify-content-end">
                                        <div class="col-12">
                                            <div class="float-end">

                                           
                                            <div class="btn-group">                               
                                        <a type="" href ="temp-cert.php"class="btn btn-success"><i class = "fa fa-print mx-1"></i><span class="wal">Print</span></a>
                                        </div>
                                        <div class="btn-group">     
                                        <button type = "button" href = "#save-cert" data-bs-toggle = "modal" role= "button"class = "btn  btn-primary  my-2"><i class= "fas fa-save me-2"></i>Save</button>
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
                                    <input type = "submit" class="btn btn-success" href= "#success" data-bs-toggle="modal" data-bs-dismiss = "modal"  name = "conf" value ="Confirm">

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
          CKEDITOR.replace('cert-info');
        </script>
 
</body>
</html>
<?php } ?>