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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include('link.php');?>
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    

    <title>Officials List</title>
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
    .divfortable{
    background-color: white;
    overflow-x:auto;
    }
    @media (max-width:576px) {
            .banner {
                display: none;
            }

            .right {
                margin-left: 5%;
            }

            .dis {
                display: flex;
            }
        }
             
    </style>

</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include ('../includes/sidebar.php'); 	?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
        
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fa fa-align-justify primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Official's List</h2>
                    
                </div>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                
            </nav>
            <div class="sub-heard-part">
                <ol class="breadcrumb m-b-0"style="text-indent: 15px; margin-left: 2.5%;">
                    <li><a href="dashboard.php">Home</a></li>/
                    <li class="active">Official List</li>
                </ol>
            </div>


            <div class="container-fluid px-4">
                    <div class="row px-5">
                    <div class="graph-visual tables-main">
                    
                    <div class="divfortable">
                        <div class="tables">
                            <table class="table table-bordered"> <thead style="background-color: #021f4e;">
                                 <th><span style="color: #fff; font-size: 120%;">Barangay Position</span></th> 
                                 <th><span style="color: #fff; font-size: 120%;">Official Name</span></th>
                                 <th><span style="color: #fff; font-size: 120%;">Day of Duty</span></th>
								 
                                  </tr>
                                   </thead>
                                    <tbody>
                                        <?php

                                            $sql="SELECT distinct tbladmin.*, tblresident.*, tblpositions.* from tbladmin JOIN tblresident on tbladmin.residentID=tblresident.ID join tblpositions on tblpositions.ID = tbladmin.BarangayPosition order by tblpositions.ID ASC";
                                            $query = $dbh -> prepare($sql);
                                            $query->execute();
                                            $results=$query->fetchAll(PDO::FETCH_OBJ);

                                            $cnt=1;
                                            
                                            foreach($results as $row)
                                            { 
                                                $get = $row->dayDuty;
                                                $pieces = explode(",",$get);
                                                $up="";
                                                for ($x = 0; $x <= count($pieces); $x++) {
                                                    if ($pieces[$x] != 0){
                                                        $up .= "$pieces[$x],"; 
                                                    }
                                                    
                                                }
                                                $piece ='';
                                                for ($i = 0; $i < strlen($up); $i++) {
                                                    if (is_numeric($up[$i])) {
                                                        $piece .= $up[$i];
                                                    }
                                                }
                                                $day="";
                                                for ($y = 0; $y < 9; $y++){
                                                    if ($piece[$y] != 0){
                                                        $g = $piece[$y];
                                                        $sqlg = "select * from tbldays WHERE ID = :g";
                                                        $qg = $dbh->prepare($sqlg);
                                                        $qg-> bindParam(':g', $g, PDO::PARAM_STR);
                                                        $qg-> execute();
                                                        $rg=$qg->fetchAll(PDO::FETCH_OBJ);
                                                        if($qg->rowCount() > 0)
                                                        {
                                                            foreach ($rg as $rg) {
                                                                $day .= "$rg->dDay ";
                                                            }
                                                        }
                                                    }
                                                }
            ?>
                                     <tr class="active">
                                        <td style="color: black;"><?php  echo htmlentities($row->Position);?></td>
                                         <td style="color: black;"><?php  echo htmlentities($row->LastName);?>, <?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->MiddleName);?></td>
                                         <td style="color: black;"><?php  echo htmlentities($day);?></td>
                                     </tr>
                                     <?php $cnt=$cnt+1;} ?>
                                     </tbody> </table> 
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