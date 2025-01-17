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

    <title>Officials List</title>
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
	.divfortable{
    background-color: white;
    overflow-x:auto;
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
                    <h2 class="fs-2 m-0">Blotter Record</h2>
                    
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
                <ol class="breadcrumb m-b-0"style="text-indent: 15px; margin-left: 2.5%;overflow-x:auto;">
                    <li><a href="dashboard.php">Home</a></li>/
                    <li class="active">Record</li>/
                    <li class="active">Blotter Record</li>
                </ol>
            </div>


            <div class="container-fluid px-4">
			<div style="background-color: aliceblue;border-radius: 10px;padding: 25px;">
			<h3 class="inner-tittle two">Blotter Request List</h3>
            <div class="divfortable">
							<div class="tables">
								<table class="table" border="1">
								<thead style="background-color: #021f4e;">
									 <th><span style="color: #fff; font-size:120%;">Blotter Type</th>
									<th><span style="color: #fff; font-size:120%;">Sender Name</th>
									 <th><span style="color: #fff; font-size:120%;">Date and Time of Incident</th>
									 <th><span style="color: #fff; font-size:120%;">Incident Location</th>
									 <th><span style="color: #fff; font-size:120%;">Status</th>
									 <th><span style="color: #fff; font-size:120%;">Request Date</th>
									 <th><span style="color: #fff; font-size:120%;">Option</th>
									  </tr>
									   </thead>
									    <tbody>
									    	<?php
$uid=$_SESSION['clientmsuid'];

$sql="SELECT distinct tblblotterrequest.ID, tblblotterrequest.userID, tblblotterrequest.blotterType, tblblotterrequest.incidentLocation, tblblotterrequest.incidentDate, tblblotterrequest.requestStatus,tblblotterrequest.requestDate, tblresident.LastName, tblresident.FirstName, tblresident.MiddleName, tblresident.Cellphnumber from tblblotterrequest join tblresident where tblresident.ID=tblblotterrequest.userID and tblblotterrequest.userID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
									      <tr class="active">
									        <td style="color: #000;"><?php  echo htmlentities($row->blotterType);?></td>
											<td style="color: #000;"><?php  echo htmlentities($row->LastName);?>, <?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->MiddleName);?></td>
									         <td style="color: #000;"><?php  echo htmlentities($row->incidentDate);?></td> 
									         <td style="color: #000;"><?php  echo htmlentities($row->incidentLocation);?></td>
											 <td style="color: #000;"><?php  echo htmlentities($row->requestStatus);?></td>
											 <td style="color: #000;"><?php  echo htmlentities($row->requestDate);?></td>
											 <td><a href="view-blotter-request.php?viewid=<?php  echo $row->ID;?>"  style="color: red; text-decoration: underline;">View</a></td>
									     </tr>
									     <?php $cnt=$cnt+1;}} ?>
									     </tbody> </table> 
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