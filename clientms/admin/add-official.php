<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$clientmsaid=$_SESSION['clientmsaid'];
 $barangayposition=$_POST['barangayposition'];
 $password=$_POST['password'];
 $uname=$_POST['uname'];
 $resid=$_POST['resid'];

 
$sql="insert into tbladmin (ID,residentID,BarangayPosition,Email,Password)values(:id,:resid,:barangayposition,:email,:password)";
$query=$dbh->prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->bindParam(':resid',$resid,PDO::PARAM_STR);
$query->bindParam(':barangayposition',$barangayposition,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Official has been added.")</script>';
		echo "<script>window.location.href ='add-official.php'</script>";
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
	<title>Add Official</title>

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="js/autosearch.js"></script>
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
<li class="active">Add Official</li>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<h2 class="inner-tittle">Add Official </h2>
<div class="graph-form" style="border: 1px solid black; border-radius: 15px;">
<div class="form-body">
<form method="post"> 
									 
	<div class="form-group"> <label for="exampleInputEmail1"  style="font-size: 1.25em; color: black;">Barangay Position</label> 
		<select  name="barangayposition" class="form-control select2" required='true' style="font-size: 100%; padding: 1px;">
		<option value=""></option>
		<option value="Chairman / Chairwoman">Chairman / Chairwoman</option>
		<option value="Secretary">Secretary</option>
		<option value="Treasurer">Treasurer</option>
		<option value="Kagawad">Kagawad</option>
		
		
	</select> </div>
	<div class="form-group"> <label for="exampleInputEmail1" style="font-size: 1.25em; color: black;">Resident Name</label><input type="text" name="resid" value="" placeholder="Resident Name"  class="form-control" required='true'  style="font-size: 100%; color: black;"> </div>
	<div class="form-group"> <label for="exampleInputEmail1" style="font-size: 1.25em; color: black;">Email</label> <input type="text" name="email" value="" placeholder="Email" class="form-control" required='true' style="font-size: 100%; color: black;"> </div>
<div class="form-group"> <label for="exampleInputEmail1" style="font-size: 1.25em; color: black;">Password</label>
	<input placeholder="password" type="Password" name="password" required="true" id="password" class="form-control" style="font-size: 100%; color: black;">
</div>
	
	
	 <button type="submit" class="btn btn-default" name="submit" id="submit" style="color: white;
		background-color: #021f4e;
		padding: 5px;
		font-size: 18px;
		height: 4.5%;
		width: 15%;
		text-decoration: none;
		border-radius: 25px;
		font-family: bahnschrift light;
		border-style: none;
		padding: 8px;">Add </button> </form> 
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