<?php

session_start();
error_reporting(0);
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
    <title>Resident Information</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <link rel = "stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../css/scrollbar.css">
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
        
        table,td,tr,th{
            
            text-align: left;
            font-size: 1.10em;
            font-family: 'Noto Sans Display', sans-serif;
            vertical-align: middle;
            
        }
     
        .white{
            color: white;
        }
        .black{
            color: #000;
        }
        .right{
            margin-left: 8.5%;
        }
        .er{
            border-radius: 10px 10px 0px 0px;
        }
        
        @media (max-width: 576px){
            .tab-pane .row{
                overflow-x: auto;
            }
            .right{
                margin: auto;
            }
            .dis{
                font-size: 15px;
            }
            .ser{
                width: 100%;
            }
           
        }
    </style>
</head>
<body>

    <?php 
        $curr = "Resident Profile";
        include ('../includes/sidebar.php');
    ?>
<div class="d-flex align-items-center">
                <div class="container mx-5 mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a  class= "text-decoration-none" href="admin-residence.php"><i class="fa fa-users"></i>&nbsp;Resident List</a></li>
                            
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-address-book text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
			<?php
				$vid=$_GET['viewid'];
				$clientmsaid=$_SESSION['clientmsaid'];
				$sql="select * from tblresident where ID=:vid";
				$query = $dbh -> prepare($sql);
				$query->bindParam(':vid',$vid,PDO::PARAM_STR);
				$query->execute();

				$results=$query->fetchAll(PDO::FETCH_OBJ);

				$cnt=1;
				if($query->rowCount() > 0)
				{
				    foreach($results as $row)
				{               
			?>

            <div class="container-fluid px-5">
                    <div class="row px-5">
                        <div class="col-xl-5"></div>
                        <div class="col-xl-7">
                            <div class="float-end">
                                <a href="#" onclick = "window.history.back();" class="link link-primary text-decoration-none fs-4"><i class="fa fa-arrow-circle-left me-2"></i>Go back</a>
                            </div>
                            
                        </div>
                    </div>
            </div>
            <?php
                 $gbd = $row->BirthDate;
                  $gbd = date('Y-m-d', strtotime($gbd));
                  $today = date('Y-m-d');
                  $diff = date_diff(date_create($gbd), date_create($today));
                 
                ?>
                  
        
            <div class="container-fluid mx-auto px-5 mt-3 mb-2">
                <div class="row g-0 mx-2">
                    <div class="row g-0 ">
                        <div class="mx-auto col-xl-10 white   ">
                            <div class="row g-0  rounded-top "  style= "background-color:#021f4e">
                        
                                <div class="fs-5 text-white py-2 px-2">
                                        <i class="fa fa-id-card-alt fa-1x me-1">
                                        </i>
                                        Resident Number <?php echo htmlentities($row->ID);?>
                                </div>
                            </div>
                         </div>
                    </div>
                        <div class="row g-0 ">
                            <div class="col-xl-10 bg-white mx-auto text-center">
                            <label for="" class= "text-center fs-6 text-muted small">Resident's Full Name</label>
                                <div class="display-6 border-bottom text-center py-2">
                                    <?php echo htmlentities($row->LastName." ". $row->FirstName." ".$row->MiddleName);?>
                                    
                                </div>

                            </div>
                           
                        </div>
                        <div class="row g-0 ">
                            <div class="col-xl-10 bg-white mx-auto text-center">
                                <div class="row g-0">
                                            <div class="col-xl-10 mx-auto">
                                                <table class="table ">
                                                    <tbody class= "" style = "padding: 40px;">
                                                        <tr >
                                                            
                                                            <th  style = "padding-top: 5px; padding-bottom:5px;">
                                                                <i class="fa fa-mobile-alt fa-1x me-2"></i>Contact Number
                                                            </th>
                                                            <td style= "text-align: right; padding-top: 10px; padding-bottom:10px;">
                                                                <?php echo htmlentities($row->Cellphnumber);?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <th style = "padding-top: 5px; padding-bottom:5px;">
                                                                <i class="fa fa-at fa-1x me-1"></i>Email Address
                                                            </th>
                                                            <td style= "text-align: right;padding-top: 10px; padding-bottom:10px;">
                                                                <?php echo htmlentities($row->Email);?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                                <th style = "padding-top: 5px; padding-bottom:5px;">
                                                                    <i class="fa fa-map-marker-alt fa-1x me-1"></i>
                                                                    Address
                                                                </th>
                                                                <td style = "padding-top: 5px; padding-bottom:5px;text-align:right">
                                                                    <?php echo htmlentities("#".$row->houseUnit." Purok ".$row->Purok." ".$row->streetName." Street");?>
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <th style = "padding-top: 10px; padding-bottom:10px;">
                                                                <i class="fa fa-birthday-cake fa-1x me-1"></i>
                                                                Date of Birth
                                                            </th>
                                                            <td style = "padding-top: 10px; padding-bottom:10px;text-align:right">
                                                                <?php echo $gbd;?>
                                                            </td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        
                                </div>

                            </div>
                           
                        </div>
                </div>
            </div>

    <div class="container-fluid mx-auto px-5 mb-5">
        <div class="row g-0 mx-2">
            <div class="row g-2">
                <div class="mx-auto col-xl-11 ">
                    <div class="row g-0  rounded-top border bg-white">
                        <div class="col-xl-8 py-2 px-2  ">
                            <nav class="nav nav-pills flex-column  flex-sm-row">
                                <a class="flex-sm-fill  fs-5 text-sm-center nav-link active" aria-current="page" href="#personal" data-bs-toggle ="tab">Personal Details</a>
                                <a class="flex-sm-fill fs-5 text-sm-center nav-link" href="#cases" data-bs-toggle ="tab">Cases</a>
                                <a class="flex-sm-fill fs-5 text-sm-center nav-link" href="#cert" data-bs-toggle ="tab">Certifications Availed</a>
                                <a class="flex-sm-fill fs-5 text-sm-center nav-link" href="#services" data-bs-toggle ="tab" >Services Availed</a>
        
        
                            </nav>

                        </div>
                        
                    </div>
                    
                    
             
                    <div class="tab-content shadow-sm">
                        
           
                        <div class="tab-pane active" id = "personal">
                            <div class="row g-0 bg-white px-4 ">
                                <div class="row gy-0 gx-0  ps-3 mt-3 bg-info er border border-info shadow-sm">

                                 
                                </div>
                                <div class="row g-0 border-bottom border-start  mb-5 rounded-bottom shadow">
                                    <div class="row g-0">
                                        
                                        <div class="row g-0 mb-5 py-5 px-5 ">
                                            <div class="col-xl-12  border-start  shadow-sm">
                                                
                                                <table class="table ">
                                                    <thead class= " bg-light text-center">
                                                    <tr>
                                                        <th colspan= 2 class= "text-center">
                                                            <i class="fa fa-street-view">

                                                            </i>
                                                            Residency Information
                                                        </th>
                                                    </tr>

                                                    </thead>
                                                    <tbody class= "" style = "padding: 10px;">
                                                        <tr>
                                                            
                                                            <th>
                                                                <i class=""></i>Residency Type
                                                            </th>
                                                            <td  style= "text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                <?php echo htmlentities($row->ResidentType);?>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-xl-12  border-end border-bottom shadow-sm">
                                            <table class="table  ">
                                                    <thead class= " bg-light text-center">
                                                    <tr>
                                                        <th colspan= 2 class= "text-center">
                                                            <i class="fa fa-user">

                                                            </i>
                                                            Personal Information
                                                        </th>
                                                    </tr>

                                                    </thead>
                                                    <tbody class= " mt-2" style = "padding: 10px;">
                                                    
                                                       
                                                        <tr>
                                                            
                                                            <th>
                                                                Gender
                                                            </th>
                                                            <td  style= "text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                <?php echo htmlentities($row->Gender);?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <th>
                                                                Civil Status
                                                            </th>
                                                            <td style= "text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                <?php echo htmlentities($row->CivilStatus);?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                        <tr>
                                                            
                                                            <th>
                                                                Voter Status
                                                            </th>
                                                            <td  style= "text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                <?php echo htmlentities($row->voter);?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <th>
                                                                Voter Precinct
                                                            </th>
                                                            <td  style= "text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                <?php echo htmlentities($row->vPrecinct);?>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            
                                                            <th>
                                                                SSS number
                                                            </th>
                                                            <td  style= "text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                <?php echo htmlentities($row->sssNumber);?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <th>
                                                                TIN number
                                                            </th>
                                                            <td  style= "text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                <?php echo htmlentities($row->tinNumber);?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                    
                                                    </tbody>
                                                </table>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0 bg-white" >        
                                <div class="col-xl-11 mx-2  mx-auto  px-2">       
                           
                                    <?php $cnt=$cnt+1;}} ?>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="cases">
                        <div class="row g-0 border bg-white" >
                            <div class="col-xl-11 mx-2  mx-auto  px-2">
                                <div class="row  g-0 ">
                                    <div class="col-xl-12 mx-2  mx-auto py-3  px-2">
                                        <table class="table shadow-sm  bg-white table-hover bor "> 
                                            <thead class = "bg-light">
                                            
                                                <tr>
                                                    <th class= "bor" style = "text-align: left">Status</th>
                                                    <th class= "bor" style = "text-align: left">Incident Type</th>
                                                    <th class= "bor" style = "text-align: left">Date Time Reported</th>
                                                    <th class= "bor" style = "text-align: left">Incident's Estimated Time </th>
                                                    <th class= "bor" style = "text-align: center">Actions</th>
                                                
                                                </tr>
                                        
                                            </thead>           
                                            <tbody class= "table-hover">
                                                <tr>
                                                    <td class= "bor" scope="col" style = "text-align: left">On-going</td>
                                                    <td class= "bor" scope="col" style = "text-align: left">Public Disturbance</td>
                                                    <td class= "bor" scope="col" style = "text-align: left">12-10-2021</td>
                                                    <td class= "bor" scope="col" style = "text-align: left">6:00pm</td>
                                                    <td  class= "bor"   scope="col" style = "text-align: center">
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a type="" href ="blotter-report.php"class="btn btng btn-primary"><i class = "fa fa-print"></i></a>
                                                            </div>
                                                        
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a href ="edit-blotter.php"class="btn btng btn-success"><i class = "fa fa-edit"></i></a>
                                                            </div>
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a type="button" href ="#delete-blotter-record" data-bs-toggle = "modal" role = "button" class="btn btng btn-danger"><i class = "fa fa-trash"></i></a>
                                                            </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>                        
                                    </div>   
                                </div>
                            </div>
                               
                        </div>
                      
                            
                                
                        
                        </div>
                        <div class="tab-pane" id="cert">
                            <div class="row g-0 border bg-white" > 
                                <div class="col-xl-11 mx-2  mx-auto  px-2">
                                    <div class="row  g-0">
                                        <div class="col-xl-12 mx-2  mx-auto py-3">
                                            <table class="table bg-white table-hover bor "> 
                                                <thead class ="bg-light">
                                                    <tr class="bor">
                
                                                        <th class = "bor" style = "text-align: left">BCN</th>
                                                        <th class= "bor" style = "text-align: left">Status</th>
                                                        <th class = "bor" style = "text-align: left">Purpose</th>
                                                        <th class = "bor" style = "text-align: left">Requested Certificate</th>
                                                        <th class = "bor" style = "text-align: left">Certificate fee</th>
                                                        <th class = "bor" style = "text-align: left">Date</th>
                                                        <th class = "bor" style = "text-align: left">Barangay Certification #</th>
                                                        <th class = "bor" style = "text-align: center">Actions</th>
                                                    </tr>        
                                                </thead>           

                                                <tbody class= "table-hover">
                                                    <tr>
                                                        <td class = "bor" scope="col" style = "text-align: left">102-22</td>
                                                        <td class = "bor" scope="col" style = "text-align: left">Settled</td>
                                         
                                                        <td class = "bor" scope="col" style = "text-align: left">For employment</td>
                                                        <td class = "bor" scope="col" style = "text-align: left">Barangay Clearance</td>
                                                        <td class = "bor" scope="col" style = "text-align: left">30 PHP</td>
                                                        <td class = "bor" scope="col" style = "text-align: left">10-12-2021</td>
                                                        <td class = "bor" scope="col" style = "text-align: left">015-22</td>
                                                        <td class = "bor" scope="col" style = "text-align: center">
                                                            
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="" href ="temp-cert.php"class="btn btng btn-success"><i class = "fa fa-print"></i></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="#delete-record" data-bs-toggle = "modal" role = "button" class="btn btng btn-danger"><i class = "fa fa-trash"></i></a>
                                                                </div>
                                                            
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>                        
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <div class="tab-pane" id="services">
                        <div class="row g-0 border bg-white" >
                    
                    <div class="col-xl-11 mx-2  mx-auto  px-2">
                        <div class="row g-0">

                            <div class="col-xl-12 mx-2  mx-auto py-3 ">
                                <table class="table bg-white table-hover bor "> 
                                    <thead class="bg-light">
                                      
                                        <tr>

                        
                                            <th style = "text-align: left; ">Requested Service/Rental</th>
                                            <th style = "text-align: left;">Date of rental</th>
                                            <th style = "text-align: left;">Duration</th>
                                            <th style = "text-align: left;">Rate</th>
                                            <th style = "text-align: left;">Status</th>
                                            
                                        
                                        
                                            <th style = "text-align: center;">Action</th>
                                
                                        </tr>
                                    
                                    </thead>           
                                    <tbody class= "table-hover">
                                        <tr>
                                          
                                            <td scope="col" style = "text-align: left">Barangay van</td>
                                            <td scope="col" style = "text-align: left">10-13-2021, 6:00am</td>
                                            <td scope="col" style = "text-align: left">2 hrs</td>
                                            <td style = "text-align: left;">40.00 PHP</td>
                                            <td scope="col" style = "text-align: left">On-going</td>

                                            <td scope="col" style = "text-align: center">
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                        <button  type="button" href ="#check-property" data-bs-toggle="modal" role="button" class="btn btng btn-primary"><i class = "fa fa-eye"></i></button>
                                                    </div>
                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                        <a href ="#edit-record    " data-bs-toggle ="modal" role ="button" class="btn btng btn-success"><i class = "fa fa-edit"></i></a>
                                                    </div>
                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                        <a type="button" href ="#delete-prop" data-bs-toggle = "modal" role = "button" class="btn btng btn-danger"><i class = "fa fa-trash"></i></a>
                                                    </div>
                                                
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>                        
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


    <!--modal-->

    <div class="modal fade" id = "delete-blotter-record" tab-idndex = "-1">
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
<?php }  ?>