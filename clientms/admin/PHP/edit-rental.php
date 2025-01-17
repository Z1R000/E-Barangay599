<?php 
    $curr ="Manage Rental";
    session_start();
    error_reporting(1);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
    header('location:logout.php');
    }else{

        $eid = $_GET['rid'];
        $time = new DateTime("now", new DateTimeZone('Asia/Manila'));
        $now= $time->format("Y-m-d h:i");

        $sqls= "SELECT tblstatus.ID as statid, tblcreaterental.payment as pmnt,tblcreaterental.*,tblrental.ID as renid, tblresident.ID as resid, tblpurposes.*, tblrental.*, tblmodes.*, tblstatus.*,tblpurposes.ID as purposeID, tblresident.* FROM tblcreaterental JOIN tblpurposes ON tblcreaterental.purpID = tblpurposes.ID JOIN tblresident ON tblresident.ID = tblcreaterental.userID JOIN tblrental ON tblrental.ID = tblcreaterental.rentalID JOIN tblmodes ON tblmodes.ID = tblcreaterental.modeOfPayment JOIN tblstatus ON tblstatus.ID = tblcreaterental.status WHERE tblcreaterental.ID =:eid";

        $querys = $dbh ->prepare($sqls);
        $querys->bindParam(':eid',$eid,PDO::PARAM_STR);
        $querys ->execute();
        $result = $querys->fetchAll(PDO::FETCH_OBJ);
        $arr= [];
        $det = "";
        $fupdate = "";
        $status = "";
        $btn = "";
        $sen = "display:none";

        
        
        foreach ($result as $r){
            $cdate = $r->creationDate;
            $sdate = $r->rentalStartDate;
            $edate = $r->rentalEndDate;
            $pdpd = number_format($r->payment,2);
            $pypy = $r->payable;
            $ch = $r->pmnt - $r->payable;
            $cr = $r->payable - $r->pmnt;
            $cr = number_format($cr,2);
            $ch = number_format($ch,2);
            $pay4 = number_format($r->payable,2);
            array_push($arr,$r->ID);
            array_push($arr,$r->LastName.", ".$r->FirstName." ".$r-> MiddleName." ".$r->Suffix);
            array_push ($arr, $r->purpID);
            array_push($arr,date("F j, Y - h:i A",strtotime($cdate)));
            array_push($arr,$sdate);
            array_push($arr,$edate);
            array_push($arr, $pay4);
            array_push($arr,$r->rentalName);
            array_push($arr,$r->mode);
            array_push($arr,$r->statusName);
            array_push($arr, $r->rentalPrice);
            array_push($arr,$r->renid);
            array_push($arr,$r->resid);
            array_push($arr,$r->proof);
            array_push($arr, $r->statid);
        }
            $stat ="";

            $others = $_POST['oth'];
            $ad = $_SESSION['clientmsaid'];
            //admin
            $user = $_POST['rname'];
            $userid = $user[0];
            
            
            if (!(is_numeric($userid))){
                $userid = $arr[12];
            }
            else{
                $userid = $user[0];
            }
            //userid
            $purp = $_POST['purp'];
            //purpose

            $cs = $arr[4];
            $ns = date('Y-m-d H:i', strtotime($_POST['newStart']));
            $start = $cs;
            
            if ($ns=="1970-01-01 01:00"){
                $start = $cs;
            }
            else{
                $start = $ns;
            }
            
            $ce = $arr[5];
            $ne = date('Y-m-d H:i', strtotime($_POST['newEnd']));
        
            $end = $ce;
            if ($ne== "1970-01-01 01:00"){
                $end =  $ce;
            }
            else{
                $end = $ne;
            }
          
            //start to end

            
            $mode  = $_POST['mod'];
            //mode
            $status = "";
            if ($det!= "disabled"){
                $status = $_POST['stat'];
            }
            else{
                $status = $arr[14];                
            }
           
            //status
            $rtype= $_POST['rtype'];
            //property
            $rprice = $_POST['rprice'];
            //rental price
            $rate = $arr[10];
          
            //rate

            $start1 = new DateTime($start);
            $end2 = new DateTime($end);
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
        
        $sql = "";
        $up = "";

        if($arr[8]=="G-cash"){
            
            $difference = "";
         
            $det = "disabled";
            $sql = "Select * from tblstatus where ID = 3 or ID= 4 or ID= 7";
            $query = $dbh->prepare($sql);
            $query -> execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            $stat = "";

            foreach($result as $r){
                if ($arr[9] == $r->statusName){
                    $stat.='<option value="'.$r->ID.'" selected>'.$r->statusName.'</option>';
                }
                
                else{
                    $stat.='<option value="'.$r->ID.'">'.$r->statusName.'</option>';
                }
            }
                $det = "";
                $status = $_POST['stat'];
                $fupdate = 'Update tblcreaterental set status = '.$status.' ,rentalStartDate = "'.$start.'" ,rentalEndDate = "'.$end.'"
                ,modeOfPayment = '.$mode.' ,payable = '.$send.'
                where ID ='.$eid.';';
        
        }
        if ($arr[8]=="Cash"){
            $sql = "Select * from tblstatus where ID = 2 or ID= 3";
            $query = $dbh->prepare($sql);
            $query -> execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            $stat = "";
            foreach($result as $r){
                if ($arr[9] == $r->statusName){
                    $stat.='<option value="'.$r->ID.'" selected>'.$r->statusName.'</option>';
                }
                else{
                    $stat.='<option value="'.$r->ID.'">'.$r->statusName.'</option>';
                }
            }
            $status = $_POST['stat'];
            $fupdate = 'Update tblcreaterental set status = '.$status.' ,rentalStartDate = "'.$start.'" ,rentalEndDate = "'.$end.'"
            ,modeOfPayment = '.$mode.' ,payable = '.$send.'
            where ID ='.$eid.';';
        }
        

        if ($arr[9]=="PAYMENT VERIFIED"){
            $btn= "disabled";
            $sql = "Select * from tblstatus where ID = 4 or ID = 9";
            $query = $dbh->prepare($sql);
            $query -> execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            $stat = "";
            foreach($result as $r){
                if ($arr[9] == $r->statusName){
                    $stat.='<option value="'.$r->ID.'" selected>'.$r->statusName.'</option>';
                }
                else{
                    $stat.='<option value="'.$r->ID.'">'.$r->statusName.'</option>';
                }
            }

            $fupdate = 'Update tblcreaterental set status = '.$status.'  
            where ID ='.$eid.';';
     
        }
        if ($arr[9]=="ON-GOING"){
            $btn= "disabled";
            $sql = "Select * from tblstatus where ID = 9 or ID=6";
            $query = $dbh->prepare($sql);
            $query -> execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            $stat = "";
            foreach($result as $r){
                if ($arr[9] == $r->statusName){
                    $stat.='<option value="'.$r->ID.'" selected>'.$r->statusName.'</option>';
                }
                else{
                    $stat.='<option value="'.$r->ID.'">'.$r->statusName.'</option>';
                }
            }

            $fupdate = 'Update tblcreaterental set status = '.$status.'  
            where ID ='.$eid.';';
        }

        if ($arr[9]== "PAYMENT REJECTED"){
            $det = "disabled";
            $sql = "Select * from tblstatus where ID = 3 or ID= 4 or ID= 7";
            $query = $dbh->prepare($sql);
            $query -> execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            $stat = "";

            foreach($result as $r){
                if ($arr[9] == $r->statusName){
                    $stat.='<option value="'.$r->ID.'" selected>'.$r->statusName.'</option>';
                }
                else{
                    $stat.='<option value="'.$r->ID.'">'.$r->statusName.'</option>';
                }
            }

            if ($arr[13]==""){
                $det = "disabled";
                $fupdate = 'Update tblcreaterental set 
                modeOfPayment = '.$mode.' where ID ='.$eid.';';
            }
            else{
                $det = "";
                $status = $_POST['stat'];
                $fupdate = 'Update tblcreaterental set status = '.$status.' ,rentalStartDate = "'.$start.'" ,rentalEndDate = "'.$end.'"
                ,modeOfPayment = '.$mode.' ,payable = '.$send.'
                
                where ID ='.$eid.';';
            }

        }

        
        if ($arr[9] == "SETTLED"){
            $btn = "disabled";
            $hide = "none";
            $sen = "disabled";
            $det = "disabled";
            $sql = "Select * from tblstatus where ID = 5 or  ID= 6";
            $query = $dbh->prepare($sql);
            $query -> execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            $stat = "";
            foreach($result as $r){
                if ($arr[9] == $r->statusName){
                    $stat.='<option value="'.$r->ID.'" selected>'.$r->statusName.'</option>';
                }
                else{
                    $stat.='<option value="'.$r->ID.'">'.$r->statusName.'</option>';
                }
            }
        }
        if ($arr[9] == "APPROVED"){
            $det = "disabled";
            $stat = "";
            $sql = "Select * from tblstatus where ID = 2";
            $query = $dbh->prepare($sql);
            $query -> execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            foreach($result as $r){
                if ($arr[9] == $r->statusName){
                    $stat.='<option value="'.$r->ID.'" selected>'.$r->statusName.'</option>';
                }
            }
        }
        
        if(isset($_POST['deleterec']))
        {
            $decr= $_POST['decr'];
        
            if (isset($_POST['spcr'])){
                $decr =$_POST['spcr'];
            }else{
                $decr =$_POST['decr'];
        
            
            $insert = "Update tblcreaterental set decreason = '".$decr."', remarks = '".$_POST['rmrks']."' where ID = ".$eid."";
            
          
            $eid=intval($_GET['editid']);
            $clientmsaid=$_SESSION['clientmsaid'];
            $status="8";
        
            $sql="update tblcreaterental set status=:status WHERE ID=:eid";
            $query=$dbh->prepare($sql);
            $query->bindParam(':status',$status,PDO::PARAM_STR);
            $query->bindParam(':eid',$eid,PDO::PARAM_STR);
            $query->execute();
            

            if($con->query($insert)===TRUE){

            }
            echo '<script>alert("Certificate Record '.$decr." ".$_POST['rmrks'].' has been updated")</script>';
            echo "<script>window.location.href ='admin-certificate.php'</script>";
        }
    }



        if (isset($_POST['update'])){
            
            $status = $_POST['stat'];
            $dbPay = "";
            $pmnt = "Select payable from tblcreaterental where ID = ".$eid."";
            $query= $dbh->prepare($pmnt);
            $query->execute();
            $res= $query->fetchAll(PDO::FETCH_OBJ);

            foreach($res as $re){
                
                $dbPay = $re->payable;

            }
            if (isset($_POST['paid'])){
              
                
                $sd = $_POST['paid'];

                $status = $_POST['stat'];
                $rfn = $_POST['refNum'];
                
                $sql = 'update tblcreaterental set status ='.$status.',rentalStartDate = "'.$start.'", rentalEndDate = "'.$end.'",  payment = '.$sd.' where ID ='.$eid.';';

                $up = "Update tblpaymentlogs set refNum =:rfn, payment =:sd,dateAccepted =:now where creationID = :eid and servicetype = 1";
                $qup = $dbh->prepare($up);
                $qup->bindParam(':rfn',$rfn,PDO::PARAM_STR);
                $qup->bindParam(':sd',$sd,PDO::PARAM_STR);
                $qup->bindParam(':now',$now,PDO::PARAM_STR);
                $qup->bindParam(':eid',$eid,PDO::PARAM_STR);
                $qup->execute();
                
                if ($con->query($sql)===TRUE){
                    $diff = $dbPay - $sd;
                    if ($sd<$dbPay){
                        header('Location: payment-verification-rent.php?rid='.$eid.'&update=success&type=2&diff='.$diff.'');
                    
                    }
                    else if ($sd>$dbPay){
                        header('Location: payment-verification-rent.php?rid='.$eid.'&update=success&type=1&diff='.$diff.'');
                    
                    }else{
                        header('Location: payment-verification-rent.php?rid='.$eid.'&update=success');
                    }
                }

                else{
                    header('Location: edit-rental.php?rid='.$eid.'&update=failed');
                }
            }else{
                $stat = $_POST['stat'];
                $sql = 'update tblcreaterental set status =:stat where ID =:eid';
                $qup = $dbh->prepare($sql);
                $qup->bindParam(':stat',$stat,PDO::PARAM_STR);
                $qup->bindParam(':eid',$eid,PDO::PARAM_STR);
                $qup->execute();
                header('Location: edit-rental.php?rid='.$eid);
            }

        }
        if (isset($_POST['del-rec'])){

           $sql = "Update tblcreaterental set status = 8 where ID = ".$eid." ";

           if ($con->query($sql)===TRUE){
                header('Location: admin-rentals.php?delete=success');
           }
           else{
               echo "ikli na nyan he";
           }
            

        }
       

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
        $('#rrecord').DataTable( {
        dom: 'Bfrtip',
         buttons: {
            buttons:[
                {
                    extend: 'print',
                    title:'',
                    text: 'Generate Report',
                    message:'The following data are reports of the rentals catered today by Barangay 599',
                    className: 'btn btn-primary my-1',
                    exportOptions: {columns: [ 0, 1, 2, 3,4 ]},
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '16pt','')                    
                            .prepend(

                                '<div class= "row justify-content-center"><div class= "col-3 align-items-center"><img src ="https://scontent.fmnl4-6.fna.fbcdn.net/v/t1.15752-9/253840780_3043650102555884_6126132548248010936_n.png?_nc_cat=107&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeHtm0gSv39SpbH8YKdiyQmO9Q65UWXYIN71DrlRZdgg3gzdVs9nT_Emsy5607I5PSXaq0miUcTAhsnSWRVszXmU&_nc_ohc=nlQIQehSnbkAX-6AV7Y&_nc_ht=scontent.fmnl4-6.fna&oh=4ef3f4e19b84fbc2f8130d1d23dc16ce&oe=61AD6A25" style= "width: 100px"/></div><div class= "col-6"><div class = "fs-3 text-center">BARANGAY 599, ZONE 59, DISTRICT VI OFFICE OF THE SANGGUNIANG BARANGAY</div></div><div class= "col-3  align-items-center"><img class= "float-end" src ="https://scontent.fmnl4-2.fna.fbcdn.net/v/t1.15752-9/253727695_993694454821211_6742610281288759451_n.png?_nc_cat=105&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeEjZKbv7g_r_OkDANnMfmkmh6jj4naYPzqHqOPidpg_OjwuDdnXemIELY2YBxsifbVX6Q12cTqziZrf280CcmQ9&_nc_ohc=b0AupJm6_48AX8vajsF&tn=2Fn-qzGntt-ZZM-o&_nc_ht=scontent.fmnl4-2.fna&oh=923e9c42b5c658123e6afb3b5b0f1685&oe=61ACC77E" style= "width: 100px"/></div>'
                            )
                            .append(
                                '<img src="https://scontent.fmnl4-6.fna.fbcdn.net/v/t1.15752-9/254152885_569551377676151_8198043780541099030_n.png?_nc_cat=107&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeGaHlQ9SaCFDoumzSqNbuYpX-DTswHybhVf4NOzAfJuFQb0vwGo3iZ4lgoV0U9JXqhvQciPwTNCLoUH_nwOkFhZ&_nc_ohc=VlwYtPOMD-kAX8F3DOo&_nc_ht=scontent.fmnl4-6.fna&oh=fede1fd8b66a464f69ca2a47abd6af65&oe=61AAFC89" style="position:absolute; bottom:0; left:500; right:500" />'

                            );
                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    },
                
                },
            
                {
                    extend: 'excelHtml5',
                    text: 'Excel File',
                    className: 'btn-success my-1',
                    exportOptions: {columns: [0,1,2,3,4]}
                },
              
                
            ],
        dom: {
            button:{
                className: 'btn'
            }
        }

        }
       
        } );
    } );
    </script>
    <script>
    $(document).ready(function() {
    $('#rpay').DataTable();
    } );
    </script>
    <script>
    $(document).ready(function() {
    $('#rlist').DataTable();
    } );
    </script>

	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
  

        #size{
            width: 10%;
        }

        @media (max-width: 576px){
         
            .dis{
                font-size: 15px;
            }
            .ser{
                width: 100%;
            }
            .wal{
                display:none;
            }
           
        }
        .red{
            background:#8B0000;
            border: 1px solid #8B0000;
        }
        .white{
            color: white;
        }
        .blue{
            background: #012f4e;
        }
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');


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
        <div class="d-flex align-items-center">
                <div class="container  mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a  class= "text-decoration-none" href="#service-choice" data-bs-toggle= "modal" role ="button"><i class="fa fa-hand-paper"></i>&nbsp;Services</a></li>
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-list text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
     <!--breadcrumb-->
     <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="float-end">
                        <a type ="button" role = "button" href = "admin-rentals.php"class="btn btn-secondary px-2" data-bs-dismiss= "modal" >
                                                    <i class="fa fa-arrow-circle-left mx-1"></i>
                                                            Back
                                                    </a>
                        </div>
                    </div>
                </div>
            </div>
    <div class="container-fluid p-5 ">
        <div class="row">
            <div class="col-xl-10   mx-auto">
            <?php
            if ($_GET['update']=="success"){
                echo'
                    <div class="alert alert-primary alert-dismissible fade show " id = "alert" role="alert">
                        <strong><i class="fa fa-check-circle mx-2"></i>Record Updated</strong> See <a href = "admin-rental-request.php" > pending</a> to check if pending status was set for rental record.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                
                ';
            }
       
            ?>
                <div class="row gx-3 bg-599 border-599 text-white">
                    <div class="fs-5">Rental Record</div>
                </div>
                <form method = "POST">
                <div class="row gx-3 border-start border-end border-bottom shadow-sm">
                    <div class="col-xl-12 p-3" >
                        <div class="row ">
                            <div class="col-xl-6 ">
                                <label for="prate" class="fs-5 fw-bold">Requestor Name</label>
                                    <div class="input-group">    
                                        <input type= "text" value ="<?php echo $eid; ?>" name = "id" style= "display:none;">
                                        <input type="text" readonly  id = "search" value = "<?php echo $arr[1]; ?>" class="form-control" name ="rname" placeholder= "">
                                    </div>
                                    <div class="col" style= "z-index: 9;position:relative">
                                            <div class="list-group w-100"  id="show-list" style="position: absolute">
                                            <!-- Here autocomplete list will be display -->
                                            </div>
                                            </div>
                                </div>
                                <div class="col-xl-6">
                                  
                                    <label for="purp" class= "fs-5 fw-bold">Purposes</label>
                                    <?php
                                        
                                        $sql = 'SELECT * FROM tblpurposes where serviceType = "2"';
                                        $query= $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    
                                        $opt = "<option  selected disabled>Purposes</option>";
                                        foreach($results as $row){

                                            if ($row->ID == $arr[2] ){
                                                $opt .= '<option  value ="'.$row->ID.'" selected>'.$row->Purpose.'</option>';
                                              
                                            }
                                            $opt .= '<option  value ="'.$row->ID.'" >'.$row->Purpose.'</option>';
                                           
                                        }
                                       
                                    
                                    
                                    ?>
                                        <select disabled class= " form-select" name="purp" id="purp" onchange = "showotherEdit('othersed',this);">                  
                                                <?php echo $opt; ?>
                                        </select>
                                    <div class="col-xl-12" id ="othersed" style= "display : none ">
                                        <label for="purp" class= "fs-6 fw-bold">Purpose </label>
                                        <input type="text" name= "oth" value = "" class="form-control" placeholder = "Specify purpose here">
                                    </div>                                      
                                </div>
                            </div>
                                <div class="row gy-2">
                                    <div class="col-xl-3" >
                                        <label for="prate" class="fs-5 fw-bold">Request Date</label>
                                            <input type="text"  name = "cdate" id = "date" class="form-control " value = "<?php echo $arr[3]?>" name ="date" readonly>
                                    </div>
                                    <div class="col-xl-9" >
                                        <div class="row ">
                                        <label for="prate" class="fs-5 fw-bold">Rental Duration</label>
                                            <div class="input-group">
                                                <button class="btn btn-secondary disabled">From</button>
                                                    <input type="text" name= "currStart" readonly value = "<?php echo date("j F Y - h:i A",strtotime($arr[4])); ?>"class="form-control">
                                                    <button class="btn btn-secondary disabled">to</button>
                                                    <input type="text" name= "currEnd" readonly value = "<?php echo date("j F Y - h:i A",strtotime($arr[5])); ?>"class="form-control">
                                                    <button <?php echo $btn?> type= "button" class="btn btn-outline-primary  " id = "edit2" onclick = "newDuration('editStarttoEnd','edit2')"><i class="fa fa-edit" disabled></i></button>     
                                                </div>
                                                <div class="col" style = "display:none" id ="editStarttoEnd">
                                                    <label for="purp" class= "fs-5 fw-bold">New Duration </label>
                                                <div class="input-group">
                                                    <button class="btn btn-secondary disabled">From</button>
                                                    <input name= "newStart" type="datetime-local" class="form-control" placeholder = "Specify purpose here">
                                                    <button class="btn btn-secondary disabled">to</button>
                                                    <input name = "newEnd" type="datetime-local" class="form-control" placeholder = "Specify purpose here">
                                                </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-xl-6" >  
                                            <?php
                                                $sql = 'SELECT * FROM tblrental';
                                                $query= $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            
                                                $prp = "<option  selected disabled>Property</option>";
                                                foreach($results as $row){
                                                    if ($row->rentalName == $arr[7] ){
                                                        $prp .= '<option  value ="'.$row->ID.'" selected>'.$row->rentalName.'</option>';
                                                    }else{
                                                        $prp .= '<option  value ="'.$row->ID.'" >'.$row->rentalName.'</option>';
                                                    }
                                                }   
                                            
                                            
                                            ?>
                                                <label for="status" class="fs-5 fw-bold">Property to rent</label>
                                                <select disabled name="rtype" class="form-select action" id="rtype">
                                                    <?php echo $prp; ?>
                                                </select>

                                                
                                        </div>
                                        <div class="col-xl-6" >
                                            <label for="prate" class="fs-5 fw-bold">Payable<span class= "text-muted fs-6"></span></label>
                                            <div class="input-group" id = "result">
                                                <button class="btn btn-secondary disabled">₱</button>    
                                                <input type= "text" name="rprice" id="rprice" style= "text-align:right" value = "<?php echo $arr[6]; ?>"class="form-control action" disabled>
                                                 
                                                
                                            </div> 
                                            </div>
                                                                                
                                        </div>                
                                        <div class="row">
                                            <div class="col-xl-6" >  
                                                <?php
                                                    $sql= "Select * from tblmodes";
                                                    $query = $dbh->prepare($sql);
                                                    $query -> execute();

                                                    $result = $query->fetchAll(PDO::FETCH_OBJ);
                                                    $mod = "";
                                                    foreach($result as $row){
                                                        if ($arr[8]== $row->mode){
                                                            $mod.= '<option selected value="'.$row->ID.'">'.$row->mode.'</option>';
                                                        }
                                                        else{
                                                            $mod.= '<option value="'.$row->ID.'">'.$row->mode.'</option>';
                                                        }
                                                    }
                                                
                                                ?>
                                                <label for="status" class="fs-5 fw-bold">Mode of payment</label>
                                                    <select <?php echo $btn ?> name="mod" class="form-select" id="status" disabled>
                                                       <?php   echo $mod; ?>
                                                    </select>
                                            </div>
                                            <div class="col-xl-6" >
                                              
                                                    <label for="prate" class="fs-5 fw-bold">Rental Status</label>
                                                    <select name="stat" class="form-select" id="status" <?php echo $det?>>
                                                           <?php echo $stat; ?>       
                                                    </select>
                                            </div>
                                            <?php
                                            $mcheck = $arr[8];
                                            $scheck = $arr[9];
                                            if ($mcheck == "G-cash"){
                                        
                                                if ($scheck == "PAYMENT VERIFICATION"){

                                                    $sql= "Select * from tblinformation";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $inf = $query->fetchAll(PDO::FETCH_OBJ);
                                                    foreach($inf as $in){
                                                        
                                                    echo '
                                                    <div class="row pt-4">
                                                        <div class="col-12">
                                                            <div class="row">
                                                               
                                                                <div class="col-xl-6">
                                                                    <label for="ctype" class="black fw-bold fs-5">Proof of Payment</label>

                            
                                                                </div>
                                                            
                                                                <div class="col-xl-6">
                                                                    <label for="ctype" class="black fw-bold fs-5">Payment Details</label>
                            
                                                                </div>
                                                                <div class="col-xl-3">
                            
                                                                </div>       
                                                            </div>
                                                        </div>
                                                        
                                                    
                                                    </div>
                                                    
                                                    
                                                    ';

                                                    $select = "Select * from tblpaymentlogs where creationID = ".$eid." and servicetype=1";
                                                    $query = $dbh->prepare($select);
                                                    $query ->execute();
                                                    $plog = $query->fetchAll(PDO::FETCH_OBJ);

                                                    foreach($plog as $i){

                                                    echo '
                                                    <div class="row">
                                                    <div class="col-12">
                                                    <div class="row g-2">
                                                    <div class="col-xl-6">
                                                    <div class="row">
                                                    <div class="col-12">
                                                        <a target = "_blank" href = "'.$i->proof.'"><img src="'.$i->proof.'" alt="" class="img-fluid"></a>
                                                    </div>
                                                    </div>
                                                    </div>
                                                   <div class="col-xl-6">
                                                    <table>';
                                               

                                                        $cdate = date('F j, Y - h:i A', strtotime($i->paymentDate));
                                                        $adate = date('F j, Y - h:i A', strtotime($i->dateAccepted));
                                                        echo'
                                                        
                                                                <table>
                                                                  <tr>
                                                                    <td><div class="input-group py-1">
                                                                    <label for="refnum" class="fs-5 text-primary pe-2">Date Submitted: </label> </td>  
                                                                    <td>
                                                                    <div class="fs-5 text-secondary"> '.$cdate.'</div>
                                                                    </td>
                                                                    </div>
                                                                </tr>
                                                                  <tr>
                                                                    <td><div class="input-group py-1">
                                                                    <label for="refnum" class="fs-5 text-primary pe-2">Reference Number:</label> </td>  
                                                                    <td>
                                                                    <div class="col-10 py-2">         
                                                                    <input type="text" name = "refNum" id = "refnum" class="form-control" value = "" >
                                                                    </td>
                                                                    </div>
                                                                </tr>
                                                                <tr>
                                                                    <td><div class="input-group py-1">
                                                                    <label for="paid" class="fs-5 text-primary pe-2">Amount Paid:</label> </td>  
                                                                    <td>
                                                                    <div class="col-8 py-2">   
                                                                    <div class="input-group">
                                                                    <button class="btn btn-secondary disabled">₱</button>      
                                                                    <input style= "text-align:right" type="decimal" name = "paid" id = "paid" value = "" class="form-control" >
                                                                    </div>
                                                                    </td>
                                                                </div>

                                                                <tr>
                                                                <td><div class="input-group py-1">
                                                                <label for="payable" style = "text-align:right" class="fs-5 text-primary pe-2">Amount to Pay :</label></td>   
                                                                <td>
                                                                <div class="col-8 py-2">         
                                                                <div class="input-group">
                                                                <button class="btn btn-secondary disabled">₱</button>
                                                                <input type="decimal" name = "cpayable" id = "topay" value = '.$arr[6].'  style = "text-align:right" class="form-control" readonly>
                                                                </div>
                                                                </td>
                                                                </div>    
                                                                </div>
                                                                </tr>
                                                                </table';
                                                           
                                                            
                                                    
                                                            }
                                                            echo ' <div class="row g-0" align= "right">
                                                            <div class="col-md-12  px-3 mx-auto my-2">
                                                                <div class="float-end">
                                                                <a type="button" style= "'.$sen.'"href ="#approve-transac" data-bs-toggle = "modal" role = "button" class="btn  btn-info text-white"><i class = "fa fa-paper-plane mx-1 white"></i><span class= "wal">Send</span></a>     
                                                                <button  type ="submit" name= "update" role = "button" class="btn btn-primary px-2" >
                                                                <i class= "fa fa-save mx-1"></i>Save</button>
                                                                <button type ="button" data-bs-toggle = "modal" href = "#decline-proof" role = "button" href = ""class="btn btn-danger px-2" data-bs-dismiss= "modal" >
                                                                <i class="fa fa-trash mx-1"></i>
                                                                        Reject
                                                                </button>
                                                                </div>
                                                              
                                                            </div>
                                                        </div>';
                                                        }
                                                       
                                                }
                                                else if ($scheck =="PAYMENT VERIFIED"|| $scheck =="ON-GOING" ||$scheck == "SETTLED"){
                                                    if ($ch > $cr || $ch < $cr){
                                                        $sql= "Select * from tblinformation";
                                                        $query = $dbh->prepare($sql);
                                                        $query->execute();
                                                        $inf = $query->fetchAll(PDO::FETCH_OBJ);
                                                        foreach($inf as $in){
                                                            
                                                        echo '
                                                        <div class="row pt-4">
                                                            <div class="col-12">
                                                                <div class="row">
                                                                   
                                                                    <div class="col-xl-6">
                                                                        <label for="ctype" class="black fw-bold fs-5">Proof of Payment</label>
    
                                
                                                                    </div>
                                                                
                                                                    <div class="col-xl-6">
                                                                        <label for="ctype" class="black fw-bold fs-5">Payment Details</label>
                                
                                                                    </div>
                                                                    <div class="col-xl-3">
                                
                                                                    </div>       
                                                                </div>
                                                            </div>
                                                            
                                                        
                                                        </div>
                                                        
                                                        
                                                        ';
    
                                                        $select = "Select * from tblpaymentlogs where creationID = ".$eid." and servicetype=1";
                                                        $query = $dbh->prepare($select);
                                                        $query ->execute();
                                                        $plog = $query->fetchAll(PDO::FETCH_OBJ);
    
                                                        foreach($plog as $i){
    
                                                        echo '
                                                            <div class="row">
                                                            <div class="col-12">
                                                            <div class="row g-2">
                                                            <div class="col-xl-6">
                                                            <div class="row">

                                                            <div class="col-12">
                                                                <a target = "_blank" href = "'.$i->proof.'"><img src="'.$i->proof.'" alt="" class="img-fluid"></a>
                                                            </div>

                                                            </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                            <table>';
                                                   
    
                                                            $cdate = date('F j, Y - h:i A', strtotime($i->paymentDate));
                                                            $adate = date('F j, Y - h:i A', strtotime($i->dateAccepted));
                                                            echo'
                                                            
                                                                    <table>
                                                                      <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="refnum" class="fs-5 text-primary pe-2">Date Submitted: </label> </td>  
                                                                        <td>
                                                                        <div class="fs-5 text-secondary"> '.$cdate.'</div>
                                                                        </td>
                                                                        </div>
                                                                    </tr>
                                                                      <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="refnum" class="fs-5 text-primary pe-2">Reference Number:</label> </td>  
                                                                        <td>
                                                                        <div class="col-10 py-2">         
                                                                        <input type="text" name = "refNum" id = "refnum" class="form-control" value = "'.$i->refNum.'" readonly>
                                                                        </td>
                                                                        </div>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="paid" class="fs-5 text-primary pe-2">Amount Paid:</label> </td>  
                                                                        <td>
                                                                        <div class="col-8 py-2">   
                                                                        <div class="input-group">
                                                                        <button class="btn btn-secondary disabled">₱</button>      
                                                                        <input style= "text-align:right" type="decimal" name = "paid" id = "paid" value = "'.$pdpd.'" class="form-control">
                                                                        </div>
                                                                        </td>
                                                                    </div>
    
                                                                    <tr>
                                                                    <td><div class="input-group py-1">
                                                                    <label for="payable" style = "text-align:right" class="fs-5 text-primary pe-2">Amount to Pay :</label></td>   
                                                                    <td>
                                                                    <div class="col-8 py-2">         
                                                                    <div class="input-group">
                                                                    <button class="btn btn-secondary disabled">₱</button>
                                                                    <input type="decimal" name = "cpayable" id = "topay" value = '.$arr[6].' style = "text-align:right" class="form-control" disabled>
                                                                    </div>
                                                                    </td>
                                                                    
                                                                    </div>    
                                                                    </div>
                                                                    </tr>
                                                                    <tr>
                                                                    ';
                                                                    $py = $i->pymnt;
                                                                    
                                                                    if ($ch > $cr){
                                                                        echo ' 
                                                                        <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="payable" style = "text-align:right" class="fs-5 text-primary pe-2">Change to claim :</label></td>   
                                                                        <td>
                                                                        <div class="col-8 py-2">         
                                                                        <div class="input-group">
                                                                        <button class="btn btn-secondary disabled">₱</button>
                                                                        <input type="decimal" name = "cpayable" id = "topay" value = '.$ch.' style = "text-align:right" class="form-control" disabled>
                                                                        </div>
                                                                        </td>
                                                                        
                                                                        </div>    
                                                                        </div>
                                                                        </tr>
                                                                        
                                                                        
                                                                        ';
                                                                    }else if ($ch < $cr){
                                                                        echo ' 
                                                                        <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="payable" style = "text-align:right" class="fs-5 text-primary pe-2">Credit to Settle :</label></td>   
                                                                        <td>
                                                                        <div class="col-8 py-2">         
                                                                        <div class="input-group">
                                                                        <button class="btn btn-secondary disabled">₱</button>
                                                                        <input type="decimal" name = "cpayable" id = "topay" value = '.$cr.' style = "text-align:right" class="form-control" disabled>
                                                                        </div>
                                                                        </td>
                                                                        
                                                                        </div>    
                                                                        </div>
                                                                        </tr>
                                                                        
                                                                        
                                                                        ';

                                                                    }


                                                                    echo'
                                                                    <tr>
                                                                    <td><div class="input-group py-1">
                                                                    <label for="refnum" class="fs-5 text-primary pe-2">Date Submitted: </label> </td>  
                                                                    <td>
                                                                    <div class="fs-5 text-secondary"> '.$adate.'</div>
                                                                    </td>
                                                                    </div>
                                                                </tr>
                                                                    </table';
                                                               
                                                        
                                                                
                                                        
                                                                }

                                                           if ($scheck == "SETTLED"){
                                                        echo ' <div class="row g-0" align= "right">
                                                        <div class="col-md-12  px-3 mx-auto my-2">
                                                            <div class="float-end">
                                                               
                                                            <a type ="button"  href = "admin-rentals.php" = "button" href = ""class="btn btn-secondary px-2"  >
                                                            <i class="fa fa-arrow-circle-left mx-1"></i>
                                                                    Done
                                                            </a>
                                                            </div>
                                                          
                                                            </div>
                                                            </div>';
                                                        
                                                    

                                                    }else{
                                                        echo ' <div class="row g-0" align= "right">
                                                        <div class="col-md-12  px-3 mx-auto my-2">
                                                            <div class="float-end">
                                                            
                                                            <button  type ="submit" name= "update" role = "button" class="btn btn-primary px-2" >
                                                            <i class= "fa fa-save mx-1"></i>Save</button>
                                                            <button type ="button" data-bs-toggle = "modal" href = "#decline-proof" role = "button" href = ""class="btn btn-danger px-2" data-bs-dismiss= "modal" >
                                                            <i class="fa fa-trash mx-1"></i>
                                                                    Reject
                                                            </button>
                                                            </div>
                                                          
                                                        </div>
                                                    </div>';

                                                    }
                                                }
                                                    }else{
                                                        $sql= "Select * from tblinformation";
                                                        $query = $dbh->prepare($sql);
                                                        $query->execute();
                                                        $inf = $query->fetchAll(PDO::FETCH_OBJ);
                                                        foreach($inf as $in){
                                                            
                                                        echo '
                                                        <div class="row pt-4">
                                                            <div class="col-12">
                                                                <div class="row">
                                                                   
                                                                    <div class="col-xl-6">
                                                                        <label for="ctype" class="black fw-bold fs-5">Proof of Payment</label>
    
                                
                                                                    </div>
                                                                
                                                                    <div class="col-xl-6">
                                                                        <label for="ctype" class="black fw-bold fs-5">Payment Details</label>
                                
                                                                    </div>
                                                                    <div class="col-xl-3">
                                
                                                                    </div>       
                                                                </div>
                                                            </div>
                                                            
                                                        
                                                        </div>
                                                        
                                                        
                                                        ';
    
                                                        $select = "Select * from tblpaymentlogs where creationID = ".$eid." and servicetype=1";
                                                        $query = $dbh->prepare($select);
                                                        $query ->execute();
                                                        $plog = $query->fetchAll(PDO::FETCH_OBJ);
    
                                                        foreach($plog as $i){
    
                                                        echo '
                                                            <div class="row">
                                                            <div class="col-12">
                                                            <div class="row g-2">
                                                            <div class="col-xl-6">
                                                            <div class="row">

                                                            <div class="col-12">
                                                                <a target = "_blank" href = "'.$i->proof.'"><img src="'.$i->proof.'" alt="" class="img-fluid"></a>
                                                            </div>

                                                            </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                            <table>';
                                                   
    
                                                            $cdate = date('F j, Y - h:i A', strtotime($i->paymentDate));
                                                            $adate = date('F j, Y - h:i A', strtotime($i->dateAccepted));
                                                            echo'
                                                            
                                                                    <table>
                                                                      <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="refnum" class="fs-5 text-primary pe-2">Date Submitted: </label> </td>  
                                                                        <td>
                                                                        <div class="fs-5 text-secondary"> '.$cdate.'</div>
                                                                        </td>
                                                                        </div>
                                                                    </tr>
                                                                      <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="refnum" class="fs-5 text-primary pe-2">Reference Number:</label> </td>  
                                                                        <td>
                                                                        <div class="col-10 py-2">         
                                                                        <input type="text" name = "refNum" id = "refnum" class="form-control" value = "'.$i->refNum.'" disabled>
                                                                        </td>
                                                                        </div>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="paid" class="fs-5 text-primary pe-2">Amount Paid:</label> </td>  
                                                                        <td>
                                                                        <div class="col-8 py-2">   
                                                                        <div class="input-group">
                                                                        <button class="btn btn-secondary disabled">₱</button>      
                                                                        <input style= "text-align:right" type="decimal" name = "paid" id = "paid" value = "'.$pdpd.'" class="form-control" disabled>
                                                                        </div>
                                                                        </td>
                                                                    </div>
    
                                                                    <tr>
                                                                    <td><div class="input-group py-1">
                                                                    <label for="payable" style = "text-align:right" class="fs-5 text-primary pe-2">Amount to Pay :</label></td>   
                                                                    <td>
                                                                    <div class="col-8 py-2">         
                                                                    <div class="input-group">
                                                                    <button class="btn btn-secondary disabled">₱</button>
                                                                    <input type="decimal" name = "cpayable" id = "topay" value = '.$arr[6].' style = "text-align:right" class="form-control" disabled>
                                                                    </div>
                                                                    </td>
                                                                    
                                                                    </div>    
                                                                    </div>
                                                                    </tr>
                                                                    <tr>
                                                                    ';
                                                                    $py = $i->pymnt;
                                                                    
                                                                    if ($ch > $cr){
                                                                        echo ' 
                                                                        <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="payable" style = "text-align:right" class="fs-5 text-primary pe-2">Change to claim :</label></td>   
                                                                        <td>
                                                                        <div class="col-8 py-2">         
                                                                        <div class="input-group">
                                                                        <button class="btn btn-secondary disabled">₱</button>
                                                                        <input type="decimal" name = "cpayable" id = "topay" value = '.$ch.' style = "text-align:right" class="form-control" disabled>
                                                                        </div>
                                                                        </td>
                                                                        
                                                                        </div>    
                                                                        </div>
                                                                        </tr>
                                                                        
                                                                        
                                                                        ';
                                                                    }else if ($ch < $cr){
                                                                        echo ' 
                                                                        <tr>
                                                                        <td><div class="input-group py-1">
                                                                        <label for="payable" style = "text-align:right" class="fs-5 text-primary pe-2">Credit to Settle :</label></td>   
                                                                        <td>
                                                                        <div class="col-8 py-2">         
                                                                        <div class="input-group">
                                                                        <button class="btn btn-secondary disabled">₱</button>
                                                                        <input type="decimal" name = "cpayable" id = "topay" value = '.$cr.' style = "text-align:right" class="form-control" disabled>
                                                                        </div>
                                                                        </td>
                                                                        
                                                                        </div>    
                                                                        </div>
                                                                        </tr>
                                                                        
                                                                        
                                                                        ';

                                                                    }


                                                                    echo'
                                                                    <tr>
                                                                    <td><div class="input-group py-1">
                                                                    <label for="refnum" class="fs-5 text-primary pe-2">Date Submitted: </label> </td>  
                                                                    <td>
                                                                    <div class="fs-5 text-secondary"> '.$adate.'</div>
                                                                    </td>
                                                                    </div>
                                                                </tr>
                                                                    </table';
                                                               
                                                        
                                                                
                                                        
                                                                }

                                                           if ($scheck == "SETTLED"){
                                                        echo ' <div class="row g-0" align= "right">
                                                        <div class="col-md-12  px-3 mx-auto my-2">
                                                            <div class="float-end">
                                                               
                                                            <a type ="button"  href = "admin-rentals.php" = "button" href = ""class="btn btn-secondary px-2"  >
                                                            <i class="fa fa-arrow-circle-left mx-1"></i>
                                                                    Done
                                                            </a>
                                                            </div>
                                                          
                                                            </div>
                                                            </div>';
                                                        
                                                    

                                                    }else{
                                                        echo ' <div class="row g-0" align= "right">
                                                        <div class="col-md-12  px-3 mx-auto my-2">
                                                            <div class="float-end">
                                                            
                                                            <button  type ="submit" name= "update" role = "button" class="btn btn-primary px-2" >
                                                            <i class= "fa fa-save mx-1"></i>Save</button>
                                                            <button type ="button" data-bs-toggle = "modal" href = "#decline-proof" role = "button" href = ""class="btn btn-danger px-2" data-bs-dismiss= "modal" >
                                                            <i class="fa fa-trash mx-1"></i>
                                                                    Reject
                                                            </button>
                                                            </div>
                                                          
                                                        </div>
                                                    </div>';

                                                    }
                                                }
                                                    }
                                                    
                                                }
                                               
                                             
                                           
                                            }

                                            if ($mcheck=="Cash"){
                                                


                                                echo ' <div class="row g-0" align= "right">
                                                <div class="col-md-12  px-3 mx-auto my-2">

                                                    <a type="button" style= "'.$sen.'"href ="#approve-transac" data-bs-toggle = "modal" role = "button" class="btn  btn-info text-white"><i class = "fa fa-paper-plane mx-1 white"></i><span class= "wal">Send</span></a>     
                                                    <button  style= "display:'. $hide.'"type ="submit" name= "update" role = "button" class="btn btn-primary px-2" >
                                                    <i class= "fa fa-save mx-1"></i>Save</button>
                                                    <button type ="button" data-bs-toggle = "modal" href = "#decline-proof" role = "button" href = ""class="btn btn-danger px-2" data-bs-dismiss= "modal" >
                                                    <i class="fa fa-trash mx-1"></i>
                                                            Reject
                                                    </button>
                                                 
                                                  
                                                </div>
                                            </div>';
                                            }?>
                                                        
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
    
    <div class="modal fade" id = "decline-proof" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger ">
                    <div class="modal-header bg-danger text-white bg-transparent ">
                        <div class="modal-title fs-5" id="delete">&nbsp;<i class = "fa fa-times-circle"></i>&nbsp;&nbsp;Declining registration </div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row mt-1 px-3">
                           
                        
                                <div class="row mt-2">
                                    
                                    
                                    <div class="col-md-12">
                                        <label for="decreason" >Decline Reason</label>
                                        <select name="decr" id="decreason" class= "form-select" onchange = "showOthersdec('other_txt-dec',this);">
                                            <option value="Insufficient credentials">Insufficient credentials</option>
                                            <option value="Detected inconsistency">Detected inconsistency</option>
                                            <option value="others">Others</option>
                                        </select>
                                        <div class="row g-0 my-2" id = "other_txt-dec" style= "display: none;">
                                 
                                 <div class="col-md-12">
                                     <input  type="text" class="form-control" placeholder= "Specify a reason here">
                                 </div>
                             </div>
                                    </div>
                                </div>
                               
                                <div class="row mt-2">
                                        <label for="remarks" >Remarks</label>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                            <textarea class="form-control" name= "rmrks" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;resize: none;"></textarea>
                                            <label for="floatingTextarea2">Remarks here (max 10 words)</label>
                                                
                                            </div>
                                        </div>
                                   
                                </div>
                                <div class="row mt-2">
                                   
                                </div>
                                <div class="row justify-content-center">
                                    
                                    <div class="col-md-12">
                                        <div class="float-end">
                                        <button  type = "submit" name= "deleterec" class= "btn btn-success">
                                            <i class= 'fa fa-paper-plane py-1 me-2'></i>Send
                                        </button>
                                        <button type = "button" class="btn btn-danger" data-bs-dismiss = "modal"  name = "no" value ="No">
                                            <i class= "fa fa-times me-2"></i>Discard
                                        </button>
                                        </div>
                                    </div>
                                    
                                </div>  
                         

                        </div>
                      
                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
        
    <?php
        include('services.php');
    ?>
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
                                            <textarea class="form-control"style= "height: 100px;" placeholder="Leave a comment here" id="floatingTextarea2"  ></textarea>
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
        </form>   

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
</script>
<script type="text/javascript">
    function showDiv(divId, element) {
        document.getElementById(divId).style.display = element.value == 'Business' ? 'flex' : 'none';
    }
    function showOthersdec(divId, element) {
        document.getElementById(divId).style.display = element.value == 'others' ? 'flex' : 'none';
    }
    function showOtherspurp(divId, element) {
        document.getElementById(divId).style.display = element.value == 'others' ? 'flex' : 'none';
    }
    function showOthers(divId, element) {
        document.getElementById(divId).style.display = element.value == 'others' ? 'block' : 'none';
    }
    function showotherEdit(divId, element) {
        document.getElementById(divId).style.display = element.value == '13' ? 'block' : 'none';
    }
    function newDuration(divid,element) {
        var ebut = document.getElementById(element);
        if (document.getElementById(divid).style.display == "none"){
            document.getElementById(divid).style.display = "block";
        }
        else{
            document.getElementById(divid).style.display = "none";
            
        }
        if(document.getElementById(element).classList.contains('btn-outline-primary')){
            document.getElementById(element).classList.remove('btn-outline-primary');
            document.getElementById(element).classList.add('btn-outline-secondary');
            document.getElementById(element).innerHTML = "<i class= 'fa fa-times-circle mx-1'></i>";
        }
        else{
            document.getElementById(element).classList.add('btn-outline-primary');
            document.getElementById(element).classList.remove('btn-outline-secondary');
            document.getElementById(element).innerHTML = "<i class= 'fa fa-edit mx-1'></i>";
        }
        

        
    }
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
     $('#result').html(data);
    }
   })
  }
 });
});



    </script>
 


</body>
</html>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                        var rentype = document.getElementById('rt').value;
                        if (rentype == "Rental/Boarder") {
                            document.getElementById('hm').disabled = true;
                        } else {
                            document.getElementById('hm').disabled = false;
                        }
                        document.getElementById(divId).style.display = element.value == 'Rental/Boarder' ? 'block' : 'none';
                    }
                    function showOthersdec(divId, element) {
                        document.getElementById(divId).style.display = element.value == 'others' ? 'flex' : 'none';
                    }
                </script>