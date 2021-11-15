<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid'] == 0)) {
	header('location:logout.php');
} else {
	$eid = intval($_GET['editid']);
	$sqlcheck="Select * from tblcreatecertificate where ID = :eid";
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
		$sql = "update tblcreatecertificate set status=:stats WHERE ID=:eid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':stats', $stats, PDO::PARAM_STR);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);
		$query->execute();
		echo '<script>alert("Certificate Information has been updated")</script>';
		echo "<script>window.location.href ='edit-certificate-request.php?editid=" . $eid . "'</script>";
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

		<title>Edit Certificate Request</title>
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
						<h2 class="fs-2 m-0">Edit Certificate Request</h2>

					</div>

					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>


				</nav>
				<div class="sub-heard-part">
					<ol class="breadcrumb m-b-0" style="text-indent: 15px; margin-left: 2.5%;">
						<li><a href="dashboard.php">Home</a></li>/
						<li class="active">Record</li>/
						<li class="active"><a href="dashboard.php">Certificate Record</a></li>/
						<li class="active">Edit Certificate Record</li>
					</ol>
				</div>
				<form method="post">
					<?php
					$sql = "SELECT distinct tblcreatecertificate.*, tblcreatecertificate.ID as getID, tblresident.*, tblcertificate.*, tblstatus.* from tblcreatecertificate join tblcertificate on tblcertificate.ID = tblcreatecertificate.CertificateId join tblstatus on tblcreatecertificate.status = tblstatus.ID join tblresident on tblcreatecertificate.Userid=tblresident.ID WHERE tblcreatecertificate.ID=:eid";
					$query = $dbh->prepare($sql);
					$query->bindParam(':eid', $eid, PDO::PARAM_STR);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					foreach ($results as $row) {
						$cdates = $row->resDate;
						$cdates = date('F j Y - h:i A', strtotime($cdates));

					?>
						<div class="container-fluid px-4">
							<div class ="row pt-2 pb-3 px-4 ">
								<div class="col-10 mx-auto bg-white border pt-3 rounded-top px-5 pb-4">
								<div class="row">
									<div class="col-xl-4">
										<label for="date" class="black fw-bold fs-5">Date today</label>
										<input type="text" id="" class="form-control" value="<?php echo $cdates; ?>" readonly>
									</div>
									<div class="col-xl-2">
										<label for="date" class="black fw-bold fs-5">Status</label>
										<input type="text" id="status" class="form-control" placeholder="Pending" value="<?php echo $row->statusName; ?>" readonly>
									</div>
								</div>

								<div class="row g-3 ">
									<div class="col-md-6">

										<label for="rname" class="black fw-bold fs-5">Requestor Name</label>
										<input type="text" class="form-control" id="rname" placeholder="e.g Juan Dela Cruz" value="<?php echo htmlentities($row->FirstName); ?> <?php echo htmlentities($row->MiddleName); ?> <?php echo htmlentities($row->LastName); ?> <?php echo htmlentities($row->Suffix); ?>" readonly>

									</div>
									<div class="col-md-6">
										<label for="purp" class= "black fw-bold fs-5">Purpose</label>
											<select id = "purp" class ="form-select" name= "cmeth" disabled>
												<option value="<?php echo "$row->Purpose";?>"><?php echo "$row->Purpose";?></option>
											</select>
									</div>
								</div>
									<?php 
										$purpc = $row->Purpose;
										if ($purpc == "OTHERS"){
											echo '<div class="col-md-6">
											</div>
											<div class="col-md-6">
		
												<label for="rname" class="fs-6 fw-bold">Other Reasons</label>
												<input type="text" class="form-control" id="rname" placeholder="Please Specify:">
		
											</div>';
										}
									?>
								<div class="row">

									<div class="col-md-4">

									<label for="purp" class= "black fw-bold fs-5">Certificate Type</label>
                                                <select id = "purp" class ="form-select" name= "cmeth" disabled>
                                                    <option value="<?php echo "$row->CertificateId";?>" selected><?php echo "$row->CertificateName";?></option>                                                
                                                </select>
									</div>
									<div class="col-md-2">
										<label for="rname" class="fs-6 fw-bold">Certification Fee</label>
										<div class="d-flex">
											<div class="input-group">
												<button class="btn btn-secondary text-white" disabled>
													₱
												</button>
                                                <input id = "cname" class ="form-control" type="text" placeholder = "Certfication fee" name= "cname" value="<?php echo "$row->CertificatePrice";?>" disabled>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<label for="cname" class= "black fw-bold fs-5">Mode of Payment</label>
                                                <select id = "cname" class ="form-select" name= "cmeth" disabled>
                                                    <option value="<?php echo "$row->pMode";?>" id=""><?php echo "$row->pMode";?><option>                                                
                                                </select>
									</div>


								</div>
										<br>
								<?php 
										$ccheck = $row->CertificateName;
										if ($ccheck == "6" || $ccheck == "7" || $ccheck == "8"){
											echo '<div class="row">

											<div class="col-md-6">
												<label for="purp" class="fs-6 fw-bold">Business name
													<small class="text-muted">(If business related)</small> </label>
												<input type="text" class="form-control" id="rname" placeholder="e.g Manong Store">
											</div>
										</div><br>';
										}

										$scheck = "$row->statusName";
										if ($scheck == "PENDING" || $scheck == "REJECTED/CANCELLED"){
											echo '<div class="row">
											<div class="col-xl-3">
		
											</div>
											<div class="col-xl-3 ">
		
											</div>
											<div class="col-xl-3 ">
												<a href="manage-certificate.php" class="form-control btn btn-outline-danger" name="cancel" id="cancel">Cancel</a>
											</div>
											<div class="col-xl-3 ">
												<button type="submit" class="form-control btn btn-outline-success" name="delete" id="delete">Delete</button>
											</div>
										</div>';
										}else if ($scheck == "APPROVED" || $scheck == "PAYMENT REJECTED"){
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
											<div class="col-xl-1">
		
												<img src="images/images.jpg" alt="Girl in a jacket" width="80" height="80">
		
		
											</div>
											<div class="col-xl-2">
		
		
		
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
												<a href="manage-certificate.php" class="form-control btn btn-outline-danger" name="cancel" id="cancel">Cancel</a>
											</div>
											<div class="col-xl-3 ">
												<button type="submit" class="form-control btn btn-outline-success" name="submit" id="submit">Submit</button>
											</div>
										</div>';
										}else if ($scheck == "PAYMENT VERIFICATION" || $scheck == "PAYMENT VERIFIED" || $scheck == "SETTLED"){
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
		
										</div>
										<br>
										<div class="row py-3">
											
											<div class="col-xl-12 ">
											<div class="float-end">										
											<a href="manage-certificate.php" class="form-control btn btn-outline-danger" name="cancel" id="cancel">Cancel</a>
											</div>
											</div>

										</div>';
										}
									?>
							</div>
						</div>
						</div>
				</form>
			<?php } ?>



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
				function goBack() {
					window.history.back();
				}
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
                if (bus == 'Business Clearance Capital - Php10,000 Below') {
                    document.getElementById(divId).style.display = 'flex';
                } else if (bus == "Business Permit") {
                    document.getElementById(divId).style.display = 'flex';
                } else if (bus == "Business Clearance Capital - Php10,001 - Php100-000") {
                    document.getElementById(divId).style.display = 'flex';
                } else if (bus == "Business Clearance Capital - Php100,001 - Above") {
                    document.getElementById(divId).style.display = 'flex';
                } else {
                    document.getElementById(divId).style.display = 'none';
                }



            }

            function showOthers(divId, element) {
                document.getElementById(divId).style.display = element.value == 'OTHERS' ? 'flex' : 'none';
            }

            function showOthersdec(divId, element) {
                document.getElementById(divId).style.display = element.value == 'others' ? 'flex' : 'none';
            }
        </script>
	</body>

	</html>
<?php } ?>