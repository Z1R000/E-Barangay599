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
	<title>View Certification </title>
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
							<li><a href="search-certificate.php">Certificate Record</a></li>
							<li class="active">View Certification</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
		<div class="graph-visual tables-main" id="exampl">
						
					
						<h3 class="inner-tittle two">Certification Details </h3>
<?php
$cid=intval($_GET['creationid']);
$sql=" SELECT DISTINCT tblresident.LastName,tblresident.FirstName,tblresident.MiddleName,tblresident.Cellphnumber,tblresident.houseUnit,tblresident.streetName,tblresident.Email,tblcreatecertificate.CreationId,tblcreatecertificate.CreationDate from  tblresident   
	join tblcreatecertificate on tblresident.ID=tblcreatecertificate.Userid  where tblcreatecertificate.CreationId=:cid";
$query = $dbh -> prepare($sql);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
						
							
								<center><h2>Certification #<?php echo $row->CreationId;?></h2><br>
									
									<a href="printcert.php?showid=<?php echo $row->CreationId;?>" style="border: 1px solid black; border-radius: 15px; padding: 10px; color: black;">Print Certificate</a></center>
									<h3 class="inner-tittle two">Resident Details</h3>
						<div class="graph" style="border-radius: 15px; border: 1px black solid;">
							<div class="tables">	
							
					<table style="width: 100%; font-size: 120%;">
							 <tr>
								<th>Certification ID</th>
								<th>Resident Name</th>
								<th>Address</th>
							</tr>
							<tr>
								<td style="font-size: 90%; color: black;"><?php echo htmlentities($row->CreationId);?></td>
								<td style="font-size: 90%; color: black;"><?php  echo htmlentities($row->LastName);?>, <?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->MiddleName);?></td>
								<td style="font-size: 90%; color: black;"><?php  echo htmlentities($row->houseUnit);?> <?php  echo htmlentities($row->streetName);?> St.</td>
								
							</tr>
							<tr>
								<td><br></td>
							</tr>
							 <tr> 
								<th>Contact Number</th>
								<th>Email</th>
								<th>Certificatation Date</th>
								
							</tr>
							<tr>
								<td style="font-size: 90%; color: black;"><?php  echo htmlentities($row->Cellphnumber);?></td>
								<td style="font-size: 90%; color: black;"><?php  echo htmlentities($row->Email);?></td>
								<td style="font-size: 90%; color: black;"><?php echo  htmlentities($row->CreationDate);?></td> 
							</tr>
<?php $cnt=$cnt+1;}} ?>
</table>
							</div>

						</div>
						
						
						<h3 class="inner-tittle two">Certificate Details</h3>
						
						<div class="graph" style="border-radius: 15px; border: 1px black solid;">
							<div class="tables">
								<table style="width: 100%; font-size: 120%;"> 
<tr>	
<th>Certificate</th>
<th>Amount</th>
</tr>

<?php
$ret="select tblcertificate.CertificateName,tblcertificate.CertificatePrice  
	from  tblcreatecertificate 
	join tblcertificate on tblcertificate.ID=tblcreatecertificate.CertificateId 
	where tblcreatecertificate.CreationId=:cid";
$query1 = $dbh -> prepare($ret);
$query1->bindParam(':cid',$cid,PDO::PARAM_STR);
$query1->execute();

$results=$query1->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query1->rowCount() > 0)
{
foreach($results as $row1)
{               ?>

<tr>
<td style="font-size: 90%; color: black;"><?php echo $row1->CertificateName?></td>	
<td style="font-size: 90%; color: black;"><?php echo "Php".$subtotal=$row1->CertificatePrice?></td>
</tr>

<?php $cnt=$cnt+1;}
$gtotal+=$subtotal;
} ?>
<tr><td><br></td></tr>
<tr style="border-top: 1px solid #021f4e;">
<th style="padding-top: 5px;">Grand Total</th>
<th><?php echo "Php".$gtotal?></th>	

</tr>
</table>
<p style="margin-top:1%"  align="center">
  <i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ></i>
</p>
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
	<script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
}
</script>
</body>
</html>
<?php }  ?>