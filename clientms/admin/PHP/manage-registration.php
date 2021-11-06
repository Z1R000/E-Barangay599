<?php
$curr = "Manage Registration";
session_start();
error_reporting(0);
$con = mysqli_connect("localhost", "root", "", "clientmsdb");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {


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

        $sql = "insert into tblresident (ResidentType,Purok,houseUnit,voter,LastName,Suffix,FirstName,MiddleName,Gender,BirthDate,BirthPlace,streetName,Cellphnumber,tinNumber,sssNumber,CivilStatus,Email,Password,vPrecinct,HomeName)
                values(:residenttype,:prk,:hunit,:voter,:lname,:sf,:fname,:mname,:gend,:bdate,:bp,:strt,:contact,:tin,:sss,:cstatus,:email,:password,:vp,:hm)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':residenttype', $residenttype, PDO::PARAM_STR);
        $query->bindParam(':prk', $prk, PDO::PARAM_STR);
        $query->bindParam(':sf', $sf, PDO::PARAM_STR);
        $query->bindParam(':hunit', $hunit, PDO::PARAM_STR);
        $query->bindParam(':voter', $voter, PDO::PARAM_STR);
        $query->bindParam(':vp', $vp, PDO::PARAM_STR);
        $query->bindParam(':bp', $bp, PDO::PARAM_STR);
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
        $query->execute();

        $eid = intval($_GET['editid']);

        $sqld = "Delete FROM tblresidentrequest where ID=:eid";
        $queryd = $dbh->prepare($sqld);
        $queryd->bindParam(':eid', $eid, PDO::PARAM_STR);
        $queryd->execute();

        echo '<script>alert("Resident has been approved.")</script>';
        echo "<script>window.location.href ='admin-residence.php'</script>";
    }

    if (isset($_POST['delete'])) {
        $eid = intval($_GET['editid']);

        $sqld = "Update tblresidentrequest set reqStatus='Rejected' where ID=:eid";
        $queryd = $dbh->prepare($sqld);
        $queryd->bindParam(':eid', $eid, PDO::PARAM_STR);
        $queryd->execute();

        echo '<script>alert("Resident has been Rejected.")</script>';
        echo "<script>window.location.href ='admin-residence.php'</script>";
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


        <link rel="stylesheet" href="../css/sidebar.css" />
        <link rel="stylesheet" href="../css/scrollbar.css">
        <link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

        <style type="text/css">
            input[type = "text"]{
                font-size: 1.15em;
            }
            .input-sm {
                font-size: 16px;
            }

            .form-sm {
                font-size: 16px;
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
                    padding-left: 5.3%;
                    padding-right: 4%;
                }
            }
        </style>
    </head>

    <body>

        <?php
        include('../includes/sidebar.php');
        ?>
        <div class="d-flex align-items-center">
            <div class="container mx-5 mt-3">
                <nav aria-label="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-decoration-none" href="admin-registrations.php"><i class="fa fa-archive"></i>&nbsp;Resident Registration</a></li>

                            <li class="breadcrumb-item active"><a href="#"><i class="fa fa-check-circle text-muted"></i></a>&nbsp;<?php echo $curr; ?></li>
                        </ol>
                    </nav>
                </nav>
            </div>
        </div>
        </div>
        </nav>

