<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid'] == 0)) {
    header('location:logout.php');
} else {
    $uid = $_SESSION['clientmsuid'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?php include('link.php') ?>

        <link rel="stylesheet" href="css/sidebar.css" />

        

        <title>Rental Records</title>
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
            table td{
                font-size: 1.15em;
            }
            .sidebar li .submenu {
                list-style: none;
                margin: 0;
                padding: 0;
                padding-left: 1rem;
                padding-right: 1rem;
            }
            .btn{
                font-size: 1.15em;
            }

            .divfortable {
                background-color: white;
                overflow-x: auto;
            }
        </style>

    </head>

    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <?php include_once('includes/sidebarupdated.php');     ?>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <?php
                $sql1 = "select * from tblinformation";
                $query1 = $dbh->prepare($sql1);
                $query1->execute();
                $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                    foreach ($results1 as $row1) {
                ?>
                        <div class="container-fluid banner" align="center">
                            <div class="row">
                                <div class="col-xl-3 px-1 ">
                                    <div class="float-start" style="margin-left:50px;">
                                        <img src="<?php echo $row1->Blogoone; ?>" style="width: 100px;">
                                    </div>

                                </div>
                                <div class="col-xl-6 " align="center">
                                    <h3 class="py-4"><?php echo $row1->Baddress; ?> <br>
                                        <?php echo $row1->Btitle; ?></h3>
                                </div>
                                <div class="col-xl-3">
                                    <div class="float-end" style="margin-right:50px;">
                                        <img src="<?php echo $row1->Blogotwo; ?>" style="width: 100px;">
                                    </div>


                                </div>
                            </div>

                        </div>
                <?php
                } ?>
                
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-align-justify primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0">Rental Record</h2>

                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                </nav>
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0" style="text-indent: 15px; margin-left: 2.5%;overflow-x:auto;">
                        <li><a href="dashboard.php">Home</a></li>/
                        <li class="active">Record</li>/
                        <li class="active">Rental Record</li>
                    </ol>
                </div>


                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="col-11 mx-auto">
                            <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <div class="row my-2">
                                <div class="col-md-8">

                                    <div class="btn-group" role="group">
                                        <a href="rental-request.php" class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;New Rental Request</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="graph">
                            <div class="row" style="overflow-x:auto;">
                            <div class="tables" >
                                <table class="table bg-white table-bordered" id = "alldata"  style= "min-width: 1000px;">
                                    <thead style="background-color: #021f4e;">
                                        <th><span style="color: #fff; font-size:120%;">Rent</th>
                                        <th><span style="color: #fff; font-size:120%;">Rental Price</th>
                                        <th><span style="color: #fff; font-size:120%;">Start Rent</th>
                                        <th><span style="color: #fff; font-size:120%;">End Rent</th>
                                        <th><span style="color: #fff; font-size:120%;">Status</th>
         
                                        <th><span style="color: #fff; font-size:120%;">Request Date</th>
                                        <th><span style="color: #fff; font-size:120%;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $uid = $_SESSION['clientmsuid'];

                                        $sql = "Select tblresident.*,tblcreaterental.ID as cID,tblcreaterental.*, tblpurposes.*, tblrental.*, tblrental.rentalPrice, tblstatus.* from tblcreaterental join tblresident on tblresident.ID = tblcreaterental.userID join tblrental on tblrental.ID = tblcreaterental.rentalID join tblpurposes on tblpurposes.ID = tblcreaterental.purpID join tblstatus on tblstatus.ID = tblcreaterental.status where tblcreaterental.userID = :uid";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':uid', $uid, PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($results as $row) { $cdates = $row->creationDate;
                                                $cdates = date('F j Y - h:i A', strtotime($cdates));
                                                $sdates = $row->rentalStartDate;
                                                $sdates = date('F j Y - h:i A', strtotime($sdates));
                                                $edates = $row->rentalEndDate;
                                                $edates = date('F j Y - h:i A', strtotime($edates));
                                                $pay = $row->payable;
                                                $pay = number_format($pay,2);?>
                                                <tr class="active">
                                                    <td style="color: #000;"><?php echo htmlentities($row->rentalName); ?></td>
                                                    
                                                    <td style="color: #000;"><?php echo htmlentities($pay)?></td>
                                                    <td style="color: #000;"><?php echo htmlentities($sdates); ?></td>
                                                    <td style="color: #000;"><?php echo htmlentities($edates); ?></td>
                                                    <td style="color: #000;"><?php echo htmlentities($row->statusName); ?></td>
                                                    <td style="color: #000;"><?php echo htmlentities($cdates); ?></td>
                                                    <td style = "width: 10%;text-align:center">
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="" href="edit-rental-request.php?editid=<?php echo htmlentities($row->cID)?>" class="btn btng btn-success"><i class="fa fa-edit mx-1"></i>Manage</a>
                                                        </div>
                                                     
                                                    </td>
                                                </tr>
                                        <?php 
                                            }
                                         ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            </div>
                        </div></div>    
                    </div>
                    <!-- /#page-content-wrapper -->
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
                <script>
                    var el = document.getElementById("wrapper");
                    var toggleButton = document.getElementById("menu-toggle");

                    toggleButton.onclick = function() {
                        el.classList.toggle("toggled");
                    };
                </script>
                <script>
                    $(document).ready(function() {
                        $('#alldata').DataTable();
                    });
                </script>
    </body>

    </html>
<?php } ?>