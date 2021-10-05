<?php 
    $curr ="Blotters";
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
    <link rel= "stylesheet" href = "../CSS/scrollbar.css"/>
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
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

    </style>
</head>
<body>

    <?php 
        include ('sidebar.php');
    ?> 
            <!--breadcrumb-->
            <div class="container mx-5">
                <nav aria-label="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-paperclip text-muted"></i></a>&nbsp;Services</li>
                            <li class="breadcrumb-item active"><a href="#"><i class="fa fa-gavel text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                        </ol>
                    </nav>
                </nav>
            </div>

            <!--other actions for blotter-->
            <div class="container-fluid mb-2">
                <div class="row ">
                    <div class = "col mt-2">
                    </div>
                    
                    <div class="col-md-8 mt-2 mx-0">
                        <div class ="nav justify-content-end mx-0">
                            <div class="btn-group" role="group">
                                <a href = "#update-fee" class="btn btn-primary mx-1 my-1" data-bs-toggle = "modal"><i class="fa fa-edit"></i>&nbsp;Update fee</a>
                            </div>
                            <div class="btn-group" role="group">
                                <a href = "#add-blotter-case" data-bs-toggle = "modal" role = "button" class="btn btn-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;Blotter report</a>
                            </div>
                            <div class="btn-group" role="group" >
                                <a href = "#add-blotter-type" class="btn btn-primary mx-1 my-1" data-bs-toggle = "modal" role = "button"><i class="fa fa-plus"></i>&nbsp;Blotter Type</a>
                            </div>
                            <div class="btn-group" role="group" >
                                <a href = "admin-Brequest.php" class="btn btn-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;Blotter Type</a>
                            </div>
                           
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                    <!--1-->
                    <div class="row">
                        <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12  my-2">
                            <!-- search bar-->
                            <div class="row  my-2">
                                <div class="col-6 ">

                                </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 ">
                                <form class = "d-flex">
                                    <input type = "text" class= "form-control" placeholder = "Search here">
                                    <button type ="button" class = "btn btn-success" ><i class = "fa fa-search"></i></button>
                                </form>
                                </div>
                            </div>
                        <!--table-->
                        <!--2-->
                            <div class="row my-2">
                                <?php include('supporting-files.php')?>
                            </div>

                            <div class="row  my-2">
                        
                                <div class="col-xl-6  ">
                                </div>

                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 ">
                                    <form class = "d-flex">
                                        <input type = "text" class= "form-control" placeholder = "Search here">
                                        <button type ="button" class = "btn btn-success" ><i class = "fa fa-search"></i></button>
                                   </form>
                                </div>

                            </div>
                        <div class="row">
                            <?php include('gen-cer.php')?>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12  my-2">
                        <div class="row  my-2">
                            <div class="col-6 ">

                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 ">
                                <form class = "d-flex">
                                    <input type = "text" class= "form-control" placeholder = "Search here">
                                    <button type ="button" class = "btn btn-success" ><i class = "fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <?php include('right-blotter.php')?>
                   
                </div>
            
            
            

    
      
    <!-- add blotter type modal-->
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
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-cert">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    <p class = "fs-4">New blotter type is about to be created<br>Click "Yes" if certain?</p>
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
                <div class="modal-header    ">
                    <h5 class="modal-title" id="delete-cert">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    <p class = "fs-4">New blotter record about to be created,<br>Click "Yes" if certain</p>
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
    <div class="modal fade" id = "verif-fee" tab-idndex = "-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title" id="delete-cert">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    <p class = "fs-4">Confirm fees update<br>Click "Yes" if certain</p>
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
    <!-- update verification modal-->
    <div class="modal fade" id = "verif-update" tab-idndex = "-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-cert">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    <p class = "fs-4">Confirm record update<br>Click "Yes" if certain</p>
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
                <div class="modal-header ">
                    <h5 class="modal-title" id="delete-cert">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    <p class = "fs-4">Confirm record deletion<br>Click "Yes" if certain</p>
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





    <!--populate with current fee for blotter copy update fee modal-->
    <div class="modal fade" id = "update-fee" tab-idndex = "-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title" id="delete-cert">&nbsp;<i class = "fa fa-edit"></i>&nbsp;&nbsp;Update Extra blotter copy fee</h5>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-5">
                    <!-- 1 copy = 0 more than one me presyuhan na -->
                    <div class  = "row">
                        <div class="col-md-4">
                            Current: <div class= "fs-3">5 PHP</div>
                        </div>
                        <div class = "col-md-4">
                            <form action = "#" method = "POST">
                                <input type = "number" class = "form-control fs-4" min = 0 placeholder = "new price here"> 
                            </form>  
                    </div>
                        
                        
                    </div>
                    
                </div>
                <div class="modal-footer">
                    
                    <a href = "#verif-fee" data-bs-toggle = "modal" role = "button" data-bs-dismiss = "modal" class="btn btn-success">Yes</a>
                    <input type="button" class="btn btn-danger" data-bs-dismiss="modal"  value = "No">

                </div>
            </div>
        </div>
    </div>

    <!--populate cells requiring data from blotter db, 
        this is add-blotter record modal-->
    <div class="modal fade" id="add-blotter-case"  tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="add-blotter-type"><i class = "fa fa-plus"></i>&nbsp;New Blotter Record</h5>
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
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-question"></i></a></div>
                                    </div>
                                    <!--populate with db-->
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected disabled>Blotter type</option>
                                        <option value="violence">Violence</option>
                                        <option value="public" >Public Disturbance</option>
                                        <option value= "vb">Verbal Abuse</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-8 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-user"></i></a></div>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="Complainant's name">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-map-marker"></i></a></div>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="Incident location">
                                </div>
                            </div>
                        </div>
                        
                        <div class ="row my-1">
                            <div class ="col">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 50px"></textarea>
                                    <label class = "text-muted" for="floatingTextarea2">Complaint's Respondents</label>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="fs-6">Incident Date</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-calendar"></i></a></div>
                                    </div>
                                    
                                    <input type="date" class="form-control">
                                
                                </div>
                            </div>
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-tasks"></i></a></div>
                                    </div>
                                    <!--populate with db-->
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected disabled>Blotter Status</option>
                                        <option value="">Fullfilled</option>
                                        <option value="public" >On Going</option>
                                        
                                    </select>
                                
                                </div>
                            </div>
                        </div>

                        <div class ="row my-1">
                            <div class ="col">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                                    <label class = "text-muted" for="floatingTextarea2">Complainant's Narrative here</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="fs-6">Summon Schedule</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-calendar"></i></a></div>
                                    </div>
                                    
                                    <input type="date" class="form-control">
                                
                                </div>
                            </div>
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-clock"></i></a></div>
                                    </div>
                                    
                                    <input type="time" class="form-control">
                                
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

    <!--populate with db data check blotter case modal-->

    <div class="modal fade" id="check-blotter-case"  tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="add-blotter-type"><i class = "fa fa-plus"></i>&nbsp;Blotter Record</h5>
                 
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
                            <div class="col-8 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-user"></i></a></div>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="Complainant's name" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-question"></i></a></div>
                                    </div>
                                    <!--populate with db-->
                                    <select class="form-select" aria-label="Default select example" disabled>
                                        <option selected disabled>Blotter type</option>
                                        <option value="violence">Violence</option>
                                        <option value="public" >Public Disturbance</option>
                                        <option value= "vb">Verbal Abuse</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-credit-card"></i></a></div>
                                    </div>
                                    <!--populate with db-->
                                    <select class="form-select" aria-label="Default select example" disabled>
                                        <option selected disabled>Settlement Status</option>
                                        <option value="violence">Settled</option>
                                        <option value="public" >Unsettled</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        
                       
                        
                        <div class="row">
                            <div class="col my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-map-marker" ></i></a></div>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="Incident location" readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class ="row my-1">
                            <div class ="col">
                                <div class="form-floating">
                                    <textarea readonly class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 50px"></textarea>
                                    <label class = "text-muted" for="floatingTextarea2">Complaint's Respondents </label>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="fs-6">Incident Date</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-calendar"></i></a></div>
                                    </div>
                                    
                                    <input type="date" class="form-control" readonly>
                                
                                </div>
                            </div>
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-tasks"></i></a></div>
                                    </div>
                                    <!--populate with db-->
                                    <select  readonly class="form-select" aria-label="Default select example" disabled>
                                        <option selected disabled>Blotter Status</option>
                                        <option value="">Fullfilled</option>
                                        <option value="public" >On Going</option>
                                        
                                    </select>
                                
                                </div>
                            </div>
                        </div>

                        <div class ="row my-1">
                            <div class ="col">
                                <div class="form-floating">
                                    <textarea  readonly class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                                    <label class = "text-muted" for="floatingTextarea2">Complainant's Narrative here</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="fs-6">Summon Schedule</div>
                        </div>

                        <div class="row">
                            <div  class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-calendar"></i></a></div>
                                    </div>
                                    
                                    <input readonly type="date" class="form-control">
                                
                                </div>
                            </div>
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-clock"></i></a></div>
                                    </div>
                                    
                                    <input readonly type="time" class="form-control">
                                
                                </div>
                            </div>
                        </div>

                    </div>
                <div class="modal-footer">
                    <form method = "POST" action ="#">
                        <a  role= "button" class="btn btn-primary" data-bs-dismiss="modal" >Done</a>
                        <input type = "submit" class="btn btn-primary" value = "Create Report">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- db populate edit blotter case modal -->
    <div class="modal fade" id="edit-blotter-case"  tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="edit-blotter-type"><i class = "fa fa-plus"></i>&nbsp;Update Blotter Record</h5>
                 
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
                            <div class="col-8 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-user"></i></a></div>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="Complainant's name">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-question"></i></a></div>
                                    </div>
                                    <!--populate with db-->
                                    <select class="form-select" aria-label="Default select example" >
                                        <option selected disabled>Blotter type</option>
                                        <option value="violence">Violence</option>
                                        <option value="public" >Public Disturbance</option>
                                        <option value= "vb">Verbal Abuse</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-credit-card"></i></a></div>
                                    </div>
                                    <!--populate with db-->
                                    <select class="form-select" aria-label="Default select example" >
                                        <option selected disabled>Settlement Status</option>
                                        <option value="violence">Settled</option>
                                        <option value="public" >Unsettled</option>
                                       
                                    </select>
                                </div>
                            </div>
                        </div>

                        
                      
                        
                        <div class="row">
                            <div class="col my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-map-marker"></i></a></div>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="Incident location">
                                </div>
                            </div>
                        </div>
                        
                        <div class ="row my-1">
                            <div class ="col">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 50px"></textarea>
                                    <label class = "text-muted" for="floatingTextarea2">Complaint's Respondents</label>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="fs-6">Incident Date</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-calendar"></i></a></div>
                                    </div>
                                    
                                    <input type="date" class="form-control">
                                
                                </div>
                            </div>
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-tasks"></i></a></div>
                                    </div>
                                    <!--populate with db-->
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected disabled>Blotter Status</option>
                                        <option value="">Fullfilled</option>
                                        <option value="public" >On Going</option>
                                        
                                    </select>
                                
                                </div>
                            </div>
                        </div>

                        <div class ="row my-1">
                            <div class ="col">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                                    <label class = "text-muted" for="floatingTextarea2">Complainant's Narrative here</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="fs-6">Summon Schedule</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-calendar"></i></a></div>
                                    </div>
                                    
                                    <input type="date" class="form-control">
                                
                                </div>
                            </div>
                            <div class="col-md-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-clock"></i></a></div>
                                    </div>
                                    
                                    <input type="time" class="form-control">
                                
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
    <?php
        include('decline-modal.php');
    ?>


    
</body>
</html>