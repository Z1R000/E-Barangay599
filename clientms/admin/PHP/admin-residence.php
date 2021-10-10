<?php 
    $curr ="Residents";
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
            border: 1px solid #d3d3d3;
            text-align: left;
            font-size: 1em;
            padding: 100px;
            font-family: 'Noto Sans Display', sans-serif;
            
        }   

        .small{
            width: 8%;
        }
        .med{
            width: 20%;
        }
        .action{
            width: 20%;
            text-align: center;
        }
        .btng{
            width: 50px;
        }
        
        @media (max-width: 576px){
            .row{
                overflow-x: auto;
            }
            .dis{
                font-size: 15px;
            }
            .ser{
                width: 100%;
            }
           
        }
        .red{
            background:#8B0000;
            border: 1px solid #8B0000;
        }
        .white{
            color: white;
        }
    </style>
</head>
<body>

    <?php 
        include ('../includes/sidebar.php');
    ?> 
            <!--breadcrumb-->
            
            <div class="container mt-4 mx-5">
                <nav aria-label="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item fs-6"><a href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                         
                            <li class="breadcrumb-item fs-6 active"><a href="#"><i class="fa fa-users text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                        </ol>
                    </nav>
                </nav>
            </div>
    <div class="container-fluid my-4">
        <div class="row border mx-5 bg-white">
            <div class="row border-bottom g-0 py-1 px-3">
                <h4 class="fs-5">
                    <i class ="fa fa-chart-bar"></i>
                    Resident List
                </h4>
            </div>
            
                <!--<div class="row g-0 mb-5">
                    <div class="row g-2 px-5">
                        <div class="col-xl-8 col-md-12 col-sm-12 col-sm-12">

                        </div>
                    <div class="col-xl-4 col-md- 12 col-xs-12 col-sm-12 float-end">
                        <div class="d-flex float-end">
                            <div class="dis fs-4 me-3 d-flex">Search:</div>
                            <input class = "ser form-control"type="text" placeholder ="Search here">
                            
                        </div>
                    </div>
                </div>-->

                <div class = "row g-1 px-5">
              
                    <div class="col-xl-12 col-md-12 col-sm-12">
                        <div class = "row my-2">
                            <div class="col-md-8">
                                  
                                <div class="btn-group" role="group">
                                    <a href = "resident-registration.php"  class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;New Resident</a>
                                </div>

                            </div>
                            <div class="col-md-4 " >
                                <form class = "d-flex">
                                        
                                        <input type = "text" class= "form-control" placeholder = "Search here">
                                        <button type ="button" class = "btn btn-outline-info" ><i class = "fa fa-search"></i></button>
                                </form>

                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="row g-1 px-5">
                    
                    <div class="col-xl-12 col-md-12 col-sm-12 ">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th  scope="col">
                                        Status  </th>
                                    <th   scope="col">Name </th>
                                    <th   scope="col">Age </th>
                                    <th   scope="col">Gender </th>
                                    <th   scope="col">Purok</th>
                                    <th  scope="col">Street </th>
                                    <th   scope="col">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td  class ="small" scope="col">
                                    <i class ="fa fa-circle link-success me-1"></i>
                                    Active
                                </td>
                                
                                <td  scope="col">Gol D. Roger</td>
                                <td  scope = "col">35</td>
                                <td    scope="col"><i class = "fa fa-mars link-info me-2"> </i>Male </td>
                                <td   scope="col">Purok 3</td>
                                <td scope="col">East Blue </td>
                                <td  class ="action" scope="col">
                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                        <a href  = "view-resident-personal.php" type="button" class="btn btng btn-primary"><i class = "fa fa-eye"></i></a>
                                    </div>
                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                        <a type="button" href ="edit-resident-personal.php"class="btn btng btn-success"><i class = "fa fa-edit"></i></a>
                                    </div>
                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                        <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn btn-danger"> <i class = "fa fa-trash"></i></button>
                                    </div>
                                </td>
                            
                            
                            </tr>
                               
                            </tbody>
                        </table>
                    </div>

                </div>
                
            
        </div>
        
    </div>

    
    <div class="modal fade" id = "delete" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger ">
                    <div class="modal-header bg-danger white ">
                        <h5 class="modal-title" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row">
                            <div class="col xl-4" align = "center">
                                <img src="../images/trash.png" alt="trash" class= " img-fluid " style ="width: 10%;">
                            </div>
                    
                        </div>
                        <div class="row">
                            <p class = "fs-4 text-center">You are about to delete a record, do you wish to continue?<br></p>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        <form method = "POST" action = "#">
                            <input type = "button" class="btn btn-success" data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                            <input type = "button" class="btn btn-secondary" data-bs-dismiss = "modal"  name = "no" value ="No">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    


    
</body>
</html>