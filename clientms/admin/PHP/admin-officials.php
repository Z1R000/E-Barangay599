<?php
session_start();
error_reporting(0);
$curr = "599 Officials";
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');    
  } else{

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curr;?></title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <link rel = "stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../css/scroll.css">

	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
         @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond&family=Eczar&family=Gentium+Basic&family=Libre+Baskerville&family=Libre+Franklin&family=Proza+Libre&family=Rubik&family=Taviraj&family=Trirong&family=Work+Sans&display=swap');
        .bg-bar{
            background-image: url('../images/barangaybackground.png');
            background-size: cover;
            

        }
        tr,td,th{
            vertical-align: middle;
            font-size:1.05em;
        }
         .pab{
            
            position: absolute;
            top: 180px;
            right: 5px;
        }
        .white{
            color: white;
        }
        .try{
            margin:auto;
            width: 1000px;
            height: 150px;
        }
        h5,h4{
            font-family: 'Eczar', serif;
        }
        .cam{
            display:none;
            position: absolute;
            bottom: 50px;
            right:50px;
            left: 50px;
            top:50px;
            color: #012f4e;
            font-weight: bold;
            
        }
        .ava{
            cursor: pointer;
        }
        .ava:hover{
            transition: 1.5s;
    
        }
        .ava:hover img{
      
            transition: .92s;
            opacity: 40%;
        }
        .ava:hover .cam{
            
            display:block;
        }
        .avat{
            position:absolute;
            top:30px;   
        }
        .kan{
            margin-left: 4.5%;
        }
        @media(max-width: 991px){
            .kan{
                margin-left: 1%;
            }
        }
      
                
    </style>
</head>
<body>

    <?php 
        include ('../includes/sidebar.php');
    ?>
     <div class="d-flex align-items-center">
                <div class="container  mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                              
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-user-shield text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>  
    
    <div class="container-fluid  mx-2 px-3">
        <div class="row  gx-0  pb-5" >
      
                <div class="col-xl-3 col-lg-4 col-md-12 mb-3 shadow-lg rounded-3 kan border me-4">
                    <div class="row g-0 bg-dark shadow-lg rounded-top border py-1 bg-dark "></div>
                        <div class="row g-0 "  style= "background: aliceblue">
                            <div class = "text-left text-danger mt-2 border-bottom">
                                <h4 class = "ms-3">
                                    Punong Barangay 
                                    <div class="float-end me-3" data-bs-toggle= "tooltip" data-bs-placement = "top" title ="Account settings (e.g email, passwords)">
                                    <a href="#account" class= "link link-white" role = "button" data-bs-toggle= "modal"><i class="fa fa-cog link-secondary fs-3 "  ></i></a>
                                </div> 
                                </h4>
                            </div>
                            <div class="col-md-11 px-1 pb-4 mx-auto position-relative " align= "center">
                                <img src="../images/admin-logo.png" alt="" class="img-fluid rounded-circle "  style = "height: 135px">
                          
                                <div class= "text-center fs-3 text-secondary">Jose Milo L. Lacatan</div>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="row g-0 border bg-light" >        
                                <div class="col-xl-11 mx-1 ">       
                                    <table class="table my-3" >
                                        <tr class= "">
                                            <th class =""><i class= "fa fa-phone-square me-1"></i>Contact</th>
                                            
                                            <td colspan = 2 style ="text-align: right; padding-right: 6%;" >
                                            09123456789
                                            </td>
                                            
                                        </tr>
                                  
                                        <tr class= "">
                                            <th class =""><i class= "fa fa-circle me-1"></i>Civil Status  </th>
                                            
                                            <td colspan = 2 style ="text-align: right; padding-right: 6%;" >
                                            Single
                                            </td>
                                            
                                        
                                    
                                        </tr>
                                        <tr class= "">
                                            <th class =""><i class= "fa fa-address-card me-1"></i>Age  </th>
                                        
                                            <td colspan = 2 style ="text-align: right; padding-right: 6%;" >
                                            36
                                            </td>
                                            
                                        </tr>
                                        <tr class= "">
                                            <th class =""><i class= "fa fa-venus-mars me-1"></i>Gender </th>
                                        
                                            <td colspan = 2 style ="text-align: right; padding-right: 6%;" >
                                            Male
                                            </td>
                                        
                                        </tr>
                                        <tr class= "">
                                            <th class =""><i class= "fa fa-birthday-cake me-1"></i>Birthdate </th>
                                        
                                            <td colspan = 2 style ="text-align: right; padding-right: 6%;" >
                                            Dec 25 2000
                                            </td>
                                        
                                        </tr>
                                        <tr class= "">
                                            <th class =""><i class= "fa fa-check-square me-1"></i>Day/s of Duty</th>
                                                <td colspan = 2 style ="text-align: right; padding-right: 6%;">
                                                    M, T, W, TH, F, Sat, Sun
                                                </td>
                                            
                                        </tr>
                                        <tr class= "">
                                        
                                            <th class =""><i class= "fa fa-calendar me-1"></i>Term</th>
                                            <td colspan = 2 style ="text-align: right; padding-right: 6%;">
                                                2019-2021
                                            </td>
                                        
                                            
                                        </tr>
                                        <tr class= "">
                                        
                                            <th class =""><i class= "fa fa-info me-1"></i>Status</th>
                                            <td colspan = 2 style ="text-align: right; padding-right: 6%;">
                                                Active
                                            </td>
                                    
                                        
                                        </tr>
                                        
                                     </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-xl-8 col-lg-6 col-md-12 px-4 border-start border-secondary bg-light " style= "max-height: 650px; overflow-y: auto;">
                    
                    <div class="row g-0 pb-3"  >
                        <div class="col-xl-4  border-secondary px-3"  >
                            <div class="row g-0 shadow-lg">

                         
                            <div class="row g-0 bg py-1 bg-danger">

                            </div>
                            <div class="row g-0   justify-content-center bg-bar ">
                                <div class= "ms-4"><span class="fs-5 text-info">Secretary</span></div> 
                                <div class="col-xl-8 position-relative pt-2 text-center">
                                    <img src="../images/barangay.png" alt="" class= "img-fluid rounded-circle" style= "height: 130px;">
                                </div>
                                <h5 class= "text-center text-white">
                                    Maria Cecilia C. Dela Cruz
                                </h5>
                            </div>
                            <div class="row g-0  bg-light text-center">
                                <div class="col-xl-12">
                                   <table class= "table border-none">
                                       
                                        <thead style= "border: 0px solid red;" class= "border-bottom border-primary text-secondary ">
                                            <tr>
                                                <th class= "fs-6">
                                                    Update
                                                </th>
                                              
                                                <th class= "fs-6">
                                                    View
                                                </th>
                                            </tr>
                                        </thead>
                                       
                                        <tr>
                                            <td>
                                            
                                            <a href = "#account" data-bs-toggle= "modal"class= "link link-info"><i class= "fa fa-edit text-info"></i></a>
                                            </td>
                                          
                                            <td>
                                                <a href = "#view-info" data-bs-toggle ="modal" class= "link  link-primary"><i class ="fa fa-eye text-primary"></i></a>
                                            </td>                                           
                                        </tr>
                                   </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-4    px-3">
                            <div class="row g-0 shadow-lg">

                           
                            <div class="row g-0 bg py-1 bg-warning">

                            </div>
                            <div class="row g-0   justify-content-center bg-bar">
                                <div class= "ms-4"><span class="fs-5 text-info">Treasurer</span></div> 
                                <div class="col-xl-8 position-relative pt-2 text-center">
                                    <img src="../images/barangay.png" alt="" class= "img-fluid rounded-circle" style= "height: 130px;">
                                </div>
                                <h5 class= "text-center text-white">
                                    Imelda G. Padilla
                                </h5>
                            </div>
                            <div class="row g-0  bg-light text-center">
                                <div class="col-xl-12">
                                   <table class= "table border-none">
                                       
                                        <thead style= "border: 0px solid red;" class= "border-bottom border-primary text-secondary ">
                                            <tr>
                                                <th class= "fs-6">
                                                    Update
                                                </th>
                                             
                                                <th class= "fs-6">
                                                    View
                                                </th>
                                            </tr>
                                        </thead>
                                       
                                        <tr>
                                            <td>
                                        
                                            <a href = "#account" data-bs-toggle= "modal" class= "link link-info"><i class= "fa fa-edit text-info"></i></a>
                                            </td>
                                           
                                            <td>
                                            <a href = "#view-info" data-bs-toggle ="modal" class= "link  link-primary"><i class ="fa fa-eye text-primary"></i></a>
                                            </td>                                           
                                        </tr>
                                   </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-4  px-3">
                            <div class="row g-0 shadow-lg">

                           
                            <div class="row g-0 bg py-1 bg-success shadow-sm">

                            </div>
                            <div class="row g-0   justify-content-center bg-bar shadow-sm">
                                <div class= "ms-4"><span class="fs-5  text-info">Sk Chairman</span></div> 
                                <div class="col-xl-8 position-relative pt-2 text-center">
                                    <img src="../images/barangay.png" alt="" class= "img-fluid rounded-circle" style= "height: 130px;">
                                </div>
                                <h5 class= "text-center text-white">
                                    Miko M Custodio
                                </h5>
                            </div>
                            <div class="row g-0  bg-light text-center">
                                <div class="col-xl-12">
                                   <table class= "table border-none">
                                       
                                        <thead  class= "border-bottom border-primary text-secondary ">
                                            <tr>
                                                <th class= "fs-6">
                                                    Update
                                                </th>
                                                
                                                <th class= "fs-6">
                                                    View
                                                </th>
                                            </tr>
                                        </thead>
                                       
                                        <tr>
                                            <td>
                                          
                                            <a href = "#account" data-bs-toggle= "modal" class= "link link-info"><i class= "fa fa-edit text-info"></i></a>
                                            </td>
                                          
                                            <td>
                                            <a href = "#view-info" data-bs-toggle ="modal" class= "link  link-primary"><i class ="fa fa-eye text-primary"></i></a>
                                            </td>                                           
                                        </tr>
                                   </table>
                                </div>
                            </div>
                            </div>
                        </div>
                      
                    </div>
                    <div class="row g-0 pb-3">
                        <div class="col-xl-4  border-secondary px-3" >
                            <div class="row g-0 shadow-lg">

                         
                            <div class="row g-0 bg py-1 bg-primary">

                            </div>
                            <div class="row g-0   justify-content-center bg-bar ">
                                <div class= "ms-4"><span class="fs-5 text-info">Kagawad 1</span></div> 
                                <div class="col-xl-8 position-relative pt-2 text-center">
                                    <img src="../images/barangay.png" alt="" class= "img-fluid rounded-circle" style= "height: 130px;">
                                </div>
                                <h5 class= "text-center text-white">
                                    Erwin L. Sampaga
                                </h5>
                            </div>
                            <div class="row g-0  bg-light text-center">
                                <div class="col-xl-12">
                                   <table class= "table border-none">
                                       
                                        <thead style= "border: 0px solid red;" class= "border-bottom border-primary text-secondary ">
                                            <tr>
                                                <th class= "fs-6">
                                                   Update
                                                </th>
                                                
                                                <th class= "fs-6">
                                                    View
                                                </th>
                                            </tr>
                                        </thead>
                                       
                                        <tr>
                                            <td>
                                           
                                            <a href = "#account" data-bs-toggle= "modal" class= "link link-info"><i class= "fa fa-edit text-info"></i></a>
                                            </td>
                                             
                                            <td>
                                            <a href = "#view-info" data-bs-toggle ="modal" class= "link  link-primary"><i class ="fa fa-eye text-primary"></i></a>
                                            </td>                                           
                                        </tr>
                                   </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-4 px-3">
                            <div class="row g-0 shadow-lg">

                           
                            <div class="row g-0 bg py-1 bg-primary">

                            </div>
                            <div class="row g-0   justify-content-center bg-bar">
                                <div class= "ms-4"><span class="fs-5 text-info">Kagawad 2</span></div> 
                                <div class="col-xl-8 position-relative pt-2 text-center">
                                    <img src="../images/barangay.png" alt="" class= "img-fluid rounded-circle" style= "height: 130px;">
                                </div>
                                <h5 class= "text-center text-white">
                                    Alberto P. Ramos
                                </h5>
                            </div>
                            <div class="row g-0  bg-light text-center">
                                <div class="col-xl-12">
                                   <table class= "table border-none">
                                       
                                        <thead style= "border: 0px solid red;" class= "border-bottom border-primary text-secondary ">
                                            <tr>
                                                <th class= "fs-6">
                                                   Update
                                                </th>
                                                
                                                <th class= "fs-6">
                                                    View
                                                </th>
                                            </tr>
                                        </thead>
                                       
                                        <tr>
                                            <td>
                                            
                                            <a href = "#account"  data-bs-toggle= "modal" class= "link link-info"><i class= "fa fa-edit text-info"></i></a>
                                            </td>
                                            
                                            <td>
                                            <a href = "#view-info" data-bs-toggle ="modal" class= "link  link-primary"><i class ="fa fa-eye text-primary"></i></a>
                                            </td>                                           
                                        </tr>
                                   </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-4  px-3">
                            <div class="row g-0 shadow-lg">

                           
                            <div class="row g-0 bg py-1 bg-primary shadow-sm">

                            </div>
                            <div class="row g-0   justify-content-center bg-bar shadow-sm">
                                <div class= "ms-4"><span class="fs-5  text-info">Kagawad 3</span></div> 
                                <div class="col-xl-8 position-relative pt-2 text-center">
                                    <img src="../images/barangay.png" alt="" class= "img-fluid rounded-circle" style= "height: 130px;">
                                </div>
                                <h5 class= "text-center text-white">
                                    Florante V. Bonagua
                                </h5>
                            </div>
                            <div class="row g-0  bg-light text-center">
                                <div class="col-xl-12">
                                   <table class= "table border-none">
                                       
                                        <thead style= "border: 0px solid red;" class= "border-bottom border-primary text-secondary ">
                                            <tr>
                                                <th class= "fs-6">
                                                    Update
                                                </th>
                                                
                                                <th class= "fs-6">
                                                    View
                                                </th>
                                            </tr>
                                        </thead>
                                       
                                        <tr>
                                            <td>
                                                <a href = "#account" data-bs-toggle= "modal" class= "link link-info"><i class= "fa fa-edit text-info"></i></a>

                                            </td>
                                             
                                            <td>
                                            <a href = "#view-info data-bs-toggle ="modal" class= "link  link-primary"><i class ="fa fa-eye text-primary"></i></a>
                                            </td>                                           
                                        </tr>
                                   </table>
                                </div>
                            </div>
                            </div>
                        </div>
                      
                    </div>
                    <div class="row g-0 pb-3 ">
                        <div class="col-xl-4  border-secondary px-3" >
                            <div class="row g-0 shadow-lg">

                         
                            <div class="row g-0 bg py-1 bg-primary">

                            </div>
                            <div class="row g-0   justify-content-center bg-bar ">
                                <div class= "ms-4"><span class="fs-5 text-info">Kagawad 4</span></div> 
                                <div class="col-xl-8 position-relative pt-2 text-center">
                                    <img src="../images/barangay.png" alt="" class= "img-fluid rounded-circle" style= "height: 130px;">
                                </div>
                                <h5 class= "text-center text-white">
                                    Crisanto G. Lorica
                                </h5>
                            </div>
                            <div class="row g-0  bg-light text-center">
                                <div class="col-xl-12">
                                   <table class= "table border-none">
                                       
                                        <thead style= "border: 0px solid red;" class= "border-bottom border-primary text-secondary ">
                                            <tr>
                                                <th class= "fs-6">
                                                    Update
                                                </th>
                                                
                                                <th class= "fs-6">
                                                    View
                                                </th>
                                            </tr>
                                        </thead>
                                        
                                        <tr>
                                            <td>
                                          
                                            <a href = "#account"  data-bs-toggle= "modal" class= "link link-info"><i class= "fa fa-edit text-info"></i></a>
                                            </td>
                                           
                                            <td>
                                            <a href = "#view-info" data-bs-toggle ="modal" class= "link  link-primary"><i class ="fa fa-eye text-primary"></i></a>
                                            </td>                                           
                                        </tr>
                                   </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-4    px-3">
                            <div class="row g-0 shadow-lg">

                           
                            <div class="row g-0 bg py-1 bg-primary">

                            </div>
                            <div class="row g-0   justify-content-center bg-bar">
                                <div class= "ms-4"><span class="fs-5 text-info">Kagwad 5</span></div> 
                                <div class="col-xl-8 position-relative pt-2 text-center">
                                    <img src="../images/barangay.png" alt="" class= "img-fluid rounded-circle" style= "height: 130px;">
                                </div>
                                <h5 class= "text-center text-white">
                                    Alexander S. Ceño
                                </h5>
                            </div>
                            <div class="row g-0  bg-light text-center">
                                <div class="col-xl-12">
                                   <table class= "table border-none">
                                       
                                        <thead style= "border: 0px solid red;" class= "border-bottom border-primary text-secondary ">
                                            <tr>
                                                <th class= "fs-6">
                                                   Update
                                                </th>
                                              
                                                <th class= "fs-6">
                                                    View
                                                </th>
                                            </tr>
                                        </thead>
                                       
                                        <tr>
                                            <td>
                                                
                                            <a href = "#account" data-bs-toggle= "modal" class= "link link-info"><i class= "fa fa-edit text-info"></i></a>
                                            </td>
                                          
                                            <td>
                                            <a href = "#view-info" data-bs-toggle ="modal" class= "link  link-primary"><i class ="fa fa-eye text-primary"></i></a>
                                            </td>                                           
                                        </tr>
                                   </table>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-xl-4  px-3">
                            <div class="row g-0 shadow-lg">

                           
                            <div class="row g-0 bg py-1 bg-primary shadow-sm">

                            </div>
                            <div class="row g-0   justify-content-center bg-bar shadow-sm">
                                <div class= "ms-4"><span class="fs-5  text-info">Kagawad 6</span></div> 
                                <div class="col-xl-8 position-relative pt-2 text-center">
                                    <img src="../images/barangay.png" alt="" class= "img-fluid rounded-circle" style= "height: 130px;">
                                </div>
                                <h5 class= "text-center text-white">
                                    Nelson L. Labrador
                                </h5>
                            </div>
                            <div class="row g-0  bg-light text-center">
                                <div class="col-xl-12">
                                   <table class= "table border-none">
                                       
                                        <thead style= "border: 0px solid red;" class= "border-bottom border-primary text-secondary ">
                                            <tr>
                                                <th class= "fs-6">
                                                    Update
                                                </th>
                                               
                                                <th class= "fs-6">
                                                    View
                                                </th>
                                            </tr>
                                        </thead>
                                       
                                        <tr>
                                            <td>
                                         
                                            <a href = "#account" data-bs-toggle= "modal" class= "link link-info"><i class= "fa fa-edit text-info"></i></a>
                                            </td>
                                           
                                            <td>
                                            <a href = "#view-info" data-bs-toggle ="modal" class= "link  link-primary"><i class ="fa fa-eye text-primary"></i></a>
                                            </td>                                           
                                        </tr>
                                   </table>
                                </div>
                            </div>
                            </div>
                        </div>
                      
                    </div>
                    <div class="row g-0 pb-3 ">
                        <div class="col-xl-4  border-secondary px-3" >
                            <div class="row g-0 shadow-lg">

                         
                            <div class="row g-0 bg py-1 bg-primary">

                            </div>
                            <div class="row g-0   justify-content-center bg-bar ">
                                <div class= "ms-4"><span class="fs-5 text-info">Kagawad 7</span></div> 
                                <div class="col-xl-8 position-relative pt-2 text-center">
                                    <img src="../images/barangay.png" alt="" class= "img-fluid rounded-circle" style= "height: 130px;">
                                </div>
                                <h5 class= "text-center text-white">
                                    Marivic M. Villareal
                                </h5>
                            </div>
                            <div class="row g-0  bg-light text-center">
                                <div class="col-xl-12">
                                   <table class= "table border-none">
                                       
                                        <thead style= "border: 0px solid red;" class= "border-bottom border-primary text-secondary ">
                                            <tr>
                                                <th class= "fs-6">
                                                    Update
                                                </th>
                                              
                                                <th class= "fs-6">
                                                    View
                                                </th>
                                            </tr>
                                        </thead>
                                       
                                        <tr>
                                            <td>
                                         
                                            <a href = "#account" data-bs-toggle= "modal" class= "link link-info"><i class= "fa fa-edit text-info"></i></a>
                                            </td>
                                           
                                            <td>
                                            <a href = "#view-info" data-bs-toggle ="modal" role= "button"class= "link  link-primary"><i class ="fa fa-eye text-primary"></i></a>
                                            </td>                                           
                                        </tr>
                                   </table>
                                </div>
                            </div>
                            </div>
                        </div>
              
                      
                      
                    </div>
                    
                    
                </div>

    </div>


    <div class="modal fade" id = "change-dp" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content bg-info g-0  ">
                    <div class="modal-header bg-info  ">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row" align="center">
                            <div class="col-xl-12">
                                <img src="../images/admin-logo.png" alt="" class="img-fluid border border-info rounded ava"  style = "height: 185px">
                            </div>
                            <div class="col-xl-12 my-2">
                            <input type="file" id="selectedFile" style="display: none;" />
                            <button type="button"  class= "btn btn-primary" onclick="document.getElementById('selectedFile').click();" ><i class= "fa fa-camera me-2 "></i>Choose photo</button>
                      
                            </div>
                            <div class="col-xl-12">
                            <button type= "submit" class= "btn btn-success"><i class= "fa fa-save me-2"></i>Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div> 
        
        <?php include ('edit-acc.php')?>


       
        <?php 
            include('edit-sub.php');
        ?>
    


<?php } ?>
</body>
</html>