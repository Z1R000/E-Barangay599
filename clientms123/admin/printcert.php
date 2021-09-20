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
	<title>Print Certification </title>
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
							<li class="active">Print Certification</li>
						</ol>
					</div>
					<!--//sub-heard-part-->
		<div class="graph-visual tables-main" id="exampl">
						
					
						<h3 class="inner-tittle two">Certification Details </h3>
<?php
$cid=intval($_GET['showid']);
/*$sql=" SELECT DISTINCT tblresident.LastName,tblresident.FirstName,tblresident.MiddleName,tblresident.Cellphnumber,tblresident.Address,tblresident.Email,tblcreatecertificate.CreationId,tblcreatecertificate.CreationDate,tblcreatecertificate.CertificateId from  tblresident   
	join tblcreatecertificate on tblresident.ID=tblcreatecertificate.Userid  where tblcreatecertificate.CreationId=:cid";
$query = $dbh -> prepare($sql);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->execute();

$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{*/               ?>
						<div class="graph">
							<div class="tables">
								<h4>Certification #<?php echo $cid;?></h4>
													<center><img src="https://scontent.fmnl8-1.fna.fbcdn.net/v/t1.15752-9/176157043_568560824115157_7760875185404908897_n.png?_nc_cat=108&ccb=1-3&_nc_sid=ae9488&_nc_eui2=AeGZySyQTCZ1g4DoIIjTC1HmibOw2HifPcOJs7DYeJ89w1qmuQkDxG1Hgf5XY1zHsXcWF6IkjjhFsty1eejAJNWp&_nc_ohc=0j-mkQjbVpAAX8JNXMh&_nc_ht=scontent.fmnl8-1.fna&oh=b2f0931fa012e7d639d142ee58fdbf2e&oe=60A4FEFC" width="1000px" height="1200px"></center>
<?php //$cnt=$cnt+1;}} ?>
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