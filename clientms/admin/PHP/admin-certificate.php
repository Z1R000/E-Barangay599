<?php
$curr = "Certifications";

$con = mysqli_connect("localhost", "root", "", "clientmsdb");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid'] == 0)) {
    header('location:logout.php');
} else {
    $aid = $_SESSION['clientmsaid'];
    if(isset($_POST['submit']))
        {
            $usid=$_POST['usid'];
            $ctype=$_POST['ctype'];
            $mop=$_POST['mop'];
            $purp=$_POST['purp'];
            $bn=$_POST['bn'];
            $cadm=$_POST['cadm'];
            $other=$_POST['other'];
            
            $sql="insert into tblcreatecertificate (Userid, CertificateId, pMode, cAdmin, Purpose, other, bName) VALUES (:usid,:ctype,:mop,:cadm,:purp,:other,:bn)";
            $query=$dbh->prepare($sql);
            $query->bindParam(':usid',$usid,PDO::PARAM_STR);
            $query->bindParam(':mop',$mop,PDO::PARAM_STR);
            $query->bindParam(':purp',$purp,PDO::PARAM_STR);
            $query->bindParam(':bn',$bn,PDO::PARAM_STR);
            $query->bindParam(':other',$other,PDO::PARAM_STR);
            $query->bindParam(':ctype',$ctype,PDO::PARAM_STR);
            $query->bindParam(':cadm',$cadm,PDO::PARAM_STR);
            $query->execute();
            

            $LastInsertId = $dbh->lastInsertId();
            if ($LastInsertId > 0) {
                echo '<script>alert("Certificate information has been added")</script>';
                echo "<script>window.location.href ='admin-certificate.php'</script>";
            } else {
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
        <title><?php echo $curr; ?></title>

        <?php include('link.php') ?>

        <script>
            $(document).ready(function() {
                $('#crecall').DataTable({
                    dom: 'Bfrtip',
                    buttons: {
                        buttons: [{
                                extend: 'print',
                                text: 'Generate Report',
                                className: 'btn btn-primary my-1',
                                message: 'The following data are report for the certifications catered by Barangay 599',
                                title: '',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                },

                                customize: function(win) {
                                    $(win.document.body)
                                        .css('font-size', '16pt', '')
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
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                }
                            },




                        ],
                        dom: {
                            button: {
                                className: 'btn'
                            }
                        }

                    }

                });
            });

            $(document).ready(function() {
                $('#crecnbc').DataTable({
                    dom: 'Bfrtip',
                    buttons: {
                        buttons: [{
                                extend: 'print',
                                text: 'Generate Report',
                                className: 'btn btn-primary my-1',
                                message: 'The following data are report for the certifications catered by Barangay 599',
                                title: '',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                },

                                customize: function(win) {
                                    $(win.document.body)
                                        .css('font-size', '16pt', '')
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
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                }
                            },




                        ],
                        dom: {
                            button: {
                                className: 'btn'
                            }
                        }

                    }

                });
            });

            $(document).ready(function() {
                $('#crecbc').DataTable({
                    dom: 'Bfrtip',
                    buttons: {
                        buttons: [{
                                extend: 'print',
                                text: 'Generate Report',
                                className: 'btn btn-primary my-1',
                                message: 'The following data are report for the certifications catered by Barangay 599',
                                title: '',
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                },

                                customize: function(win) {
                                    $(win.document.body)
                                        .css('font-size', '16pt', '')
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
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                }
                            },




                        ],
                        dom: {
                            button: {
                                className: 'btn'
                            }
                        }

                    }

                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#clist').DataTable();
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#cpay').DataTable();
            });
        </script>


        <link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

        <style type="text/css">
            .btng {
                width: 50px;
            }


            @media (max-width: 576px) {

                .wal {
                    display: none;
                }

                .dis {
                    font-size: 15px;
                }

                .ser {
                    width: 100%;
                }

            }

            @media print {

                html,
                body {
                    height: auto;
                }

                .dt-print-table,
                .dt-print-table thead,
                .dt-print-table th,
                .dt-print-table tr {
                    border: 0;
                }
            }

            .red {
                background: #8B0000;
                border: 1px solid #8B0000;
            }

            .white {
                color: white;
            }

            .pay {
                border: 1px solid grey;
            }

            @media print {


                #disa {
                    visibility: hidden;
                }

            }

            @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');


            .sidebar li .submenu {
                list-style: none;
                margin: 0;
                padding: 0;
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .box {
                display: none;
            }
        </style>

    </head>
    <script>
        $(document).ready(function() {
            $("#cty").change(function() {
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else{
                        $(".box").hide();
                    }
                });
            }).change();
        });
    </script>

    <body>

        <?php
        include('../includes/sidebar.php');

        ?>
        <!--breadcrumb-->
        <div class="d-flex align-items-center">
            <div class="container mx-5 mt-3">
                <nav aria-label="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-decoration-none" href="#service-choice" data-bs-toggle="modal" role="button"><i class="fa fa-hand-paper"></i>&nbsp;Services</a></li>

                            <li class="breadcrumb-item active"><a href="#"><i class="fa fa-list text-muted"></i></a>&nbsp;<?php echo $curr; ?></li>
                        </ol>
                    </nav>
                </nav>
            </div>
        </div>
        </div>
        </nav>


        <form action="view-cert.php" method="POST">
            <div class="container-fluid  px-5 ">

                <div class="row">
                    <div class="col-xl-2">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#crecords" aria-current="page" href="#" data-bs-toggle="tab">Certification Records</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#holding" data-bs-toggle="tab">Payment Logs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#certlist" data-bs-toggle="tab">Certificates List</a>
                            </li>

                        </ul>
                    </div>

                    <div class="col-xl-10 my-2">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="crecords">
                                <div class="container g-0">
                                    <div class="row shadow-sm py-1 bg-599 text-white rounded-top">
                                        <div class="fs-5 px-2"><i class="fa fa-copy mx-1"></i>Certification Records</div>
                                    </div>

                                    <div class="row py-2 bg-white  mb-5 py-5 border-start border-bottom border-end">
                                        <div class="row pb-2 px-4 g-0 justify-content-end">
                                            <div class="col-9">
                                                <div class="btn-group float-start">
                                                    <label class="fs-6 px-1" for="purok"> Certificate Type: </label>

                                                    <select name="cty" id="cty" class="form-select input-sm border-primary" aria-label="Default select example" style="width: 80%;">
                                                        <option value="all" selected>All Certificates</option>
                                                        <option value="nbc">Non-Business Certificates</option>
                                                        <option value="bc">Business Certificates</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3 ">
                                                <div class="btn-group float-end">
                                                    <a href="#walk-in" data-bs-toggle="modal" role="button" class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus mx-1"></i><span class="wal">Walk-in Certification</span></a>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col" style="overflow-x:auto;">
                                                <div class="all box" id="all">
                                                    <?php $query = "SELECT tblcertificate.*, tblcreatecertificate.ID as getid, tblcreatecertificate.Userid, tblcreatecertificate.CertificateId, tblcreatecertificate.status, tblcreatecertificate.resDate, tblresident.LastName, tblresident.FirstName, tblresident.MiddleName, tblresident.Suffix, tblstatus.* FROM tblcertificate join tblcreatecertificate on tblcreatecertificate.CertificateId = tblcertificate.ID join tblresident on tblcreatecertificate.Userid = tblresident.ID join tblstatus on tblcreatecertificate.status = tblstatus.ID ORDER BY statusName DESC, tblcreatecertificate.resDate";
                                                    $result = mysqli_query($con, $query);  ?>
                                                    <table class="table table-striped table-bordered pt-2" id="crecall" style="min-width: 960px;">
                                                        <thead>


                                                            <th style="text-align: left">BCN</th>
                                                            <th style="text-align: left">Status</th>
                                                            <th style="text-align: left;width: 24%;">Requestor</th>
                                                            <th style="text-align: left; width:20%">Certification</th>
                                                            <th style="text-align: left;">Fee(₱)</th>
                                                            <th style="text-align: left; width:20% ">Date</th>
                                                            <th style="text-align: center; width:30%">Actions</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                $cdate = $row["resDate"];
                                                                echo '  
                                                            <tr>
                                                                <td scope="col" style = "text-align: left">015-22</td>
                                                                <td scope="col" style = "text-align: left">' . $row["statusName"] . '</td>
                                                                <td scope="col" style = "text-align: left">' . $row["LastName"] . ', ' . $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["Suffix"] . '</td>
                                                                <td scope="col" style = "text-align: left">' . $row["CertificateName"] . '</td>
                                                                <td scope="col" style = "text-align: right">' . $row["CertificatePrice"] . '</td>
                                                                <td scope="col" style = "text-align: left">' . date('F j Y - h:i A', strtotime($cdate)) . '</td>
                                                                <td scope="col" id = "disa" style = "text-align: center">
                                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                                <a type="" href ="edit-cert-record.php?editid=' . $row["getid"] . '"class="btn btn-primary"><i class = "fa fa-edit mx-1"></i><span class="wal">Manage</span></a>
                                                                            </div>';
                                                                if ($row["statusName"] != "Settled") {
                                                                    echo '<div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                                    <a type="button" href ="#approve-transac" data-bs-toggle = "modal" role = "button" class="btn  btn-info white"><i class = "fa fa-paper-plane mx-1 white"></i><span class="wal">Send</span></a>
                                                                                </div>';
                                                                }
                                                                echo '
                                                                        
                                                                        
                                                                            
                                                                        
                                                                        </td>
                                                            ';
                                                            }
                                                            ?>

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="nbc box" id="nbc">
                                                    <?php $query = "SELECT tblcertificate.*, tblcreatecertificate.ID as getid, tblcreatecertificate.Userid, tblcreatecertificate.CertificateId, tblcreatecertificate.status, tblcreatecertificate.resDate, tblresident.LastName, tblresident.FirstName, tblresident.MiddleName, tblresident.Suffix, tblstatus.* FROM tblcertificate join tblcreatecertificate on tblcreatecertificate.CertificateId = tblcertificate.ID join tblresident on tblcreatecertificate.Userid = tblresident.ID join tblstatus on tblcreatecertificate.status = tblstatus.ID where tblcertificate.Type = '1' ORDER BY statusName DESC, tblcreatecertificate.resDate";
                                                    $result = mysqli_query($con, $query);  ?>
                                                    <table class="table table-striped table-bordered pt-2" id="crecnbc" style="min-width: 960px;">
                                                        <thead>


                                                            <th style="text-align: left">BCN</th>
                                                            <th style="text-align: left">Status</th>
                                                            <th style="text-align: left;width: 24%;">Requestor</th>
                                                            <th style="text-align: left; width:20%">Certification</th>
                                                            <th style="text-align: left;">Fee(₱)</th>
                                                            <th style="text-align: left; width:20% ">Date</th>
                                                            <th style="text-align: center; width:30%">Actions</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                $cdate = $row["resDate"];
                                                                echo '  
                                                            <tr>
                                                                <td scope="col" style = "text-align: left;width:10%">015-22</td>
                                                                <td scope="col" style = "text-align: left;width:5%">' . $row["statusName"] . '</td>
                                                                <td scope="col" style = "text-align: left;width:25%;">' . $row["LastName"] . ', ' . $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["Suffix"] . '</td>
                                                                <td scope="col" style = "text-align: left;width:20%;">' . $row["CertificateName"] . '</td>
                                                                <td scope="col" style = "text-align: right">' . $row["CertificatePrice"] . '</td>
                                                                <td scope="col" style = "text-align: left">' . date('F j Y - h:i A', strtotime($cdate)) . '</td>
                                                                <td scope="col" id = "disa" style = "text-align: center;width:35%">
                                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                                <a type="" href ="edit-cert-record.php?editid=' . $row["getid"] . '"class="btn btn-primary"><i class = "fa fa-edit mx-1"></i><span class="wal">Manage</span></a>
                                                                            </div>';
                                                                if ($row["statusName"] != "Settled") {
                                                                    echo '<div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                                    <a type="button" href ="#approve-transac" data-bs-toggle = "modal" role = "button" class="btn  btn-info white"><i class = "fa fa-paper-plane mx-1 white"></i><span class="wal">Send</span></a>
                                                                                </div>';
                                                                }
                                                                echo '
                                                                        
                                                                        
                                                                            
                                                                        
                                                                        </td>
                                                            ';
                                                            }
                                                            ?>

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="bc box">
                                                    <?php $query = "SELECT tblcertificate.*, tblcreatecertificate.ID as getid, tblcreatecertificate.Userid, tblcreatecertificate.CertificateId, tblcreatecertificate.status, tblcreatecertificate.resDate, tblresident.LastName, tblresident.FirstName, tblresident.MiddleName, tblresident.Suffix, tblstatus.* FROM tblcertificate join tblcreatecertificate on tblcreatecertificate.CertificateId = tblcertificate.ID join tblresident on tblcreatecertificate.Userid = tblresident.ID join tblstatus on tblcreatecertificate.status = tblstatus.ID where tblcertificate.Type = '2' ORDER BY statusName DESC, tblcreatecertificate.resDate";
                                                    $result = mysqli_query($con, $query);  ?>
                                                    <table class="table table-striped table-bordered pt-2" id="crecbc" style="min-width: 960px;">
                                                        <thead>


                                                            <th style="text-align: left">BCN</th>
                                                            <th style="text-align: left">Status</th>
                                                            <th style="text-align: left;width: 24%;">Requestor</th>
                                                            <th style="text-align: left; width:20%">Certification</th>
                                                            <th style="text-align: left;">Fee(₱)</th>
                                                            <th style="text-align: left; width:20% ">Date</th>
                                                            <th style="text-align: center; width:30%">Actions</th>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                $cdate = $row["resDate"];
                                                                echo '  
                                                            <tr>
                                                                <td scope="col" style = "text-align: left">015-22</td>
                                                                <td scope="col" style = "text-align: left">' . $row["statusName"] . '</td>
                                                                <td scope="col" style = "text-align: left">' . $row["LastName"] . ', ' . $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["Suffix"] . '</td>
                                                                <td scope="col" style = "text-align: left">' . $row["CertificateName"] . '</td>
                                                                <td scope="col" style = "text-align: right">' . $row["CertificatePrice"] . '</td>
                                                                <td scope="col" style = "text-align: left">' . date('F j Y - h:i A', strtotime($cdate)) . '</td>
                                                                <td scope="col" id = "disa" style = "text-align: center">
                                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                                <a type="" href ="edit-cert-record.php?editid=' . $row["getid"] . '"class="btn btn-primary"><i class = "fa fa-edit mx-1"></i><span class="wal">Manage</span></a>
                                                                            </div>';
                                                                if ($row["statusName"] != "Settled") {
                                                                    echo '<div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                                    <a type="button" href ="#approve-transac" data-bs-toggle = "modal" role = "button" class="btn  btn-info white"><i class = "fa fa-paper-plane mx-1 white"></i><span class="wal">Send</span></a>
                                                                                </div>';
                                                                }
                                                                echo '
                                                                        
                                                                        
                                                                            
                                                                        
                                                                        </td>
                                                            ';
                                                            }
                                                            ?>

                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="holding">
                                <div class="container g-0 mb-5">
                                    <div class="row shadow-sm py-1 bg-599 text-white rounded-top">
                                        <div class="fs-5 px-2"><i class="fa fa-money-bill mx-1"></i>Payment Logs</div>
                                    </div>
                                    <div class="row bg-white py-4 mb-5 border-start border-bottom border-end">
                                        <div class="col-xl-6" style="overflow:auto;">
                                            <table class="table table-striped table-bordered" id="cpay" style="min-width: 200px;max-height: 600px">
                                                <thead>
                                                    <th style="text-align: left">Request</th>
                                                    <th style="text-align: left">Requestor</th>
                                                    <th style="text-align: left">Proof of Payment</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td scope="col" style="text-align: left">Barangay Permit</td>

                                                        <td scope="col" style="text-align: left">ekoc omsim</td>
                                                        <td class="text-center">
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a type="" style=" width:100px;" href="#" class="link bg-primary link-light rounded"><i class="fa fa-eye me-1"></i><span class="wal">Payment</span></a>
                                                            </div>
                                                        </td>



                                                    </tr>
                                                    <tr>
                                                        <td scope="col" style="text-align: left">Barangay Permit</td>

                                                        <td scope="col" style="text-align: left">ekoc omsim</td>
                                                        <td class="text-center">
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a type="" style=" width:100px;" href="#" class="link bg-primary rounded link-light"><i class="fa fa-eye me-1"></i><span class="wal">Payment</span></a>
                                                            </div>
                                                        </td>



                                                    </tr>
                                                    <tr>
                                                        <td scope="col" style="text-align: left">Barangay Permit</td>

                                                        <td scope="col" style="text-align: left">ekoc omsim</td>
                                                        <td class="text-center">
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a type="" style=" width:100px;" href="#" class="link  bg-primary link-light rounded"><i class="fa fa-eye me-1"></i><span class="wal">Payment</span></a>
                                                            </div>
                                                        </td>



                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <form action="" action="POST">
                                            <div class="col-xl-6" style="overflow-y:auto;overflow-x:auto;">
                                                <div class="row g-0 px-1" style="max-height: 600px;">
                                                    <div class="row">
                                                        <div class="col-md-5 ">
                                                            <label for="payid" class="fs-5">Payment ID</label>
                                                            <input id="payid" type="text" class="form-control" placeholder="Payor Name" value="213213123" readonly style="text-align: left;">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <label for="payname" class="fs-5">Requestor Name</label>
                                                            <input id="payname" type="text" class="form-control" placeholder="Payor Name" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-6 ">
                                                            <label for="payed" class="fs-5">Paid</label>
                                                            <div class="input-group">
                                                                <button class="btn btn-secondary disabled">₱</button>
                                                                <input id="payed" type="text" class="form-control" placeholder="Payor Name" value="50" style="text-align: right" readonly>

                                                            </div>

                                                        </div>
                                                        <div class="col-md-6 " class="fs-5">
                                                            <label for="payed" class="fs-5">Payable</label>
                                                            <div class="input-group">
                                                                <button class="btn btn-secondary disabled">₱</button>
                                                                <input id="payed" type="text" class="form-control" placeholder="Payor Name" value="50" style="text-align: right" readonly>

                                                            </div>

                                                        </div>
                                                        <label for="payed" class="fs-5 mb-2">Proof of Payment- <a href="../images/proof.jpg" download target="_blank" class="text-decoration-none"><i class="fa fa-download"></i>Download proof</label></a>

                                                        <div class="row justify-content-center text-center">
                                                            <div class="col-md-4">
                                                                <a align="center" href="#proof" data-bs-toggle="modal" style="max-height: 400px"><img src="../images/proof.jpg" alt="proof of payment" class="img-fluid"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-end">
                                                        <div class="col" align="right">


                                                            <div class="btn-group">
                                                                <div class="btn-group  mb-1  " role="group" aria-label="First group">
                                                                    <a href="#approve-proof " class="btn btn-success mx-1" data-bs-toggle="modal"><i class="fa fa-check mx-1 "></i><span class="wal">Accept</span></a>
                                                                </div>
                                                                <div class="btn-group  mb-1  " role="group" aria-label="First group">
                                                                    <a href="#decline-proof " class="btn btn-danger mx-1" data-bs-toggle="modal"><i class="fa fa-times fa-1x mx-1 "></i><span class="wal"> Decline</span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="certlist">
                            <div class="container my-2 g-0">
                                <div class="row shadow-sm py-1 bg-599 text-white rounded-top">
                                    <div class="fs-5 px-2"><i class="fa fa-stamp mx-1"></i>Available Certificates</div>
                                </div>
                            </div>
                            <div class="row py-2 bg-white mb-5 py-5 border-start border-bottom border-end">
                                <div class="row pb-2 px-4 g-0 justify-content-end">
                                    <div class="col-3 ">
                                        <div class="btn-group float-end">
                                            <a href="add-certificate.php" class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus mx-1"></i><span class="wal">New Certificate</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 ps-5" style="overflow-x:auto;">
                                        <table class="table table-striped table-bordered" id="clist" style="min-width: 900px;">
                                            <thead>

                                                <tr>
                                                    <th style="text-align: left">Certification Name</th>
                                                    <th style="text-align: left">Certification Fee</th>
                                                    <th style="text-align: center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-hover">
                                                <?php
                                                $sqllist = "select * from tblcertificate";
                                                $checkclist = $dbh->prepare($sqllist);
                                                $checkclist->execute();
                                                $resultclist = $checkclist->fetchAll(PDO::FETCH_OBJ);
                                                foreach ($resultclist as $rowclist) {

                                                    echo "<tr>
                                                        <td '>$rowclist->CertificateName</td>
                                                        <td scope='col' style = 'text-align: right'>$rowclist->CertificatePrice</td>
                                                        <td  style = 'text-align: center'>
                                                            
                                                                <div class='btn-group me-1 mb-1' role='group' aria-label='First group'>
                                                                    <a type='' href ='edit-Cert.php?editid=$rowclist->ID' class='btn btn-success'><i class = 'fa fa-edit me-2'></i>Edit</a>
                                                                </div>
                                                                   
                                                               
                                                                <div class='btn-group me-1 mb-1' role='group' aria-label='First group'>
                                                                    <a type='button' href ='#delete-cert' data-bs-toggle = 'modal' role = 'button' class='btn  btn-danger'><i class = 'fa fa-trash me-2'></i>Delete</a>
                                                                </div>
                                                            
                                                        </td>

                                                    </tr>";
                                                } ?>
                                            </tbody>
                                        </table>
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
            </div>



        </form>

        <!--modal-->

        <?php
        include('services.php');

        ?>
        <!--modal-payment-->




        <div class="modal fade" id="dec-val" tab-idndex="-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger ">
                    <div class="modal-header bg-danger bg-transparent ">
                        <h5 class="modal-title" id="delete">&nbsp;<i class="fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">

                        <div class="row">
                            <p class="fs-4 text-center">You are about to decline a proof of payment, do you wish to proceed sending decline message?<br><span class="text-muted fs-6">*Select (<i class="fa fa-check">)</i> if certain</span></p>
                        </div>
                        <div class="row justify-content-center" align="center">
                            <form method="POST" action="#">
                                <button type="button" class="btn btn-success rounded-circle" data-bs-dismiss="modal" name="yes" value="Yes">
                                    <i class='fa fa-check '></i>
                                </button>
                                <button type="button" class="btn btn-danger rounded-circle" data-bs-dismiss="modal" name="no" value="No">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </div>

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

        <!--end-payments-->

        <div class="modal fade" id="delete-cert" tab-index="-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger ">
                    <div class="modal-header bg-danger bg-transparent ">
                        <div class="modal-title text-white" id="delete">&nbsp;<i class="fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</div>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row">
                            <div class="col xl-4" align="center">
                                <img src="../images/trash.png" alt="trash" class=" img-fluid " style="width: 10%;">
                            </div>

                        </div>
                        <div class="row">
                            <p class="fs-4 text-center">You are about to delete an existing certificate, do you wish to continue?<br><span class="text-muted fs-6">*Select (<i class="fa fa-check">)</i> if certain</span></p>
                        </div>
                        <div class="row justify-content-center">
                            <form method="POST" action="#">
                                <div class="col-12">
                                    <div class="float-end">

                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal" name="yes" value="Yes">
                                            <i class='fa fa-check mx-1 '></i> Confirm
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" name="no" value="No">
                                            <i class="fa fa-times mx-1"></i> Cancel
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


        <div class="modal fade" id="walk-in" tab-idex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content g-0  ">
                    <?php
                    if (isset($_POST['submit'])) {
                        $clientmsaid = $_SESSION['clientmsaid'];
                        $search = $_POST['search'];
                    }
                   
                       
                
                    ?>
                    <form method="post">
                        <div class="modal-header bg-599 border-599 ">
                            <div class="modal-title text-white" id="delete ">&nbsp;<i class="far fa-copy"></i>&nbsp;&nbsp;Walk in Certification</div>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body bg-white py-4">
                            <div class="row align-items-center">
                            
                                <div class="col-xl-4">
                                    <label for="date" class="fw-bold fs-6">Date today</label>
                                    <input type="text" class="form-control" value="<?php echo date("F j, Y"); ?>" readonly>
                                    
                                </div>
                                <div class="col-xl-4">

                                    
                                    <input type="text" class="form-control" name="cadm" id="cadm" style="display: none;" value="<?php  $aid = $_SESSION['clientmsaid']; $sqls="SELECT tbladmin.*, tblresident.*, tblpositions.* from tbladmin JOIN tblresident on tbladmin.residentID=tblresident.ID join tblpositions on tblpositions.ID = tbladmin.BarangayPosition WHERE tbladmin.ID = :aid";
                        $querys = $dbh->prepare($sqls);
                        $querys->bindParam(':aid',$aid,PDO::PARAM_STR);
                        $querys->execute();
                        $results = $querys->fetchAll(PDO::FETCH_OBJ);
                        foreach ($results as $rows) {
                            $pos = "$rows->Position $rows->LastName"; echo "$pos";}?>" readonly>
                                
                                </div>
                            </div>


                            <div class="row g-3 ">
                                <div class="col-md-6">

                                    <label for="rname" class="fs-6 fw-bold">Requestor Name</label>
                                    <input type="text" class="form-control" name="search" id="search" placeholder="e.g Juan Dela Cruz" autocomplete="off" required>
                                    <div class="col" style="z-index: 9;position:relative">
                                        <div class="list-group w-75" id="show-list" style="position: absolute">
                                            <!-- Here autocomplete list will be display -->
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                               
                                    <label for="purp" class="fs-6 fw-bold">Purpose</label>
                                    <select class="select form-select" name="purp" id="purp" onchange="showOthers('other_txt',this);" required>
                                        <option selected disabled>--Purpose--</option>
                                        <?php
                                                $sqllist = "select * from tblpurposes where serviceType='certification'";
                                                $checkplist = $dbh->prepare($sqllist);
                                                $checkplist->execute();
                                                $resultplist = $checkplist->fetchAll(PDO::FETCH_OBJ);
                                                foreach ($resultplist as $rowplist) {?>
                                        <?php echo '<option value="'.$rowplist->Purpose.'">'.$rowplist->Purpose.'</option>';}?>
                                        <option value="OTHERS">OTHERS</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row g-3 mt-1" id="other_txt">
                                <div class="col-xl-6">

                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="other" id="other" placeholder="Specify a purpose here">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">

                                    <label for="ctype" class="fs-6 fw-bold">Certification Type</label>
                                    <div class="d-flex">

                                        <?php
                                        $cName = '';
                                        $query = "SELECT * FROM tblcertificate";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $cName .= '<option value="' . $row["ID"] . '">' . $row["CertificateName"] . '</option>';
                                        }
                                        ?>
                                        <select class="form-control action" name="ctype" id="ctype" onchange="showHid('hidden_div',this)" required>
                                            <option selected disabled>--Available Certifications--</option>
                                            <?php echo $cName; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2" style="z-index: 0;">
                                    <label for="rname" class="fs-6 fw-bold"> Fee</label>
                                    <div class="d-flex">
                                        <div class="input-group">
                                            <button class="btn btn-secondary text-white" disabled>
                                                ₱
                                            </button>
                                            <select name="cprice" id="cprice" class="form-control action" disabled>
                                                <option value='' selected disabled></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="ctype" class="fs-6 fw-bold">Mode of Payment</label>
                                    <div class="d-flex">
                                        <select class="select form-select" name="mop" id="mop" required>
                                            <option selected disabled>--Select--</option>
                                            <option value="G-Cash">G-Cash</option>
                                            <option value="Cash">Cash</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="hidden_div" style="display:none;">

                                <div class="col-md-6">
                                    <label for="purp" class="fs-6 fw-bold">Business name
                                        <small class="text-muted">(If business related)</small> </label>
                                    <input type="text" class="form-control" id="bn" name="bn" placeholder="e.g Manong Store">
                                </div>


                            </div>
                            <div class="row g-0 ">
                                <div class="col-xl-12  my-2">
                                    <div class="float-end">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-success rounded" name="submit" id="submit" value="Submit">
                                                <i class="fa fa-check mx-1"></i>Submit
                                            </button>


                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary rounded" data-bs-dismiss="modal" role="button" name="Cancel" value="Cancel">
                                                <i class="fa fa-times-circle mx-1"></i>Cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-white border-top-0 py-0">
                        </div>
                    </form>

                    <script>
                        $(document).ready(function() {
                            // Send Search Text to the server
                            $("#search").keyup(function() {
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
                            $(document).on("click", "#clicks", function() {
                                $("#search").val($(this).text());
                                $("#show-list").html("");
                            });
                        });
                    </script>
                </div>

            </div>
        </div>



        <div class="modal fade" id="approve-proof" tab-idndex="-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-success ">
                    <div class="modal-header bg-success  ">
                        <div class="modal-title white">&nbsp;<i class="fa fa-question-circle"></i>&nbsp;&nbsp;Send proof acceptance message</div>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">

                        <div class="row mt-2 mx-2">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="dname">Requestor Name</label>
                                        <input id="dname" type="text" class="form-control" value="Juan Dela Cruz" readonly>

                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="contac">Contact Number</label>
                                        <input id="contac" type="text" class="form-control" value="09123456789" readonly>


                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails">Email Address</label>
                                        <input id="emails" type="text" class="form-control" value="juanDelaC@gmail.com" readonly>


                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="ars">Acquired Certification</label>
                                        <input id="crs" type="text" class="form-control" value="Employment" readonly>


                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails">Payment Status</label>
                                        <input id="emails" type="text" class="form-control" value="Settled + amount payed" readonly>


                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="remarks">Remarks</label>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;resize: none;"></textarea>
                                            <label for="floatingTextarea2">Remarks here (max 10 words)</label>

                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <label for="remarks">Mode of delivery <i class="fa fa-envelope"></i></label>
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

                                        </div>

                                    </div>

                                </div>
                                <div class="row justify-content-center" align="center">

                                    <div class="col-md-12">
                                        <div class="float-end">
                                            <div class="btn-group">
                                                <button href="#" type="button" class="btn btn-success" data-bs-dismiss="modal">
                                                    <i class='fa fa-paper-plane py-1 me-2'></i>Send
                                                </button>
                                            </div>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" name="no" value="No">
                                                    <i class="fa fa-times"></i> Discard
                                                </button>
                                            </div>
                                        </div>
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
        <div class="modal fade" id="approve-transac" tab-idndex="-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-success ">
                    <div class="modal-header bg-success  ">
                        <div class="modal-title white">&nbsp;<i class="fa fa-question-circle"></i>&nbsp;&nbsp;Send Proof of transaction</div>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">


                        <div class="row mt-2 mx-2">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="dname">Requestor Name</label>
                                        <input id="dname" type="text" class="form-control" value="Juan Dela Cruz" readonly>

                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="contac">Contact Number</label>
                                        <input id="contac" type="text" class="form-control" value="09123456789" readonly>


                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails">Email Address</label>
                                        <input id="emails" type="text" class="form-control" value="juanDelaC@gmail.com" readonly>


                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="ars">Acquired Certification</label>
                                        <input id="crs" type="text" class="form-control" value="Employment" readonly>


                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails">Payment Status</label>
                                        <input id="emails" type="text" class="form-control" value="Settled + amount payed" readonly>


                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label for="remarks">Remarks</label>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;resize: none;"></textarea>
                                            <label for="floatingTextarea2">Remarks here (max 10 words)</label>

                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <label for="remarks">Mode of delivery <i class="fa fa-envelope"></i></label>
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
                                <div class="row justify-content-center">

                                    <div class="col-md-12">
                                        <div class="float-end">
                                            <div class="btn-group">
                                                <button href="#" type="button" class="btn btn-success" data-bs-dismiss="modal">
                                                    <i class='fa fa-paper-plane py-1 me-2'></i>Send
                                                </button>
                                            </div>
                                            <div class="btn-group">


                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" name="no" value="No">
                                                    <i class="fa fa-times"></i> Discard
                                                </button>
                                            </div>
                                        </div>
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
        <!--modal-->
        <div class="modal fade" id="proof" tab-idndex="-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 ">
                    <div class="modal-header bg-danger bg-transparent ">


                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white" align="center">
                        <img src="../images/proof.jpg" alt="">
                    </div>
                    <div class="row">
                        <div class="col-xl-12 p-3 px-4">
                            <div class="float-end">
                                <div class="btn-group">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="decline-proof" tab-idndex="-1">

            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger ">
                    <div class="modal-header bg-danger bg-transparent ">
                        <div class="modal-title text-white" id="delete">&nbsp;<i class="fa fa-question-circle"></i>&nbsp;&nbsp;Send proof decline reason</div>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body bg-white">
                        <div class="row mt-2 mx-2">
                            <form action="" method="POST">
                                <div class="row g-0">
                                    <div class="col-md-6">
                                        <label for="dname">Requestor Name</label>
                                        <input id="dname" type="text" class="form-control" value="Juan Dela Cruz" readonly>

                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="contac">Contact Number</label>
                                        <input id="contac" type="text" class="form-control" value="09123456789" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails">Email Address</label>
                                        <input id="emails" type="text" class="form-control" value="juanDelaC@gmail.com" readonly>


                                    </div>
                                    <div class="col-md-12">
                                        <label for="decreason">Decline Reason</label>
                                        <select name="" id="decreason" class="form-select" onclick="showOthersdec('other_txt-dec',this)">
                                            <option value="">Insufficient payment</option>
                                            <option value="">Invalid proof sent</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-0 my-2" id="other_txt-dec" style="display:none;">

                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder="Specify a purpose here">
                                    </div>
                                </div>
                                <div class="row mt-2">

                                    <label for="remarks">Remarks</label>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;resize: none;"></textarea>
                                            <label for="floatingTextarea2">Remarks here (max 10 words)</label>

                                        </div>
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <label for="remarks">Mode of delivery <i class="fa fa-envelope"></i></label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                SMS
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                E-mail
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row justify-content-center" align="center">
                                    <div class="col-md-12">
                                        <div class="float-end">
                                            <div class="btn-group">
                                                <button href="#" type="button" class="btn btn-success" data-bs-dismiss="modal">
                                                    <i class='fa fa-paper-plane py-1 me-2'></i>Send
                                                </button>
                                            </div>
                                            <div class="btn-group">


                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" name="no" value="No">
                                                    <i class="fa fa-times"></i> Discard
                                                </button>
                                            </div>
                                        </div>
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
        <script>
            var today = new Date();
            var mm = today.getMonth() + 1;
            var dd = today.getDay();
            var yy = today.getFullYear();

            if (mm < 10) {
                mm = '0' + mm;
            }
            if (dd < 10) {
                dd = '0' + dd;
            }

            var dtd = mm + '/' + dd + '/' + yy;
            document.getElementById('date').value = dtd;

            function walkin() {
                document.getElementId('sms').disabled = true;
                document.getElementId('em').disabled = true;

            }
        </script>

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
            function showHid(divId, element) {
                var bus = document.getElementById('ctype').value;
                if (bus == 'Business Clearance Capital - Php10,000 Below') {
                    document.getElementById(divId).style.display = 'flex';
                } else if (bus == "Business Permit") {
                    document.getElementById(divId).style.display = 'flex';
                } else if (bus == "Business Clearance Capital - Php10,001 - Php100-000") {
                    document.getElementById(divId).style.display = 'flex';
                } else if (bus == "Business Clearance Capital - Php100,001 - Above") {
                    document.getElementById(divId).style.display = 'flex';
                } else {
                    document.getElementById(divId).style.display = 'none';
                }



            }

            function showOthers(divId, element) {
                document.getElementById(divId).style.display = element.value == 'OTHERS' ? 'flex' : 'none';
            }

            function showOthersdec(divId, element) {
                document.getElementById(divId).style.display = element.value == 'others' ? 'flex' : 'none';
            }
        </script>
    </body>

    </html>
<?php } #admin-cert
?>
<script>
    $(document).ready(function() {
        $('.action').change(function() {
            if ($(this).val() != '') {
                var action = $(this).attr("id");
                var query = $(this).val();
                var result = '';
                if (action == "ctype") {
                    result = 'cprice';
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