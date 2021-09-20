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
	<title>View Official </title>
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
<style>
	.sub{
		color: white;
		background-color: #021f4e;
		padding: 5px;
		font-size: 18px;
		height: 4.5%;
		width: 60%;
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
				<!-- header-starts -->
				<?php include_once('includes/header.php');?>
				<!-- //header-ends -->
				<!--outter-wp-->
				<div class="outter-wp">
					<!--sub-heard-part-->
					<div class="sub-heard-part">
						<ol class="breadcrumb m-b-0">
							<li><a href="dashboard.php">Home</a></li>
							<li class="active">View Official</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
		<div class="graph-visual tables-main" id="exampl">
						
					
						<h3 class="inner-tittle two">Official Details </h3>
<?php
$vid=$_GET['viewid'];
$clientmsaid=$_SESSION['clientmsaid'];
$sql="SELECT distinct tbladmin.ID, tblresident.ID, tbladmin.BarangayPosition, tbladmin.Email, tblresident.LastName, tblresident.FirstName, tblresident.MiddleName, tblresident.Age, tblresident.Purok, tblresident.BirthPlace,
	tblresident.Cellphnumber, tblresident.Purok, tblresident.streetName, tblresident.houseUnit , tbladmin.dutyTime, tblresident.BirthDate, tblresident.Gender, tblresident.CivilStatus, tblresident.voter, tblresident.ResidentType, tblresident.AGE from tbladmin JOIN tblresident WHERE tbladmin.residentID=tblresident.ID and tbladmin.ID=:vid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vid',$vid,PDO::PARAM_STR);
$query->execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
						<div class="graph-form" style="border: 1px black solid; border-radius: 15px;">
							<div class="tables">
								<table style="border: none; width: 100%; font-size: 120%;"> 
							 <tr>
								<th><span style="color: #000;">Barangay</span></th>
								<th><span style="color: #000;">Email</span></th>
								<th><span style="color: #000;">Time of Duty</span></th>
								<th><span style="color: #000;">Contact Number</span></th>
							</tr>
							<tr>
							</tr>
								<td><input type="text" name="" value="<?php  echo $row->BarangayPosition;?>" readonly="" class="form-control" style="width: 90%;font-size: 90%; color: black;"></td>
								<td><input type="text" name="email" value="<?php  echo $row->Email;?>" class="form-control" style="width: 90%;font-size: 90%; color: black;" readonly=""></td>
								<td><input type="time" name="" value="<?php  echo $row->dutyTime;?>" class="form-control" required='true' readonly='true' style="width: 90%;font-size: 90%; color: black;"></td>
								<td><input type="text" name="" value="<?php  echo $row->Cellphnumber;?>" readonly="" class="form-control" style="width: 90%;font-size: 90%; color: black;"></td>
							</tr>
							<tr>
								<td><br></td>
							</tr>
							<tr>
								<th><span style="color: #000;">Last Name</span></th>
								<th><span style="color: #000;">First Name</span></th>
								<th><span style="color: #000;">Middle Name</span></th>
								<th><span style="color: #000;">Gender</span></th>
							</tr>
							<tr>
								<td><input type="text" name="" value="<?php  echo $row->LastName;?>" readonly="" class="form-control" style="width: 90%;font-size: 90%; color: black;"></td>
								<td><input type="text" name="" value="<?php  echo $row->FirstName;?>" readonly="" class="form-control" style="width: 90%;font-size: 90%; color: black;"></td>
								<td><input type="text" name="" value="<?php  echo $row->MiddleName;?>" readonly="" class="form-control" style="width: 90%;font-size: 90%; color: black;"></td>
								<td><input type="text" name="" value="<?php  echo $row->Gender;?>" readonly="" class="form-control" style="width: 90%;font-size: 90%; color: black;"></td>
							</tr>
							<tr>
								<td><br></td>
							</tr>
							<tr>
								<th><span style="color: #000;">Purok #</span></th>
								<th><span style="color: #000;">Address</span></th>
								<th><span style="color: #000;">Birth Date</span></th>
								<th><span style="color: #000;">Age</span></th>
								
							</tr>
							<tr>
								<td><input type="text" name="" value="<?php  echo $row->Purok;?>" readonly="" class="form-control" style="width: 90%;font-size: 90%; color: black;"></td>
								<td><input type="text" name="" value="<?php  echo $row->houseUnit;?> <?php  echo $row->streetName;?> St." readonly="" class="form-control" style="width: 90%;font-size: 90%; color: black;"></td>
								<td><input type="text" name="" value="<?php  echo $row->BirthDate;?>" readonly="" class="form-control" style="width: 90%;font-size: 90%; color: black;"></td>
								<td><input type="text" name="" value="<?php  echo $row->AGE;?>" readonly="" class="form-control" style="width: 90%;font-size: 90%; color: black;"></td>
							</tr>
<?php $cnt=$cnt+1;}} ?>
</table>
<br>

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