<form method = "POST">
        <?php
        $eid = $_GET['editid'];
        $clientmsaid = $_SESSION['clientmsaid'];
        $sql = "select * from tblresidentrequest where ID=:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':eid', $eid, PDO::PARAM_STR);
        $query->execute();

        $results = $query->fetchAll(PDO::FETCH_OBJ);

        $cnt = 1;
        if ($query->rowCount() > 0) {
            foreach ($results as $row) {
        ?>
                <form method="POST">
                    <div class="container-fluid px-5">
                        <div class="row px-5">
                            <div class="col-xl-5"></div>
                            <div class="col-xl-7">
                                <div class="float-end">
                                    <a href="admin-registrations.php" class="link link-primary text-decoration-none fs-4"><i class="fa fa-arrow-circle-left me-2"></i>Cancel Registration</a>
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
                                           

                                            <input id="fname" name="fname" type="text" class="form-control" required value="<?php echo $row->FirstName; ?>">
                                            <label for="" class="text-muted fs-6 small"> Place a space between if you have second or third name(e.g Juan Dela)</label>
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-3 px-4">
                                        <label for="mname" class="col-xl-2 fs-5 py-0"><span class="text-danger fs-5"></span>Middle Name<br><span class="fs-6 text-muted small"> (Gitnang Pangalan)</span></label>

                                        <div class="col-xl-8 col-sm-12">
                                      
                                            <input type="text" id="mname" class="form-control" name="mname" value="<?php echo $row->MiddleName; ?>">
                                            <label for="" class="text-muted fs-6 small">If born without middle name just leave blank.</label>
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-3 px-4">
                                        <label for="lname" class="col-xl-2 fs-5 py-0"> <span class="text-danger fs-5">*</span>Last Name<br><span class="fs-6 text-muted small"> (Apelyido)</span></label>

                                        <div class="col-xl-8 col-sm-12">
                                            
                                            <input type="text" id="lname" class="form-control" name="lname" required value="<?php echo $row->LastName; ?>">
                                            <label for="" class="text-muted fs-6 small"></label>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-3 px-4">
                                        <label for="fname" class="col-xl-2 fs-5 py-0"> <span class="text-danger fs-5"></span>Suffix<br><span class="fs-6 text-muted small"> (Kadugsong ng pangalan)</span></label>
                                        <div class="col-xl-5 col-sm-12">
                                           
                                            <input id="sf" type="text" class="form-control" name="sf" value="<?php echo $row->Suffix; ?>">
                                            <label for="" class="text-muted fs-6 small">For residents with suffix (e.g Juan Dela Cruz Jr., Juan Dela Cruz III</label>
                                        </div>
                                    </div>
                                    <?php
                                    $bdateset = $row->BirthDate;
                                    $bdatesets = date('Y-m-d', strtotime($bdateset));
                                    ?>
                                    <div class="row g-0 mb-3 px-4">
                                        <label for="bdate" class="col-xl-2 fs-5 py-0"><span class="text-danger fs-5">*</span>Date of Birth<br><span class="fs-6 text-muted small"> (Araw ng kapakanakan)</span></label>

                                        <div class="col-xl-5 col-sm-12">
                                        <Br>
                                            <input type="date" id="bdate" class="form-control" name="bdate" required value="<?php echo $bdatesets; ?>">
                                            <label for="" class="text-muted fs-6 small">Format: day/month/year</label>
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-3 px-4">
                                        <label for="fname" class="col-xl-2 fs-5 py-0"> <span class="text-danger fs-5"></span>Birth Place<br><span class="fs-6 text-muted small"> (Lugar ng kapanganakan)</span></label>
                                        <div class="col-xl-5 col-sm-12">
                                            <br>
                                            <input id="bp" type="text" class="form-control" name="bp" value="<?php echo $row->BirthPlace; ?>" required>
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-3 px-4">

                                        <label for="gender" class="col-sm-2 col-form-label  fs-5"><span class="text-danger fs-5">*</span>Gender<br><span class="fs-6 text-muted small"> (Kasarian)</span></label>
                                        <div class="col-xl-5 col-sm-12">
                                        
                                            <select id="gend" name="gend" class="form-select input-sm" aria-label="Default select example" id="gender" required>
                                                <option value="" disabled>--Select Gender--</option>

                                                <?php
                                                $gend = $row->Gender;
                                                if ($gend == "Female") {
                                                    echo '<option value="Male">Male (lalake)</option>
                                                                <option value="Female" selected>Female (Babae)</option>';
                                                } else {
                                                    echo '<option value="Male" selected>Male (lalake)</option>
                                                                <option value="Female">Female (Babae)</option>';
                                                }
                                                ?>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-3 px-4">

                                        <label for="gender" class="col-sm-2 col-form-label  fs-5"><span class="text-danger fs-5">*</span>Voter's Status<br><span class="fs-6 text-muted small"> (Pagkabotante)</span></label>
                                        <div class="col-xl-5">
                                            <br>
                                            <select class="form-select input-sm" aria-label="Default select example" id="voter" name="voter" onchange="showprecinct('precinct', this)">
                                                <option value="" disabled>--Select--</option>

                                                <?php
                                                $vo = $row->voter;
                                                if ($vo == "Yes") {
                                                    echo '<option value="Yes" selected>Registered</option>
                                                                <option value="No">Unregistered</option>';
                                                } else {
                                                    echo '<option value="Yes">Registered</option>
                                                                <option value="No" selected>Unregistered</option>';
                                                }
                                                ?>


                                            </select>
                                            <label for="" class="text-muted fs-6 small">To deter whether this person is voter</label>
                                        </div>
                                        <div class="col-xl-3 mx-2" id="precinct">
                                        <br>
                                            <div class="input-group align-items-center">

                                                <label class="fs-6 px-2">Precinct Number</label>
                                            
                                            <input type="text" name="vp" class="form-control" id="pres" value="<?php echo $row->vPrecinct; ?>">

                                            </div>

                                        </div>
                                    </div>


                                    <div class="row g-0 mb-3 px-4">

                                        <label for="cs" class="col-sm-2 col-form-label  fs-5"><span class="text-danger fs-5">*</span>Civil Status<br><span class="fs-6 text-muted small"> (Kalagayang Sibil)</span></label>
                                        <div class="col-xl-5">
                                            <br>
                                            <select class="form-select input-sm" aria-label="Default select example" id="cstatus" name="cstatus" required>
                                                <option value="" disabled>--Select Status--</option>
                                                <?php
                                                $cstat = $row->CivilStatus;
                                                if ($cstat == "Single") {
                                                    echo '<option value="Single" selected >Single</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Separated">Separated</option>
                                                                <option value="Widowed">Widowed</option>';
                                                } else if ($cstat == "Married") {
                                                    echo '<option value="Single">Single</option>
                                                                <option value="Married" selected>Married</option>
                                                                <option value="Separated">Separated</option>
                                                                <option value="Widowed">Widowed</option>';
                                                } else if ($cstat == "Separated") {
                                                    echo '<option value="Single">Single</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Separated" selected>Separated</option>
                                                                <option value="Widowed">Widowed</option>';
                                                } else if ($cstat == "Widowed") {
                                                    echo '<option value="Single">Single</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Separated">Separated</option>
                                                                <option value="Widowed" selected>Widowed</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-3 px-4">

                                        <label for="cs" class="col-sm-2 col-form-label  fs-5">Attach Valid ID <br><span class="fs-6 text-muted small"> (Aydentipikasyon)</span></label>
                                        <div class="col-xl-5">
                                            <br>
                                            <div class="mb-3">

                                                <input class="form-control form-control " id="formFileSm" type="file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-3 px-4">
                                        <label for="sss" class="col-xl-2 fs-4 py-0">SSS Number<br></label>

                                        <div class="col-xl-6 col-sm-12">

                                            <input type="text" id="sss" name="sss" class="form-control" value="<?php echo $row->sssNumber; ?>">

                                        </div>
                                    </div>
                                    <div class="row g-0 mb-3 px-4">
                                        <label for="tin" class="col-xl-2 fs-4 py-0">TIN</label>

                                        <div class="col-xl-6 col-sm-12">

                                            <input type="text" id="tin" name="tin" class="form-control" value="<?php echo $row->tinNumber; ?>">
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
                                        Barangay Residency Information<span class=" fs-4 text-danger"> (Required)</span>
                                    </div>
                                </div>
                                <div class="row g-0 ps-4 pe-2 ps-2">
                                    <div class="row g-0 mb-3 px-4">

                                        <label for="cs" class="col-sm-2 col-form-label  fs-5">Type of<Br> Residency<br><span class="fs-6 text-muted small"> (Uri ng residente)</span></label>
                                        <div class="col-xl-5">
                                            <br>
                                            <select class="form-select input-sm" aria-label="Default select example" name="residenttype" onchange="showDiv('hidden_div', this)" required id="rt">
                                                <option value="" disabled>--Select Resident Type--</option>
                                                <?php
                                                $rst = $row->ResidentType;
                                                if ($rst == "House Owner") {
                                                    echo '<option value="House Owner" selected>House Owner</option>
                                                                <option value="Care Taker">Care taker</option>
                                                                <option value="Rental/Boarder">Rental/Boarder</option>
                                                                <option value="Living with Relatives">Living with Relatives</option>';
                                                } else if ($rst == "Care Taker") {
                                                    echo '<option value="House Owner">House Owner</option>
                                                                <option value="Care Taker" selected>Care taker</option>
                                                                <option value="Rental/Boarder">Rental/Boarder</option>
                                                                <option value="Living with Relatives">Living with Relatives</option>';
                                                } else if ($rst == "Rental/Boarder") {
                                                    echo '<option value="House Owner">House Owner</option>
                                                                <option value="Care Taker">Care taker</option>
                                                                <option value="Rental/Boarder" selected>Rental/Boarder</option>
                                                                <option value="Living with Relatives">Living with Relatives</option>';
                                                } else if ($rst == "Living with Relatives") {
                                                    echo '<option value="House Owner">House Owner</option>
                                                                <option value="Care Taker">Care taker</option>
                                                                <option value="Rental/Boarder">Rental/Boarder</option>
                                                                <option value="Living with Relatives" selected>Living with Relatives</option>';
                                                }
                                                ?>
                                            </select>
                                            <div class="col-xl-12 col-lg-6 col-md-8 col-sm-12 col-xs-12" id="hidden_div">
                                                <label class="col-form-label fs-5">Home Owner Name</label>
                                                <input type="text" class="form-control" placeholder="" id="hm" name="hm" value="<?php echo $row->HomeName; ?>" />
                                            </div>



                                        </div>
                                        <div class="row g-0 mb-3">
                                            <label for="cs" class=" col-form-label  fs-4">Purok Information</label>

                                            <div class="col-xl-3 col-sm-12 my-2 ">
                                                <div class="input-group">
                                                    <label for="" class="mx-2 fs-5 small">Purok&nbsp;</label>

                                                    <?php
                                                    // $con = mysqli_connect("localhost", "admin", "admin", "countrydb");
                                                    $pName = '';
                                                    $prksel = $row->Purok;
                                                    $query = "SELECT pName FROM tbllistpurok";
                                                    $result = mysqli_query($con, $query);
                                                    while ($rowz = mysqli_fetch_array($result)) {
                                                        $prkv = $rowz["pName"];
                                                        if ($prkv == $prksel) {
                                                            $pName .= '<option value="' . $rowz["pName"] . '" selected>' . $rowz["pName"] . '</option>';
                                                        } else {
                                                            $pName .= '<option value="' . $rowz["pName"] . '">' . $rowz["pName"] . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                    <select class="form-control action" name="prk" id="prk" aria-label="Default select example" style="width: 60%;">
                                                        <option value='' disabled>--Purok--</option>
                                                        <?php echo $pName; ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-12 my-2 ">
                                                <div class="input-group">
                                                    <label for="" class="mx-2 fs-5 small">Street </label>
                                                    <select name="strt" id="strt" class="form-control action">
                                                        <?php
                                                        // $con = mysqli_connect("localhost", "admin", "admin", "countrydb");
                                                        $sName = '';
                                                        $ssel = $row->streetName;
                                                        $prkcheck = $row->Purok;
                                                        $query1 = "SELECT streetName FROM tblstreet WHERE Purok ='" . $prkcheck . "'";
                                                        $result1 = mysqli_query($con, $query1);
                                                        while ($rowx = mysqli_fetch_array($result1)) {
                                                            $ssels = $rowx["streetName"];
                                                            if ($ssel == $ssels) {
                                                                $sName .= '<option value="' . $rowx["streetName"] . '" selected>' . $rowx["streetName"] . '</option>';
                                                            } else {
                                                                $sName .= '<option value="' . $rowx["streetName"] . '">' . $rowx["streetName"] . '</option>';
                                                            }
                                                        }
                                                        echo $sName;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="row g-0 mb-3 px-4">
                                        <label for="hUnit" class="col-xl-2 fs-5 py-0">House Unit/<br>Lot Number<br><span class="fs-6 text-muted small"> (Numero ng bahay)</span></label>

                                        <div class="col-xl-4 col-sm-12">
                                            <br>
                                            <input type="number" id="hunit" name="hunit" class="form-control" required value="<?php echo $row->houseUnit; ?>">
                                            <label for="" class="text-muted fs-6 small">House unit or lot number of the residents household</label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="container-fluid py-2 in mx-auto  mt-4 pb-5">
                        <div class="row  g-0 gy-2 px-1 ">
                            <div class="row g-0 bg-primary py-1  er">

                            </div>
                            <div class="row border border-warning g-0 bg-light shadow-lg pb-4 rounded er">
                                <div class="row g-0  mb-5 ">

                                    <div class="display-6 py-2 ps-3">
                                        Contact Information <span class=" fs-4 text-danger">(Fields with '*' are required otherwise not)</span>
                                    </div>
                                </div>
                                <div class="row g-0 ps-4  ps-2">

                                    <div class="row g-0 mb-3 px-4">
                                        <label for="cn" class="col-xl-2 fs-5 py-0"><span class="text-danger fs-5">*</span>Contact Number<br><span class="fs-6 text-muted small"> (Numero sa cellphone)</span></label>

                                        <div class="col-xl-5 col-sm-12">
                                            <br>
                                            <input type="tel" id="contact" name="contact" class="form-control" pattern="[0]{1}[9]{1}[0-9]{9}" placeholder="09" title="Contact number should start with 09" value="<?php echo $row->Cellphnumber; ?>">
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-3 px-4">
                                        <label for="email" class="col-xl-2 fs-5 py-0">E-mail Address<br><span class="fs-6 text-muted small"> (Emayl na ginagamit)</span></label>

                                        <div class="col-xl-5 col-sm-12">
                                            <br>
                                            <input type="text" id="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $row->Email; ?>">
                                            <input type="hidden" id="password" name="password" class="form-control" value="<?php echo $row->Password; ?>">
                                        </div>
                                    </div>


                                </div>

                                <div class="row g-0 justify-content-end">
                                
                                    <div class="col-xl-12 ">
                                        <div class="float-end">
                                        <div class="btn-group">
                                        <button type="button" class="btn btn-danger form-control" name="delete" data-bs-toggle ="modal"  href ="#decline-proof"id="delete">Reject</button>
                                        </div>
                                        <div class="btn-group">
                                                        
                                            
                                        <button type="button" href= "#approve-proof" data-bs-toggle = "modal" class="btn btn-success form-control" name="submit" id="submit">Approve</button>
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
                        <div class="row mt-1 ms-2 me-3">
                           
                                <div class="row">
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
                                    <div class="col-md-12">
                                        <label for="decreason" >Decline Reason</label>
                                        <select name="" id="decreason" class= "form-control" onchange = "showOthersdec('other_txt-dec',this);">
                                            <option value="">Insufficient credentials</option>
                                            <option value="">Detected inconsistency</option>
                                            <option value="others">Others</option>
                                        </select>
                                        <div class="row g-0 my-2" id = "other_txt-dec" style= "display: none;">
                                 
                                 <div class="col-md-12">
                                     <input type="text" class="form-control" placeholder= "Specify a reason here">
                                 </div>
                             </div>
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
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    SMS
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    E-mail
                                                </label>  
                                            </div>
                              

                                    </div>
                                </div>
                                <div class="row justify-content-center" align = "center">
                                    
                                    <div class="col-mx-6">
                                        <button href ="#dec-val" type = "button" class="btn btn-success" data-bs-dismiss ="modal" data-bs-toggle= "modal" >
                                            <i class= 'fa fa-paper-plane py-1 me-2'></i>Send
                                        </button>
                                        <button type = "button" class="btn btn-danger" data-bs-dismiss = "modal"  name = "no" value ="No">
                                            <i class= "fa fa-times me-2"></i>Discard
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
        <div class="modal fade" id = "approve-proof" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-success ">
                    <div class="modal-header bg-success  ">
                        <h5 class="modal-title white">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Accept payment?</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        
                        <div class="row mt-2 ms-2 me-3">
                            <form action="" method = "POST">
                                <div class="row">
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
                                        <label for="remarks" >Remarks</label>
                                        <div class="col-md-112">
                                            <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;resize: none"></textarea>
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
                                    
                                    <div class="col-mx-6">
                                        <button href ="#" type = "button" class="btn btn-success" data-bs-dismiss ="modal" data-bs-toggle= "modal" >
                                            <i class= 'fa fa-paper-plane me-2'> </i>Send
                                        </button>
                                        <button type = "button" class="btn btn-danger" data-bs-dismiss = "modal"  name = "no" value ="No">
                                            <i class= "fa fa-times me-2"></i>Discard
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

        <div class="modal fade" id = "dec-val" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger ">
                    <div class="modal-header bg-danger bg-transparent ">
                        <h5 class="modal-title" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                       
                        <div class="row">
                            <p class = "fs-4 text-center">You are about to decline a proof of payment, do you wish to proceed sending decline message?<br><span class="text-muted fs-6">*Select (<i class = "fa fa-check">)</i> if certain</span></p>
                        </div>
                        <div class="row justify-content-center" align = "center">
                            <div class="col-12">

                                <div class="btn-group">
                                <button type = "submit" class="btn btn-success" data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                    <i class= 'fa fa-check mx-1'></i>Confirm
                                </button>

                                </div>
                               <div class="btn-group">
                                <button type = "button" class="btn btn-danger" data-bs-dismiss = "modal"  name = "no" value ="No">
                                    <i class= "fa fa-times mx-1"></i>Cancel
                                </button>
                                </div>
                            </div>
                          
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        
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
                        var rentype = document.getElementById('rt').value;
                        if (rentype == "Rental/Boarder") {
                            document.getElementById('hm').required = true;
                        } else {
                            document.getElementById('hm').required = false;
                        }
                        document.getElementById(divId).style.display = element.value == 'Rental/Boarder' ? 'block' : 'none';
                    }
                    function showOthersdec(divId, element) {
                        document.getElementById(divId).style.display = element.value == 'others' ? 'flex' : 'none';
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
<?php }
        }
    } ?>
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
                    url: "fetchdataman.php",
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