<?php
session_start();
error_reporting(1);
$curr = "599 Officials";
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');    
  } else{   
    $sql ="SELECT tblresident.ID as didd, tbladmin.*, tblresident.*, tblpositions.* from tbladmin join tblpositions on tblpositions.ID = tbladmin.BarangayPosition join tblresident on tblresident.ID = tbladmin.residentID WHERE tbladmin.ID = 1";

    $query = $dbh->prepare($sql);
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
      
        array_push($arr, $row->Position);
        array_push($arr, $row->didd." ". $row->LastName." ". $row->FirstName." ".$row->MiddleName." ".$row->Suffix);
        array_push($arr,$row->Cellphnumber);
        array_push($arr, $row->CivilStatus);
        array_push($arr,$row->Gender);
        array_push($arr,$day);
        array_push($arr,$row->Email);
        array_push ($arr,$row->Password);
        array_push($arr,$row->residentID);
        
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curr;?></title>
   
    <?php include('link.php');?>
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
         @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond&family=Eczar&family=Gentium+Basic&family=Libre+Baskerville&family=Libre+Franklin&family=Proza+Libre&family=Rubik&family=Taviraj&family=Trirong&family=Work+Sans&display=swap');
        .bg-bar{
            background-image: url('../images/barangaybackground.png');
            background-size: cover;
            

        }
        tr,td,th{
            vertical-align: middle;
            font-size:1.05em;
        }
         .pab{
            
            position: absolute;
            top: 180px;
            right: 5px;
        }
        .white{
            color: white;
        }
        .try{
            margin:auto;
            width: 1000px;
            height: 150px;
        }
        h5,h4{
            font-family: 'Eczar', serif;
        }
        .cam{
            display:none;
            position: absolute;
            bottom: 50px;
            right:50px;
            left: 50px;
            top:50px;
            color: #012f4e;
            font-weight: bold;
            
        }
        .ava{
            cursor: pointer;
        }
        .ava:hover{
            transition: 1.5s;
    
        }
        .ava:hover img{
      
            transition: .92s;
            opacity: 40%;
        }
        .ava:hover .cam{
            
            display:block;
        }
        .avat{
            position:absolute;
            top:30px;   
        }
        .kan{
            margin-left: 4.5%;
        }
        @media(max-width: 991px){
            .kan{
                margin-left: 1%;
            }
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
                              
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-user-shield text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>  
    
    <div class="container-fluid  mx-2 px-3">
        <div class="row  gx-0  pb-5" >
                <div class="col-xl-3 col-lg-4 col-md-12 mb-3 shadow-lg rounded-3 kan border me-4">
                    <div class="row g-0 bg-dark shadow-lg rounded-top border py-1 bg-dark "></div>
                        <div class="row g-0 "  style= "background: aliceblue">
                            <div class = "text-left text-danger mt-2 border-bottom">
                                <h4 class = "ms-3">
                                    <?php echo $arr[0]?>
                                    <div class="float-end me-3" data-bs-toggle= "tooltip" data-bs-placement = "top" title ="Account settings (e.g email, passwords)">
                                    <a href="#account-owner" class= "link link-white" role = "button" data-bs-toggle= "modal"><i class="fa fa-cog link-secondary fs-3 "  ></i></a>
                                </div> 
                                </h4>
                            </div>
                            <div class="col-md-11 px-1 pb-4 mx-auto position-relative " align= "center">
                                <img src="../images/admin-logo.png" alt="" class="img-fluid rounded-circle "  style = "height: 135px">
                          
                                <div class= "text-center fs-3 text-secondary"><?php echo $fn;?></div>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="row g-0 border bg-light" >        
                                <div class="col-xl-11 mx-1 ">       
                                    <table class="table my-3" >
                                        <tr class= "">
                                            <th class =""><i class= "fa fa-phone-square me-1"></i>Contact</th>
                                            
                                            <td colspan = 2 style ="text-align: right; padding-right: 6%;" >
                                            <?php echo $arr[2]; ?>
                                            </td>
                                            
                                        </tr>
                                  
                                        <tr class= "">
                                            <th class =""><i class= "fa fa-circle me-1"></i>Civil Status  </th>
                                            
                                            <td colspan = 2 style ="text-align: right; padding-right: 6%;" >
                                            <?php echo $arr[3]; ?>
                                            </td>
                                            
                                        
                                        </tr>
                                        <tr class= "">
                                            <th class =""><i class= "fa fa-address-card me-1"></i>Age  </th>
                                        
                                            <td colspan = 2 style ="text-align: right; padding-right: 6%;" >
                                                <?php echo $diff->format('%y');?>
                                            </td>
                                            
                                        </tr>
                                        <tr class= "">
                                            <th class =""><i class= "fa fa-venus-mars me-1"></i>Gender </th>
                                        
                                            <td colspan = 2 style ="text-align: right; padding-right: 6%;" >
                                           <?php echo $arr[4];?>
                                            </td>
                                        
                                        </tr>
                                        <tr class= "">
                                            <th class =""><i class= "fa fa-birthday-cake me-1"></i>Birthdate </th>
                                        
                                            <td colspan = 2 style ="text-align: right; padding-right: 6%;" >
                                            <?php echo $bday;?>
                                            </td>
                                        
                                        </tr>
                                        <tr class= "">
                                            <th class =""><i class= "fa fa-check-square me-1"></i>Day/s of Duty</th>
                                                <td colspan = 2 style ="text-align: right; padding-right: 6%;">
                                                   <?php echo $arr[5]?>
                                                </td>
                                        </tr>
                                        <tr class= "">
                                        
                                            <th class =""><i class= "fa fa-calendar me-1"></i>Term</th>
                                            <td colspan = 2 style ="text-align: right; padding-right: 6%;">
                                                <?php echo $start->format('20y')."-".$term->format('20y');?>
                                            </td>
                                        
                                        </tr>
                                        
                                     </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-6 col-md-12 px-4 border-start border-secondary bg-light " style= "max-height: 650px; overflow-y: auto;">
                        <div class="row g-2 pb-3"  >   
                            <?php
                               $sql ="SELECT tbladmin.ID as diode, tbladmin.*, tblresident.ID as rid, tblresident.*,tblpositions.*from tbladmin join tblpositions on tblpositions.ID = tbladmin.BarangayPosition join tblresident on tblresident.ID = tbladmin.residentID WHERE tbladmin.ID > 1";
                               $query = $dbh->prepare($sql);
                               $query -> execute();
                               $result = $query->fetchAll(PDO::FETCH_OBJ);
                               
                               $ct=0;
                               $bday = "";
                               $diff = 0;
                               $term = 0;
                               $start = "";

                               foreach($result as $r){
                                $get = $r->dayDuty;
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
                                    $gbd = $r->BirthDate;
                                    $bday = date('j F Y', strtotime($gbd));
                                    $today = date('Y-m-d');
                                    $diff = date_diff(date_create($gbd), date_create($today));
                            
                                    $start1 = date_create($r->AdminRegDate);
                                    $start = date_create($r->AdminRegDate);
                            
                                    $term = date_add($start1,date_interval_create_from_date_string("2 Years"));
                                    $acterm = $start->format('20y')."-".$term->format('20y');
                                

                                    $mid = $r->MiddleName;
                                    
                                    echo '       
                                    <div class="col-xl-4  border-secondary px-3"  >
                                        <div class="row g-0 shadow-lg">
                                            <div class="row g-0 bg py-1 bg-light">
                                        </div>
                                        <div class="row g-0   justify-content-center bg-bar ">
                                            <div class= "ms-4"><span class="fs-5 text-info">'.$r->Position.'</span></div> 
                                            <div class="col-xl-8 position-relative pt-2 text-center">
                                                <img src="../images/barangay.png" alt="" class= "img-fluid rounded-circle" style= "height: 130px;">
                                            </div>
                                                <h5 class= "text-center text-white">
                                                    '.ucfirst($r->FirstName)." ".ucfirst($mid[0]).". ".ucfirst($r->LastName)." ".ucfirst($r->Suffix).'
                                                </h5>
                                        </div>
                                        <div class="row g-0  bg-light text-center">
                                            <div class="col-xl-12 my-2">
                                                <a href = "manage-position.php?getid='.$r->diode.'" class= "link link-info"><i class= "fa fa-edit text-info"></i> Manage </a>      
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    



                                    ';   
                                    $ct++;
                               }
                        
                                ?>
                        
                        </div>
                    </div>                
            </div>
        </div>

    <div class="modal fade" id = "change-dp" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-sm">
                <div class="modal-content bg-info g-0  ">
                    <div class="modal-header bg-info  ">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row" align="center">
                            <div class="col-xl-12">
                                <img src="../images/admin-logo.png" alt="" class="img-fluid border border-info rounded ava"  style = "height: 185px">
                            </div>
                            <div class="col-xl-12 my-2">
                            <input type="file" id="selectedFile" style="display: none;" />
                            <button type="button"  class= "btn btn-primary" onclick="document.getElementById('selectedFile').click();" ><i class= "fa fa-camera me-2 "></i>Choose photo</button>
                      
                            </div>
                            <div class="col-xl-12">
                            <button type= "submit" class= "btn btn-success"><i class= "fa fa-save me-2"></i>Save</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div> 
        
        <?php include ('edit-acc.php')?>


       
        <?php 
            include('edit-sub.php');
        ?>
    


<?php } ?>

                                                
</body>
</html>