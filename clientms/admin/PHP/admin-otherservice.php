<?php 
    $curr ="Other Services";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curr;?></title>
 
    <?php
        include('link.php');
    ?>
    <script>
           $(document).ready(function() {
        $('#srec').DataTable( {
        dom: 'Bfrtip',
        buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        } );
    } );
    </script>

	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
        
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
            .wal{
                display:none;
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
                <div class="container  mt-3 ">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a  class= "text-decoration-none" href="#service-choice" data-bs-toggle= "modal" role ="button"><i class="fa fa-hand-paper"></i>&nbsp;Services</a></li>
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
        <div class="container-fluid px-5 mb-5">
                <div class="row">
                    <div class="col-xl-2">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href = "#srecords" aria-current="page" href="#" data-bs-toggle= "tab">Service Records</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#paymentsrecs" data-bs-toggle = "tab">Payment Logs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#ser" data-bs-toggle = "tab">Service List </a>
                            </li>
                        </ul>   
                    </div>
                    <div class="col-xl-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id = "srecords">

                                <?php include ('admin-osrecords.php');?>
                       
        
                            </div>
                            <div class="tab-pane fade show" id = "paymentsrecs">
                                <?php
                                    include('payment-logs-os.php');
                                ?>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="ser">
                                    <div class="container g-0 pt-2">
                                        <div class="row bg-599 text-white rounded-top">
                                            <div class="fs-5 px-2"><i class="fa fa-hands-helping mx-1"></i>Available Services</div>
                                        </div>
                                        <div class="row border-end border-start border-bottom">
                                            <div class="row pb-2 px-4 g-0 justify-content-end">
                                                <div class="col-3 ">
                                                    <div class="btn-group float-end">
                                                        <a href = "#new-rental"  data-bs-toggle ="modal" role = "button"class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus mx-1"></i><span class= "wal">New Service</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12" style ="overflow:auto;">

                                                    <table class= "table table-bordered table-striped" style= "min-width: 900px;">
                                                        
                                                        <thead class= "bg-light">
                                                            <tr>
                                                                <th style = "text-align: left;">Service Name</th>
                                                                <th style = "text-align: left;">Service Fee</th>
                                                                <th style = "text-align: left; ">Availablility</th>
                                                                <th style = "text-align: center;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td scope="col" style = "text-align: left">Seminar (droga)</td>
                                                            <td scope="col" style = "text-align: left">20 PHP</td>
                                                            <td scope="col" style = "text-align: left">Available</td>
                                                            <td scope="col" style = "text-align: center">
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <button  type="button" href ="#check-service" data-bs-toggle="modal" role="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class = "wal">View</span></button>
                                                                    </div>
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a href ="#edit-service" data-bs-toggle ="modal" role ="button" class="btn  btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Edit</span></a>
                                                                    </div>
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a type="button" href ="#delete-service" data-bs-toggle = "modal" role = "button" class="btn btn-danger"><i class = "fa fa-trash mx-1"></i><span class = "wal">Delete</span></a>
                                                                    </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="col" style = "text-align: left">Seminar (droga)</td>
                                                            <td scope="col" style = "text-align: left">20 PHP</td>
                                                            <td scope="col" style = "text-align: left">Available</td>
                                                            <td scope="col" style = "text-align: center">
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <button  type="button" href ="#check-service" data-bs-toggle="modal" role="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class = "wal">View</span></button>
                                                                    </div>
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a href ="#edit-service" data-bs-toggle ="modal" role ="button" class="btn  btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Edit</span></a>
                                                                    </div>
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a type="button" href ="#delete-service" data-bs-toggle = "modal" role = "button" class="btn btn-danger"><i class = "fa fa-trash mx-1"></i><span class = "wal">Delete</span></a>
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
        </div>
</div>
</form>
   
    <!--modal-->
   

    <div class="modal fade" id = "delete-service" tab-idndex = "-1">
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
                            <p class = "fs-4 text-center">You are about to delete an existing service, do you wish to continue?<br><span class="text-muted fs-6">*Select (<i class = "fa fa-check">)</i> if certain</span></p>
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
        

    <form action="" method ="POST">
        <div class="modal fade" id = "edit-service" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 blue">
                    <div class="modal-header blue white ">
                        <h5 class="modal-title" >&nbsp;<i class = "fa fa-edit"></i>&nbsp;&nbsp;Edit Service </h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        <div class="row">
                            <div class="col-xl-6" >
                                <label for="prate" class="fs-5 fw-bold">Service Fee</label>
                                <div class="input-group">    
                                    <button class="btn btn-secondary disable">
                                    ₱
                                    </button>
                                    <input type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "Rate" style= "text-align: right;">
                          
                               </div> 
                            </div>
                            <div class="col-xl-6" >  
                                <label for="status" class="fs-5 fw-bold">Service Availablility</label>
                                <select name="" class="form-control" id="status">
                                    <option value="avail">Available</option>
                                    <option value="noavail">Not Available</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12" >
                                <label for="pname" class="fs-5 fw-bold">Service Name</label>
                                <input type="text" id = "pname" class="form-control" name ="pName" placeholder="Name of the selected property">
                            </div>
                        </div>
                        <div class="row">
                       
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
    <?php
        include('services.php');
    ?>
    <form action="" method ="POST">
        <div class="modal fade" id = "new-serv" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 blue">
                    <div class="modal-header blue white ">
                        <h5 class="modal-title" >&nbsp;<i class = "fa fa-plus"></i>&nbsp;&nbsp;New Service</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        <div class="row">
                            <div class="col-xl-5" >
                                <label for="prate" class="fs-5 fw-bold">Service Fee</label>
                                <div class="input-group">    
                                    <button class="btn btn-secondary disable">
                                    ₱
                                    </button>
                                    <input type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "Rate"style= "text-align:right;">
                  
                               </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12" >
                                <label for="pname" class="fs-5 fw-bold">Service Name</label>
                                <input type="text" id = "pname" class="form-control" name ="pName" placeholder="Name of the selected property">
                            </div>
                        </div>
                       

                        <div class="row " align="center">
                            <div class="col-md-5  mx-auto my-2">
                                <button type ="button" role = "button" class="btn btn-outline-primary" >
                                    <i class="fa fa-check me-1"></i>
                                    Submit
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
    <div class="modal fade" id = "check-service" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 blue">
                    <div class="modal-header blue white ">
                        <h5 class="modal-title" >&nbsp;<i class = "fa fa-eye"></i>&nbsp;&nbsp;Service</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        <div class="row">
                            <div class="col-xl-6" >
                                <label for="prate" class="fs-5 fw-bold">Service Fee</label>
                                <div class="input-group">    
                                    <button class="btn btn-secondary disable">
                                    ₱
                                    </button>
                                    <input readonly type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "Rate" style= "text-align:right;">
                                
                               </div> 
                            </div>
                            <div class="col-xl-6" >  
                                <label for="status" class="fs-5 fw-bold">Service Availablility</label>
                                <select name="" class="form-control" id="status" disabled>
                                    <option value="avail">Available</option>
                                    <option value="noavail">Not Available</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12" >
                                <label for="pname" class="fs-5 fw-bold">Service Name</label>
                                <input readonly  type="text" id = "pname" class="form-control" name ="pName" placeholder="Name of the selected property">
                            </div>
                        </div>
                        <div class="row">
                         
                        </div>

                     
                        
                                        
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
        <form action="" method ="POST">

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
    function showOthersdec(divId, element) {
        document.getElementById(divId).style.display = element.value == 'others' ? 'flex' : 'none';
    }
    function showOthers(divId, element) {
        document.getElementById(divId).style.display = element.value == 'others' ? 'block' : 'none';
    }
    function showOthersEdit(divId, element) {
        document.getElementById(divId).style.display = element.value == 'others' ? 'block' : 'none';
    }

</script>
 

</body>
</html>