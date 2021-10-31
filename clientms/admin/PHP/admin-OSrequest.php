<?php
    $curr = "Service Requests";
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
</head>
<body>
    <?php include('../includes/sidebar.php');
    ?>
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
            <div class="container-fluid mb-2">
                        <div class = "row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                
                            </div>
                            <div class="col-md-4 mt-2 mx-0">

                                <div class ="nav justify-content-end mx-0">
                            
                                    <div class="btn-group" role="group">
                                        <a href = "others-records.php"  class="btn btn-primary mx-1 my-1"><i class="fa fa-list"></i>&nbsp; Records</a>
                                    </div>


                                 </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-xl-5">

                            </div>
                            <div class = "col-xl-7">
                                <form class ="d-flex justify-content-end">
                                    <input type = "text" class = "form-control border border-success"  id = "search-form" placeholder = "Search  here" >
                                    <a href = "#" class = "a btn btn-success"data-bs-toggle="tooltip" data-bs-placement="top" title="Search"><i class = "fa fa-search" ></i></a>
                                </form>                            
                            </div>
                </div>
            </div>
        
            <div class="container-fluid">
                    <div class = "row">
                        <div class="col">
                            <table class = "table">
                                <thead style= "background:#021f4e">
                                    <tr>
                                        <td colspan = 6 class = "" style = "color: white" align = "center">Other Services Requests</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class = "light">
                                        <th class = "">
                                            Requestor Name
                                        </th>
                                        <th class = "">
                                            Requested Service
                                        </th>
                                        <th class = "">
                                            Service fee
                                        </th>
                                        
                                        <th class = "">
                                            Purpose
                                        </th>
                                        <th class = "">
                                            Date Submitted
                                        </th>
                                    
                                        <th class = "" >
                                            Action
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class = "">
                                            <a href = "#" class = "link-primary"> Abel Tesfeye</a>
                                        </td>
                                        <td class = "">
                                            Illegal Drugs Awareness Seminar 
                                        </td>
                                        <td class = "">
                                            0.00 ₱
                                        </td>

                                        <td class = "">
                                            Employment
                                        </td>
                                        <td class = "">
                                            07-11-2017
                                        </td>
                                                
                            
                                        <td>
                                            <div class = "actions" align = "center">
                                                    <a href="#approve" class="btn btn-primary text-decoration-none my-1" data-bs-toggle = "modal" data-bs-dismiss= "modal"  onclick = "alert('Proof of payment inquiry sent')"role = "button"><i class = "fa fa-edit"></i>&nbsp;<span id = "label">Approve</span></a>
                                        
                                                    <a href="#decline" class="btn btn-danger text-decoration-none my-1" data-bs-toggle="modal" role = "button"><i class ="fa fa-trash"></i>&nbsp;Decline</a>
                                            </div>
                                                                                    
                                        </td>
                                    </tr>
                                </tbody>
                            </table>                           
                        </div>
                    </div>
                </div>

        <!--modal-->
        <?php include ('decline-modal.php')?>

        <div class="modal fade" id = "approve" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title" id="delete-cert">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body px-5">
                        <p class = "fs-4">Request Accepted, Check records tab to continue<br></p>
                    </div>
                    <div class="modal-footer bg-success">
                        <form method = "POST" action = "#">
                            <input type = "button" class="btn btn-success" data-bs-dismiss = "modal"  name = "yes" value ="Got it">
                            
                        </form>


                    </div>
                </div>
            </div>
        </div>

        
</body>
</html>