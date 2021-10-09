<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js">
</script>
<script>
        $(document).ready(function(){
            $("select").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else{
                        $(".box").hide();
                    }
                });
            }).change();
        });
</script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="client/css/sidebar.css" />
    
	<link rel="icon" href="IMAGES/Barangay.png" type="image/icon type">

    <title>599 Registration</title>
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
    .box{
		padding:10px;
		display:none;
		margin:10px;
	}
	.divfortable{
    background-color: white;
    overflow: auto;
    }
    </style>

</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        
            

			<!--yung div mismo-->
            <div class="container-fluid px-4" style="margin-top:25px;">
				<div style="background-color: aliceblue;border-radius: 25px;padding: 10px;">
                <h2 class="inner-title" style="font-weight: 700; text-align:center;Margin: 0% 3%;">E-Barangay 599 Registration Form</h2>
				<div class="container-fluid px-4">
               
            </div>
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-1">
                               <h5>Last Name: </h5>
							   <input type="text">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-1">

								<h5>First Name: </h5>
								<input  type="text">
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="p-1">

								<h5>Middle Name: </h5>
								<input  type="text">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-1">

								<h5>First Name: </h5>
								<input type="text">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2" tooltip = "Number of pending requests"><?php
									$sql6="select count(tblresident.voter) as voter
									 from tblresident where tblresident.voter='Yes'";

									  $query6 = $dbh -> prepare($sql6);
									  $query6->execute();
									  $results6=$query6->fetchAll(PDO::FETCH_OBJ);
									  foreach($results6 as $row6)
									{

									$voter=$row6->voter;
									}echo htmlentities($voter);?></h3>
                                <a class = "link-dark fs-4 card-text" href ="#">Voters</a>
                            </div>
                            <i class="fas fa-vote-yea fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php
									$sql7 ="SELECT TIMESTAMPDIFF(YEAR, BirthDate, CURDATE()) AS sen7 from tblresident";
									$query7 = $dbh -> prepare($sql7);
									$query7->execute();
									$results7=$query7->fetchAll(PDO::FETCH_OBJ);
									$cnt7 = 0;
									foreach($results7 as $row7){
										$get7 = $row5->sen7;
										if ($get7 >= 60){
											$cnt7 += 1;
										}
									}
									echo htmlentities($cnt7);?></h3>
                                <a class = "link-dark fs-4 card-text" href ="#">Senior Citizens</a>
                            </div>
                            <i class="fas fa-blind fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php 
									$sql8 ="SELECT ID from tbladmin ";
									$query8 = $dbh -> prepare($sql8);
									$query8->execute();
									$results8=$query8->fetchAll(PDO::FETCH_OBJ);
									$tresidents=$query8->rowCount();
									echo htmlentities($tresidents);?></h3>
                                <a class = "link-dark fs-4 card-text" href ="#">Officials</a>
                            </div>
                            <i class="fas fa-user-shield fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
					<div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php 
									$sql8 ="SELECT ID from tbladmin ";
									$query8 = $dbh -> prepare($sql8);
									$query8->execute();
									$results8=$query8->fetchAll(PDO::FETCH_OBJ);
									$tresidents=$query8->rowCount();
									echo htmlentities($tresidents);?></h3>
                                <a class = "link-dark fs-4 card-text" href ="#">Officials</a>
                            </div>
                            <i class="fas fa-user-shield fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>
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
<?php } ?>