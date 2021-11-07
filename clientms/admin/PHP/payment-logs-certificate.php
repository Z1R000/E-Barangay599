<?php 
    $curr ="Certificate Records";
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
            border: 1px solid #d3d3d3;
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
        .uni{
            background:#021f4e;
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
     <!--breadcrumb-->
     
            <div class="d-flex align-items-center">
                <div class="container mx-5 mt-3">
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
        
    <form action="view-cert.php" method= "POST">

   
        <div class="container-fluid mx-4  px-4 mb-5">
        <div class="row g-0">
            <div class="row gx-4 gy-2">
                <div class="mx-auto col-xl-12 ">
                    <div class="row g-0 shadow-sm rounded-top border" style= "background: aliceblue">
                        <div class="col-xl-4 py-2 px-2  ">
                            <nav class="nav nav-pills flex-column  flex-sm-row">
                                <a class="flex-sm-fill  text-sm-center nav-link  " aria-current="page" href="admin-certificate.php">Certificates List</a>
                                
                                <a class="flex-sm-fill text-sm-center nav-link " href="admin-crecords.php">Certification Records</a>
                                <a class="flex-sm-fill text-sm-center nav-link active " href="payment-logs-certificate.php">Payments</a>
        
                            </nav>

                        </div>
                        
                    </div>
                    <div class="row g-0 shadow-sm border bg-white" >
                      

                        <div class = "row py-2 g-0 px-3">
                            <div class="col-md-8 ">
                                  
                                <div class="btn-group" role="group">
                                    <a href = "#walk-in"  data-bs-toggle ="modal" role = "button"class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;Walk-in certification</a>
                                </div>

                            </div>
                            <div class="col-md-4  px-2" >
                                <div class="d-flex">
                             
                                <input type="text" name ="searchCert" placeholder = "Search Certificate"class="form-control">
                                <button class= "btn btn-outline-info mx-1 my-1"><i class= "fa fa-search"></i></button>

                                </div>
                        
                            
                            </div>
                            
                        </div>
                        <div class="row border g-0">
                            <div class="col-xl-12 mx-2  mx-auto py-3  px-3">
                                    <table class="table bg-white table-hover" > 
                                        <thead>
                                            <tr>
                                                <td scope = "col" colspan = 8 style ="background: #012f6e; color: white; text-align: center">Certification Records</td>
                                            </tr>
                                            <tr>
                
                                                <th style = "text-align: left">Requestor's Name</th>
                                                <th style = "text-align: left">Payment Method</th>
                                                <th style = "text-align: left">Purpose</th>
                                                <th style = "text-align: left">Requested Certificate</th>
                                                <th style = "text-align: left">Certificate fee</th>
                                                <th style = "text-align: left">Date</th>
                                                <th style = "text-align: left">Barangay Certification #</th>
                                                <th style = "text-align: center">Actions</th>
                                                
                                    
                                            </tr>
                                        
                                        </thead>           
                                        <tbody class= "table-hover">
                                            <tr>
                                                <td scope="col" style = "text-align: left">ekoc omsim</td>
                                                <td scope="col" style = "text-align: left">g-cash</td>
                                                <td scope="col" style = "text-align: left">For employment</td>
                                                <td scope="col" style = "text-align: left">Barangay Clearance</td>
                                                <td scope="col" style = "text-align: left">30 PHP</td>
                                                <td scope="col" style = "text-align: left">10-12-2021</td>
                                                <td scope="col" style = "text-align: left">015-22</td>
                                                <td scope="col" style = "text-align: center">
                                                    
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="" href ="temp-cert.php"class="btn btng btn-success"><i class = "fa fa-print"></i></a>
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
    <?php
        include('services.php')
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
    <!-- walk-in modal-->
    <form method = "POST" action = "#">

        <div class="modal fade" id = "walk-in" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content g-0 uni" >
                    <div class="modal-header uni white ">
                        <h5 class="modal-title" id="delete">&nbsp;<i class = "far fa-copy"></i>&nbsp;&nbsp;Walk in Certification</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4 bg-white">
                        <div class="row ">
                            <div class="col-md-4">
                                
                                <label for="ctype"class="fs-6 fw-bold">Certification Type</label>
                                <div class="d-flex">
                                    <select class= "select form-control" name="" id="ctype">
                                        <option  selected>Avaiable certifications</option>
                                        <option value="gcash">Employment</option>
                                        <option value="cash">Indigency</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-md-4">
                                
                                <label for="rname"class="fs-6 fw-bold">Certification Fee</label>
                                <div class="d-flex">
                                    <input type="text" class="form-control me-2 w-50" id="rname" value  = "20.00" readonly>
                                    <div class="fs-5">
                                        PHP
                                    </div>
                                </div>
                                
                            </div>
                          
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="rname"class="fs-6 fw-bold">Requestor Name</label>
                                <input type="text" class="form-control" id="rname" placeholder ="e.g Juan Dela Cruz">
                            </div>
                            <div class="col-md-6">
                                <label for="pmethod"class= "fs-6 fw-bold">Mode of Payment</label>
                                <select class= "select form-control" name="" id="pmethod">
                                    <option  selected>Modes of payment</option>
                                    <option value="gcash">G-cash</option>
                                    <option value="cash">Cash</option>
                                </select>
                            </div>
                
                        </div>
                       <div class="row">
                           <div class="col-md-6">
                                <label for="purp" class= "fs-6 fw-bold">Purposes</label>
                                    <select class= "select form-control" name="" id="purp">
                                        <option  selected>Purposes</option>
                                        <option value="ent">For entertainment</option>
                                        <option value="med">For medical reasons</option>
                                    </select>
                           </div>
                           <div class="col-md-6">
                                <label for="purp" class= "fs-6 fw-bold">Business name 
                                    <small class="text-muted">(If business related)</small> </label>
                                <input type="text" class="form-control" id="rname" placeholder ="e.g Manong Store"> 
                           </div>
                       </div>
                
                    </div>
                    <div class="modal-footer py-0">
                                <button type = "submit" class="btn btn-success rounded"  name = "Submit" value ="Submit">
                                    Submit
                                </button>
                                <button type = "button" class="btn btn-danger rounded" data-bs-dismiss ="modal" role  ="button"  name = "Cancel" value ="Cancel">
                                    Discard                                    
                                </button>
                            </form>
                    </div>
                </div>
            </div>
        </div>

    

</body>
</html>