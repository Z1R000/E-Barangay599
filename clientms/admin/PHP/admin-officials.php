<?php
session_start();
error_reporting(1);
$curr = "599 Officials";
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');    
  } else{   
    $sql ="SELECT tbladmin.*, tblresident.*,tblpositions.*, tbldays.* from tbladmin join tblpositions on tblpositions.ID = tbladmin.BarangayPosition join tblresident on tblresident.ID = tbladmin.residentID join tbldays on tbldays.ID = tbladmin.dayDuty and tbladmin.ID = 1";

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
        $gbd = $row->BirthDate;
        $bday = date('j F Y', strtotime($gbd));
        $today = date('Y-m-d');

        $diff = date_diff(date_create($gbd), date_create($today));
        
        $start1 = date_create($row->AdminRegDate);
        $start = date_create($row->AdminRegDate);

        $term = date_add($start1,date_interval_create_from_date_string("2 Years"));
      
        array_push($arr, $row->Position);
        array_push($arr, $row->LastName." ". $row->FirstName." ".$row->MiddleName." ".$row->Suffix);
        array_push($arr,$row->Cellphnumber);
        array_push($arr, $row->CivilStatus);
        array_push($arr,$row->Gender);
        array_push($arr,$row->dDay);
        array_push($arr,$row->Email);
        array_push ($arr,$row->Password);
        
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
                          
                                <div class= "text-center fs-3 text-secondary"><?php echo $arr[1];?></div>
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
                               $sql ="SELECT tbladmin.BarangayPosition, tblresident.Gender,tblpositions.Position, tblresident.CivilStatus,tblresident.BirthDate,tblresident.LastName, tblresident.FirstName, tblresident.MiddleName, tblresident.Suffix, tblresident.Cellphnumber, tbladmin.Email,tbladmin.Password, tbladmin.AdminRegdate, tbldays.dDay from tbladmin inner join tblpositions on tblpositions.ID = tbladmin.BarangayPosition inner join tblresident on tblresident.ID = tbladmin.residentID inner join tbldays on tbldays.ID = tbladmin.dayDuty and tbladmin.ID > 1";
                               $query = $dbh->prepare($sql);
                               $query -> execute();
                               $result = $query->fetchAll(PDO::FETCH_OBJ);
                               
                               $ct=0;
                               $bday = "";
                               $diff = 0;
                               $term = 0;
                               $start = "";

                               foreach($result as $r){
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
                                                    '.ucfirst($r->LastName).",".ucfirst($r->FirstName)." ".ucfirst($mid[0]).". ".ucfirst($r->Suffix).'
                                                </h5>
                                        </div>
                                        <div class="row g-0  bg-light text-center">
                                            <div class="col-xl-12 my-2">
                                                <a href = "#account'.$ct.'" data-bs-toggle= "modal"class= "link link-info"><i class= "fa fa-edit text-info"></i> Manage'.$ct.' </a>      
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    

                                    <div class="modal fade" id = "account'.$ct.'" tab-idndex = "-1">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                        <div class="modal-content bg-dark g-0  ">
                                            <div class="modal-header bg-dark  ">
                                                <h4 class="modal-title text-white"><i class= "fa fa-cog text-secondary"></i> E-barangay Account Settings</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body bg-white">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" aria-current="page" href="#ebgy'.$ct.'" data-bs-toggle= "tab">E-barangay Account</a>
                                                    </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#person'.$ct.'"data-bs-toggle= "tab">Personal Details</a>
                                                </li>
                                                </ul>
                                                <div class="tab-content ">
                                                    <div class="tab-pane active" id="ebgy'.$ct.'">
                                                        <div class="container pt-4">
                                                            <div class="row g-3 justify-content-center">
                                                                <div class="col-10">
                                                                    <div class="input-group">

                                                                        <input type="text" id = "search'.$ct.'" name= "fullName'.$ct.'" class="form-control ser." value = "'.ucfirst($r->LastName).",".ucfirst($r->FirstName)." ".ucfirst($r->MiddleName).". ".ucfirst($r->Suffix).'" placeholder = "Officials Name" style= "text-align:center;font-size: 1.4em;" readonly>
                                                                        <button class="btn btn-info text-white" onclick = "ful'.$ct.'()" type ="button">
                                                                        <i class="fa fa-edit">
                                                                       
                                                                        </i>    
                                                                        </button>

                                                                    </div>
                                                                    <script>
                                                                        function ful'.$ct.'(){
                                                                            var ps = document.getElementById(\'search'.$ct.'\').readOnly;
                    
                                                                            if (ps){
                                                                                document.getElementById(\'search'.$ct.'\').readOnly = false;
                                                                            }
                                                                            else{
                                                                                document.getElementById(\'search'.$ct.'\').readOnly = true;
                                                                            }
                                                                        }
                                                                    </script>
                                                                    <script>

                                                                            $(document).ready(function () {
                                                                            // Send Search Text to the server
                                                                            $("#search'.$ct.'").keyup(function () {
                                                                                let searchText = $(this).val();
                                                                                if (searchText != "") {
                                                                                $.ajax({
                                                                                    url: "searchname.php",
                                                                                    method: "post",
                                                                                    data: {
                                                                                    query: searchText,
                                                                                    },
                                                                                    success: function (response) {
                                                                                    $("#show-list'.$ct.'").html(response);
                                                                                    },
                                                                                });
                                                                                } else {
                                                                                $("#show-list'.$ct.'").html("");
                                                                                }
                                                                            });
                                                                            $(document).on("click", "#clicks", function () {
                                                                                $("#search'.$ct.'").val($(this).text());
                                                                                $("#show-list'.$ct.'").html("");
                                                                            });
                                                                            });


                                                                            </script>
                                                                    <div class="col" style= "z-index: 9;position:relative">
                                                                    <div class="list-group w-100"  id="show-list'.$ct.'" style="position: absolute">
                                                                    <!-- Here autocomplete list will be display -->
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 ">
                                                                    <div class="row justify-content-center">
                                                                    <div class="col-12" align = \'center\'>
                                                                        <h3 class= "text-center">Day of Duty</h3>';
                                                                        
                                                                        $sql = "Select * from tbldays";
                                                                        $query = $dbh->prepare($sql);
                                                                        $query->execute();
                                                                        $res = $query->fetchAll(PDO::FETCH_OBJ);
                                                                        $ctr = 0;
                                                                        foreach ($res as $d){
                                                                            if ($d->dDay == $row->dDay){
                                                                                echo ' 
                                                                                 <div class = "btn-group p-1 "><input type="checkbox"   value = "'.$d->dDay.'" class="btn-check" id="erday'.$ctr.$ct.'" autocomplete="off" >
                                                                                <label class="btn btn-outline-primary" for="btncheck'.$ctr.$ct.'">'.$d->dDay.'</label></div>';    
                                                                            }

                                                                            else{
                                                                            echo '  <div class = "btn-group p-1"><input type="checkbox" value = "'.$d->dDay.'" class="btn-check" id="btncheck'.$ctr.$ct.'" autocomplete="off">
                                                                            <label class="btn btn-outline-primary" for="btncheck'.$ctr.$ct.'">'.$d->dDay.'</label></div>';
                                                                            }
                                                                            $ctr ++;
                    
                                                                        }
                                                        echo '
                                                        <div class="row justify-content-center">
                                                        <div class="col-xl-12 text-center">
                
                                                            <label for="email" class="fs-5 text-secondary">Email Address</label>
                                                            <div class="input-group">
                                                                <input type="email" value = "'.$r->Email.'"id = "email'.$ct.'"class="form-control" placeholder = "e.g chairman@gmail.com" readonly>
                                                                <button type= "button" name= "edit-em" class="btn btn-info" onclick = \'em'.$ct.'()\'>
                                                                    <i class= "fa fa-edit text-white"></i>
                                                                </button>
                
                                                            </div>
                
                                                            <script>
                                                                    function em'.$ct.'(){
                                                                        var ps = document.getElementById(\'email'.$ct.'\').readOnly;
                
                                                                        if (ps){
                                                                            document.getElementById(\'email'.$ct.'\').readOnly = false;
                                                                        }
                                                                        else{
                                                                            document.getElementById(\'email'.$ct.'\').readOnly = true;
                                                                        }
                                                                    }
                                                                </script>
                                                            
                                                        
                                                        </div>
                                                    </div>
                                                    
                                                        <div class="row justify-content-center">
                                                        <div class="col-xl-12 text-center">
                                                            <label for="pas" class="fs-5 text-secondary">Password</label>
                                                            <div class="input-group">
                                                                <input type="text" value = "'.$r->Password.'" id = "pas'.$ct.'" class="form-control" placeholder = "123456" readonly >
                                                                <button type= "button" name= "editpas" class="btn btn-info" onclick = \'pas'.$ct.'()\' >
                                                                    <i class= "fa fa-edit text-white"></i>
                                                                </button>
                                                                <script>
                                                                    function pas'.$ct.'(){
                                                                        var ps = document.getElementById(\'pas'.$ct.'\').readOnly;
                
                                                                        if (ps){
                                                                            document.getElementById(\'pas'.$ct.'\').readOnly = false;
                                                                        }
                                                                        else{
                                                                            document.getElementById(\'pas'.$ct.'\').readOnly = true;
                                                                        }
                                                                    }
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-xl-12 my-2" >
                                                            <div class="float-end">
                                                                <div class="btn-group"><button type= "submit" onclick= "alert(\'Credential Update Successful\')" class= "btn btn-success"><i class= "fa fa-save me-2"></i>Save</button>
                                                                </div>
                                                                <div class="btn-group"><button type= "button" data-bs-dismiss="modal" class= "btn btn-secondary"><i class= "fa fa-times-circle me-2"></i>Cancel</button>
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
                                                    
                                                    <div class="tab-pane " id = "person'.$ct.'">
                                                    <div class="row g-0 justify-content-center  ms-2 me-3">
                                                    <div class="col-md-12 mt-4">        
                                                        <table class="table">
                                                            <tr>
                                                                <th>
                                                                    <i class="fa fa-phone-square me-2"></i>Contact Number
                                                                </th>
                                                                <td style= "text-align:right">
                                                                     '.$r->Cellphnumber.'
                                                                </td>
                                                                 
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <i class="fa fa-circle me-2"></i>Civil Status
                                                                </th>
                                                                <td style= "text-align:right">
                                                                    '.$r->CivilStatus.'
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <i class="fa fa-id-card me-2"></i>Age
                                                                </th>
                                                                <td style= "text-align:right">
                                                                    '.$diff->format('%y').'
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <i class="fa fa-venus-mars me-2"></i>Gender
                                                                </th>
                                                                <td style= "text-align:right">
                                                                   '.$r->Gender.'
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <i class="fa fa-birthday-cake me-2"></i>Date of Birth
                                                                </th>
                                                                <td style= "text-align:right">
                                                                   '.$bday.'
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <i class="fa fa-check-square me-2"></i>Day/s of Duty
                                                                </th>
                                                                <td style= "text-align:right">
                                                                    '.$r->dDay.'
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    <i class="fa fa-calendar me-2"></i>Term
                                                                </th>
                                                                <td style= "text-align:right">
                                                                    '.$acterm.'
                                                                </td>
                                                            </tr>
                                                            </table>
                                                            </div>
                                                                      
                                                    </div>
                                                    <div class="row my-2">
                                                    <div class="col-xl-12 my-2" >
                                                        <div class="float-end">
                                                           
                                                            <div class="btn-group"><button type= "button" data-bs-dismiss="modal" class= "btn btn-secondary"></i>Done</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                    </div>
                                                
                                                </div>
                                          </div></div>
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

<script>
   
</script>
                                                
</body>
</html>