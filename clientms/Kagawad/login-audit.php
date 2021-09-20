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
	<title>Login Audit</title>
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
							<li class="active">Login Audit</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
					<div class="graph-visual tables-main">
						
					
						<h3 class="inner-tittle two">Login Audit Logs</h3>
						<div class="graph" style="border-radius: 15px;">
							<div class="tables">
								<table class="table" border="1"> <thead> <tr style="background-color: #021f4e; font-size: 120%;">
									
										<th><span style="color: #fff;">Barangay Position</span></th>
										<th><span style="color: #fff;">Offical Name</span></th>
										<th><span style="color: #fff;">Login Time</span></th>
										<th><span style="color: #fff;">Logout Time</span></th>
									</tr>
									   </thead>
									    <tbody>
									    	<?php
/*$sql="SELECT * from tblresident";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               */?>
									     <tr class="active">
									        <td style="color: black;"><?php  //echo htmlentities($row->ResidentType);?>Chairman</td>
									         <td style="color: black;"><?php  //echo htmlentities($row->ContactName);?>Ledesma, Marithess Velasquez</td>
											 <td style="color: black;">02/01/2021 2:30PM</td>
											 <td style="color: black;">02/01/2021 6:00PM</td>
									     </tr>
										 <tr class="active">
									        <td style="color: black;"><?php  //echo htmlentities($row->ResidentType);?>Secretary</td>
									         <td style="color: black;"><?php  //echo htmlentities($row->ContactName);?>Dela Cruz, Kim Renzo</td>
											 <td style="color: black;">02/01/2021 2:30PM</td>
											 <td style="color: black;">02/01/2021 6:00PM</td>
									     </tr>
										 <tr class="active">
									        <td style="color: black;"><?php  //echo htmlentities($row->ResidentType);?>Treasurer</td>
									         <td style="color: black;"><?php  //echo htmlentities($row->ContactName);?>Sallan, Arnold Clavio</td>
											 <td style="color: black;">02/01/2021 2:30PM</td>
											 <td style="color: black;">02/01/2021 6:00PM</td>
									     </tr>
									     <?php //$cnt=$cnt+1;}} ?>
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