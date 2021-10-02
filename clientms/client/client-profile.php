<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } else{
  	?>

<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://code.jquery.com/jquery-3.5.1.min.js">
</script>
<script>
        $(document).ready(function(){
            $("select").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else{
                        $(".box").hide();
                    }
                });
            }).change();
        });
</script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/sidebar.css" />
    
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <title>Bootstap 5 Responsive Admin Dashboard</title>
    <script>
        
        document.addEventListener("DOMContentLoaded", function(){
        document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
        element.addEventListener('click', function (e) {
        let nextEl = element.nextElementSibling;
        let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
            }); // addEventListener
        }) // forEach
        }); 
    </script>


    <style type = "text/css">
    .sidebar li .submenu{ 
        list-style: none; 
        margin: 0; 
        padding: 0; 
        padding-left: 1rem; 
        padding-right: 1rem;
    }
    .box{
		padding:10px;
		display:none;
		margin:10px;
	}
    </style>

</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <?php include_once('includes/sidebarupdated.php'); 	?>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fa fa-align-justify primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Resident Profile</h2>
                    
                </div>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!--User-->
				<?php include_once('includes/usertoggle.php');?>
                <!--User-->
            </nav>
            <div class="sub-heard-part">
                <ol class="breadcrumb m-b-0"style="text-indent: 15px; margin-left: 2.5%;">
                    <li><a href="dashboard.php">Home</a></li>/
					<li class="active">User</li>/
                    <li class="active">Profile</li>
                </ol>
            </div>


            <div class="container-fluid px-4">
				<div style="background-color: aliceblue;border-radius: 25px;padding: 25px;">
                <div class="graph-visual tables-main">
					
				<div class="forms-main">
<h2 class="inner-tittle">Resident Profile </h2>
<div class="form-body">
<form method="post"> 
									<?php
$uid=$_SESSION['clientmsuid'];
$sql="SELECT * from  tblresident where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
	<div class="graph-form" style="border-radius: 25px;">
							<div class="tables">
								<table style="border: none; width: 100%; font-size: 120%;">
		
		<tr>
			<th><span style="color: #000;">Resident Type</span></th>
			<th><span style="color: #000;">Last Name</span></th>
			<th><span style="color: #000;">First Name</span></th>
			<th><span style="color: #000;">Middle Name</span></th>
		<tr>
		<tr>
			<td><input type="text" name="lname" placeholder="Last Name" value="<?php  echo htmlentities($row->ResidentType);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="lname" placeholder="Last Name" value="<?php  echo htmlentities($row->LastName);?>" readonly="true" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="fname" placeholder="First Name" value="<?php  echo htmlentities($row->FirstName);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="mname" placeholder="Middle Name" value="<?php  echo htmlentities($row->MiddleName);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<th><span style="color: #000;">Purok</th>
			<th><span style="color: #000;">House Unit/Lot No.</th>
			<th><span style="color: #000;">Street Name</th>
			<th><span style="color: #000;">Contact Number</th>
		</tr>
		<tr>
			<td><input type="text" name="lname" placeholder="Last Name" value="<?php  echo htmlentities($row->Purok);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="hu" placeholder="House Unit/Lot No." value="<?php  echo htmlentities($row->houseUnit);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="stn" placeholder="Street Name" value="<?php  echo htmlentities($row->streetName);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="contact" value="<?php  echo htmlentities($row->Cellphnumber);?>" placeholder="Contact" class="form-control" maxlength='10' pattern="[0-9]+" style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<th><span style="color: #000;">Birth Place</th>
			<th><span style="color: #000;">Birth Date</th>
			<th><span style="color: #000;">Tin Number</th>
			<th><span style="color: #000;">SSS Number</th>
		</tr>
		<tr>
			
			<td><input type="text" name="bplace" placeholder="Birth Place" value="<?php  echo htmlentities($row->BirthPlace);?>" class="form-control" required='true' style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="bdate" placeholder="" value="<?php  echo htmlentities($row->BirthDate);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="tin" value="<?php  echo htmlentities($row->tinNumber);?>" placeholder="Tin Number" class="form-control" maxlength='10'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="sss" value="<?php  echo htmlentities($row->sssNumber);?>" placeholder="SSS Number"  class="form-control" maxlength='10'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<th><span style="color: #000;">Civil Status</th>
			<th><span style="color: #000;">Voter Status</th>
			<th><span style="color: #000;">Voters Precinct Number</th>
			<th><span style="color: #000;">Gender</th>
		</tr>
		<tr>
			<td><input type="text" name="lname" placeholder="Last Name" value="<?php  echo htmlentities($row->CivilStatus);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="lname" placeholder="Last Name" value="<?php  echo htmlentities($row->voter);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="vp" value="<?php  echo htmlentities($row->vPrecinct);?>" placeholder="Voters Precinct Number" class="form-control" maxlength='10' style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
			<td><input type="text" name="lname" placeholder="Last Name" value="<?php  echo htmlentities($row->Gender);?>" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;" readonly="true"></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<th><span style="color: #000;">Email</th>
		</tr>
		<tr>
			<td><input type="email" name="email" value="<?php  echo htmlentities($row->Email);?>" placeholder="Email address" class="form-control" required='true' style="width: 90%;font-size: 90%; color: black;"></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<td></td><td></td><td></td><td> <center>
			<button type="submit" class="btn btn-default" name="submit" id="submit" style="color: white; background-color: #021f4e; border: 1px; width: 80%; border-radius:25px;">Update</button>
		</tr>
	</table>
<?php $cnt=$cnt+1;}} ?>
<!--<p style="margin-top:1%"  align="center">
  <i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ></i>
</p>-->

							</div>

						</div>
	 
</div>
</div>
</div> 
</div>
						</div>
				
					</div>
                <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>
<?php } ?>