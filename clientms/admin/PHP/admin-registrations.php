<?php 
    $curr ="Resident Registration";
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
    header('location:logout.php');
    } else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curr;?></title>
    <?php include ('link.php')?>
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">
    <style type = "text/css">
      @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Display:wght@500&display=swap');
      table,td,tr,th{
            border: 1px solid #d3d3d3;
            text-align: left;
            font-size: 1.02em;
            font-family: 'Noto Sans Display', sans-serif;
            
        }
      
      .das::-webkit-scrollbar-thumb:horizontal  {
            height: 4px;
            width: 2px;
            background: #012f4e;;
       }
       @media(max-width: 786px){
           .wal{
               display:none;
               width: 80px;
           }
       } 


    </style>
</head>
<body>
    <?php 
        include ('../includes/sidebar.php');
    ?> 
     <!--breadcrumb-->
     <div class="d-flex align-items-center">
                <div class="container  mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-archive  text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid py-3 px-5" >
        
        <div class="row gx-0 shadow-sm" >
            <div class="row g-0 row-cols-4 justify-content-start">
                <div class="col">                
                    <div class="btn-group" role="group">
                        <a href = "resident-registration.php"  class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-user-plus"></i>&nbsp; New Resident</a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href = "admin-residence.php"  class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-list"></i>&nbsp; Resident List</a>
                    </div>
                </div>

            </div>
            <div class="row g-0  border rounded-top row-col-lg-12" style= "background: #012f4e;">
                <div class="fs-5 px-4 text-white" >
                    <i class="fa fa-archive me-2">

                    </i>Registration Requests

                </div>
            </div>
           
            
            <div class="row g-0 bg-white border border-1 das row-col-lg-12"  >
                <div class="row">

                
                <div class="col px-3 py-3" style= "overflow-x: auto;">
                <div class="table-responsive">  
                                                <table id="resreqdata" class="table bg-white rounded shadow-sm  table-hover table-bordered "  style= "min-width: 1000px;">  
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>

                                                        <th>Age</th>

                                                        <th>Gender</th>

                                                        <th>Purok</th>
                                                        
                                                        <th>Street</th>

                                                        <th>Registration Date</th>
                                                    
                                                        <th>Action </th>
                                                    </tr>   
                                                </thead>
                                                    <?php
                                                    
                                                    $query = "SELECT * FROM tblresident WHERE resStatus='Pending' ORDER BY CreationDate ASC, LastName";
                                                    $result = mysqli_query($con, $query);
                                                    $count = 1;  
                                                    while ($row = mysqli_fetch_array($result)) { 
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    '.$count.'
                                                                </td>
                                                                <td >'.$row["LastName"].', '.$row["FirstName"].' '.$row["MiddleName"].' '.$row["Suffix"].'</td>';

                                                                $gbd = $row["BirthDate"];
                                                                $gbd = date('Y-m-d', strtotime($gbd));
                                                                $today = date('Y-m-d');
                                                                $diff = date_diff(date_create($gbd), date_create($today));
                                                          
                                                        echo '
                                                                <td>'.$diff->format('%y').'</td>  
                                                                <td><i class = "fa';
                                                                $gend = $row["Gender"];
                                                                $gen = "fa fa-venus link-danger ";
                                                                if ($gend =="Female"){
                                                                    echo $gen;
                                                                }
                                                                else{
                                                                    $gen = "fa fa-mars link-info ";  
                                                                    echo $gen;
                                                                }
                                                        echo 'me-2"> </i>'.$row["Gender"].'</td>  
                                                                <td>'.$row["Purok"].'</td>  
                                                                <td>'.$row["streetName"].'</td>';
                                                                
                                                                $cbd = $row["CreationDate"];
                                                                $cbds = date('F j, Y', strtotime($cbd));
                                                        
                                                        echo '
                                                                <td>'.$cbds.'</td>  
                                                                <td class="text-center">
                                                                    <div class="btn-group" >
                                                                        <a href="manage-registration.php?editid='.$row["ID"].'" class="btn-primary btn" >
                                                                            <i class="fa fa-check-circle mx-1 fa-1x">
                                                                            </i><span class = "wal">Manage</span> 
                                                                        </a>
                                                                    </div>
                                                                </td> 
                                                        </tr>  
                                                        ';  
                                                    }
                                                    $count++;  
                                                    ?>  
                                                </table>  
                                            </div>
                        </div>
                </div>
     
            </div>
            
            </div>
    </div>
</body>
</html>
<?php } ?>
<script>  
 $(document).ready(function(){  
      $('#resreqdata').DataTable();  
 });  
 </script>