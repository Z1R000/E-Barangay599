<?php 
    session_start();
    error_reporting(1);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
    header('location:logout.php');
    }else{
        $curr ="Rental Requests";
        
        


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
        $('#reqr').DataTable();
    } );
    </script>
    <link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
   
        
        td{
            vertical-align: middle;
     
        }
        .btng{
            width: 100px;
        }
        .black{
          color: black;
        }
        .btnx{
          width: 150px;
        }

        #frame { 
          width: 850px; 
          height: 650px; 
          border: 1px solid black; 
        }
        #frame { 
          zoom: -100%;
          -webkit-transform:scale(0.76);
        
          -ms-transform: scale(0.75);
          -moz-transform: scale(0.75);
          -o-transform: scale(0.75);
          -webkit-transform: scale(0.75);
          transform: scale(0.75);

          -ms-transform-origin: 0 0;
          -moz-transform-origin: 0 0;
          -o-transform-origin: 0 0;
          -webkit-transform-origin: 0 0;
          transform-origin: 0 0;
        }
        
     
 
   
    
        @media screen and (-webkit-min-device-pixel-ratio:0) {
          #scaled-frame {
            zoom: 1;
          }
        }

        @media (max-width: 576px){
            .btnx{
              margin-bottom: 10px;
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
        .red{
            background:#8B0000;
            border: 1px solid #8B0000;
        }
        .white{
            color: white;
        }
    


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
                <div class="container  mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a  class= "text-decoration-none text-muted" href=""></a><i class="fa fa-book text-muted"></i>&nbsp;Requests</li>
                               
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-exclamation-circle  text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid p-3 ">
        <div class="row g-0 px-5 ">
        <div class="row g-0">
            <div class="row gx-4 gy-2 ">
                <div class="mx-auto col-xl-12 ">
                    <div class="row g-0  rounded-top border white border-start border-end border-bottom border-secondary" style= "background: #021f4e">
                        <div class="col-xl-5  px-2  ">
                            <div class="row ">
                                <div class="flex-sm-fill  text-sm-left  py-2 fs-5 " aria-current="page" >
                                    <i class= "fa fa-exclamation-circle me-2"></i>Rental Request</div>
                            </div>
        

                        </div>
                        
                    </div>
                    <div class="row g-0 border bg-white border-start border-end border-bottom " >
                      
                        <div class="row g-0">
                            <div class="col-xl-12 px-5 mx-2  mx-auto py-3  px-2" style= "overflow-x:auto;">
                                    <table class="table bg-white table-hover table-bordered " id = "reqr" style= "min-width:1000px"> 
                                        <thead class = "bg-light">
                                            
                                            <tr>
                                                <th style = "text-align: left">Requestor Name</th>
                                                <th style = "text-align: left">Requested Property</th>
                                                <th style = "text-align: left">Rental Fee(₱)</th>
                                                <th style = "text-align: left">Purpose </th>
                                               
                                                <th style = "text-align: left">Date </th>
                                                <th style = "text-align: center">Actions</th>
                                                
                                                
                                    
                                            </tr>
                                        
                                        </thead>           
                                        <tbody class= "table-hover">
                                          
                                                <?php
                                                    $sql = "Select tblcreaterental.ID as rid, tblresident.FirstName, tblresident.LastName,tblresident.MiddleName, tblresident.Suffix, tblcreaterental.status, tblcreaterental.rentalStartDate, tblcreaterental.rentalEndDate, tblcreaterental.creationDate, tblpurposes.Purpose, tblrental.rentalName, tblrental.rentalPrice, tblcreaterental.payable from tblcreaterental join tblresident on tblresident.ID = tblcreaterental.userID join tblrental on tblrental.ID = tblcreaterental.rentalID join tblpurposes on tblpurposes.ID = tblcreaterental.purpID where tblcreaterental.status = 1 order by tblcreaterental.creationDate ASC";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);    
                                                    foreach($results as $rows){
                                                        echo '
                                                        <tr>
                                                            <td scope="col" style = "text-align: left">'.$rows->LastName.",".$rows->FirstName." ".$rows->MiddleName." ".$rows->Suffix.'</td>
                                                            <td scope="col" style = "text-align: left">'.$rows->rentalName.'</td>
                                         
                            
                                                
                                                            <td scope="col" style = "text-align: right">'.$rows->payable.'</td>
                                                            <td scope="col" style = "text-align: left">'.$rows->Purpose.'</td>
                                                            <td scope="col" style = "text-align: left">'.date('F j, Y - h:i A', strtotime($rows->creationDate)) .'</td>
                                                            <td scope="col" style = "text-align: center">
                                                                   
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="" href="edit-rental-request.php?editid='.$rows->rid.'" class="btn btng btn-primary"><i class="fa fa-edit"></i> Manage</a>
                                                                    </div>
                                                                 
                                                                
                                                            </td>
                                                        </tr>
                                                        
                                                        ';
                                                    }
                                            
                                                
                                                ?>
                  
                                                
                                          
                                          
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

    </div>
    <div class="modal fade" id = "approve-req" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-success ">
                    <div class="modal-header bg-success  ">
                        <div class="modal-title white">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Request Accepted Message</div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        
                        <div class="row mt-2 ms-2 me-3">
                            <form action="" method = "POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="dname">Requestor Name</label>
                                        <input id = "dname" type="text" class="form-control" value = "Juan Dela Cruz" readonly>

                                    </div>
                           
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="contac">Contact Number</label>
                                        <input id = "contac" type="text" class="form-control" value = "09123456789" readonly>
                   
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Email Address</label>
                                        <input id = "emails" type="text" class="form-control" value = "juanDelaC@gmail.com" readonly>
                                        
                                    
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="ars">Requested Property</label>
                                        <input id = "crs" type="text" class="form-control" value = "Basketball Court" readonly>
                   
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Amount to pay</label>
                                        <div class="input-group">
                                        <button class="btn btn-secondary">
                                        ₱
                                        </button>
                                 
                                        <input id = "emails" type="text" class="form-control" value = "40 " readonly style= "text-align:right;">
                                        </div>
                                    
                                    </div>
                                </div>
                                <div class="row mt-2">
                                        <label for="remarks" >Remarks</label>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;resize: none;"></textarea>
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
                                            <input class="form-check-input" type="checkbox" value="" id="em">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                E-mail
                                            </label>
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                                          
                                        </div>

                                    </div>
                                    
                                </div>
                                <div class="row justify-content-center" align = "center">
                                    
                                <div class="col-md-12">
                                        <div class="float-end">
                                            <div class="btn-group">
                                        <button href ="" onclick = "alert('Decline Message Sent')" type = "button" class="btn btn-success " data-bs-dismiss ="modal" data-bs-toggle= "modal" >
                                            <i class= 'fa fa-paper-plane py-1 me-2'></i>Send
                                        </button>
                                        </div>
                                        <div class="btn-group">

                                        
                                        <button type = "button" class="btn btn-danger " data-bs-dismiss = "modal"  name = "no" value ="No">
                                            <i class= "fa fa-times me-2"></i> Discard
                                        </button>
                                        </div>
                                        </div>
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


        <div class="modal fade" id = "decline-req" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger ">
                    <div class="modal-header bg-danger bg-transparent ">
                        <div class="modal-title text-white" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Declining request?</div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row mt-2 me-3 ms-2">
                            <form action="" method = "POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="dname">Requestor Name</label>
                                        <input id = "dname" type="text" class="form-control" value = "Juan Dela Cruz" readonly>

                                    </div>
                           
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="contac">Contact Number</label>
                                        <input id = "contac" type="text" class="form-control" value = "09123456789" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Email Address</label>
                                        <input id = "emails" type="text" class="form-control" value = "juanDelaC@gmail.com" readonly>
                                        
                                    
                                    </div>
                                    <div class="col-md-12">
                                        <label for="decreason" >Decline Reason</label>
                                        <select name="" id="decreason" class= "form-select" onclick = "showOthersdec('other_txt-dec',this)">
                                            <option value="">Insufficient payment</option>
                                            <option value="">Invalid proof sent</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-0 my-2" id = "other_txt-dec" style= "display:none;">
                                 
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder= "Specify a reason here">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                        <label for="remarks" >Remarks</label>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;resize: none;"></textarea>
                                            <label for="floatingTextarea2">Remarks here (max 10 words)</label>
                                                
                                            </div>
                                        </div>
                                   
                                </div>
                                <div class="row mt-2">
                                    <label for="remarks" >Mode of delivery <i class= "fa fa-envelope"></i></label>
                                    <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    SMS
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    E-mail
                                                </label>  
                                            </div>
                                    </div>
                                    
                                </div>
                                <div class="row justify-content-center" align = "center">
                                    
                                <div class="col-md-12">
                                        <div class="float-end">
                                            <div class="btn-group">
                                        <button href ="" onclick = "alert('Decline Message Sent')" type = "button" class="btn btn-success " data-bs-dismiss ="modal" data-bs-toggle= "modal" >
                                            <i class= 'fa fa-paper-plane py-1 me-2'></i>Send
                                        </button>
                                        </div>
                                        <div class="btn-group">

                                        
                                        <button type = "button" class="btn btn-danger " data-bs-dismiss = "modal"  name = "no" value ="No">
                                            <i class= "fa fa-times me-2"></i> Discard
                                        </button>
                                        </div>
                                        </div>
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

 
 
 
</body>
</html>
<?php } ?>