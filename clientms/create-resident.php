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

    <link rel="stylesheet" href="client/css/sidebar.css" />
    
	<link rel="icon" href="IMAGES/Barangay.png" type="image/icon type">

    <title>599 Registration</title>
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
        
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        
            

			<!--yung div mismo-->
            <div class="container-fluid px-4" style="margin-top:25px;">
				<div style="background-color: aliceblue;border-radius: 25px;padding: 25px;">
                <h2 class="inner-tittle" style="font-weight: 700; Margin: 0% 3%;">Registration Form</h2>
<div class="graph-form" >
<div class="form-body" style="margin: 1% 6%;">
<form method="post"> 
	<table style="border: none; width: 100%; font-size: 120%;">
		
		<tr>
			<th><span style="color: #000;">Resident Type</span></th>
			<th><span style="color: #000;">Last Name</span></th>
			<th><span style="color: #000;">First Name</span></th>
			<th><span style="color: #000;">Middle Name</span></th>
		<tr>
		<tr>
			<td><select  name="residenttype"  class="form-control select2" required='true' style="padding: 1px; width: 90%; font-size: 90%; color: black;">
		<option value="">Choose Resident Type</option>
		<option value="House Owner">House Owner</option>
		<option value="Care Taker">Care Taker</option>
	       	<option value="Rental/Boarder">Rental/Boarder</option>
		<option value="Living W/Relatives">Living W/Relatives</option>
		
	</select></td>
			<td><input type="text" name="lname" placeholder="Last Name" value="" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="fname" placeholder="First Name" value="" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="mname" placeholder="Middle Name" value="" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
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
			<td><select  name="prk"  class="form-control select2" required='true' style="padding: 1px; width: 90%; font-size: 90%; color: black;">
		<option value="">Choose Purok #</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">8</option>
		<option value="9">9</option>
		<option value="10">10</option>
		</select></td>
			<td><input type="text" name="hu" placeholder="House Unit/Lot No." value="" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="stn" placeholder="Street Name" value="" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="contact" value="" placeholder="Contact" class="form-control" maxlength='10' pattern="[0-9]+" style="width: 90%;font-size: 90%; color: black;"></td>
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
			
			<td><input type="text" name="bplace" placeholder="Birth Place" value="" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="date" name="bdate" placeholder="" value="" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="tin" value="" placeholder="Tin Number" class="form-control" maxlength='10'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input type="text" name="sss" value="" placeholder="SSS Number"  class="form-control" maxlength='10'  style="width: 90%;font-size: 90%; color: black;"></td>
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
			<td><select  name="cstatus"  class="form-control select2" required='true' style="padding: 1px; width: 90%; font-size: 90%; color: black;">
		<option value="">Choose Civil Status</option>
		<option value="Single">Single</option>
		<option value="Married">Married</option>
		<option value="Widow">Widow</option>
		<option value="Separated">Separated</option>
		
	</select></td>
			<td><select  name="voter"  class="form-control select2" required='true' style="padding: 1px; width: 90%; font-size: 90%; color: black;">
		<option value="">Voter Status</option>
		<option value="Yes">Yes</option>
		<option value="No">No</option>
		
			</select></td>
			<td><input type="text" name="vp" value="0" placeholder="Voters Precinct Number" class="form-control" maxlength='10'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><select  name="gnd"  class="form-control select2" required='true' style="padding: 1px; width: 90%; font-size: 90%; color: black;">
				<option value="">Choose Gender</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<th><span style="color: #000;">Email</th>
			<th><span style="color: #000;">Password</th>
		</tr>
		<tr>
			<td><input type="email" name="email" value="" placeholder="Email address" class="form-control" required='true'  style="width: 90%;font-size: 90%; color: black;"></td>
			<td><input placeholder="Password" type="password" name="password" required="true" id="password" class="form-control"  style="width: 90%;font-size: 90%; color: black;"></td>
			<td></td>
			<td><input type="file" style="width: 200px;"></td>
		</tr>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			
			<td><a href="index.php" name="cancel" id="cancel" style="color: white; background-color: silver; border: 1px; border-radius:25px; width: 50%; padding: 2.5%;" class="btn btn-default"> Cancel</a></form></td>
			<td></td><td></td>
			<td><center><button type="submit" class="btn btn-default" name="submit" id="submit" style="color: white; background-color: #021f4e; border: 1px; width: 50%; border-radius:25px;padding: 2.5%;">Add</button> </center></form></td>
			
		</tr>
	</table>
	
	 
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