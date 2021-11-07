<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid'] == 0)) {
    header('location:logout.php');
} else {
    
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
   
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
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          
        <?php include('link.php') ?>


        <link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

        <title>Admin Profile</title>
        

        <style type="text/css">
            .sidebar li .submenu {
                list-style: none;
                margin: 0;
                padding: 0;
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .box {
                padding: 10px;
                display: none;
                margin: 10px;
            }

            @media (max-width:576px) {
                .banner {
                    display: none;
                }

                .right {
                    margin-left: 8%;
                }

                .dis {
                    display: flex;
                }
            }
        </style>

    </head>

    <body>
        <?php
				$aid=$_SESSION['clientmsaid'];
				$sql="SELECT distinct tbladmin.ID, tbladmin.BarangayPosition, tblresident.* from  tbladmin join tblresident where tbladmin.ID=:aid AND tbladmin.residentID = tblresident.ID";
				$query = $dbh -> prepare($sql);
				$query->bindParam(':aid',$aid,PDO::PARAM_STR);
				$query->execute();

				$results=$query->fetchAll(PDO::FETCH_OBJ);

				$cnt=1;
				if($query->rowCount() > 0)
				{
				    foreach($results as $row)
				{               
			?>
              <?php $curr = "Profile View"; include_once('../includes/sidebar.php');     ?>
              <div class="d-flex align-items-center">
                <div class="container  mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
                      
                               
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-cog  text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
        </nav>
            <!-- Sidebar -->

            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
                <div class="container-fluid px-5">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="float-end">
                                <div class="btn-group">
                                    <a class="btn btn-secondary" href= "admin-dashboard.php"><i class="fa fa-arrow-circle-left mx-1"></i>Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mx-auto px-5 mt-3 mb-2 ">
                    <div class="row g-0 mx-2 ">
                        <div class="row g-0 ">
                            <div class="mx-auto col-xl-10 white   ">
                                <div class="row g-0  rounded-top " style="background-color:#021f4e">
                                    <div class="fs-5 text-white py-2 px-2">
                                        <i class="fa fa-id-card-alt fa-1x me-1">
                                        </i>
                                        Resident #<?php echo htmlentities($row->ID); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0  ">
                            <div class="col-xl-10 bg-white mx-auto text-center">
                                <label for="" class="text-center fs-6 text-muted small"><?php echo $row->BarangayPosition ?></label>
                                <div class="display-6 border-bottom text-center py-2">
                                   
                                    <?php echo "$row->LastName, $row->FirstName $row->MiddleName $row->Suffix";?>

                                </div>

                            </div>

                        </div>
                        <div class="row g-0 ">
                            <div class="col-xl-10 bg-white mx-auto text-center shadow-lg">
                                <div class="row g-0">
                                    <div class="col-xl-10 mx-auto">
                                        <table class="table ">
                                            <tbody class="" style="padding: 40px;">
                                                <tr>

                                                    <th style="padding-top: 5px; padding-bottom:5px;">
                                                        <i class="fa fa-mobile-alt fa-1x me-2"></i>Contact Number
                                                    </th>
                                                    <td style="text-align: right; padding-top: 10px; padding-bottom:10px;">
                                                        <?php echo htmlentities($row->Cellphnumber); ?>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <th style="padding-top: 5px; padding-bottom:5px;">
                                                        <i class="fa fa-at fa-1x me-1"></i>Email Address
                                                    </th>
                                                    <td style="text-align: right;padding-top: 10px; padding-bottom:10px;">
                                                        <?php echo htmlentities($row->Email); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="padding-top: 5px; padding-bottom:5px;">
                                                        <i class="fa fa-map-marker-alt fa-1x me-1"></i>
                                                        Address
                                                    </th>
                                                    <td style="padding-top: 5px; padding-bottom:5px;text-align:right">
                                                        <?php echo htmlentities("#" . $row->houseUnit . " Purok " . $row->Purok . " " . $row->streetName . " Street"); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                <?php
                                                    $gbd = $row->BirthDate;
                                                    $gbd = date('Y-m-d', strtotime($gbd));
                                                    $gbds = date('F j, Y', strtotime($gbd));
                                                    $today = date('Y-m-d');
                                                    $diff = date_diff(date_create($gbd), date_create($today));
                                                    ?>
                                                    <th style="padding-top: 10px; padding-bottom:10px;">
                                                        <i class="fa fa-birthday-cake fa-1x me-1"></i>
                                                        Date of Birth
                                                    </th>
                                                    <td style="padding-top: 10px; padding-bottom:10px;text-align:right">
                                                        <?php echo $gbds; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="container-fluid mx-auto px-5 mb-5">
                    <div class="row g-0 mx-2">
                        <div class="row g-2">
                            <div class="mx-auto col-xl-11 ">
                                <div class="row g-0  rounded-top border bg-white">


                                </div>



                                <div class="tab-content shadow-sm">


                                    <div class="tab-pane active" id="personal">
                                        <div class="row g-0 bg-white px-4 ">
                                            <div class="row gy-0 gx-0  ps-3 mt-3 bg-info er border border-info shadow-lg">


                                            </div>
                                            <div class="row g-0 border-bottom border-start  mb-5 rounded-bottom shadow-sm">
                                                <div class="row g-0">

                                                    <div class="row g-0 mb-5 py-5 px-5 ">
                                                        <div class="col-xl-12  border-start  shadow-sm">

                                                            <table class="table ">
                                                                <thead class=" bg-light text-center">
                                                                    <tr>
                                                                        <th colspan=2 class="text-center">
                                                                            <i class="fa fa-street-view">

                                                                            </i>
                                                                            Residency Information
                                                                        </th>
                                                                    </tr>

                                                                </thead>
                                                                <tbody class="" style="padding: 10px;">
                                                                    <tr>

                                                                        <th>
                                                                            <i class=""></i>Residency Type
                                                                        </th>
                                                                        <td style="text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                            <?php echo htmlentities($row->ResidentType); ?>
                                                                        </td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="col-xl-12  border-end border-bottom shadow-sm">
                                                            <table class="table  ">
                                                                <thead class=" bg-light text-center">
                                                                    <tr>
                                                                        <th colspan=2 class="text-center">
                                                                            <i class="fa fa-user">

                                                                            </i>
                                                                            Personal Information
                                                                        </th>
                                                                    </tr>

                                                                </thead>
                                                                <tbody class=" mt-2" style="padding: 10px;">
                                                                <tr>

                                                                    <th>
                                                                        Age
                                                                    </th>
                                                                    <td style="text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                        <?php echo $diff->format('%y'); ?>
                                                                    </td>
                                                                    </tr>

                                                                    <tr>

                                                                        <th>
                                                                            Gender
                                                                        </th>
                                                                        <td style="text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                            <?php echo htmlentities($row->Gender); ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <th>
                                                                            Civil Status
                                                                        </th>
                                                                        <td style="text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                            <?php echo htmlentities($row->CivilStatus); ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                    <tr>

                                                                        <th>
                                                                            Voter Status
                                                                        </th>
                                                                        <td style="text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                            <?php echo htmlentities($row->voter); ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <th>
                                                                            Voter Precinct
                                                                        </th>
                                                                        <td style="text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                            <?php echo htmlentities($row->vPrecinct); ?>
                                                                        </td>
                                                                    </tr>

                                                                    <tr>

                                                                        <th>
                                                                            SSS number
                                                                        </th>
                                                                        <td style="text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                            <?php echo htmlentities($row->sssNumber); ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <th>
                                                                            TIN number
                                                                        </th>
                                                                        <td style="text-align: right; padding-top: 15px; padding-bottom:15px;">
                                                                            <?php echo htmlentities($row->tinNumber); ?>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /#page-content-wrapper -->
                
                            <?php $cnt=$cnt+1;}} ?>
                          
    </body>

    </html>
<?php } ?>