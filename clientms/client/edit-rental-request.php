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

        <title>Edit Rental Request</title>
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
                        <h2 class="fs-2 m-0">Edit Rental Request</h2>

                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    
                </nav>
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0" style="text-indent: 15px; margin-left: 2.5%;">
                        <li><a href="dashboard.php">Home</a></li>/
                        <li class="active">Request</li>/
                        <li class="active"><a href="manage-rental.php">Rental Record</a></li>/
                        <li class="active">Edit Rental Request</li>
                    </ol>
                </div>
                <div class="container-fluid px-4">
                    <div style="background-color: aliceblue;border-radius: 25px;border:1px solid black;padding: 25px;">
                        <div class="graph-visual tables-main">

                            <div class="modal-body bg-white ">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <label for="prate" class="fs-5 fw-bold">Requestor Name</label>
                                        <div class="d-flex">
                                            <input type="text" id="prate" class="form-control me-2" name="pRate" placeholder="Requestor Name" readonly>
                                            <!--Naka disable pero dito ilalagay yung name dapat ni client-->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="col-xl-6">
                                        <label for="prate" class="fs-5 fw-bold">Duration<span class="text-muted fs-6">(in hours)</span></label>
                                        <div class="d-flex">
                                            <input type="number" min=0 ; id="prate" class="form-control me-2" name="pRate" placeholder="0.00" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="prate" class="fs-5 fw-bold">Rate<span class="text-muted fs-6">(per hour)</span></label>
                                        <div class="d-flex">
                                            <input type="text" id="prate" class="form-control me-2" name="pRate" placeholder="0.00" readonly>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <label for="status" class="fs-5 fw-bold">Property to rent</label>
                                        <select name="" class="form-control" id="status" disabled>
                                            <option value="avail">Barangay Van</option>
                                            <option value="noavail">Patrol</option>
                                            <option value="noavail">Basketball court</option>
                                        </select>
                                    </div>

                                    <div class="col-xl-4">
                                        <label for="prate" class="fs-5 fw-bold">Date of Rental</label>
                                        <input type="date" id="date" class="form-control me-2" name="date" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="rname" class="fs-6 fw-bold">Purpose</label>
                                        <input type="text" class="form-control" id="rname" placeholder="Please indicate purpose for rental:" disabled>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xl-3">
                                        <label for="formFileSm" class="form-label">Upload Proof of Payment<span class="fs-6 text-muted"> (JPEG or PNG format)</span></label>

                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-xl-3">
                                        <input class="form-control form-control-sm" id="formFileSm" type="file">
                                        <br>
                                    </div>
                                    <div class="col-xl-3 ">

                                    </div>
                                    <div class="col-xl-3 ">
                                        <a href="index.php" class="form-control btn btn-outline-danger" name="cancel" id="cancel">Cancel</a>
                                    </div>
                                    <div class="col-xl-3 ">
                                        <button type="submit" class="form-control btn btn-outline-success" name="submit" id="submit">Submit</button>
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