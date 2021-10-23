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

        <title>Certificate Request</title>
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
                        <h2 class="fs-2 m-0">Certificate Request</h2>

                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!--User-->
                    <?php include_once('includes/usertoggle.php'); ?>
                    <!--User-->
                </nav>
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0" style="text-indent: 15px; margin-left: 2.5%;">
                        <li><a href="dashboard.php">Home</a></li>/
                        <li class="active">Request</li>/
                        <li class="active">Certificate Request</li>
                    </ol>
                </div>
                <div class="container-fluid px-4">
                    <div style="background-color: aliceblue;border-radius: 25px;border:1px solid black;padding: 25px;">
                        <div class="row">
                            <div class="col-xl-4">
                                <label for="date" class="fw-bold fs-6">Date today</label>
                                <input type="text" id="date" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="row g-3 ">
                            <div class="col-md-6">

                                <label for="rname" class="fs-6 fw-bold">Requestor Name</label>
                                <input type="text" class="form-control" id="rname" placeholder="e.g Juan Dela Cruz">

                            </div>
                            <div class="col-md-6">
                                <label for="purp" class="fs-6 fw-bold">Purposes/Submission Office</label>
                                <select class="select form-control" name="" id="purp" onchange="otherDiv('others_hidden',this)">
                                    <option selected disabled>Purposes/Submission Office</option>
                                    <option value="ent">For entertainment</option>
                                    <option value="med">For medical reasons</option>
                                    <option value="oth">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" id="others_hidden">
                            <div class="col-md-6">

                                

                            </div>
                            <div class="col-md-6">

                                <label for="rname" class="fs-6 fw-bold">Other Reasons</label>
                                <input type="text" class="form-control" id="rname" placeholder="Please Specify:">

                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4">

                                <label for="ctype" class="fs-6 fw-bold">Certification Type</label>
                                <div class="d-flex">
                                    <select class="select form-control" name="" id="ctype" onchange="showDiv('hidden_div',this)">
                                        <option selected>--Avaiable certifications--</option>
                                        <option value="emp">Employment</option>
                                        <option value="ind">Indigency</option>
                                        <option value="Business">Business</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="rname" class="fs-6 fw-bold">Certification Fee</label>
                                <div class="d-flex">
                                    <div class="input-group">
                                        <button class="btn btn-secondary text-white" disabled>
                                            ₱
                                        </button>
                                        <input type="text" class="form-control me-2 w-50" style="text-align: right;" id="rname" value="20.00" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="ctype" class="fs-6 fw-bold">Mode of Payment</label>
                                <div class="d-flex">
                                    <select class="select form-control" name="" id="mop" onchange="showDiv('hidden_div',this)">
                                        <option selected>--Select--</option>
                                        <option value="gc">G-Cash</option>
                                        <option value="cash">Cash</option>

                                    </select>
                                </div>
                            </div>


                        </div>



                        <div class="row" id="hidden_div">

                            <div class="col-md-6">
                                <label for="purp" class="fs-6 fw-bold">Business name
                                    <small class="text-muted">(If business related)</small> </label>
                                <input type="text" class="form-control" id="rname" placeholder="e.g Manong Store">
                            </div>

                            <div class="col-md-6">
                                <label for="cap" class="fs-6 fw-bold">Capital</label>
                                <select class="select form-control" name="" id="cap">
                                    <option selected>
                                        < 10,000 </option>
                                    <option value="ent">>10, 000</option>
                                    <option value="med">>100,000</option>
                                </select>

                            </div>


                        </div>


                    </div>
                    <div class="modal-footer py-0">
                        <button type="submit" class="btn btn-success rounded" name="Submit" value="Submit">
                            Submit
                        </button>
                        <button type="button" class="btn btn-danger rounded" data-bs-dismiss="modal" role="button" name="Cancel" value="Cancel">
                            Discard
                        </button>
                        </form>
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
                var today = new Date();
                var mm = today.getMonth() + 1;
                var dd = today.getDay();
                var yy = today.getFullYear();

                if (mm < 10) {
                    mm = '0' + mm;
                }
                if (dd < 10) {
                    dd = '0' + dd;
                }

                var dtd = mm + '/' + dd + '/' + yy;
                document.getElementById('date').value = dtd;

                function walkin() {
                    document.getElementId('sms').disabled = true;
                    document.getElementId('em').disabled = true;

                }
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
            <script type="text/javascript">
                function showDiv(divId, element) {
                    document.getElementById(divId).style.display = element.value == 'Business' ? 'flex' : 'none';
                }

                
            </script>
            <script>
                function otherDiv(divId, element) {
                    document.getElementById(divId).style.display = element.value == 'oth' ? 'flex' : 'none';
                }
            </script>
    </body>

    </html>
<?php } ?>