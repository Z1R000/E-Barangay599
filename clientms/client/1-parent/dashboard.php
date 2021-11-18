<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid'] == 0)) {
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

    <link rel="stylesheet" href="css/sidebar.css">

    <link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <title>Resident Dashboard</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.sidebar .nav-link').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    let nextEl = element.nextElementSibling;
                    let parentEl = element.parentElement;

                    if (nextEl) {
                        e.preventDefault();
                        let mycollapse = new bootstrap.Collapse(nextEl);

                        if (nextEl.classList.contains('show')) {
                            mycollapse.hide();
                        } else {
                            mycollapse.show();
                            // find other submenus with class=show
                            var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                            // if it exists, then close all of them
                            if (opened_submenu) {
                                new bootstrap.Collapse(opened_submenu);
                            }
                        }
                    }
                }); // addEventListener
            }) // forEach
        });
    </script>


    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

        .sidebar li .submenu {
            list-style: none;
            margin: 0;
            padding: 0;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        h4 {
            font-family: 'Acme', 'sans-serif';
        }

        .text-inner {
            color: white;
        }

        .logo {
            color: #d3d3d3;
        }

        .left {
            margin-right: 1%;
        }

        .minor {
            background: #ff8c00;
        }

        .right {
            margin: 13.5%;
        }

        .voters {
            background: #008080;
        }

        .officials {
            background: #004242;
        }

        .dis {
            display: none;
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

        iframe {
            height: 300px;
            width: 100%;
            resize: both;
            overflow: auto;
        }
    </style>

</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div>
            <?php include_once('includes/sidebarupdated.php'); ?>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Contentswdqdqwwd -->


        <div id="page-content-wrapper">
                <?php
                    $sql1 = "select * from tblinformation";
                    $query1 = $dbh->prepare($sql1);
                    $query1->execute();
                    $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                    if ($query1->rowCount() > 0) {
                        foreach ($results1 as $row1) {
                ?>
            <div class="container-fluid banner" align="center">
                <div class="row">
                    <div class="col-xl-3 px-1 ">
                        <div class="float-start" style="margin-left:50px;">
                            <img src="<?php echo $row1->Blogoone;?>" style="width: 100px;">
                        </div>

                    </div>
                    <div class="col-xl-6 " align="center">
                        <h3 class="py-4"><?php echo $row1->Baddress;?> <br>
                        <?php echo $row1->Btitle;?></h3>
                    </div>
                    <div class="col-xl-3">
                        <div class="float-end" style="margin-right:50px;">
                            <img src="<?php echo $row1->Blogotwo;?>" style="width: 100px;">
                        </div>


                    </div>
                </div>

            </div>
            <?php }}?>
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fa fa-align-justify test-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>



            </nav>


            <div class='container-fluid px-4 mb-3'>
    <label></label>
<?php 
							$sql ="SELECT distinct tblannouncement.ID, tblannouncement.announcement, tblannouncement.announcementDate, tblannouncement.endDate, tblannouncement.adminID, tbladmin.BarangayPosition, tblresident.LastName, tblpositions.* from tblannouncement join tbladmin on tblannouncement.adminID = tbladmin.ID join tblresident on tbladmin.ID = tblresident.ID join tblpositions on tblpositions.ID = tbladmin.BarangayPosition where tblannouncement.announcementDate <= now() and tblannouncement.endDate >= now() order by tblannouncement.ID desc";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
                            $count = $query->rowCount();
                            if($count < 1){
                                echo "
                                <div class = 'mb-3 table-responsive' style='background-color:aliceblue;border:1px solid black;  border-radius:4px; overflow: hidden;'>
                                <h1 class='h1font' style='float: left; margin:25px; font-family:Segoe UI;   color: #021f4e;'>Latest Announcement</h1>";
								date_default_timezone_set('Asia/Manila');
                                
                            

						?>
                        <h4 class="testfont" style="float: right; font-family: Segoe UI; margin: 25px; color: #021f4e; text-align: justify;">
                            <?php  echo date('l, j F Y - h:i A');?> <br>
                        </h4>
                        <br><br><br><br><br>
                        <div class="testulit" style="border-radius: 25px; ">
                            <h5 class="testfont" style="text-align: justify; font-family: Segoe UI; margin:25px; text-indent: 5%;">No Current Announcement</h5>
                        </div>
                        <?php  
                            }
                            else{
							foreach($results as $row)
							{ 
                                
                                echo "
                                <div class = 'mb-3 table-responsive' style='background-color:aliceblue;border:1px solid black;  border-radius:4px; overflow: hidden;'>
                                <h1 class='h1font' style='float: left; margin:25px; font-family:Segoe UI;   color: #021f4e;'>Current Announcement</h1>";
								$sDate = $row->announcementDate;
								$eDate = $row->endDate;
                            

						?>
                        <h4 class="testfont" style="float: right; font-family: Segoe UI; margin: 25px; color: #021f4e; text-align: justify;">
                            <?php  echo date('l, j F Y - h:i A', strtotime($sDate));?> <br>
                        </h4>
                        <br><br><br><br><br>
                        <div class="testulit" style="border-radius: 25px; ">
                            <h5 class="testfont" style="text-align: justify; font-family: Segoe UI; margin:25px; text-indent: 5%;"><?php  echo $row->announcement;?> </h5>
                        </div>
                        <h3 class="testfont" style="margin: 25px; font-family: Segoe UI; color: #021f4e;">Announced By:</h3>
                        <h2 class="testfont" style="margin: 25px; font-family: Segoe UI;color: #021f4e;"><?php  echo "$row->Position "; echo $row->LastName;
                        echo "</h2></div>";    
                        }
                    }
                        
                        ?>
                       </div>
            <!--Makulay start-->



            <!-- /#page-content-wrapper -->


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                var el = document.getElementById("wrapper");
                var toggleButton = document.getElementById("menu-toggle");

                toggleButton.onclick = function() {
                    el.classList.toggle("toggled");
                };
            </script>
</body>
<!-- SAVE--->
<!--Testing-->

</html>