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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

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
        

      
        
        <form method="post"> 
            <div class="container-fluid py-3 px-5 mx-1">
                    
                        
                <div class="row gx-4 border bg-info py-2 ">
                    <div class="fs-5 text-center white">
                       <i class= "fa fa-address-book me-2" ></i> Resident Registration Form 
                    </div>


                </div>
                <div class="row gx-4 border bg-white">
                    <div class="col-xl-4 px-5 pb-5 pt-2 border-end">
                        <div class="row g-0">
                            
                                <label for="rtype" class="col-form-label fw-bold fs-6">Resident Type</label>
                                    
                                <select class="form-select input-sm" aria-label="Default select example" id="test"onchange="showDiv('hidden_div', this)">
                                <option value='' disabled selected>--Select Resident Type--</option>
                                <option value="homeowner">Home Owner</option>
                                <option value="caretaker">Care taker</option>
                                <option value="rental">Rental/Boarder</option>
                                <option value="wrelative">Living with Relatives</option>
                            </select>
                        
                        
                        </div>
                        <div class="row-g-0" id="hidden_div">
                            <label class="col-form-label fw-bold">Home Owner Name</label>
                            <input type="text" class="form-control" placeholder="Home Owner Name:" id="residenttype" required />
                        </div>
                    
                        <div class="row g-0 ">
                            
                                <label for="gend" class="col-form-label fw-bold">Gender</label>
                                    
                                    <select class="form-select" name = "gend" aria-label="Default select example">
                                        <option value='' disabled selected>--Select gender--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                        
                        
                        </div>
                        <div class="row g-0 ">
                            
                            <label for="fname" class="col-form-label fw-bold">First Name</label>
                            <input type="text" name = "fname" class = "form-control" placeholder ="First name" required>

                    
                        </div>
                        <div class="row g-0 ">
                            
                            <label for="mname" class="col-form-label fw-bold">Middle Name</label>
                            <input type="text" name = "mname" class = "form-control" placeholder ="Middle name" required>

                        </div>
                        <div class="row g-0 ">
                            
                            <label for="lname" class="col-form-label fw-bold">Last Name</label>
                            <input type="text" name = "lname" class = "form-control" placeholder ="Last name" required>

                        </div>
                        <div class="row g-0 ">
                            
                            <label for="suf" class="col-form-label fw-bold">Name Suffix</label>
                            <input type="text" name = "suf" class = "form-control" placeholder ="E.g 1st, 2nd, Jr., Sr...." required>
                            <!--<select class="form-select" id = "suf" aria-label="Default select example">
                                        <option  class= "text-muted" selected >E.g 1st, 2nd, Jr., Sr....</option>
                                        <option value="1st">1st</option>
                                        <option value="2nd">2nd</option>
                                        <option value="3rd">3rd</option>
                                        <option value="sr">Sr.</option>
                                        <option value="jr">Jr.</option>
                                        
                            </select>-->  
                            

                        </div>
                        <div class="row g-0">
                            
                            <label for="bdate" class="col-form-label fw-bold">Birth Date</label>
                            <input type="date" name = "bdate" class = "form-control" placeholder ="Birthdate">

                        </div>
                        <div class="row g-0 ">
                            
                            <label for= "cstatus" class="col-form-label fw-bold">Civil Status</label>
                            <select class="form-select" name = "cstatus" aria-label="Default select example">
                                        <option value=''selected disabled>--Civil Status--</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Widow">Widow/widdower</option>
                            </select>        
                        </div>


                      
                    </div>
                <div class="col-xl-4 px-5 pb-5 pt-2">
                    <div class="row g-0 ">
                                   
                                   <label for= "prk" class="col-form-label fw-bold">Purok</label>
                                   <select class="form-select" name = "prk" aria-label="Default select example">
                                        <option value=''selected disabled>--Purok Number--</option>
                                        <option value="1">Purok 1</option>
                                        <option value="2">Purok 2</option>
                                        <option value="3">Purok 3</option>
                                    </select>        
       
                        </div>

                        
                        <div class="row g-0 ">
                                   
                            <label for= "strt" class="col-form-label fw-bold">Street</label>
                       
                                   <select class="form-select" name = "strt" aria-label="Default select example">
                                        <option value=''selected disabled>--Street Name--</option>
                                        <option value="s1">Street 1</option>
                                        <option value="s2">Street 2</option>
                                    </select>        
       

                        </div>
                        
                        <div class="row g-0 ">
                                   
                                   <label for= "hunit" class="col-form-label fw-bold">House unit/Lot number</label>
                                   <input type="text" name = "hunit"class = "form-control" placeholder ="House unit/Lot no. here">
       
                        </div>
                        <div class="row g-0 ">
                                   
                                   <label for= "contact" class="col-form-label fw-bold">Contact Number</label>
                                   <input type="text" name = "contact"class = "form-control" placeholder ="Contact Number">
       
                        </div>
                        <div class="row g-0 ">
                                   
                                   <label for= "tin" class="col-form-label fw-bold">TIN</label>
                                   <input type="text" name = "tin"class = "form-control" placeholder ="TIN here">
       
                        </div>
                        <div class="row g-0 ">
                                   
                                   <label for= "sss" class="col-form-label fw-bold">SSS number</label>
                                   <input type="text" name = "sss" class = "form-control" placeholder ="SSS number here">
       
                        </div>
                        <div class="row g-0 ">
                                   
                                   <label for= "voter" class="col-form-label fw-bold">Voter Status</label>
                                   <select class="form-select" name = "voter" aria-label="Default select example">
                                        <option value=''selected disabled>--Voter Status--</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>        
       
                        </div>
                        <div class="row g-0 ">
                                   
                                   <label for= "vp" class="col-form-label fw-bold">Precinct Number</label>
                                   <select class="form-select" name = "vp" aria-label="Default select example">
                                        <option value=''selected disabled>--Voter's Precinct--</option>
                                        <option value="50-A">50-A</option>
                                        <option value="51-A">51-A</option>
                                    </select>        
       
                        </div>
                 

                </div>
                <div class="col-xl-4 px-5 pb-5 pt-2 border-start">
                        <div class="row g-0 ">
                                   
                            <label for= "email" class="col-form-label fw-bold">E-mail Address</label>
                            <input type="text" name = "email" class = "form-control" placeholder ="Email Address">

                        </div>
                        <div class="row g-0 ">
                                   
                                   <label for= "pass" class="col-form-label fw-bold">Password</label>
                                   <input type="password" name = "password" class = "form-control" placeholder ="Password">
       
                        </div>
                        <div class="row g-0 ">
                                   
                                   <label for= "cpass" class="col-form-label fw-bold">Confirm Password</label>
                                   <input type="password" name = "cpass" class = "form-control" placeholder ="Confirm Password">
       
                        </div>
                     
                        
             
                </div>
                <div class="row  gx-4 py-2 justify-content-end">
                          
                                <div class="col-xl-3 g-0 border">
                                    <button type="submit" class="form-control btn btn-outline-success" name="submit" id="submit">Submit</button>
                                </div>
                    
                    </div>
            </div>
        </form>

        


    <!--<div class="container-fluid mx-3 px-5">
        <div class="row px-5 ">
            <div class="row g-0 mt-4 border bg-white">
                <div class="row g-0 p-3 border-bottom">
                    <div class="col-xl-10 mx-auto  ">
                        <div class="fs-6 text-center fw-bold">
                            <i class = "fa fa-user me-2 "></i>Resident Registration
                        </div>
                    </div>


                </div>
            <div class="row">

               
                <form class="row g-3">
                    <div class="row gx-3">
                        <div class="col-xl-3">
                            Resident Type
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Select resident type</option>
                                <option value="homeowner">Home Owner</option>
                                <option value="caretaker">Care taker</option>
                                <option value="rental">Rental/Boarder</option>
                                <option value="wrelative">Living with Relatives</option>
                                <option value="wrelative">Others</option>
                                
                            </select>
                            
                        </div>
                        <div class="col-xl-3">

                        </div>
                        <div class="col-xl-3">
                            <div class=" mb-1">
                                Gender
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                              
                            </div>
                            
                        </div>
                    </div>
                    <div class="row gx-3 gy-2">
                        <div class="col-xl-4">
                            First Name
                            <input type="text" class = "form-control" placeholder ="First name here">
                            
                        </div>
                        <div class="col-xl-4">
                            Middle Name
                            <input type="text" class = "form-control" placeholder ="Middle name here">
                        
                                
                        </div>
                        <div class="col-xl-4">
                        
                            Last Name
                            <input type="text" class = "form-control" placeholder ="Last name here">
                        </div>
                        
                       
                    </div>

                    <div class="row gx-3 gy-2">
                        <div class="col-xl-4">
                            Purok
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Purok number </option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                
                            </select>
                            
                        </div>
                        <div class="col-xl-4">
                            House Unit/Unit No.
                            <input type="text" class = "form-control" placeholder ="House number/Unit no. here">
                        
                                
                        </div>
                        <div class="col-xl-4">
                        
                            Street Name
                            <input type="text" class = "form-control" placeholder ="Street name here">
                        </div>
                        
                       
                    </div>
                    
                    
                </form>
                <div class="row gx-3 gy-2">
                        
                        <div class="col-xl-3">
                            Birth Place
                            <input type="text" class = "form-control" placeholder ="Birth place here">
                        
                                
                        </div>
                        <div class="col-xl-3">
                            Birthdate    
                            <input type="date" class = "form-control" placeholder ="">
                        </div>
                        <div class="col-xl-3">
                            TIN
                            <input type="text" class = "form-control" placeholder ="TIN here">
                        </div>
                        <div class="col-xl-3">
                            SSS
                            <input type="text" class = "form-control" placeholder ="SSS number here">
                        </div>


                  
                        
                       
                </div>
                <div class="row gx-3 gy-2">
                        <div class="col-xl-3">
                            Civil status
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Civil status </option>
                                <option value="1">Married</option>
                                <option value="2">Single</option>
                                <option value="3">Widow</option>
                                <option value="3">Separated</option>
                               
                                
                            </select>
                            
                        </div>
                        
                        <div class="col-xl-3">
                            <div class="mb-1 mx-5">
                                A registered voter ?
                            </div>
                            <div class="form-check form-check-inline mx-5 ">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                              
                        </div>
                      
                        <div class="col-xl-2">
                             Precint Number   
                            <input type="text" class = "form-control" placeholder ="Precinct Number">
                        </div>
                </div>
                <div class="row gx-3 gy-2">
                        <div class="col-xl-3">
                            Email Address
                            <input type="text" class = "form-control" placeholder ="Email Address Here">
                        
                                
                        </div>
                        <div class="col-xl-3">
                            Password
                            <input type="text" class = "form-control" placeholder ="Password">
                        
                                
                        </div>


                </div>
                <div class="row mt-3 mb-5">
                    <div class="col-xl-8">

                    </div>
                    <div class="col-xl-4">
                        <div class="float-end">
                            <button type= "button" class ="btn btn-outline-success">Submit</button>
                        </div>
                        
                    </div>
                </div>
                    
                </form>
              
            </div>
        </div>
    </div>-->


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

<script type="text/javascript">
    function showDiv(divId, element) {
        document.getElementById(divId).style.display = element.value == 'rental' ? 'block' : 'none';
    }
</script>

        
                
            
   


    
</body>
</html>
<?php }  ?>