<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid'] == 0)) {
    header('location:logout.php');
} else {
    $uid = $_SESSION['clientmsuid'];
    if (isset($_POST['submit'])) {
        $ctype = $_POST['ctype'];
        $purp = $_POST['purp'];
        $other = $_POST['other'];
        $pMode = $_POST['pMode'];
        $bn = $_POST['bn'];

        $sql = "insert into tblcreatecertificate (Userid, CertificateId, purpID, other, pMode,bName) VALUES (:uid,:ctype,:purp,:other,:pMode,:bn)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':uid', $uid, PDO::PARAM_STR);
        $query->bindParam(':ctype', $ctype, PDO::PARAM_STR);
        $query->bindParam(':purp', $purp, PDO::PARAM_STR);
        $query->bindParam(':other', $other, PDO::PARAM_STR);
        $query->bindParam(':pMode', $pMode, PDO::PARAM_STR);
        $query->bindParam(':bn', $bn, PDO::PARAM_STR);
        $query->execute();


        $LastInsertId = $dbh->lastInsertId();
        if ($LastInsertId > 0) {
            echo '<script>alert("Certificate request has been sent.")</script>';
            echo "<script>window.location.href ='certificate-request.php'</script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    }
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
                            $('#purp').attr("required", true);
                            $('#arname').attr("required", true);
                            $('#businessnamerequired').attr("required", true);
                            $('#capitalrequired').attr("required", true);
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
            <?php include_once('includes/sidebarupdated.php'); ?>
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
                        <i class="fa fa-align-justify secondary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0">Certificate Request</h2>

                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                </nav>
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0" style="text-indent: 15px; margin-left: 2.5%;">
                        <li><a href="dashboard.php">Home</a></li>/
                        <li class="active">Request</li>/
                        <li class="active">Certificate Request</li>
                    </ol>
                </div>
                <div class="container-fluid px-4">
                   <div class="row">
                       <div class="col-11 mx-auto">
                        <div class="row">
                            <div class="fs-5 text-white rounded-top" style= "background: #012f4e">Certification Request</div>
                        </div>
                        <div class="row pb-3 px-3 bg-white border shadow-sm">
                        <div class="row ">
                            <div class="col-xl-4">
                                <label for="date" class="fw-bold fs-6">Date today</label>
                                <input type="text" id="date" class="form-control" readonly>
                            </div>
                        </div>

                        <form method="post">
                            <?php
                            $sql = "select * from tblresident where ID=:uid";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':uid', $uid, PDO::PARAM_STR);
                            $query->execute();

                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            foreach ($results as $row) {
                            ?>
                                <div class="row g-3 ">
                                    <div class="col-md-6">

                                        <label for="rname" class="fs-6 fw-bold">Requestor Name</label>
                                        <input type="text" class="form-control" id="rname" placeholder="e.g Juan Dela Cruz" value="<?php echo "$row->FirstName $row->MiddleName $row->LastName $row->Suffix";
                                                                                                                                } ?>" readonly>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="purp" class="fs-6 fw-bold">Purpose</label>
                                        <select class="select form-select" name="purp" id="purp" onchange="showOthers('other_txt',this);" required>
                                            <option selected disabled>--Purpose--</option>
                                            <?php
                                            $sqllist = "select * from tblpurposes where serviceType='1'";
                                            $checkplist = $dbh->prepare($sqllist);
                                            $checkplist->execute();
                                            $resultplist = $checkplist->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($resultplist as $rowplist) { ?>
                                            <?php echo '<option value="' . $rowplist->ID . '">' . $rowplist->Purpose . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-3 mt-1" id="other_txt">
                                    <div class="col-xl-6">

                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="other" id="other" placeholder="Specify a purpose here">
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-4">

                                        <label for="ctype" class="fs-6 fw-bold">Certification Type</label>
                                        <div class="d-flex">

                                            <?php
                                            $cName = '';
                                            $query = "SELECT * FROM tblcertificate";
                                            $result = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $cName .= '<option value="' . $row["ID"] . '">' . $row["CertificateName"] . '</option>';
                                            }
                                            ?>
                                            <select class="form-control action" name="ctype" id="ctype" onchange="showHid('hidden_div',this)" required>
                                                <option selected disabled>--Available Certifications--</option>
                                                <?php echo $cName; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2" style="z-index: 0;">
                                        <label for="rname" class="fs-6 fw-bold"> Fee</label>
                                        <div class="d-flex">
                                            <div class="input-group">
                                                <button class="btn btn-secondary text-white" disabled>
                                                    ₱
                                                </button>
                                                <select name="cprice" id="cprice" class="form-control action" disabled>
                                                    <option value='' selected disabled></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ctype" class="fs-6 fw-bold">Mode of Payment</label>
                                        <div class="d-flex">
                                            <select class="select form-select" name="pMode" id="pMode" required>
                                                <option selected disabled>--Select--</option>
                                                <option value="G-Cash">G-Cash</option>
                                                <option value="Cash">Cash</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="hidden_div" style="display:none;">

                                    <div class="col-md-6">
                                        <label for="purp" class="fs-6 fw-bold">Business name
                                            <small class="text-muted">(If business related)</small> </label>
                                        <input type="text" class="form-control" id="bn" name="bn" placeholder="e.g Manong Store">
                                    </div>


                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="float-end">
                                    <div class="btn-group ">
                                        <a href="dashboard.php" class="form-control btn btn-outline-danger" name="cancel" id="cancel">Cancel</a>
                                    </div>
                                    <div class="btn-group">
                                        <input type="submit" class="form-control btn btn-outline-success" name="submit" id="submit">
                                    </div>
                                    </div>
                                    </div>
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
                function showHid(divId, element) {
                    var bus = document.getElementById('ctype').value;
                    if (bus == '6' || bus == "7" || bus == "8") {
                        document.getElementById(divId).style.display = 'flex';
                    }else {
                        document.getElementById(divId).style.display = 'none';
                    }



                }

                function showOthers(divId, element) {
                    document.getElementById(divId).style.display = element.value == '13' ? 'flex' : 'none';
                }

                function showOthersdec(divId, element) {
                    document.getElementById(divId).style.display = element.value == 'Business Clearance Capital - Php10,000 Below' ? 'flex' : 'none';
                }
            </script>
            <script>
    $(document).ready(function() {
        $('.action').change(function() {
            if ($(this).val() != '') {
                var action = $(this).attr("id");
                var query = $(this).val();
                var result = '';
                if (action == "ctype") {
                    result = 'cprice';
                }
                $.ajax({
                    url: "fetchdata.php",
                    method: "POST",
                    data: {
                        action: action,
                        query: query
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                })
            }
        });
    });
</script>
    </body>

    </html>
<?php } ?>