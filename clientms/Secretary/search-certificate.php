<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Certificate Record </title>
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
	<!-- /js -->
	<script src="js/jquery-1.10.2.min.js"></script>
	<!-- //js-->
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
				<!-- header-starts -->
				<?php include_once('includes/header.php');?>
				<!-- //header-ends -->
				<!--outter-wp-->
				<div class="outter-wp">
					<!--sub-heard-part-->
					<div class="sub-heard-part">
						<ol class="breadcrumb m-b-0">
							<li><a href="dashboard.php">Home</a></li>
							<li class="active">Certificate Record</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
					<div class="graph-visual tables-main">
						
					
						<h3 class="inner-tittle two">Certificate Record </h3>
						<div class="graph" style=" border-radius: 15px;">

							<div class="tables">
								<form method="post" name="search" action="">
								<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

							<table>
								<tr>
									<th><span style="color: #021f4e;">Search by Resident Name</span></th>
								</tr>
								<tr>
									<td><input id="searchdata" type="text" name="searchdata" required="true" class="form-control" ></td>
									<td><button type="submit" name="search" class="btn btn-primary btn-sm" style="color: white;
		background-color: #021f4e;
		padding: 5px;
		font-size: 18px;
		height: 4.5%;
		width: 130%;
		text-decoration: none;
		border-radius: 25px;
		font-family: bahnschrift light;
		border-style: none;
		padding: 8px;">Search</button></td>
									<td colspan="8">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td><a href="search-certificate.php" class="btn btn-primary btn-sm" style="color: white;
		background-color: gray;
		padding: 5px;
		font-size: 18px;
		height: 4.5%;
		width: 160%;
		text-decoration: none;
		border-radius: 25px;
		font-family: bahnschrift light;
		border-style: none;
		padding: 8px;">Clear</a></td>
								</tr>
							</table>
					
								 </form> 
							<br>
							  
						</div>
						<?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result for "<?php echo $sdata;?>"</h4>
								<table class="table" border="1">
								<thead style="background-color: #021f4e;"><th><span style="color: #fff; font-size:120%;">#</span></th>
									 <th><span style="color: #fff; font-size:120%;">Certificate Name</span></th>
									 <th><span style="color: #fff; font-size:120%;">Resident Name</span></th>
									<th><span style="color: #fff; font-size:120%;">Contact Number</span></th> 
									<th><span style="color: #fff; font-size:120%;">Address</span></th> 
									<th><span style="color: #fff; font-size:120%;">Email</span></th> 
									 <th><span style="color: #fff; font-size:120%;">Certification Date</span></th>
									 <th><span style="color: #fff; font-size:120%;">Action</span></th>
									  </tr>
									   </thead>
									    <tbody>
									    	<?php
$sql="select distinct tblresident.LastName,tblresident.FirstName,tblresident.MiddleName,tblresident.Cellphnumber,tblresident.houseUnit,tblresident.streetName,tblresident.Email,tblcreatecertificate.CreationId,tblcreatecertificate.CreationDate, tblcertificate.CertificateName from  tblcreatecertificate   
	join tblcertificate on tblcertificate.ID=tblcreatecertificate.CertificateId join tblresident on tblcreatecertificate.Userid=tblresident.ID where tblresident.LastName like '%$sdata%'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
									     <tr class="active">
									      <th scope="row"><span style="color: #00a6ff;"><?php echo htmlentities($cnt);?></th>
									       <td><span style="color: #000;"><?php  echo htmlentities($row->CertificateName);?></td>
									        <td><span style="color: #000;"><?php  echo htmlentities($row->LastName);?>, <?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->MiddleName);?></td>
											<td><span style="color: #000;"><?php  echo htmlentities($row->Cellphnumber);?></td>
											<td><span style="color: #000;"><?php  echo htmlentities($row->houseUnit);?> <?php  echo htmlentities($row->streetName);?> St.</td>
											<td><span style="color: #000;"><?php  echo htmlentities($row->Email);?></td>
									         <td><span style="color: #000;"><?php  echo htmlentities($row->CreationDate);?></td> 
									         
									        <td><a href="view-certification.php?creationid=<?php  echo $row->CreationId;?>" style="color: red; text-decoration: underline;">View</a></td>
									     </tr>
									     <?php $cnt=$cnt+1;}}}else{?>
											<div class="tables">
								<table class="table" border="1">
								<thead style="background-color: #021f4e;"><th><span style="color: #fff; font-size:120%;">#</span></th>
									 <th><span style="color: #fff; font-size:120%;">Certificate Name</span></th>
									 <th><span style="color: #fff; font-size:120%;">Resident Name</span></th>
									<th><span style="color: #fff; font-size:120%;">Contact Number</span></th> 
									<th><span style="color: #fff; font-size:120%;">Address</span></th> 
									<th><span style="color: #fff; font-size:120%;">Email</span></th> 
									 <th><span style="color: #fff; font-size:120%;">Certification Date</span></th>
									 <th><span style="color: #fff; font-size:120%;">Action</span></th>
									  </tr>
									   </thead>
									    <tbody>
									    	<?php
$sql="select distinct tblresident.LastName,tblresident.FirstName,tblresident.MiddleName,tblresident.Cellphnumber,tblresident.houseUnit,tblresident.streetName,tblresident.Email,tblcreatecertificate.CreationId,tblcreatecertificate.CreationDate, tblcertificate.CertificateName from tblcreatecertificate   
	join tblcertificate on tblcertificate.ID=tblcreatecertificate.CertificateId join tblresident where tblcreatecertificate.Userid=tblresident.ID";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
									      <tr class="active">
									      <th scope="row"><span style="color: #00a6ff;"><?php echo htmlentities($cnt);?></span></th>
									       <td><span style="color: #000;"><?php  echo htmlentities($row->CertificateName);?></span></td>
									        <td><span style="color: #000;"><?php  echo htmlentities($row->LastName);?>, <?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->MiddleName);?></span></td>
											<td><span style="color: #000;"><?php  echo htmlentities($row->Cellphnumber);?></span></td>
											<td><span style="color: #000;"><?php  echo htmlentities($row->houseUnit);?> <?php  echo htmlentities($row->streetName);?> St.</td>
											<td><span style="color: #000;"><?php  echo htmlentities($row->Email);?></span></td>
									         <td><span style="color: #000;"><?php  echo htmlentities($row->CreationDate);?></span></td> 
									         
									        <td><a href="view-certification.php?creationid=<?php  echo $row->CreationId;?>" style="color: red; text-decoration: underline;">View</a></td>
									     </tr>
									     <?php $cnt=$cnt+1;}} ?>
									     </tbody> </table> 
							</div>
											 
										 <?php } ?>
									     </tbody> </table>
										 
					

						</div>
				
					</div>
					<!--//graph-visual-->
				</div>
				<!--//outer-wp-->
				<?php include_once('includes/footer.php');?>
			</div>
		</div>
		<!--//content-inner-->
		<!--/sidebar-menu-->
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