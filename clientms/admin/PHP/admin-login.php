<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');

if(isset($_POST['login'])) 
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql ="SELECT ID FROM tbladmin WHERE Email=:email and Password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
	$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

	if($query->rowCount() > 0)
	{
		foreach ($results as $result) {
		$_SESSION['clientmsaid']=$result->ID;
	}
		$_SESSION['login']=$_POST['email'];
		echo "<script type='text/javascript'> document.location ='admin-dashboard.php'; </script>";
	}
	else{
		echo "<script>alert('Invalid Details');</script>";
	}
	$timein = date_default_timezone_get();
	$user = $_SESSION['clientmsaid'];
	$position = 0;
	$sql= "Select BarangayPosition from tbladmin where ID =".$user."";        
	$query = $dbh->prepare($sql);
	$query->execute();
	$result = $query->fetchAll(PDO::FETCH_OBJ);

	foreach($result as $s){
		$position = $s->BarangayPosition;
	}
	
	$aud = "Insert into tblloginaudits(resId,position) values('".$user."','".$position."')";
	if($connect->query($aud)===TRUE){
		header("Location: admin-dashboard.php?success=1");
	}
	else{
		header("Location: admin-login.php?logsfailed=1");
	}

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Log In</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    <link rel = "stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../css/scrollbar.css">
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
        .btn-primary{
			width: 50%;
			padding: 1% 5%;
			background: #f00;
			z-index: 2;
			border-radius: 20px;
		}
		h4{
			margin-bottom: 2%;
			color: #8F8F8F;
		} 
		form{
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
s   				background: #f00;
				border-radius: 20px;
			}
		}*/
        .shado{
            box-shadow: 5px 10px 10px #00000f; 
	
        }



	</style>

</head>
<body>
	<?php
		include('navbar.php');
	?>

    <form action=""method = "POST" id = "login" name = "login">
	<div class="container  px-5 py-1 ">
		<div class="row justify-content-center ">
			<div class="col-xl-4 col-lg-6 col-md-8 col-xs-12 col-sm-10   shadow-sm bg-white rounded" style= "z-index: 2;">
				<div class="row  pt-2">
                    <div class="col-xl-5 col-lg-4 col-md-4 col-xs-4 mx-auto text-center py-5">
                        <img src = "../images/admin-logo.png" class = "img-fluid logo" style ="width: 130px;">
                    </div>
				</div>
                <div class="row gx-1 border-bottom text-center">
                    <h4>E-barangay - 599</h4>
			        <h5>Admin Login<h5>
                </div>
                <div class="row text-center">
                    <label for="formFile" class="form-label" style = "font-size: 12px">*Input your E-barangay credentials</label>
                </div>
                
				<div class="row p-3">
					<div class="col-lg-12 col-md-12">
					<div class="input-group">
						<button class="btn btn-secondary disabled">
							<i class="fa fa-envelope">
							</i>
						</button>
						<input type="email" class="form-control shadow-none" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" name="email" required="true">
					</div>
					</div>
                    <div class="input-group mt-3">
                        <button class="btn btn-secondary bg-secondary disabled"><i class="fa fa-lock"></i></button>
						<input type="password" class="form-control shadow-none" id ="pas2" placeholder="Password" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" name="password" required="true"  >
                        <a class="btn btn-secondary border-start-0 bg-transparent" onclick = "showpas2();"><i class="fa fa-eye link-primary"></i></a>
					</div>
				</div>
				<div class="row py-2 g-0">
					<div class="col-lg-12 text-center">
                    <p>Forgot password? <a href="forgot-password.php"><i>Click here</i></a></p>
					</div>
                </div>
                <div class="row p-4">
                    
                        <div class="col-xl-12 col-md-12 mx-auto" align ="center">
                               
					            <input class = "btn-primary" type="submit" onclick="myFunction()" value="LOGIN" name="login" class="sub">
                            
                            </div>
                            
                        
                    </div>
				</div>
			</div>
		</div>
	</div>
	</form>
</body>
</html>
<script>
     function showpas2(){
            var pas1 = document.getElementById('pas1');
            var pas2  = document.getElementById('pas2');
            if (pas2.type === "password"){
                pas2.type ="text";
            }
            else{
                pas2.type = "password";
            }
        }
</script>
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