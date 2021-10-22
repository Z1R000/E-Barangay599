<?php 
    $curr ="Certifications";
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
  

    <link rel = "stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../CSS/scrollbar.css">

	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
          table,td,tr,th{
            border: 1px solid darkgrey;
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
        .pay{
            border: 1px solid grey;
        }
        @media print{
            body * {
                visibility: hidden;
            }
            .btng{
                visibility: hidden;
            }
            .print-container , .print-container * {
                visibility: visible;
            }
            .print-container {
                border:0;
                padding:1cm;
                position: absolute;
                top:0;
                left:0;
            }
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
                <div class="mx-auto col-xl-12  ">
                    <div class="row g-0  shadow-sm rounded-top border" style= "background: #012f4e; color: white">
                        <div class="col-xl-5 py-2 px-2  ">
                            <nav class="nav nav-pills flex-column  flex-sm-row">
                                <a class="flex-sm-fill  text-sm-center nav-link active fs-5 white" aria-current="page" href="#certlist" data-bs-toggle = "tab">Certificates List</a>
                                <a class="flex-sm-fill text-sm-center nav-link fs-5 white" href="#crecords" data-bs-toggle = "tab">Certification Records</a>
                                <a class="flex-sm-fill text-sm-center nav-link fs-5 white" href="#holding" data-bs-toggle = "tab">Payment Logs</a>
                       
                            
                            </nav>

                        </div>
                        
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="certlist">
                            <form action="" method = "POST">
                                <div class="row g-0 border-start border-end border-bottom border-secondary shadow-lg bg-white" >

                                    <div class = "row py-2 g-0 px-5">
                                        <div class="col-md-8 px-2">
                                            
                                            <div class="btn-group" role="group">
                                                <a href = "add-certificate.php"  class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;New Certificate</a>
                                            </div>

                                        </div>
                                        <div class="col-md-4  px-2" >
                                            <div class="d-flex">
                                        
                                            <input type="text" name ="searchCert" placeholder = "Search Record"class="form-control">
                                            <button class= "btn btn-outline-info mx-1 my-1" ;><i class= "fa fa-search"></i></button>

                                            </div>
                                    
                                        
                                        </div>
                                        
                                    </div>
                                    <div class="row border g-0">
                                        <div class="col-xl-11 mx-2  mx-auto py-3  px-2">
                                            <table class="table bg-white table-hover shadow-sm border "> 
                                                <thead>
                                                    <tr>
                                                        <td scope = "col" colspan = 3 style ="background: #012f6e; color: white; text-align: center">Certificates List</td>
                                                    </tr>
                                                    <tr>
                        
                                                        <th style = "text-align: left">Certification Name</th>
                                                        <th style = "text-align: left">Certification Fee</th>
                                                        <th style = "text-align: center">Action</th>
                                            
                                                    </tr>
                                                
                                                </thead>           
                                                <tbody class= "table-hover">
                                                    <tr>
                                                        <td scope="col" style = "text-align: left">Barangay Clearance</td>
                                                        <td scope="col" style = "text-align: left">20 PHP</td>
                                                        <td scope="col" style = "text-align: center">
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <button type = "submit" type="button" class="btn btng btn-primary"><i class = "fa fa-eye"></i></button>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="" href ="edit-cert.php"class="btn btng btn-success"><i class = "fa fa-edit"></i></a>
                                                                </div>
                                                                   
                                                               
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="#delete-cert" data-bs-toggle = "modal" role = "button" class="btn btng btn-danger"><i class = "fa fa-trash"></i></a>
                                                                </div>
                                                            
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>                        
                                        </div>   
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="crecords">
                            <div class="row g-0 border-start border-end border-bottom border-secondary shadow-lg bg-white" >
                                <div class = "row py-2 g-0 px-3">
                                    <div class="col-md-8 ">
                                            <div class="btn-group" role="group">
                                                <a href = "#walk-in"  data-bs-toggle ="modal" role = "button"class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;Walk-in certification</a>
                                            </div>
                                            <div class="btn-group" role="group">
                                                <a href = "#"  onclick="window.print()" data-bs-toggle ="modal" role = "button"class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-cog"></i>&nbsp;Generate report</a>
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
                                    <div class="col-xl-12 mx-2  mx-auto py-3  px-3 print-container">
                                        <table class="table bg-white table-hover shadow-sm border "> 
                                            <thead>
                                                <tr>
                                                    <td scope = "col" colspan = 9 style ="background: #012f6e; color: white; text-align: center">Certification Records</td>
                                                </tr>
                                                <tr>
                                                    <th style = "text-align: left">BCN #</th>
                                                    <th style = "text-align: left">Status</th>
                                                    <th style = "text-align: left">Requestor's Name</th>
                                             
                                                    <th style = "text-align: left">Purpose</th>
                                                    <th style = "text-align: left">Requested Certificate</th>
                                                    <th style = "text-align: left">Certificate fee</th>
                                                    <th style = "text-align: left">Mode of Payment</th>
                                                    <th style = "text-align: left">Date</th>
                                                    <th style = "text-align: center">Actions</th>
                                                    
                                                </tr>
                                            </thead>           
                                            <tbody class= "table-hover">
                                                <tr>
                                                    <td scope="col" style = "text-align: left">015-22</td>
                                                    <td scope="col" style = "text-align: left">On-Going</td>
                                                    <td scope="col" style = "text-align: left">ekoc omsim</td>
                                                    
                                                    <td scope="col" style = "text-align: left">For employment</td>
                                                    <td scope="col" style = "text-align: left">Barangay Clearance</td>
                                                    <td scope="col" style = "text-align: left">30 PHP</td>
                                                    <td scope="col" style = "text-align: left">G-cash</td>
                                                    <td scope="col" style = "text-align: left">10-12-2021</td>
                                                  
                                                    <td scope="col" style = "text-align: center">
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a type="" href ="edit-cert-record.php"class="btn btng btn-primary"><i class = "fa fa-edit"></i></a>
                                                            </div>
                                                        
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a type="" href ="temp-cert.php"class="btn btng btn-success"><i class = "fa fa-print"></i></a>
                                                            </div>
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="#approve-transac" data-bs-toggle = "modal" role = "button" class="btn btng btn-info"><i class = "fa fa-paper-plane white"></i></a>
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
                        <div class="tab-pane" id="holding">
                            <div class="row g-0 border-start border-end border-bottom border-secondary shadow-lg bg-white" >
                                <div class="col-md-6 px-3 py-5 " style= "max-height: 450px;overflow-y:auto;">
                                    <table class= "table pay border shadow-sm">
                                        <thead class="bg-primary white">
                                        <tr>
                                            <td>
                                                Requestor Name
                                            </td>
                                            <td>
                                                Requested Certificate
                                            </td>
                                             
                                            <td>
                                              Mode of Payment
                                            </td>
                                          
                                            
                                            <td>
                                                Proof of payment
                                            </td>
                                            
                                            <td scope="col" style = "text-align: center">
                                                Actions
                                            </td>
                                            
                                        </tr>

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Edward Newgate
                                                </td>
                                                
                                                <td>
                                                    Employment
                                                </td>
                                                <td>
                                                   G-cash
                                                </td>
                                                <td>
                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                        <a type="" style= "padding: 5px;"href ="#"class="btn btn-primary"><i class = "fa fa-eye me-1"></i>Payment</a>
                                                    </div>
                                                </td>
                                                <td  scope="col" style = "text-align: center">
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a href ="#approve-proof"class="btn btn-success" data-bs-toggle=  "modal"><i class = "fa fa-check me-1"></i>Accept</a>
                                                        </div>
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="button" href ="#decline-proof" data-bs-toggle = "modal" role = "button" class="btn  btn-danger"><i class = "fa fa-times-circle me-1"></i>Decline</a>
                                                        </div>

                                                </td>
                                            </tr>

                                           
                                           
                                        </tbody>
                                     
                                    </table>
                                </div>
                                <div class="col-md-6 border"style= "height: 100%;max-height: 450px;overflow-y:auto;" >
                                    <form action="" action ="POST">
                                        <div class="row g-0 px-4 py-5">
                                            <div class="row">
                                                <div class="col-md-7 ">
                                                    <label for="payname" class="fs-5">Requestor Name</label>
                                                    <input id = "payname" type="text" class= "form-control" placeholder = "Payor Name"  readonly>
                                                </div>
                                            
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 ">
                                                    <label for="payid" class="fs-5">Payment ID</label>
                                                    <input id = "payid" type="text" class= "form-control" placeholder = "Payor Name" value = "213213123" readonly>
                                                </div>
                                                <div class="col-md-3 ">
                                                    <label for="payed" class="fs-5">Amount Paid</label>
                                                    <input id = "payed" type="text" class= "form-control" placeholder = "Payor Name" value = "50" style= "width: 100%;"readonly> 
                                                </div>
                                                <div class="col-md-3 " class="fs-5">
                                                    <label for="payed" class= "fs-5">Payable</label>
                                                    <input id = "payed" type="text" class= "form-control" placeholder = "Payor Name" value = "50" style= "width: 100%;"readonly> 
                                                </div>
                                                <label for="payed" class="fs-5 mb-2">Proof of Payment- <a href= "../images/proof.jpg" download target = "_blank" class= "text-decoration-none"><i class= "fa fa-download"></i>Download proof</label></a>
                                                
                                                <div class="row justify-content-center text-center">
                                                    <div class="col-md-4">
                                                        
                                                        <a align ="center" href = "#proof" data-bs-toggle ="modal" style= "max-height: 400px"><img src="../images/proof.jpg" alt="proof of payment" class= "img-fluid"></a>
                                                       
                                                        
                                                

                                                    
                                                    </div>

                                                </div>
                                          
                                                
                                            
                                            </div>
                           
                                        </div>


                                    </form>
                                </div>
                                
                            </div>
                        </div>
                        <div class="tab-pane" id="release">

                        </div>
                    </div>  
                </div>           
            </div> 
        </div> 
    </div>
   


    </form>
   
    <!--modal-->

    <?php
        include ('services.php');
    
    ?>
    <!--modal-payment-->
    <div class="modal fade" id = "delete-record" tab-idndex = "-1">
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
 
        
   
       
        <div class="modal fade" id = "dec-val" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger ">
                    <div class="modal-header bg-danger bg-transparent ">
                        <h5 class="modal-title" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                       
                        <div class="row">
                            <p class = "fs-4 text-center">You are about to decline a proof of payment, do you wish to proceed sending decline message?<br><span class="text-muted fs-6">*Select (<i class = "fa fa-check">)</i> if certain</span></p>
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
        
    <!--end-payments-->

    <div class="modal fade" id = "delete-cert" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger ">
                    <div class="modal-header bg-danger bg-transparent ">
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
                            <p class = "fs-4 text-center">You are about to delete an existing certificate, do you wish to continue?<br><span class="text-muted fs-6">*Select (<i class = "fa fa-check">)</i> if certain</span></p>
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
<form method = "POST" action = "#">

<div class="modal fade" id = "walk-in" tab-idndex = "-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content g-0 blue" >
            <div class="modal-header blue white ">
                <h5 class="modal-title" id="delete">&nbsp;<i class = "far fa-copy"></i>&nbsp;&nbsp;Walk in Certification</h5>
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4 bg-white">
                    <div class="row">
                        <div class="col-xl-4">
                            <label for="date" class="fw-bold fs-6" >Date today</label>
                            <input type="text" id= "date" class="form-control" readonly>
                        </div>
                    </div>
              
                    <div class="row g-3 ">
                        <div class="col-md-6">
                    
                            <label for="rname"class="fs-6 fw-bold">Requestor Name</label>
                            <input type="text" class="form-control" id="rname" placeholder ="e.g Juan Dela Cruz">
                        
                        </div>
                        <div class="col-md-4">
                            <label for="purp" class= "fs-6 fw-bold">Purposes</label>
                                <select class= "select form-control" name="" id="purp">
                                    <option  selected>Purposes</option>
                                    <option value="ent">For entertainment</option>
                                    <option value="med">For medical reasons</option>
                                </select>
                            </div>
                    </div>
                    <div class="row">
               
                            <div class="col-md-4">
                                
                                <label for="ctype"class="fs-6 fw-bold">Certification Type</label>
                                <div class="d-flex">
                                    <select class= "select form-control" name="" id="ctype" onchange= "showDiv('hidden_div',this)">
                                        <option  selected>--Avaiable certifications--</option>
                                        <option value="emp">Employment</option>
                                        <option value="ind">Indigency</option>
                                        <option value="Business">Business</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="rname"class="fs-6 fw-bold">Certification Fee</label>
                                <div class="d-flex">
                                    <div class="input-group">
                                        <button class="btn btn-secondary text-white" disabled>
                                        ₱
                                        </button>
                                        <input type="text" class="form-control me-2 w-50" style = "text-align: right;" id="rname" value  = "20.00" readonly>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <label for="ctype"class="fs-6 fw-bold">Mode of Payment</label>
                                <div class="d-flex">
                                    <select class= "select form-control" name="" id="mop" onchange= "showDiv('hidden_div',this)">
                                        <option  selected>--Select--</option>
                                        <option value="gc">G-Cash</option>
                                        <option value="cash">Cash</option>
                       
                                    </select>
                                </div>
                            </div>
                   

                    </div>
                
               
          
               <div class="row" id = "hidden_div">
                           
                    <div class="col-md-6" >
                        <label for="purp" class= "fs-6 fw-bold">Business name 
                            <small class="text-muted">(If business related)</small> </label>
                        <input type="text" class="form-control" id="rname" placeholder ="e.g Manong Store"> 
                   </div>
                   
                   <div class="col-md-6" >
                        <label for="cap" class= "fs-6 fw-bold" >Capital</label>
                            <select class= "select form-control" name="" id="cap">
                                <option  selected>< 10,000 </option>
                                <option value="ent">>10, 000</option>
                                <option value="med">>100,000</option>
                            </select>
                      
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
<div class="modal fade" id = "approve-transac" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-success ">
                    <div class="modal-header bg-success  ">
                        <h5 class="modal-title white">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Send Proof of transaction</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        
                        <div class="row mt-2">
                            <form action="" method = "POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="dname">Requestor Name</label>
                                        <input id = "dname" type="text" class="form-control" value = "Juan Dela Cruz" readonly>

                                    </div>
                           
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-5">
                                        <label for="contac">Contact Number</label>
                                        <input id = "contac" type="text" class="form-control" value = "09123456789" readonly>
                   
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Email Address</label>
                                        <input id = "emails" type="text" class="form-control" value = "juanDelaC@gmail.com" readonly>
                                        
                                    
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-5">
                                        <label for="ars">Acquired rental/service</label>
                                        <input id = "crs" type="text" class="form-control" value = "Marriage" readonly>
                   
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Payment Status</label>
                                        <input id = "emails" type="text" class="form-control" value = "Settled + amount payed" readonly>
                                       
                                    
                                    </div>
                                </div>
                                <div class="row mt-2">
                                        <label for="remarks" >Remarks</label>
                                        <div class="col-md-11">
                                            <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style=";height: 100px;resize: none;"></textarea>
                                            <label for="floatingTextarea2">Remarks here (max 10 words)</label>
                                                
                                            </div>
                                        </div>
                                   
                                </div>
                                <div class="row mt-2">
                                    <label for="remarks" >Mode of delivery <i class= "fa fa-envelope"></i></label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="sms">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                SMS
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="em" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                E-mail
                                            </label>
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Walk-in
                                            </label>
                                        </div>

                                    </div>
                                    
                                </div>
                                <div class="row justify-content-center" align = "center">
                                    
                                    <div class="col-mx-6">
                                        <button href ="#" type = "button" class="btn btn-success rounded-circle" data-bs-dismiss ="modal"  >
                                            <i class= 'fa fa-paper-plane py-1'></i>
                                        </button>
                                        <button type = "button" class="btn btn-danger rounded-circle" data-bs-dismiss = "modal"  name = "no" value ="No">
                                            <i class= "fa fa-times"></i>
                                        </button>
                                
                                    </div>
                                    
                                </div>  
                            </form>

                        </div>
                      
                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
<script>
    var today = new Date();
    var mm = today.getMonth() + 1;
    var dd = today.getDay();
    var yy = today.getFullYear();
    
    if (mm<10){
        mm = '0'+ mm;
    }
    if (dd <10){
        dd = '0' + dd;
    }

    var  dtd= mm + '/' + dd + '/' + yy;
    document.getElementById('date').value = dtd;

    function walkin(){
        document.getElementId('sms').disabled = true;
        document.getElementId('em').disabled = true;
        
    }
    

</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $("select").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else {
                        $(".box").hide();
                    }
                });
            }).change();
        });
    </script>

<script type="text/javascript">
    function showDiv(divId, element) {
        document.getElementById(divId).style.display = element.value == 'Business' ? 'flex' : 'none';
    }
   
</script>

</body>
</html>