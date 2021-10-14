<!--?php

$curr = "Resident Registration";
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {

        $residenttype = $_POST['residenttype'];
        $prk = $_POST['prk'];
        $hunit = $_POST['hunit'];
        $voter = $_POST['voter'];
        $password = $_POST['password'];
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $gend = $_POST['gend'];
        $bdate = $_POST['bdate'];
        $strt = $_POST['strt'];
        $contact = $_POST['contact'];
        $tin = $_POST['tin'];
        $sss = $_POST['sss'];
        $cstatus = $_POST['cstatus'];
        $email = $_POST['email'];
        $vp = $_POST['vp'];

        $sql = "insert into tblresident (ResidentType,Purok,houseUnit,voter,LastName,FirstName,MiddleName,Gender,BirthDate,streetName,Cellphnumber,tinNumber,sssNumber,CivilStatus,Email,Password,vPrecinct)
        values(:residenttype,:prk,:hunit,:voter,:lname,:fname,:mname,:gend,:bdate,:strt,:contact,:tin,:sss,:cstatus,:email,:password,:vp)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':residenttype', $residenttype, PDO::PARAM_STR);
        $query->bindParam(':prk', $prk, PDO::PARAM_STR);
        $query->bindParam(':hunit', $hunit, PDO::PARAM_STR);
        $query->bindParam(':voter', $voter, PDO::PARAM_STR);
        $query->bindParam(':vp', $vp, PDO::PARAM_STR);
        $query->bindParam(':lname', $lname, PDO::PARAM_STR);
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
        $query->bindParam(':mname', $mname, PDO::PARAM_STR);
        $query->bindParam(':gend', $gend, PDO::PARAM_STR);
        $query->bindParam(':bdate', $bdate, PDO::PARAM_STR);
        $query->bindParam(':strt', $strt, PDO::PARAM_STR);
        $query->bindParam(':contact', $contact, PDO::PARAM_STR);
        $query->bindParam(':tin', $tin, PDO::PARAM_STR);
        $query->bindParam(':sss', $sss, PDO::PARAM_STR);
        $query->bindParam(':cstatus', $cstatus, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();

        $LastInsertId = $dbh->lastInsertId();
        if ($LastInsertId > 0) {
            echo '<script>alert("Resident request has been sent.")</script>';
            echo "<script>window.location.href ='resident-registration.php'</script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    }
 
?-->

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay 599 Resident Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../css/scrollbar.css">
    <link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">


    <link rel="icon" href="IMAGES/Barangay.png" type="image/icon type">

    <title>599 Registration</title>
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

        .divfortable {
            background-color: white;
            overflow: auto;
        }

        .input-sm {
            font-size: 16px;
        }

        .form-sm {
            font-size: 16px;
        }

        .white {
            color: white;
        }

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
    <div class="d-flex align-items-center">
        <div class="container mx-5 mt-3">
        </div>
    </div>
    </div>
    </nav>




    <form method="post">
        <div id="page-content-wrapper">
            <div class="container-fluid py-3 px-5 mx-1">
                <div class="container-fluid banner" align="center">
                    <div class="row">
                        <div class="col-xl-3 px-1 ">
                            <div class="float-start">
                                <img src="images/barangay.png" style="width: 100px;">
                            </div>

                        </div>
                        <div class="col-xl-6 " align="center">
                            <h3 class="py-4">BARANGAY 599, ZONE 59, DISTRICT VI <br>
                                OFFICE OF THE SANGGUNIANG BARANGAY</h3>
                        </div>
                        <div class="col-xl-3">
                            <div class="float-end">
                                <img src="images/maynila.png" style="width: 100px;">
                            </div>


                        </div>
                    </div>

                </div>

                <div class="row gx-4 border bg-info py-2 ">
                    <div class="fs-5 text-center white">
                        <i class="fa fa-address-book me-2"></i> Resident Registration Form
                    </div>


                </div>
                <div class="row gx-4 border bg-white">
                    <div class="col-xl-4 px-5 pb-5 pt-2 border-end">
                        <div class="row g-0">

                            <label for="rtype" class="col-form-label fw-bold fs-6">Resident Type</label>

                            <select class="form-select input-sm" name="residenttype" aria-label="Default select example" required>
                                <option value='' disabled selected>--Select Resident Type--</option>
                                <option value="homeowner">Home Owner</option>
                                <option value="caretaker">Care taker</option>
                                <option value="rental">Rental/Boarder</option>
                                <option value="wrelative">Living with Relatives</option>
                            </select>


                        </div>

                        <div class="row g-0 ">

                            <label for="gend" class="col-form-label fw-bold">Gender</label>

                            <select class="form-select" name="gend" aria-label="Default select example">
                                <option value='' disabled selected>--Select gender--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>


                        </div>
                        <div class="row g-0 ">

                            <label for="fname" class="col-form-label fw-bold">First Name</label>
                            <input type="text" name="fname" class="form-control" placeholder="First name" required>


                        </div>
                        <div class="row g-0 ">

                            <label for="mname" class="col-form-label fw-bold">Middle Name</label>
                            <input type="text" name="mname" class="form-control" placeholder="Middle name" required>

                        </div>
                        <div class="row g-0 ">

                            <label for="lname" class="col-form-label fw-bold">Last Name</label>
                            <input type="text" name="lname" class="form-control" placeholder="Last name" required>

                        </div>
                        <div class="row g-0 ">

                            <label for="suf" class="col-form-label fw-bold">Name Suffix</label>
                            <input type="text" name="suf" class="form-control" placeholder="E.g 1st, 2nd, Jr., Sr...." required>
                            <!--<select class="form-select" id = "suf" aria-label="Default select example">
                                        <option  class= "text-muted" selected >E.g 1st, 2nd, Jr., Sr....</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="sr">Sr.</option>
                                        <option value="jr">Jr.</option>
                                        
                            </select>-->


                        </div>
                        <div class="row g-0">

                            <label for="bdate" class="col-form-label fw-bold">Birth Date</label>
                            <input type="date" name="bdate" class="form-control" placeholder="Birthdate">

                        </div>
                        <div class="row g-0 ">

                            <label for="cstatus" class="col-form-label fw-bold">Civil Status</label>
                            <select class="form-select" name="cstatus" aria-label="Default select example">
                                <option value='' selected disabled>--Civil Status--</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Separated">Separated</option>
                                <option value="Widow">Widow/widdower</option>
                            </select>
                        </div>



                    </div>
                    <div class="col-xl-4 px-5 pb-5 pt-2">
                        <div class="row g-0 ">

                            <label for="prk" class="col-form-label fw-bold">Purok</label>
                            <select class="form-select" name="prk" aria-label="Default select example">
                                <option value='' selected disabled>--Purok Number--</option>
                                <option value="1">Purok 1</option>
                                <option value="2">Purok 2</option>
                                <option value="3">Purok 3</option>
                            </select>

                        </div>


                        <div class="row g-0 ">

                            <label for="strt" class="col-form-label fw-bold">Street</label>

                            <select class="form-select" name="strt" aria-label="Default select example">
                                <option value='' selected disabled>--Street Name--</option>
                                <option value="s1">Street 1</option>
                                <option value="s2">Street 2</option>
                            </select>


                        </div>

                        <div class="row g-0 ">

                            <label for="hunit" class="col-form-label fw-bold">House unit/Lot number</label>
                            <input type="text" name="hunit" class="form-control" placeholder="House unit/Lot no. here">

                        </div>
                        <div class="row g-0 ">

                            <label for="contact" class="col-form-label fw-bold">Contact Number</label>
                            <input type="text" name="contact" class="form-control" placeholder="Contact Number">

                        </div>
                        <div class="row g-0 ">

                            <label for="tin" class="col-form-label fw-bold">TIN</label>
                            <input type="text" name="tin" class="form-control" placeholder="TIN here">

                        </div>
                        <div class="row g-0 ">

                            <label for="sss" class="col-form-label fw-bold">SSS number</label>
                            <input type="text" name="sss" class="form-control" placeholder="SSS number here">

                        </div>
                        <div class="row g-0 ">

                            <label for="voter" class="col-form-label fw-bold">Voter Status</label>
                            <select class="form-select" name="voter" aria-label="Default select example">
                                <option value='' selected disabled>--Voter Status--</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>

                        </div>
                        <div class="row g-0 ">

                            <label for="vp" class="col-form-label fw-bold">Precinct Number</label>
                            <select class="form-select" name="vp" aria-label="Default select example">
                                <option value='' selected disabled>--Voter's Precinct--</option>
                                <option value="50-A">50-A</option>
                                <option value="51-A">51-A</option>
                            </select>

                        </div>


                    </div>
                    <div class="col-xl-4 px-5 pb-5 pt-2 border-start">
                        <div class="row g-0 ">

                            <label for="email" class="col-form-label fw-bold">E-mail Address</label>
                            <input type="text" name="email" class="form-control" placeholder="Email Address">

                        </div>
                        <div class="row g-0 ">

                            <label for="pass" class="col-form-label fw-bold">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">

                        </div>
                        <div class="row g-0 ">

                            <label for="cpass" class="col-form-label fw-bold">Confirm Password</label>
                            <input type="password" name="cpass" class="form-control" placeholder="Confirm Password">

                        </div>



                    </div>
                    <div class="row  gx-4 py-2 justify-content-start">


                        

                        <div class="col-xl-6 g-0 border">
                            <a href="index.php"  class="form-control btn btn-outline-danger" name="cancel" id="cancel">Cancel</a>
                        </div>

                        <div class="col-xl-6 g-0 border">
                            <button type="submit" class="form-control btn btn-outline-success" name="submit" id="submit">Submit</button>
                        </div>

                    </div>
                    
                </div>
    </form>

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
<?php //} 
?>