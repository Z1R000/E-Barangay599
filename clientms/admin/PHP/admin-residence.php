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
    <title>Residents</title>
   
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
            border: 1px solid #d3d3d3;
            text-align: left;
            font-size: 1em;
            padding: 100px;
            font-family: 'Noto Sans Display', sans-serif;
            
        }   

        .small{
            width: 8%;
        }
        .med{
            width: 20%;
        }
        .action{
            width: 20%;
            text-align: center;
        }
        .btng{
            width: 50px;
        }
        
        @media (max-width: 576px){
            .row{
                overflow-x: auto;
            }
            .dis{
                font-size: 15px;
            }
            .ser{
                width: 100%;
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
            
            <div class="float-end">
            <div class="container mt-4 mx-5">
                <nav aria-label="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item fs-6"><a href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                         
                            <li class="breadcrumb-item fs-6 active"><a href="#"><i class="fa fa-users text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                        </ol>
                    </nav>
                </nav>
            </div>

            </div>
            
        </nav>

        
    <div class="container-fluid my-4">
        <div class="row border mx-5 bg-white">
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

                <div class = "row g-1 px-5">
              
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class = "row my-2">
                            <div class="col-md-8">
                                  
                                <div class="btn-group" role="group">
                                    <a href = "resident-registration.php"  class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;New Resident</a>
                                </div>

                            </div>
                            <div class="col-md-4 " >
                                <form class = "d-flex" method="post" name="search" action="">
									<p style="font-size:16px; color:red" align="center"> <?php if($msg){
										echo $msg;
									  }  ?> </p>
                                        
                                        <input id="searchdata" type = "text" class= "form-control" name="searchdata"placeholder = "Search here">
                                        <button type ="submit" class = "btn btn-outline-info" name="search"><i class = "fa fa-search"></i></button>
                                </form>

                            </div>
                            
                        </div>
                    </div>
                </div>
				<?php
					if(isset($_POST['search']))
					{ 

					$sdata=$_POST['searchdata'];
				?>
				<h4 align="center">Result for "<?php echo $sdata;?>"</h4>

                <div class="row g-1 px-5">
                    
                    <div class="col-xl-12 col-md-12 col-sm-12 ">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th  scope="col">
                                        Status  </th>
                                    <th   scope="col">Name </th>
                                    <th   scope="col">Age </th>
                                    <th   scope="col">Gender </th>
                                    <th   scope="col">Purok</th>
                                    <th  scope="col">Street </th>
                                    <th   scope="col">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
								<?php
									$sql="SELECT * from tblresident where tblresident.LastName like '%$sdata%'";
									$query = $dbh -> prepare($sql);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);

									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $row)
									{               
								?>
                                <td  class ="small" scope="col">
                                    <i class ="fa fa-circle link-success me-1"></i>
                                    Active
                                </td>
                                
                                <td  scope="col"><?php  echo htmlentities($row->LastName);?>, <?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->MiddleName);?></td>
                                <td  scope = "col">35</td>
                                <td    scope="col"><i class = "fa fa-mars link-info me-2"> </i><?php  echo htmlentities($row->Gender);?> </td>
                                <td   scope="col"><?php  echo htmlentities($row->Purok);?></td>
                                <td scope="col"><?php  echo htmlentities($row->streetName);?> </td>
                                <td  class ="action" scope="col">
                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                        <a href  = "view-resident-personal.php?viewid=<?php echo $row->ID;?>" type="button" class="btn btng btn-primary"><i class = "fa fa-eye"></i></a>
                                    </div>
                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                        <a type="button" href ="edit-resident-personal.php?editid=<?php echo $row->ID;?>"class="btn btng btn-success"><i class = "fa fa-edit"></i></a>
                                    </div>
                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                        <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn btn-danger"> <i class = "fa fa-trash"></i></button>
                                    </div>
                                </td>                         
                            </tr>
                            <?php $cnt=$cnt+1;}}}else{?>   
                            </tbody>
                        </table>
                    </div>
                </div>
				<!--END SEARCH -->
				<div class="row g-1 px-5">
                    
                    <div class="col-xl-12 col-md-12 col-sm-12 ">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th  scope="col">
                                        Status  </th>
                                    <th   scope="col">Name </th>
                                    <th   scope="col">Age </th>
                                    <th   scope="col">Gender </th>
                                    <th   scope="col">Purok</th>
                                    <th  scope="col">Street </th>
                                    <th   scope="col">Action </th>
                                </tr>   
                            </thead>
                            <tbody>
                            <tr>
								<?php
									$sql="SELECT * from tblresident";
									$query = $dbh -> prepare($sql);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);

									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $row)
									{               
								?>
                                <td  class ="small" scope="col">
                                    <i class ="fa fa-circle link-success me-1"></i>
                                    Active
                                </td>
                                
                                <td  scope="col"><?php  echo htmlentities($row->LastName);?>, <?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->MiddleName);?></td>
                                <td  scope = "col"><?php $gbd = $row->BirthDate;
												  $gbd = date('Y-m-d', strtotime($gbd));
												  $today = date('Y-m-d');
												  $diff = date_diff(date_create($gbd), date_create($today));
												  echo $diff->format('%y');?></td>
                                <td    scope="col"><i class = "fa fa-mars link-info me-2"> </i><?php  echo htmlentities($row->Gender);?> </td>
                                <td   scope="col"><?php  echo htmlentities($row->Purok);?></td>
                                <td scope="col"><?php  echo htmlentities($row->streetName);?> </td>
                                <td  class ="action" scope="col">
                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                        <a href  = "view-resident-personal.php?viewid=<?php echo $row->ID;?>" type="button" class="btn btng btn-primary"><i class = "fa fa-eye"></i></a>
                                    </div>
                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                        <a type="button" href ="edit-resident-personal.php?editid=<?php echo $row->ID;?>"class="btn btng btn-success"><i class = "fa fa-edit"></i></a>
                                    </div>
                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                        <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn btn-danger"> <i class = "fa fa-trash"></i></button>
                                    </div>
                                </td>
                            
                            
                            </tr>
                            <?php $cnt=$cnt+1;}}}?>   
                            </tbody>
                        </table>
                    </div>
                    <!--<div class="row  border justiy-content-center">
                       
                        <div class="col-xl-4"></div>
                        <div class="col-xl-4"></div>
                        <div class="col-xl-4"><a class= "" href = "#"> <i class="fas fa-forward fa-2x text-primary"></i></a></div>
                    </div>-->

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
<?php }  ?>