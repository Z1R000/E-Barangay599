<?php 
    $curr ="Manage Rental";

    session_start();
    error_reporting(1);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
    header('location:logout.php');
    }else{
        $sql= "SELECT tblstatus.ID as statid, tblcreaterental.proof,tblcreaterental.ID,tblrental.ID as renid,tblresident.ID as resid,tblcreaterental.payable, tblcreaterental.rentalStartDate, tblcreaterental.rentalEndDate,tblcreaterental.creationDate, tblpurposes.Purpose, tblresident.FirstName, tblresident.LastName,tblresident.MiddleName, tblresident.Suffix,tblrental.rentalName, tblrental.rentalPrice, tblmodes.mode, tblstatus.statusName,tblpurposes.ID as purposeID FROM tblcreaterental INNER JOIN tblpurposes ON tblcreaterental.purpID = tblpurposes.ID INNER JOIN tblresident ON tblresident.ID = tblcreaterental.userID INNER JOIN tblrental ON tblrental.ID = tblcreaterental.rentalID INNER JOIN tblmodes ON tblmodes.ID = tblcreaterental.modeOfPayment INNER JOIN tblstatus ON tblstatus.ID = tblcreaterental.status and tblcreaterental.ID =".$_GET['rid']." ";
        $query = $dbh ->prepare($sql);
        $query ->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
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
            array_push($arr,$r->ID);
            array_push($arr,$r->LastName.", ".$r->FirstName." ".$r-> MiddleName." ".$r->Suffix);
            array_push ($arr, $r->purpID);
            array_push($arr,date("Y-d-m",strtotime($cdate)));
            array_push($arr,$sdate);
            array_push($arr,$edate);
            array_push($arr, $r->payable);
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
        
        if($arr[8]=="G-cash"){
         
            $det = "disabled";
            $sql = "Select * from tblstatus where ID = 2 or ID = 3 or ID= 4 or ID= 7";
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
                modeOfPayment = '.$mode.' where ID ='.$arr[0].';';
            }
            else{
                $det = "";
                $status = $_POST['stat'];
                $fupdate = 'Update tblcreaterental set status = '.$status.' ,rentalStartDate = "'.$start.'" ,rentalEndDate = "'.$end.'"
                ,modeOfPayment = '.$mode.' ,payable = '.$send.'
                
                where ID ='.$arr[0].';';
            }


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
            
            where ID ='.$arr[0].';';
        }

        if ($arr[9]=="PAYMENT VERIFIED"){
            $btn= "disabled";
            $sql = "Select * from tblstatus where  ID= 5 or ID= 6";
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
            where ID ='.$arr[0].';';
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
                modeOfPayment = '.$mode.' where ID ='.$arr[0].';';
            }
            else{
                $det = "";
                $status = $_POST['stat'];
                $fupdate = 'Update tblcreaterental set status = '.$status.' ,rentalStartDate = "'.$start.'" ,rentalEndDate = "'.$end.'"
                ,modeOfPayment = '.$mode.' ,payable = '.$send.'
                
                where ID ='.$arr[0].';';
            }

        }

        if ($arr[9] == "FOR PICK-UP"){
            $sen = "flex";
            $btn = "disabled";
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
            $fupdate = 'Update tblcreaterental set status = '.$status.'  
            where ID ='.$arr[0].';';
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

        

        if (isset($_POST['update'])){
            
            //payable computation
            //echo $ad."</br>";
            //echo $userid."</br>";
            //echo $stat."</br>";
            //echo $rtype."</br>";
            //echo $purp."</br>";
            echo $mode."</br>";
            echo $start."</br>";
            echo $end."</br>";
            echo $rate."</br>";  
            echo $send."</br>";
            echo $status;
            echo "</br>".$fupdate;
            /*$sql = 'Update tblcreaterental set 
                    status ='.$stat.',rentalStartDate = "'.$start.'", rentalEndDate = "'.$end.'", modeOfPayment = '.$mode.',  payable = '.$send.'
                     

                    where ID ='.$arr[0].';';*/

            if ($con->query($fupdate)===TRUE){
                header('Location: edit-rental.php?rid='.$arr[0].'&update=success');
            }
            else{
                echo "lima";
            }


        }
        if (isset($_POST['del-rec'])){

           $sql = "Update tblcreaterental set status = 8 where ID = ".$arr[0]." ";

           if ($con->query($fupdate)===TRUE){
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
            <div class="col-xl-8   mx-auto">
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
                                        <input type= "text" value ="<?php echo $arr[0]; ?>" name = "id" style= "display:none;">
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
                                            if ($row->Purpose == $arr[2] ){
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
                                        <label for="prate" class="fs-5 fw-bold">Rental Date</label>
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
                                                <?php
                                                   
                                                    
                                                
                                                
                                                ?>
                                                    <label for="prate" class="fs-5 fw-bold">Rental Status</label>
                                                    <select name="stat" class="form-select" id="status" <?php echo $det?>>
                                                           <?php echo $stat; ?>       
                                                    </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row g-3">
                                                    <div class="fs-5">Payment Verification</div>
                                                        <div class="col-xl-6">
                                                            
                                                            <a href = "" target= "_blank" ><img src  ="" class = "img-fluid"></a> 
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="fs-5">Payment Details</div>
                                                            <a href = "" target= "_blank" ><img src ="" class = "img-fluid"></a> 
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>                                                                
                                            <div class="row g-0" align= "right">
                                                <div class="col-md-12  px-3 mx-auto my-2">

                                                    <a type="button" style= "<?php echo $sen; ?>"href ="#approve-transac" data-bs-toggle = "modal" role = "button" class="btn  btn-info text-white"><i class = "fa fa-paper-plane mx-1 white"></i><span class= "wal">Send</span></a>     
                                                    <button  style= "display:<?php echo $hide?>"type ="submit" name= "update" role = "button" class="btn btn-primary px-2" >
                                                    <i class= "fa fa-save mx-1"></i>Save</button>
                                                    <button type ="button" data-bs-toggle = "modal" href = "#delete-rental" role = "button" href = ""class="btn btn-danger px-2" data-bs-dismiss= "modal" >
                                                    <i class="fa fa-trash mx-1"></i>
                                                            Delete
                                                    </button>
                                                 
                                                  
                                                </div>
                                            </div>
                                             </form>                 
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
    <div class="modal fade" id = "delete-rental" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger" >
                    <div class="modal-header  white ">
                        <div class="modal-title bg-danger" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row">
                            <div class="col xl-4" align = "center">
                                <img src="../images/trash.png" alt="trash" class= " img-fluid " style ="width: 10%;">
                            </div>
                    
                        </div>
                        <div class="row">
                            <p class = "fs-4 text-center">You are about to delete an existing record, do you wish to continue?<br><span class="text-muted fs-6">*Select (<i class = "fa fa-check">)</i> if certain</span></p>
                        </div>
                        <div class="row justify-content-center" align = "center">
                            <form method = "POST">
                            <div class="col-xl-12">
                                <div class="float-end">
                              
                                    <div class="btn-group">
                                        <button type = "submit" class="btn btn-success "  name = "del-rec" value ="<?php echo $arr[0]?>">
                                    <i class= 'fa fa-check mx-1'></i>Confirm
                                               
                                </button>
                                </form>
                                </div>
                                <div class="btn-group">
                                <button type = "button" class="btn btn-danger " data-bs-dismiss = "modal"  name = "no" value ="No">
                                    <i class= "fa fa-times-circle mx-1"></i>Cancel
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