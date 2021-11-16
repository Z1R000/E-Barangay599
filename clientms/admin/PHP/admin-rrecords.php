<?php   
    
function moveto(){
     header('Location:admin-rentals.php?success=1');    
    
}
     

    
$sql = 'SELECT * FROM tblpurposes where serviceType = "rental"';
    $query= $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    $opt = "<option  selected disabled>Purposes</option>";
    foreach($results as $row){
        $opt .= '<option  value ="'.$row->ID.'" >'.$row->Purpose.'</option>';
       
    }
  
 $sql = 'SELECT * FROM tblrental';
 $query= $dbh->prepare($sql);
 $query->execute();
 $results = $query->fetchAll(PDO::FETCH_OBJ);
 $props = '<option  selected disabled>Properties</option>';

 foreach($results as $row){
     $props .= '<option  value ="'.$row->ID.'" >'.$row->rentalName.'</option>';
 }
 $sql = 'SELECT * FROM tblstatus';
 $query= $dbh->prepare($sql);
 $query->execute();
 $results = $query->fetchAll(PDO::FETCH_OBJ);
 $stat = '<option  selected disabled>Status</option>';

 foreach($results as $row){
     $stat .= '<option  value ="'.$row->ID.'" >'.$row->status.'</option>';
 }
 $sql = 'SELECT * FROM tblmodes';
 $query= $dbh->prepare($sql);
 $query->execute();
 $results = $query->fetchAll(PDO::FETCH_OBJ);
$mod = '<option  selected disabled>Mode of payment</option>';

 foreach($results as $row){
     $mod .= '<option  value ="'.$row->ID.'" >'.$row->mode.'</option>';
 }

 $sql = 'Select tblresident.FirstName,tblcreaterental.ID as cID, tblresident.LastName,tblresident.MiddleName, tblresident.Suffix, tblcreaterental.status, tblcreaterental.rentalStartDate, tblcreaterental.rentalEndDate, tblcreaterental.creationDate, tblpurposes.Purpose, tblrental.rentalName, tblrental.rentalPrice, tblcreaterental.payable, tblstatus.statusName from tblcreaterental join tblresident on tblresident.ID = tblcreaterental.userID join tblrental on tblrental.ID = tblcreaterental.rentalID join tblpurposes on tblpurposes.ID = tblcreaterental.purpID join tblstatus on tblstatus.ID = tblcreaterental.status where tblcreaterental.status > 1 and tblcreaterental.status<8 order by tblcreaterental.creationDate DESC';


 
 $query= $dbh->prepare($sql);
 $query->execute();
 $results = $query->fetchAll(PDO::FETCH_OBJ);


 if (isset($_POST['rent'])){
    
    $ad = $_SESSION['clientmsaid'];
    $user = $_POST['rrname'];
    
    $userid = '';
    for ($i = 0; $i<strlen($user);$i++){
        if (is_numeric($user[$i])){
            $userid.= $user[$i];
        }
        
    }
    echo $userid;    
    $purp = $_POST['purpose'];
    $s = $_POST['startDur'];
    $e = $_POST['endDur'];
    $start =  date('Y-m-d  H:i', strtotime($s));
    $end =  date('Y-m-d H:i', strtotime($e));
    
    $other = $_POST['others'];
    $rate = $_POST['rprice'];
    $mode = $_POST['modeofp'];
    if ($mode ==1){
        $stat = 2;
    }
    else{
        $stat= 3;
   } 
    
    $rt = $_POST['rtype'];

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
 
    $sqlr= 'Insert into tblcreaterental(status,userID,rentalID,	rentalStartDate,rentalEndDate,modeOfPayment,purpID,payable,others) values('.$stat.','.$userid.','.$rt.',"'.$start.'","'.$end.'",'.$mode.','.$purp.','.$send.',"'.$others.'");';
    
    if ($con->query($sqlr)===TRUE){
        header("Location: admin-rentals.php?add-rec=successful");
   
    }
    else{
  
    }
   
    
   

}

