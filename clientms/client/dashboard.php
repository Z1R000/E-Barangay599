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
<title>Dashboard</title>

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

</head> 
<body>
<div class="page-container">
	<!--/content-inner-->
	<div class="left-content">
		<div class="inner-content">
		
			<?php include_once('includes/header.php');?>
			
			<div class="outter-wp">
				<!--custom-widgets-->
				<div class="custom-widgets">
					<div class="row-one">
						<div class="col-md-4 widget">
							<div class="stats-left ">
								<?php 
$sql ="SELECT ID from tbladmin ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$tresidents=$query->rowCount();
?>
								<label><h4 style="font-size: 1.5em;">Total Officials: </h4><h3><?php echo htmlentities($tresidents);?></h3></label>
							</div>
							<div class="clearfix"> </div>	
						</div>
						<div class="col-md-4 widget">
							<div class="stats-left">
							<?php 
$sql1 ="SELECT ID from tblresident ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$tser=$query1->rowCount();
?>	
								<label><h4 style="font-size: 1.5em;">Total Residents: </h4><h3><?php echo htmlentities($tser);?></h3></label>
							</div>
							<div class="clearfix"> </div>	
						</div>
						
						<div class="col-md-4 widget states-thrd">
							<div class="stats-left">
								<?php
$sql6="select count(tblresident.voter) as voter
 from tblresident where tblresident.voter='Yes'";

  $query6 = $dbh -> prepare($sql6);
  $query6->execute();
  $results6=$query6->fetchAll(PDO::FETCH_OBJ);
  foreach($results6 as $row6)
{

$voter=$row6->voter;
}


  ?>
								<label><h4 style="font-size: 1.5em;">Total Voters: </h4><h3><?php echo htmlentities($voter);?></h3></label>
							</div>
						</div>
						<div class="clearfix"> </div>	
						

					</div>
				</div>
			</div>
			
			<div class="outter-wp">
				<!--custom-widgets-->
				<div class="custom-widgets">
					<div class="row-one">
						<div class="col-md-4 widget">
							<div class="stats-left ">
								<?php
								$sql7="select count(tblresident.Gender) as male
									from tblresident where tblresident.Gender='Male'";

								  $query7 = $dbh -> prepare($sql7);
								  $query7->execute();
								  $results7=$query7->fetchAll(PDO::FETCH_OBJ);
								  foreach($results7 as $row7)
								{

								$male=$row7->male;
								}


								  ?>
								<label><h4 style="font-size: 1.5em;">Total Male Residents: </h4><h3><?php echo htmlentities($male);?></h3></label>
							</div>
							<div class="clearfix"> </div>	
						</div>
						<div class="col-md-4 widget">
							<div class="stats-left">
							<?php
$sql8="select count(tblresident.Gender) as fem
from tblresident where tblresident.Gender='Female'";

  $query8 = $dbh -> prepare($sql8);
  $query8->execute();
  $results8=$query8->fetchAll(PDO::FETCH_OBJ);
  foreach($results8 as $row8)
{

$fem=$row8->fem;
}


  ?>

								<label><h4 style="font-size: 1.5em;">Total Female Residents: </h4><h3><?php echo htmlentities($fem);?></h3></label>
							</div>
							<div class="clearfix"> </div>	
						</div>
						
						<div class="col-md-4 widget states-thrd">
							<div class="stats-left">
								<?php
/*$sql9="select  sum(tblservices.ServicePrice) as totalcost
 from tblinvoice 
  join tblservices  on tblservices.ID=tblinvoice.ServiceId";

  $query9 = $dbh -> prepare($sql9);
  $query9->execute();
  $results9=$query9->fetchAll(PDO::FETCH_OBJ);
  foreach($results9 as $row9)
{

$total_sale=$row9->totalcost;
}*/


  ?>
								<label><h4 style="font-size: 1.5em;">Total Children(0-9y.o): </h4><h3><?php //echo htmlentities($tresidents);?>99</h3></label>
							</div>
						</div>
						<div class="clearfix"> </div>	
						

					</div>
				</div>
			</div>
						
			<div class="outter-wp">
				<div class="custom-widgets">
					<div class="row-one">
						<div class="col-md-4 widget">
							<div class="stats-left">
							<?php
								$sql7="select count(tblresident.Gender) as male
									from tblresident where tblresident.Gender='Male'";

								  $query7 = $dbh -> prepare($sql7);
								  $query7->execute();
								  $results7=$query7->fetchAll(PDO::FETCH_OBJ);
								  foreach($results7 as $row7)
								{

								$male=$row7->male;
								}


								  ?>
								<label><h4 style="font-size: 1.5em;">Total Adolescent: </h4><h3><?php //echo htmlentities($tresidents);?>99</h3></label>
								<div class="clearfix"> </div>	
							</div>
						</div>
						<div class="col-md-4 widget">
							<div class="stats-left">
								<?php
$sql8="select count(tblresident.Gender) as fem
from tblresident where tblresident.Gender='Female'";

  $query8 = $dbh -> prepare($sql8);
  $query8->execute();
  $results8=$query8->fetchAll(PDO::FETCH_OBJ);
  foreach($results8 as $row8)
{

$fem=$row8->fem;
}


  ?>

								<label><h4 style="font-size: 1.5em;">Total Senior Citizen: </h4><h3><?php //echo htmlentities($tresidents);?>99</h3></label>
								<div class="clearfix"> </div>	
							</div>
						</div>
					</div>
				</div>
			
	</div>
</div>
<!--//content-inner-->
<?php include_once('includes/footer.php');?>
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