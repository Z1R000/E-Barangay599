<?php
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />


    

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
        <div class="side-color" id="sidebar-wrapper">
            
            <div class="sidebar-heading text-center py-2 second-text fs-5 fw-bold border-bottom">
             <br>Barangay 599 <br>E-barangay<br>
                <img src = "../IMAGES/admin-logo.png" class = "py-1"style = "width: 60px;"><br>
          
                <div class="btn-group my-2" role="group" aria-label="Basic example">
                    <a type = " button" class = "btn border-danger link-danger fs-6" ><i class = "fa fa-power-off"></i>&nbsp;Logout </a>          
                </div>
                
                
            </div>

            <nav class="sidebar ">

                <ul class="nav flex-column" id="nav_accordion">
                    <li class="nav-item">
                        <a href="admin-dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-6"><i
                            class="fas fa-tachometer-alt me-2"></i>Dashboard </a>    
                        
                    </li>

                    <li class="nav-item has-submenu">
                        <a href="admin-residence.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-6"><i
                            class="fas fa-users me-2"></i>599 Residence</a>                        
                       
                    </li>

                    <li class="nav-item has-submenu">
                        <a href="#" class="list-group-item list-group-item-action dropdown-toggle bg-transparent second-text fw-bold nav-link fs-6">
                            <i class="fas fa-paperclip my-0 me-2"></i>Services</a>
                        <ul class="submenu collapse">
                            <li><a class="nav-link fs-6" href="admin-certificate.php">Certification </a></li>
                            <li><a class="nav-link fs-6" href="admin-blotter.php">Blotter </a></li>
                            <li><a class="nav-link fs-6" href="admin-rentals.php">Rentals</a></li>
                            <li><a class="nav-link fs-6" href="admin-otherservice.php">Other Services </a></li>
                        </ul>
                    </li>
                    <li class="nav-item has-submenu">
                        <a href="#" class="list-group-item list-group-item-action dropdown-toggle bg-transparent second-text fw-bold nav-link fs-6">
                            <i class="fas fa-book my-0 me-2"></i>Request</a>
                        <ul class="submenu collapse">
                            <li><a class="nav-link fs-6" href="admin-Crequest.php">Certification Request </a></li>
                            <li><a class="nav-link fs-6" href="admin-Rrequest.php">Rental Request</a></li>
                            <li><a class="nav-link fs-6" href="admin-OSrequest.php">Other Service Request </a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a href="admin-officials.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-6"><i class="fa fa-id-card" aria-hidden="true"></i> 599 Officials</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin-announcement.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-6"><i
                            class="fas fa-comment-dots me-2"></i>Announcements</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-6"><i
                            class="fas fa-cog me-2"></i>Barangay Content</a>
                    </li>
                  
                  
                    
                </ul>
            </nav>
      
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        

        <div id="page-content-wrapper">
        <div class="container-fluid banner" align = "center">
                <div class="row">
                    <div class="col-xl-3 px-1 ">
                        <div class="float-start">
                            <img src = "../images/barangay.png" style ="width: 100px;">
                        </div>
                        
                    </div>
                    <div class="col-xl-6 " align = "center">
                        <h3 class= "py-4">BARANGAY 599, ZONE 59, DISTRICT VI <br>
                            OFFICE OF THE SANGGUNIANG BARANGAY</h3>
                    </div>
                    <div class="col-xl-3">
                        <div class="float-end">
                        <img src = "../images/maynila.png" style ="width: 100px;">
                        </div>
                            
                        
                    </div>
                </div>
                
            </div>
 
            <nav class="navbar navbar-expand-lg navbar-light border-top px-3 ">
                <div class="container-fluid p-0">
                    <div class="d-flex align-items-center ">
                        <i class="fa fa-align-justify primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-4 m-0"><?php echo $curr;?></h2>
                    </div>
                    

                
            
           
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
