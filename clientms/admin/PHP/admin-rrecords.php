<?php 
    $curr ="Properties List";
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
        table,td,tr,th{
            border: 1px solid #333;
            text-align: left;
            font-size: 1em;
            padding: 100px;
            font-family: 'Noto Sans Display', sans-serif;
            
        }   
        td{
            vertical-align: middle;
     
        }
        .btng{
            width: 50px;
        }
        body,html{
            height: 100%;
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
        .blue{
            background: #012f4e;
        }
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');


            .sidebar li .submenu{ 
                list-style: none; 
                margin: 0; 
                padding: 0; 
                padding-left: 1rem; 
                padding-right: 1rem;
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
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-list text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>

     <!--breadcrumb-->
    <form action="#" method= "POST">
        
        <div class="container-fluid mx-4  px-4 mb-5">

            <div class="row g-0">
                <div class="row gx-4 gy-2">
                    <div class="mx-auto col-xl-12 ">
                        <div class="row g-0  rounded-top border" style= "background: aliceblue">
                            <div class="col-xl-6 py-2 px-2  ">
                                <nav class="nav nav-pills flex-column  flex-sm-row">
                                    <a class="flex-sm-fill  text-sm-center nav-link  " aria-current="page" href="admin-rentals.php">Rental Properties</a>
                                    
                                    <a class="flex-sm-fill text-sm-center nav-link active " href="#">Rental Records</a>
                                    <a class="flex-sm-fill text-sm-center nav-link  " href="payment-logs-rental.php">Payment logs</a>
                                  
                            
                                </nav>
                            </div>
                            
                        </div>
                        <div class="row g-0 border bg-white" >
                        

                            <div class = "row py-2 g-0 px-5">
                                <div class="col-md-8 px-2">
                                    
                                    <div class="btn-group" role="group">
                                        <a href = "#"  class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;Walk-in rental</a>
                                    </div>

                                </div>
                                <div class="col-md-4  px-2" >
                                    <div class="d-flex">
                                
                                    <input type="text" name ="searchProp" placeholder = "Search property"class="form-control">
                                    <button class= "btn btn-outline-info mx-1 my-1"><i class= "fa fa-search"></i></button>

                                    </div>
                            
                                
                                </div>
                                
                            </div>
                            <div class="row border g-0">

                                <div class="col-xl-11 mx-2  mx-auto py-3  px-2">
                                        <table class="table bg-white table-hover "> 
                                            <thead>
                                                <tr>
                                                    <td scope = "col" colspan = 8 style ="background: #012f6e; color: white; text-align: center">Properties List</td>
                                                </tr>
                                                <tr>
                    
                                                    <th style = "text-align: left;">Requestor Name</th>
                                                    <th style = "text-align: left; ">Requested Property </th>
                                                    <th style = "text-align: left; ">Mode of payment</th>
                                                    <th style = "text-align: left;;">Date of rental</th>
                                                    <th style = "text-align: left;">Rental Duration</th>
                                                    <th style = "text-align: left;">Rate</th>
                                                    <th style = "text-align: left;">Rental Status</th>
                                                    
                                                  
                                                  
                                                    <th style = "text-align: center;">Action</th>
                                        
                                                </tr>
                                            
                                            </thead>           
                                            <tbody class= "table-hover">
                                                <tr>
                                                    <td scope="col" style = "text-align: left">Tobirama Uchiha</td>
                                                    <td scope="col" style = "text-align: left">Barangay van</td>
                                                    <td scope="col" style = "text-align: left">G-cash</td>
                                                    <td scope="col" style = "text-align: left">10-13-2021, 6:00am</td>
                                                    <td scope="col" style = "text-align: left">2 hrs</td>
                                                    <td style = "text-align: left;">40.00 PHP</td>
                                                    <td scope="col" style = "text-align: left">On-going</td>

                                                    <td scope="col" style = "text-align: center">
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <button  type="button" href ="#check-property" data-bs-toggle="modal" role="button" class="btn btng btn-primary"><i class = "fa fa-eye"></i></button>
                                                            </div>
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a href ="#edit-record    " data-bs-toggle ="modal" role ="button" class="btn btng btn-success"><i class = "fa fa-edit"></i></a>
                                                            </div>
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a type="button" href ="#delete-prop" data-bs-toggle = "modal" role = "button" class="btn btng btn-danger"><i class = "fa fa-trash"></i></a>
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

    <div class="modal fade" id = "delete-prop" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger" >
                    <div class="modal-header  white ">
                        <h5 class="modal-title bg-danger" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row">
                            <div class="col xl-4" align = "center">
                                <img src="../images/trash.png" alt="trash" class= " img-fluid " style ="width: 10%;">
                            </div>
                    
                        </div>
                        <div class="row">
                            <p class = "fs-4 text-center">You are about to delete an existing property, do you wish to continue?<br><span class="text-muted fs-6">*Select (<i class = "fa fa-check">)</i> if certain</span></p>
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
       
        <!--<div class="modal fade" id = "check-property" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 blue ">
                    <div class="modal-header blue white ">
                        <h5 class="modal-title" id="item">&nbsp;<i class = "fa fa-eye"></i>&nbsp;&nbsp;Basketball Court</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row">
                            <div class="col xl-6" align = "center">
                                <img src="../images/court-sample.jpeg" alt="trash" class= " img-fluid rounded " style ="width: 100%;">
                            </div>
                    
                        </div>
                        <div class="row">
                            <p class = "fs-4 text-center">Basketball Court<br></p>
                        </div>
                                        
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>-->
        
    <?php
        include('services.php');
    ?>
    <form action="" method ="POST">
        <div class="modal fade" id = "edit-record" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content g-0 blue">
                    <div class="modal-header blue white ">
                        <h5 class="modal-title" >&nbsp;<i class = "fa fa-edit"></i>&nbsp;&nbsp;Basketball Court</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        <div class="row">
                            <div class="col-xl-6" >
                                <label for="prate" class="fs-5 fw-bold">Requestor Name</label>
                                <div class="d-flex">    
                                    
                                    <input type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "e.g Juan Dela Cruz">
                                    
                               </div> 
                            </div>
                            <div class="col-xl-6" >
                                <label for="prate" class="fs-5 fw-bold">Requestor Name</label>
                                <div class="d-flex">    
                                    
                                    <input type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "e.g Juan Dela Cruz">
                                    
                               </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8" >
                                <label for="pname" class="fs-5 fw-bold">Property Name</label>
                                <input type="text" id = "pname" class="form-control" name ="pName" placeholder="Name of the selected property">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8" >  
                                <label for="status" class="fs-5 fw-bold">Property Availablility</label>
                                <select name="" class="form-control" id="status">
                                    <option value="avail">Available</option>
                                    <option value="noavail">Not Available</option>
                                </select>
                            </div>
                        </div>

                        <div class="row " align="center">
                            <div class="col-md-5  mx-auto my-2">
                                <button type ="button" role = "button" class="btn btn-outline-primary" >
                                    <i class="fa fa-save"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    
                        
                                        
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" id = "check-property" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 blue">
                    <div class="modal-header blue white ">
                        <h5 class="modal-title" >&nbsp;<i class = "fa fa-edit"></i>&nbsp;&nbsp;Basketball Court</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        <div class="row">
                            <div class="col-xl-6" >
                                <label for="prate" class="fs-5 fw-bold">Property Rate</label>
                                <div class="d-flex">    
                                    
                                    <input readonly type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "Rate">
                                    <div class="fs-5 fw-bold">PHP</div>  
                               </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8" >
                                <label for="pname" class="fs-5 fw-bold">Property Name</label>
                                <input readonly  type="text" id = "pname" class="form-control" name ="pName" placeholder="Name of the selected property">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8" >  
                                <label for="status" class="fs-5 fw-bold">Property Availablility</label>
                                <select name="" class="form-control" id="status" disabled>
                                    <option value="avail">Available</option>
                                    <option value="noavail">Not Available</option>
                                </select>
                            </div>
                        </div>

                    
                        
                                        
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>

    

</body>
</html>