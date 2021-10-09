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
    @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
    .sidebar li .submenu{ 
        list-style: none; 
        margin: 0; 
        padding: 0; 
        padding-left: 1rem; 
        padding-right: 1rem;
    }
    h4{
                font-family: 'Acme','sans-serif';
            }
            .text-inner{
                color: white;
            }
            .logo{
                color: #d3d3d3;
            }
            .left{
                margin-right: 1%;
            }
            .minor{
                background: #ff8c00;
            }
            .right{
                margin: 13.5%;
            }

            .voters{
                background: #008080;
            }
            .officials{
                background:  #004242;
            }
            .dis{
                display:none;
            }

            @media (max-width:576px){
                .banner{
                    display:none;
                }
                .right{
                    margin-left: 8%;
                }
                .dis{
                    display: flex;
                }
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
                    <i class="fa fa-align-justify test-text fs-4 me-3" id="menu-toggle"></i>
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
            <div class="container-fluid px-4 mb-3">
                <div class = "table-responsive" style="background-color:aliceblue;border:1px solid black;  border-radius:4px; overflow: hidden;">
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
                        <h4 style="float: right; font-family: Segoe UI; margin: 25px; color: #021f4e; text-align: justify;">
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