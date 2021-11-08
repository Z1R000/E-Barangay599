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
                            <img src="../<?php echo $row1->Blogoone;?>" style="width: 100px;">
                        </div>

                    </div>
                    <div class="col-xl-6 " align="center">
                        <h3 class="py-4"><?php echo $row1->Baddress;?> <br>
                        <?php echo $row1->Btitle;?></h3>
                    </div>
                    <div class="col-xl-3">
                        <div class="float-end" style="margin-right:50px;">
                            <img src="../<?php echo $row1->Blogotwo;?>" style="width: 100px;">
                        </div>


                    </div>
                </div>

            </div>
            <?php }}?>
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-align-justify primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0">Certification Record</h2>

                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                        
                </nav>
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0" style="text-indent: 15px; margin-left: 2.5%;overflow-x:auto;">
                        <li><a href="dashboard.php">Home</a></li>/
                        <li class="active">Record</li>/
                        <li class="active">Certification Record</li>
                    </ol>
                </div>


                <div class="container-fluid px-4">
                    <div style="background-color: aliceblue;border-radius: 10px;padding: 25px;">
                        <h3 class="inner-tittle two">Certificate Request List</h3>
                        <div class="col-xl-12 col-md-12 col-sm-12">
                            <div class="row my-2">
                                <div class="col-md-8">

                                    <div class="btn-group" role="group">
                                        <a href="certificate-request.php" class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;New Certificate Request</a>
                                    </div>

                                </div>
                                

                            </div>
                        </div>
                        <div class="divfortable">
                            <div class="tables">
                                <table class="table" id="alldata" border="1">
                                    <thead style="background-color: #021f4e;">
                                        <th><span style="color: #fff; font-size:120%;">Certificate Name</th>
                                        <th><span style="color: #fff; font-size:120%;">Resident Name</th>
                                        <th><span style="color: #fff; font-size:120%;">Certificate Price</th>
                                        <th><span style="color: #fff; font-size:120%;">Request Status</th>
                                        <th><span style="color: #fff; font-size:120%;">Request Date</th>
                                        <th><span style="color: #fff; font-size:120%;">Payment Method</th>
                                        <th><span style="color: #fff; font-size:120%;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $uid = $_SESSION['clientmsuid'];

                                        $sql = "SELECT distinct tblcertificaterequest.ID, tblcertificaterequest.userID, tblcertificaterequest.certificateID, tblcertificaterequest.requestStatus,tblcertificaterequest.requestDate, tblresident.LastName, tblresident.FirstName, tblresident.MiddleName, tblresident.Cellphnumber, tblresident.houseUnit,tblresident.streetName, tblresident.Email, tblcertificate.CertificateName from tblcertificaterequest join tblcertificate on tblcertificate.ID = tblcertificaterequest.certificateID join tblresident where tblresident.ID=tblcertificaterequest.userID and tblcertificaterequest.userID=:uid";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':uid', $uid, PDO::PARAM_STR);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) {               ?>
                                                <tr class="active">
                                                    <td style="color: #000;"><?php echo htmlentities($row->CertificateName); ?></td>
                                                    <td style="color: #000;"><?php echo htmlentities($row->LastName); ?>, <?php echo htmlentities($row->FirstName); ?> <?php echo htmlentities($row->MiddleName); ?></td>
                                                    <td style="color: #000;"><?php echo htmlentities($row->Cellphnumber); ?></td>
                                                    <td style="color: #000;"><?php echo htmlentities($row->requestStatus); ?></td>
                                                    <td style="color: #000;"><?php echo htmlentities($row->requestDate); ?></td>
                                                    <td style="color: #000;">G-Cash</td>
                                                    <td>

                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="" href="edit-certificate-request.php" class="btn btng btn-success"><i class="fa fa-edit"></i></a>
                                                        </div>
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="button" href="#delete-cert" data-bs-toggle="modal" role="button" class="btn btng btn-danger"><i class="fa fa-trash"></i></a>
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