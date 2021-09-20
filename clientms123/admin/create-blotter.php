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
 $blottype=$_POST['blottype'];
 $incloc=$_POST['incloc'];
 $incd=$_POST['incd'];
 $vic=$_POST['vic'];
 $comp=$_POST['comp'];
 $blotsum=$_POST['blotsum'];
 $blotstat=$_POST['blotstat'];
 $sumsched=$_POST['sumsched'];
 
$sql="insert into tblblotter (ID,blotterType,incidentLocation,incidentDate,respondent,complainant,blotterSummary,blotterStatus,summonSchedule,adminID)values(:id,:blottype,:incloc,:incd,:vic,:comp,:blotsum,:blotstat,:sumsched,:aid)";
$query=$dbh->prepare($sql);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->bindParam(':blottype',$blottype,PDO::PARAM_STR);
$query->bindParam(':incloc',$incloc,PDO::PARAM_STR);
$query->bindParam(':incd',$incd,PDO::PARAM_STR);
$query->bindParam(':vic',$vic,PDO::PARAM_STR);
$query->bindParam(':comp',$comp,PDO::PARAM_STR);
$query->bindParam(':blotsum',$blotsum,PDO::PARAM_STR);
$query->bindParam(':blotstat',$blotstat,PDO::PARAM_STR);
$query->bindParam(':sumsched',$sumsched,PDO::PARAM_STR);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Blotter has been added.")</script>';
echo "<script>window.location.href ='search-blotter.php'</script>";
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
	<title>Create Blotter </title>

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
<li class="active">Create Blotter </li>
</ol>
</div>	
					<!--/sub-heard-part-->	
					<!--/forms-->
<div class="forms-main">
<h2 class="inner-tittle">Create Blotter  </h2>
<div class="graph-form" style="border:1px solid black; border-radius: 15px;">
<div class="form-body">
<form method="post" style="font-size:1.25em;"> 
									 
	<div class="form-group"> <label for="exampleInputEmail1" style="color: #021f4e;">Blotter Type</label> 
		<select  name="blottype"  class="form-control select2" required='true' style="padding: 1px; font-size: 0.8em;">
		<option value=""></option>
		<option value="Violence">Violence</option>
		<option value="Property Damage">Property Damage</option>
		<option value="Robbery">Robbery</option>
	</select> </div>
	<div class="form-group"> <label for="exampleInputEmail1" style="color: #021f4e;">Respondent/s:</label> <input type="text" name="vic" placeholder="Respondent/s Name" value="" class="form-control" required='true' style=" font-size: 0.8em;"> </div>
	<div class="form-group"> <label for="exampleInputEmail1" style="color: #021f4e;">Complainant/s:</label> <input type="text" name="comp" placeholder="Complainant/s Name" value="" class="form-control" required='true' style=" font-size: 0.8em;"> </div>
	
	<div class="form-group"> <label for="exampleInputEmail1" style="color: #021f4e;">Incident Location:</label> <input type="text" name="incloc" placeholder="Incident Location" value="" class="form-control" required='true' style=" font-size: 0.8em;"> </div>
	<div class="form-group"> <label for="exampleInputEmail1" style="color: #021f4e;">Incident Time and Date</label> <input type="datetime-local" name="incd" value="" placeholder="Incident Date" class="form-control" required='true' style=" font-size: 0.8em;"> </div> 
	<div class="form-group"> <label for="exampleInputEmail1" style="color: #021f4e;">Narrative Incident:</label> <textarea type="text" name="blotsum" placeholder="Narrative" value="" class="form-control" required='true' rows="4" cols="3" style=" font-size: 0.8em;"></textarea> </div>
	<div class="form-group"> <label for="exampleInputEmail1" style="color: #021f4e;">Blotter Status</label> 
		<select  name="blotstat"  class="form-control select2" required='true' style="padding: 1px; font-size: 0.8em;">
		<option value="">Choose Status</option>
		<option value="Unfulfilled">Unfulfilled</option>
		<option value="On-Going">On-Going</option>
		<option value="Fulfilled">Fulfilled</option>
	</select> </div>
	<div class="form-group"> <label for="exampleInputEmail1" style="color: #021f4e;">Summon Schedule</label> <input type="datetime-local" name="sumsched" value="" placeholder="Summon Date" class="form-control" required='true' style=" font-size: 0.8em;"> </div> 
	
	
	
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