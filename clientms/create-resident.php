<?php
$curr = "Resident Registration";
session_start();
error_reporting(0);

include('includes/dbconnection.php');

function upPhoto ($poid){
    $ftypes = array('png','jpeg','jpg');

    $fileName = $_FILES[''.$poid.'']['name'];
    $fileSize = $_FILES[''.$poid.'']['size'];
    $fileError = $_FILES[''.$poid.'']['error'];
    $filetmpname = $_FILES[''.$poid.'']['tmp_name'];
    $fileExt = explode('.',$fileName);
    $extension = strtolower(end($fileExt));
    
    $destination = "";

    if (in_array($extension,$ftypes)){
        if($fileSize<5000000){
            $newfilename = uniqid('',TRUE).".".$extension;
            $destination = "images/".$newfilename;
            move_uploaded_file($filetmpname,$destination);
           // header('Location: admin-e-content.php?success=1');
        }
    }
    
    return $destination;

}

if (isset($_POST['submit'])) {

    $destination = upPhoto('proof');
    $residenttype = $_POST['residenttype'];
    $prk = $_POST['prk'];
    $hunit = $_POST['hunit'];
    $voter = $_POST['voter'];
    $password = $_POST['password'];
    $lname = $_POST['lname'];
    $sf = $_POST['sf'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $gend = $_POST['gend'];
    $bdate = $_POST['bdate'];
    $strt = $_POST['strt'];
    $contact = $_POST['contact'];
    $tin = $_POST['tin'];
    $sss = $_POST['sss'];
    $cstatus = $_POST['cstatus'];
    $email = $_POST['email'];
    $vp = $_POST['vp'];
    $bp = $_POST['bp'];
    $hm = $_POST['hm'];
    $stat = "Pending";

    
        $sql = "insert into tblresident (ResidentType,Purok,houseUnit,voter,LastName,Suffix,FirstName,MiddleName,Gender,BirthDate,BirthPlace,streetName,Cellphnumber,tinNumber,sssNumber,CivilStatus,Email,Password,vPrecinct,HomeName,resStatus,attachment)
        values(:residenttype,:prk,:hunit,:voter,:lname,:sf,:fname,:mname,:gend,:bdate,:bp,:strt,:contact,:tin,:sss,:cstatus,:email,:password,:vp,:hm,:stat,:destination)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':residenttype', $residenttype, PDO::PARAM_STR);
        $query->bindParam(':prk', $prk, PDO::PARAM_STR);
        $query->bindParam(':sf', $sf, PDO::PARAM_STR);
        $query->bindParam(':hunit', $hunit, PDO::PARAM_STR);
        $query->bindParam(':voter', $voter, PDO::PARAM_STR);
        $query->bindParam(':vp', $vp, PDO::PARAM_STR);
        $query->bindParam(':bp', $bp, PDO::PARAM_STR);
        $query->bindParam(':stat', $stat, PDO::PARAM_STR);
        $query->bindParam(':lname', $lname, PDO::PARAM_STR);
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
        $query->bindParam(':mname', $mname, PDO::PARAM_STR);
        $query->bindParam(':gend', $gend, PDO::PARAM_STR);
        $query->bindParam(':bdate', $bdate, PDO::PARAM_STR);
        $query->bindParam(':strt', $strt, PDO::PARAM_STR);
        $query->bindParam(':contact', $contact, PDO::PARAM_STR);
        $query->bindParam(':tin', $tin, PDO::PARAM_STR);
        $query->bindParam(':sss', $sss, PDO::PARAM_STR);
        $query->bindParam(':hm', $hm, PDO::PARAM_STR);
        $query->bindParam(':cstatus', $cstatus, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':destination', $destination, PDO::PARAM_STR);
        $query->execute();

        $LastInsertId = $dbh->lastInsertId();
        if ($LastInsertId > 0) {
            echo '<script>alert("Resident request has been sent.")</script>';
            echo "<script>window.location.href ='index.php'</script>";
        } else {
            echo '<script>alert("Something Went Wrong.'.$destination.' Please try again")</script>';
        }
    

    /*$mes = "";
    $mes = mysqli_real_escape_string($con, $mes);
	mysqli_query($con,"insert into tbladminnotif (message) values (:mes)");*/
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curr; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>




    <link rel="stylesheet" href="../css/scrollbar.css">
    <link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type="text/css">
        input[type='text']{
            font-size: 1.15em;
        }
        body {
            background: aliceblue;

        }
        #prk{
            width: 100px;
           
        }

        .white {
            color: white;
        }

        .in {
            padding-left: 10.5%;
            padding-right: 10.5%;
        }

        .er {
            border-radius: 20px 20px 0px 0px;
            padding-right: 3%;
            padding-left: 3%;

        }

        @media(max-width: 786px) {
            .er {
                padding: 0px;
            }

            .in {
                padding-left: 2.3%;
                padding-right: 2%;
            }

            .dis {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid banner" align="center">
       
        <?php
            function lessen($str){
                
                $len = strlen($str);
                $newlogo = "";
                for ($i = 6; $i<$len;$i++){
                    $newlogo .= $str[$i];
                }
                return $newlogo;
                
            }
        $sql1 = "select * from tblinformation";
        $query1 = $dbh->prepare($sql1);
        $query1->execute();
        
        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
        echo "<div class='row'>
        <div class='col-xl-3 px-1 dis'>
            <div class='float-start'>";
        if ($query1->rowCount() > 0) {
            foreach ($results1 as $row1) {
                echo "<img src='".lessen($row1->Blogoone)."' style='width: 100px;'>";
         
                echo "</div>

                </div>";

                echo "<div class='col-xl-6' align='center'>
                <h3 class='py-4'>$row1->Baddress <br>
                $row1->Btitle</h3>
                </div>";

                echo "<div class='col-xl-3 dis'>
                        <div class='float-end'>
                            <img src='".lessen($row1->Blogotwo)."' style='width: 100px;'>
                        </div>
                    </div>
                </div>";
            }
        }
        ?>
    </div>




    <form method="POST" id="add_form" enctype="multipart/form-data">
        <div class="container-fluid px-5">
            <div class="row px-5">
                <div class="col-xl-5"></div>
                <div class="col-xl-7">
                    <div class="float-end">
                        <a href="index.php" class="link link-primary text-decoration-none fs-4"><i class="fa fa-arrow-circle-left me-2"></i>Cancel Registration</a>
                    </div>

                </div>
            </div>

        </div>
        <div class="container-fluid py-2  mx-auto in ">
            <div class="row  g-0 gy-2 px-1">
                <div class="row g-0 bg-primary py-1  er">

                </div>
                <div class="row border border-warning g-0 bg-light pb-4 rounded er shadow-lg">
                    <div class="row g-0  mb-4">

                        <div class="display-6 py-2 ps-3">
                            Personal Information <span class=" fs-4 text-danger">(Fields with '*' are required otherwise not)</span>
                            <br>
                            <span class="text-muted fs-6">

                            </span>
                        </div>
                    </div>
                    <div class="row g-0 ps-4 pe-2 ps-2">
                        <div class="row g-0 mb-3 px-4">
                            <label for="fname" class="col-xl-2 fs-5 py-0"> <span class="text-danger fs-5">*</span>First Name<br><span class="fs-6 text-muted small"> (Unang Pangalan)</span></label>

                            <div class="col-xl-8 col-sm-12">
                             
                                <input id="fname" name="fname" type="text" class="form-control" required>
                                <label for="" class="text-muted fs-6 small"> Place a space between if you have second or third name(e.g Juan Dela)</label>
                            </div>
                        </div>

                        <div class="row g-0 mb-3 px-4">
                            <label for="mname" class="col-xl-2 fs-5 py-0"><span class="text-danger fs-5"></span>Middle Name<br><span class="fs-6 text-muted small"> (Gitnang Pangalan)</span></label>

                            <div class="col-xl-8 col-sm-12">
                              
                                <input type="text" id="mname" class="form-control" name="mname" value="">
                                <label for="" class="text-muted fs-6 small">If born without middle name just leave blank.</label>
                            </div>
                        </div>

                        <div class="row g-0 mb-3 px-4">
                            <label for="lname" class="col-xl-2 fs-5 py-0"> <span class="text-danger fs-5">*</span>Last Name<br><span class="fs-6 text-muted small"> (Apelyido)</span></label>

                            <div class="col-xl-8 col-sm-12">
                                <input type="text" id="lname" class="form-control" name="lname" required>
                                <label for="" class="text-muted fs-6 small"></label>
                            </div>
                        </div>
                        <div class="row g-0 mb-3 px-4">
                            <label for="fname" class="col-xl-2 fs-5 py-0"> <span class="text-danger fs-5"></span>Suffix<br><span class="fs-6 text-muted small"> (Kadugsong ng pangalan)</span></label>
                            <div class="col-xl-5 col-sm-12">
                                <input id="sf" type="text" class="form-control" name="sf" value="">
                                <label for="" class="text-muted fs-6 small">For residents with suffix (e.g Juan Dela Cruz Jr., Juan Dela Cruz III</label>
                            </div>

                        </div>

                        <div class="row g-0 mb-3 px-4">
                            <label for="bday" class="col-xl-2 fs-5 py-0"><span class="text-danger fs-5">*</span>Date of Birth<br><span class="fs-6 text-muted small"> (Araw ng kapakanakan)</span></label>
                            <div class="col-xl-5 col-sm-12">
                                <input type="date" id="bdate" class="form-control" name="bdate" required>
                                <label for="" class="text-muted fs-6 small">Format: day/month/year</label>
                            </div>
                        </div>
                        <script>
                            var today = new Date().toISOString().split('T')[0];
                            document.getElementsByName("bdate")[0].setAttribute('max', today);
                        </script>

                        <div class="row g-0 mb-3 px-4">
                            <label for="fname" class="col-xl-2 fs-5 py-0"> <span class="text-danger fs-5"></span>Birth Place<br><span class="fs-6 text-muted small"> (Lugar ng kapanganakan)</span></label>
                            <div class="col-xl-5 col-sm-12">
                                <br>
                                <input id="bp" type="text" class="form-control" name="bp" value="" required>
                            </div>
                        </div>

                        <div class="row g-0 mb-3 px-4">

                            <label for="gender" class="col-sm-2 col-form-label  fs-5"><span class="text-danger fs-5">*</span>Gender<br><span class="fs-6 text-muted small"> (Kasarian)</span></label>
                            <div class="col-xl-5 col-sm-12">
                                <br>
                                <select id="gend" name="gend" class="form-select input-sm" aria-label="Default select example" id="gender" onchange="showDiv('hidden_div', this)" required>
                                    <option value="">--Select Gender--</option>
                                    <option value="Male">Male (lalake)</option>
                                    <option value="Female">Female (Babae)</option>

                                </select>
                            </div>
                        </div>
                        <div class="row g-0 mb-3 px-4">

                            <label for="gender" class="col-sm-2 col-form-label  fs-5"><span class="text-danger fs-5">*</span>Voter's Status<br><span class="fs-6 text-muted small"> (Pagkabotante)</span></label>
                            <div class="col-xl-5">
                                <select class="form-select input-sm" aria-label="Default select example" id="voter" name="voter" onchange="showprecinct('precinct', this)">
                                    <option value="">--Select--</option>
                                    <option value="Yes">Registered</option>
                                    <option value="No">Unregistered</option>
                                </select>
                                <label for="" class="text-muted fs-6 small">To deter whether this person is voter</label>
                            </div>
                            <div class="col-xl-4 mx-2" id="precinct">
                                <div class="input-group align-items-center">
                                <label class="fs-6 small px-2">Precinct Number</label>
                                <input type= "text" class="form-control input-sm" name="vp" id="pres">
                                
                                </div>

                            </div>
                        </div>


                        <div class="row g-0 mb-3 px-4">

                            <label for="cs" class="col-sm-2 col-form-label  fs-5"><span class="text-danger fs-5">*</span>Civil Status<br><span class="fs-6 text-muted small"> (Kalagayang Sibil)</span></label>
                            <div class="col-xl-5">
                                <br>
                                <select class="form-select input-sm" aria-label="Default select example" id="cstatus" name="cstatus" onchange="showDiv('hidden_div', this)" required>
                                    <option value="">--Select Status--</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-0 mb-3 px-4">

                            <label for="cs" class="col-sm-2 col-form-label  fs-5">Attach Valid ID <br><span class="fs-6 text-muted small"> (Aydentipikasyon)</span></label>
                            <div class="col-xl-5">
                                <br>
                                <div class="mb-3">

                                <div class="col-12">
														<input 	name = "proof" class="form-control form-control-sm" id="selectproof" onchange = "loadFile(event,'cproof');" type="file">
														</div>
														<div class="col-12">
															<img style= "display:none" src = "../../images/defaultimage.png" class= "img-fluid" id = "cproof">
														</div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0 mb-3 px-4">
                            <label for="sss" class="col-xl-2 fs-5 py-0">SSS Number<br></label>

                            <div class="col-xl-4 col-sm-12">

                                <input type="text" id="sss" name="sss" class="form-control">

                            </div>
                        </div>
                        <div class="row g-0 mb-3 px-4">
                            <label for="tin" class="col-xl-2 fs-5 py-0">TIN</label>

                            <div class="col-xl-4 col-sm-12">

                                <input type="text" id="tin" name="tin" class="form-control">
                                <label for="tin" class="text-muted fs-6 small"></label>
                            </div>
                        </div>




                    </div>


                </div>
            </div>
        </div>


        <div class="container-fluid py-2  mx-auto mt-4 in">
            <div class="row  g-0 gy-2 px-1">
                <div class="row g-0 bg-primary py-1  er">

                </div>
                <div class="row border border-warning g-0 bg-light pb-4 shadow-lg rounded er">
                    <div class="row g-0  mb-4">

                        <div class="display-6 py-2 ps-3">
                            Barangay Residency Information<span class=" fs-5 text-danger"> ('*' Required)</span>
                        </div>
                    </div>
                    <div class="row g-0 ps-4 pe-2 ps-2">
                        <div class="row g-0 mb-3 px-4">

                            <label for="cs" class="col-sm-2 col-form-label  fs-5"><span class="text-danger fs-5">*</span>Type of<Br> Residency<br><span class="fs-6 text-muted small"> (Uri ng residente)</span></label>
                            <div class="col-xl-5">
                                <br>
                                <select class="form-select input-sm" aria-label="Default select example" name="residenttype" onchange="showDiv('hidden_div', this)" required id="rt">
                                    <option value='' disabled selected>--Select Resident Type--</option>
                                    <option value="House Owner">House Owner</option>
                                    <option value="Care Taker">Care taker</option>
                                    <option value="Rental/Boarder">Rental/Boarder</option>
                                    <option value="Living with Relatives">Living with Relatives</option>
                                </select>
                                <div class="col-xl-12 col-lg-6 col-md-8 col-sm-12 col-xs-12" id="hidden_div">
                                    <label class="col-form-label fs-5"><span class="text-danger fs-5">*</span>Home Owner Name</label>
                                    <input type="text" class="form-control" placeholder="" id="hm" name="hm" />

                                </div>
                                <div class="col-md-5" style="position: relative;margin-top: -38px;margin-left: 215px;">
                                    <div class="list-group" id="show-list">
                                        <!-- Here autocomplete list will be display -->
                                    </div>
                                </div>




                            </div>
                            <div class="row g-0 mb-3">
                                <label for="cs" class=" col-form-label  fs-5">Purok Information</label>

                                <div class="col-xl-2 col-sm-12 my-2 ">
                                    <div class="input-group">
                                        <label for="" class=" fs-5 small mx-1"><span class="text-danger fs-5">*</span>Purok&nbsp;</label>

                                        <?php
                                        // $con = mysqli_connect("localhost", "admin", "admin", "countrydb");
                                        $pName = '';
                                        $query = "SELECT pName FROM tbllistpurok";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $pName .= '<option value="' . $row["pName"] . '">' . $row["pName"] . '</option>';
                                        }
                                        ?>
                                        <select class="form-select action " name="prk" id="prk" >
                                            <option value='' selected disabled>--Purok--</option>
                                            <?php echo $pName; ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-12 my-2 ">
                                    <div class="input-group">
                                        <label for="" class="mx-2 fs-5 small"><span class="text-danger fs-5">*</span>Street</label>
                                        <select name="strt" id="strt" class="form-control action">
                                            <option value='' selected disabled>--Street--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0 mb-3 px-4">
                            <label for="hUnit" class="col-xl-2 fs-5 py-0"><span class="text-danger fs-5">*</span>House Unit/<br>Lot Number<br><span class="fs-6 text-muted small"> (Numero ng bahay)</span></label>
                            <div class="col-xl-4 col-sm-12">
                                <br>
                                <input type="text" id="hunit" name="hunit" class="form-control" required>
                                <label for="" class="text-muted fs-6 small">House unit or lot number of the residents household</label>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="container-fluid py-2 in mx-auto  mt-4 pb-5">
            <div class="row  g-0 gy-2 px-1  ">
                <div class="row g-0 bg-primary py-1  er">

                </div>
                <div class="row border border-warning g-0 bg-light shadow-lg pb-4 rounded er">
                    <div class="row g-0  mb-5 ">

                        <div class="display-6 py-2 ps-3">
                            Contact Information <span class=" fs-5 text-danger">('*' Required)</span>
                        </div>
                    </div>
                    <div class="row g-0 ps-4  ps-2">

                        <div class="row g-0 mb-3 px-4">
                            <label for="cn" class="col-xl-2 fs-5 py-0"><span class="text-danger fs-5">*</span>Contact Number<br><span class="fs-6 text-muted small"> (Numero sa cellphone)</span></label>

                            <div class="col-xl-5 col-sm-12">
                                <input type="tel" id="contact" name="contact" class="form-control" pattern="[0]{1}[9]{1}[0-9]{9}" placeholder="09123456789" title="Contact number should start with 09">
                            </div>
                        </div>

                        <div class="row g-0 mb-3 px-4">
                            <label for="email" class="col-xl-2 fs-5  py-0"><span class="text-danger fs-5">*</span>E-mail Address<br><span class="fs-6 text-muted small"> (Emayl na ginagamit.)</span></label>

                            <div class="col-xl-5 col-sm-12">
                            <span class="fs-6 text-muted small"> (Sa pagkakataon na walang emayl. Ex: DelaCruz.Juan@gmail.com)</span>
                                <input type="text" id="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                            </div>
                        </div>
                        <div class="row g-0 px-4 mb-2">
                            <div class="fs-4 ">
                                For E-barangay 599 Account
                            </div>
                        </div>
                        <div class="row g-0 mb-3 px-4">
                            <label for="pas" class="col-xl-2 fs-5 py-0"><span class="text-danger fs-5">*</span>Password </label>

                            <div class="col-xl-4 col-sm-12">

                                <input type="password" id="password" name="password" class="form-control" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                            </div>
                        </div>
                        <div class="row g-0 mb-3 px-4">
                            <label for="cf" class="col-xl-2 fs-5 py-0"><span class="text-danger fs-5">*</span>Confirm Password </label>

                            <div class="col-xl-4 col-sm-12">
                                
                                <input type="password" id="confirm_password" class="form-control" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                            </div>
                        </div>
                        <div class="row g-0 mb-3 px-4">

                            <div class="col-xl-6 col-sm-12">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="privacy" required>
                                    <label class="form-check-label fs-6" for="privacy">
                                        I have read and agreed with the <a href="privacy-policy.php" target="_blank"><i>privacy policy</i></a>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row g-0">
                        <div class="col-9">

                        </div>
                        <div class="col-xl-3 px-3">

                            <button type="submit" class="btn btn-success form-control" name="submit" id="submit">Save</button>



                        </div>
                    </div>
                </div>

            </div>

        </div>

    </form>
    <script>
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords does not match.");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

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
                document.getElementById('hm').required = true;
            } else {
                document.getElementById('hm').required = false;
            }
            document.getElementById(divId).style.display = element.value == 'Rental/Boarder' ? 'block' : 'none';
        }
    </script>
    <script type="text/javascript">
        function showprecinct(divId, element) {
            var vot = document.getElementById('voter').value;
            if (vot == "Yes") {
                document.getElementById('pres').required = true;
            } else {
                document.getElementById('pres').required = false;
            }
            document.getElementById(divId).style.display = element.value == 'Yes' ? 'inline' : 'none';
        }
    </script>


