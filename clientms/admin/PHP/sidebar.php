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
       
        
       
    </style>

</head>


<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light" id="sidebar-wrapper">
            
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><img src = "../IMAGES/Barangay.png" style = "width: 60px;"><br>Barangay 599 <br>E-barangay</div>

            <nav class="sidebar py-2 mb-4 bg-light">

                <ul class="nav flex-column" id="nav_accordion">
                    <li class="nav-item">
                        <a href="admin-dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-6"><i
                            class="fas fa-tachometer-alt me-2"></i>Dashboard </a>    
                        
                    </li>

                    <li class="nav-item has-submenu">
                        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-6"><i
                            class="fas fa-users me-2"></i>599 Residence</a>                        
                       
                    </li>

                    <li class="nav-item has-submenu">
                        <a href="#" class="list-group-item list-group-item-action dropdown-toggle bg-transparent second-text fw-bold nav-link fs-6">
                            <i class="fas fa-paperclip my-0 me-2"></i>Services</a>
                        <ul class="submenu collapse">
                            <li><a class="nav-link active" href="admin-Certificates.php">Certification </a></li>
                            <li><a class="nav-link" href="admin-blotter.php">Blotter </a></li>
                            <li><a class="nav-link" href="admin-rentals.php">Rentals</a></li>
                            <li><a class="nav-link" href="admin-otherservice.php">Other Services </a></li>
                        </ul>
                    </li>
                    <li class="nav-item has-submenu">
                        <a href="#" class="list-group-item list-group-item-action dropdown-toggle bg-transparent second-text fw-bold nav-link fs-6">
                            <i class="fas fa-book my-0 me-2"></i>Request</a>
                        <ul class="submenu collapse">
                            <li><a class="nav-link" href="admin-Crequest.php">Certification Request </a></li>
                            <li><a class="nav-link" href="admin-Brequest.php">Blotter Request </a></li>
                            <li><a class="nav-link" href="admin-Rrequest.php">Rental Request</a></li>
                            <li><a class="nav-link" href="admin-OSrequest.php">Other Service Request </a></li>
                        </ul>
                    </li>
                    <!--<li class="nav-item has-submenu">
                        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-6 dropdown-toggle" ><i
                            class="fas fa-book me-2"></i>Request</a>

                        <ul class="submenu collapse">
                            <li><a class="nav-link" href="#">Certification </a></li>
                            <li><a class="nav-link" href="#">Blotter </a></li>
                            <li><a class="nav-link" href="#">Rentals</a></li>
                            <li><a class="nav-link" href="#">Other Services </a></li>
                            </ul>
                        
                            
                    </li>-->
                    <li class="nav-item">
                        <a href="admin-officials.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-6"><i class="fa fa-id-card" aria-hidden="true"></i> 599 Officials</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-6"><i
                            class="fas fa-comment-dots me-2"></i>Announcements</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin-eBarangayContents.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold fs-6"><i class="fa fa-th" aria-hidden="true"></i></i> E-barangay Content</a>
                    </li>

                    
                </ul>
            </nav>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold fs-6"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fa fa-align-justify primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0"><?php echo $curr;?></h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>USER
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
