<?php 
    $curr ="Resident Info";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curr;?></title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <link rel = "stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../css/scrollbar.css">
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
        
        table,td,tr,th{
            
            text-align: left;
            font-size: 1em;
            padding: 100px;
            font-family: 'Noto Sans Display', sans-serif;
            
        }

        .white{
            color: white;
        }
        .black{
            color: #000;
        }
        .right{
            margin-left: 8.5%;
        }
        
        @media (max-width: 576px){
            .right{
                margin: auto;
            }
            .dis{
                font-size: 15px;
            }
            .ser{
                width: 100%;
            }
           
        }
    </style>
</head>
<body>

    <?php 
        include ('../includes/sidebar.php');
    ?> 
            <div class="container mt-4 mx-5">   
                <nav aria-label="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item fs-6"><a href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                         
                            <li class="breadcrumb-item fs-6 active"><a href="admin-residence.php"><i class="fa fa-users"></i>&nbsp;Resident List</a></li>
                            <li class="breadcrumb-item fs-6 active"><a href="#"><i class="fa fa-user text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                        </ol>
                    </nav>
                </nav>
            </div>
    <div class="container-fluid mx-4 px-5">
        <div class="row g-0 mx-2">
            <div class="row g-3">
                <div class="mx-auto col-xl-10 white   ">
                    <div class="row g-0 bg-primary rounded-top ">
                        <div class="fs-5 px-3 py-1">
                            Resident #123
                        </div>
                    </div>
                    <div class="row g-0 border bg-white">
                        <div class="col-xl-3 py-3 border-end" align = "center">
                      
                            <img src="../images/user-res.png" alt="resident" style ="width: 105px; height: 100px;">
                            <div class = "fs-6 black">Portgas D. Ace</div>
                            
                        </div>
                        <div class="col-xl-4 mx-2  px-2">
                            
                            <table class="table my-3">
                                    <tr>
                                        <th class =""><i class ="fa fa-calendar me-2"></i>Age</th>
                                        <td>40</td>
                                    </tr>
                                    <tr>
                                        <th class ="" > <i class= "fa fa-venus-mars me-1"></i> Gender</th>
                                        <td>Male</td>
                                    </tr>
                        
                                    <tr>
                                        <th class ="" > <i class= "fa fa-heart me-1"></i> Civil Status</th>
                                        <td>Single</td>
                                    </tr>
                        
                            </table>
                           
                        </div>
                        <div class="col-xl-4 mx-2">
                            
                            <table class="table my-3">
                                    <tr>
                                        <th class =""><i class ="fa fa-birthday-cake me-2"></i>Birthdate</th>
                                        <td>September 9 1990</td>
                                    </tr>
                                    <tr>
                                        <th class ="" > <i class= "fa fa-info me-1"></i> Status</th>
                                        <td>Active</td>
                                    </tr>
                        
                                    
                            </table>
                           
                        </div>
                    </div>
                    
                
                </div>
            
            </div>
          
        </div>
    </div>
    <div class="container-fluid mx-4 px-5 mb-5">
        <div class="row g-0 mx-2">
            <div class="row g-2">
                <div class="mx-auto col-xl-10 ">
                    <div class="row g-0  rounded-top border bg-white">
                        <div class="col-xl-10 py-2 px-2  ">
                            <nav class="nav nav-pills flex-column  flex-sm-row">
                                <a class="flex-sm-fill  text-sm-center nav-link" aria-current="page" href="view-resident-personal.php">Personal Details</a>
                                <a class="flex-sm-fill text-sm-center nav-link " href="view-resident-account.php">Account Details</a>
                                <a class="flex-sm-fill text-sm-center nav-link" href="view-resident-cases.php">Cases</a>
                                <a class="flex-sm-fill text-sm-center nav-link active" href="view-resident-certifications.php">Certifications Availed</a>
                                <a class="flex-sm-fill text-sm-center nav-link" href="view-resident-services.php">Services Availed</a>
        
        
                            </nav>

                        </div>
                        
                    </div>
                    <div class="row g-0 border bg-white" >
                    
                        <div class="col-xl-11 mx-2  mx-auto  px-2">
                            
                          
                           
                        </div>
                      
                    </div>
                    
                
                </div>
            
            </div>
          
        </div>
    </div>
            
           
                
    

    
</body>
</html>