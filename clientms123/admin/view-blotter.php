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
	<title>View Blotter </title>
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
							<li class="active">View Blotter</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
		<div class="graph-visual tables-main" id="exampl">
						
					
						<h3 class="inner-tittle two">Blotter Details </h3>
<?php
$bid=intval($_GET['blotterid']);
$sql=" select distinct tblblotter.ID,tblblotter.blotterType,tblblotter.incidentLocation,tblblotter.incidentDate, tblblotter.respondent, tblblotter.complainant, tblblotter.blotterSummary, tblblotter.blotterStatus, tblblotter.blotterCreationDate, tblblotter.summonSchedule, tblblotter.adminID, tbladmin.BarangayPosition, tblresident.LastName, tblresident.FirstName, tblresident.MiddleName from  tblblotter   
	join tbladmin on tblblotter.adminID=tbladmin.ID join tblresident on tblblotter.adminID = tblresident.ID where tblblotter.ID=:bid";
$query = $dbh -> prepare($sql);
$query->bindParam(':bid',$bid,PDO::PARAM_STR);
$query->execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
						<div class="graph" style="border-radius: 15px; border: 1px black solid;">
							<div class="tables">
								<table style="border: none; width: 100%; font-size: 120%;">
									<tr>
										<th><span style="color: #000;">Blotter Type</span></th>
										<th><span style="color: #000;">Respondent/s Name</span></th>
										<th><span style="color: #000;">Complainant/s Name</span></th>
										<th><span style="color: #000;">Blotter Status</span></th>
									</tr>
									<tr>
										<td><input type="text" name="blottype" placeholder="Blotter Type" value="<?php  echo htmlentities($row->blotterType);?>" class="form-control" required='true' style="width: 90%;font-size: 90%; color: black;" readonly='true' ></td>
										<td>
											 <input type="text" name="vic" placeholder="Victim/s Name" value="<?php  echo htmlentities($row->respondent);?>" class="form-control" required='true' readonly='true' style="width: 90%;font-size: 90%; color: black;">
										</td>
										<td>
											<input type="text" name="comp" placeholder="Complainant/s Name" value="<?php  echo htmlentities($row->complainant);?>" class="form-control" required='true' readonly='true'  style="width: 90%;font-size: 90%; color: black;">
										</td>
										<td>
											<input type="text" name="blotstat" placeholder="Victim/s Name" value="<?php  echo htmlentities($row->blotterStatus);?>" class="form-control" required='true' readonly='true'  style="width: 90%;font-size: 90%; color: black;">
										</td>
									</tr>
									<tr>
										<td><br></td>
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
										<td><br></td>
									</tr>
									<tr>
										<th><span style="color: #000;">Narrative Report</span></th>
									</tr>
									<tr>
										<td colspan="4"><input type="text" name="blotsum" placeholder="Blotter Summary" value="<?php  echo htmlentities($row->blotterSummary);?>" class="form-control" required='true' readonly='true' style="width: 90%;font-size: 90%; color: black;"></td>
									</tr>
								</table>
													
<?php $cnt=$cnt+1;}} ?>

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
}
</script>
</body>
</html>
<?php }  ?>