<?php
    $curr = "Certificate Requests";
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

    <link rel="stylesheet" href="../CSS/sidebar.css" />
    <link rel = "stylesheet" href = "../CSS/table.css"/>
    <link rel = "stylesheet" href = "../CSS/scrollbar.css">
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">
</head>
<body>
    <?php include('../includes/sidebar.php');
    ?>
        <div class="container mx-5">
                <nav aria-label="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-book text-muted"></i></a>&nbsp;Requests</li>
                            <li class="breadcrumb-item active"><a href="#"><i class="fa fa-list text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                        </ol>
                    </nav>
                </nav>
            </div>


            <div class="container-fluid mb-2">
                        <div class = "row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                
                            </div>
                            <div class="col-md-4 mt-2 mx-0">

                                <div class ="nav justify-content-end mx-0">
                            
                                    <div class="btn-group" role="group">
                                        <a href = "certification-records.php"  class="btn btn-primary mx-1 my-1"><i class="fa fa-list"></i>&nbsp; Records</a>
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
                                        <td colspan = 6 class = "" style = "color: white" align = "center">Certification Requests</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class = "light">
                                        <th class = "">
                                            Requestor Name
                                        </th>
                                        <th class = "">
                                            Requested Certificate
                                        </th>
                                        <th class = "">
                                            Certification fee
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
                                            Barangay Clearance  
                                        </td>
                                        <td class = "">
                                            20.00 ₱
                                        </td>

                                        <td class = "">
                                            Employment
                                        </td>
                                        <td class = "">
                                            07-11-2017
                                        </td>
                                                
                            
                                        <td>
                                            <div class = "actions" align = "center">
                                                    <a href="#approve" class="btn btn-primary text-decoration-none my-1" data-bs-toggle = "modal" data-bs-dismiss= "modal"  onclick = "alert('Proof of payment inquiry sent')" role = "button"><i class = "fa fa-edit"></i>&nbsp;<span id = "label">Approve</span></a>
                                        
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