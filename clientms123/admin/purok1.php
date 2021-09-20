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
	<title>Resident List || Purok 1</title>
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
							<li class="active">Resident List for Purok 1</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
					<div class="graph-visual tables-main">
						
					
						<h3 class="inner-tittle two">Resident List Purok 1</h3>
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
									<td><a href="manage-client.php" class="btn btn-primary btn-sm" style="color: white;
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
								<a href="manage-client.php" style="color: white; background-color: #00a6ff; border: 1px; height: 4%; width: 12%; padding: 1%;"> All Residents</a> <a href="purok1.php" style="color: white; background-color: #f00; border: 1px; height: 3%; width: 12%; padding: 1%;">Purok 1</a> <a href="purok2.php" style="color: white; background-color: #00a6ff; border: 1px; height: 3%; width: 12%; padding: 1%;">Purok 2</a> <a href="purok3.php" style="color: white; background-color: #00a6ff; border: 1px; height: 3%; width: 12%; padding: 1%;">Purok 3</a> <a href="purok3.php" style="color: white; background-color: #00a6ff; border: 1px; height: 3%; width: 12%; padding: 1%;">Purok 4</a> <a href="purok3.php" style="color: white; background-color: #00a6ff; border: 1px; height: 3%; width: 12%; padding: 1%;">Purok 5</a> <a href="purok1.php" style="color: white; background-color: #00a6ff; border: 1px; height: 3%; width: 12%; padding: 1%;">Purok 6</a> <a href="purok2.php" style="color: white; background-color: #00a6ff; border: 1px; height: 3%; width: 12%; padding: 1%;">Purok 7</a> <a href="purok3.php" style="color: white; background-color: #00a6ff; border: 1px; height: 3%; width: 12%; padding: 1%;">Purok 8</a> <a href="purok3.php" style="color: white; background-color: #00a6ff; border: 1px; height: 3%; width: 12%; padding: 1%;">Purok 9</a> <a href="purok3.php" style="color: white; background-color: #00a6ff; border: 1px; height: 3%; width: 12%; padding: 1%;">Purok 10</a>
								<br><br>
								<table class="table" border="1"> <thead style="background-color: #021f4e;"> <tr>
									 <th><span style="color: #fff;">Purok</th>
									 <th><span style="color: #fff;">Resident Type</th> 
									 <th><span style="color: #fff;">Resident Name</th>
									 <th><span style="color: #fff;">Address</th>
									 <th><span style="color: #fff;">Mobile Number</th>
									 <th><span style="color: #fff;">Email</th>
									 <th><span style="color: #fff;">Setting</th>
									  </tr>
									   </thead>
									    <tbody>
									    	<?php
$sql="SELECT * from tblresident where Purok='1'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
									     <tr class="active">
											 <td style="color: #000;"><?php  echo htmlentities($row->Purok);?></td>
									        <td style="color: #000;"><?php  echo htmlentities($row->ResidentType);?></td>
									         <td style="color: #000;"><?php  echo htmlentities($row->LastName);?>, <?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->MiddleName);?></td>
											 <td style="color: #000;"><?php  echo htmlentities($row->houseUnit);?> <?php  echo htmlentities($row->streetName);?> St.</td>
									         <td style="color: #000;"><?php  echo htmlentities($row->Cellphnumber);?></td>
											 <td style="color: #000;"><?php  echo htmlentities($row->Email);?></td>
									        <td><a href="edit-client-details.php?editid=<?php echo $row->ID;?>" style="color: #f00; text-decoration: underline;">Edit</a><span style="color: #000;"> || </span><a href="view-resident.php?viewid=<?php echo $row->ID;?>" style="color: #f00; text-decoration: underline;">View Full info</a></td>
									     </tr>
									     <?php $cnt=$cnt+1;}} ?>
									     </tbody> </table> 
							</div>

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