<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } else{
  
  ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>View Blotter Request</title>

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
	<!--clock init-->
	<script src="js/css3clock.js"></script>
	<!--Easy Pie Chart-->
	<!--skycons-icons-->
	<script src="js/skycons.js"></script>
	<!--//skycons-icons-->
</head> 
<body>
<div class="page-container">
<!--/content-inner-->
<div class="left-content">
<div class="inner-content">
	
<?php include_once('includes/header.php');?>
				<!--//outer-wp-->
<div class="outter-wp">
					<!--/sub-heard-part-->
<div class="sub-heard-part">
<ol class="breadcrumb m-b-0">
<li><a href="dashboard.php">Home</a></li>
<li><a href="manage-blotter.php">Blotter Request</a></li>
<li class="active">View Blotter Request</li>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<h2 class="inner-tittle">View Blotter Request</h2>
<div class="graph-form">
<div class="form-body">
<form method="post"> 
	<?php
$vid=$_GET['viewid'];
$sql="select distinct tblblotterrequest.ID,tblblotterrequest.blotterType,tblblotterrequest.incidentLocation,tblblotterrequest.incidentDate, tblblotterrequest.respondent, tblblotterrequest.complainant, tblblotterrequest.blotterSummary, tblblotterrequest.requestStatus, tblblotterrequest.requestDate, tblblotterrequest.userID, tblresident.LastName, tblresident.FirstName, tblresident.MiddleName from  tblblotterrequest   
	join tblresident on tblblotterrequest.userID = tblresident.ID where tblblotterrequest.ID=:vid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vid',$vid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>	


	<table style="border: none; width: 100%; font-size: 120%;">
		<tr>
			<th><span style="color: #000;">Blotter Type</span></th>
			<th><span style="color: #000;">Respondent/s Name</span></th>
			<th><span style="color: #000;">Complainant/s Name</span></th>
			<th><span style="color: #000;">Request Date</span></th>
		</tr>
		<tr>
			<td>
				 <input type="text" name="vic" placeholder="Victim/s Name" value="<?php  echo htmlentities($row->blotterType);?>" class="form-control" required='true' readonly="true" style="width: 90%;font-size: 90%; color: black;">
			</td>
			<td>
				 <input type="text" name="vic" placeholder="Victim/s Name" value="<?php  echo htmlentities($row->respondent);?>" class="form-control" required='true' style="width: 90%;font-size: 90%; color: black;" readonly="true">
			</td>
			<td>
				<input type="text" name="comp" placeholder="Complainant/s Name" value="<?php  echo htmlentities($row->complainant);?>" class="form-control" required='true' style="width: 90%;font-size: 90%; color: black;" readonly="true">
			</td>
			<td>
				<input type="text" name="comp" placeholder="Complainant/s Name" value="<?php  echo htmlentities($row->requestDate);?>" class="form-control" required='true' style="width: 90%;font-size: 90%; color: black;" readonly="true">
			</td>
		</tr>
		<tr>
			<td><br></br>
		</tr>
		<tr>
			<th colspan="2"><span style="color: #000;">Incident Location</span></th>
			<th><span style="color: #000;">Incident Time and Date</span></th>
			<th><span style="color: #000;">Request Status</span></th>
		</tr>
		<tr>
			<td colspan="2"><input type="text" name="incloc" placeholder="Incident Location" value="<?php  echo htmlentities($row->incidentLocation);?>" class="form-control" required='true' readonly='true' style="width: 95%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="incd" value="<?php  echo htmlentities($row->incidentDate);?>" placeholder="Incident Date" class="form-control" required='true' readonly='true' style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="td" value="<?php  echo htmlentities($row->requestStatus);?>" placeholder="Report Date" class="form-control" required='true' readonly='true' style="width: 90%;font-size: 90%; color: black;"></td>
		</tr>
		<tr>
			<td><br></br>
		</tr>
		<tr>
			<th><span style="color: #000;">Narrative Report</span></th>
		</tr>
		<tr>
			<td colspan="4"><input type="text" name="blotsum" placeholder="Blotter Summary" value="<?php  echo htmlentities($row->blotterSummary);?>" class="form-control" required='true' readonly='true' style="width: 97%;font-size: 90%; color: black;"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><center><input type="button" class="btn btn-default" value="Back" onClick="history.back();return true;" style="color: white; background-color: silver; border: 1px; border-radius:25px; width: 80%; padding: 2.5%;"></center> </form></td>
		</tr>
		<?php $cnt=$cnt+1;}} ?>
	</table>

</div>
</div>
</div> 
</div>
<?php include_once('includes/footer.php');?>
</div>
</div>		
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