<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } else{
  	if(isset($_POST['submit'])){


$uid=$_SESSION['clientmsuid'];
$certid=$_POST['certid'];
$rs='Pending';

$sql="insert into tblcertificaterequest(Userid,CertificateId,requestStatus)values(:uid,:certid,:rs)";
$query=$dbh->prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->bindParam(':certid',$certid,PDO::PARAM_STR);
$query->bindParam(':rs',$rs,PDO::PARAM_STR);
$query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Certificate Request Sent.")</script>';
echo "<script>window.location.href ='certificate-request.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
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
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/amcharts.js"></script>	
<script src="js/serial.js"></script>	
<script src="js/light.js"></script>	
<script src="js/radar.js"></script>	
<link href="css/barChart.css" rel='stylesheet' type='text/css' />
<link href="css/fabochart.css" rel='stylesheet' type='text/css' />
<!--clock init-->
<script src="js/css3clock.js"></script>
<!--Easy Pie Chart-->
<!--skycons-icons-->
<script src="js/skycons.js"></script>

<script src="js/jquery.easydropdown.js"></script>

<!--//skycons-icons-->
</head>
<style>
		.button{
			font-family: bahnschrift light;
			color: black;
			padding: 22px;
			font-size: 20px;
		}
		
		.sub{
		color: white;
		background-color: #00a6FF;
		padding: 5px;
		font-size: 18px;
		height: 40px;
		width: 150px;
		float: right;
		text-decoration: none;
		border-radius: 25px;
		font-family: bahnschrift light;
		border-style: none;
		padding: 8px;
		}
	</style> 
<body>
<div class="page-container">
	<!--/content-inner-->
	<div class="left-content">
		<div class="inner-content">
		
			<?php include_once('includes/header.php');?>
				<div class="outter-wp">
					<!--sub-heard-part-->
					<div class="sub-heard-part">
						<ol class="breadcrumb m-b-0">
							<li><a href="dashboard.php">Home</a></li>
							<li class="active">Create Certificate</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
					<div class="graph-visual tables-main">
					
						<h3 class="inner-tittle two"> Create Certificate </h3>
						<div class="graph" style="border: 1px solid black; border-radius: 15px;">
							<div class="form-body">
							<form method="post" style="font-size:1.25em;">
								<table style="width: 100%;">
									<tr>
										<th><span  style="color: #021f4e;">Choose Certificate</th>
										<th><span  style="color: #021f4e;"></th>
										<th><span  style="color: #021f4e;">Certificate Price</th>
									</tr>
									<tr>
										<td><select  name="certid"  class="form-control select2" required='true' style="padding: 1px; font-size: 0.8em; width: 90%;">
										<option value="">Choose Certificate</option>
										<option value="1">Barangay Certificate</option>
										<option value="2">Barangay Clearance</option>
										<option value="3">Barangay Permit</option>
										<option value="4">Proof of Residency</option>
										<option value="5">Business Permit</option>
										<option value="6">Business Clearance Php10,000below</option>
										<option value="7">Business Clearance Php10,001-Php100-000</option>
										<option value="8">Business Clearance Php100,001-Above</option>
										<option value="9">Certificate of Good Moral</option>
										<option value="10">Lipat-bahay Clearance</option>
										<option value="11">Certificate of Acceptance</option>
										<option value="12">Certificate of Cohabitation</option>
										<option value="13">Certificate of Indigency</option>
										<option value="14">Certificate to File Action</option>
										<option value="15">Barangay ID</option>
										<option value="16">Medical Assistance/Senior Citizen</option>
										<option value="17">Referral Recommendation</option>
										<option value="18">Filling Fee</option>
									
								</select></td>
										<td style="color: black;"></td>
										<td style="color: black;">Php 30.00</td>
									</tr>
									<tr>
										<td><br></td>
									</tr>
									<tr>
										<td><label class="custom-file-upload">
									<input type="file"/>
									Proof of Payment
								</label></td>
								<td style="color: black;"></td>
										<td>
											 <button type="submit" class="btn btn-default" name="submit" id="submit" style="color: white; background-color: #021f4e; border: 1px; width: 80%; border-radius:25px;">Create</button>
										</td>
									</tr>
									
								</table>
								
								
								
								</div>
								
								 </form> 
							</div>
						</div>
				
					</div>
					<!--//graph-visual-->
				</div>
					
			<?php include_once('includes/footer.php');?>
		
	</div>
</div>
<!--//content-inner-->

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
<link rel="stylesheet" href="css/vroom.css">
<script type="text/javascript" src="js/vroom.js"></script>
<script type="text/javascript" src="js/TweenLite.min.js"></script>
<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php }  ?>