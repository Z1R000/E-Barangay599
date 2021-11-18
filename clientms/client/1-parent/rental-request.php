<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid'] == 0)) {
    header('location:logout.php');
} else {
    $time = new DateTime("now", new DateTimeZone('Asia/Manila'));
    $send = "0.00";
    $sql = 'SELECT * FROM tblpurposes where serviceType = "2"';
    $query= $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    $opt = "<option  selected disabled>Purposes</option>";
    foreach($results as $row){
        $opt .= '<option  value ="'.$row->ID.'" >'.$row->Purpose.'</option>';
       
    }


    $sql = 'SELECT * FROM tblmodes';
    $query= $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $mod = '<option  selected disabled>Mode of payment</option>';

    foreach($results as $row){
        $mod .= '<option  value ="'.$row->ID.'" >'.$row->mode.'</option>';
    }

    if (isset($_POST['request'])){
        if (!isset($_POST['rtype'])||
            !isset($_POST['rprice'])||
            !isset($_POST['startDur'])||
            !isset($_POST['startDur'])||
            !isset($_POST['endDur'])||
            !isset($_POST['modeofp'])||
            !isset($_POST['purpose'])){
                header("Location: rental-request.php?request=failed");
        }else{
            
                
            $user = $_SESSION['clientmsuid'];
            $prop = $_POST['rtype'];
            $rate = $_POST['rprice'];
            $s = $_POST['startDur'];
            $e = $_POST['endDur'];
            $start =  date('Y-m-d  H:i', strtotime($s));
            $end =  date('Y-m-d H:i', strtotime($e));
            $mod = $_POST['modeofp'];
            $purp = $_POST['purpose'];


            $start1 = new DateTime($_POST['startDur']);
            $end2 = new DateTime($_POST['endDur']);
            $diff = $end2->diff($start1);
        

            $d = $diff->format('%d');
            $h = $diff->format('%h');
            $i = $diff->format('%i');
        
            $crono = 0;
            $pay = 0;
            if ($d>0){
                $putal = (float)(($i/60) *$rate);
                $crono = (float)(($d*24)+ ($h*1));
                $pay = (float)(($rate*$crono)+$putal);
                
            }
            else if ($h>0){
                $putal = (float)(($i/60) *$rate);
                $crono = (float)($h*1);
                $pay = (float)(($rate*$crono)+$putal);
            }
            else{
                $pay=  (float)($i/60)*($rate);
            }
        
            $send =  number_format((float)$pay,2,'.','');
            $others = $_POST['others'];


            echo $user."</br>";
            echo $prop."</br>";
            echo $rate."</br>";
            echo $user."</br>";
            echo $start."</br>";
            echo $end."</br>";
            echo $send."</br>";
            echo $mod."</br>";
            echo $purp."</br>";
    

            $sql= '';
            if ($_POST['others']!=""){
                $sql = 'Insert into tblcreaterental(status,userID,rentalID,adminID,rentalStartDate,rentalEndDate,modeOfPayment,purpID,others)values(1,'.$user.','.$prop.',0,"'.$start.'","'.$end.'",'.$mod.','.$purp.',"'.$others.'")';
                $add = 'Insert into tblpaymentlogs()';
               
            
            }
            else{
                $sql = 'Insert into tblcreaterental(status,userID,rentalID,adminID,rentalStartDate,rentalEndDate,modeOfPayment,purpID,payable) values (1,'.$user.','.$prop.',0,"'.$start.'","'.$end.'",'.$mod.','.$purp.','.$send.')';
            }
            echo $sql;
            if ($con->query($sql)===TRUE){
                header("Location: rental-request.php?request=sent&topay=".$send."&h=".$h."&d=".$d."&m=".$i."&rate=".$rate."");
            }
            else{
                header("Location: rental-request.php?request=failed");
            }
        }
        
    }
        

?>
<script>function checkDate() {
   var st = document.getElementById('startDur').value;
   var et = document.getElementById('endDur').value;
   var sd = new Date(st);
   var ed = new Date(et);
   var now = new Date();
   
   if (ed < sd) {
      alert("Date must be in the future of start date");
      $('#endDur').val('');
    }
 }</script>

    <!DOCTYPE html>
    <html lang="en">

    <head>
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
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


        <link rel="stylesheet" href="css/sidebar.css" />

        <link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

        <title>Rental Request</title>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelectorAll('.sidebar .nav-link').forEach(function(element) {
                    element.addEventListener('click', function(e) {
                        let nextEl = element.nextElementSibling;
                        let parentEl = element.parentElement;

                        if (nextEl) {
                            e.preventDefault();
                            let mycollapse = new bootstrap.Collapse(nextEl);

                            if (nextEl.classList.contains('show')) {
                                mycollapse.hide();
                            } else {
                                mycollapse.show();
                                // find other submenus with class=show
                                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                                // if it exists, then close all of them
                                if (opened_submenu) {
                                    new bootstrap.Collapse(opened_submenu);
                                }
                            }
                        }
                    }); // addEventListener
                }) // forEach
            });
        </script>


        <style type="text/css">
            .sidebar li .submenu {
                list-style: none;
                margin: 0;
                padding: 0;
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .box {
                padding: 10px;
                display: none;
                margin: 10px;
            }

            .text-inner {
                color: white;
            }

            .logo {
                color: #d3d3d3;
            }

            .left {
                margin-right: 1%;
            }

            .minor {
                background: #ff8c00;
            }

            .right {
                margin: 13.5%;
            }

            .voters {
                background: #008080;
            }

            .officials {
                background: #004242;
            }

            .dis {
                display: none;
            }

            @media (max-width:576px) {
                .banner {
                    display: none;
                }

                .right {
                    margin-left: 8%;
                }

                .dis {
                    display: flex;
                }
            }

            
        </style>

    </head>

    <body>


        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <?php include_once('includes/sidebarupdated.php');     ?>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
            <?php
                    $sql1 = "select * from tblinformation";
                    $query1 = $dbh->prepare($sql1);
                    $query1->execute();
                    $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                    if ($query1->rowCount() > 0) {
                        foreach ($results1 as $row1) {
                ?>
            <div class="container-fluid banner" align="center">
                <div class="row">
                    <div class="col-xl-3 px-1 ">
                        <div class="float-start" style="margin-left:50px;">
                            <img src="<?php echo $row1->Blogoone;?>" style="width: 100px;">
                        </div>

                    </div>
                    <div class="col-xl-6 " align="center">
                        <h3 class="py-4"><?php echo $row1->Baddress;?> <br>
                        <?php echo $row1->Btitle;?></h3>
                    </div>
                    <div class="col-xl-3">
                        <div class="float-end" style="margin-right:50px;">
                            <img src="<?php echo $row1->Blogotwo;?>" style="width: 100px;">
                        </div>


                    </div>
                </div>

            </div>
            <?php }}?>
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-align-justify secondary-text fs-4 me-3" id="menu-toggle"></i>
                        <h2 class="fs-2 m-0">Rental Request</h2>

                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                </nav>
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0" style="text-indent: 15px; margin-left: 2.5%;">
                        <li><a href="dashboard.php">Home</a></li>/
                        <li class="active">Request</li>/
                        <li class="active">Rental Request</li>
                    </ol>
                </div>
                        
            <div class="container-fluid">
                <?php
                    if ($_GET['request']=="sent"){
                        echo'
                        
                        <div class="row px-5">
                        <div class="alert alert-success alert-dismissible fade show " id = "alert" role="alert">
                            <strong><i class="fa fa-check-circle mx-2"></i>Rental Request Sent</strong> See breakdown <a href = "breakdown.php?total='.$_GET['topay'].'&h='.$_GET['h'].'&m='.$_GET['m'].'&d='.$_GET['d'].'&r='.$_GET['rate'].'" > here</a> of payment.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                                
                        
                        ';
                    }
                    if($_GET['request']=="failed"){
                        echo '<div class="row px-5">
                        <div class="alert alert-warning alert-dismissible fade show " id = "alert" role="alert">
                            <strong><i class="fa fa-exclamation-triangle mx-2"></i>Rental Request failed </strong>do check your inputs and supply the fields appropriately.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';

                    }
                
                
                
                
                ?>
                 
        
    
            </div>
            <form method = "POST">
                <div class="container-fluid px-2">
                    
           
                       <div class="row justify-content-center">
                           <div class="col-xl-11 px-3 py-2 ">
                          
                                    <div class="row text-white rounded-top" style= "background: #012f4e">
                                        <div class= "fs-5 mx-2">Request Rental</div>
                                    </div>
                                    <div class="row px-2 shadow-sm bg-white pt-3 pb-3 ">
                                        <?php
                                        
                                        $sql= "Select * from tblrental where availability =1 ";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                                        $props = ' <option selected value="">--Select Property--</option>';
                                        foreach($results as $pr){
                                            $props .= '<option value="'.$pr->ID.'">'.$pr->rentalName.'</option>';
                                        }

                                        ?>
                                      <div class="row">
                                        <div class="col-xl-6" >  
                                            <label for="status" class="fs-5 fw-bold">Property to rent</label>
                                            <select name="rtype" class="form-select action" id="rtype">
                                                <?php echo $props;?>
                                            </select>
                                        </div>
                                        <div class="col-xl-3" >
                                            <label for="prate" class="fs-5 fw-bold">Rate<span class= "text-muted fs-6">(per hour)</span></label>
                                            <div class="input-group" id = "price">
                                                <button class="btn btn-secondary disabled">
                                                ₱
                                                </button>    
                                                <input type= "text" name="rprice" id="rprice" style= "text-align:right" value = "" class="form-control action" readonly >
                                            </div> 
                                        
                                        </div>
                                        <div class="col-xl-3" >  
                                            <label for="status" class="fs-5 fw-bold">Mode of payment</label>
                                            <select name="modeofp" class="form-select" id="status">
                                                <?php echo $mod;?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-xl-12" >
                                            <label for="prate" class="fs-5 fw-bold">Rental Duration</label>
                                            <div class="input-group">
                                            <button class="btn btn-secondary disabled">From</button>
                                                <input type="datetime-local" name= "startDur" class="form-control" id="startDur" onchange="checkDate()">
                                                <script type="text/javascript">
                                                    var today = new Date().toISOString().slice(0, 16);
                                                    document.getElementsByName("startDur")[0].min = today;
                                                </script>
                                                <button class="btn btn-secondary disabled">to</button>
                                                <input type="datetime-local" name= "endDur" class="form-control" id="endDur" onchange="checkDate()" onBlur="var x = ((new Date(this.value) - new Date(startDur.value))/(1000*60*60)) * document.getElementById('rprice').value; nfObject = new Intl.NumberFormat('en-US'); output = nfObject.format(x); document.getElementById('total').value = output + '.00';">
                                                <script type="text/javascript">
                                                    var todays = new Date(today).toISOString().slice(0, 16);
                                                    document.getElementsByName("endDur")[0].min = todays;
                                                </script>
                                        
                                            </div>
                                        </div>
                                    
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <label for="purp" class= "fs-5 fw-bold">Purposes</label>
                                            <select class= "select form-select" name="purpose" id="purp" onchange = "showOthers('others', this)">
                                                <?php echo $opt;?>
                                                <option value="others">Others</option>
                                            </select>

                                
                                        </div>
                                        <div class="col-xl-6">
                                            <label for="total" class="fs-5 fw-bold">Total</label>
                                            <div class="d-flex">
                                                <input type="text" id="total" class="form-control me-2" name="total" disabled>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 " id = "others">
                                                <label for="prate" class="fs-5 fw-bold">Purpose</label>
                                                <input type="text"  name= "others" id = "date" class="form-control " value=  "">
                                            </div>
                                        </div>
                                        
                                    
                                        
                                        <div class="col-xl-12 py-2">
                                            <div class="float-end">
                                                <div class="btn-group">
                                                <button type="submit" class=" btn btn-outline-success" name="request" >Submit</button>
                                                </div>
                                                <div class="btn-group">
                                                <a href="dashboard.php" class=" btn btn-outline-danger" name="cancel" id="cancel">Cancel</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                               
                                     
                                     
                                    </div>
                                </div>
                        </div>
                        
                        </div>
                        </div>
                    <!-- /#page-content-wrapper -->
                    </form>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
                <script>
                    var el = document.getElementById("wrapper");
                    var toggleButton = document.getElementById("menu-toggle");

                    toggleButton.onclick = function() {
                        el.classList.toggle("toggled");
                    };
                </script>
                <script>
                    var timeControl = document.querySelector('input[type="time"]');
                </script>
    </body>

    </html>
<?php } ?>

<script>


       function showOthers(divId, element) {
        document.getElementById(divId).style.display = element.value == 'others' ? 'block' : 'none';
    }
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
 



<script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "rtype")
   {
    result = 'rprice';
   }
   $.ajax({
    url:"../../admin/PHP/fetchdata.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#price').html(data);
    }
   })
  }
 });
});



    </script>