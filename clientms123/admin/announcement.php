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
 $announcement=$_POST['announcement'];
 
$sql="insert into tblannouncement (ID,announcement,adminID)values(:id,:announcement,:aid)";
$query=$dbh->prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->bindParam(':announcement',$announcement,PDO::PARAM_STR);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Announcement has been posted.")</script>';
echo "<script>window.location.href ='announcement-list.php'</script>";
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
	<title>Post Announcement</title>

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
		background-color: #00a6FF;
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
<li class="active">Post Announcement</li>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<h2 class="inner-tittle">Post Announcement </h2>
<div class="graph-form">
<div class="form-body">
<form method="post"> 
									 
	<textarea type="text" name="announcement" placeholder="Announcement" value="" class="form-control" required='true' rows="10" cols="3" style="color: black; font-size: 120%;  border: 1px solid black; border-radius: 15px;"></textarea> </div><br>
	 <label class="">
		<input type="file">
	</label>
	<br>
	 <button type="submit" class="btn btn-default" name="submit" id="submit" style="color: white;
		background-color: #021f4e;
		padding: 5px;
		font-size: 18px;
		height: 4.5%;
		width: 12%;
		text-decoration: none;
		border-radius: 25px;
		font-family: bahnschrift light;
		border-style: none;
		padding: 8px;">Post</button> </form> 
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