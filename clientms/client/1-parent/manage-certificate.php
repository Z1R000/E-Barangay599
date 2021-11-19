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

        

        <title>Certification Record</title>
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
            .body{
                font-size: 16px;
            }
            table td{
                font-size: 1.15em;
            }
            .btn{
                font-size: 1.15em;
            }
            .sidebar li .submenu {
                list-style: none;
                margin: 0;
                padding: 0;
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .divfortable {
                background-color: white;
                overflow-x: auto;
            }

            @media (max-width:576px) {
                .banner {
                    display: none;
                }

                .right {
                    margin-left: 8%;
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
            <?php include_once('includes/sidebarupdated.php');     ?>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
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
                        <i class="fa fa-align-justify primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0">Certification List</h2>

                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                        
                </nav>
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0" style="text-indent: 15px; margin-left: 2.5%;overflow-x:auto;">
                        <li><a href="dashboard.php">Home</a></li>/
                        <li class="active">Record</li>/
                        <li class="active">Certification List</li>
                    </ol>
                </div>


                <div class="container-fluid px-4">
                            <div class="row">
                        <div class="col-11  mx-auto">
                            <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <div class="row my-2 ">
                                <div class="col-md-8">

                                    <div class="btn-group" role="group">
                                        <a href="certificate-request.php" class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;New Certificate Request</a>
                                    </div>

                                </div>
                                

                            </div>
                        </div>
                        <div class="row mb-5" style = "overflow-x:auto">
                            <div class="tables">
                                <table class="table bg-white rounded shadow-sm  table-hover table-bordered " style="min-width: 900px;" id ="alldata">
                                    <thead style="background-color: #021f4e;">
                                        <th><span style="color: #fff; font-size:1.25em;">Certificate Name</span></th>
                                        
                                        <th><span style="color: #fff; font-size:120%;">Certificate Price</span></th>
                                        <th><span style="color: #fff; font-size:120%;">Request Status</span></th>
                                        <th><span style="color: #fff; font-size:120%;">Request Date</span></th>
            
                                        <th><span style="color: #fff; font-size:120%;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $uid = $_SESSION['clientmsuid'];
                                        

                                        $sql = "SELECT distinct tblcreatecertificate.*, tblcreatecertificate.ID as getID, tblresident.*, tblcertificate.*, tblstatus.* from tblcreatecertificate join tblcertificate on tblcertificate.ID = tblcreatecertificate.CertificateId join tblstatus on tblcreatecertificate.status = tblstatus.ID join tblresident on tblcreatecertificate.Userid=tblresident.ID WHERE tblresident.ID=:uid order by status ASC, resDate";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':uid', $uid, PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) {  $cdates = $row->resDate;
                                                $cdates = date('F j Y - h:i A', strtotime($cdates));
                                        ?>
                                                <tr class="active">
                                                    <td style="color: #000;"><?php echo htmlentities($row->CertificateName); ?></td>
                                                    
                                                    <td style="color: #000;"><?php echo htmlentities($row->CertificatePrice); ?></td>
                                                    <td style="color: #000;"><?php echo htmlentities($row->statusName); ?></td>
                                                    <td style="color: #000;"><?php echo htmlentities($cdates); ?></td>
                                              
                                                    <td>

                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="" href="edit-certificate-request.php?editid=<?php echo $row->getID;?>" class="btn btng btn-primary"><i class="fa fa-edit"></i>Manage</a>
                                                        </div>
                                                    </td>

                                                </tr>

                                        <?php $cnt = $cnt + 1;
                                            }
                                        } ?>
                                    </tbody>
                                </table>
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