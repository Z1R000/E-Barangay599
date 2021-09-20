<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$eid=intval($_GET['editid']);
$clientmsaid=$_SESSION['clientmsaid'];
  $rest=$_POST['rest'];
  $lname=$_POST['lname'];
  $fname=$_POST['fname'];
  $mname=$_POST['mname'];
  $hu=$_POST['hu'];
  $vp=$_POST['vp'];
  $prk=$_POST['prk'];
  $stn=$_POST['stn'];
  $gnd=$_POST['gnd'];
  $contact=$_POST['contact'];
  $age=$_POST['age'];
  $cstat=$_POST['cstat'];
  $vstat=$_POST['vstat'];
  $email=$_POST['email'];
 
$sql="update tblresident set ResidentType=:rest, LastName=:lname, FirstName=:fname, MiddleName=:mname, houseUnit=:hu, streetName=:stn, Purok=:prk, Gender=:gnd, Cellphnumber=:contact,CivilStatus=:cstat, voter=:vstat, AGE=:age, vPrecinct=:vp, Email=:email where ID=:eid";
$query=$dbh->prepare($sql);
//$query->bindParam(':acctid',$acctid,PDO::PARAM_STR);
$query->bindParam(':rest',$rest,PDO::PARAM_STR);
$query->bindParam(':vstat',$vstat,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mname',$mname,PDO::PARAM_STR);
$query->bindParam(':hu',$hu,PDO::PARAM_STR);
$query->bindParam(':vp',$vp,PDO::PARAM_STR);
$query->bindParam(':stn',$stn,PDO::PARAM_STR);
$query->bindParam(':gnd',$gnd,PDO::PARAM_STR);
$query->bindParam(':prk',$prk,PDO::PARAM_STR);
$query->bindParam(':contact',$contact,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':cstat',$cstat,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
echo '<script>alert("Resident detail has been updated")</script>';
echo "<script type='text/javascript'> document.location ='manage-client.php'; </script>";
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Update Resident</title>

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
</head> 
<body>
<div class="page-container">
<!--/content-inner-->
<div class="left-content">
<div class="inner-content">
	
<?php //include_once('includes/header.php');?>
				<!--//outer-wp-->
<div class="outter-wp">
					<!--/sub-heard-part-->
<div class="sub-heard-part">
<ol class="breadcrumb m-b-0">
<li><a href="dashboard.php">Home</a></li>
<li class="active">Update Resident</li>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<h2 class="inner-tittle">Update Resident </h2>
<div class="graph-form" style="border-radius: 25px;">
<div class="form-body">
<form method="post"> 
	<?php
$eid=$_GET['editid'];
$sql="SELECT * from tblresident where ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>


	<table style="border: none; width: 100%; font-size: 120%;">
		
		<tr>
			<th><span style="color: #000;">Resident Type</span></th>
			<th><span style="color: #000;">Last Name</span></th>
			<th><span style="color: #000;">First Name</span></th>
			<th><span style="color: #000;">Middle Name</span></th>
		<tr>
		<tr>
			<td><select  name="rest"  class="form-control select2" required='true' style="padding: 1px; width: 90%; font-size: 90%; color: black;">
		<option value="<?php  echo htmlentities($row->ResidentType);?>"><?php  echo htmlentities($row->ResidentType);?></option>
		<option value="House Owner">House Owner</option>
		<option value="Care Taker">Care Taker</option>
	       	<option value="Rental/Boarder">Rental/Boarder</option>
		<option value="Living W/Relatives">Living W/Relatives</option>
		
	</select></td>
			<td><input type="text" name="lname" placeholder="Last Name" value="<?php  echo htmlentities($row->LastName);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="fname" placeholder="First Name" value="<?php  echo htmlentities($row->FirstName);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="mname" placeholder="Middle Name" value="<?php  echo htmlentities($row->MiddleName);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<th><span style="color: #000;">Purok</th>
			<th><span style="color: #000;">House Unit/Lot No.</th>
			<th><span style="color: #000;">Street Name</th>
			<th><span style="color: #000;">Contact Number</th>
		</tr>
		<tr>
			<td><select  name="prk"  class="form-control select2" required='true' style="padding: 1px; width: 90%; font-size: 90%; color: black;">
		<option value="<?php  echo htmlentities($row->Purok);?>"><?php  echo htmlentities($row->Purok);?></option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		</select></td>
			<td><input type="text" name="hu" placeholder="House Unit/Lot No." value="<?php  echo htmlentities($row->houseUnit);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="stn" placeholder="Street Name" value="<?php  echo htmlentities($row->streetName);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="contact" value="<?php  echo htmlentities($row->Cellphnumber);?>" placeholder="Contact" class="form-control" maxlength='10' pattern="[0-9]+" style="width: 90%;font-size: 90%; color: black;"></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<th><span style="color: #000;">Birth Place</th>
			<th><span style="color: #000;">Birth Date</th>
			<th><span style="color: #000;">Tin Number</th>
			<th><span style="color: #000;">SSS Number</th>
		</tr>
		<tr>
			
			<td><input type="text" name="bplace" placeholder="Birth Place" value="<?php  echo htmlentities($row->BirthPlace);?>" class="form-control" required='true' style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="date" name="bdate" placeholder="" value="<?php  echo htmlentities($row->BirthDate);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="tin" value="<?php  echo htmlentities($row->tinNumber);?>" placeholder="Tin Number" class="form-control" maxlength='10'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="sss" value="<?php  echo htmlentities($row->sssNumber);?>" placeholder="SSS Number"  class="form-control" maxlength='10'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<th><span style="color: #000;">Civil Status</th>
			<th><span style="color: #000;">Voter Status</th>
			<th><span style="color: #000;">Voters Precinct Number</th>
			<th><span style="color: #000;">Gender</th>
		</tr>
		<tr>
			<td><select  name="cstatus"  class="form-control select2" required='true' style="padding: 1px; width: 90%; font-size: 90%; color: black;">
		<option value="<?php  echo htmlentities($row->CivilStatus);?>"><?php  echo htmlentities($row->CivilStatus);?></option>
		<option value="Single">Single</option>
		<option value="Married">Married</option>
		<option value="Widow">Widow</option>
		<option value="Separated">Separated</option>
		
	</select></td>
			<td><select  name="voter"  class="form-control select2" required='true' style="padding: 1px; width: 90%; font-size: 90%; color: black;">
		<option value="<?php  echo htmlentities($row->voter);?>"><?php  echo htmlentities($row->voter);?></option>
		<option value="Yes">Yes</option>
		<option value="No">No</option>
		
			</select></td>
			<td><input type="text" name="vp" value="<?php  echo htmlentities($row->vPrecinct);?>" placeholder="Voters Precinct Number" class="form-control" maxlength='10' style="width: 90%;font-size: 90%; color: black;"></td>
			<td><select name="gnd"  class="form-control select2" required='true' style="padding: 1px; width: 90%; font-size: 90%; color: black;">
				<option value="<?php  echo htmlentities($row->Gender);?>"><?php  echo htmlentities($row->Gender);?></option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<th><span style="color: #000;">Email</th>
			<th><span style="color: #000;">Password</th>
		</tr>
		<tr>
			<td><input type="email" name="email" value="<?php  echo htmlentities($row->Email);?>" placeholder="Email address" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input placeholder="Password" type="password" name="password" required="true" id="password" class="form-control"  style="width: 90%;font-size: 90%; color: black;"></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			
			<td><center><input type="button" class="btn btn-default" value="Cancel" onClick="history.back();return true;" style="color: white; background-color: silver; border: 1px; border-radius:25px; width: 50%; padding: 2.5%;"></td>
			<td></td><td></td>
			<td><center><button type="submit" class="btn btn-default" name="submit" id="submit" style="color: white; background-color: #021f4e; border: 1px; width: 50%; border-radius:25px;">Update</button> </center></td>
			
		</tr>
	</table>

								
	 
	<?php $cnt=$cnt+1;}} ?>
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