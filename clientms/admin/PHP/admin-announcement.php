<?php
session_start();
error_reporting(0);
$curr = "Announcements";
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');    
  } else{

  
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
    
        .pab{
            
            position: absolute;
            top: 120px;
            right: 5px;
            margin: 20px;
        }
        .white{
            color: white;
        }
        .row{
            overflow-y:
        }
        .divfortable{
            background-color: white;
            overflow-x:auto;
        }
        .btn{
            z-index: 2;
        }
      
        @media (max-width:576px) {
                .banner {
                    display: none;
                }

                .right {
                    margin-left: 5%;
                }

                .dis {
                    display: flex;
                }
        }
        @media screen and (max-width: 900px) {
    h5.testfont {
      font-size: 20px;
    }
    h1.h1font{
      font-size: 25px;   
    }
    h3.testfont{
        font-size: 10px;
    }
    h2.testfont{
        font-size: 15px;
    }
    h4.testfont{
        font-size: 12px;
    }
    h1.testfont{
        font-size: 10px; 
    }
    span.anothertestfont{
        font-size: 20px;
    }
    select.dropdownstyle{
        width: 100px;
        height: 30px;
        overflow-y: hidden;
    }
    select.dropdownstyle option{
        width: 100px;
        height: 20px;
        overflow-y: hidden;
    }
    td.pricefont{
        font-size: 10px;
    }
    
    
  }



  @media screen and (min-width: 601px) {
    h5.testfont {
      font-size: 30px;
    }
    h1.h1font{
      font-size: 35px;   
    }
    h3.testfont{
        font-size: 15px;
    }
    h2.testfont{
        font-size: 20px;
    
    }
    h4.testfont{
        font-size: 18px;
    }
    h1.testfont{
        font-size: 20px; 
    }
    span.anothertestfont{
        font-size: 25px;
    }
    select.dropdownstyle{

        width: 300px;
        height: 40px;
    }
    select.dropdownstyle option{

        width: 3000px;
        height: 40px;
    }
    td.pricefont{
        font-size: 20px;
    }
    

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
                              
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-bullhorn text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>

    <div class="float-end pab position-fixed" style= "opacity:100%; z-index: 100;" data-bs-toggle="tooltip" data-bs-placement="top" title ="Create announcement" >
                <button class="btn btn-primary fs-5 text-align-center   rounded-circle" data-bs-toggle= "modal" role= "button"href = "#create-ann" style= "padding: 10px;">
                    <i class= "fa fa-bullhorn me-2 fs-5 " ></i>
                </button>
    </div>

    
    <div class="container-fluid px-4">
                        <?php 
							$sql ="SELECT distinct tblannouncement.ID, tblannouncement.announcement, tblannouncement.announcementDate, tblannouncement.endDate, tblannouncement.adminID, tbladmin.BarangayPosition, tblresident.LastName from tblannouncement join tbladmin on tblannouncement.adminID = tbladmin.ID join tblresident on tbladmin.ID = tblresident.ID order by tblannouncement.ID Desc";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							foreach($results as $row)
							{ 
                                echo '     <div class="row">
                                <div class="col-md-12">
                                    <div class="float-end">
                                        <div class="btn-group" role="group">
                                            <button type= "button" href = "#edit-ann" data-bs-toggle = "modal"  class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-edit"></i>&nbsp;Edit </a>
                                    </div>
                                    <div class="btn-group" role="group">
                                    <button type= "button" href = "#delete-ann" data-bs-toggle= "modal" class="btn btn-outline-danger mx-1 my-1"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                    </div>
    
                                    </div>
                                </div>
                            </div>';
                                echo "
                                <div class = 'mb-3 table-responsive' style='background-color:aliceblue;border:1px solid black;  border-radius:4px; overflow: hidden;'>
                                <h1 class='testfont' style='float: left; margin:25px;color: #021f4e;'>Announcement</h1>";
								$sDate = $row->announcementDate;
								$eDate = $row->endDate;
                                
    
						?>
                   
                        <h3 class="testfont" style="float: right; font-family: Segoe UI; margin: 25px; color: #021f4e; text-align: justify;">
                            <?php  echo date('l, j F Y - h:i A', strtotime($sDate));?> <br> 
                        </h4>
                        <br><br><br><br>
                        <div class="testulit" style="border-radius: 25px; ">
                            <h5 class="testfont" style="text-align: justify; margin:25px; text-indent: 5%;"><?php  echo $row->announcement;?> </h5>
                        </div>
                        <h3 class="testfont" style="margin: 25px; color: #021f4e;">Announced By:</h3>
                        <h2 class="testfont" style="margin: 25px; color: #021f4e;"><?php  echo $row->BarangayPosition;?> <?php  echo $row->LastName;
                        echo "</h2></div>";    
                        }
                        
                        ?>
                       </div>










<?php } ?>





    <div class="modal fade" id = "create-ann" tab-idndex = "-1">
        <form action="">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content g-0 bg-success ">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title white" id="delete" >&nbsp;<i class = "fa fa-bullhorn "></i>&nbsp;&nbsp;Address the residence</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                     
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for = "sdate" class= "fs-5 fw-bold">Starting date</label>
                                <input type="datetime-local" class="form-control" id = "sdate" placeholder = "Date of start" >
                            </div>
                            <div class="col-md-6">
                                <label for = "edate" class= "fs-5 fw-bold">Ending date</label>
                                <input type="datetime-local" class="form-control" id = "edate">
                            </div>
                  
                        </div>
                        <div class="row g-2 pt-3 pb-1">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="announcement" placeholder="name@example.com">
                 
                            </div>
                        </div>
                        <div class="row g-2 py-1 pb-2">
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Attach a file here <span class= "fs-6 text-muted">(e.g social amelioration forms, registration forms,posters etc...)</span></label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file">
                            </div>
                        </div>
                        <div class="row mt-2">
                                    <label for="remarks" >Send Message to other media: <i class= "fa fa-envelope"></i></label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="sms">
                                            <label class="form-check-label fs-5" for="sms">
                                                SMS
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="em" >
                                            <label class="form-check-label fs-5" for="em">
                                                E-mail
                                            </label>
                                          
                                        </div>

                                    </div>
                                    
                        </div>
                        <div class="row justify-content-center" align = "center">
                            <div class="col-xl-6">
                            <button type = "button" class="btn btn-success" data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                    <i class= 'fa fa-paper-plane me-2'></i>Deploy
                                </button>
                                <button type = "reset" class="btn btn-danger">
                                    <i class= "fa fa-redo-alt me-2"></i>Clear
                                </button>

                            </div>
                                
                        
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
            </form>
        </div>
        <div class="modal fade" id = "edit-ann" tab-idndex = "-1">
        <form action="">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content g-0 bg-primary ">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title white" id="delete" >&nbsp;<i class = "fa fa-edit "></i>&nbsp;&nbsp;Address the residence</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                     
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for = "sdate" class= "fs-5 fw-bold">Starting date</label>
                                <input type="datetime-local" class="form-control" id = "sdate" placeholder = "Date of start" >
                            </div>
                            <div class="col-md-6">
                                <label for = "edate" class= "fs-5 fw-bold">Ending date</label>
                                <input type="datetime-local" class="form-control" id = "edate">
                            </div>
                  
                        </div>
                        <div class="row g-2 pt-3 pb-1">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="edit-announcement" placeholder="name@example.com">
                 
                            </div>
                        </div>
                        <div class="row g-2 py-1 pb-2">
                            <div class="mb-3">
                                <a href= "#"class= "link link-primary"><i class= "fa fa-download me-2"></i>Attached File here</a>
                            </div>
                        </div>
                        <div class="row mt-2">
                                    <label for="remarks" >Send Message to other media: <i class= "fa fa-envelope"></i></label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="sms">
                                            <label class="form-check-label fs-5" for="sms">
                                                SMS
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="em" >
                                            <label class="form-check-label fs-5" for="em">
                                                E-mail
                                            </label>
                                          
                                        </div>

                                    </div>
                                    
                        </div>
                        <div class="row justify-content-center" align = "center">
                            <div class="col-xl-6">
                            <button type = "button" class="btn btn-success" data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                    <i class= 'fa fa-paper-plane me-2'></i>Deploy
                                </button>
                                <button type = "reset" class="btn btn-danger">
                                    <i class= "fa fa-redo-alt me-2"></i>Clear
                                </button>

                            </div>
                                
                        
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
            </form>
        </div>

       

        <div class="modal fade" id = "delete-ann" tab-idndex = "-1">
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
                            <p class = "fs-4 text-center">You are about to delete an existing announcement, do you wish to continue?<br><span class="text-muted fs-6">*Select (<i class = "fa fa-check">)</i> if certain</span></p>
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
<script src= "../ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('announcement');
    CKEDITOR.replace('edit-announcement');

</script>
<script>
    
    var today  = new Date();
    var mm = today.getMonth()+1;
    var yy = today.getFullYear();
    var dd = today.getDate();
    var hr = today.getHours();
    var min = today.getMinutes();
    if (mm<10){
        mm = '0' + mm;
    }
    if(dd<10){
        dd = '0' +dd;
    }
    if (hr<10){
        mm = '0' + hr;
    }
    if(min<10){
        dd = '0' +min;
    }
    

    
    var sdate= mm+'/'+dd+'/'+ yy +' - ' + hr + ':' + min;
    document.getElementById('sdate').value = sdate;
    
</script>


</body>
</html>