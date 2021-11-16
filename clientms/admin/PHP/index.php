<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "SELECT ID FROM tbladmin WHERE Email=:email and Password=:password";
	$query = $dbh->prepare($sql);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		foreach ($results as $result) {
			$_SESSION['clientmsaid'] = $result->ID;
		}
		$_SESSION['login'] = $_POST['email'];
		echo "<script type='text/javascript'> document.location ='admin-dashboard.php'; </script>";
	} else {
		echo "<script>alert('Invalid Details');</script>";
		echo "<script type='text/javascript'> document.location ='admin-login.php'; </script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $position . $user . $timein ?></title>


	<link rel="icon" href="images/Barangay.png" type="image/icon type">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>


	<style type="text/css">
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			color: darkgrey;
			font-family: Arial;
		}

		html,
		body {
			height: 100%;
		}

		body {
			background: url("../images/barangaybackground.png");
			background-size: cover;

		}

		.container {
			background: whitesmoke;
			z-index: 2;
			box-shadow: 5px 10px 10px #00000f;

			border-radius: 20px;




		}

		.btn-primary {
			border: none;
			width: 50%;
			padding: 1% 5%;
			background: #f00;
			z-index: 2;
			border-radius: 20px;
		}

		.btn-primary:hover {
			transition: 0.7s;
		}

		h4 {
			margin-bottom: 2%;
			color: #8F8F8F;
		}

		form {
			z-index: 2;
		}

		/*for mobile devices*/
		@media (max-width:480px) {

			* {
				font-size: 14px;
			}

			.container {

				width: 80.3%;
				margin: 7% 10.6%;
				padding: 3%;



			}

			form {
				padding: 1% 3.5%;
			}

			.container-sm img {
				width: 40%;
				margin-bottom: 20px;
			}

			.container-sm {
				width: 100%;
				border-bottom: 1px solid #d3d3d3;
				margin-bottom: 5%;
				padding: 1%;

			}

		}

		/*for tablets and ipads */
		@media (min-width:481px) and (max-width: 768px) {

			* {
				font-size: 14px;
			}

			.container {
				align: center;
				width: 60.3%;
				margin: 5% 16.6%;
				padding: 3%;



			}

			form {
				padding: 1% 3.5%;
			}

			.container-sm img {
				width: 40%;
				margin-bottom: 20px;
			}

			.container-sm {
				width: 100%;
				border-bottom: 1px solid #d3d3d3;
				margin-bottom: 5%;
				padding: 1%;

			}
		}

		/*for small screens and laptops (netbooks) */
		@media (min-width:769px) and (max-width: 1024px) {
			* {
				font-size: 14px;
			}

			.container {
				width: 37.3%;
				margin: 15px;
				padding: 3%;

				margin: 4%;
			}

			form {
				padding: 1% 3.5%;
			}

			.container-sm img {
				width: 40%;
				margin-bottom: 20px;
			}

			.container-sm {
				width: 100%;
				border-bottom: 1px solid #d3d3d3;
				margin-bottom: 5%;
				padding: 1%;

			}
		}

		/*for large screens and desktops */
		@media (min-width:1025px) and (max-width: 1200px) {
			* {
				font-size: 14px;
			}

			.container {
				width: 32.3%;
				padding: 3%;
				margin: 4%;

			}

			form {
				padding: 1% 3.5%;
			}

			.container-sm img {
				width: 40%;
				margin-bottom: 20px;
			}

			.container-sm {
				width: 100%;
				border-bottom: 1px solid #d3d3d3;
				margin-bottom: 5%;
				padding: 1%;

			}

		}

		/*anything bigger e.g tv screen*/
		@media (min-width:1201px) {
			* {
				font-size: .95em;
			}

			.container {
				width: 28.3%;
				padding: 2%;
				margin: 5%;
			}

			form {
				padding: 1% 3%;
			}

			.container-sm img {
				width: 40%;
				margin-bottom: 20px;
			}

			.container-sm {
				width: 100%;
				border-bottom: 1px solid #d3d3d3;
				margin-bottom: 5%;
				padding: 1%;

			}

			.btn-primary {
				border: none;
				width: 60%;
				background: #f00;
				border-radius: 20px;
			}
		}
	</style>

</head>

