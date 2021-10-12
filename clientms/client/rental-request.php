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

        <title>Rental Request</title>
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
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-align-justify secondary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0">Rental Request</h2>

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
                        <li class="active">Rental Request</li>
                    </ol>
                </div>
                <div class="container-fluid px-4">
                    <div style="background-color: aliceblue;border-radius: 25px;border:1px solid black;padding: 25px;">
                        <div class="graph-visual tables-main">

                            <h1 class="testfont"> Rental Request </h1>
                            <div class="graph" style="border-radius: 15px;">
                                <div class="form-body">
                                    <form method="post" style="font-size:1.25em;">
                                        <table style="width: 100%;">
                                            <tr>
                                                <th><span class="anothertestfont" style="color: #021f4e; ">Choose Rental</th>
                                                <br>
                                                
                                                <th><span class="anothertestfont" style="color: #021f4e;">Rental Price</th>

                                            </tr>

                                            <tr>
                                                <td>
                                                    <?php
                                                    $sql = "SELECT ID, CertificateName, CertificatePrice from tblcertificate";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    if ($query->rowCount() > 0) {
                                                        echo "<select  name='certid' id='certid' class='form-control select2 dropdownstyle' required='true' style='padding: 1px; margin-left:1px;font-size: 1.3em; width: 90%;'>
													<option value=''disabled selected>Choose Rental</option>";
                                                        foreach ($results as $row) {
                                                            echo "<option value='$row->ID'>$row->CertificateName</option>";
                                                        } ?>
                                                </td>
                                                
                                                <td style='color: black;'>
                                                <?php echo "$row->CertificatePrice</td>";

                                                        echo "</select>";
                                                    }
                                                ?>
                                                </td>

                                            </tr>

                                            <tr>
                                                <td>
                                                <div class="form-group"> <h2 for="exampleInputEmail1" style="color: #021f4e;">Rental Start-Date:</h2> <input type="datetime-local" name="rsdate" value="" id="date" placeholder="Rental Start Date" class="form-control" required='true' style="font-size: 2vh; width: 90%;"> </div>
                                                <div class="form-group"> <h2 for="exampleInputEmail1" style="color: #021f4e;">Rental End-Date:</h2> <input type="datetime-local" name="redate" value="" id="date" placeholder="Rental End Date" class="form-control" required='true' style="font-size: 2vh; width: 90%;"> </div>
                                                </td>
                                                <td>
                                                
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="testfont">Choose payment option:</h3>
                                                    <select>

                                                        <option disabled selected>-Choose payment option-</option>
                                                        <option>Cash</option>
                                                        <option>G-Cash</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>

                                                <td><label>
                                                        <br>
                                                        <button type="submit" class="btn btn-default" name="submit" id="submit" style="color: white; background-color: #021f4e; border: 1px; width: 200%; border-radius:25px;">Create</button>
                                                    </label></td>


                                                <td style="color: black;"></td>
                                                <td>

                                                </td>
                                            </tr>

                                        </table>



                                </div>

                                </form>
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