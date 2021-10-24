<?php 
    $curr ="Blotter";
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
    <link rel="stylesheet" href="../CSS/scrollbar.css">

	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
       table,tr,td,th{
            border: 1px solid grey;
            font-size: 1.1em;
        }
        body,html{
            height: 100%;
        }
        .blue{
            background: #012f4e;
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
        @media (max-width: 576px){
            .btnx{
              margin-bottom: 10px;
            }
          
            .row {
                overflow-x: auto;
            }
            .dis{
                font-size: 15px;
            }
            .ser{
                width: 100%;
            }
            .sepa{
              overflow-x: auto;
            }
           
           
        }
                
    </style>
</head>
<body>

    <?php 
        include ('../includes/sidebar.php');
    ?> 
    <div class="d-flex align-items-center">
                <div class="container  mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a  class= "text-decoration-none" href="#service-choice" data-bs-toggle= "modal" role ="button"><i class="fa fa-paperclip"></i>&nbsp;Services</a></li>
                            
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-gavel text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav> 
 
    <div class="container-fluid mx-4  px-4 mb-5">
        <div class="row g-0">
            <div class="row gx-4 gy-2 ">
                <div class="mx-auto col-xl-12 ">
                    <div class="row g-0  rounded-top border white border-start border-end border-bottom border-secondary" style= "background: #021f4e">
                        <div class="col-xl-2  px-2  ">
                            <div class="row ">
                                <h5 class="flex-sm-fill  text-sm-center nav-link  " aria-current="page" >
                                    <i class= "fa fa-suitcase"></i> Blotter Records</h5>
                            </div>
        

                        </div>
                        
                    </div>
                    <div class="row g-0 border bg-white border-start border-end border-bottom border-secondary" >
                      

                        <div class = "row py-2 g-0 px-3">
                            <div class="col-md-8 px-1">
                                <div class="btn-group" role="group">
                                    <a href = "create-blotter-resident.php"  class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;New Case</a>
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
                                         
                            
                                                
                                                <td scope="col" style = "text-align: right">12-10-2021</td>
                                                <td scope="col" style = "text-align: right">6:00pm</td>
                                                <td scope="col" style = "text-align: center">
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="" href ="blotter-report.php"class="btn btng btn-primary"><i class = "fa fa-print me-2"></i> Report</a>
                                                        </div>
                                                    
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a href ="edit-blotter.php"class="btn btng btn-success"><i class = "fa fa-edit me-2"></i>Edit</a>
                                                        </div>
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="button" href ="#delete-record" data-bs-toggle = "modal" role = "button" class="btn btng btn-danger"><i class = "fa fa-trash me-2"></i>Delete</a>
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
        <?php
            include('services.php');
        ?>
       
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

      
    
</body>
</html>