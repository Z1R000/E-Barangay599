<?php 
    session_start();
    error_reporting(1);

    $curr = "Payment verification";
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
    header('location:logout.php');
    }else{
        $time = new DateTime("now", new DateTimeZone('Asia/Manila'));
        $mail = new PHPMailer(true);
        $eid =  $_GET['rid'];
        $type = $_GET['type'];
        $diff = $_GET['diff'];
        $condition = "";
        $rmk = $_POST['rmrks'];
        if($type == 1){
            $condition = "With change: ". number_format($diff,2);
        }
        else if ($type == 2){
            $condition = "With credit: ". number_format($diff,2);
        }else{
            $condition = "Payment complete. ";
        }

        $sql = "select tblcreaterental.*, tblresident.ID as residd, tblresident.* from tblcreaterental join tblresident on tblresident.ID = tblcreaterental.userID WHERE tblcreaterental.ID =:eid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':eid',$eid, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        foreach ($result as $r){
            $residd = $r->residd;
        }

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


            
        if(isset($_POST['send'])){

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
            $text = "From Barangay 599 V. Mapa\n\nYour payment for ".$rname." has been verified. Remarks=".$condition.". ".$rmk."\n\n This is a system-generated message. Please do not reply.";
    
            $sql = "SELECT * from tblresident WHERE Cellphnumber IS NOT NULL AND ID = :residd";
            $query=$dbh->prepare($sql);
            $query->bindParam(':residd', $residd, PDO::PARAM_STR);
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
    
            $sqle = "SELECT * from tblresident WHERE ID = :residd";
            $querye=$dbh->prepare($sqle);
            $querye->bindParam(':residd',$residd,PDO::PARAM_STR);
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
                        Your payment for '.$rname.' has been verified. Remarks='.$condition.'. '.$rmk.'
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

            $sql = "Update tblcreaterental set diff =:condition, remarks =:rmk where ID =:eid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':condition',$condition, PDO::PARAM_STR);
            $query->bindParam(':rmk',$rmk, PDO::PARAM_STR);
            $query->bindParam(':eid',$eid, PDO::PARAM_STR);
            $query->execute();
            echo "<script>alert('Rental payment has been approved.')</script>";
            header('Location: edit-rental.php?rid='.$eid);
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
                     <div class="btn-group">
                         <a href="admin-rentals.php" class="btn btn-secondary"><i class="fa fa-arrow-circle-left mx-2"></i>Go Back</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
    <div class="container-fluid p-5 ">
        <?php
            $sql= "SELECT tblstatus.ID as statid, tblcreaterental.*,tblrental.ID as renid,tblresident.ID as resid,tblpurposes.*, tblresident.*,tblrental.*, tblmodes.*, tblstatus.*,tblpurposes.ID as purposeID FROM tblcreaterental JOIN tblpurposes ON tblcreaterental.purpID = tblpurposes.ID JOIN tblresident ON tblresident.ID = tblcreaterental.userID JOIN tblrental ON tblrental.ID = tblcreaterental.rentalID JOIN tblmodes ON tblmodes.ID = tblcreaterental.modeOfPayment JOIN tblstatus ON tblstatus.ID = tblcreaterental.status and tblcreaterental.ID =".$_GET['rid']." ";
            

            $query= $dbh->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            
            foreach ($result as $i){
                
          
        ?>
        
        <div class="row">
            <div class="col-xl-8   mx-auto">
                <div class="container" style= "display:block;">
                <div class="row gx-3 bg-success border-success text-white">
                    <div class="fs-5">Accepted Payment Message</div>
                </div>
                <form method = "POST">
                <div class="row gx-3 border-start border-end border-bottom shadow-sm">
                <div class="row mt-2 ms-2 me-3">
                            <form  method = "POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="dname">Requestor Name</label>
                                        <input id = "dname" type="text" class="form-control" value = "<?php echo $i->FirstName." ".$i->MiddleName." ".$i->LastName." ".$i->$Suffix; ?>  "readonly>
                                    </div>
                           
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="contac">Contact Number</label>
                                        <input id = "contac" type="text" class="form-control" value = "<?php echo $i->Cellphnumber?>" readonly>
                   
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Email Address</label>
                                        <input id = "emails" type="text" class="form-control" value = "<?php echo $i->Email ?>" readonly>
                                        
                                    
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="ars">Acquired Rental Property</label>
                                        <input id = "crs" type="text" class="form-control" value = "<?php echo $i->rentalName?>" readonly>
                   
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Payment Status</label>
                                        <input id = "emails" type="text" class="form-control" value = "<?php echo $i->statusName?>" readonly>
                                       
                                    
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Condition</label>
                                        <input id = "emails" type="text" class="form-control" value = "<?php echo $condition?>" readonly>
                                       
                                    
                                    </div>
                                </div>
                                <div class="row mt-2">
                                        <label for="remarks" >Remarks</label>
                                        <div class="col-md-112">
                                            <div class="form-floating">
                                            <textarea class="form-control" name= "rmrks" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;resize: none"><?php echo $i->remarks?></textarea> 
                                            <label for="floatingTextarea2">Remarks here (max 10 words)</label>
                                                
                                            </div>
                                        </div>
                                   
                                </div>
                               
                                <div class="row justify-content-center py-2" align = "center">
                                    
                                    <div class="col-md-12">
                                        <div class="float-end">
                                            <div class="btn-group">
                                        <button name= "send" type = "submit" class="btn btn-success" >
                                            <i class= 'fa fa-paper-plane me-2'> </i>Send
                                        </button>
                                        </div>
                                        <div class="btn-group">
                                        <button type = "button" class="btn btn-danger" data-bs-dismiss = "modal"  name = "no" value ="No">
                                            <i class= "fa fa-times me-2"></i>Discard
                                        </button>
                                        </div>
                                        </div>
                                
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
          <?php } ?>
            
    <?php
        include('services.php');
    ?>
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