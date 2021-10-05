<?php 
    $curr ="Rentals";
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

    <link rel = "stylesheet" href="../CSS/sidebar.css" />
    <link rel = "stylesheet" href = "../CSS/table.css"/>
    <link rel="stylesheet" href="../CSS/scrollbar.css">
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
        
       
    </style>
</head>
<body>

    <?php 
        include ('../includes/sidebar.php');
    ?> 
            <!--breadcrumb-->
                    <div class="container mx-5">
                        <nav aria-label="breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#"><i class="fa fa-paperclip text-muted"></i></a>&nbsp;Services</li>
                                    <li class="breadcrumb-item active"><a href="#"><i class="fa fa-address-book text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                                </ol>
                            </nav>
                        </nav>
                    </div>
                
                    <div class = "container-fluid">
                        <div class="row">
                            <div class="col-xl-8 col-sm-0">

                            </div>
                            <div class="col-xl-4 col-sm-12 mt-2 mx-0">
                                <div class ="nav justify-content-end">
                                    <div class="btn-group" role="group">
                                        <a href = "rental-record.php" class="btn btn-primary mx-1 my-1"><i class="fa fa-list"></i>&nbsp;Records</a>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <a href = "admin-Rrequest.php" class="btn btn-primary mx-1 my-1"><i class="fa fa-list"></i>&nbsp; Requests</a>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <a href = "#add-service" data-bs-toggle = "modal" role = "button" class="btn btn-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp; New Service</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
                                <div class = "row my-2">
                                    <div class="col-md-8">

                                    </div>
                                    <div class="col-md-4 " >
                                        <form class = "d-flex">
                                            
                                                <input type = "text" class= "form-control" placeholder = "Search here">
                                                <button type ="button" class = "btn btn-success" ><i class = "fa fa-search"></i></button>
                                        </form>

                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                     
                        <div class="row">
                            <div class="col-xl-12">
                                <table class = "table">
                                    <thead style= "background:#021f4e">
                                        <tr>
                                            <td colspan = 5 class = "" style = "color: white" align = "center">Rental Services</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class = "light">
                                            <th class = "">
                                            Property Name
                                            </th>
                                            <th class = "">
                                                Description
                                            </th>
                                            <th class = "">
                                                Rate (Fee)
                                            </th>
                                            <th class = "">
                                                Availability
                                            </th>
                                            <th class = "" >
                                                Action
                                            </th>
                                        </tr>
                                        <tr>
                                
                                            <td class = "">
                                                Basketball Court
                                            </td>
                                            <td class = "">
                                                description..
                                            </td>
                                            <td class = "">
                                                20.00 ₱
                                            </td>
                                            <td class = "">
                                            Available
                                            </td>
                                            <td>
                                                <div class = "actions" align = "center">
                                                    <a href="#edit-service" class="btn btn-primary text-decoration-none my-1" data-bs-toggle = "modal" role = "button"><i class = "fa fa-edit"></i>&nbsp;<span id = "label">Update</span></a>
        
                                                    <a href="#verif-del" class="btn btn-danger text-decoration-none my-1" data-bs-toggle="modal" role button><i class ="fa fa-trash"></i>&nbsp;Delete</a>
                                                </div>
                                                                    
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            
                        </div>
                    </div>
    <!--modals-->            
    <div class="modal fade" id="add-blotter-type"  tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="add-blotter-type"><i class = "fa fa-plus"></i>&nbsp;New Blotter type</h5>
                 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class = "image-fluid" align = "center">
                            <img src = "../IMAGES/BARANGAY.png" class ="brand-logo" style = "width: 30px">
                        </div>
                    </div>
                    <form method = "POST" action="#">
                        <div class="row">
                            <div class="col my-1">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">?</div>
                                    </div>
                                    <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="New Blotter type here">
                                </div>
                            </div>
                        </div>

                        <div class ="row my-1">
                            <div class ="col">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                                    <label class = "text-muted" for="floatingTextarea2">Blotter type description here</label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                     <a  href = "#verif" role= "button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" >Save</a>
                    <input type = "reset" class="btn btn-primary" >
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--blotter type addition verification-->
    <div class="modal fade" id = "verif" tab-idndex = "-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="delete-cert">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    <p class = "fs-4">New property is about to be added,<br>Click "Yes" if certain?</p>
                </div>
                <div class="modal-footer">
                    <form method = "POST" action = "#">
                    <input type = "button" class="btn btn-success"  name = "yes" value ="Yes">
                    <input type="button" class="btn btn-danger" data-bs-dismiss="modal"  value = "No">
                    </form>


                </div>
            </div>
        </div>
    </div>

    <!--blotter addition record verification modal-->
    <div class="modal fade" id = "verif-brecord" tab-idndex = "-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-cert">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    <p class = "fs-4">New  about to be created,<br>Click "Yes" if certain</p>
                </div>
                <div class="modal-footer">
                    <form method = "POST" action = "#">
                    <input type = "button" class="btn btn-success"  name = "yes" value ="Yes">
                    <input type="button" class="btn btn-danger" data-bs-dismiss="modal"  value = "No">
                    </form>


                </div>
            </div>
        </div>
    </div>
    <!--feeupdate verificationn modal-->
  
    <!-- update verification modal-->
    <div class="modal fade" id = "verif-update" tab-idndex = "-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-cert">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    <p class = "fs-4">Confirm property update<br>Click "Yes" if certain</p>
                </div>
                <div class="modal-footer">
                    <form method = "POST" action = "#">
                    <input type = "button" class="btn btn-success"  name = "yes" value ="Yes">
                    <input type="button" class="btn btn-danger" data-bs-dismiss="modal"  value = "No">
                    </form>


                </div>
            </div>
        </div>
    </div>
    <!--delete verification modal-->
    <div class="modal fade" id = "verif-del" tab-idndex = "-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-cert">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    <p class = "fs-4">Confirm service deletion<br>Click "Yes" if certain</p>
                </div>
                <div class="modal-footer">
                    <form method = "POST" action = "#">
                    <input type = "button" class="btn btn-success"  name = "yes" value ="Yes">
                    <input type="button" class="btn btn-danger" data-bs-dismiss="modal"  value = "No">
                    </form>


                </div>
            </div>
        </div>
    </div>
   

    <!--populate cells requiring data from blotter db, 
        this is add-blotter record modal-->
    <div class="modal fade" id="edit-service"  tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="add-blotter-type"><i class = "fa fa-edit"></i>&nbsp;599 Property</h5>
                 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class = "image-fluid" align = "center">
                            <img src = "../IMAGES/BARANGAY.png" class ="brand-logo" style = "width: 30px">
                        </div>
                    </div>
                    <form method = "POST" action="#">
                   
                        
                            <div class="row">
                                <div class="col-md-8 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-address-book"></i></a></div>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="Property name">
                                </div>
                            </div>
                     
                      
                            <div class="col-md-4 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-credit-card"></i></a></div>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="Service fee">
                                </div>
                            </div>
                        </div>
                        
                      
                        <div class ="row my-1">
                            <div class ="col">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                                    <label class = "text-muted" for="floatingTextarea2">Service description here</label>
                                </div>
                            </div>
                        </div>

                       

                    </div>
                <div class="modal-footer">
                     <a  href = "#verif-update" role= "button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" >Save</a>
                    <input type = "reset" class="btn btn-primary" >
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--populate with db data check blotter case modal-->

    
    

    <!-- db populate edit blotter case modal -->
    <div class="modal fade" id="add-service"  tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="add-blotter-type"><i class = "fa fa-plus"></i>&nbsp;New Property</h5>
                 
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class = "image-fluid" align = "center">
                            <img src = "../IMAGES/BARANGAY.png" class ="brand-logo" style = "width: 30px">
                        </div>
                    </div>
                    <form method = "POST" action="#">
                   
                        
                        <div class="row">
                            <div class="col-md-8 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-address-book"></i></a></div>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="Service name">
                                </div>
                            </div>
                     
                      
                            <div class="col-md-4 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-credit-card"></i></a></div>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="Service fee">
                                </div>
                            </div>
                        </div>
                        
                      
                        <div class ="row my-1">
                            <div class ="col">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                                    <label class = "text-muted" for="floatingTextarea2">Service description here</label>
                                </div>
                            </div>
                        </div>

                       

                    </div>
                <div class="modal-footer">
                     <a  href = "#verif-brecord" role= "button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" >Save</a>
                    <input type = "reset" class="btn btn-primary" >
                    </form>
                </div>
            </div>
        </div>
    </div>



    
</body>
</html>