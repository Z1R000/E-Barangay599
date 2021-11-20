<?php
$curr = "Manage Registration";
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
error_reporting(0);

include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid'] == 0)) {
    header('location:logout.php');
} else {
    $eid = intval($_GET['editid']);
    $time = new DateTime("now", new DateTimeZone('Asia/Manila'));

    $mail = new PHPMailer(true);

    function itexmo($number,$message,$apicode,$passwd){
        $ch = curl_init();
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
        curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
        curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 
                    http_build_query($itexmo));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return curl_exec ($ch);
        curl_close ($ch);
    }

    if (isset($_POST['submit'])) {
        $sql = "SELECT * from tblcredits";
        $query=$dbh->prepare($sql);
        $query->execute();
        $result1=$query->fetchAll(PDO::FETCH_OBJ);
        foreach ($result1 as $row1) {
            $api=$row1->ApiCode;
            $passwd=$row1->ApiPassword;
        }

        
        $today = date('Y-m-d');
        $sdates = date('F j, Y - h:i A', strtotime($today));
        $text = "From Barangay 599 V. Mapa\n\nYour registration request has been accepted.\n\n This is a system-generated message. Please do not reply.";

        $sql = "SELECT * from tblresident WHERE Cellphnumber IS NOT NULL AND ID = :eid";
        $query=$dbh->prepare($sql);
        $query->bindParam(':eid', $eid, PDO::PARAM_STR);
        $query->execute();
        $result1=$query->fetchAll(PDO::FETCH_OBJ);
        foreach ($result1 as $row1) {
            $number = $row1->Cellphnumber;
            $result = itexmo($number, $text, $api, $passwd);
            if ($result == "") {
            echo "iTexMo: No response from server!!!
        Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
        Please CONTACT US for help. ";
            } else if ($result == 0) {
                
            } else {
            echo "Error Num " . $result . " was encountered!";
            }
        }

        $sql ="Select tbladmin.*, tblresident.*, tblpositions.* from tblresident join tbladmin on tbladmin.residentID = tblresident.ID join tblpositions on tblpositions.ID = tbladmin.BarangayPosition where tbladmin.ID = :aid";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':aid',$aid,PDO::PARAM_STR);
    $query->execute();
    foreach($results as $row)
	{$getpos = "$row->Position $row->LastName";}

    try {
        //Server settings
                             //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'ebarangay599@gmail.com';                     //SMTP username
        $mail->Password   = '599-E-Barangay';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        $mail->setFrom('ebarangay599@gmail.com', $getpos);

        $sqle = "SELECT * from tblresident WHERE ID = :eid";
        $querye=$dbh->prepare($sqle);
        $querye->bindParam(':eid',$eid,PDO::PARAM_STR);
        $querye->execute();
        $resulte=$querye->fetchAll(PDO::FETCH_OBJ);
        foreach ($resulte as $rowe) {
            $mid = $rowe->MiddleName;
            $emails = $rowe->Email;
            $mail->addAddress("$emails");
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Notification from Barangay 599 V. Mapa';
            $mail->Body    = '<div class="">
            <div class="aHl">
        
            </div>
            <div id=":2g8" tabindex="-1">
        
            </div>
            <div id=":2fx" class="ii gt" jslog="20277; u014N:xr6bB; 4:W251bGwsbnVsbCxbXV0.">
                <div id=":2fw" class="a3s aiL msg-3877720715821999831"><u></u>
        <div style="color:#565a5c;background-color:#f2f5f6;margin:0px 0px 0px 0px">
          <div style="color:#565a5c;font-family:&quot;Helvetica Neue&quot;,&quot;Helvetica&quot;,Helvetica,Arial,sans-serif;font-size:16px;border-collapse:collapse;max-width:800px;margin:0px auto;padding-top:25px;padding-left:25px;padding-right:25px">
            <div>
          <div>
            <div id="m_-3877720715821999831header-wrapper" style="margin-bottom:16px">
              <div>
                <a href="https://barangay599.com/" style="text-decoration:none;outline:none" target="_blank" data-saferedirecturl="https://barangay599.com/">
                  <img style="width:120px;height:100px" src="https://scontent-sin6-2.xx.fbcdn.net/v/t1.15752-9/255421087_257470519597544_8116769992785817332_n.png?_nc_cat=105&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeHWhijsWVAHOygPG_m3voCBmxZz3dIYsgabFnPd0hiyBp9aH3-I_IUogzCpXWiHWsvjj7BGhoUj3j6LW5c0qklh&_nc_ohc=JDSRMi83fA4AX_33U-M&tn=cYgfj995MRwIySit&_nc_ht=scontent-sin6-2.xx&oh=5b77bbab7229a3a6cf8935f99c8ef96f&oe=61BCECF6" class="CToWUd">
                </a>
              </div>
            </div>
          </div>
        </div>
            <div id="m_-3877720715821999831body-wrapper">
              <div style="background-color:#ffffff;padding-top:1px">
                <div class="m_-3877720715821999831content">
                  
                  <div style="margin:0;padding:0">
                    <div style="margin:0;padding:0;margin-top:1em">
                      Hi <b>'.ucfirst($rowe->FirstName)." ".ucfirst($mid[0]).". ".ucfirst($rowe->LastName)." ".ucfirst($rowe->Suffix).'</b>,
                    </div>
        
                    <div style="margin:0;padding:0;margin-top:1em">
                      Your registration request has been approved.
                    </div>
        
                    <div style="margin:0;padding:0;margin-top:1em">
                      
                    </div>
        
                    <div style="margin:0;padding:0;margin-top:1em">
                      <p>Please do not reply to this message. This is a system-generated email sent to <span>[<a href="mailto:'.$emails.'" target="_blank">'.$emails.'</a>]</span>.</p>
                      <p>Thank you !</p>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div>
          <div>
          <div id="m_-3877720715821999831footer-wrapper">
            <div align="center">
              <table style="padding-top:30px;padding-bottom:30px;padding-left:30px;padding-right:30px;font-size:13px">
                <tbody>
                <tr>
                  <td style="text-align:center">
                    <div style="margin-top:20px">
                      <p style="text-decoration:none;outline:none;color:#9b9b9b;text-align:center">This is an electronic information from Barangay 599 Online System</p>
                    </div>
                  </td>
                </tr>
                </tbody>
              </table><div class="yj6qo"></div><div class="adL">
            </div></div><div class="adL">
          </div></div><div class="adL">
        
          </div></div><div class="adL">
        
        </div></div><div class="adL">
        
          </div></div><div class="adL">
        
        </div></div><div class="adL">
        
        
        </div></div></div><div id=":2gc" class="ii gt" style="display:none"><div id=":2gd" class="a3s aiL "></div></div><div class="hi"></div></div>
        ';
            $mail->AltBody = 'Barangay 599 V. Mapa';
        
            $mail->send();
            
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

        $sqla = "update tblresident set resStatus ='Active' WHERE ID=:eid";
        $querya = $dbh->prepare($sqla);
        $querya->bindParam(':eid', $eid, PDO::PARAM_STR);
        $querya->execute();

        echo '<script>alert("Resident has been approved.")</script>';
        echo "<script>window.location.href ='admin-residence.php'</script>";
    }

    if (isset($_POST['delete'])) {
        $eid = intval($_GET['editid']);

        $sqld = "Update tblresident set resStatus='Rejected' where ID=:eid";
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
        $sql = "select * from tblresident where ID=:eid";
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
                                           

                                            <input disabled id="fname" name="fname" type="text" class="form-control" disabled value="<?php echo $row->FirstName; ?>">
                                            <label for="" class="text-muted fs-6 small"> Place a space between if you have second or third name(e.g Juan Dela)</label>
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-3 px-4">
                                        <label for="mname" class="col-xl-2 fs-5 py-0"><span class="text-danger fs-5"></span>Middle Name<br><span class="fs-6 text-muted small"> (Gitnang Pangalan)</span></label>

                                        <div class="col-xl-8 col-sm-12">
                                      
                                            <input disabled type="text" id="mname" class="form-control" name="mname" value="<?php echo $row->MiddleName; ?>">
                                            <label for="" class="text-muted fs-6 small">If born without middle name just leave blank.</label>
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-3 px-4">
                                        <label for="lname" class="col-xl-2 fs-5 py-0"> <span class="text-danger fs-5">*</span>Last Name<br><span class="fs-6 text-muted small"> (Apelyido)</span></label>

                                        <div class="col-xl-8 col-sm-12">
                                            
                                            <input disabled type="text" id="lname" class="form-control" name="lname" disabled value="<?php echo $row->LastName; ?>">
                                            <label for="" class="text-muted fs-6 small"></label>
                                        </div>
                                    </div>
                                    <div class="row g-0 mb-3 px-4">
                                        <label for="fname" class="col-xl-2 fs-5 py-0"> <span class="text-danger fs-5"></span>Suffix<br><span class="fs-6 text-muted small"> (Kadugsong ng pangalan)</span></label>
                                        <div class="col-xl-5 col-sm-12">
                                           
                                            <input disabled id="sf" type="text" class="form-control" name="sf" value="<?php echo $row->Suffix; ?>">
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
                                            <input disabled type="date" id="bdate" class="form-control" name="bdate" disabled value="<?php echo $bdatesets; ?>">
                                            <label for="" class="text-muted fs-6 small">Format: day/month/year</label>
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-3 px-4">
                                        <label for="fname" class="col-xl-2 fs-5 py-0"> <span class="text-danger fs-5"></span>Birth Place<br><span class="fs-6 text-muted small"> (Lugar ng kapanganakan)</span></label>
                                        <div class="col-xl-5 col-sm-12">
                                            <br>
                                            <input disabled id="bp" type="text" class="form-control" name="bp" value="<?php echo $row->BirthPlace; ?>" disabled>
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-3 px-4">

                                        <label for="gender" class="col-sm-2 col-form-label  fs-5"><span class="text-danger fs-5">*</span>Gender<br><span class="fs-6 text-muted small"> (Kasarian)</span></label>
                                        <div class="col-xl-5 col-sm-12">
                                        
                                            <select id="gend" name="gend" class="form-select input-sm" aria-label="Default select example" id="gender" disabled>
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
                                            <select class="form-select input-sm" aria-label="Default select example" id="voter" name="voter" onchange="showprecinct('precinct', this)" disabled>
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
                                            
                                            <input disabled type="text" name="vp" class="form-control" id="pres" value="<?php echo $row->vPrecinct; ?>">

                                            </div>

                                        </div>
                                    </div>


                                    <div class="row g-0 mb-3 px-4">

                                        <label for="cs" class="col-sm-2 col-form-label  fs-5"><span class="text-danger fs-5">*</span>Civil Status<br><span class="fs-6 text-muted small"> (Kalagayang Sibil)</span></label>
                                        <div class="col-xl-5">
                                            <br>
                                            <select class="form-select input-sm" aria-label="Default select example" id="cstatus" name="cstatus" disabled>
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

                                        <label for="cs" class="col-sm-2 col-form-label  fs-5">Attached Valid ID <br><span class="fs-6 text-muted small"> (Aydentipikasyon)</span></label>
                                        <a href="<?php echo "../../".$row->attachment;?>" target= "_blank" class="link link-primary">Attached Valid ID <?php echo $row->LastName; ?></a>
                                        
                                    </div>
                                    <div class="row g-0 mb-3 px-4">
                                        <label for="sss" class="col-xl-2 fs-4 py-0">SSS Number<br></label>

                                        <div class="col-xl-6 col-sm-12">

                                            <input disabled type="text" id="sss" name="sss" class="form-control" value="<?php echo $row->sssNumber; ?>">

                                        </div>
                                    </div>
                                    <div class="row g-0 mb-3 px-4">
                                        <label for="tin" class="col-xl-2 fs-4 py-0">TIN</label>

                                        <div class="col-xl-6 col-sm-12">

                                            <input disabled type="text" id="tin" name="tin" class="form-control" value="<?php echo $row->tinNumber; ?>">
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
                                        Barangay Residency Information<span class=" fs-4 text-danger"> (required)</span>
                                    </div>
                                </div>
                                <div class="row g-0 ps-4 pe-2 ps-2">
                                    <div class="row g-0 mb-3 px-4">

                                        <label for="cs" class="col-sm-2 col-form-label  fs-5">Type of<Br> Residency<br><span class="fs-6 text-muted small"> (Uri ng residente)</span></label>
                                        <div class="col-xl-5">
                                            <br>
                                            <select class="form-select input-sm" aria-label="Default select example" name="residenttype" onchange="showDiv('hidden_div', this)" disabled id="rt">
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
                                                <input disabled type="text" class="form-control" placeholder="" id="hm" name="hm" value="<?php echo $row->HomeName; ?>" />
                                            </div>



                                        </div>
                                        <div class="row g-0 mb-3">
                                            <label for="cs" class=" col-form-label  fs-4">Purok Information</label>

                                            <div class="col-xl-3 col-sm-12 my-2 ">
                                                <div class="input-group">
                                                    <label for="" class="mx-2 fs-5 small">Purok&nbsp;</label>

                                                    <?php
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
                                                    <select class="form-control action" name="prk" id="prk" aria-label="Default select example" style="width: 60%;" disabled>
                                                        <option value='' disabled>--Purok--</option>
                                                        <?php echo $pName; ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-12 my-2 ">
                                                <div class="input-group">
                                                    <label for="" class="mx-2 fs-5 small">Street </label>
                                                    <select name="strt" id="strt" class="form-control action" disabled>
                                                        <?php
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
                                            <input disabled type="number" id="hunit" name="hunit" class="form-control" disabled value="<?php echo $row->houseUnit; ?>">
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
                                            <input disabled type="tel" id="contact" name="contact" class="form-control" pattern="[0]{1}[9]{1}[0-9]{9}" placeholder="09" title="Contact number should start with 09" value="<?php echo $row->Cellphnumber; ?>">
                                        </div>
                                    </div>

                                    <div class="row g-0 mb-3 px-4">
                                        <label for="email" class="col-xl-2 fs-5 py-0">E-mail Address<br><span class="fs-6 text-muted small"> (Emayl na ginagamit)</span></label>

                                        <div class="col-xl-5 col-sm-12">
                                            <br>
                                            <input disabled type="text" id="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $row->Email; ?>">
                                            <input disabled type="hidden" id="password" name="password" class="form-control" value="<?php echo $row->Password; ?>">
                                        </div>
                                    </div>


                                </div>

                                <div class="row g-0 justify-content-end">
                                
                                    <div class="col-xl-12 ">
                                        <div class="float-end">
                                        <div class="btn-group">
                                        <button type="submit" class="btn btn-danger form-control" name="delete"   href ="#decline-proof"id="delete">Reject</button>
                                        </div>
                                        <div class="btn-group">
                                                        
                                            
                                        <button type="submit" href= "#approve-proof" class="btn btn-success form-control" name="submit" id="submit">Approve</button>
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
                                        <input disabled id = "dname" type="text" class="form-control" value = "Juan Dela Cruz" readonly>

                                    </div>
                           
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="contac">Contact Number</label>
                                        <input disabled id = "contac" type="text" class="form-control" value = "09123456789" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Email Address</label>
                                        <input disabled id = "emails" type="text" class="form-control" value = "juanDelaC@gmail.com" readonly>
                                        
                                    
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
                                     <input disabled type="text" class="form-control" placeholder= "Specify a reason here">
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
                                                <input disabled class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    SMS
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input disabled class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
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
                                        <input disabled id = "dname" type="text" class="form-control" value = "Juan Dela Cruz" readonly>

                                    </div>
                           
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="contac">Contact Number</label>
                                        <input disabled id = "contac" type="text" class="form-control" value = "09123456789" readonly>
                   
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Email Address</label>
                                        <input disabled id = "emails" type="text" class="form-control" value = "juanDelaC@gmail.com" readonly>
                                        
                                    
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
                                            <input disabled class="form-check-input" type="checkbox" value="" id="sms">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                SMS
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input disabled class="form-check-input" type="checkbox" value="" id="em" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                E-mail
                                            </label>
                                            <input disabled class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
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
                <script type="text/javascript">
                    function showprecinct(divId, element) {
                        var vot = document.getElementById('voter').value;
                        if (vot == "Yes") {
                            document.getElementById('pres').disabled = true;
                        } else {
                            document.getElementById('pres').disabled = false;
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