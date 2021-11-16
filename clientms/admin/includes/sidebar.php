<?php
    include('includes/dbconnection.php');
    error_reporting(1);
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
            padding-left: 3rem; 
            padding-right: 1rem;
        }
        
        @media (max-width:1197px){
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

<?php
    $sql = "Select * from tblinformation";
    $query = $dbh->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    $adminlogo = "";
    $title = "";
    foreach($result as $l){
        $adminlogo = $l->blogo3;
        $title = $l->eTitle;
    }

     
    $sql ="Select max(ID)as current from tblloginaudits";

    $latest =0;
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results =$query->fetchAll(PDO::FETCH_OBJ);
    foreach($results as $c){
        $latest = $c->current;
    }
?>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="side-color" id="sidebar-wrapper">
            
            <div class="sidebar-heading text-center py-2 second-text fs-5 fw-bold border-bottom">
             <br>
             <?php 
                
                $counter = 0;
                $len = strlen($title);
                for($i = 0; $i < $len;$i++){
                    if ($counter == 3){
                        echo "<br>";
                        $counter = 0;                        
                    }
                    
                    if (preg_match('/\s/',$title[$i])){
                        $counter++;

                        echo $title[$i];
                    }
                    else{
                        
                        echo $title[$i];
                    }
                }

             ?><br>
                <img src = "<?php echo $adminlogo;?>" class = "py-1"style = "width: 60px;"><br>
                <div class="btn-group">
                    <a href="client-profile.php" class="btn btn-transparent"><i class="fa fa-user fs-4 text-primary"></i></a>
                    
                    <a href="change-password.php" class="btn btn-transparent"><i class="fa fa-cog  fs-4 text-primary"></i></a>
                    <a href="#" class="btn btn-transparent shadow-0"><i class="fa fa-bell fs-4 text-primary"></i></a>
                </div>
                <br>
                <div class="btn-group my-2" role="group" aria-label="Basic example">
                    <form action = "../../index.php" method = "GET">
                        <button type = "submit" value = "<?php echo $latest?>" href = "../../index.php"  name = "logout" class = "btn btn-outline-danger fs-6" ><i class = "fa fa-power-off"></i>&nbsp;Logout </button>
                        </form>          
                </div>
                
                
            </div>

            <nav class="sidebar">

                <ul class="nav flex-column" id="nav_accordion">
                    <li class="nav-item">
                        <a href="admin-dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text"><i
                            class="fas fa-tachometer-alt me-2"></i>Dashboard </a>    
                        
                    </li>


                    <li class="nav-item has-submenu">
                        <a href="#" class="list-group-item list-group-item-action dropdown-toggle bg-transparent second-text nav-link fs-6">
                            <i class="fas fa-users my-0 me-2"></i>Residence</a>
                        <ul class="submenu collapse">
                            <li><a class="nav-link fs-6" href="admin-residence.php">Resident List</a></li>
                            <li><a class="nav-link fs-6" href="admin-registrations.php">Registrations</a></li>
                        </ul>
                    </li>
                    <li class="nav-item has-submenu">
                        <a href="#" class="list-group-item list-group-item-action dropdown-toggle bg-transparent second-text nav-link fs-6">
                            <i class="fas fa-hand-paper my-0 me-2"></i>Services</a>
                        <ul class="submenu collapse">
                            <li><a class="nav-link fs-6" href="admin-certificate.php">Certification </a></li>
                            <li><a class="nav-link fs-6" href="admin-blotter.php">Blotter </a></li>
                            <li><a class="nav-link fs-6" href="admin-rentals.php">Rentals</a></li>
                            <!--<li><a class="nav-link fs-6" href="admin-otherservice.php">Other Services </a></li>-->
                        </ul>
                    </li>
                    <li class="nav-item has-submenu">
                        <a href="#" class="list-group-item list-group-item-action dropdown-toggle bg-transparent second-text  nav-link fs-6">
                            <i class="fas fa-book my-0 me-2"></i>Request</a>
                        <ul class="submenu collapse">
                            <li><a class="nav-link fs-6" href="admin-cert-request.php">Certification</a></li>
                            <li><a class="nav-link fs-6" href="admin-rental-request.php">Rental</a></li>
                            <!--<li><a class="nav-link fs-6" href="admin-other-request.php">Other Service</a></li>-->
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a href="admin-officials.php" class="list-group-item list-group-item-action bg-transparent second-text "><i class="fa fa-id-card" aria-hidden="true"></i> 599 Officials</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin-announcement.php" class="list-group-item list-group-item-action bg-transparent second-text "><i
                            class="fas fa-comment-dots me-2"></i>Announcements</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin-e-content.php" class="list-group-item list-group-item-action bg-transparent second-text "><i
                            class="fas fa-cog me-1"></i>E-barangay</a>
                    </li>
                  
                  
                    
                </ul>
            </nav>
      
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        

        <div id="page-content-wrapper">
        <div class="container-fluid banner" align="center">
                <?php 
                    $sqls="select * from tblinformation";
                    $querys=$dbh->prepare($sqls);
                    $querys->execute();
                    $resultss=$querys->fetchAll(PDO::FETCH_OBJ);
                    echo "<div class='row'>
                    <div class='col-xl-3 px-1'>
                        <div class='float-start'>";
                    if($querys->rowCount() > 0)
                    {
                        foreach($resultss as $rows)
                        {
                            echo "<img src='$rows->Blogoone' style='width: 100px;'>";

                            echo "</div>

                            </div>";

                            echo "<div class='col-xl-6' align='center'>
                            <h5 class='py-4 ' style= 'spacing:10px;'>$rows->Baddress <br>
                            $rows->Btitle</h5>
                            </div>";

                            echo "<div class='col-xl-3'>
                                    <div class='float-end'>
                                        <img src='$rows->Blogotwo' style='width: 100px;'>
                                    </div>
                                </div>
                            </div>";
                        }
                    } 
                    ?>
            </div>
 
            <nav class="navbar navbar-expand-lg navbar-light border-top px-3 ">
                <div class="container-fluid p-0">
                    <div class="d-flex align-items-center ">
                        <i class="fa fa-align-justify primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-4 m-0"><?php echo $curr; #sidebar?></h2>
                    </div>
                    

                
            
           
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
