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
		
		.sub1{
			color: white;
			background-color: #021f4e;
			padding: 5px;
			font-size: 18px;
			text-decoration: none;
			border-radius: 25px;
			font-family: bahnschrift light;
			border-style: none;
			padding: 8px;
		}
		
		.sub2{
			color: white;
			background-color: #021f4e;
			padding: 5px;
			font-size: 18px;
			text-decoration: none;
			border-radius: 25px;
			font-family: bahnschrift light;
			border-style: none;
			padding: 8px;
			width: 48%;
		}
	
		/* The Modal (background) */
		.modal {
		  display: none; /* Hidden by default */
		  position: fixed; /* Stay in place */
		  z-index: 9999; /* Sit on top */
		  padding-top: 100px; /* Location of the box */
		  left: 0;
		  top: 0;
		  width: 100%; /* Full width */
		  height: 100%; /* Full height */
		  overflow: auto; /* Enable scroll if needed */
		  background-color: rgb(0,0,0); /* Fallback color */
		  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		  position: absolute;
		  background-color: #fff;
		  margin:10% 40%;
		  padding: 0;
		  border: 1px solid #888;
		  width: 30%;
		  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
		  -webkit-animation-name: animatetop;
		  -webkit-animation-duration: 0.4s;
		  animation-name: animatetop;
		  animation-duration: 0.4s
		}

		/* Add Animation */
		@-webkit-keyframes animatetop {
		  from {top:-300px; opacity:0} 
		  to {top:0; opacity:1}
		}

		@keyframes animatetop {
		  from {top:-300px; opacity:0}
		  to {top:0; opacity:1}
		}

		/* The Close Button */
		


		.modal-header {
		  padding: 1px 16px;
		  background-color: #021f4e;
		  color: white;
		  font-size: 50%;
		}

		.modal-body {padding: 2px 16px;}

		.modal-footer {
		  padding: 2px 16px;
		  background-color: #fff;
		  color: white;
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
									 
	<div class="form-group"> <label for="exampleInputEmail1" style="color: #021f4e;">Blotter Type <button id="myBtn" class="sub1">+ Add Blotter Type</button></label> 
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

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
	<table style="width: 100%; font-size: 110%;">
		<thead style="background-color: #021f4e;">
			<tr>
				<th><span style="color: white; padding: 3px 3px 3px 10px; font-size: 130%;">Add Blotter Type</th>
				<th></th>
			</tr>
		</thead>
		<tr>
			<td style="color: black; padding: 3px;" colspan="2">Blotter Name:</td>
		</tr>
		<tr>
			<td style="padding: 3px;" colspan="2"><input type="text" style="width: 95%; margin-left: 2%; margin-right: 2%;" placeholder="Blotter Name"></td>
		</tr>
		<tr>
			<td><button type="button" class="sub2" style="margin-left: 1%; margin-bottom: 2%; background-color: gray;" onclick="document.getElementById('myModal').style.display='none'">Cancel</button> <button type="addblot" class="sub2" name="addblot" id="addblot"onclick="document.getElementById('myModal').style.display='none'" >Add</button></td>
			<td></td>
		</tr>
	</table>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

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