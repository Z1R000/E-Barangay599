<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$newpassword = md5($_POST['newpassword']);
	$sql = "SELECT Email FROM tbladmin WHERE Email=:email";
	$query = $dbh->prepare($sql);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		$con = "update tbladmin set Password=:newpassword where Email=:email";
		$chngpwd1 = $dbh->prepare($con);
		$chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
		$chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
		$chngpwd1->execute();
		echo "<script>alert('Your Password succesfully changed');</script>";
	} else {
		echo "<script>alert('Email id or Mobile no is invalid');</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Forgot Password?</title>
	<script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelectorAll('.sidebar .nav-link').forEach(function(element) {
                    element.addEventListener('click', function(e) {
                        let nextEl = element.nextElementSibling;
                        let parentEl = element.parentElement;

                        if (nextEl) {
                            e.preventDefault();
                            let mycollapse = new bootstrap.Collapse(nextEl);

                            if (nextEl.classList.contains('show')) {
                                mycollapse.hide();
                            } else {
                                mycollapse.show();
                                // find other submenus with class=show
                                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                                // if it exists, then close all of them
                                if (opened_submenu) {
                                    new bootstrap.Collapse(opened_submenu);
                                }
                            }
                        }
                    }); // addEventListener
                }) // forEach
            });
        </script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="../css/sidebar.css" />
	<link rel="stylesheet" href="../css/scrollbar.css">
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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


		/*for small screens and laptops (netbooks) */

		/*anything bigger e.g tv screen*/
		/*@media (min-width:1201px){
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
		}*/
	</style>

</head>

<body>
	<?php
	include('residentnavbar.php');
	?>
	<form action="reset-password.php" method="POST">
		<div class="container  px-5 py-5">
			<div class="row justify-content-center">
				<div class="col-xl-4 col-lg-6 col-md-8 col-xs-12 col-sm-10 rounded bg-white rounded">
					<div class="row border-bottom pt-2">
						<div class="fs-5">
							Lets help you access your account
						</div>
					</div>
					<div class="row p-3">
						<div class="col-lg-12 col-md-12">


							<p class="text-dark">Please input your resident account e-mail here. This is to help you retrieve your account</p>
							<!--Pili kayo style-->
							<div class="form-floating mb-3">

								<div class="input-group">
									<button class="btn btn-secondary disabled">
										<i class="fa fa-envelope">

										</i>
									</button>
									<input type="emai" class="form-control" name="emadd" placeholder="E-barangay e-mail address" required>
								</div>
							</div>
						</div>
						<div class="row py-3 g-0">
							<div class="col-6">

							</div>
							<div class="col-xl-6 col-md-12">
								<div class="float-end">
									<div class="btn-group">
										<a href="index.php" class="btn btn-secondary">
											Cancel
										</a>

									</div>
									<div class="btn-group">
										<input href="reset-password.php" type="submit" class="btn btn-info">
									</div>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
	</form>

</body>

</html>
<!--<!DOCTYPE HTML>
<html>
<head>
	<title>599 Admin Forgot Password</title>

	
	<script type="text/javascript">
		function valid(){
			if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value){
				alert("New Password and Confirm Password Field do not match  !!");
				document.chngpwd.confirmpassword.focus();
				return false;
			}
				return true;
			}
	</script>
<style>
	body{
		text-align: center;
		font-family: bahnschrift light;
		background-image: url('../images/bg-3.png');
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
<img src="../images/barangay.png" alt="logo" width="200" height="200" class="image">
<h1> BARANGAY 599, ZONE 59, DISTRICT VI <br>
		OFFICE OF THE SANGGGUNIANG BARANGAY <h1>
	<p> #4745 Peralta St., V. Mapa Sta. Mesa, Manila <br>
	Tel. #722-9743 </p>
	<br>
	<div class="con1"> 
		<div class='test'>
			<div class="login" style="">
				<p style="font-size: 1.0em;">Forgot Password</p>
				<form id="login" method="post" name="chngpwd" onSubmit="return valid();"> 

					<input type="text" class="text" placeholder="E-mail Address"  name="email" required="true" style="color: black;"><br>
					<input type="password" placeholder="New Password"  name="newpassword" required="true" style="color: black;"><br>
					<input type="password" placeholder="Confirm Password"  name="confirmpassword" required="true" style="color: black;">
					<div class="submit"><input type="submit" onclick="myFunction()" value="Reset" name="submit" class="sub"></div>
					<div class="clearfix"></div>

					<div class="new">
						<p><a href="index.php" class="button" style="color: gray; font-size: 0.7em;">Already have an account</a></p>
						<div class="clearfix"></div>
					</div>
				</form>
			</div>


		</div>-->


<!--//login-top-->
<!--</div>-->

<!--//login-->
<!--footer section start-->
<!--<div class="footer">-->

<?php //include_once('includes/footer.php');
?>
</div>
<!--footer section end-->
<!--/404-->
<!--js -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>

</html>