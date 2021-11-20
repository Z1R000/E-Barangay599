<?php 
    session_start();
    error_reporting(1);
    $curr = "Manage Position";

    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
    header('location:logout.php');
    }else{
        $gid = $_GET['getid'];

        
      $sql ="SELECT tbladmin.ID as sad, tbladmin.*, tblresident.*, tblpositions.* from tbladmin join tblpositions on tblpositions.ID = tbladmin.BarangayPosition join tblresident on tblresident.ID = tbladmin.residentID WHERE tbladmin.ID = :gid";

    $query = $dbh->prepare($sql);
    $query->bindParam(':gid', $gid, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    $arr =[];
    $bday = "";
    $diff = 0;
    $term = 0;
    $start = "";

    foreach($result as $row)
    {   
        $get = $row->dayDuty;
        $pieces = explode(",",$get);
        $up="";

        for ($x = 0; $x <= count($pieces); $x++) {
            if ($pieces[$x] != 0){
                $up .= "$pieces[$x],"; 
            }
            
        }
        $piece ='';
        for ($i = 0; $i < strlen($up); $i++) {
            if (is_numeric($up[$i])) {
                $piece .= $up[$i];
            }
        }
        $day="";
        for ($y = 0; $y < 9; $y++){
            if ($piece[$y] != 0){
                $g = $piece[$y];
                $sqlg = "select * from tbldays WHERE ID = :g";
                $qg = $dbh->prepare($sqlg);
                $qg-> bindParam(':g', $g, PDO::PARAM_STR);
                $qg-> execute();
                $rg=$qg->fetchAll(PDO::FETCH_OBJ);
                if($qg->rowCount() > 0)
                {
                    foreach ($rg as $rg) {
                        $day .= "$rg->dDay ";
                    }
                }
            }
        }
        $gbd = $row->BirthDate;
        $gbd = date('Y-m-d', strtotime($gbd));
        $bday = date('j F Y', strtotime($gbd));
        $today = date('Y-m-d');
        $diff = date_diff(date_create($gbd), date_create($today));
        $fn = $row->LastName." ". $row->FirstName." ".$row->MiddleName." ".$row->Suffix;     
        $start1 = date_create($row->AdminRegDate);
        $start = date_create($row->AdminRegDate);

        $term = date_add($start1,date_interval_create_from_date_string("2 Years"));
      
        
        
    }

      
        
    $cname = $_POST['cname'];
    $usid = '';
      for ($i = 0; $i < strlen($cname); $i++) {
          if (is_numeric($cname[$i])) {
              $usid .= $cname[$i];
          }
      }
      $a = $b = $c = $d = $e = $f = $g = $h = $i = 0;
            if(isset($_POST['btncheck0'])){
                $a = 1;
            }
            if(isset($_POST['btncheck1'])){
            $b = 2;
            }
            if(isset($_POST['btncheck2'])){
            $c = 3;
            }
            if(isset($_POST['btncheck3'])){
                $d = 4;
            }
            if(isset($_POST['btncheck4'])){
                $e = 5;
            }
            if(isset($_POST['btncheck5'])){
                $f = 6;
            }
            if(isset($_POST['btncheck6'])){
                $g = 7;
            }
            if(isset($_POST['btncheck7'])){
                $h = 8;
            }
            $get = $a . "," . $b . "," . $c . "," . $d . "," . $e . "," . $f . "," .  $g . "," . $h;
        if(isset($_POST['submit'])){
          $sql = "update tbladmin set residentID=:usid, dayDuty=:get where ID = :gid";
          //echo $sql;
          $query = $dbh->prepare($sql);
          $query->bindParam(':get', $get, PDO::PARAM_STR);
          $query->bindParam(':usid', $usid, PDO::PARAM_STR);
          $query->bindParam(':gid', $gid, PDO::PARAM_STR);
          $query->execute();

          echo '<script>alert("Admin Official has been updated.")</script>';
          echo "<script>window.location.href ='admin-officials.php'</script>";
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
                                <li class="breadcrumb-item"><a  class= "text-decoration-none" href="admin-officials.php" role ="button"><i class="fa fa-id-card"></i>&nbsp;599 OFficials</a></li>
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-sitemap text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
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
                        <div class="btn-group">
                            <a href="admin-officials.php" class="btn btn-secondary"><i class="fa fa-arrow-circle-left mx-2"></i>Go Back</a>
                        </div>
                    </div>

                </div>
            </div>
     </div>
    <div class="container-fluid p-5 ">
        <?php
            $sql= 'SELECT tbladmin.ID as sad, tbladmin.*, tblresident.*, tblpositions.* from tbladmin join tblpositions on tblpositions.ID = tbladmin.BarangayPosition join tblresident on tblresident.ID = tbladmin.residentID WHERE tbladmin.ID ='.$gid.'';
            $query= $dbh->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            foreach($result as $row){

                $arr=[];

                            

            }
            
        ?>
        <form method="post">
        <div class="row">
        <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#ebgy" data-bs-toggle= "tab">E-barangay Account</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#person"data-bs-toggle= "tab">Personal Details</a>
                    </li>
                 
                    </ul>
                    <div class="tab-content ">
                        <div class="tab-pane active" id="ebgy">
                            <div class="row justify-content-center">
                                <div class="col-md-10 mt-4">
                                    <div class="row" align="center">
                                        <!--<div class="col-xl-12 my-3">
                                            <img src="../images/admin-logo.png" alt="" class="img-fluid border border-info rounded ava"  style = "height: 185px">
                                        </div>-->
                                        <!--<div class="col-xl-12 my-2">
                                        <input type="file" id="selectedFile" style="display: none;" />
                                        <button type="button"  class= "btn btn-primary" onclick="document.getElementById('selectedFile').click();" ><i class= "fa fa-camera me-2 "></i>Choose photo</button>
                                
                                        </div>-->
                                      
                                    </div>
                                        
                                    <div class="input-group">

                                        <input type="text" id = "search" class="form-control" name ="cname" value = "<?php echo $gid." ". $fn;?>" placeholder = "ID / Officials Name" style= "text-align:center;font-size: 1.4em;">
                                    </div>
                                    <div class="col" style= "z-index: 9;position:relative">
                                            <div class="list-group w-100"  id="show-list" style="position: absolute">
                                            <!-- Here autocomplete list will be display -->
                                            </div>
                                            </div>
                                    <div class="row justify-content-center text-center my-2">
                                        <h3>Day of Duty</h3>
                                        <div class="col-xl-12" align ="center">
                                      
                                        <div class="col-xl-12 my-2">
                                        <?php
                                                    $sql = "Select * from tbldays";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $res = $query->fetchAll(PDO::FETCH_OBJ);
                                                    $ctr = 0;
                                                    foreach ($res as $d){
                                                        if ($d->ID == $piece[$ctr]){
                                                            echo '  <div class = "btn-group p-1 active"><input type="checkbox" checked value = "'.$d->dDay.'" onclick="showHid()" class="btn-check" id="btncheck'.$ctr.'" name="btncheck'.$ctr.'" autocomplete="off" ">
                                                            <label class="btn btn-outline-primary" for="btncheck'.$ctr.'">'.$d->dDay.'</label></div>';    
                                                        }
                                                        else{
                                                        echo '  <div class = "btn-group p-1"><input type="checkbox" value = "'.$d->dDay.'" name="btncheck'.$ctr.'"class="btn-check" onclick="showHid()" id="btncheck'.$ctr.'" autocomplete="off"">
                                                        <label class="btn btn-outline-primary" for="btncheck'.$ctr.'">'.$d->dDay.'</label></div>';
                                                        }
                                                        $ctr ++;

                                                    }
                                            ?>
                                        
                                            
                                        </div>

                                        </div>

                                        </div>
                                  
                                   
                    
                                    <div class="row my-2">
                                        <div class="col-xl-12 my-2" >
                                        <div class="float-end">
                                        
                                        <div class="btn-group"><button type= "submit" name="submit" class= "btn btn-success"><i class= "fa fa-save me-2"></i>Save</button>
                                        </div>
                                        <div class="btn-group"><a href="admin-officials.php"class= "btn btn-secondary"><i class= "fa fa-times-circle me-2"></i>Cancel</a>
                                        </div>
                                        </div>
                                        </div>

                                    </div>
                                    
                                </div>
                            </div>            
                        </div>
                        </form>
                        <div class="tab-pane" id="person">
                            <div class="row g-0 justify-content-center  ms-2 me-3">
                                <div class="col-md-12 mt-4">        
                                    <table class="table">
                                    <tr>
                                            <th>
                                                <i class="fa fa-phone-square me-2"></i>Barangay Position
                                            </th>
                                            <td style= "text-align:right">
                                                 <?php echo $row->Position;?>
                                            </td> 
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-phone-square me-2"></i>Contact Number
                                            </th>
                                            <td style= "text-align:right">
                                                 <?php echo $row->Cellphnumber;?>
                                            </td> 
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-circle me-2"></i>Civil Status
                                            </th>
                                            <td style= "text-align:right">
                                                <?php echo $row->CivilStatus;?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-id-card me-2"></i>Age
                                            </th>
                                            <td style= "text-align:right">
                                                    <?php echo $diff->format('%y');?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-venus-mars me-2"></i>Gender
                                            </th>
                                            <td style= "text-align:right">
                                                <?php
                                                    echo $row->Gender;
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-birthday-cake me-2"></i>Date of Birth
                                            </th>
                                            <td style= "text-align:right">
                                                <?php
                                                
                                                    echo $bday;
                                                
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-check-square me-2"></i>Day/s of Duty
                                            </th>
                                            <td style= "text-align:right">
                                            <?php
                                                    echo $day;
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-calendar me-2"></i>Term
                                            </th>
                                            <td style= "text-align:right">
                                            <?php
                                                    echo $start->format('20y')."-".$term->format('20y');
                                                ?>
                                            </td>
                                        </tr>
                                                </table>                            
                                </div>
                            </div>
           
        </div>    

          <?php  ?>     
    <?php
        include('services.php');
    ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
        function showHid(){
            if ( document.getElementById('btncheck0').checked == true) {
                document.getElementById("btncheck1").disabled = true;
              	document.getElementById("btncheck2").disabled = true;
                  document.getElementById("btncheck3").disabled = true;
              	document.getElementById("btncheck4").disabled = true;
                  document.getElementById("btncheck5").disabled = true;
              	document.getElementById("btncheck6").disabled = true;
                  document.getElementById("btncheck7").disabled = true;

            } else {
                document.getElementById("btncheck1").disabled = false;
              	document.getElementById("btncheck2").disabled = false;
                  document.getElementById("btncheck3").disabled = false;
              	document.getElementById("btncheck4").disabled = false;
                  document.getElementById("btncheck5").disabled = false;
              	document.getElementById("btncheck6").disabled = false;
                  document.getElementById("btncheck7").disabled = false;
            }
  			
  			if ( document.getElementById('btncheck1').checked == true || document.getElementById('btncheck2').checked == true || document.getElementById('btncheck3').checked == true || document.getElementById('btncheck4').checked == true || document.getElementById('btncheck5').checked == true || document.getElementById('btncheck6').checked == true || document.getElementById('btncheck7').checked == true) {
                document.getElementById("btncheck0").disabled = true;

            } else if ( document.getElementById('btncheck1').checked == false || document.getElementById('btncheck2').checked == false || document.getElementById('btncheck3').checked == false || document.getElementById('btncheck4').checked == false || document.getElementById('btncheck5').checked == false || document.getElementById('btncheck6').checked == false || document.getElementById('btncheck7').checked == false) {
                document.getElementById("btncheck0").disabled = false;
            }
        }
</script>



</body>
</html>
<?php } ?>