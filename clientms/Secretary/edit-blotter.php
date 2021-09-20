<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$eid=$_GET['editid'];
$aid=$_SESSION['clientmsaid'];
 $blottype=$_POST['blottype'];
 $vic=$_POST['vic'];
 $comp=$_POST['comp'];
 $blotsum=$_POST['blotsum'];
 $blotstat=$_POST['blotstat'];
 $sumsched=$_POST['sumsched'];
 $td=$_POST['td'];
 
$sql="update tblblotter set blotterType=:blottype,respondent=:vic,complainant=:comp,blotterSummary=:blotsum,blotterStatus=:blotstat,summonSchedule=:sumsched,blotterCreationDate=:td where ID=:eid";
$query=$dbh->prepare($sql);
//$query->bindParam(':acctid',$acctid,PDO::PARAM_STR);
$query->bindParam(':blottype',$blottype,PDO::PARAM_STR);
$query->bindParam(':vic',$vic,PDO::PARAM_STR);
$query->bindParam(':comp',$comp,PDO::PARAM_STR);
$query->bindParam(':td',$td,PDO::PARAM_STR);
$query->bindParam(':blotsum',$blotsum,PDO::PARAM_STR);
$query->bindParam(':blotstat',$blotstat,PDO::PARAM_STR);
$query->bindParam(':sumsched',$sumsched,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
echo '<script>alert("Blotter detail has been updated")</script>';
echo "<script type='text/javascript'> document.location ='manage-client.php'; </script>";
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Update Blotter</title>

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
<li><a href="search-blotter.php">Blotter Record</a></li>
<li class="active">Update Blotter</li>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<h2 class="inner-tittle">Update Blotter </h2>
<div class="graph-form">
<div class="form-body">
<form method="post"> 
	<?php
$eid=$_GET['editid'];
$sql="SELECT * from tblblotter where ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
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
			<th><span style="color: #000;">Blotter Status</span></th>
		</tr>
		<tr>
			<td><select  name="blottype"  class="form-control select2" required='true' style="padding: 1px; width: 90%; font-size: 90%; color: black;">
				<option value="<?php  echo htmlentities($row->blotterType);?>"><?php  echo htmlentities($row->blotterType);?></option>
				<option value="Violence">Violence</option>
				<option value="Property Damage">Property Damage</option>
				<option value="Robbery">Robbery</option>
			</select></td>
			<td>
				 <input type="text" name="vic" placeholder="Victim/s Name" value="<?php  echo htmlentities($row->respondent);?>" class="form-control" required='true' style="width: 90%;font-size: 90%; color: black;">
			</td>
			<td>
				<input type="text" name="comp" placeholder="Complainant/s Name" value="<?php  echo htmlentities($row->complainant);?>" class="form-control" required='true' style="width: 90%;font-size: 90%; color: black;">
			</td>
			<td>
				<select  name="blotstat"  class="form-control select2" required='true' style="padding: 1px; width: 90%; font-size: 90%; color: black;">
					<option value="<?php  echo htmlentities($row->blotterStatus);?>"><?php  echo htmlentities($row->blotterStatus);?></option>
					<option value="On-Going">On-Going</option>
					<option value="Fulfilled">Fulfilled</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><br></br>
		</tr>
		<tr>
			<th><span style="color: #000;">Incident Location</span></th>
			<th><span style="color: #000;">Incident Time and Date</span></th>
			<th><span style="color: #000;">Report Date</span></th>
		</tr>
		<tr>
			<td><input type="text" name="incloc" placeholder="Incident Location" value="<?php  echo htmlentities($row->incidentLocation);?>" class="form-control" required='true' readonly='true' style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="incd" value="<?php  echo htmlentities($row->incidentDate);?>" placeholder="Incident Date" class="form-control" required='true' readonly='true' style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="td" value="<?php  echo htmlentities($row->blotterCreationDate);?>" placeholder="Report Date" class="form-control" required='true' readonly='true' style="width: 90%;font-size: 90%; color: black;"></td>
		</tr>
		<tr>
			<td><br></br>
		</tr>
		<tr>
			<th><span style="color: #000;">Narrative Report</span></th>
		</tr>
		<tr>
			<td colspan="4"><input type="text" name="blotsum" placeholder="Blotter Summary" value="<?php  echo htmlentities($row->blotterSummary);?>" class="form-control" required='true' readonly='true' style="width: 90%;font-size: 90%; color: black;"></td>
		</tr>
		<tr>
			<td><center><input type="button" class="btn btn-default" value="Cancel" onClick="history.back();return true;" style="color: white; background-color: silver; border: 1px; border-radius:25px; width: 50%; padding: 2.5%;"></td>
			<td></td>
			<td><center><button type="submit" class="btn btn-default" name="submit" id="submit" style="color: white; background-color: #021f4e; border: 1px; width: 50%; border-radius:25px;">Update</button> </center> </form></td>
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