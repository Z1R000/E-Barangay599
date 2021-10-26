<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid'] == 0)) {
    header('location:logout.php');
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js">
        </script>
        <script>
            $(document).ready(function() {
                $("select").change(function() {
                    $(this).find("option:selected").each(function() {
                        var optionValue = $(this).attr("value");
                        if (optionValue) {
                            $(".box").not("." + optionValue).hide();
                            $("." + optionValue).show();
                        } else {
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

        <link rel="stylesheet" href="css/sidebar.css" />

        <link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

        <title>Client Profile</title>
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

            .box {
                padding: 10px;
                display: none;
                margin: 10px;
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
            <div class="container-fluid banner" align="center">
                    <div class="row">
                        <div class="col-xl-3 px-1 ">
                            <div class="float-start" style="margin-left:50px;">
                                <img src="../images/barangay.png" style="width: 100px;">
                            </div>

                        </div>
                        <div class="col-xl-6 " align="center">
                            <h3 class="py-4">BARANGAY 599, ZONE 59, DISTRICT VI <br>
                                OFFICE OF THE SANGGUNIANG BARANGAY</h3>
                        </div>
                        <div class="col-xl-3">
                            <div class="float-end" style="margin-right:50px;">
                                <img src="../images/maynila.png" style="width: 100px;">
                            </div>


                        </div>
                    </div>

                </div>
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-align-justify secondary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0">Client Profile</h2>

                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    
                </nav>
                <div class="container-fluid mx-auto px-5 mt-3 mb-2 ">
                    <div class="row g-0 mx-2 ">
                        <div class="row g-0 ">
                            <div class="mx-auto col-xl-10 white   ">
                                <div class="row g-0  rounded-top " style="background-color:#021f4e">
                                    <div class="fs-5 text-white py-2 px-2">
                                        <i class="fa fa-id-card-alt fa-1x me-1">
                                        </i>
                                        Resident #<?php echo htmlentities($row->ID); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0  ">
                            <div class="col-xl-10 bg-white mx-auto text-center">
                                <label for="" class="text-center fs-6 text-muted small">Resident's Full Name</label>
                                <div class="display-6 border-bottom text-center py-2">
                                    testing
                                    <!--?php echo "$row->LastName, $row->FirstName $row->MiddleName $row->Suffix";?-->

                                </div>

                            </div>

                        </div>
                        <div class="row g-0 ">
                            <div class="col-xl-10 bg-white mx-auto text-center shadow-lg">
                                <div class="row g-0">
                                    <div class="col-xl-10 mx-auto">
                                        <table class="table ">
                                            <tbody class="" style="padding: 40px;">
                                                <tr>

                                                    <th style="padding-top: 5px; padding-bottom:5px;">
                                                        <i class="fa fa-mobile-alt fa-1x me-2"></i>Contact Number
                                                    </th>
                                                    <td style="text-align: right; padding-top: 10px; padding-bottom:10px;">
                                                        <?php echo htmlentities($row->Cellphnumber); ?>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <th style="padding-top: 5px; padding-bottom:5px;">
                                                        <i class="fa fa-at fa-1x me-1"></i>Email Address
                                                    </th>
                                                    <td style="text-align: right;padding-top: 10px; padding-bottom:10px;">
                                                        <?php echo htmlentities($row->Email); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="padding-top: 5px; padding-bottom:5px;">
                                                        <i class="fa fa-map-marker-alt fa-1x me-1"></i>
                                                        Address
                                                    </th>
                                                    <td style="padding-top: 5px; padding-bottom:5px;text-align:right">
                                                        <?php echo htmlentities("#" . $row->houseUnit . " Purok " . $row->Purok . " " . $row->streetName . " Street"); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="padding-top: 10px; padding-bottom:10px;">
                                                        <i class="fa fa-birthday-cake fa-1x me-1"></i>
                                                        Date of Birth
                                                    </th>
                                                    <td style="padding-top: 10px; padding-bottom:10px;text-align:right">
                                                        <?php echo $gbds; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="container-fluid mx-auto px-5 mb-5">
                    <div class="row g-0 mx-2">
                        <div class="row g-2">
                            <div class="mx-auto col-xl-11 ">
                                <div class="row g-0  rounded-top border bg-white">
                                    

                                </div>



                                <div class="tab-content shadow-sm">


                                    <div class="tab-pane active" id="personal">
                                        <div class="row g-0 bg-white px-4 ">
                                            <div class="row gy-0 gx-0  ps-3 mt-3 bg-info er border border-info shadow-lg">


                                            </div>
                                            <div class="row g-0 border-bottom border-start  mb-5 rounded-bottom shadow-sm">
                                                <div class="row g-0">

                                                    <div class="row g-0 mb-5 py-5 px-5 ">
                                                        <div class="col-xl-12  border-start  shadow-sm">

                                                            <table class="table ">
                                                                <thead class=" bg-light text-center">
                                                                    <tr>
                                                                        <th colspan=2 class="text-center">
                                                                            <i class="fa fa-street-view">

                                                                            </i>
                                                                            Residency Information
                                                                        </th>
                                                                    </tr>

                                                                </thead>
                                                                <tbody class="" style="padding: 10px;">
                                                                    <tr>

                                                                        <th>
                                                                            <i class=""></i>Residency Type
                                                                        </th>
                                                                        <td style="text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                            <?php echo htmlentities($row->ResidentType); ?>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-xl-12  border-end border-bottom shadow-sm">
                                                            <table class="table  ">
                                                                <thead class=" bg-light text-center">
                                                                    <tr>
                                                                        <th colspan=2 class="text-center">
                                                                            <i class="fa fa-user">

                                                                            </i>
                                                                            Personal Information
                                                                        </th>
                                                                    </tr>

                                                                </thead>
                                                                <tbody class=" mt-2" style="padding: 10px;">


                                                                    <tr>

                                                                        <th>
                                                                            Gender
                                                                        </th>
                                                                        <td style="text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                            <?php echo htmlentities($row->Gender); ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <th>
                                                                            Civil Status
                                                                        </th>
                                                                        <td style="text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                            <?php echo htmlentities($row->CivilStatus); ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                    <tr>

                                                                        <th>
                                                                            Voter Status
                                                                        </th>
                                                                        <td style="text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                            <?php echo htmlentities($row->voter); ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <th>
                                                                            Voter Precinct
                                                                        </th>
                                                                        <td style="text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                            <?php echo htmlentities($row->vPrecinct); ?>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>

                                                                        <th>
                                                                            SSS number
                                                                        </th>
                                                                        <td style="text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                            <?php echo htmlentities($row->sssNumber); ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <th>
                                                                            TIN number
                                                                        </th>
                                                                        <td style="text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                            <?php echo htmlentities($row->tinNumber); ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                </tbody>
                                                            </table>

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

                                toggleButton.onclick = function() {
                                    el.classList.toggle("toggled");
                                };
                            </script>
    </body>

    </html>
<?php } ?>