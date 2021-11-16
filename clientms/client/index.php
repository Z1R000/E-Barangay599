<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql ="SELECT ID FROM tblresident WHERE Email=:email and Password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['clientmsuid']=$result->ID;
}
$_SESSION['login']=$_POST['email'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
}
}

?>

<!DOCTYPE HTML>
<html lang = "en">
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Barangay 599 Resident Login</title>


	<link rel="icon" href="images/Barangay.png" type="image/icon type">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap" rel="stylesheet">
	
	<style type = "text/css">
		*{
			margin:0;
			padding: 0;
			box-sizing: border-box;
			color: darkgrey;
			font-family: Arial;
		}
		html,body{
			height: 100%;
		}
		body{
			background: url("../images/barangaybackground.png");
			background-size: cover;
			
		}
		.container{
			background: whitesmoke;
			z-index: 2;
			box-shadow: 5px 10px 10px #00000f; 
		
			border-radius: 20px;
		
			
			
		}
		.btn-primary{
			border: none;
			width: 50%;
			padding: 1% 5%;
			background: #f00;
			z-index: 2;
			border-radius: 20px;
		}
		.btn-primary:hover{
			transition: 0.7s;
		}
		h4{
			margin-bottom: 2%;
			color: #8F8F8F;
		} 
		form{
			z-index: 2;
		}
		/*for mobile devices*/
		@media (max-width:480px){

			*{
				font-size: 14px;
			}
			.container{
				
				width: 80.3%;
				margin: 7% 10.6%;
				padding: 3%	;
			
				
				
			}
			form{
				padding: 1% 3.5%;
			}

			.container-sm img{
				width: 40%;
				margin-bottom: 20px;
			}
			.container-sm{
				width: 100%;
				border-bottom: 1px solid #d3d3d3;
				margin-bottom: 5%;
				padding: 1%;
			
			}
			
		}

		/*for tablets and ipads */
		@media (min-width:481px) and (max-width: 768px){
		
			*{
				font-size: 14px;
			}
			.container{
				align: center;
				width: 60.3%;
				margin: 5% 16.6%;
				padding: 3%	;
			
				
				
			}
			form{
				padding: 1% 3.5%;
			}

			.container-sm img{
				width: 40%;
				margin-bottom: 20px;
			}
			.container-sm{
				width: 100%;
				border-bottom: 1px solid #d3d3d3;
				margin-bottom: 5%;
				padding: 1%;
			
			}
		}

		/*for small screens and laptops (netbooks) */
		@media (min-width:769px) and (max-width: 1024px){
			*{
				font-size: 14px;
			}
			.container{
				width: 37.3%;
				margin: 15px;
				padding: 3%	;
			
				margin: 4%;
			}
			form{
				padding: 1% 3.5%;
			}

			.container-sm img{
				width: 40%;
				margin-bottom: 20px;
			}
			.container-sm{
				width: 100%;
				border-bottom: 1px solid #d3d3d3;
				margin-bottom: 5%;
				padding: 1%;
			
			}
		}
		/*for large screens and desktops */
		@media (min-width:1025px) and (max-width: 1200px){
			*{
				font-size: 14px;
			}
			.container{
				width: 32.3%;
				padding: 3%	;
				margin: 4%;
			
			}
			form{
				padding: 1% 3.5%;
			}

			.container-sm img{
				width: 40%;
				margin-bottom: 20px;
			}
			.container-sm{
				width: 100%;
				border-bottom: 1px solid #d3d3d3;
				margin-bottom: 5%;
				padding: 1%;
			
			}
		
		}		
		/*anything bigger e.g tv screen*/
		@media (min-width:1201px){
			*{
				font-size: .95em;
			}
			.container{
				width: 28.3%;
				padding: 2%	;
				margin: 5%;
			}
			form{
				padding: 1% 3%;
			}
			.container-sm img{
				width: 40%;
				margin-bottom: 20px;
			}
			.container-sm{
				width: 100%;
				border-bottom: 1px solid #d3d3d3;
				margin-bottom: 5%;
				padding: 1%;
			
			}

			.btn-primary{
				border: none;
				width: 60%;
				background: #f00;
				border-radius: 20px;
			}
		}

	
	
	  
</style>
</head>
<body>
<?php
	include('residentnavbar.php');
	?>
<div align = center>
	<div class ="container">
		<div class = "container-sm" align = center>
			<img src = "images/resident-logo.png" class = "img-fluid">
			
			<!--<h4>Barangay 599, Zone 59, District VI</h4>-->
			<h4>E-barangay - 599</h4>
			<h5>Resident Login<h5>
			
		</div>

		<form id="login" method="POST" name="login">
			<div class="mb-3">
				<div class="input-group mb-3">
					<span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" 			fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
						<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
					</svg></span>
					<input type="email" class="form-control shadow-none" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" name="email" required="true">
				</div>
				<label for="formFile" class="form-label" style = "font-size: 12px">*Input your E-barangay credentials</label>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z"/>
					</svg></span>
					<input type="password" class="form-control shadow-none" placeholder="Password" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" name="password" required="true">
				</div>
				<p>Forgot password? <a href="forgot-password.php"><i>Click here</i></a></p>
				<p><a href="../index.php"><i>Home</i></a></p>
				<div align = "center">
					<input class = "btn-primary" type="submit" onclick="myFunction()" value="LOGIN" name="login" class="sub">
				</div>
		</form>
		<br>
		<p>Disclaimer: This website uses cookies </p>
	</div>
	</div>
</body>
</html>