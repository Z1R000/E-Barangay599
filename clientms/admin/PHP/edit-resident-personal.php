<?php 
    $curr ="Resident Info";
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
      header('location:logout.php');
      } else{
        
        if(isset($_POST['submit']))
        {
            $eid=intval($_GET['editid']);
            $clientmsaid=$_SESSION['clientmsaid'];
            $rest=$_POST['rest'];
            $lname=$_POST['lname'];
            $fname=$_POST['fname'];
            $mname=$_POST['mname'];
            $hu=$_POST['hu'];
            $vp=$_POST['vp'];
            $prk=$_POST['prk'];
            $stn=$_POST['stn'];
            $gnd=$_POST['gnd'];
            $contact=$_POST['contact'];
            $cstat=$_POST['cstat'];
            $vstat=$_POST['vstat'];
            $email=$_POST['email'];
            $sss=$_POST['sss'];
            $tin=$_POST['tin'];
            $bdt=$_POST['bdt'];
        
            $sql="update tblresident set ResidentType=:rest, Purok=:prk, houseUnit=:hu, streetName=:stn, LastName=:lname, FirstName=:fname, MiddleName=:mname, houseUnit=:hu, streetName=:stn, Purok=:prk, Cellphnumber=:contact, CivilStatus=:cstat, voter=:vstat, Email=:email where ID=:eid";
            $query=$dbh->prepare($sql);
            $query->bindParam(':rest',$rest,PDO::PARAM_STR);
            $query->bindParam(':vstat',$vstat,PDO::PARAM_STR);
            $query->bindParam(':lname',$lname,PDO::PARAM_STR);
            $query->bindParam(':fname',$fname,PDO::PARAM_STR);
            $query->bindParam(':mname',$mname,PDO::PARAM_STR);
            $query->bindParam(':hu',$hu,PDO::PARAM_STR);
            $query->bindParam(':stn',$stn,PDO::PARAM_STR);
            $query->bindParam(':prk',$prk,PDO::PARAM_STR);
            $query->bindParam(':contact',$contact,PDO::PARAM_STR);
            $query->bindParam(':cstat',$cstat,PDO::PARAM_STR);
            $query->bindParam(':email',$email,PDO::PARAM_STR);
            $query->bindParam(':eid',$eid,PDO::PARAM_STR);
            $query->execute();
            echo '<script>alert("Resident detail has been updated")</script>';
            echo "<script type='text/javascript'> document.location ='edit-resident-account.php?editid=" + $eid + "'; </script>";
        }
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
    
    <link rel = "stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../css/scrollbar.css">
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
        
        table,td,tr,th{
            
            text-align: left;
            font-size: 1.10em;
            padding: 100px;
            font-family: 'Noto Sans Display', sans-serif;
            
        }
        .smol{
            width: 50px;
        }

        .white{
            color: white;
        }
        .black{
            color: #000;
        }
        .right{
            margin-left: 8.5%;
        }
        
        @media (max-width: 576px){
            .right{
                margin: auto;
            }
            .dis{
                font-size: 15px;
            }
            .ser{
                width: 100%;
            }
           
        }
    </style>
</head>
<body>

    <?php 
        include ('../includes/sidebar.php');
    ?> 
    <div class="d-flex align-items-center">
                <div class="container mx-5 mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a  class= "text-decoration-none" href="admin-residence.php"><i class="fa fa-users"></i>&nbsp;Resident List</a></li>
                            
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-address-book text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
    <?php
        $eid= $_GET['editid'];
        $sql="SELECT * from tblresident where ID=:eid";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':eid',$eid,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        $connect = mysqli_connect("localhost", "root", "", "clientmsdb");
       
        if($query->rowCount() > 0){
            foreach($results as $row)
            {   
                
                $gbd = $row->BirthDate;
                $gbd = date('Y-m-d', strtotime($gbd));
                $today = date('Y-m-d');
                $diff = date_diff(date_create($gbd), date_create($today));
    ?>
      <div class="container-fluid px-5">
                    <div class="row px-5">
                        <div class="col-xl-5"></div>
                        <div class="col-xl-7">
                            <div class="float-end">
                                <a href="#" onclick = "window.history.back();" class="link link-primary text-decoration-none fs-4"><i class="fa fa-arrow-circle-left me-2"></i>Go back</a>
                            </div>
                            
                        </div>
                    </div>
            </div>
    
    <div class="container-fluid mx-auto px-5 mb-5">
        <div class="row g-0 mx-2 ">
            <div class="row g-3 ">
                <div class="mx-auto col-xl-10 white  ">
                <form method="post"> 
                    <div class="row g-0 rounded-top"  style= "background-color:#021f4e">
                        <div class="fs-5 px-3 py-1"> <i class="fa fa-id-card-alt fa-1x me-1">
                                        </i>
                                Resident <?php echo $row->ID; ?>
                            </div>
                        </div>
                        <div class="row g-0  bg-white shadow-sm border">
                            <div class="col-xl-12 py-2 border-end" align = "center">
                                <button type = "button" onclick ="editname();"class="btn-primary btn">
                                    <i class="fa fa-edit me-2"></i>Edit Full Name
                                </button>
                                <div class="row g-0"></div>
                                    <div class="text-center  py-2">
                                        <div class="input-group">
                                            <input type="text" id ="lname" class="form-control display-6 border-0" value = "<?php echo $row->LastName;?>"
                                            readonly
                                            style = "font-size: 2em;text-align:center;width: 10%">
                                            <input type="text" id = "fname" class="form-control display-6  border-0" value = "<?php echo $row->FirstName;?>"
                                            readonly
                                            style = "font-size: 2em;text-align:center ;width: 11%">

                                            <input type="text" id= "mname" class="form-control display-6  border-0" value = "<?php echo $row->MiddleName;?>"
                                            readonly
                                            style = "font-size: 2em;text-align:center;width: 12%">
                                            
                                            <input type="text" id= "suf" class="form-control display-6  border-0" value = "<?php echo $row->suffix;?>"
                                            readonly
                                            style = "font-size: 2em;text-align:center;width: 4%" placeholder = "suffix">
                                        </div>
                                    </div>      
                                </div>
                            <script>
                                function editname(){
                                    var fname = document.getElementById('fname');
                                    var mname = document.getElementById('mname');
                                    var lname = document.getElementById('lname');
                                    var suf = document.getElementById('suf');

                                    if((fname.readOnly == true)&&(lname.readOnly == true)&&(mname.readOnly == true)&&(suf.readOnly== true)){
                                        fname.readOnly = false;
                                        lname.readOnly = false;
                                        mname.readOnly = false;
                                        suf.readOnly = false;
                                        
                                    }
                                    else{
                                        fname.readOnly = true;
                                        lname.readOnly = true;
                                        mname.readOnly = true;
                                        suf.readOnly = true;
                                    }
                                }
                                
                            </script>
                        <div class="col-xl-10 mx-auto px-2 ">
                            <table class="table">
                                   <tr>
                                        <td colspan = 3 class= "text-center bg-info text-white">
                                                <i class= "fa fa-thumbtack me-2"></i>
                                                Contact Information
                                        </td>
                                    </tr>
                                    <tr>                  
                                        <th  style = "padding-top: 5px; padding-bottom:5px;">
                                            <i class="fa fa-mobile-alt fa-1x me-2"></i>Contact Number
                                        </th>
                                        <td style= "text-align: right; padding-top: 5px; padding-bottom:5px;" colspan= 2>
                                            <input class="form-control" value = "<?php echo htmlentities($row->Cellphnumber);?>"
                                            style = "width: 50%; float: right;text-align: right">
                                        </td>
                                    </tr>
                                    <tr>                    
                                        <th style = "padding-top: 5px; padding-bottom:5px;">
                                            <i class="fa fa-at fa-1x me-1"></i>Email Address
                                        </th>
                                        <td style= "text-align: right;padding-top: 5px; padding-bottom:5px;" colspan= 2>
                                            <input class = "form-control" value = "<?php echo htmlentities($row->Email);?>"
                                            style = "width: 50%; float: right;text-align: right">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan = 3 class= "text-center bg-info text-white">
                                            <i class= "fa fa-street-view me-2"></i>Barangay Residency Information
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <i class="fa fa-home fa-1x me-1"></i>
                                            Residency Type
                                        </th>
                                        <td>
                                        <div class="col-6 px-1" id="hidden_div" style = "width: 50%; float: right;text-align: right;display:none;">
                                        
                                        <input type="text" class="form-control" placeholder="" id="residenttype" />
                                    </div>
                                            <select class="form-select input-sm" aria-label="Default select example" style = "width: 50%; float: right;text-align: right"onchange="showDiv('hidden_div', this)" id = "rt">
                                                    <option value="<?php echo htmlentities($row->ResidentType)?>"><?php echo htmlentities($row->ResidentType)?></option>
                                                    <option value="House Owner">House Owner</option>
                                                    <option value="caretaker">Care taker</option>
                                                    <option value="Rental/Boarder">Rental/Boarder</option>
                                                    <option value="wrelative">Living with Relatives</option>
                                                </select>
                                                
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <th style = "padding-top: 5px; padding-bottom:5px;" >
                                            <i class="fa fa-map-marker-alt fa-1x me-1"></i>
                                                    Address
                                        </th>

                                        <td style = "padding-top: 5px; padding-bottom:5px;text-align:right" colspan= 2>
                                            <?php echo htmlentities("#".$row->houseUnit." Purok ".$row->Purok." ".$row->streetName." Street");?>
                                            <button type = "button" class= "btn btn-primary" onclick = "editAdd()">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <script>
                                            function editAdd(){
                                                var hide = document.getElementById('hide')
                                                if (hide.style.display == "none"){
                                                    hide.style.display  = "block";
                                                }
                                                else{
                                                    hide.style.display = "none";
                                                }
                                                
                                            }
                                        </script>
                                       
                                        </td>
                                      
                                    </tr>
                                    </table>
                                    <div class="row justify-content-center" id = "hide" style = "display:none;">
                                        <div class="row">
                                                <div class="col-xl-4 my-1">  
                                                    <input id = "hNum" type="text" class= "form-control" value ="<?php echo htmlentities($row->houseUnit)?>"  style= "text-align: right">
                    
                                                </div>   
                                                <div class="col-xl-4 my-1">
                                                    <input id = "purokNum" type="text" class= "form-control" value = "<?php echo htmlentities($row->Purok);?>" style= "text-align: right">
                                                </div>
                                                <div class="col-xl-4 my-1">    
                                                    <input id = "stName"type="text" class= "form-control" value = "<?php echo htmlentities($row->streetName)?>"  style= "text-align: right">
                                                </div>   
                                     
                                        </div>
                                        <div class="row my-2 justify-content-center">
                                            <div class="col-xl-4" align ="center">
                                                <button class="btn-success btn"><i class="fa fa-save me-2"></i>Save Changes</button>
                                            </div>
                                        </div>
                                         
                                </div>
                                <table class= "table">
                                    <tr>
                                        <th colspan = 3 class= "bg-info text-center text-white">
                                            <i class = "fa fa-user"></i>
                                            Personal Information
                                        </th>
                                    </tr>
                                    <th style = "padding-top: 10px; padding-bottom:10px;">
                                            Date of Birth
                                    </th>
                                    <td style = "padding-top: 10px; padding-bottom:10px;text-align:right" colspan = 2>
                                            <?php echo $gbd;?>
                                    </td>
                                    </tr>
                                    <tr>
                                        <th class ="" >Gender</th>
                                       
                                        <td style= "text-align: right;padding-top: 5px; padding-bottom:5px;" colspan= 2>
                                        <select  name="cstatus"  class="form-select select2" required='true' style = "width: 50%; float: right;text-align: right">
                                            <option value="<?php  echo htmlentities($row->Gender);?>"><?php  echo htmlentities($row->Gender);?></option>
                                            <option value="Single">Female</option>
                                       
                                        </select>
                                
                                        </td>
                                    
                                    </tr>
                        

                                    <tr>
                                        <th class ="" > Civil Status</th>
                                        <td>
                                        <select  name="cstatus"  class="form-select select2" required='true' style = "width: 50%; float: right;text-align: right">
                                            <option value="<?php  echo htmlentities($row->CivilStatus);?>"><?php  echo htmlentities($row->CivilStatus);?></option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widow">Widow</option>
                                            <option value="Separated">Separated</option>
                                            
                                        </select>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th class ="" > Voter Status</th>
                                        <td>
                                        <div class="col-xl-4 mx-2" id="precinct" style="display:none;">
                                           
                                                    <select class="form-select input-sm ms-2"  style = "width: 30%; float: right;text-align: right">
                                                    <option value="">--Select--</option>
                                                    <option value="1a">1-A</option>
                                                    <option value="2a">2-A</option>
                                                </select>
                                                 
                                                </div>
                                        <select class="form-select input-sm" aria-label="Default select example" id="gender"onchange="showprecinct('precinct', this)" style = "width: 50%; float: right;text-align: right">
                                                    <option value="<?php echo htmlentities($row->voter);?>"><?php echo htmlentities($row->voter);?></option>
                                                    <option value="reg">Registered</option>
                                                    <option value="unreg">Unregistered</option>
                                                </select>
                                           
                                            </div>
                                    </tr>
                                    <tr>                    
                                        <th style = "padding-top: 5px; padding-bottom:5px;">
                                            SSS Number
                                        </th>
                                        <td style= "text-align: right;padding-top: 5px; padding-bottom:5px;" colspan= 2>
                                            <input class = "form-control" value = "<?php echo htmlentities($row->sssNumber);?>"
                                            style = "width: 50%; float: right;text-align: right">
                                        </td>
                                    </tr>
                                    <tr>                    
                                        <th style = "padding-top: 5px; padding-bottom:5px;">
                                            TIN Number
                                        </th>
                                        <td style= "text-align: right;padding-top: 5px; padding-bottom:5px;" colspan= 2>
                                            <input class = "form-control" value = "<?php echo htmlentities($row->tinNumber);?>"
                                            style = "width: 50%; float: right;text-align: right">
                                        </td>
                                    </tr>
                            </table>
                        </div>
                        <div class="row g-0 my-2 px-5 py-2 justify-content-end">
                        <div class="col-12">
                            <div class="float-end">
                        <div class="btn-group">
                            <button type = "button" onclick ="editname();"class="btn-primary btn form-control">
                                <i class="fa fa-save  me-2"></i>Save Changes
                            </button>

                        </div>
                        <div class="btn-group"> <button type="button"  href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash mx-1"></i><span class= "wal">Delete Record</button>

                        </div>
                        </div>

                        </div>
                             
                    </div>

              
                           <!-- <input type="hidden" name="did" id="did" value="' . $row["ID"] . '">
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                       
                                                                    </div>
                                        -->
                    </div>
                </div>
                <?php $cnt=$cnt+1; }?>
            </div>
        </form>
    </div>
 </div>

<?php
 if (isset($_POST['delete'])) {
    $eid =$_GET['editid'];
    $sqld = "DELETE FROM tblresident where ID=:eid";
    $queryd = $dbh->prepare($sqld);
    $queryd->bindParam(':eid', $eid, PDO::PARAM_STR);
    $queryd->execute();
    echo '<script>alert("Resident has been Deleted.")</script>';
    echo "<script>window.location.href ='admin-residence.php'</script>";
}

?>
 <form method="POST">
   <div class="modal fade" id="delete" tab-idndex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-md">
                        <div class="modal-content g-0 bg-danger ">
                            <div class="modal-header bg-danger white ">
                                <h5 class="modal-title" id="delete">&nbsp;<i class="fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body bg-white">
                                <div class="row">
                                    <div class="col xl-4" align="center">
                                        <img src="../images/trash.png" alt="trash" class=" img-fluid " style="width: 10%;">
                                    </div>

                                </div>
                                <div class="row">
                                    <p class="fs-4 text-center">You are about to delete an existing record, do you wish to continue?<br><span class="text-muted fs-6">*Select (<i class="fa fa-check">)</i> if certain</span></p>
                                    
                                </div>
                                <div class="row justify-content-center" align="center">
                                 
                                        <div class="col-xl-12">
                                            <div class="btn-group">
                                        <button type="submit" name="delete" class="btn btn-success "  value="delete">
                                            <i class='fa fa-check mx-1 '></i>Confirm
                                        </button>
                                        </div>
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-danger " data-bs-dismiss="modal" name="no" value="No">
                                            <i class="fa fa-times mx-1"></i>Cancel
                                        </button>
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
    
               <?php }?>                 
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
                document.getElementById('residenttype').required = true;
            } else {
                document.getElementById('residenttype').required = false;
            }
            document.getElementById(divId).style.display = element.value == 'Rental/Boarder' ? 'block' : 'none';
    }
    function showprecinct(divId, element) {
        document.getElementById(divId).style.display = element.value == 'reg' ? 'inline' : 'none';
    }
</script>

                  
    

    
</body>
</html>
<?php }  ?>