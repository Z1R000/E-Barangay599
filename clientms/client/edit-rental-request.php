<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid'] == 0)) {
    header('location:logout.php');
} else {
    $eid = intval($_GET['editid']);
	$sqlcheck="Select * from tblcreaterental where ID = :eid";
	$querycheck= $dbh->prepare($sqlcheck);
	$querycheck->bindParam(':eid',$eid,PDO::PARAM_STR);
	$querycheck->execute();
	$resultscheck = $querycheck->fetchAll(PDO::FETCH_OBJ);
	foreach($resultscheck as $rowcheck){
		$statcheck = $rowcheck->status;
	}
	if (isset($_POST['submit'])) {
		$stats = $_POST['status'];
		if ($statcheck == "2" || $statcheck == "7"){
			$stats = "3";
		}
		$sql = "update tblcreaterental set status=:stats WHERE ID=:eid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':stats', $stats, PDO::PARAM_STR);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);
		$query->execute();
		echo '<script>alert("Rental Information has been updated")</script>';
		echo "<script>window.location.href ='edit-rental-request.php?editid=" . $eid . "'</script>";
	}
    if (isset($_POST['delete'])){
		$stats = "8";
		$sql = "update tblcreaterental set status=:stats WHERE ID=:eid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':stats', $stats, PDO::PARAM_STR);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);
		$query->execute();
		echo '<script>alert("Rental request has been cancelled.")</script>';
		echo "<script>window.location.href ='edit-rental-request.php?editid=" . $eid . "'</script>";
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
                <?php 
                    $sql="SELECT distinct tblcreaterental.*, tblresident.*, tblrental.*, tblstatus.*, tblpurposes.* from tblcreaterental join tblrental on tblrental.ID = tblcreaterental.rentalID join tblstatus on tblcreaterental.status = tblstatus.ID join tblresident on tblcreaterental.userID=tblresident.ID join tblpurposes on tblpurposes.ID = tblcreaterental.purpID WHERE tblcreaterental.ID=:eid";
                    $query= $dbh->prepare($sql);
                    $query->bindParam(':eid',$eid,PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    foreach($results as $row){
                        $checkstat = $row->status;
                        $pay = $row->payable;
                        $pay = number_format($pay,2);
                        $sdates = $row->rentalStartDate;
                        $sdates = date('F j Y - h:i A', strtotime($sdates));
                        $edates = $row->rentalEndDate;
                        $edates = date('F j Y - h:i A', strtotime($edates));
                    
                ?>
                <form method="post">
                <div class="container-fluid px-4 bg-white ">
                    
                    <div style="border-radius: 25px;border:1px solid black;padding: 25px;">
                    <div class="row">
								<div class="col-xl-11">
					</div><div class="col-xl-1">
                        <a type ="button" role = "button" href = "manage-certificate.php" class="btn btn-secondary px-4" data-bs-dismiss= "modal" >
                                                    <i class="fa fa-arrow-circle-left mx-1"></i>
                                                            Back
                                                    </a>
                        </div>
						</div>
                        <div class="graph-visual tables-main">

                            <div class="modal-body">
                            
                                <div class="row">

                                    <div class="col-xl-4">
                                        <label for="status" class="fs-5 fw-bold">Property to rent</label>
                                        <select name="" class="form-control" id="status" disabled>
                                            <option value="<?php echo $row->rentalName; ?>"><?php echo $row->rentalName; ?></option>
                                        </select>
                                    </div>

                                    <div class="col-xl-4">
                                        <label for="prate" class="fs-5 fw-bold">Rate<span class="text-muted fs-6">(per hour)</span></label>
                                        <div class="d-flex">
                                        <div class="input-group">
												<button class="btn btn-secondary text-white" disabled>
													₱
												</button>
                                            <input type="text" id="prate" class="form-control me-2" name="pRate" value="<?php echo $row->rentalPrice; ?>" readonly></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <label for="date" class="fw-bold fs-6">Status</label>
                                        <input type="text" id="status" class="form-control" name="status" value="<?php echo $row->statusName; ?>" readonly>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xl-12" >
                                            <label for="prate" class="fs-5 fw-bold">Rental Duration</label>
                                            <div class="input-group">
                                            <button class="btn btn-secondary disabled">From</button>
                                                <input type="text" name= "startDur" class="form-control" id="startDur" value="<?php echo $sdates ?>" disabled>
                                                <button class="btn btn-secondary disabled">to</button>
                                                <input type="text" name= "endDur" class="form-control" id="endDur" value="<?php echo $edates ?>" disabled>
                                        
                                            </div>
                                        </div>

                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <label for="purpose" class="fs-5 fw-bold">Purpose</label>
                                        <div class="d-flex">
                                            <input type="text" id="purpose" class="form-control me-2" name="purpose" value="<?php echo $row->Purpose; ?>"disabled>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="total" class="fs-5 fw-bold">Total</label>
                                        <div class="d-flex"><div class="input-group">
												<button class="btn btn-secondary text-white" disabled>
													₱
												</button>
                                            <input type="text" id="total" class="form-control me-2" name="total" value="<?php echo $pay; ?>" readonly disabled>
                    </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <?php 
                                    if ($checkstat == "1"){
                                        echo '<div class="row">
                                        <div class="col-xl-3">
    
                                        </div>
                                        <div class="col-xl-3 ">
    
                                        </div>
                                        <div class="col-xl-3 ">
                                        </div>
                                        <div class="col-xl-3 ">
                                            <button type="submit" class="form-control btn btn-outline-danger" name="delete" id="delete">Cancel Request</button>
                                        </div>
                                    </div>';
                                    }else if ($checkstat == "2" || $checkstat == "7"){
                                        echo '<div class="row">
                                        <div class="col-xl-3">
                                            <label for="formFileSm" class="form-label">Upload Proof of Payment<span class="fs-6 text-muted"> (JPEG or PNG format)</span></label>
    
                                        </div>
                                        <div class="col-xl-3">
    
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="ctype" class="black fw-bold fs-5">Payment Details</label>
    
                                        </div>
                                        <div class="col-xl-3">
    
                                        </div>
    
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <input class="form-control form-control-sm" id="formFileSm" type="file">
                                            <br>
                                        </div>
                                        <div class="col-xl-3">
    
                                        </div>
                                        <div class="col-xl-3">
                                            <img src="images/barangaybackground.png" alt="Girl in a jacket" width="280" height="250">
    
                                        </div>
                                        <div class="col-xl-3">
                                        <label for="ctype" style="font-size:130%; font-weight:600;">Francine Voltaire Ledesma <br><span style="font-size:90%;font-style:italic; font-weight:600;"> 09056602669</span></label>
    
    
                                        </div>
    
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-xl-3">
    
                                        </div>
                                        <div class="col-xl-3 ">
    
                                        </div>
                                        <div class="col-xl-3 ">
                                            <button type="submit" class="form-control btn btn-outline-danger" name="delete" id="delete">Cancel Request</button>
                                        </div>
                                        <div class="col-xl-3 ">
                                            <button type="submit" class="form-control btn btn-outline-success" name="submit" id="submit">Submit</button>
                                        </div>
                                    </div>';
                                    }else if ($checkstat == "4" || $checkstat == "6" || $checkstat == "3"){
                                        echo '<div class="row">
                                        <div class="col-xl-3">
                                        <label for="ctype" class="black fw-bold fs-5">Proof of Payment</label>
    
                                        </div>
                                        <div class="col-xl-3">
    
                                        </div>
                                        <div class="col-xl-3">
                                            <label for="ctype" class="black fw-bold fs-5">Payment Details</label>
    
                                        </div>
                                        <div class="col-xl-3">
    
                                        </div>
    
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-3">
                                        <img src="images/barangaybackground.png" alt="Girl in a jacket" width="280" height="250">
                                            <br>
                                        </div>
                                        <div class="col-xl-3">
    
                                        </div>
                                        <div class="col-xl-3">
                                            <img src="images/barangaybackground.png" alt="Girl in a jacket" width="280" height="250">
    
                                        </div>
    
                                    </div>';
                                    }
                                ?>
                                </div>
                        </div>

                    </div>
                    <!-- /#page-content-wrapper -->
                </div>
                    </form>
                <?php } ?>

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