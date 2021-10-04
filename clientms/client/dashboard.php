<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } 
     ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/sidebar.css" />
    
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <title>Resident Dashboard</title>
    <script>
        
        document.addEventListener("DOMContentLoaded", function(){
        document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
        element.addEventListener('click', function (e) {
        let nextEl = element.nextElementSibling;
        let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
            }); // addEventListener
        }) // forEach
        }); 
    </script>


    <style type = "text/css">
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
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div>
            <?php include_once('includes/sidebarupdated.php');?>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fa fa-align-justify primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--User-->
                    <?php include_once('includes/usertoggle.php');?>
                <!--User-->
            </nav>
            <div class="container-fluid px-4">
                <div class = "table-responsive" style="background-color: aliceblue;border-radius:4px;overflow: hidden;">
                    <h1 style="float: left; margin:25px;    color: #021f4e;">Announcement</h2>
                        <br>
						<?php 
							$sql ="SELECT distinct tblannouncement.ID, tblannouncement.announcement, tblannouncement.announcementDate, tblannouncement.endDate, tblannouncement.adminID, tbladmin.BarangayPosition, tblresident.LastName from tblannouncement join tbladmin on tblannouncement.adminID = tbladmin.ID join tblresident on tbladmin.ID = tblresident.ID order by tblannouncement.ID DESC LIMIT 1";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							foreach($results as $row)
							{ 
								$sDate = $row->announcementDate;
								$eDate = $row->endDate;

						?>
                        <h4 style="float: right; margin: 25px; color: #021f4e; text-align: justify;">
                            For <?php  echo date('l, jS F Y - h:i A', strtotime($sDate));?> <br> To <?php  echo date('l, jS F Y - h:i A', strtotime($eDate));?>
                        </h4>
                        <br><br><br>
                        <div class="testulit" style="border-radius: 25px; ">
                            <h5 style="text-align: justify; margin:25px; text-indent: 5%;"><?php  echo $row->announcement;?> </h5>
                        </div>
                        <h3 style="margin: 25px; color: #021f4e;">Announced By:</h3>
                        <h2 style="margin: 25px; color: #021f4e;"><?php  echo $row->BarangayPosition;?> <?php  echo $row->LastName;}?></h2>
                
                </div>
            </div>
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="w-100 col-lg-5">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            
                            <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-4"></i>
                            
                            <div>
                                <h3 class="fs-2"><?php 
$sql1 ="SELECT ID from tblresident ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$tser=$query1->rowCount();
echo htmlentities($tser);
?>	</h3>
                                <a class = "link-dark fs-3 card-text" href ="#">Residents</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php
								$sql2="select count(tblresident.Gender) as male
									from tblresident where tblresident.Gender='Male'";

								  $query2 = $dbh -> prepare($sql2);
								  $query2->execute();
								  $results2=$query2->fetchAll(PDO::FETCH_OBJ);
								  foreach($results2 as $row2)
								{

								$male=$row2->male;
								}echo htmlentities($male);?></h3>
                                <a class = "link-dark fs-4 card-text" href ="#">Male</a>
                            </div>
                                <i class="fas fa-mars fs-1 primary-text border rounded-circle secondary-bg p-3"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php
									$sql3="select count(tblresident.Gender) as fem
									from tblresident where tblresident.Gender='Female'";

									  $query3 = $dbh -> prepare($sql3);
									  $query3->execute();
									  $results3=$query3->fetchAll(PDO::FETCH_OBJ);
									  foreach($results3 as $row3)
									{

									$fem=$row3->fem;
									}echo htmlentities($fem);?></h3>
                                <a class = "link-dark fs-4 card-text" href ="#">Female</a>
                              
                            </div>
                            <i class="fas fa-venus fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php
									$sql4 ="SELECT TIMESTAMPDIFF(YEAR, BirthDate, CURDATE()) AS adult4 from tblresident";
									$query4 = $dbh -> prepare($sql4);
									$query4->execute();
									$results4=$query4->fetchAll(PDO::FETCH_OBJ);
									$cnt4 = 0;
									foreach($results4 as $row4){
										$get4 = $row4->adult4;
										if ($get4 >= 18){
											$cnt4 += 1;
										}
									}
									echo htmlentities($cnt4);?></h3>
                                <a class = "link-dark fs-4 card-text" href ="#">Adults</a>
                            </div>
                            <i class="fas fa-user-circle fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php
									$sql5 ="SELECT TIMESTAMPDIFF(YEAR, BirthDate, CURDATE()) AS min5 from tblresident";
									$query5 = $dbh -> prepare($sql5);
									$query5->execute();
									$results5=$query5->fetchAll(PDO::FETCH_OBJ);
									$cnt5 = 0;
									foreach($results5 as $row5){
										$get5 = $row5->min5;
										if ($get5 < 18){
											$cnt5 += 1;
										}
									}
									echo htmlentities($cnt5);?></h3>
                                <a class = "link-dark fs-4 card-text" href ="#">Minors</a>
                            </div>
                            <i class="fas fa-child fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                        
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2" tooltip = "Number of pending requests">320</h3>
                                <a class = "link-dark fs-4 card-text" href ="#">Voters</a>
                            </div>
                            <i class="fas fa-vote-yea fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">50</h3>
                                <a class = "link-dark fs-4 card-text" href ="#">Senior Citizens</a>
                            </div>
                            <i class="fas fa-blind fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">50</h3>
                                <a class = "link-dark fs-4 card-text" href ="#">Officials</a>
                            </div>
                            <i class="fas fa-user-shield fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>
                
                <!--
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Recent Orders</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Television</td>
                                    <td>Jonny</td>
                                    <td>$1200</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Laptop</td>
                                    <td>Kenny</td>
                                    <td>$750</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Cell Phone</td>
                                    <td>Jenny</td>
                                    <td>$600</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Fridge</td>
                                    <td>Killy</td>
                                    <td>$300</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Books</td>
                                    <td>Filly</td>
                                    <td>$120</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Gold</td>
                                    <td>Bumbo</td>
                                    <td>$1800</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>  
                                    <td>Pen</td>
                                    <td>Bilbo</td>
                                    <td>$75</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Notebook</td>
                                    <td>Frodo</td>
                                    <td>$36</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>Dress</td>
                                    <td>Kimo</td>
                                    <td>$255</td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>Paint</td>
                                    <td>Zico</td>
                                    <td>$434</td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td>Carpet</td>
                                    <td>Jeco</td>
                                    <td>$1236</td>
                                </tr>
                                <tr>
                                    <th scope="row">12</th>
                                    <td>Food</td>
                                    <td>Haso</td>
                                    <td>$422</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>-->
                </div>

            </div>
        </div>
    </div>
    
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>