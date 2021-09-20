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
	<title>View Resident </title>
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
							<li><a href="manage-client.php">Resident List</a></li>
							<li class="active">View Resident</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
		<div class="graph-visual tables-main" id="exampl">
						
					
						<h3 class="inner-tittle two">Resident Details </h3>
<?php
$vid=$_GET['viewid'];
$clientmsaid=$_SESSION['clientmsaid'];
$sql="select * from tblresident where ID=:vid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vid',$vid,PDO::PARAM_STR);
$query->execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
						<div class="graph-form" style="border-radius: 25px;">
							<div class="tables">
								<table style="border: none; width: 100%; font-size: 120%;">
		
		<tr>
			<th><span style="color: #000;">Resident Type</span></th>
			<th><span style="color: #000;">Last Name</span></th>
			<th><span style="color: #000;">First Name</span></th>
			<th><span style="color: #000;">Middle Name</span></th>
		<tr>
		<tr>
			<td><input type="text" name="lname" placeholder="Last Name" value="<?php  echo htmlentities($row->ResidentType);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="lname" placeholder="Last Name" value="<?php  echo htmlentities($row->LastName);?>" readonly="true" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="fname" placeholder="First Name" value="<?php  echo htmlentities($row->FirstName);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="mname" placeholder="Middle Name" value="<?php  echo htmlentities($row->MiddleName);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<th><span style="color: #000;">Purok</th>
			<th><span style="color: #000;">House Unit/Lot No.</th>
			<th><span style="color: #000;">Street Name</th>
			<th><span style="color: #000;">Contact Number</th>
		</tr>
		<tr>
			<td><input type="text" name="lname" placeholder="Last Name" value="<?php  echo htmlentities($row->Purok);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="hu" placeholder="House Unit/Lot No." value="<?php  echo htmlentities($row->houseUnit);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="stn" placeholder="Street Name" value="<?php  echo htmlentities($row->streetName);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="contact" value="<?php  echo htmlentities($row->Cellphnumber);?>" placeholder="Contact" class="form-control" maxlength='10' pattern="[0-9]+" style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<th><span style="color: #000;">Birth Place</th>
			<th><span style="color: #000;">Birth Date</th>
			<th><span style="color: #000;">Tin Number</th>
			<th><span style="color: #000;">SSS Number</th>
		</tr>
		<tr>
			
			<td><input type="text" name="bplace" placeholder="Birth Place" value="<?php  echo htmlentities($row->BirthPlace);?>" class="form-control" required='true' style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="bdate" placeholder="" value="<?php  echo htmlentities($row->BirthDate);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="tin" value="<?php  echo htmlentities($row->tinNumber);?>" placeholder="Tin Number" class="form-control" maxlength='10'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="sss" value="<?php  echo htmlentities($row->sssNumber);?>" placeholder="SSS Number"  class="form-control" maxlength='10'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<th><span style="color: #000;">Civil Status</th>
			<th><span style="color: #000;">Voter Status</th>
			<th><span style="color: #000;">Voters Precinct Number</th>
			<th><span style="color: #000;">Gender</th>
		</tr>
		<tr>
			<td><input type="text" name="lname" placeholder="Last Name" value="<?php  echo htmlentities($row->CivilStatus);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="lname" placeholder="Last Name" value="<?php  echo htmlentities($row->voter);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="vp" value="<?php  echo htmlentities($row->vPrecinct);?>" placeholder="Voters Precinct Number" class="form-control" maxlength='10' style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="lname" placeholder="Last Name" value="<?php  echo htmlentities($row->Gender);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<th><span style="color: #000;">Email</th>
		</tr>
		<tr>
			<td><input type="email" name="email" value="<?php  echo htmlentities($row->Email);?>" placeholder="Email address" class="form-control" required='true' readonly="true" style="width: 90%;font-size: 90%; color: black;"></td><td></td><td></td>
			<td><a href="index.php" name="cancel" id="cancel" style="color: white; background-color: silver; border: 1px; border-radius:25px; width: 60%; padding: 2.5%;" class="btn btn-default"> Delete</a></form></td>
		</tr>
	</table>
<?php $cnt=$cnt+1;}} ?>

<!--<p style="margin-top:1%"  align="center">
  <i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ></i>
</p>-->

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
	<script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>
</body>
</html>
<?php }  ?>