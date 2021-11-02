<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    $connect = mysqli_connect("localhost", "root", "", "clientmsdb");  
    
  	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Residents</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    
    <script src="script/searchshowpage.js"></script>  
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  

    <link rel = "stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../css/scroll.css">
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
        
        table,td,tr,th{
            border: 1px solid #d3d3d3;
            text-align: left;
            font-size: 1.02em;
        
            font-family: 'Noto Sans Display', sans-serif;
            
        }
     
       
        .action{
          
            text-align: center;
        }
        .btng{
            width: 50px;
        }
        
        @media (max-width: 576px){
            table{
                overflow-y: auto;
            }
            .wal{
                display:none;
            }
            .dis{
                font-size: 15px;
            }
            .ser{
                width: 100%;
            }
            .btnx{
                width:50px;
            }
           
        }
        .red{
            background:#8B0000;
            border: 1px solid #8B0000;
        }
        .white{
            color: white;
        }
    </style>
</head>
<body>

    <?php 
        $curr = "Resident List";
        include ('../includes/sidebar.php');
    ?> 
            <!--breadcrumb-->
            
            <div class="d-flex align-items-center">
                <div class="container  mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                               
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-users text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>

        <div class="container-fluid px-5">
                    <div class="row px-5">
                        <div class="col-xl-5"></div>
                        <div class="col-xl-7">
                            <div class="float-end">
                                <a href="admin-dashboard.php"  class="link link-primary text-decoration-none fs-4"><i class="fa fa-arrow-circle-left me-2"></i>Go back</a>
                            </div>
                            
                        </div>
                    </div>
            </div>
        
    <div class="container-fluid my-4  ">
        <div class="row border mx-5 bg-white shadow-lg">
            <div class="row border-bottom g-0 py-1 px-3">
                <h4 class="fs-5">
                    <i class ="fa fa-chart-bar"></i>
                    Resident List
                </h4>
            </div>
            
                <!--<div class="row g-0 mb-5">
                    <div class="row g-2 px-5">
                        <div class="col-xl-8 col-md-12 col-sm-12 col-sm-12">

                        </div>
                    <div class="col-xl-4 col-md- 12 col-xs-12 col-sm-12 float-end">
                        <div class="d-flex float-end">
                            <div class="dis fs-4 me-3 d-flex">Search:</div>
                            <input class = "ser form-control"type="text" placeholder ="Search here">
                            
                        </div>
                    </div>
                </div>-->

                <div class = "row g-1 px-3">
              
                    <div class="col-xl-12 col-md-12 col-sm-12 ">
                        <div class = "row my-2">
                            <div class="col-md-6" >
                                  
                                <div class="btn-group" role="group">
                                    <a href = "admin-registrations.php"  class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-archive"></i>&nbsp;Pending Requests</a>
                                </div>

                            </div>

                            
                        </div>
                    </div>
                </div>
                                    
            
                
                <div class="container-fluid px-5 mx-auto">
                    <div class="row  g-0" style= "border-radius: 10px 10px 0px 0px;">
                        <ul class="nav nav-pills py-2" id="pills-tab" role="tablist">
                            <li class="nav-item px-1 py-2" role="presentation">
                                <button class="btn btn-outline-primary active fs-5" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#all" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All Residents</button>
                            </li>
                            <li class="nav-item px-1 py-2" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#p1" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Purok 1</button>
                            </li>
                            <li class="nav-item px-1 py-2" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p2" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 2</button>
                            </li>
                            <li class="nav-item px-1 py-2" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p3" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 3</button>
                            </li>
                            <li class="nav-item px-1 py-2" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p4" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 4</button>
                            </li>
                            <li class="nav-item px-1 py-2" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p5" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 5</button>
                            </li>
                            <li class="nav-item px-1 py-2" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p6" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 6</button>
                            </li>
                            <li class="nav-item px-1 py-2" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p7" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 7</button>
                            </li>
                            <li class="nav-item px-1 py-2" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p8" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 8</button>
                            </li>
                            <li class="nav-item px-1 py-2" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p9" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 9</button>
                            </li>
                            <li class="nav-item px-1 py-2" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p10" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 10</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <?php $query ="SELECT * FROM tblresident ORDER BY LastName ASC";  
                        $result = mysqli_query($connect, $query);  ?>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id = "all">
                        <div class="container-fluid">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"  >
                                    <div class="row" >
                                        <div class="col-xl-12" style= "overflow:auto;" id = "res_table">                                    
                                            <div class="table-responsive">  
                                                <table id="alldata" class="table bg-white rounded shadow-sm  table-hover table-bordered ">  
                                                <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Name</th>

                                                        <th>Age</th>

                                                        <th>Gender</th>

                                                        <th>Purok</th>
                                                        
                                                        <th>Street</th>
                                                    
                                                    
                                                        <th>Action </th>
                                                    </tr>   
                                                </thead>
                                                    <?php  
                                                    while($row = mysqli_fetch_array($result))  
                                                    {  
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle link-success me-1"></i>
                                                                    Active
                                                                </td>
                                                                <td >'.$row["LastName"].', '.$row["FirstName"].' '.$row["MiddleName"].' '.$row["Suffix"].'</td>';

                                                                $gbd = $row["BirthDate"];
                                                                $gbd = date('Y-m-d', strtotime($gbd));
                                                                $today = date('Y-m-d');
                                                                $diff = date_diff(date_create($gbd), date_create($today));
                                                          
                                                        echo '
                                                                <td>'.$diff->format('%y').'</td>  
                                                                <td><i class = "fa';
                                                                $gend = $row["Gender"];
                                                                $gen = "fa fa-venus link-danger ";
                                                                if ($gend =="Female"){
                                                                    echo $gen;
                                                                }
                                                                else{
                                                                    $gen = "fa fa-mars link-info ";  
                                                                    echo $gen;
                                                                }
                                                        echo 'me-2"> </i>'.$row["Gender"].'</td>  
                                                                <td>'.$row["Purok"].'</td>  
                                                                <td>'.$row["streetName"].'</td>  
                                                                <td  class ="action" scope="col">
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a href  = "view-resident-personal.php?viewid='.$row["ID"].'" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid='.$row["ID"].'"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Edit</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash mx-1"></i><span class= "wal">Delete</button>
                                                                </div>
                                                            </td> 
                                                        </tr>  
                                                        ';  
                                                    }  
                                                    ?>  
                                                </table>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <?php $query ="SELECT * FROM tblresident WHERE Purok=1 ORDER BY LastName ASC";  
                        $result = mysqli_query($connect, $query);  ?>

                    <div class="tab-pane fade show" id="p1">
                        <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <div class="" style= "overflow-x:auto">
                                            <div class="table-responsive">  
                                                <table id="p1data" class="table bg-white rounded shadow-sm  table-hover table-bordered ">  
                                                <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Name</th>

                                                        <th>Age</th>

                                                        <th>Gender</th>

                                                        <th>Purok</th>
                                                        
                                                        <th>Street</th>
                                                    
                                                    
                                                        <th>Action </th>
                                                    </tr>   
                                                </thead>
                                                    <?php  
                                                    while($row = mysqli_fetch_array($result))  
                                                    {  
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle link-success me-1"></i>
                                                                    Active
                                                                </td>
                                                                <td >'.$row["LastName"].', '.$row["FirstName"].' '.$row["MiddleName"].' '.$row["Suffix"].'</td>';

                                                                $gbd = $row["BirthDate"];
                                                                $gbd = date('Y-m-d', strtotime($gbd));
                                                                $today = date('Y-m-d');
                                                                $diff = date_diff(date_create($gbd), date_create($today));
                                                          
                                                        echo '
                                                                <td>'.$diff->format('%y').'</td>  
                                                                <td><i class = "fa';
                                                                $gend = $row["Gender"];
                                                                $gen = "fa fa-venus link-danger ";
                                                                if ($gend =="Female"){
                                                                    echo $gen;
                                                                }
                                                                else{
                                                                    $gen = "fa fa-mars link-info ";  
                                                                    echo $gen;
                                                                }
                                                        echo 'me-2"> </i>'.$row["Gender"].'</td>  
                                                                <td>'.$row["Purok"].'</td>  
                                                                <td>'.$row["streetName"].'</td>  
                                                                <td  class ="action" scope="col">
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a href  = "view-resident-personal.php?viewid='.$row["ID"].'" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid='.$row["ID"].'"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Edit</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash mx-1"></i><span class= "wal">Delete</button>
                                                                </div>
                                                                </td> 
                                                        </tr>  
                                                        ';  
                                                    }  
                                                    ?>  
                                                </table>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                    
                    <?php $query ="SELECT * FROM tblresident WHERE Purok=2 ORDER BY LastName ASC";  
                        $result = mysqli_query($connect, $query);  ?>
                    
                    <div class="tab-pane fade show" id="p2">
                        <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <div class="col" style= "overflow-x:auto">
                                            <div class="table-responsive">  
                                                <table id="p2data" class="table bg-white rounded shadow-sm  table-hover table-bordered ">  
                                                <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Name</th>

                                                        <th>Age</th>

                                                        <th>Gender</th>

                                                        <th>Purok</th>
                                                        
                                                        <th>Street</th>
                                                    
                                                    
                                                        <th>Action </th>
                                                    </tr>   
                                                </thead>
                                                    <?php  
                                                    while($row = mysqli_fetch_array($result))  
                                                    {  
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle link-success me-1"></i>
                                                                    Active
                                                                </td>
                                                                <td >'.$row["LastName"].', '.$row["FirstName"].' '.$row["MiddleName"].' '.$row["Suffix"].'</td>';

                                                                $gbd = $row["BirthDate"];
                                                                $gbd = date('Y-m-d', strtotime($gbd));
                                                                $today = date('Y-m-d');
                                                                $diff = date_diff(date_create($gbd), date_create($today));
                                                          
                                                        echo '
                                                                <td>'.$diff->format('%y').'</td>  
                                                                <td><i class = "fa';
                                                                $gend = $row["Gender"];
                                                                $gen = "fa fa-venus link-danger ";
                                                                if ($gend =="Female"){
                                                                    echo $gen;
                                                                }
                                                                else{
                                                                    $gen = "fa fa-mars link-info ";  
                                                                    echo $gen;
                                                                }
                                                        echo 'me-2"> </i>'.$row["Gender"].'</td>  
                                                                <td>'.$row["Purok"].'</td>  
                                                                <td>'.$row["streetName"].'</td>  
                                                                <td  class ="action" scope="col">
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a href  = "view-resident-personal.php?viewid='.$row["ID"].'" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid='.$row["ID"].'"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Edit</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash mx-1"></i><span class= "wal">Delete</button>
                                                                </div>
                                                            </td> 
                                                        </tr>  
                                                        ';  
                                                    }  
                                                    ?>  
                                                </table>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $query ="SELECT * FROM tblresident WHERE Purok=3 ORDER BY LastName ASC";  
                        $result = mysqli_query($connect, $query);  ?>

                    <div class="tab-pane fade show" id="p3">
                        <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <div class="col" style= "overflow-x:auto">
                                            <div class="table-responsive">  
                                                <table id="p3data" class="table bg-white rounded shadow-sm  table-hover table-bordered ">  
                                                <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Name</th>

                                                        <th>Age</th>

                                                        <th>Gender</th>

                                                        <th>Purok</th>
                                                        
                                                        <th>Street</th>
                                                    
                                                    
                                                        <th>Action </th>
                                                    </tr>   
                                                </thead>
                                                    <?php  
                                                    while($row = mysqli_fetch_array($result))  
                                                    {  
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle link-success me-1"></i>
                                                                    Active
                                                                </td>
                                                                <td >'.$row["LastName"].', '.$row["FirstName"].' '.$row["MiddleName"].' '.$row["Suffix"].'</td>';

                                                                $gbd = $row["BirthDate"];
                                                                $gbd = date('Y-m-d', strtotime($gbd));
                                                                $today = date('Y-m-d');
                                                                $diff = date_diff(date_create($gbd), date_create($today));
                                                          
                                                        echo '
                                                                <td>'.$diff->format('%y').'</td>  
                                                                <td><i class = "fa';
                                                                $gend = $row["Gender"];
                                                                $gen = "fa fa-venus link-danger ";
                                                                if ($gend =="Female"){
                                                                    echo $gen;
                                                                }
                                                                else{
                                                                    $gen = "fa fa-mars link-info ";  
                                                                    echo $gen;
                                                                }
                                                        echo 'me-2"> </i>'.$row["Gender"].'</td>  
                                                                <td>'.$row["Purok"].'</td>  
                                                                <td>'.$row["streetName"].'</td>  
                                                                <td  class ="action" scope="col">
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a href  = "view-resident-personal.php?viewid='.$row["ID"].'" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid='.$row["ID"].'"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Edit</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash mx-1"></i><span class= "wal">Delete</button>
                                                                </div>
                                                            </td> 
                                                        </tr>  
                                                        ';  
                                                    }  
                                                    ?>  
                                                </table>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $query ="SELECT * FROM tblresident WHERE Purok=4 ORDER BY LastName ASC";  
                        $result = mysqli_query($connect, $query);  ?>

                    <div class="tab-pane fade show" id="p4">
                        <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <div class="" style= "overflow-x:auto">
                                            <div class="table-responsive">  
                                                <table id="p4data" class="table bg-white rounded shadow-sm  table-hover table-bordered ">  
                                                <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Name</th>

                                                        <th>Age</th>

                                                        <th>Gender</th>

                                                        <th>Purok</th>
                                                        
                                                        <th>Street</th>
                                                    
                                                    
                                                        <th>Action </th>
                                                    </tr>   
                                                </thead>
                                                    <?php  
                                                    while($row = mysqli_fetch_array($result))  
                                                    {  
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle link-success me-1"></i>
                                                                    Active
                                                                </td>
                                                                <td >'.$row["LastName"].', '.$row["FirstName"].' '.$row["MiddleName"].' '.$row["Suffix"].'</td>';

                                                                $gbd = $row["BirthDate"];
                                                                $gbd = date('Y-m-d', strtotime($gbd));
                                                                $today = date('Y-m-d');
                                                                $diff = date_diff(date_create($gbd), date_create($today));
                                                          
                                                        echo '
                                                                <td>'.$diff->format('%y').'</td>  
                                                                <td><i class = "fa';
                                                                $gend = $row["Gender"];
                                                                $gen = "fa fa-venus link-danger ";
                                                                if ($gend =="Female"){
                                                                    echo $gen;
                                                                }
                                                                else{
                                                                    $gen = "fa fa-mars link-info ";  
                                                                    echo $gen;
                                                                }
                                                        echo 'me-2"> </i>'.$row["Gender"].'</td>  
                                                                <td>'.$row["Purok"].'</td>  
                                                                <td>'.$row["streetName"].'</td>  
                                                                <td  class ="action" scope="col">
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a href  = "view-resident-personal.php?viewid='.$row["ID"].'" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid='.$row["ID"].'"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Edit</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash mx-1"></i><span class= "wal">Delete</button>
                                                                </div>
                                                            </td> 
                                                        </tr>  
                                                        ';  
                                                    }  
                                                    ?>  
                                                </table>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $query ="SELECT * FROM tblresident WHERE Purok=5 ORDER BY LastName ASC";  
                        $result = mysqli_query($connect, $query);  ?>                        
                   
                    <div class="tab-pane fade show" id="p5">
                        <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <div class="" style= "overflow-x:auto">
                                            <div class="table-responsive">  
                                                <table id="p5data" class="table bg-white rounded shadow-sm  table-hover table-bordered ">  
                                                <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Name</th>

                                                        <th>Age</th>

                                                        <th>Gender</th>

                                                        <th>Purok</th>
                                                        
                                                        <th>Street</th>
                                                    
                                                    
                                                        <th>Action </th>
                                                    </tr>   
                                                </thead>
                                                    <?php  
                                                    while($row = mysqli_fetch_array($result))  
                                                    {  
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle link-success me-1"></i>
                                                                    Active
                                                                </td>
                                                                <td >'.$row["LastName"].', '.$row["FirstName"].' '.$row["MiddleName"].' '.$row["Suffix"].'</td>';

                                                                $gbd = $row["BirthDate"];
                                                                $gbd = date('Y-m-d', strtotime($gbd));
                                                                $today = date('Y-m-d');
                                                                $diff = date_diff(date_create($gbd), date_create($today));
                                                          
                                                        echo '
                                                                <td>'.$diff->format('%y').'</td>  
                                                                <td><i class = "fa';
                                                                $gend = $row["Gender"];
                                                                $gen = "fa fa-venus link-danger ";
                                                                if ($gend =="Female"){
                                                                    echo $gen;
                                                                }
                                                                else{
                                                                    $gen = "fa fa-mars link-info ";  
                                                                    echo $gen;
                                                                }
                                                        echo 'me-2"> </i>'.$row["Gender"].'</td>  
                                                                <td>'.$row["Purok"].'</td>  
                                                                <td>'.$row["streetName"].'</td>  
                                                                <td  class ="action" scope="col">
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a href  = "view-resident-personal.php?viewid='.$row["ID"].'" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid='.$row["ID"].'"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Edit</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash mx-1"></i><span class= "wal">Delete</button>
                                                                </div>
                                                            </td> 
                                                        </tr>  
                                                        ';  
                                                    }  
                                                    ?>  
                                                </table>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                    <?php $query ="SELECT * FROM tblresident WHERE Purok=6 ORDER BY LastName ASC";  
                        $result = mysqli_query($connect, $query);  ?>

                    <div class="tab-pane fade show" id="p6">
                        <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <div class="" style= "overflow-x:auto">
                                            <div class="table-responsive">  
                                                <table id="p6data" class="table bg-white rounded shadow-sm  table-hover table-bordered ">  
                                                <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Name</th>

                                                        <th>Age</th>

                                                        <th>Gender</th>

                                                        <th>Purok</th>
                                                        
                                                        <th>Street</th>
                                                    
                                                    
                                                        <th>Action </th>
                                                    </tr>   
                                                </thead>
                                                    <?php  
                                                    while($row = mysqli_fetch_array($result))  
                                                    {  
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle link-success me-1"></i>
                                                                    Active
                                                                </td>
                                                                <td >'.$row["LastName"].', '.$row["FirstName"].' '.$row["MiddleName"].' '.$row["Suffix"].'</td>';

                                                                $gbd = $row["BirthDate"];
                                                                $gbd = date('Y-m-d', strtotime($gbd));
                                                                $today = date('Y-m-d');
                                                                $diff = date_diff(date_create($gbd), date_create($today));
                                                          
                                                        echo '
                                                                <td>'.$diff->format('%y').'</td>  
                                                                <td><i class = "fa';
                                                                $gend = $row["Gender"];
                                                                $gen = "fa fa-venus link-danger ";
                                                                if ($gend =="Female"){
                                                                    echo $gen;
                                                                }
                                                                else{
                                                                    $gen = "fa fa-mars link-info ";  
                                                                    echo $gen;
                                                                }
                                                        echo 'me-2"> </i>'.$row["Gender"].'</td>  
                                                                <td>'.$row["Purok"].'</td>  
                                                                <td>'.$row["streetName"].'</td>  
                                                                <td  class ="action" scope="col">
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a href  = "view-resident-personal.php?viewid='.$row["ID"].'" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid='.$row["ID"].'"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Edit</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash mx-1"></i><span class= "wal">Delete</button>
                                                                </div>
                                                            </td> 
                                                        </tr>  
                                                        ';  
                                                    }  
                                                    ?>  
                                                </table>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php $query ="SELECT * FROM tblresident WHERE Purok=7 ORDER BY LastName ASC";  
                        $result = mysqli_query($connect, $query);  ?>

                     <div class="tab-pane fade show" id="p7">
                        <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <div class="" style= "overflow-x:auto">
                                            <div class="table-responsive">  
                                                <table id="p7data" class="table bg-white rounded shadow-sm  table-hover table-bordered ">  
                                                <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Name</th>

                                                        <th>Age</th>

                                                        <th>Gender</th>

                                                        <th>Purok</th>
                                                        
                                                        <th>Street</th>
                                                    
                                                    
                                                        <th>Action </th>
                                                    </tr>   
                                                </thead>
                                                    <?php  
                                                    while($row = mysqli_fetch_array($result))  
                                                    {  
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle link-success me-1"></i>
                                                                    Active
                                                                </td>
                                                                <td >'.$row["LastName"].', '.$row["FirstName"].' '.$row["MiddleName"].' '.$row["Suffix"].'</td>';

                                                                $gbd = $row["BirthDate"];
                                                                $gbd = date('Y-m-d', strtotime($gbd));
                                                                $today = date('Y-m-d');
                                                                $diff = date_diff(date_create($gbd), date_create($today));
                                                          
                                                        echo '
                                                                <td>'.$diff->format('%y').'</td>  
                                                                <td><i class = "fa';
                                                                $gend = $row["Gender"];
                                                                $gen = "fa fa-venus link-danger ";
                                                                if ($gend =="Female"){
                                                                    echo $gen;
                                                                }
                                                                else{
                                                                    $gen = "fa fa-mars link-info ";  
                                                                    echo $gen;
                                                                }
                                                        echo 'me-2"> </i>'.$row["Gender"].'</td>  
                                                                <td>'.$row["Purok"].'</td>  
                                                                <td>'.$row["streetName"].'</td>  
                                                                <td  class ="action" scope="col">
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a href  = "view-resident-personal.php?viewid='.$row["ID"].'" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid='.$row["ID"].'"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Edit</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash mx-1"></i><span class= "wal">Delete</button>
                                                                </div>
                                                            </td> 
                                                        </tr>  
                                                        ';  
                                                    }  
                                                    ?>  
                                                </table>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $query ="SELECT * FROM tblresident WHERE Purok=8 ORDER BY LastName ASC";  
                        $result = mysqli_query($connect, $query);  ?>
                   
                    <div class="tab-pane fade show" id="p8">
                        <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <div class="" style= "overflow-x:auto">
                                            <div class="table-responsive">  
                                                <table id="p8data" class="table bg-white rounded shadow-sm  table-hover table-bordered ">  
                                                <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Name</th>

                                                        <th>Age</th>

                                                        <th>Gender</th>

                                                        <th>Purok</th>
                                                        
                                                        <th>Street</th>
                                                    
                                                    
                                                        <th>Action </th>
                                                    </tr>   
                                                </thead>
                                                    <?php  
                                                    while($row = mysqli_fetch_array($result))  
                                                    {  
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle link-success me-1"></i>
                                                                    Active
                                                                </td>
                                                                <td >'.$row["LastName"].', '.$row["FirstName"].' '.$row["MiddleName"].' '.$row["Suffix"].'</td>';

                                                                $gbd = $row["BirthDate"];
                                                                $gbd = date('Y-m-d', strtotime($gbd));
                                                                $today = date('Y-m-d');
                                                                $diff = date_diff(date_create($gbd), date_create($today));
                                                          
                                                        echo '
                                                                <td>'.$diff->format('%y').'</td>  
                                                                <td><i class = "fa';
                                                                $gend = $row["Gender"];
                                                                $gen = "fa fa-venus link-danger ";
                                                                if ($gend =="Female"){
                                                                    echo $gen;
                                                                }
                                                                else{
                                                                    $gen = "fa fa-mars link-info ";  
                                                                    echo $gen;
                                                                }
                                                        echo 'me-2"> </i>'.$row["Gender"].'</td>  
                                                                <td>'.$row["Purok"].'</td>  
                                                                <td>'.$row["streetName"].'</td>  
                                                                <td  class ="action" scope="col">
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a href  = "view-resident-personal.php?viewid='.$row["ID"].'" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid='.$row["ID"].'"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Edit</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash mx-1"></i><span class= "wal">Delete</button>
                                                                </div>
                                                            </td> 
                                                        </tr>  
                                                        ';  
                                                    }  
                                                    ?>  
                                                </table>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $query ="SELECT * FROM tblresident WHERE Purok=9 ORDER BY LastName ASC";  
                        $result = mysqli_query($connect, $query);  ?>
                    
                    <div class="tab-pane fade show" id="p9">
                        <div class="container-fluid " style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <div class="" style= "overflow-x:auto">
                                            <div class="table-responsive">  
                                                <table id="p9data" class="table bg-white rounded shadow-sm  table-hover table-bordered ">  
                                                <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Name</th>

                                                        <th>Age</th>

                                                        <th>Gender</th>

                                                        <th>Purok</th>
                                                        
                                                        <th>Street</th>
                                                    
                                                    
                                                        <th>Action </th>
                                                    </tr>   
                                                </thead>
                                                    <?php  
                                                    while($row = mysqli_fetch_array($result))  
                                                    {  
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle link-success me-1"></i>
                                                                    Active
                                                                </td>
                                                                <td >'.$row["LastName"].', '.$row["FirstName"].' '.$row["MiddleName"].' '.$row["Suffix"].'</td>';

                                                                $gbd = $row["BirthDate"];
                                                                $gbd = date('Y-m-d', strtotime($gbd));
                                                                $today = date('Y-m-d');
                                                                $diff = date_diff(date_create($gbd), date_create($today));
                                                          
                                                        echo '
                                                                <td>'.$diff->format('%y').'</td>  
                                                                <td><i class = "fa';
                                                                $gend = $row["Gender"];
                                                                $gen = "fa fa-venus link-danger ";
                                                                if ($gend =="Female"){
                                                                    echo $gen;
                                                                }
                                                                else{
                                                                    $gen = "fa fa-mars link-info ";  
                                                                    echo $gen;
                                                                }
                                                        echo 'me-2"> </i>'.$row["Gender"].'</td>  
                                                                <td>'.$row["Purok"].'</td>  
                                                                <td>'.$row["streetName"].'</td>  
                                                                <td  class ="action" scope="col">
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a href  = "view-resident-personal.php?viewid='.$row["ID"].'" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid='.$row["ID"].'"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Edit</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash mx-1"></i><span class= "wal">Delete</button>
                                                                </div>
                                                            </td> 
                                                        </tr>  
                                                        ';  
                                                    }  
                                                    ?>  
                                                </table>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $query ="SELECT * FROM tblresident WHERE Purok=10 ORDER BY LastName ASC";  
                        $result = mysqli_query($connect, $query);  ?>
                  
                    <div class="tab-pane fade" id="p10">
                        <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <div class="" style= "overflow-x:auto">
                                            <div class="table-responsive">  
                                                <table id="p10data" class="table bg-white rounded shadow-sm  table-hover table-bordered ">  
                                                <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Name</th>

                                                        <th>Age</th>

                                                        <th>Gender</th>

                                                        <th>Purok</th>
                                                        
                                                        <th>Street</th>
                                                    
                                                    
                                                        <th>Action </th>
                                                    </tr>   
                                                </thead>
                                                    <?php  
                                                    while($row = mysqli_fetch_array($result))  
                                                    {  
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle link-success me-1"></i>
                                                                    Active
                                                                </td>
                                                                <td >'.$row["LastName"].', '.$row["FirstName"].' '.$row["MiddleName"].' '.$row["Suffix"].'</td>';

                                                                $gbd = $row["BirthDate"];
                                                                $gbd = date('Y-m-d', strtotime($gbd));
                                                                $today = date('Y-m-d');
                                                                $diff = date_diff(date_create($gbd), date_create($today));
                                                          
                                                        echo '
                                                                <td>'.$diff->format('%y').'</td>  
                                                                <td><i class = "fa';
                                                                $gend = $row["Gender"];
                                                                $gen = "fa fa-venus link-danger ";
                                                                if ($gend =="Female"){
                                                                    echo $gen;
                                                                }
                                                                else{
                                                                    $gen = "fa fa-mars link-info ";  
                                                                    echo $gen;
                                                                }
                                                        echo 'me-2"> </i>'.$row["Gender"].'</td>  
                                                                <td>'.$row["Purok"].'</td>  
                                                                <td>'.$row["streetName"].'</td>  
                                                                <td  class ="action" scope="col">
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a href  = "view-resident-personal.php?viewid='.$row["ID"].'" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid='.$row["ID"].'"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Edit</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash mx-1"></i><span class= "wal">Delete</button>
                                                                </div>
                                                            </td> 
                                                        </tr>  
                                                        ';  
                                                    }  
                                                    ?>  
                                                </table>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>





            
        <div class="modal fade" id = "delete" tab-idndex = "-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content g-0 bg-danger ">
                        <div class="modal-header bg-danger white ">
                            <h5 class="modal-title" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                            
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
                                    <button type = "button" class="btn btn-success rounded-circle" data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                        <i class= 'fa fa-check '></i>
                                    </button>
                                    <button type = "button" class="btn btn-danger rounded-circle" data-bs-dismiss = "modal"  name = "no" value ="No">
                                        <i class= "fa fa-times"></i>
                                    </button>
                                </form>
                            </div>
                    
                        </div>
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                </div>
            </div>

</body>
</html>
<script>  
 $(document).ready(function(){  
      $('#alldata').DataTable();  
 });  
 </script>

 <script>  
 $(document).ready(function(){  
      $('#p1data').DataTable();  
 });  
 </script>
 
 <script>  
 $(document).ready(function(){  
      $('#p2data').DataTable();  
 });  
 </script>

<script>  
 $(document).ready(function(){  
      $('#p3data').DataTable();  
 });  
 </script>

<script>  
 $(document).ready(function(){  
      $('#p4data').DataTable();  
 });  
 </script>

<script>  
 $(document).ready(function(){  
      $('#p5data').DataTable();  
 });  
 </script>

<script>  
 $(document).ready(function(){  
      $('#p6data').DataTable();  
 });  
 </script>

<script>  
 $(document).ready(function(){  
      $('#p7data').DataTable();  
 });  
 </script>

<script>  
 $(document).ready(function(){  
      $('#p8data').DataTable();  
 });  
 </script>

<script>  
 $(document).ready(function(){  
      $('#p9data').DataTable();  
 });  
 </script>

<script>  
 $(document).ready(function(){  
      $('#p10data').DataTable();  
 });  
 </script>
<?php }?>
    <!--up-->