<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } 
     ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Announcement</title>

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
<body>
<div class="page-container">
	<!--/content-inner-->
	<div class="left-content">
		<div class="inner-content">
		
			<?php include_once('includes/header.php');?>
			<div class="outter-wp">
				<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="dashboard.php">Home</a></li>
								<li class="active">Announcement List</li>
							</ol>
						</div>
				
									<?php
	/*$uid=$_SESSION['clientmsuid'];
	$sql="SELECT ContactName from  tblresident where ID=:uid";
	$query = $dbh -> prepare($sql);
	$query->bindParam(':uid',$uid,PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query->rowCount() > 0)
	{
	foreach($results as $row)
	{*/               ?>
	
		<h1 style="float: left; color: #021f4e;">Announcement</h2>
		<br>
		<h4 style="float: right; text-indent: -12%; color: #021f4e;">
			For April 1, 2021 to April 3, 2021 <?php  //echo $row->ContactName;?>
		</h4>
		<br><br><br>
		<div class="graph" style="border: 1px solid black; border-radius: 25px;">
		<h2 style="text-align: justify; text-indent: 10%;">Announcement Sample. Announcement Sample. Announcement Sample. Announcement Sample. Announcement Sample. Announcement Sample. Announcement Sample. Announcement Sample. Announcement Sample. </h2>
		</div>
		<h3 style="float: right; text-indent: -80%; color: #021f4e;">Announced By:</h3>
		<br><br><br>
		<h3 style="float: right;text-indent: -12%;">Chairman Ledesma</h3>
								<?php //$cnt=$cnt+1;}} ?>
								
		
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