<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

$check = "admin";
$sql="SELECT * from tbluser";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->sql;

	if($query->rowCount() > 0)
	{
		foreach($results as $row)
		{
			$check = htmlentities($row->UserType);
			echo $check;
		}
	}

/*if(isset($_POST['login'])) 
  {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="SELECT * from tbluser WHERE UserName=:username and Password=:password";
	$query = $dbh -> prepare($sql); 123123131323
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);

	if($query->rowCount() > 0)
	{
		foreach($results as $row)
		{
			$check = htmlentities($row->UserType);
		}
	}
	if ($check = "1"){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql ="SELECT ID FROM tbladmin WHERE UserName=:username and Password=:password";
		$query=$dbh->prepare($sql);
		$query-> bindParam(':username', $username, PDO::PARAM_STR);
		$query-> bindParam(':password', $password, PDO::PARAM_STR);
		$query-> execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		if($query->rowCount() > 0)
		{
			foreach ($results as $result) {
				$_SESSION['clientmsaid']=$result->ID;
			}
			$_SESSION['login']=$_POST['username'];
			echo "<script type='text/javascript'> document.location ='admin/dashboard.php'; </script>";
		} else{
			echo "<script>alert('Invalid Details');</script>";
		}
		
	}else{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql ="SELECT ID FROM tblresident WHERE UserName=:username and Password=:password";
		$query=$dbh->prepare($sql);
		$query-> bindParam(':username', $username, PDO::PARAM_STR);
		$query-> bindParam(':password', $password, PDO::PARAM_STR);
		$query-> execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		if($query->rowCount() > 0)
		{
			foreach ($results as $result) {
				$_SESSION['clientmsuid']=$result->ID;
			}
			$_SESSION['login']=$_POST['username'];
			echo "<script type='text/javascript'> document.location ='client/dashboard.php'; </script>";
		} else{
			echo "<script>alert('Invalid Details');</script>";
		}
	}
  }*/    

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Login Page</title>

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
</head> 
<body>
	<div class="error_page">

		<div class="error-top">
			<h2 class="inner-tittle page">User Login</h2>
			<div class="login">
				
				<div class="buttons login">
					<h3 class="inner-tittle t-inner" style="color: #162427; text-transform: capitalize; font-weight: 800; font-size: 2em; letter-spacing: 3.5px; margin: 0.3em 0; background: -webkit-linear-gradient(#d3d3d3, #000); -webkit-background-clip: text; -webkit-text-fill-color: transparent; padding: 4%;">Sign In</h3>
				</div>
				<form id="login" method="post" name="login"> 
					<input type="text" class="text" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}" name="username" required="true">
					<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" name="password" required="true">
					<div class="submit"><input type="submit" onclick="myFunction()" value="Login" name="login" ></div>
					<div class="clearfix"></div>

					<div class="new">
						<p><u><a href="forgot-password.php">Forgot Password</a></p>
						

						<div class="clearfix"></div>
					</div>
				</form>
			</div>


		</div>


		<!--//login-top-->
	</div>

	<!--//login-->
	<!--footer section start-->
	<div class="footer" style="text-color: white;">
		
		<?php include_once('includes/footer.php');?>
	</div>
	<!--footer section end-->
	<!--/404-->
	<!--js -->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>