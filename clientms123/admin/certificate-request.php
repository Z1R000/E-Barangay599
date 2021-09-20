<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Certificate Request</title>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- /js -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!-- //js-->
</head> 
<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<?php include_once('includes/header.php');?>
				<!-- //header-ends -->
				<!--outter-wp-->
				<div class="outter-wp">
					<!--sub-heard-part-->
					<div class="sub-heard-part">
						<ol class="breadcrumb m-b-0">
							<li><a href="dashboard.php">Home</a></li>
							<li class="active">Certificate Request</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
					<div class="graph-visual tables-main">
						
					
						<h3 class="inner-tittle two">Certificate Request</h3>
						<div class="graph" style="border-radius: 15px;">
							<div class="tables">
								<table class="table" border="1"> <thead> <tr style="background-color: #021f4e;">
									 <th><span style="color: #fff; font-size: 120%;">Certificate Name</th> 
									 <th><span style="color: #fff; font-size: 120%;">Resident Name</th>
									 <th><span style="color: #fff; font-size: 120%;">Contact Number</th>
									 <th><span style="color: #fff; font-size: 120%;">Address</th>
									 <th><span style="color: #fff; font-size: 120%;">Email</th>
									 <th><span style="color: #fff; font-size: 120%;">Request Date</th>
									 <th><span style="color: #fff; font-size: 120%;">Proof of Payment</th>
									 <th><span style="color: #fff; font-size: 120%;">Option</th>
									  </tr>
									   </thead>
									    <tbody>
									    	<?php
$sql="SELECT distinct tblcertificaterequest.ID, tblcertificaterequest.userID, tblcertificaterequest.certificateID, tblcertificaterequest.requestStatus,tblcertificaterequest.requestDate, tblresident.LastName, tblresident.FirstName, tblresident.MiddleName, tblresident.Cellphnumber,tblresident.houseUnit,tblresident.streetName, tblresident.Email, tblcertificate.CertificateName from tblcertificaterequest join tblresident on tblresident.ID=tblcertificaterequest.userID join tblcertificate on tblcertificate.ID = tblcertificaterequest.certificateID";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
									     <tr class="active">
											<td style="color: black;"><?php  echo htmlentities($row->CertificateName);?></td>
											<td style="color: black;"><?php  echo htmlentities($row->LastName);?>, <?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->MiddleName);?></td>
									         <td style="color: black;"><?php  echo htmlentities($row->Cellphnumber);?></td> 
									         <td style="color: black;"><?php  echo htmlentities($row->houseUnit);?> <?php  echo htmlentities($row->streetName);?> St.</td>
											 <td style="color: black;"><?php  echo htmlentities($row->Email);?></td>
											 <td style="color: black;"><?php  echo htmlentities($row->requestDate);?></td>
											 <td style="color: #021f4e;">View File</td>
									         <td style="color: black;"><a href="edit-certificate-request.php?editid=<?php echo $row->ID;?>" style="color: red; text-decoration: underline; ">Accept</a>  ||  <a href="add-client-services.php?addid=<?php //echo $row->ID;?>" style="color: red; text-decoration: underline; ">Delete</a></td>
									     </tr>
										 
									     <?php $cnt=$cnt+1;}} ?>
									     </tbody> </table> 
							</div>

						</div>
				
					</div>
					<!--//graph-visual-->
				</div>
				<!--//outer-wp-->
				<?php include_once('includes/footer.php');?>
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
		<?php include_once('includes/sidebar.php');?>
		<div class="clearfix"></div>		
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {                
			if (toggle)
			{
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({"position":"absolute"});
			}
			else
			{
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({"position":"relative"});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php }  ?>