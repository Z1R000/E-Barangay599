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
            font-size: 1em;
            padding: 100px;
            font-family: 'Noto Sans Display', sans-serif;
            
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
        
        @media (max-width: 576px){
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
    <div class="container-fluid mx-4 px-5">
        <div class="row g-0 mx-2">
            <div class="row g-3">
                <div class="mx-auto col-xl-10 white   ">
                    <div class="row g-0  rounded-top " style= "background-color:#021f4e">
                        <div class="fs-5 px-3 py-1">
                            Resident #<?php  echo htmlentities($row->ID);?>
                        </div>
                    </div>
                    <div class="row g-0 border bg-white">
                        <div class="col-xl-3 py-3 border-end" align = "center">
                      
                            <img src="../images/user-res.png" alt="resident" style ="width: 105px; height: 100px;">
                            <div class = "fs-6 black"><?php  echo htmlentities($row->LastName);?>, <?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->MiddleName);?></div>
                            
                        </div>
                        <div class="col-xl-4 mx-2  px-2">
                            
                            <table class="table my-3">
                                    <tr>
                                        <th class =""><i class ="fa fa-calendar me-2"></i>Age</th>
                                        <td><?php $gbd = $row->BirthDate;
												  $gbd = date('Y-m-d', strtotime($gbd));
												  $today = date('Y-m-d');
												  $diff = date_diff(date_create($gbd), date_create($today));
												  echo $diff->format('%y');?></td>
                                    </tr>
                                    <tr>
                                        <th class ="" > <i class= "fa fa-venus-mars me-1"></i> Gender</th>
                                        <td><?php  echo htmlentities($row->Gender);?></td>
                                    </tr>
                        
                                    <tr>
                                        <th class ="" > <i class= "fa fa-heart me-1"></i> Civil Status</th>
                                        <td><?php  echo htmlentities($row->CivilStatus);?></td>
                                    </tr>
                        
                            </table>
                           
                        </div>
                        <div class="col-xl-4 mx-2">
                            
                            <table class="table my-3">
                                    <tr>
                                        <th class =""><i class ="fa fa-birthday-cake me-2"></i>Birthdate</th>
                                        <td><?php $bd = $row->BirthDate; echo date('j F Y', strtotime($bd));?></td>
                                    </tr>
                                    <tr>
                                        <th class ="" > <i class= "fa fa-info me-1"></i> Status</th>
                                        <td>Active</td>
                                    </tr>
                        
                                    
                            </table>
                           
                        </div>
                    </div>
                    
                
                </div>
            
            </div>
          
        </div>
    </div>
    <div class="container-fluid mx-4 px-5 mb-5">
        <div class="row g-0 mx-2">
            <div class="row g-2">
                <div class="mx-auto col-xl-10 ">
                    <div class="row g-0  rounded-top border bg-white">
                        <div class="col-xl-10 py-2 px-2  ">
                            <nav class="nav nav-pills flex-column  flex-sm-row">
                                <a class="flex-sm-fill  text-sm-center nav-link active" aria-current="page" href="#">Personal Details</a>
                                <a class="flex-sm-fill text-sm-center nav-link" href="view-resident-account.php">Account Details</a>
                                <a class="flex-sm-fill text-sm-center nav-link" href="view-resident-cases.php">Cases</a>
                                <a class="flex-sm-fill text-sm-center nav-link" href="view-resident-certifications.php">Certifications Availed</a>
                                <a class="flex-sm-fill text-sm-center nav-link" href="view-resident-services.php">Services Availed</a>
        
        
                            </nav>

                        </div>
                        
                    </div>
                    <div class="row g-0 border bg-white" >
                    
                        <div class="col-xl-11 mx-2  mx-auto  px-2">
                            
                            <table class="table my-3" >
                                    <tr>
                                        <th class ="">Resident Type</th>
                                        <td style ="text-align: right; padding-right: 4%" ><?php  echo htmlentities($row->ResidentType);?></td>
                                    </tr>
                                    <tr>
                                        <th class ="">Contact No.</th>
                                        <td style ="text-align: right; padding-right: 4%" ><?php  echo htmlentities($row->Cellphnumber);?></td>
                                    </tr>
                                    <tr>
                                        <th class ="">First</th>
                                        <td style ="text-align: right; padding-right: 4%" ><?php  echo htmlentities($row->FirstName);?></td>
                                    </tr>
                                
                                    
                                    <tr>
                                        <th class ="">Middle Name</th>
                                        <td style ="text-align: right; padding-right: 4%" ><?php  echo htmlentities($row->MiddleName);?></td>
                                    </tr>
                                    <tr>
                                        <th class ="">Last Name</th>
                                        <td style ="text-align: right; padding-right: 4%" ><?php  echo htmlentities($row->LastName);?></td>
                                    </tr>
                                    <tr>
                                        <th class ="">House Unit/Number</th>
                                        <td style ="text-align: right; padding-right: 4%" >#<?php  echo htmlentities($row->houseUnit);?></td>
                                    </tr>
                                
                                    <tr>
                                        <th class ="">Purok</th>
                                        <td style ="text-align: right; padding-right: 4%" ><?php  echo htmlentities($row->Purok);?></td>
                                    </tr>
                                    <tr>
                                        <th class ="">Street</th>
                                        <td style ="text-align: right; padding-right: 4%" ><?php  echo htmlentities($row->streetName);?></td>
                                    </tr>
                                 
                                    <tr>
                                        <th class ="">TIN</th>
                                        <td style ="text-align: right; padding-right: 4%" ><?php  echo htmlentities($row->tinNumber);?></td>
                                    </tr>
                                    <tr>
                                        <th class ="">SSS number</th>
                                        <td style ="text-align: right; padding-right: 4%" ><?php  echo htmlentities($row->sssNumber);?></td>
                                    </tr>
                                    <tr>
                                        <th class ="">Voter Status </th>
                                        <td style ="text-align: right; padding-right: 4%" ><?php  echo htmlentities($row->voter);?></td>
                                    </tr>
                                    <tr>
                                        <th class ="">Voter Precinct </th>
                                        <td style ="text-align: right; padding-right: 4%" ><?php  echo htmlentities($row->vPrecinct);?></td>
                                    </tr>

                            </table>
							<?php $cnt=$cnt+1;}} ?>
                        </div>
                      
                    </div>
                    
                
                </div>
            
            </div>
          
        </div>
    </div>
            
           
                
    

    
</body>
</html>
<?php }  ?>