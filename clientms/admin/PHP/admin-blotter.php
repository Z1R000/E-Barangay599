<?php 
    $curr ="Blotters";
?>

<!-- supply with the selected record's information -->
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

    <link rel = "stylesheet" href="../CSS/sidebar.css" />
    <link rel = "stylesheet" href = "../CSS/table.css"/>
    <link rel= "stylesheet" href = "../CSS/scrollbar.css"/>
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
        table,tr,td,th{
            border: 1px solid grey;
        }
        body,html{
            height: 100%;
        }
        
        .right{
            height: auto;
            max-height: 550px;
            overflow-Y: auto;
        }
        .left{
            height: auto;
            max-height:250px;
            overflow-Y: auto;
        }
        .white{
            color:white;
        }

    </style>
</head>
<body>

    <?php 
        include ('../includes/sidebar.php');
    ?> 
            <!--breadcrumb-->
        <div class="container mx-5 mt-3">
            <nav aria-label="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                        <li class="breadcrumb-item"><a  class= "text-decoration-none" href="#"><i class="fa fa-paperclip"></i>&nbsp;Services</a></li>
                      
                        <li class="breadcrumb-item active"><a href="#"><i class="fa fa-gavel text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                    </ol>
                </nav>
            </nav>
        </div>


        <div class="container-fluid mx-4  px-4 mb-5">
        <div class="row g-0">
            <div class="row gx-4 gy-2">
                <div class="mx-auto col-xl-12 ">
                    <div class="row g-0  rounded-top border white" style= "background: #021f4e">
                        <div class="col-xl-2  px-2  ">
                            <div class="row">
                                <h5 class="flex-sm-fill  text-sm-center nav-link  " aria-current="page" >
                                    <i class= "fa fa-suitcase"></i> Blotter Records</h5>
                            </div>
        

                        </div>
                        
                    </div>
                    <div class="row g-0 border bg-white" >
                      

                        <div class = "row py-2 g-0 px-3">
                            <div class="col-md-8 px-1">
                                <div class="btn-group" role="group">
                                    <a href = "#blotter-choice" data-bs-toggle= "modal" role = "button" class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;New Case</a>
                                </div>
                            </div>
                            <div class="col-md-4  px-2" >
                                <div class="d-flex">
                            
                                <input type="text" name ="searchCert" placeholder = "Search Record" class="form-control">
                                <button class= "btn btn-outline-info mx-1 my-1"><i class= "fa fa-search"></i></button>

                                </div>
                        
                            
                            </div>
                            
                        </div>
                        <div class="row g-0">
                            <div class="col-xl-11 mx-2  mx-auto py-3  px-2">
                                    <table class="table bg-white table-hover "> 
                                        <thead class = "bg-light">
                                            <tr>
                                           
                                            </tr>
                                            <tr>
                
                                                <th style = "text-align: left">Status</th>
                                                <th style = "text-align: left">Complainant</th>
                                                <th style = "text-align: left">Incident Type</th>
                                                <th style = "text-align: left">Date Time Reported</th>
                                                <th style = "text-align: left">Incident's Estimated Time </th>
                                                <th style = "text-align: center">Actions</th>
                                                
                                    
                                            </tr>
                                        
                                        </thead>           
                                        <tbody class= "table-hover">
                                            <tr>
                                                <td scope="col" style = "text-align: left">On-going</td>
                                                <td scope="col" style = "text-align: left">Mang Berting</td>
                                                <td scope="col" style = "text-align: left">Public Disturbance</td>
                                         
                            
                                                
                                                <td scope="col" style = "text-align: left">12-10-2021</td>
                                                <td scope="col" style = "text-align: left">6:00pm</td>
                                                <td scope="col" style = "text-align: center">
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="" href ="blotter-report.php"class="btn btng btn-primary"><i class = "fa fa-print"></i></a>
                                                        </div>
                                                    
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a href ="edit-blotter.php"class="btn btng btn-success"><i class = "fa fa-edit"></i></a>
                                                        </div>
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="button" href ="#delete-record" data-bs-toggle = "modal" role = "button" class="btn btng btn-danger"><i class = "fa fa-trash"></i></a>
                                                        </div>
                                                    
                                                </td>

                                            </tr>

                                        </tbody>
         
                                    </table>                        
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

    </form>
   
    <!--modal-->

       
        <div class="modal fade" id = "delete-record" tab-idndex = "-1">
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
                            <p class = "fs-4 text-center">You are about to delete an existing record, do you wish to continue?<br><span class="text-muted fs-6">*Select (<i class = "fa fa-check">)</i> if certain</span></p>
                        </div>
                        <div class="row justify-content-center" align = "center">
                            <form method = "POST" action = "#">
                                <button type = "button" class="btn btn-success rounded-circle" data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                    <i class= 'fa fa-check '></i>
                                </button>
                                <button type = "button" class="btn btn-danger rounded-circle" data-bs-dismiss = "modal"  name = "no" value ="No">
                                    <i class= "fa fa-times"></i>
                                </button>
                            </form>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id = "blotter-choice" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 blue ">
                    <div class="modal-header blue white">
                        <h5 class="modal-title" id="delete">&nbsp;<i class = "fa fa-user"></i>&nbsp;&nbsp;Complainant Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row  px-2">
                            <div class="col xl-4 px-3" align = "center">
                                <img src="../images/resident-logo.png" alt="trash" class= " img-fluid " style ="width: 40%;">
                                
                            <div class="row">
                                    <a type = "button" href="create-blotter-resident.php" class="btn btn-outline-info rounded"  name = "resident" value ="resident">
                                        599 resident
                                    </a>
                                </div>                           
                            </div>

                            <div class="col xl-4 px-3" align = "center">
                                <img src="../images/outsider.png" alt="trash" class= " img-fluid " style ="width: 40%;">
                                <div class="row">
                                    <a class="btn btn-outline-info rounded" href ="create-blotter-outsider.php"  name = "outsider" value ="outsider">
                                        Outsider
                                    </a>
                                </div>   
                            </div>
                            
                        </div>
                 
                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
    <!-- walk-in modal-->
    
    
</body>
</html>