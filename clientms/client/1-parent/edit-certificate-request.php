<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');



function upPhoto ($poid){
	$ftypes = array('png','jpeg','jpg');

	$fileName = $_FILES[''.$poid.'']['name'];
	$fileSize = $_FILES[''.$poid.'']['size'];
	$fileError = $_FILES[''.$poid.'']['error'];
	$filetmpname = $_FILES[''.$poid.'']['tmp_name'];
	$fileExt = explode('.',$fileName);
	$extension = strtolower(end($fileExt));
	
	$destination = "";

	if (in_array($extension,$ftypes)){
		if($fileSize<5000000){
			$newfilename = uniqid('',TRUE).".".$extension;
			$destination = "../../images/".$newfilename;
			move_uploaded_file($filetmpname,$destination);
		   // header('Location: admin-e-content.php?success=1');
		}
	}
	
	return $destination;

}
if (strlen($_SESSION['clientmsuid'] == 0)) {
	header('location:logout.php');
} else {
	$eid = intval($_GET['editid']);
	$sqlcheck="Select * from tblcreatecertificate where ID = :eid";
	$querycheck= $dbh->prepare($sqlcheck);
	$querycheck->bindParam(':eid',$eid,PDO::PARAM_STR);
	$querycheck->execute();
	$resultscheck = $querycheck->fetchAll(PDO::FETCH_OBJ);

	$statcheck="";
	foreach($resultscheck as $rowcheck){
		$statcheck = $rowcheck->status;
	}
	$pm = $_POST['cmeth'];
	if (isset($_POST['submit'])) {
	
		$ds = $_FILES['proof']['name'];
		if ($ds!="") {
			$upload = "";
			$destination = upPhoto('proof');
			$mop =1;
			$stats = $_POST['status'];
	
			if ($statcheck == "2"){
				$stats = "3";
				$upload = "Insert into tblpaymentlogs(mode,creationID,proof,servicetype) values(".$mop.",".$eid.",'".$destination."',2)";
				$msg= '<script>alert("Certificate Information and proof of payment sent has been updated")</script>';
			}
			else if ($statcheck == "7"){
				
				$stats = "3";
				$upload = "Update tblpaymentlogs set proof = '".$destination."' where creationID =".$eid." ";
				$msg= '<script>alert("Certificate payment updated")</script>';

			}
			$subm = $_FILES['proof']['name'];

				$sql = "update tblcreatecertificate set status=:stats WHERE ID=:eid";
				$query = $dbh->prepare($sql);
				$query->bindParam(':stats', $stats, PDO::PARAM_STR);
				$query->bindParam(':eid', $eid, PDO::PARAM_STR);
				$query->execute();
			
				if ($con->query($upload)===TRUE){
					
				}
				
				/*$query1 = $dbh->prepare($upload);
				$query1->bindParam(':mop', $mop, PDO::PARAM_STR);			
				$query1->bindParam(':eid:',$eid , PDO::PARAM_STR);
				$query1->bindParam(':destination', $destination, PDO::PARAM_STR);
				$query1->execute();
				*/
				echo $msg;
				echo "<script>window.location.href ='edit-certificate-request.php?editid=" . $eid . "'</script>";
			}else{
				
				$sql = "update tblcreatecertificate set pMode=:pm where ID = :eid";
				$query = $dbh->prepare($sql);
				$query->bindParam('pm',$pm, PDO::PARAM_STR);
				$query->bindParam('eid',$eid, PDO::PARAM_STR);
				$query->execute();
				echo '<script>alert("Certificate request has been updated'.$mop.'.")</script>';
				echo "<script>window.location.href ='edit-certificate-request.php?editid=" . $eid . "'</script>";
			}
	}

	if (isset($_POST['delete'])){
		$stats = "8";
		$sql = "update tblcreatecertificate set status=:stats WHERE ID=:eid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':stats', $stats, PDO::PARAM_STR);
		$query->bindParam(':eid', $eid, PDO::PARAM_STR);
		$query->execute();
		echo '<script>alert("Certificate request has been cancelled.")</script>';
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
										<img src="<?php echo $row1->Blogoone; ?>" style="width: 100px;">
									</div>

								</div>
								<div class="col-xl-6 " align="center">
									<h3 class="py-4"><?php echo $row1->Baddress; ?> <br>
										<?php echo $row1->Btitle; ?></h3>
								</div>
								<div class="col-xl-3">
									<div class="float-end" style="margin-right:50px;">
										<img src="	<?php echo $row1->Blogotwo; ?>" style="width: 100px;">
									</div>


								</div>
							</div>

						</div>
				<?php }
				} 
				?>
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
						<li class="active">Certificate Record</li>/
						<li class="active">Edit Certificate Record</li>
					</ol>
				</div>
				
				<form method="post" enctype="multipart/form-data">
					<?php
					$sql = "SELECT distinct tblcreatecertificate.*, tblcreatecertificate.ID as getID, tblresident.*, tblcertificate.*, tblstatus.*, tblpurposes.* from tblcreatecertificate join tblcertificate on tblcertificate.ID = tblcreatecertificate.CertificateId join tblstatus on tblcreatecertificate.status = tblstatus.ID join tblresident on tblcreatecertificate.Userid=tblresident.ID join tblpurposes on tblpurposes.ID = tblcreatecertificate.purpID WHERE tblcreatecertificate.ID=:eid";
					$query = $dbh->prepare($sql);
					$query->bindParam(':eid', $eid, PDO::PARAM_STR);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
			
					
					foreach ($results as $row) {
						$cdates = $row->resDate;
						$cdates = date('F j Y - h:i A', strtotime($cdates));

						$payorId = $row->ID;
						$mop = $row->pMode;
				

					?>
					
						<div class="container-fluid px-4">
							<div class ="row pt-2 pb-3 px-4 ">
								<div class="col-10 mx-auto bg-white border pt-3 rounded-top px-4 pb-4">
								<div class="row">
								<div class="col-xl-11">
					</div><div class="col-xl-1">
                        <a type ="button" role = "button" href = "manage-certificate.php" class="btn btn-secondary px-4" data-bs-dismiss= "modal" >
                                                    <i class="fa fa-arrow-circle-left mx-1"></i>
                                                            Back
                                                    </a>
                        </div>
						</div>
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
											<select id = "purp" class ="form-select" name= "purp" disabled>
												<option value="<?php echo "$row->purpID";?>"><?php echo "$row->Purpose";?></option>
											</select>
									</div>
								</div>
									<?php 
										$purpc = $row->purpID;
										if ($purpc == "13"){
											echo '<div class="col-md-6">
											</div>
											<div class="col-md-6">
		
												<label for="rname" class="fs-6 fw-bold">Other Reasons</label>
												<input type="text" class="form-control" id="rname" placeholder="Please Specify:" value="'.$row->other.'" disabled>
		
											</div>';
										}
									?>
								<div class="row">

									<div class="col-md-4">

									<label for="purp" class= "black fw-bold fs-5">Certificate Type</label>
                                                <select id = "purp" class ="form-select" name= "ct" disabled>
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
												<?php 
													if($row->statusName != "APPROVED"){
														echo '<select id = "cname" class ="form-select" name= "cmeth" readonly>
														<option value="'.$row->pMode.'" id="">'.$row->pMode.'</option>                                                
													</select>';
													}else{
														if($row->pMode == "G-Cash"){ 
															echo '<select id = "cname" class ="form-select" name= "cmeth">
															<option value="Cash" >Cash</option>
															<option value="G-Cash" selected>G-Cash</option>                                           
													</select>';
														}else{
															echo '<select id = "cname" class ="form-select" name= "cmeth">
															<option value="Cash" selected>Cash</option>
															<option value="G-Cash" >G-Cash</option>                                           
													</select>';
														}
														
													}
												?>
                                                
									</div>

								</div>
										<br>
								<?php 
										$ccheck = $row->CertificateId;
										if ($ccheck == "6" || $ccheck == "7" || $ccheck == "8"){
											echo '<div class="row">

											<div class="col-md-6">
												<label for="purp" class="fs-6 fw-bold">Business name
													<small class="text-muted">(If business related)</small> </label>
												<input type="text" class="form-control" id="rname" placeholder="e.g Manong Store" value="'.$row->bName.'" disabled>
											</div>
										</div><br>';
										}
										$scheck = "$row->statusName";
										$mcheck = $row->pMode;

										if ($mcheck == "G-Cash" ){
											if ($scheck == "PENDING"){
												
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
											}else if ($scheck == "PAYMENT REJECTED"){
												echo '
												<div class="row">
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
			
											</div>';
											$sql = "Select * from tblinformation";
												
											$query= $dbh->prepare($sql);
											$query->execute();
											$result = $query->fetchAll(PDO::FETCH_OBJ);
											
											foreach ($result as $cred){
												$sql = "Select proof from tblpaymentlogs where creationID = ".$eid."";
												$query = $dbh->prepare($sql);
												$query->execute();
												$cre = $query->fetchAll(PDO::FETCH_OBJ);
												foreach($cre as $i){

												
												echo '
												<div class="row">
												<div class="col-xl-3">
													
														<div class="col-12">													<input 	name = "proof" class="form-control form-control-sm" id="selectproof" onchange = "loadFile(event,\'cproof\');" type="file">
														</div>
														<div class="col-12">
															<img src = "'.$i->proof.'" class= "img-fluid" id = "cproof">
														</div>
													

												</div>
												<div class="col-xl-3">
			
												</div>
												<div class="col-xl-3">
												<div class= "fs-4">Qr Code</div>
												<div class="row justify-content-center align-items-center">
												<div class="col-8">
											
												<a href = "'.$cred->qr.'	" target = "_blank">	<img src="'.$cred->qr.'" alt="Default Image"  class= "img-fluid"  "></a>
												</div>
												</div>
												</div>
												<div class="col-xl-3">
												
													<div class="row">
														<div class="py-2">
														
														<div class="col-12">
														<div class="fs-4">Contact Number:</div>
														<div class="fs-5 fw-bold">'.$cred->bContact.'</div>
													
													</div>					
													</div>
													<div class="py-2">	
														<div class="col-12">
															<div class="fs-4">G-Cash Owner</div>
															<div class="fs-5 fw-bold">'.$cred->gName.'</div>
																											
														</div>
																
														
																							
													</div>
													</div>
												</div>
			
											</div>
											<br>
											';
											}}
											echo '
											<div class="row">
												<div class="col-xl-3">
			
												</div>
												<div class="col-xl-3 ">	
			
												</div>
												<div class="col-xl-3 ">
													<button type="submit" class="form-control btn btn-outline-danger" name="delete" id="delete">Cancel Request</button>
												</div>
												<div class="col-xl-3 ">
													<button type="submit" class="form-control btn btn-outline-success" name="submit" id="submit">Re-Submit</button>
												</div>
											</div>';
											}else if ($scheck == "PAYMENT VERIFIED" || $scheck == "FOR PICK-UP"|| $scheck == "SETTLED" || $scheck == "PAYMENT VERIFICATION"){
												$sql = "Select remarks, diff from tblcreatecertificate where ID = ".$eid."";
												$query  = $dbh->prepare($sql);
												$query->execute();
												$pf = $query->fetchAll(PDO::FETCH_OBJ);
												foreach($pf as $p){

												
											
												echo '
													<div class="fs-5 text-center text-info">'.$p->diff.'</div>
													<div class="fs-5 text-center text-info">Remarks: 	'.$p->remarks.'</div>
													
												';
												}	
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
											<div class="row">';
											$sql = "Select * from tblpaymentlogs where creationID=".$eid." and servicetype= 2";
											$query = $dbh->prepare($sql);
											$query ->execute();
											$result = $query->fetchAll(PDO::FETCH_OBJ);

											foreach ($result as $i){
											
											echo'
												<div class="col-xl-3">
												<div class="row">
												<div class="col-12">
													<img src="'.$i->proof.'" class= "img-fluid" >
														<br>';
											}
											$sql= "Select * from tblinformation";
											$query= $dbh->prepare($sql);
											$query->execute();
											$result = $query->fetchAll(PDO::FETCH_OBJ);
											
											foreach ($result as $cred){
											echo'
													</div>
													</div>
												</div>
												<div class="col-xl-3">
			
												</div>
												<div class="col-xl-3">
													<div class="row">
														<div class="fs-5">Qr Code</div>
														<div class="col-12">
															<img src="'.$cred->qr.'" alt="Girl in a jacket" class = "img-fluid">
														</div>
													</div>
												</div>
												<div class="col-xl-3">
												
													<div class="row">
														<div class="py-2">
														
														<div class="col-12">
														<div class="fs-4">Contact Number:</div>
														<div class="fs-5 fw-bold">'.$cred->bContact.'</div>
													
													</div>					
													</div>
													<div class="py-2">	
														<div class="col-12">
															<div class="fs-4">G-Cash Owner</div>
															<div class="fs-5 fw-bold">'.$cred->gName.'</div>
																											
														</div>
																
														
																							
													</div>
													</div>
												</div>
			
											</div>';
											}	
										
												
											
											}else if ($scheck == "APPROVED"){
												echo '
												<div class="row">
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
			
											</div>';
											$sql = "Select * from tblinformation";
												
											$query= $dbh->prepare($sql);
											$query->execute();
											$result = $query->fetchAll(PDO::FETCH_OBJ);
											
											foreach ($result as $cred){
											echo '
											<div class="row">
												<div class="col-xl-3">
													
														<div class="col-12">
														<input 	name = "proof" class="form-control form-control-sm" id="selectproof" onchange = "loadFile(event,\'cproof\');" type="file">
														</div>
														<div class="col-12">
															<img src = "../../images/defaultimage.png" class= "img-fluid" id = "cproof">
														</div>
													

												</div>
												<div class="col-xl-3">
			
												</div>
												<div class="col-xl-3">
												<div class= "fs-4">Qr Code</div>
												<div class="row justify-content-center align-items-center">
												<div class="col-8">
											
												<a href = "'.$cred->qr.'	" target = "_blank">	<img src="'.$cred->qr.'" alt="Default Image"  class= "img-fluid"  "></a>
												</div>
												</div>
												</div>
												<div class="col-xl-3">
													<div class="row">
														<div class="py-2">
														
														<div class="col-12">
														<div class="fs-4">Contact Number:</div>
														<div class="fs-5 fw-bold">'.$cred->bContact.'</div>
													
													</div>					
													</div>
													<div class="py-2">	
														<div class="col-12">
															<div class="fs-4">G-Cash Owner</div>
															<div class="fs-5 fw-bold">'.$cred->gName.'</div>
																											
														</div>
																
														
																							
													</div>
													</div>
												</div>
			
											</div>
											<br>
											';
											}
											echo '
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
											}else if ($scheck == "PAYMENT VERIFIED" || $scheck == "SETTLED" || $scheck == "PAYMENT VERIFICATION"){
												
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
											<div class="row">';
											$sql = "Select * from tblpaymentlogs where creationID=".$eid." servicetype= ";
											$query = $dbh->prepare($sql);
											$query ->execute();
											$result = $query->fetchAll(PDO::FETCH_OBJ);

											foreach ($result as $i){

											echo'
												<div class="col-xl-3">
												<div class="row">
												<div class="col-12">
													<img src="'.$i->proof.'" class= "img-fluid" >
														<br>';
											}
											$sql= "Select * from tblinformation";
											$query= $dbh->prepare($sql);
											$query->execute();
											$result = $query->fetchAll(PDO::FETCH_OBJ);
											
											foreach ($result as $cred){
											echo'
												</div>
												</div>
												</div>
												<div class="col-xl-3">
			
												</div>
												<div class="col-xl-3">
													<div class="row">
														<div class="fs-5">Qr Code</div>
														<div class="col-12">
															<img src="'.$cred->qr.'" alt="Girl in a jacket" class = "img-fluid">
														</div>
													</div>
												</div>
												<div class="col-xl-3">
												
													<div class="row">
														<div class="py-2">
														
														<div class="col-12">
														<div class="fs-4">Contact Number:</div>
														<div class="fs-5 fw-bold">'.$cred->bContact.'</div>
													
													</div>					
													</div>
													<div class="py-2">	
														<div class="col-12">
															<div class="fs-4">G-Cash Owner</div>
															<div class="fs-5 fw-bold">'.$cred->gName.'</div>
																											
														</div>
																
														
																							
													</div>
													</div>
												</div>
			
											</div>';
											}	
											}}else{
												if ($scheck == "APPROVED"){
													echo '
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
												}
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
	<script>
		var loadFile = function (event,imgid) {
        var image = document.getElementById(imgid);
            image.src = URL.createObjectURL(event.target.files[0]);
        };
	</script>

	</html>
<?php } ?>