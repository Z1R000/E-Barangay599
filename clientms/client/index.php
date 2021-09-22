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
}
}

?>

<!DOCTYPE HTML>
<html lang = "en">
<head>
<link href="css/font-awesome.css" rel="stylesheet"> 
<title>599 Resident Login</title>
<style>
	body{
		text-align: center;
		font-family: bahnschrift light;
		background-image: url(client/images/barangaybackground.png);
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
		OFFICE OF THE SANGGUNIANG BARANGAY <h1>
	<p> #4745 Peralta St., V. Mapa Sta. Mesa, Manila <br>
	Tel. #722-9743 </p>
	<br>
	<div class="con1"> 
		<div class='test'>
			<div class="login" style="">
				<p style="font-size: 1.0em;">Resident Login</p>
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
		
		<?php //include_once('includes/footer.php');?>
	</div>
</body>
</html>