if ($_GET['add-rec']=="successful"){
    echo'
    
    <div class="alert alert-success alert-dismissible fade show " id = "alert" role="alert">
        <strong><i class="fa fa-check-circle mx-2"></i>New Record Added</strong> See <a href = "admin-rental-request.php" > pending</a> to check if pending status was set for rental record.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    
        </div>
    
    
    ';
}
else{
    
}
if ($_GET['delete']== "success"){
    echo'
    
    <div class="alert alert-danger alert-dismissible fade show " id = "alert" role="alert">
        <strong><i class="fa fa-trash me-2"></i>A record was deleted</strong> See archives in <a href = "admin-e-content.php" >E-barangay settings</a> to check deleted record.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    
        </div>
    
    
    ';
}


 

?>                                    
                                    <div class="container g-0 pt-2">
                                        <div class="row bg-599 text-white rounded-top">
                                            <div class="fs-5 px-2"><i class="fa fa-exchange-alt mx-1"></i>Rental Records</div>

                                        </div>
                                        <div class="row bg-white border-end border-start border-bottom py-3">
                                            <div class="row pb-2 px-4 g-0 justify-content-end">
                                            <div class="col-3 ">
                                                <div class="btn-group float-end">
                                                <a href = "#new-rental"  data-bs-toggle ="modal" role = "button"class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus mx-1"></i><span class= "wal">Walk-in Rental</span></a>
                                                </div>
                                            </div>
                                            <div class="row g-0">
                                                <div class="col-xl-12 " style= "overflow-x:auto;">
                                                    <table class= "table table-bordered table-striped" id = "rrecord" style= "min-width: 900px;">
                                                   
                                                        <thead>
                                                            <tr>
                                                                <th style = "text-align: left;"> Status</th>
                                                                <th style = "text-align: left;">Requestor</th>
                                                                <th style = "text-align: left; "> Property </th>
                                                                <th style = "text-align: left;;">Date</th>
                                                                <th style = "text-align: left;">Rate(₱)</th>
                                                                <th style = "text-align: center;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $ctr= 1;
                                                                foreach($results as $row){
                                                                    
                                                                    $cdate= $row->creationDate;
                                                                    $sdate = $row->rentalStartDate;
                                                                    $edate = $row->rentalEndDate;
                                                                    
                                                                    echo '
                                                                
                                                                    <tr>
                                                                        <td scope="col" style = "text-align: left">'.$row->statusName.'</td>
                                                                        <td scope="col" style = "text-align: left">'.$row->LastName.",".$row->FirstName." ".$row->MiddleName." ".$Suffix.'</td>
                                                                        <td scope="col" style = "text-align: left">'.$row->rentalName.'</td>
                                                                        <td scope="col" style = "text-align: left">'.date('l, j F Y - h:i A', strtotime($cdate)).'</td>
                                                                        <td scope="col" style = "text-align: right">'.$row->rentalPrice.'</td>
                                                                        <td scope="col" style = "text-align: center;width: 30%;">
                                                                    
                                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                            <form action  = "edit-rental.php" method = "GET">
                                                                            <button  name= "rid"    value = '.$row->cID.' role ="button" class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Manage</span></button>
                                                                            </form>
                                                                        </div>
                                                                   
                                                                    
                                                                      
                                                                    </td>
                                                                        
                                                                </tr>                                        
                                                                    ';
                                                                    $ctr++;
                                                                }

                                                            
                                                            ?>
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                        

