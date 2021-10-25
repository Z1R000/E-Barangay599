<?php 
    $curr ="Resident Registration";
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
        header('location:logout.php');
        } else{
        if(isset($_POST['submit']))
    {
          
    $residenttype=$_POST['residenttype'];
    $prk=$_POST['prk'];
    $hunit=$_POST['hunit'];
    $voter=$_POST['voter'];
    $password=$_POST['password'];
    $lname=$_POST['lname'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $gend=$_POST['gend'];
    $bdate=$_POST['bdate'];
    $strt=$_POST['strt'];
    $contact=$_POST['contact'];
    $tin=$_POST['tin'];
    $sss=$_POST['sss'];
    $cstatus=$_POST['cstatus'];
    $email=$_POST['email'];
    $vp=$_POST['vp'];
    
    $sql="insert into tblresident (ResidentType,Purok,houseUnit,voter,LastName,FirstName,MiddleName,Gender,BirthDate,streetName,Cellphnumber,tinNumber,sssNumber,CivilStatus,Email,Password,vPrecinct)
        values(:residenttype,:prk,:hunit,:voter,:lname,:fname,:mname,:gend,:bdate,:strt,:contact,:tin,:sss,:cstatus,:email,:password,:vp)";
    $query=$dbh->prepare($sql);
    $query->bindParam(':residenttype',$residenttype,PDO::PARAM_STR);
    $query->bindParam(':prk',$prk,PDO::PARAM_STR);
    $query->bindParam(':hunit',$hunit,PDO::PARAM_STR);
    $query->bindParam(':voter',$voter,PDO::PARAM_STR);
    $query->bindParam(':vp',$vp,PDO::PARAM_STR);
    $query->bindParam(':lname',$lname,PDO::PARAM_STR);
    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
    $query->bindParam(':mname',$mname,PDO::PARAM_STR);
    $query->bindParam(':gend',$gend,PDO::PARAM_STR);
    $query->bindParam(':bdate',$bdate,PDO::PARAM_STR);
    $query->bindParam(':strt',$strt,PDO::PARAM_STR);
    $query->bindParam(':contact',$contact,PDO::PARAM_STR);
    $query->bindParam(':tin',$tin,PDO::PARAM_STR);
    $query->bindParam(':sss',$sss,PDO::PARAM_STR);
    $query->bindParam(':cstatus',$cstatus,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->execute();

    $LastInsertId=$dbh->lastInsertId();
    if ($LastInsertId>0) {
        echo '<script>alert("Resident request has been sent.")</script>';
    echo "<script>window.location.href ='resident-registration.php'</script>";
    }
    else
        {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
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
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>


    <link rel = "stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../css/scrollbar.css">
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
        .input-sm{
            font-size: 16px;
        }
        .form-sm{
            font-size: 16px;
        }
        .white{
            color: white;
        }
        .in{
            padding-left: 10.5%;
            padding-right: 10.5%;
        }
        .er{
            border-radius: 20px 20px 0px 0px;
            padding-right:3%;
            padding-left: 3%;

        }
        @media(max-width: 786px){
            .er{
                padding: 0px;
            }
            .in{
            padding-left: 5.3%;
            padding-right: 4%;
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
<form action="" method = "POST"></form>
                <div class="container-fluid px-5">
                    <div class="row px-5">
                        <div class="col-xl-5"></div>
                        <div class="col-xl-7">
                            <div class="float-end">
                                <a href="#" onclick = "window.history.back();" class="link link-primary text-decoration-none fs-4"><i class="fa fa-arrow-circle-left me-2"></i>Cancel Registration</a>
                            </div>
                            
                        </div>
                    </div>
                
                </div>
                    <div class="container-fluid py-2  mx-auto in ">
                        <div class="row  g-0 gy-2 px-2">
                            <div class="row g-0 bg-primary py-1  er" >
                                    
                            </div>
                                <div class="row border border-warning g-0 bg-light pb-4 rounded er shadow-lg">
                                    <div class="row g-0  mb-4">

                                        <div class="display-6 py-2 ps-3">
                                            Personal Information <span class=" fs-4 text-danger">(Fields with '*' are required otherwise not)</span>
                                            <br>
                                            <span class ="text-muted fs-6"> 
    
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row g-0 ps-4 pe-2 ps-2">

                                        <div class="row g-0 mb-3 px-4">
                                                <label for="fname" class="col-xl-2 fs-4 py-0"> <span class= "text-danger fs-5">*</span>First Name<br><span class= "fs-6 text-muted small"> (Unang Pangalan)</span></label>
                                                
                                                <div class="col-xl-8 col-sm-12">
                                                <br>
                                                
                                                <input id = "fname" type="text" class="form-control">
                                                <label for="" class="text-muted fs-6 small"> Place a space between if you have second or third name(e.g Juan Dela)</label>
                                            </div>
                                        </div>
                                       
                                        <div class="row g-0 mb-3 px-4">
                                            <label for="mname" class="col-xl-2 fs-4 py-0"><span class= "text-danger fs-5">*</span>Middle Name<br><span class= "fs-6 text-muted small"> (Gitnang Pangalan)</span></label>
                                            
                                            <div class="col-xl-8 col-sm-12">
                                            <br>
                                                <input type="text" id = "mname" class="form-control">
                                                <label for="" class="text-muted fs-6 small">If born without middle name place "N/A" or "-"</label>
                                            </div>
                                        </div>
                                        
                                        <div class="row g-0 mb-3 px-4">
                                                <label for="lname" class="col-xl-2 fs-4 py-0"> <span class= "text-danger fs-5">*</span>Last Name<br><span class= "fs-6 text-muted small"> (Apelyido)</span></label>
                                            
                                                <div class="col-xl-8 col-sm-12">
                                                <br>
                                                    <input type="text" id = "lname"class="form-control">
                                                    <label for="" class="text-muted fs-6 small"></label>
                                                </div>
                                        </div>
                                        <div class="row g-0 mb-3 px-4">
                                                <label for="fname" class="col-xl-2 fs-4 py-0"> <span class= "text-danger fs-5"></span>Suffix<br><span class= "fs-6 text-muted small"> (Kadugsong ng pangalan)</span></label>
                                                <div class="col-xl-5 col-sm-12">
                                                <br>
                                                <input id = "fname" type="text" class="form-control">
                                                <label for="" class="text-muted fs-6 small">For residents with suffix (e.g Juan Dela Cruz Jr., Juan Dela Cruz III</label>
                                            </div>
                                        </div>

                                        <div class="row g-0 mb-3 px-4">
                                            <label for="bday" class="col-xl-2 fs-4 py-0"><span class= "text-danger fs-5">*</span>Date of Birth<br><span class= "fs-6 text-muted small"> (Araw ng kapakanakan)</span></label>
                                            
                                            <div class="col-xl-5 col-sm-12">
                                            <br>
                                                <input type="date" id = "bday"class="form-control">
                                                <label for="" class="text-muted fs-6 small">Format: day/month/year</label>
                                            </div>
                                        </div>

                                        <div class="row g-0 mb-3 px-4">
                                        
                                            <label for="gender" class="col-sm-2 col-form-label  fs-4"><span class= "text-danger fs-5">*</span>Gender<br><span class= "fs-6 text-muted small"> (Kasarian)</span></label>
                                                <div class="col-xl-5 col-sm-12">
                                                    <br>
                                                    <select id ="gender" class="form-select input-sm" aria-label="Default select example" id="gender"onchange="showDiv('hidden_div', this)">
                                                        <option value="">--Select Gender--</option>
                                                        <option value="m">Male (lalake)</option>
                                                        <option value="f">Female (Babae)</option>
                                                
                                                    </select>
                                                </div>
                                         </div>
                                         <div class="row g-0 mb-3 px-4">
                                        
                                        <label for="gender" class="col-sm-2 col-form-label  fs-4"><span class= "text-danger fs-5">*</span>Voter's Status<br><span class= "fs-6 text-muted small"> (Pagkabotante)</span></label>
                                            <div class="col-xl-5">
                                                <br>
                                                <select class="form-select input-sm" aria-label="Default select example" id="gender"onchange="showprecinct('precinct', this)">
                                                    <option value="">--Select--</option>
                                                    <option value="reg">Registered</option>
                                                    <option value="unreg">Unregistered</option>
                                                </select>
                                                <label for="" class="text-muted fs-6 small">To deter whether this person is voter</label>
                                            </div>
                                            <div class="col-xl-4 mx-2" id="precinct">
                                                    <label class="fs-5">Precinct Number</label>
                                                    <select class="form-select input-sm"  >
                                                    <option value="">--Select--</option>
                                                    <option value="1a">1-A</option>
                                                    <option value="2a">2-A</option>
                                                </select>
                                                 
                                                </div>
                                        </div>


                                        <div class="row g-0 mb-3 px-4">
                                        
                                            <label for="cs" class="col-sm-2 col-form-label  fs-4"><span class= "text-danger fs-5">*</span>Civil Status<br><span class= "fs-6 text-muted small"> (Kalagayang Sibil)</span></label>
                                                <div class="col-xl-5">
                                                    <br>
                                                    <select class="form-select input-sm" aria-label="Default select example" id="cs"onchange="showDiv('hidden_div', this)">
                                                        <option value="">--Select Status--</option>
                                                        <option value="sin">Single</option>
                                                        <option value="mar">Married</option>
                                                        <option value="sep">Separated</option>
                                                    </select> 
                                                </div>
                                        </div>
                                   
                                        
                                        <div class="row g-0 mb-3 px-4">
                                                <label for="sss" class="col-xl-2 fs-4 py-0">SSS Number<br></label>
                                            
                                                <div class="col-xl-6 col-sm-12">
                                     
                                                    <input type="text" id = "sss"class="form-control">
                    
                                                </div>
                                        </div>
                                        <div class="row g-0 mb-3 px-4">
                                                <label for="tin" class="col-xl-2 fs-4 py-0">TIN Number</label>
                                            
                                                <div class="col-xl-6 col-sm-12">
                                                
                                                    <input type="text" id = "sss"class="form-control">
                                                    <label for="tin" class="text-muted fs-6 small"></label>
                                                </div>
                                        </div>
                                </div>
                                     
                                               
                        </div>
                    </div>
                </div>


                <div class="container-fluid py-2  mx-auto mt-4 in">
                        <div class="row  g-0 gy-2 px-2">
                            <div class="row g-0 bg-primary py-1  er" >
                                    
                            </div>
                            <div class="row border border-warning g-0 bg-light pb-4 shadow-lg rounded er">
                                <div class="row g-0  mb-4">

                                    <div class="display-6 py-2 ps-3">
                                        Barangay Residency Information<span class=" fs-4 text-danger"> (Required)</span>
                                    </div>
                                </div>
                                <div class="row g-0 ps-4 pe-2 ps-2">
                                    <div class="row g-0 mb-3 px-4">
                                        
                                        <label for="cs" class="col-sm-2 col-form-label  fs-4">Type of<Br> Residency<br><span class= "fs-6 text-muted small"> (Uri ng residente)</span></label>
                                        
                                            <div class="col-xl-5">
                                                <br>
                                                <select class="form-select input-sm" aria-label="Default select example" onchange="showDiv('hidden_div', this)">
                                                    <option value='' disabled selected>--Select Resident Type--</option>
                                                    <option value="homeowner">Home Owner</option>
                                                    <option value="caretaker">Care taker</option>
                                                    <option value="rental">Rental/Boarder</option>
                                                    <option value="wrelative">Living with Relatives</option>
                                                </select>
                                                <div class="col-6" id="hidden_div">
                                                    <label class="col-form-label fs-5">Home Owner Name</label>
                                                    <input type="text" class="form-control" placeholder="" id="residenttype" required />
                                                </div>

                        
                                            
                                            </div>
                                            <div class="row g-0 mb-3">
                                            <label for="cs" class=" col-form-label  fs-4">Purok Information</label>
                                        
                                                <div class="col-xl-5 col-sm-12 my-2">
                                                    <div class="input-group">
                                                        <label for="" class="mx-2 fs-5 small">Number&nbsp;</label>
                                                        <select class="form-select" name = "purok" id = "purok" aria-label="Default select example" style ="width: 50%;">
                                                        <option value=''selected disabled>--Purok Number--</option>
                                                        <option value="1">Purok 1</option>
                                                        <option value="2">Purok 2</option>
                                                        <option value="3">Purok 3</option>
                                                    </select> 
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-xl-5 col-sm-12 my-2">
                                                    <div class="input-group">
                                                        <label for="" class="mx-2 fs-5 small" >Street</label>
                                                        <input id = "street" type="text" class="form-control" style ="width: 50%;">
                                                    </div>
                                                </div>                                       
                                            </div>
                                        </div>
                                           
                                           
                                    
                             
                                    <div class="row g-0 mb-3 px-4">
                                        <label for="hUnit" class="col-xl-2 fs-4 py-0">House Unit/<br>Lot Number<br><span class= "fs-6 text-muted small"> (Numero ng bahay)</span></label>
                                        
                                        <div class="col-xl-8 col-sm-12">
                                        <br>
                                            <input type="text" id = "hUnit" class="form-control">
                                            <label for="" class="text-muted fs-6 small">House unit  or lot number of the residents household</label>
                                        </div>
                                    </div>
                                   
                            </div>
                        </div>  

                    </div>
                </div>
                <div class="container-fluid py-2 in mx-auto  mt-4 pb-5">
                        <div class="row  g-0 gy-2 px-2   ">
                            <div class="row g-0 bg-primary py-1  er" >
                                    
                            </div>
                            <div class="row border border-warning g-0 bg-light shadow-lg pb-4 rounded er">
                                <div class="row g-0  mb-5 ">

                                    <div class="display-6 py-2 ps-3">
                                       Contact Information <span class=" fs-4 text-info">(Optional, leave blank if resident does not have)</span>
                                    </div>
                                </div>
                                <div class="row g-0 ps-4  ps-2">
                                   
                                    <div class="row g-0 mb-3 px-4">
                                        <label for="cn" class="col-xl-2 fs-4 py-0">Contact Number<br><span class= "fs-6 text-muted small"> (Numero sa cellphone)</span></label>
                                        
                                        <div class="col-xl-5 col-sm-12">
                                        <br>
                                            <input type="text" id = "cn" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="row g-0 mb-3 px-4">
                                        <label for="em" class="col-xl-2 fs-4 py-0">E-mail Address<br><span class= "fs-6 text-muted small"> (Emayl na ginagamit)</span></label>
                                        
                                        <div class="col-xl-5 col-sm-12">
                                        <br>
                                            <input type="text" id = "em" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row g-0 px-4 mb-2">
                                        <div class="fs-4 ">
                                            For E-barangay Account
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-3 px-4">
                                        <label for="pas" class="col-xl-2 fs-4 py-0">Password </label>
                                        
                                        <div class="col-xl-4 col-sm-12">
                                        
                                            <input type="text" id = "pas" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-3 px-4">
                                        <label for="cf" class="col-xl-2 fs-4 py-0">Confirm Password </label>
                                        
                                        <div class="col-xl-4 col-sm-12">
                                            <br>
                                            <input type="text" id = "cf" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-0">
                                     <div class="col-9">

                                     </div>
                                     <div class="col-xl-3 px-3">
                                        
                                            <a class="btn btn-success form-control">
                                                Submit
                                            </a>

                                      
                                    </div>
                                </div>
                            </div>  
                       
                        </div>
                        
                    </div>
                    
    </form>

    
        

      
     

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
        var rentype = document.getElementById('hm').value;
        if (rentype == "Rental/Boarder"){
            document.getElementById('rt').required =true;
        }
        else{
            document.getElementById('rt').required =false;
        }
        document.getElementById(divId).style.display = element.value == 'Rental/Boarder' ? 'block' : 'none';
    }
    function showprecinct(divId, element) {
        var vot = document.getElementById('voter').value;
        if (vot == "Yes"){
            document.getElementById('pres').required = true;
        }
        else{
            document.getElementById('pres').required = false;  
        }
        document.getElementById(divId).style.display = element.value == 'Yes' ? 'inline' : 'none';
    }
</script>

        
                
            
   


    
</body>
</html>
<?php }  ?>