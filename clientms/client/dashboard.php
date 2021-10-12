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

    <link rel="stylesheet" href="css/sidebar.css" />

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
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fa fa-align-justify test-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--User-->
                <?php include_once('includes/usertoggle.php'); ?>
                <!--User-->
            </nav>


            <br>
            <div class='container-fluid px-4' style="padding: 5px; background-image: url(https://img.wallpapersafari.com/desktop/1440/900/97/58/SdRCAL.jpg);">
            </div>
            <br>
            <div class='container-fluid px-4 mb-3' height="20%">
                <iframe src="currentiframe.php" title="announcement" width="100%"></iframe>
            </div>
            <!--Makulay start-->
            <div class="container-fluid  right my-1" align="center">
                <div class="row g-3">
                    <div class="row g-3 px-2">
                        <div class="row g-3 my-2">
                            <div class="col-md-3 left rounded border shadow-md bg-primary">
                                <div class="row g-3">
                                    <div class="p-3 bg-primary  d-flex justify-content-around align-items-center ">
                                        <div class="text-inner">
                                            <h4 class="fs-3">2500</h4>
                                            <p class="text-inner fs-5 card-text " href="#">Total Residents</p>
                                        </div>
                                        <i class="fas fa-users fs-1 logo  p-4 "></i>

                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class="text-inner text-decoration-none" href="admin-residence.php">
                                        <div class="fs-6">More info&nbsp;<i class='fa fa-arrow-circle-right'></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 left rounded border shadow-md officials">
                            <div class="row g-3">
                                <div class="p-3 officials  d-flex justify-content-around align-items-center ">
                                    <div class="text-inner">
                                        <h4 class="fs-3">420</h4>
                                        <p class="text-inner fs-5 card-text " href="#">Current Officials</p>
                                    </div>
                                    <i class="fas fa-user-shield fs-1 logo  p-4"></i>

                                </div>
                            </div>
                            <div class="row border-top g-0 ">
                                <a class="text-inner text-decoration-none" href="#">
                                    <div class="fs-6">More info&nbsp;<i class='fa fa-arrow-circle-right'></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 rounded left border shadow-md bg-success">
                        <div class="row g-3">
                            <div class="p-3 bg-success d-flex justify-content-around align-items-center ">
                                <div class="text-inner">
                                    <h4 class="fs-3">500</h4>
                                    <p class="text-inner fs-5 card-text " href="#">Specific Requests</p>
                                </div>
                                <i class="fas fa-folder fa-folder fs-1 logo  p-4 "></i>


                            </div>
                        </div>
                        <div class="row border-top g-0 ">
                            <a class="text-inner text-decoration-none" href="#">
                                <div class="fs-6">More info&nbsp;<i class='fa fa-arrow-circle-right'></i>
                            </a>
                        </div>
                    </div>

                </div>


            </div>


        </div>
        <div class="row g-3 ">
            <div class="row g-3 my-1">
                <div class="col-md-3 left rounded border shadow-md bg-warning">
                    <div class="row g-3">
                        <div class="p-3 bg-warning  d-flex justify-content-around align-items-center ">
                            <div class="text-inner">
                                <h4 class="fs-3">420</h4>
                                <p class="text-inner fs-5 card-text " href="#">Senior Citizens</p>
                            </div>
                            <i class="fas fa-blind fs-1 logo  p-4"></i>

                        </div>
                    </div>
                    <div class="row border-top g-0 ">
                        <a class="text-inner text-decoration-none" href="#">
                            <div class="fs-6">More info&nbsp;<i class='fa fa-arrow-circle-right'></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 rounded left border shadow-md minor">
                <div class="row g-3">
                    <div class="p-3 minor d-flex justify-content-around align-items-center ">
                        <div class="text-inner">
                            <h4 class="fs-3">500</h4>
                            <p class="text-inner fs-5 card-text " href="#">Minor Residents</p>
                        </div>
                        <i class="fas fa-child fs-1 logo  p-4 "></i>


                    </div>
                </div>
                <div class="row border-top g-0 ">
                    <a class="text-inner text-decoration-none" href="#">
                        <div class="fs-6">More info&nbsp;<i class='fa fa-arrow-circle-right'></i>
                    </a>
                </div>
            </div>

        </div>
        <div class="col-md-3  rounded border left shadow-md voters">
            <div class="row g-3">
                <div class="p-3 voters  d-flex justify-content-around align-items-center ">
                    <div class="text-inner">
                        <h4 class="fs-3">2500</h4>
                        <p class="text-inner fs-5 card-text " href="#">Total Voters</p>
                    </div>
                    <i class="fas fa-vote-yea fs-1 logo  p-4"></i>


                </div>
            </div>
            <div class="row border-top g-0 ">
                <a class="text-inner text-decoration-none" href="#">
                    <div class="fs-6">More info&nbsp;<i class='fa fa-arrow-circle-right'></i>
                </a>
            </div>
        </div>

    </div>

    </div>

    </div>
    <div class="row g-3 ">
        <div class="row g-3 my-1">
            <div class="col-md-3 left rounded border shadow-md bg-info">
                <div class="row g-3">
                    <div class="p-3 bg-info  d-flex justify-content-around align-items-center ">
                        <div class="text-inner">
                            <h4 class="fs-3">420</h4>
                            <p class="text-inner fs-5 card-text " href="#">Male Residents</p>
                        </div>
                        <i class="fas fa-mars fs-1 logo  p-4"></i>

                    </div>
                </div>
                <div class="row border-top g-0 ">
                    <a class="text-inner text-decoration-none" href="#">
                        <div class="fs-6">More info&nbsp;<i class='fa fa-arrow-circle-right'></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3 rounded left border shadow-md bg-danger">
            <div class="row g-3">
                <div class="p-3 bg-danger d-flex justify-content-around align-items-center ">
                    <div class="text-inner">
                        <h4 class="fs-3">500</h4>
                        <p class="text-inner fs-5 card-text " href="#">Female Residents</p>
                    </div>
                    <i class="fas fa-venus fs-1 logo  p-4 "></i>


                </div>
            </div>
            <div class="row border-top g-0 ">
                <a class="text-inner text-decoration-none" href="#">
                    <div class="fs-6">More info&nbsp;<i class='fa fa-arrow-circle-right'></i>
                </a>
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
<!-- SAVE--->
<!--Testing-->

</html>