</body>

</html>
<!--up-->
<script>
    $(document).ready(function() {
        $('.action').change(function() {
            if ($(this).val() != '') {
                var action = $(this).attr("id");
                var query = $(this).val();
                var result = '';
                if (action == "prk") {
                    result = 'strt';
                }
                $.ajax({
                    url: "fetchdata.php",
                    method: "POST",
                    data: {
                        action: action,
                        query: query
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                })
            }
        });
    });
</script>
<script src="script.js"></script>
<script>
    $(document).ready(function() {
        // Send Search Text to the server
        $("#hm").keyup(function() {
            let searchText = $(this).val();
            if (searchText != "") {
                $.ajax({
                    url: "searchname.php",
                    method: "post",
                    data: {
                        query: searchText,
                    },
                    success: function(response) {
                        $("#show-list").html(response);
                    },
                });
            } else {
                $("#show-list").html("");
            }
        });
        // Set searched text in input field on click of search button
        $(document).on("click", "a", function() {
            $("#hm").val($(this).text());
            $("#show-list").html("");
        });
    });
</script>
<script>
		var loadFile = function (event,imgid) {
        
        var image = document.getElementById(imgid);
            image.src = URL.createObjectURL(event.target.files[0]);
            image.style.display = "block";
        
        
        };
	</script>   