<form method = "POST">
        <div class="modal fade show" id = "new-rental" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content g-0 border-0">
                    <div class="modal-header border-599 bg-599 ">
                        <div class="modal-title white" >&nbsp;<i class = "fa fa-plus"></i>&nbsp;&nbsp;New Rental</div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">                       
                        <div class="row ">
                                <div class="col-xl-12" >
                                    <div class="row">
                                        <div class="col-6 ">
                                            <label for="prate" class="fs-5 fw-bold">Requestor Name</label>
                                            <div class="d-flex">    
                                            <input type="text" id = "search" class="form-control" name ="rrname" placeholder= "Requestor Name">
                                            </div>
                                            <div class="col" style= "z-index: 9;position:relative">
                                                <div class="list-group w-100"  id="show-list" style="position: absolute">
                                            <!-- Here autocomplete list will be display -->
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="col-xl-6">
                                            <label for="purp" class= "fs-5 fw-bold">Purposes</label>
                                            <select class= "select form-select" name="purpose" id="purp" onchange = "showOthers('others', this)">
                                                <?php echo $opt;?>
                                                <option value="others">Others</option>
                                            </select>

                                            <div class="col-xl-12" id = "others">
                                                <label for="prate" class="fs-5 fw-bold">Purpose</label>
                                                <input type="text"  name= "others" id = "date" class="form-control " name ="date">
                                            </div>
                                
                                        </div>

                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-xl-12" >
                                            <label for="prate" class="fs-5 fw-bold">Rental Duration</label>
                                            <div class="input-group">
                                            <button class="btn btn-secondary disabled">From</button>
                                                <input type="datetime-local" name= "startDur" class="form-control">
                                                <button class="btn btn-secondary disabled">to</button>
                                                <input type="datetime-local" name= "endDur" class="form-control">
                                        
                                            </div>
                                        </div>
                                    
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-xl-6" >  
                                            <label for="status" class="fs-5 fw-bold">Property to rent</label>
                                            <select name="rtype" class="form-select action" id="rtype">
                                                <?php echo $props;?>
                                            </select>
                                        </div>
                                        <div class="col-xl-6" >
                                            <label for="prate" class="fs-5 fw-bold">Rate<span class= "text-muted fs-6">(per hour)</span></label>
                                            <div class="input-group" id = "price">
                                                <button class="btn btn-secondary disabled">
                                                ₱
                                                </button>    
                                                <input type= "text" name="rprice" id="rprice" style= "text-align:right" value = "" class="form-control action" >
                                        </div> 
                                    </div>
                                    

                                
                                    </div>
                            
                                    <div class="row ">

                                    
                                        <div class="col-xl-6" >  
                                            <label for="status" class="fs-5 fw-bold">Mode of payment</label>
                                            <select name="modeofp" class="form-control" id="status">
                                                <?php echo $mod;?>
                                            </select>
                                        </div>
                                        <div class="col-xl-6" >
                                        
                                        <!--<label for="prate" class="fs-5 fw-bold">Rental Status</label>
                                            <select name="stat" class="form-control" id="status">
                                            <?php
                                                 /*   $sql= 'Select * from tblstatus where ID = 1 or ID = 2';
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    foreach($results as $md){
                                                        echo '
                                                            <option value = "'.$md->ID.'">'.$md->statusName.'</option>
                                                        
                                                        ';
                                                    }
                                                */
                                                ?>
                                            </select>-->
                                    </div>
                                    
                                    <div class="row g-0 my-2  " >
                                     
                                        <div class="col-md-12 pe-2">
                                            <div class="float-end">
                                                
                                                <div class="btn-group">
                                                <button type ="submit" name = "rent" class="btn btn-success" >
                                                    <i class="fa fa-upload mx-1"></i>
                                                    Submit
                                                </button>
                                                </div>
                                                <div class="btn-group">
                                                <button type ="button" role = "button" class="btn btn-secondary" data-bs-dismiss= "modal" >
                                                    <i class="fa fa-times-circle mx-1"></i>
                                                    Cancel
                                                </button>
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
        </div>
    </form>
        <div class="modal fade" id = "check-rental" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content g-0 border-0">
                    <div class="modal-header bg-599 boder-599 ">
                        <div class="modal-title white" >&nbsp;<i class = "fa fa-eye"></i>&nbsp;&nbsp;Rental record</div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        <div class="row gx-3">
                                <div class="col-xl-12" >
                                    <div class="row">
                                        <div class="col-6 ">
                                            <label for="prate" class="fs-5 fw-bold">Requestor Name</label>
                                            <div class="d-flex">    
                                            <input type="text" id = "prate" class="form-control" name ="pRate" placeholder= "Requestor Name" readonly>
                                            </div>
                                        </div> 
                                        <div class="col-xl-6">
                                            <label for="purp" class= "fs-5 fw-bold">Purposes</label>
                                            <select class= "select form-select" name="" id="purp" disabled onchange = "showOthers('others', this)">
                                                <option  selected>Purposes</option>
                                                <option value="ent">For entertainment</option>
                                                <option value="med">For medical reasons</option>
                                                <option value="others">Others</option>
                                            </select>
                                
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6" >
                                            <label for="prate" class="fs-5 fw-bold">Rental Date</label>
                                            <input type="date"  id = "date" class="form-control " readonly name ="date">
                                        </div>
                                        <div class="col-xl-6" >
                                            <label for="prate" class="fs-5 fw-bold">Rental Duration</label>
                                            <div class="input-group">
                                            <button class="btn btn-secondary disabled">From</button>
                                                <input type="time" class="form-control" readonly>
                                                <button class="btn btn-secondary disabled">to</button>
                                                <input type="time" class="form-control" readonly>
                                        
                                            </div>
                                        </div>
                                    
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-xl-6" >  
                                            <label for="status" class="fs-5 fw-bold">Property to rent</label>
                                            <select name="" class="form-select" id="status" disabled>
                                                <option value="avail">Barangay Van</option>
                                                <option value="noavail">Patrol</option>
                                                <option value="noavail">Basketball court</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6" >
                                            <label for="prate" class="fs-5 fw-bold">Rate<span class= "text-muted fs-6">(per hour)</span></label>
                                            <div class="input-group">
                                                <button class="btn btn-secondary disabled">
                                                ₱
                                                </button>    
                                                <input type="text" id = "prate" class="form-control " name ="pRate" placeholder= "0.00" readonly style= "text-align:right">
                                        </div> 
                                    </div>
                                    
                                    
                                
                                    </div>
                            
                                    <div class="row">

                                    
                                        <div class="col-xl-6" >  
                                            <label for="status" class="fs-5 fw-bold">Mode of payment</label>
                                            <select name="" class="form-control" name = "modeofp"id="status" disabled>
                                            <option value="g-cash">G-cash</option>
                                            <option value="cash">Cash</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6" >
                                        <label for="prate" class="fs-5 fw-bold">Rental Status</label>
                                            <select name="" class="form-control" id="status" >
                                               
                                            </select>
                                    </div>
                                    <div class="row g-0 " align= "right">
                                        <div class="col-md-12     pe-2 my-2">
                                        
                                            <button type ="button" role = "button" class="btn btn-secondary px-2" data-bs-dismiss= "modal">
                                                Done
                                            </button>
                                        </div>
                                    </div>
                                    
                                
                                </div>
                            </div>
                        </div>
          
                        
                                        
                    </div>
                   
                </div>
            </div>
        </div>
        


    

        <div class="modal fade" id = "approve-transac" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-success ">
                    <div class="modal-header bg-success  ">
                        <div class="modal-title white">&nbsp;<i class = "fa fa-paper-plane"></i>&nbsp;&nbsp;Send Proof of transaction</div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        
                        <div class="row mt-2 ms-2 me-3">
                            <form action="" method = "POST">
                                <div class="row ">
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
                                        <label for="ars">Acquired Rental</label>
                                        <input id = "crs" type="text" class="form-control" value = "Basketball Court" readonly>
                   
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Payment Status</label>
                                        <input id = "emails" type="text" class="form-control" value = "Settled + amount payed" readonly>
                                       
                                    
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
                                            <input class="form-check-input" type="checkbox" value="" id="em" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                E-mail
                                            </label>
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Walk-in
                                            </label>
                                        </div>

                                    </div>
                                    
                                </div>
                                <div class="row justify-content-center" align = "center">
                                    
                                    <div class="col-md-12">
                                        <div class="float-end">

                                        <div class="btn-group">
                                        <button href ="#" type = "button" class="btn btn-success " data-bs-dismiss ="modal"  >
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
    <script>
        function getDate(){
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            var hr = today.getHours();
            var mn = today.getMinutes();
            var sec = today.getSeconds();

            if(dd<10) {
                dd = '0'+dd
            } 

            if(mm<10) {
                mm = '0'+mm
            } 
            if (mn<10){
                mn = '0'+mn;
            }
            if (sec<10){
                sec = '0'+sec;
            }
            today =  mm + '/' + dd + '/' +yyyy + ',' +hr+ ':'+mn+':'+sec;
            //document.getElementById('date').value  = today;
          
        }

                
        window.onload = function() {
            getDate();
        };
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
    url:"fetchdata.php",
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
     <script>
$(document).ready(function () {
  // Send Search Text to the server
  $("#search").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "searchname.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
          $("#show-list").html(response);
        },
      });
    } else {
      $("#show-list").html("");
    }
  });
  $(document).on("click", "#clicks", function () {
    $("#search").val($(this).text());
    $("#show-list").html("");
  });
});


  </script>