<?php 
    $curr ="Certification Requests";
    session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid'] == 0)) {
    header('location:logout.php');
} else {
    $aid = $_SESSION['clientmsaid'];
    $sqls = "Select tbladmin.*, tblresident.*, tblpositions.* from tblresident join tbladmin on tbladmin.residentID = tblresident.ID join tblpositions on tblpositions.ID = tbladmin.BarangayPosition WHERE tbladmin.ID = :aid";
        $querys=$dbh->prepare($sqls);
        $querys->bindParam(':aid', $aid, PDO::PARAM_STR);
        $querys->execute();
        $results=$querys->fetchAll(PDO::FETCH_OBJ);
        foreach ($results as $rows) {$getpos = "$rows->Position $rows->LastName";}
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
        $('#reqc').DataTable();
    } );
    </script>
    
    <link rel = "stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../CSS/scrollbar.css">

	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
        table,td,tr,th{
            border: 1px solid #d3d3d3;
          
            font-family: 'Noto Sans Display', sans-serif;
            
        }
        
        td{
            vertical-align: middle;
     
        }
        
        .black{
          color: black;
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
        
        .btnx{
          width: 150px;
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
                                <div class="flex-sm-fill  text-sm-left py-1 fs-5 " aria-current="page" >
                                    <i class= "fa fa-exclamation-circle me-2"></i>Certification Request</div>
                            </div>
        

                        </div>
                        
                    </div>
                    <?php 
                                                    $sql = "Select tblcreatecertificate.ID as getID, tblcreatecertificate.*, tblresident.*, tblcertificate.*, tblpurposes.* from tblcreatecertificate join tblresident on tblcreatecertificate.Userid = tblresident.ID join tblcertificate on tblcertificate.ID = tblcreatecertificate.CertificateId join tblpurposes on tblpurposes.ID = tblcreatecertificate.purpID where tblcreatecertificate.status = 1 order by tblcreatecertificate.resDate ASC";
                                                    $result = mysqli_query($con, $sql);  
?>
                    <form method="POST">
                        <div class="row g-0 border bg-white border-start border-end border-bottom " >
                                <div class="col px-5 py-3" style= "overflow-x:auto;" >
                                
                                        <table class="table bg-white table-hover table-bordered" id = "reqc" style= "min-width: 1000px;"> 
                                            <thead class = "bg-light">
                                            
                                                <tr>
                    

                                                    <th style = "text-align: left">Requestor Name</th>
                                                    <th style = "text-align: left">Requested Certificate</th>
                                                    <th style = "text-align: left">Purpose </th>
                                                    <th style = "text-align: left">Business Name </th>
                                                    <th style = "text-align: left">Date </th>
                                                    <th style = "text-align: center">Actions</th>
                                                    
                                                    
                                        
                                                </tr>
                                            
                                            </thead>           
                                            <tbody class= "table-hover">
                                                <?php
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $cdate = $row["resDate"];
                                                        $purp = $row["purpID"];
                                                        if ($purp == "13" ){
                                                            $purp = $row["other"];
                                                            $purp = strtoupper($purp);
                                                        }else{
                                                            $purp = $row["Purpose"];
                                                        }

                                                        echo '
                                                    <tr>
                                                        <td scope="col" style = "text-align: left">' . $row["LastName"] . ', ' . $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["Suffix"] . '</td>
                                                        <td scope="col" style = "text-align: left">' . $row["CertificateName"] . '</td>
                                                        <td scope="col" style = "text-align: right">' . $purp . '</td>
                                                        <td scope="col" style = "text-align: right">' . $row["bName"] . '</td>
                                                        <td scope="col" style = "text-align: left">' . date('F j Y - h:i A', strtotime($cdate)) . '</td>
                                                        <td scope="col" id = "disa" style = "text-align: center:width: 30%;">
                                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                                <a type="" href ="edit-cert-request.php?editid=' . $row["getID"] . '"class="btn btnx btn-primary"><i class = "fa fa-edit mx-1"></i><span class="wal">Manage</span></a>
                                                                            </div></td></tr>';
                                                    }
                                                ?>
                                            </tbody>
                                        </table>                        
                                    </div>   
                                </div>
                            </form>
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
                                        <label for="ars">Requested Certificate</label>
                                        <input id = "crs" type="text" class="form-control" value = "Employement" readonly>
                   
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Amount to pay</label>
                                        <div class="input-group">
                                            <button class="btn btn-secondary disabled">
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
                                <div class="row">                                    
                                    <div class="col-md-12">
                                        <div class="float-end">
                                            <div class="btn-group">
                                        <button href ="#" type = "button" class="btn btn-success" data-bs-dismiss ="modal" onclick = "alert('Approval Message Sent')" >
                                            <i class= 'fa fa-paper-plane py-1 me-2'></i>Send
                                        </button>
                                        </div>
                                        <div class="btn-group">
                                        <button type = "button" class="btn btn-danger " data-bs-dismiss = "modal"  name = "no" value ="No">
                                            <i class= "fa fa-times me-2"></i>Discard
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
    function showOthers(divId, element) {
        document.getElementById(divId).style.display = element.value == 'others' ? 'flex' : 'none';
    }
    function showOthersdec(divId, element) {
        document.getElementById(divId).style.display = element.value == 'others' ? 'flex' : 'none';
    }
</script>
 
</body>
</html>
<?php } ?>