<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$aid=$_SESSION['clientmsaid'];
 $rentid=$_POST['rentid'];
 $rid=$_POST['rid'];
 $rsdate=$_POST['rsdate'];
 $redate=$_POST['redate'];
 
$sql="insert into tblcreaterental (ID,userID,rentalID,adminID,rentalStartDate,rentalEndDate)values(:id,:rid,:rentid,:aid,:rsdate,:redate)";
$query=$dbh->prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->bindParam(':rid',$rid,PDO::PARAM_STR);
$query->bindParam(':rentid',$rentid,PDO::PARAM_STR);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->bindParam(':rsdate',$rsdate,PDO::PARAM_STR);
$query->bindParam(':redate',$redate,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Rental has been added.")</script>';
echo "<script>window.location.href ='create-rental.php'</script>";
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
	<title>Create Rental </title>

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
	<style>
		.button{
			font-family: bahnschrift light;
			color: black;
			padding: 22px;
			font-size: 20px;
		}
		
		.sub{
		color: white;
		background-color: #021f4e;
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
<li class="active">Create Rental </li>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<h2 class="inner-tittle">Create Rental </h2>
<div class="graph-form" style="border:1px solid black; border-radius: 15px;">
<div class="form-body">
<form method="post" style="font-size:1.25em;"> 
									 
	<div class="form-group"> <label for="exampleInputEmail1" style="color: #021f4e;">Choose Rental</label> 
		<select  name="rentid"  class="form-control select2" required='true' style="padding: 1px; font-size: 0.8em;">
			<option value="">Choose Rental</option>
			<option value="1">Basketball Court</option>
			<option value="2">Parking</option>
			<option value="3">Daycare</option>
			<option value="4">Barangay Hall</option>
		
		</select> </div>
	<div class="form-group"> <label for="exampleInputEmail1" style="color: #021f4e;">Resident Name:</label> <input type="text" name="rid" placeholder="Resident Name" value="" class="form-control" required='true' style="font-size: 0.8em;"> </div>
	<div class="form-group"> <label for="exampleInputEmail1" style="color: #021f4e;">Rental Start-Date:</label> <input type="datetime-local" name="rsdate" value="" placeholder="Rental Start Date" class="form-control" required='true' style="font-size: 0.8em;"> </div>
	<div class="form-group"> <label for="exampleInputEmail1" style="color: #021f4e;">Rental End-Date:</label> <input type="datetime-local" name="redate" value="" placeholder="Rental End Date" class="form-control" required='true' style="font-size: 0.8em;"> </div> 
	
	
	 <button type="submit" class="sub" name="submit" id="submit">Save</button> </form> 
	 <br>
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