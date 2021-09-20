<html lang="en">
<head>
	<meta charset ="utf-8">
	<title></title>
	<style>
	body{
		font-family: bahnschrift light;
		font-size: 15px;
		background: linear-gradient(90deg, rgba(39,132,242,1) 0%, rgba(216,74,240,1) 50%, rgba(252,176,69,1) 100%);
		text-align: center;
	}
	.con{
		background: white;
		padding: 20px 0 30px 0;
		position: relative;
		border-radius: 5px;
		height:450px;
		width: 400px;
		margin: auto;
	}
	p{
		font-size: 25px;
	}
	a{
		text-decoration: none;
	}
	</style>
</head>
<body> <br /> <br /> <br /> <br /> <br /> <br /> <br />
<div class="con">
<p>
<?php
	if (is_string($_POST['firstname'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$midname = $_POST['midname'];
		if (isset($_POST['BA']) || isset($_POST['MA']) || isset($_POST['Phd'])){
			if (isset($_POST['BA'])){
				$BA = $_POST['BA'];
			}else{
				$BA = "";
			}
			if(isset($_POST['MA'])){
				$MA = $_POST['MA'];
			}else{
				$MA="";
			}
			if (isset($_POST['Phd'])){
				$Phd = $_POST['Phd'];
			}else{
				$Phd = "";
			}
			print "<p>Good Day! $lastname, $firstname $midname <br><br><br><br>";
			print "Your degrees are the following: </p>";
			print"<p>$BA </span></p>";
			print"<p>$MA </span></p>";
			print"<p>$Phd </span></p>";
		}else{
			print "Please input a degree"; 
		}
	}
?> <br />
<a href="8_13_DEGUZMAN_LIGUTOM_UserInput_Checkbox_ITCE.html"><br><br><div class="back">Go back</div></a>
</p>
</div>
</body>
</html>