<body>
	<?php include('navbar.php'); ?>
	<div class="container  mx-auto text-center">
		<div class="container-sm" align=center>
			<img src="../images/admin-logo.png" class="img-fluid">

			<!--<h4>Barangay 599, Zone 59, District VI</h4>-->
			<h4>E-barangay - 599</h4>
			<h5>Admin Login<h5>
		</div>
		<div class="row">

		</div>
		<form id="login" method="POST" action="admin-dashboard.php" name="login">
			<div class="mb-3">
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
							<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
						</svg></span>
					<input type="email" class="form-control shadow-none" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" name="email" required="true">
				</div>
				<label for="formFile" class="form-label" style="font-size: 12px">*Input your E-barangay credentials</label>
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z" />
						</svg></span>
					<input type="password" class="form-control shadow-none" placeholder="Password" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" name="password" required="true">
				</div>
				<p><a href="../../index.php" class="fs-6"><i>Home</i></a></p>
				<p>Forgot password? <a href="forgot-password.php"><i>Click here</i></a></p>
				<div align="center">
					<input class="btn-primary" type="submit" onclick="myFunction()" value="LOGIN" name="login" class="sub">
				</div>
		</form>
		<br>
		<p>Disclaimer: This website uses cookies </p>
	</div>

</body>

</html>
<!--<!DOCTYPE HTML>
<html lang = "en">
<head>
<link href="css/font-awesome.css" rel="stylesheet"> 
<title>599 Admin Login</title>
<style>
	body{
		text-align: center;
		font-family: bahnschrift light;
		background-image: url("https://scontent.fmnl8-2.fna.fbcdn.net/v/t1.15752-9/181017880_310530980473698_8025202058568047204_n.jpg?_nc_cat=107&ccb=1-3&_nc_sid=ae9488&_nc_eui2=AeEJAZgiTLaz66vd217i73vANuMbaL6tyGA24xtovq3IYBc1LvUZRBtdoDjnYp9Hxfk9Loo-3yetCMXfT3-7FNZv&_nc_ohc=mCwCSjyYJSsAX8zsMal&_nc_ht=scontent.fmnl8-2.fna&oh=16b4ddeccf5a1831907a1152c57ada76&oe=60B66D13");
		background-size: cover;
		color: white;
	}
	p{
		font-size: 22px;
	}
	.test {
  width: 30%;

  overflow: auto;
  white-space: nowrap;
  margin: 0px auto;

}
.button{
			font-family: bahnschrift light;
			color: black;
			padding: 22px;
			font-size: 20px;
		}
		
		.sub{
		color: white;
		background-color: #f00;
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
		
		.sub:hover{
			cursor: pointer;
		}
		
		.login input[type="text"],.login input[type="password"]{
		width: 60%;
		padding: 0.9em 1em 0.9em 4em;
		color: #fff;
		font-size: 15px;
		outline: none;
		font-weight: 400;
		border: 1px solid #ddd;
		background: url("../images/icons.png") no-repeat 14px 17px;
		margin: 0.3em 0;
	  }
	.login input[type="password"]{
	   background: url("../images/icons.png") no-repeat 13px -33px ;

	  }
	  .login{
		  background-color: #fff; 
		  padding: 5px;
		  color: black;
		  border-radius: 25px;
		  z-index: 999;
		  box-shadow: 0 8px 160px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
		}
	  
</style>
</head>
<body>
<img src="images/barangay.png" alt="logo" width="200" height="200" class="image">
<h1> BARANGAY 599, ZONE 59, DISTRICT VI <br>
		OFFICE OF THE SANGGGUNIANG BARANGAY <h1>
	<p> #4745 Peralta St., V. Mapa Sta. Mesa, Manila <br>
	Tel. #722-9743 </p>
	<br>
	<div class="con1"> 
		<div class='test'>
			<div class="login" style="">
				<p style="font-size: 1.0em;">Admin Login</p>
				<form id="login" method="post" name="login"> 
					<input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}" name="email" required="true" style="color: black;"><br>
					<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" name="password" required="true" style="color: black;"><br><br>
					<input type="submit" onclick="myFunction()" value="LOGIN" name="login" class="sub">
					<br>
					<div class="new">
						<p><u><a href="forgot-password.php" class="button" style="color: gray; font-size: 0.7em;"><i>Forgot Password</i></a></p>
						<p><a href="../index.php" class="button" style="color: gray; font-size: 0.7em;"><i>Home</i></a></u></p>

					</div>
				</form>
			</div>
		</div>
	</div><br>
	<div class="footer">
		
			</div>
</body>
</html>

-->