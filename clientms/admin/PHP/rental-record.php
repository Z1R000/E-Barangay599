<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Records</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    
    <link rel="stylesheet" href="../CSS/sidebar.css" />
    <link rel = "stylesheet" href = "../CSS/table.css"/>
    <link rel="stylesheet" href="../CSS/scrollbar.css">

	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

</head>
<body>


        <div class = "container-fluid  ">

            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 mb-3">
                <div class="d-flex align-items-center">
                    <i class="fa fa-list primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Rental Records</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i  class = " fa fa-user" ></i>Punong Barangay
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container mx-2 my-2">

                <nav aria-label="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="admin-rentals.php"><i class="fa fa-address-book"></i>&nbsp;Rentals</a></li>
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-list text-muted"></i></a>&nbsp;Records</li>
                        </ol>
                    </nav>
                </nav>

            </div>
            
            <div class="row my-1">

                    <div class="col-lg-9">

                    </div>
                        
                    <div class="col-lg-3  mx-0 justify-content-end ">
        
                        <div class = "row justify-content-end">
                            <a href = "#add-walkin-ren" class="btn btn-primary mx-1 my-1" data-bs-toggle = "modal" role = "button"><i class="fa fa-plus"></i>&nbsp;Walk in Rental</a>
                        </div>

                    </div>

            </div>

            <div class="row ">    
                  
                    <div class="col-xl-4 my-2">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">12</h3>
                                <a class = "link-dark fs-4 card-text" href ="#">Total Declined Rentals</a>
                            </div>
                                <i class="fas fa-times fs-1 primary-text border rounded-circle secondary-bg p-3"></i>
                        </div>
                    </div>
              
                
                    <div class="col-xl-4 my-2">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">60</h3>
                                <a class = "link-dark fs-4 card-text" href ="#" >Total Rentals Catered</a>
                            </div>
                                <i class="fas fa-check fs-1 primary-text border rounded-circle secondary-bg p-3"></i>
                            
                        </div>
                        
                    </div>
                    <div class="col-xl-4 my-2">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">2.4</h3>
                                <a class = "link-dark fs-4 card-text" href ="#">Daily Rental Rate</a>
                            </div>
                                
                                <i class="fa fa-file fs-1 primary-text border rounded-circle secondary-bg p-3"></i>
                            
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
                        <?php include('right-rental.php')?>
                   
                </div>
            

        
    <?php
        include('decline-modal.php');
    ?>
    <div class="modal fade" id = "schedule-rel" tab-idndex = "-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-cert">&nbsp;<i class = "fa fa-envelope"></i>&nbsp;&nbsp;Finalize Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                            <div class="row">
                                <div class="col my-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><a  disabled><i class ="fa fa-user"></i></a></div>
                                        </div>
                                        <input type="text" class="form-control"  placeholder="Requestor name"readonly>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col my-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><a  disabled><i class ="fa fa-user"></i></a></div>
                                        </div>
                                        <input type="text" class="form-control"  placeholder="Requested Property"readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col my-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><a  disabled><i class ="fa fa-calendar"></i></a></div>
                                        </div>
                                        <input type="text" class="form-control"  placeholder="Scheduled Date" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col my-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><a  disabled><i class ="fa fa-clock"></i></a></div>
                                        </div>
                                        <input type="text" class="form-control"  placeholder="Scheduled Time" readonly>
                                    </div>
                                </div>
                            </div>

                           <div class="row">
                               <div class="ds-5">
                                   Mode of Messaging: 
                               </div>
                           </div>
                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">SMS
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                        <label class="form-check-label" for="flexCheckChecked">E-mail</label>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="modal-footer">
                    
                    <input type = "button" class="btn btn-success" data-bs-dismiss = "modal" onclick = "alert('Message Sent Successfully')" name = "delete" value ="Complete">
                    <input type="button" class="btn btn-secondary   " data-bs-dismiss="modal"  value = "Cancel">
                    </form>

                    </form>


                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id = "delete" tab-idndex = "-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-cert">&nbsp;<i class = "fa fa-trash"></i>&nbsp;&nbsp;Are you sure</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class = "fs-4">You are about to delete a record<br> Click "Yes" if certain?</p>
                </div>
                <div class="modal-footer">
                    <form action = "#" method = "POST">
                    <input type = "button" class="btn btn-success"  name = "delete" value ="Yes">
                    <input type="button" class="btn btn-danger" data-bs-dismiss="modal"  value = "No">
                    

                    </form>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id = "verif-update" tab-idndex = "-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="update-rent">&nbsp;<i class = "fa fa-edit"></i>&nbsp;&nbsp;Are you sure</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class = "fs-4">You are about to update an existing record<br> Click "Yes" if certain?</p>
                </div>
                <div class="modal-footer">
                    <form action = "#" method = "POST">
                    <input type = "button" class="btn btn-success"  data-bs-dismiss = "modal" name = "delete" value ="Yes">
                    <input type="button" class="btn btn-danger" data-bs-dismiss="modal"  value = "No">
                    

                    </form>


                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id = "verif-add" tab-idndex = "-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-cert">&nbsp;<i class = "fa fa-plus"></i>&nbsp;&nbsp;Are you sure</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class = "fs-4">You are about to add new property to existing list<br> Click "Yes" if certain?</p>
                </div>
                <div class="modal-footer">
                    <form action = "#" method = "POST">
                    <input type = "button" class="btn btn-success"  data-bs-dismiss = "modal" name = "delete" value ="Yes">
                    <input type="button" class="btn btn-danger" data-bs-dismiss="modal"  value = "No">
                    

                    </form>


                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="gen-cer"  tabindex="-1">

            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="add-blotter-type"><i class = "fa fa-cog"></i>&nbsp;Rental Record</h5>
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
                                        <input type="text" class="form-control"  placeholder="Requestor name" readonly>
                                    </div>
                                </div>
                            </div>
                            
                        <div class="row">
                            <div class="col-xl-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-file"></i></a></div>
                                    </div>
                                    <!--populate with db kaw na populate hahaha galing db-->
                                    <select class="form-select" aria-label="Default select example" disabled>
                                        <option selected disabled>-Property to rent-</option>
                                        <option value="violence">Basketball Court</option>
                                        <option value="public" >Van</option>
                                        <option value= "#">Library</option>
                                        <option value= "#">Patrol</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 my-1">
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-file"></i></a></div>
                                    </div>
                                    <!--populate with db kaw na populate hahaha galing db-->
                                    <select class="form-select" aria-label="Default select example" disabled>
                                        <option selected disabled>-Reason of Rental-</option>
                                        <option value="violence">For Employment</option>
                                        <option value="public" >For Education</option>
                                        <option value= "vb">For personal reasons</option>
                                        <option value= "vb">Others</option>

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
                                    <input type="text" class="form-control"  placeholder="Requestor Address" readonly>
                                </div>
                            </div>
                        </div>
                        
                     
                        

                        <div class="row">
                            <div class="fs-6">Date</div>
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
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-credit-card"></i></a></div>
                                    </div>
                                    <!--populate with db-->
                                    <select class="form-select" aria-label="Default select example" disabled>
                                        <option selected disabled>Settlement Status</option>
                                        <option value="">Settled</option>
                                        <option value="public" >Unsettled</option>
                                        
                                    </select>
                                
                                </div>
                            </div>
                        </div>

                        <div class="row">
                                <div class="col">
                                    <div class="fs-6">
                                        Schedule
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 my-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><a  disabled><i class ="fa fa-clock"></i></a></div>
                                        </div>
                                        <input type="time" class="form-control"  placeholder="Requestor Address" readonly>
                                    </div>
                                </div>
                            </div>


                    </div>
                <div class="modal-footer">
                     <a  href = "#schedule-rel" role= "button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" >Proceed</a>
                    <input type = "reset" class="btn btn-primary" >
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="edit-record"  tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="add-blotter-type"><i class = "fa fa-edit"></i>&nbsp;Rental Record</h5>
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
                                        <input type="text" class="form-control"  placeholder="Requestor name">
                                    </div>
                                </div>
                            </div>
                            
                        <div class="row">
                            <div class="col-xl-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-file"></i></a></div>
                                    </div>
                                    <!--populate with db kaw na populate hahaha galing db-->
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected disabled>-Property to rent-</option>
                                        <option value="violence">Basketball Court</option>
                                        <option value="public" >Van</option>
                                        <option value= "#">Library</option>
                                        <option value= "#">Patrol</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 my-1">
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-file"></i></a></div>
                                    </div>
                                    <!--populate with db kaw na populate hahaha galing db-->
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected disabled>-Reason of Rental-</option>
                                        <option value="violence">For Employment</option>
                                        <option value="public" >For Education</option>
                                        <option value= "vb">For personal reasons</option>
                                        <option value= "vb">Others</option>

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
                                    <input type="text" class="form-control"  placeholder="Requestor Address">
                                </div>
                            </div>
                        </div>
                        
                     
                        

                        <div class="row">
                            <div class="fs-6">Date</div>
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
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-credit-card"></i></a></div>
                                    </div>
                                    <!--populate with db-->
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected disabled>Settlement Status</option>
                                        <option value="">Settled</option>
                                        <option value="public" >Unsettled</option>
                                        
                                    </select>
                                
                                </div>
                            </div>
                        </div>

                        <div class="row">
                                <div class="col">
                                    <div class="fs-6">
                                        Schedule
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xl-6 my-1">
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

    <div class="modal fade" id="add-walkin-ren"  tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="add-blotter-type"><i class = "fa fa-plus"></i>&nbsp;New Rental Record</h5>
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
                                <div class="col-7 my-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><a  disabled><i class ="fa fa-user"></i></a></div>
                                        </div>
                                        <input type="text" class="form-control"  placeholder="Requestor name">
                                    </div>
                                </div>
                                
                            </div>
                            
                        <div class="row">
                            <div class="col-xl-6 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-address-book"></i></a></div>
                                    </div>
                                    <!--populate with db kaw na populate hahaha galing db-->
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected disabled>-Property to rent-</option>
                                        <option value="violence">Basketball Court</option>
                                        <option value="public" >Van</option>
                                        <option value= "#">Library</option>
                                        <option value= "#">Patrol</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 my-1">
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text"><a  disabled><i class ="fa fa-file"></i></a></div>
                                    </div>
                                    <!--populate with db kaw na populate hahaha galing db-->
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected disabled>-Rental purpose       -</option>
                                        <option value="violence">Medical</option>
                                        <option value="public" >Educational</option>
                                        <option value= "vb">Entertainment</option>
                                        <option value= "vb">Recreational</option>
                                        <option value= "vb">Others</option>

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
                                        <input type="text" class="form-control"  placeholder="Requestor Address">
                                    </div>
                                </div>
                            </div>
                            
                        
                                <div class="row">
                                    <div class="fs-6">Date</div>
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
                                            <option selected disabled>Rental Status</option>
                                            <option value="">Settled</option>
                                            <option value="public" >Unsettled</option>
                                            
                                        </select>
                                    
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="fs-6">
                                        Schedule
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 my-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><a  disabled><i class ="fa fa-clock"></i></a></div>
                                        </div>
                                        <input type="time" class="form-control"  placeholder="Requestor Address">
                                    </div>
                                </div>
                                <div class="col-xl-6 my-1">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><a  disabled><i class ="fa fa-credit-card"></i></a></div>
                                        </div>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected disabled>Settlement Status</option>
                                            <option value="violence">Settled</option>
                                            <option value="public" >Unsettled</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                <div class="modal-footer">
                     <a  href = "#verif-add" role= "button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" >Save</a>
                    <input type = "reset" class="btn btn-primary" >
                    </form>
                </div>
            </div>
        </div>
    </div>

  
</html>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>