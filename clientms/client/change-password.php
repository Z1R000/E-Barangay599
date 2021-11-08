<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid'] == 0)) {
    header('location:logout.php');
} else {

    $uid = $_SESSION['clientmsuid'];
    $newpassword = $_POST['newpassword'];

    $sqlc = "select * from tblresident where ID=:uid";
    $queryc = $dbh->prepare($sqlc);
    $queryc->bindParam(':uid', $uid, PDO::PARAM_STR);
    $queryc->execute();
    $resultc = $queryc->fetchAll(PDO::FETCH_OBJ);


    if ($queryc->rowCount() > 0) {
        foreach ($resultc as $rowc) {
            $getter = $rowc->Password;
        }
    }

    if (isset($_POST['submit'])) {



        if ($getter != $_POST['currentpassword']) {
            echo '<script>alert("Current password not match.")</script>';
        } else {
            $sql = "update tblresident set Password=:newpassword where ID=:uid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
            $query->bindParam(':uid', $uid, PDO::PARAM_STR);
            $query->execute();

            echo '<script>alert("Password has been changed.")</script>';
            echo "<script>window.location.href ='change-password.php'</script>";
        }
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <?php include('link.php'); ?>
        <link rel="stylesheet" href="css/sidebar.css" />



        <title>Change Password</title>
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
            <?php include_once("includes/sidebarupdated.php"); ?>
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
                                        <img src="../<?php echo $row1->Blogoone; ?>" style="width: 100px;">
                                    </div>

                                </div>
                                <div class="col-xl-6 " align="center">
                                    <h3 class="py-4"><?php echo $row1->Baddress; ?> <br>
                                        <?php echo $row1->Btitle; ?></h3>
                                </div>
                                <div class="col-xl-3">
                                    <div class="float-end" style="margin-right:50px;">
                                        <img src="../<?php echo $row1->Blogotwo; ?>" style="width: 100px;">
                                    </div>


                                </div>
                            </div>

                        </div>
                <?php }
                } ?>

                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-align-justify primary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0">Change Password</h2>

                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                </nav>


                <form method="POST">
                <div class="container-fluid px-4 my-5">
                    <div class="forms-main" style="margin: 20px;">
                        <form action="">
                            <div class="row  justify-content-center">
                                <div class="row g-2">
                                    <div class="col-xl-5 shadow-sm border-end border-start border-bottom mx-auto ">
                                        <div class="row g-2 bg-599 border-599 text-white">
                                            <div class="fs-4 px-2 py-1">
                                                Change Password
                                            </div>
                                        </div>

                                        <div class="row g-2 px-3  py-2 ">
                                            <label for="Current Password" class="fs-5"><span class="text-danger fs-5">*</span>Current Password</label>
                                            <input type="password" name = "currentpassword" id="currentpassword" class="form-control" required>

                                            <label for="pas" class="col-xl-2 fs-5 py-0"><span class="text-danger fs-5">*</span>Password </label>



                                            <input type="password" id="newpassword" name="newpassword" class="form-control" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">


                                            <label for="cf" class="col-xl-2 fs-5 py-0"><span class="text-danger fs-5">*</span>Confirm Password </label>



                                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">

                                        </div>
                                        <div class="row py-2">
                                            <div class="col-xl-12">
                                                <div class="float-end">
                                                    <div class="btn-group">
                                                        <button type="submit" name="submit" id="submit" class="btn btn-success mx-1"><i class="fa fa-save mx-1"></i>
                                                            Save Changes
                                                        </button>
                                                    </div>
                                                    <div class="btn-group">
                                                        <a class="btn btn-secondary mx-1" href="admin-dashboard.php"><i class="fa fa-times-circle mx-1"></i>
                                                            Cancel
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                                <div class="col-xl-5">

                                </div>

                            </div>
                    </div>
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
            var password = document.getElementById("password"),
                confirm_password = document.getElementById("confirm_password");

            function validatePassword() {
                if (password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Passwords does not match.");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
        </script>
    </body>

    </html>
<?php } ?>