<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$adminid=$_SESSION['clientmsaid'];
$cpassword=$_POST['currentpassword'];
$newpassword=$_POST['newpassword'];
$sql ="SELECT ID FROM tbladmin WHERE ID=:adminid and Password=:cpassword";
$query= $dbh -> prepare($sql);
$query-> bindParam(':adminid', $adminid, PDO::PARAM_STR);
$query-> bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);

if($query -> rowCount() > 0)
{
$con="update tbladmin set Password=:newpassword where ID=:adminid";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':adminid', $adminid, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();

echo '<script>alert("Your password successully changed")</script>';
echo "<script>window.location.href ='change-password.php'</script>";
} else {
echo '<script>alert("Your current password is wrong")</script>';

}
}
  ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Change Logo</title>

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
	<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   

</script>
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
<li class="active">Change Logo</li>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<h2 class="inner-tittle">Change Logo </h2>
<div class="graph-form" style="border: 1px solid black; border-radius: 25px;">
<div class="form-body" style="margin-left: 3%">
<form name="changepassword" method="post" onsubmit="return checkpass();" action=""> 
		
	<table style="border: none; width: 100%; font-size: 110%;">
		
		<tr>
			<th><span style="color: #000;">Change Display Photo</th>
			<th><span style="color: #000;">Change Barangay Logo</th>
			<th><span style="color: #000;">Change Manila Logo</th>
		</tr>
		<tr>
			<td>
				<img src="images/profile.png" width="50%">
			</td>
			<td>
				<img src="images/barangay.png" width="50%">
			</td>
			<td>
				<img src="images/Maynila.png" width="50%">
			</td>
		</tr>
		<tr>
			<td>
				<input type="file">
			</td>
			<td>
				<input type="file">
			</td>
			<td>
				<input type="file">
			</td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<td>
				<button type="submit" name="submit" id="submit" style="color: white;
		background-color: #021f4e;
		padding: 5px;
		font-size: 18px;
		height: 4.5%;
		width: 65%;
		text-decoration: none;
		border-radius: 25px;
		font-family: bahnschrift light;
		border-style: none;
		padding: 8px;">Change Display Photo</button>
			</td>
			<td>
				<button type="submit"  name="submit" id="submit" style="color: white;
		background-color: #021f4e;
		padding: 5px;
		font-size: 18px;
		height: 4.5%;
		width: 65%;
		text-decoration: none;
		border-radius: 25px;
		font-family: bahnschrift light;
		border-style: none;
		padding: 8px;">Change Barangay Logo</button>
			</td>
			<td>
				<button type="submit"  name="submit" id="submit" style="color: white;
		background-color: #021f4e;
		padding: 5px;
		font-size: 18px;
		height: 4.5%;
		width: 65%;
		text-decoration: none;
		border-radius: 25px;
		font-family: bahnschrift light;
		border-style: none;
		padding: 8px;">Change Manila Logo</button>
			</td>
		</tr>
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