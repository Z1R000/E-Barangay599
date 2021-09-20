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
  $email=$_POST['email'];
  $sql="update tbladmin set Email=:email where ID=:aid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':email',$email,PDO::PARAM_STR);
     $query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();

    echo '<script>alert("Your profile has been updated")</script>';
    echo "<script>window.location.href ='admin-profile.php'</script>";
 
  }
  
  if(isset($_POST['change']))
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
echo "<script>window.location.href ='admin-profile.php'</script>";
} else {
echo '<script>alert("Your current password is wrong")</script>';

}
}
  ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Admin Profile</title>

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
	
<?php include_once('includes/header.php');?>
				<!--//outer-wp-->
<div class="outter-wp">
					<!--/sub-heard-part-->
<div class="sub-heard-part">
<ol class="breadcrumb m-b-0">
<li><a href="dashboard.php">Home</a></li>
<li class="active">Profile</li>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<h2 class="inner-tittle">Admin Profile </h2>
<div class="graph-form" style="border: 1px black solid; border-radius: 15px;">
<div class="form-body">
<form method="post"> 
									<?php
$aid=$_SESSION['clientmsaid'];
//$sql="SELECT * from  tbladmin where ID=:aid";
$sql="SELECT distinct tbladmin.ID, tblresident.ID, tbladmin.BarangayPosition, tbladmin.Email, tblresident.LastName, tblresident.FirstName, tblresident.MiddleName, tblresident.AGE, tbladmin.dutyTime, tblresident.Gender, tblresident.BirthDate,
	tblresident.Cellphnumber, tblresident.Purok, tblresident.streetName, tblresident.houseUnit from tbladmin JOIN tblresident WHERE tbladmin.ID=tblresident.ID and tbladmin.ID=:aid";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>

	<table style="border: none; width: 100%; font-size: 120%;">
		<tr>
			<th><span style="color: #000;">Barangay Position</span></th>
			<th><span style="color: #000;">Email</span></th>
			<th><span style="color: #000;">Time of Duty</span></th>
			<th><span style="color: #000;">Contact</span></th>
		<tr>
		<tr>
			<td><input type="text" name="" value="<?php  echo $row->BarangayPosition;?>" readonly="" class="form-control" style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="email" value="<?php  echo $row->Email;?>" class="form-control" style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="time" name="" value="<?php  echo $row->dutyTime;?>" readonly="" class="form-control" style="width: 90%;font-size: 90%; color: black;"></td>
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
			<th><span style="color: #000;">Purok</span></th>
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
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<td></td><td></td><td></td><td><?php $cnt=$cnt+1;}} ?> <center>
	 <button type="submit" class="sub" name="submit" id="submit" style="">Update</button> </form></td>
		</tr>
	</table>
	
	
</div>
</div>
</div> 

<div class="forms-main">
<h2 class="inner-tittle">Change Password </h2>
<div class="graph-form" style="border: 1px black solid; border-radius: 15px;">
<div class="form-body">
<form name="changepassword" method="post" onsubmit="return checkpass();" action=""> 
									
	<div class="form-group"> <label for="exampleInputEmail1" style="color: black;font-size: 1.25em;">Current Password</label> <input type="password" name="currentpassword" id="currentpassword" class="form-control" required="true" style="color: black;font-size: 1.25em;"> </div>
	<div class="form-group"> <label for="exampleInputEmail1" style="color: black;font-size: 1.25em;">New Password</label> <input type="password" name="newpassword"  class="form-control" required="true" style="color: black;font-size: 1.25em;"> </div>
	<div class="form-group"> <label for="exampleInputEmail1" style="color: black;font-size: 1.25em;">Confirm Password</label><input type="password" name="confirmpassword" id="confirmpassword" value="" class="form-control" required="true" style="color: black;font-size: 1.25em;"> </div>
	 
	 <button type="submit" class="sub" name="change" id="change" style="width: 15%; float: right;">Change</button>
	<br>
	 </form> 
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