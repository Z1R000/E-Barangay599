<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['delete'])) {
        $did = $_POST['did'];
        $sqld = "DELETE FROM tblresident where ID=:did";
        $queryd = $dbh->prepare($sqld);
        $queryd->bindParam(':did', $did, PDO::PARAM_STR);
        $queryd->execute();

        echo '<script>alert("Resident has been Deleted.")</script>';
        echo "<script>window.location.href ='admin-residence.php'</script>";
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Residents</title>

        <?php include('link.php') ?>
        <style type="text/css">
            .action {
                width: 30%;
                text-align: center;
            }

            .name {
                width: 20%;
            }

            @media (max-width: 576px) {
                table {
                    overflow-y: auto;
                }

                .wal {
                    display: none;
                }

                .dis {
                    font-size: 15px;
                }

                .ser {
                    width: 100%;
                }

                .btnx {
                    width: 50px;
                }

            }

            .red {
                background: #8B0000;
                border: 1px solid #8B0000;
            }

            .white {
                color: white;
            }
            .box{
                display: none;
            }
        </style>
    </head>
    <script>
        $(document).ready(function(){
            $("#purok").change(function(){
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
        $curr = "Resident List";
        include('../includes/sidebar.php');
        ?>
        <!--breadcrumb-->

        <div class="d-flex align-items-center">
            <div class="container  mt-3">
                <nav aria-label="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>

                            <li class="breadcrumb-item active"><a href="#services"><i class="fa fa-users text-muted"></i></a>&nbsp;<?php echo $curr; ?></li>
                        </ol>
                    </nav>
                </nav>
            </div>
        </div>
        </div>
        </nav>

        <div class="container-fluid px-5">
            <div class="row px-5">
                <div class="col-xl-5"></div>
                <div class="col-xl-7">
                    <div class="float-end">
                        <a href="admin-dashboard.php" class="link link-primary text-decoration-none fs-4"><i class="fa fa-arrow-circle-left me-2"></i>Go back</a>
                    </div>

                </div>
            </div>
        </div>

        <div class="container-fluid my-4  ">
            <div class="row border mx-5 bg-white shadow-lg">
                <div class="row border-bottom g-0 py-1 px-3">
                    <h4 class="fs-5">
                        <i class="fa fa-chart-bar"></i>
                        Resident List
                    </h4>
                </div>

                <!--<div class="row g-0 mb-5">
                    <div class="row g-2 px-5">
                        <div class="col-xl-8 col-md-12 col-sm-12 col-sm-12">

                        </div>
                    <div class="col-xl-4 col-md- 12 col-xs-12 col-sm-12 float-end">
                        <div class="d-flex float-end">
                            <div class="dis fs-4 me-3 d-flex">Search:</div>
                            <input class = "ser form-control"type="text" placeholder ="Search here">
                            
                        </div>
                    </div>
                </div>-->

                <div class="row g-1 px-3">
                    <div class="col-xl-12 col-md-12 col-sm-12 ">
                        <div class="row my-2 ">
                            <div class="col-md-5">
                                <div class="btn-group" role="group">
                                    <a href="admin-registrations.php" class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-archive"></i>&nbsp;Pending Requests</a>
                                </div>

                            </div>
                            <div class="col-md-7">
                                <div class="float-end">
                                    <div class="input-group align-items-center">
                                        <label class="fs-6 px-1" for="purok"> Purok: </label>

                                        <select name="purok" id="purok" class="form-select input-sm border-primary" aria-label="Default select example" style="width: 10%;">
                                            <option value="all" selected>All Residents</option>
                                            <?php
                                            $sql = "SELECT * from tbllistpurok";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            foreach ($results as $row) {
                                                echo '<option value="' . $row->pName . '">' . $row->pName . '</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="container-fluid px-5 mx-auto">
                    <div class="row  g-0" style="border-radius: 10px 10px 0px 0px;">
                        <div class="col-xl-2">


                        </div>
                    </div>
                </div>

                <div class="tab-content all box">
                    <div class="tab-pane fade show active" id="all">
                        <div class="container-fluid">
                            <div class="row g-1 px-5 pt-3 pb-5">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-xl-12" style="overflow:auto;" id="res_table">
                                            <div class="table-responsive">
                                                <?php $query = "SELECT * FROM tblresident WHERE resStatus != 'Pending' AND resStatus !='Rejected' ORDER BY resStatus ASC, LastName";
                                                $result = mysqli_query($con, $query);  ?>
                                                <table id="alldata" class="table bg-white rounded shadow-sm  table-hover table-bordered " style="min-width: 1000px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th>Name</th>

                                                            <th>Age</th>

                                                            <th>Gender</th>

                                                            <th>Purok</th>

                                                            <th>Street</th>


                                                            <th>Action </th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle ';
                                                        if ($row["resStatus"] == "Active") {
                                                            echo "link-success";
                                                        }
                                                        if ($row["resStatus"] == "Inactive") {
                                                            echo "link-danger";
                                                        }
                                                        if ($row["resStatus"] == "Deceased") {
                                                            echo "link-secondary";
                                                        }

                                                        echo '  me-1"></i>
                                                                    ' . $row["resStatus"] . '
                                                                    
                                                                </td>
                                                                <td >' . $row["LastName"] . ', ' . $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["Suffix"] . '</td>';

                                                        $gbd = $row["BirthDate"];
                                                        $gbd = date('Y-m-d', strtotime($gbd));
                                                        $today = date('Y-m-d');
                                                        $diff = date_diff(date_create($gbd), date_create($today));

                                                        echo '
                                                                <td>' . $diff->format('%y') . '</td>  
                                                                <td><i class = "';
                                                        $gend = $row["Gender"];
                                                        $gen = "fa fa-venus link-danger ";
                                                        if ($gend == "Female") {
                                                            echo $gen;
                                                        } else {
                                                            $gen = "fa fa-mars link-info ";
                                                            echo $gen;
                                                        }
                                                        echo 'me-2"> </i>' . $row["Gender"] . '</td>  
                                                                <td>' . $row["Purok"] . '</td>  
                                                                <td>' . $row["streetName"] . '</td>
                                                                <form method="post">  
                                                                <td  class ="action" scope="col">
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a href  = "view-resident-personal.php?viewid=' . $row["ID"] . '" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                    </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid=' . $row["ID"] . '"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Manage</span></a>
                                                                </div>
                                                                
                                                                  
                                                                </form>
                                                            </td> 
                                                        </tr>  
                                                        ';
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content 1 box">
                    <div class="tab-pane fade show active">
                        <div class="container-fluid">
                            <div class="row g-1 px-5 pt-3 pb-5">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-xl-12" style="overflow:auto;" id="res_table">
                                            <div class="table-responsive">
                                                <?php $query = "SELECT * FROM tblresident WHERE resStatus != 'Pending' AND resStatus !='Rejected' AND Purok='1' ORDER BY resStatus ASC, LastName";
                                                $result = mysqli_query($con, $query);  ?>
                                                <table id="1" class="table bg-white rounded shadow-sm  table-hover table-bordered " style="min-width: 1000px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th>Name</th>

                                                            <th>Age</th>

                                                            <th>Gender</th>

                                                            <th>Purok</th>

                                                            <th>Street</th>


                                                            <th>Action </th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle ';
                                                        if ($row["resStatus"] == "Active") {
                                                            echo "link-success";
                                                        }
                                                        if ($row["resStatus"] == "Inactive") {
                                                            echo "link-danger";
                                                        }
                                                        if ($row["resStatus"] == "Deceased") {
                                                            echo "link-secondary";
                                                        }

                                                        echo '  me-1"></i>
                                                                    ' . $row["resStatus"] . '
                                                                    
                                                                </td>
                                                                <td >' . $row["LastName"] . ', ' . $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["Suffix"] . '</td>';

                                                        $gbd = $row["BirthDate"];
                                                        $gbd = date('Y-m-d', strtotime($gbd));
                                                        $today = date('Y-m-d');
                                                        $diff = date_diff(date_create($gbd), date_create($today));

                                                        echo '
                                                                <td>' . $diff->format('%y') . '</td>  
                                                                <td><i class = "';
                                                        $gend = $row["Gender"];
                                                        $gen = "fa fa-venus link-danger ";
                                                        if ($gend == "Female") {
                                                            echo $gen;
                                                        } else {
                                                            $gen = "fa fa-mars link-info ";
                                                            echo $gen;
                                                        }
                                                        echo 'me-2"> </i>' . $row["Gender"] . '</td>  
                                                                <td>' . $row["Purok"] . '</td>  
                                                                <td>' . $row["streetName"] . '</td>
                                                                <form method="post">  
                                                                <td  class ="action" scope="col">
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a href  = "view-resident-personal.php?viewid=' . $row["ID"] . '" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                    </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid=' . $row["ID"] . '"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Manage</span></a>
                                                                </div>
                                                                
                                                                  
                                                                </form>
                                                            </td> 
                                                        </tr>  
                                                        ';
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content 2 box">
                    <div class="tab-pane fade show active">
                        <div class="container-fluid">
                            <div class="row g-1 px-5 pt-3 pb-5">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-xl-12" style="overflow:auto;" id="res_table">
                                            <div class="table-responsive">
                                                <?php $query = "SELECT * FROM tblresident WHERE resStatus != 'Pending' AND resStatus !='Rejected' AND Purok='2' ORDER BY resStatus ASC, LastName";
                                                $result = mysqli_query($con, $query);  ?>
                                                <table id="2" class="table bg-white rounded shadow-sm  table-hover table-bordered " style="min-width: 1000px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th>Name</th>

                                                            <th>Age</th>

                                                            <th>Gender</th>

                                                            <th>Purok</th>

                                                            <th>Street</th>


                                                            <th>Action </th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle ';
                                                        if ($row["resStatus"] == "Active") {
                                                            echo "link-success";
                                                        }
                                                        if ($row["resStatus"] == "Inactive") {
                                                            echo "link-danger";
                                                        }
                                                        if ($row["resStatus"] == "Deceased") {
                                                            echo "link-secondary";
                                                        }

                                                        echo '  me-1"></i>
                                                                    ' . $row["resStatus"] . '
                                                                    
                                                                </td>
                                                                <td >' . $row["LastName"] . ', ' . $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["Suffix"] . '</td>';

                                                        $gbd = $row["BirthDate"];
                                                        $gbd = date('Y-m-d', strtotime($gbd));
                                                        $today = date('Y-m-d');
                                                        $diff = date_diff(date_create($gbd), date_create($today));

                                                        echo '
                                                                <td>' . $diff->format('%y') . '</td>  
                                                                <td><i class = "';
                                                        $gend = $row["Gender"];
                                                        $gen = "fa fa-venus link-danger ";
                                                        if ($gend == "Female") {
                                                            echo $gen;
                                                        } else {
                                                            $gen = "fa fa-mars link-info ";
                                                            echo $gen;
                                                        }
                                                        echo 'me-2"> </i>' . $row["Gender"] . '</td>  
                                                                <td>' . $row["Purok"] . '</td>  
                                                                <td>' . $row["streetName"] . '</td>
                                                                <form method="post">  
                                                                <td  class ="action" scope="col">
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a href  = "view-resident-personal.php?viewid=' . $row["ID"] . '" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                    </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid=' . $row["ID"] . '"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Manage</span></a>
                                                                </div>
                                                                
                                                                  
                                                                </form>
                                                            </td> 
                                                        </tr>  
                                                        ';
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content 3 box">
                    <div class="tab-pane fade show active">
                        <div class="container-fluid">
                            <div class="row g-1 px-5 pt-3 pb-5">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-xl-12" style="overflow:auto;" id="res_table">
                                            <div class="table-responsive">
                                                <?php $query = "SELECT * FROM tblresident WHERE resStatus != 'Pending' AND resStatus !='Rejected' AND Purok='3' ORDER BY resStatus ASC, LastName";
                                                $result = mysqli_query($con, $query);  ?>
                                                <table id="3" class="table bg-white rounded shadow-sm  table-hover table-bordered " style="min-width: 1000px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th>Name</th>

                                                            <th>Age</th>

                                                            <th>Gender</th>

                                                            <th>Purok</th>

                                                            <th>Street</th>


                                                            <th>Action </th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle ';
                                                        if ($row["resStatus"] == "Active") {
                                                            echo "link-success";
                                                        }
                                                        if ($row["resStatus"] == "Inactive") {
                                                            echo "link-danger";
                                                        }
                                                        if ($row["resStatus"] == "Deceased") {
                                                            echo "link-secondary";
                                                        }

                                                        echo '  me-1"></i>
                                                                    ' . $row["resStatus"] . '
                                                                    
                                                                </td>
                                                                <td >' . $row["LastName"] . ', ' . $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["Suffix"] . '</td>';

                                                        $gbd = $row["BirthDate"];
                                                        $gbd = date('Y-m-d', strtotime($gbd));
                                                        $today = date('Y-m-d');
                                                        $diff = date_diff(date_create($gbd), date_create($today));

                                                        echo '
                                                                <td>' . $diff->format('%y') . '</td>  
                                                                <td><i class = "';
                                                        $gend = $row["Gender"];
                                                        $gen = "fa fa-venus link-danger ";
                                                        if ($gend == "Female") {
                                                            echo $gen;
                                                        } else {
                                                            $gen = "fa fa-mars link-info ";
                                                            echo $gen;
                                                        }
                                                        echo 'me-2"> </i>' . $row["Gender"] . '</td>  
                                                                <td>' . $row["Purok"] . '</td>  
                                                                <td>' . $row["streetName"] . '</td>
                                                                <form method="post">  
                                                                <td  class ="action" scope="col">
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a href  = "view-resident-personal.php?viewid=' . $row["ID"] . '" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                    </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid=' . $row["ID"] . '"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Manage</span></a>
                                                                </div>
                                                                
                                                                  
                                                                </form>
                                                            </td> 
                                                        </tr>  
                                                        ';
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content 4 box">
                    <div class="tab-pane fade show active">
                        <div class="container-fluid">
                            <div class="row g-1 px-5 pt-3 pb-5">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-xl-12" style="overflow:auto;" id="res_table">
                                            <div class="table-responsive">
                                                <?php $query = "SELECT * FROM tblresident WHERE resStatus != 'Pending' AND resStatus !='Rejected' AND Purok='4' ORDER BY resStatus ASC, LastName";
                                                $result = mysqli_query($con, $query);  ?>
                                                <table id="4" class="table bg-white rounded shadow-sm  table-hover table-bordered " style="min-width: 1000px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th>Name</th>

                                                            <th>Age</th>

                                                            <th>Gender</th>

                                                            <th>Purok</th>

                                                            <th>Street</th>


                                                            <th>Action </th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle ';
                                                        if ($row["resStatus"] == "Active") {
                                                            echo "link-success";
                                                        }
                                                        if ($row["resStatus"] == "Inactive") {
                                                            echo "link-danger";
                                                        }
                                                        if ($row["resStatus"] == "Deceased") {
                                                            echo "link-secondary";
                                                        }

                                                        echo '  me-1"></i>
                                                                    ' . $row["resStatus"] . '
                                                                    
                                                                </td>
                                                                <td >' . $row["LastName"] . ', ' . $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["Suffix"] . '</td>';

                                                        $gbd = $row["BirthDate"];
                                                        $gbd = date('Y-m-d', strtotime($gbd));
                                                        $today = date('Y-m-d');
                                                        $diff = date_diff(date_create($gbd), date_create($today));

                                                        echo '
                                                                <td>' . $diff->format('%y') . '</td>  
                                                                <td><i class = "';
                                                        $gend = $row["Gender"];
                                                        $gen = "fa fa-venus link-danger ";
                                                        if ($gend == "Female") {
                                                            echo $gen;
                                                        } else {
                                                            $gen = "fa fa-mars link-info ";
                                                            echo $gen;
                                                        }
                                                        echo 'me-2"> </i>' . $row["Gender"] . '</td>  
                                                                <td>' . $row["Purok"] . '</td>  
                                                                <td>' . $row["streetName"] . '</td>
                                                                <form method="post">  
                                                                <td  class ="action" scope="col">
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a href  = "view-resident-personal.php?viewid=' . $row["ID"] . '" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                    </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid=' . $row["ID"] . '"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Manage</span></a>
                                                                </div>
                                                                
                                                                  
                                                                </form>
                                                            </td> 
                                                        </tr>  
                                                        ';
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content 5 box">
                    <div class="tab-pane fade show active">
                        <div class="container-fluid">
                            <div class="row g-1 px-5 pt-3 pb-5">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-xl-12" style="overflow:auto;" id="res_table">
                                            <div class="table-responsive">
                                                <?php $query = "SELECT * FROM tblresident WHERE resStatus != 'Pending' AND resStatus !='Rejected' AND Purok='5' ORDER BY resStatus ASC, LastName";
                                                $result = mysqli_query($con, $query);  ?>
                                                <table id="5" class="table bg-white rounded shadow-sm  table-hover table-bordered " style="min-width: 1000px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th>Name</th>

                                                            <th>Age</th>

                                                            <th>Gender</th>

                                                            <th>Purok</th>

                                                            <th>Street</th>


                                                            <th>Action </th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle ';
                                                        if ($row["resStatus"] == "Active") {
                                                            echo "link-success";
                                                        }
                                                        if ($row["resStatus"] == "Inactive") {
                                                            echo "link-danger";
                                                        }
                                                        if ($row["resStatus"] == "Deceased") {
                                                            echo "link-secondary";
                                                        }

                                                        echo '  me-1"></i>
                                                                    ' . $row["resStatus"] . '
                                                                    
                                                                </td>
                                                                <td >' . $row["LastName"] . ', ' . $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["Suffix"] . '</td>';

                                                        $gbd = $row["BirthDate"];
                                                        $gbd = date('Y-m-d', strtotime($gbd));
                                                        $today = date('Y-m-d');
                                                        $diff = date_diff(date_create($gbd), date_create($today));

                                                        echo '
                                                                <td>' . $diff->format('%y') . '</td>  
                                                                <td><i class = "';
                                                        $gend = $row["Gender"];
                                                        $gen = "fa fa-venus link-danger ";
                                                        if ($gend == "Female") {
                                                            echo $gen;
                                                        } else {
                                                            $gen = "fa fa-mars link-info ";
                                                            echo $gen;
                                                        }
                                                        echo 'me-2"> </i>' . $row["Gender"] . '</td>  
                                                                <td>' . $row["Purok"] . '</td>  
                                                                <td>' . $row["streetName"] . '</td>
                                                                <form method="post">  
                                                                <td  class ="action" scope="col">
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a href  = "view-resident-personal.php?viewid=' . $row["ID"] . '" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                    </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid=' . $row["ID"] . '"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Manage</span></a>
                                                                </div>
                                                                
                                                                  
                                                                </form>
                                                            </td> 
                                                        </tr>  
                                                        ';
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content 6 box">
                    <div class="tab-pane fade show active">
                        <div class="container-fluid">
                            <div class="row g-1 px-5 pt-3 pb-5">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-xl-12" style="overflow:auto;" id="res_table">
                                            <div class="table-responsive">
                                                <?php $query = "SELECT * FROM tblresident WHERE resStatus != 'Pending' AND resStatus !='Rejected' AND Purok='6' ORDER BY resStatus ASC, LastName";
                                                $result = mysqli_query($con, $query);  ?>
                                                <table id="6" class="table bg-white rounded shadow-sm  table-hover table-bordered " style="min-width: 1000px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th>Name</th>

                                                            <th>Age</th>

                                                            <th>Gender</th>

                                                            <th>Purok</th>

                                                            <th>Street</th>


                                                            <th>Action </th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle ';
                                                        if ($row["resStatus"] == "Active") {
                                                            echo "link-success";
                                                        }
                                                        if ($row["resStatus"] == "Inactive") {
                                                            echo "link-danger";
                                                        }
                                                        if ($row["resStatus"] == "Deceased") {
                                                            echo "link-secondary";
                                                        }

                                                        echo '  me-1"></i>
                                                                    ' . $row["resStatus"] . '
                                                                    
                                                                </td>
                                                                <td >' . $row["LastName"] . ', ' . $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["Suffix"] . '</td>';

                                                        $gbd = $row["BirthDate"];
                                                        $gbd = date('Y-m-d', strtotime($gbd));
                                                        $today = date('Y-m-d');
                                                        $diff = date_diff(date_create($gbd), date_create($today));

                                                        echo '
                                                                <td>' . $diff->format('%y') . '</td>  
                                                                <td><i class = "';
                                                        $gend = $row["Gender"];
                                                        $gen = "fa fa-venus link-danger ";
                                                        if ($gend == "Female") {
                                                            echo $gen;
                                                        } else {
                                                            $gen = "fa fa-mars link-info ";
                                                            echo $gen;
                                                        }
                                                        echo 'me-2"> </i>' . $row["Gender"] . '</td>  
                                                                <td>' . $row["Purok"] . '</td>  
                                                                <td>' . $row["streetName"] . '</td>
                                                                <form method="post">  
                                                                <td  class ="action" scope="col">
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a href  = "view-resident-personal.php?viewid=' . $row["ID"] . '" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                    </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid=' . $row["ID"] . '"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Manage</span></a>
                                                                </div>
                                                                
                                                                  
                                                                </form>
                                                            </td> 
                                                        </tr>  
                                                        ';
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content 7 box">
                    <div class="tab-pane fade show active">
                        <div class="container-fluid">
                            <div class="row g-1 px-5 pt-3 pb-5">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-xl-12" style="overflow:auto;" id="res_table">
                                            <div class="table-responsive">
                                                <?php $query = "SELECT * FROM tblresident WHERE resStatus != 'Pending' AND resStatus !='Rejected' AND Purok='7' ORDER BY resStatus ASC, LastName";
                                                $result = mysqli_query($con, $query);  ?>
                                                <table id="7" class="table bg-white rounded shadow-sm  table-hover table-bordered " style="min-width: 1000px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th>Name</th>

                                                            <th>Age</th>

                                                            <th>Gender</th>

                                                            <th>Purok</th>

                                                            <th>Street</th>


                                                            <th>Action </th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle ';
                                                        if ($row["resStatus"] == "Active") {
                                                            echo "link-success";
                                                        }
                                                        if ($row["resStatus"] == "Inactive") {
                                                            echo "link-danger";
                                                        }
                                                        if ($row["resStatus"] == "Deceased") {
                                                            echo "link-secondary";
                                                        }

                                                        echo '  me-1"></i>
                                                                    ' . $row["resStatus"] . '
                                                                    
                                                                </td>
                                                                <td >' . $row["LastName"] . ', ' . $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["Suffix"] . '</td>';

                                                        $gbd = $row["BirthDate"];
                                                        $gbd = date('Y-m-d', strtotime($gbd));
                                                        $today = date('Y-m-d');
                                                        $diff = date_diff(date_create($gbd), date_create($today));

                                                        echo '
                                                                <td>' . $diff->format('%y') . '</td>  
                                                                <td><i class = "';
                                                        $gend = $row["Gender"];
                                                        $gen = "fa fa-venus link-danger ";
                                                        if ($gend == "Female") {
                                                            echo $gen;
                                                        } else {
                                                            $gen = "fa fa-mars link-info ";
                                                            echo $gen;
                                                        }
                                                        echo 'me-2"> </i>' . $row["Gender"] . '</td>  
                                                                <td>' . $row["Purok"] . '</td>  
                                                                <td>' . $row["streetName"] . '</td>
                                                                <form method="post">  
                                                                <td  class ="action" scope="col">
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a href  = "view-resident-personal.php?viewid=' . $row["ID"] . '" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                    </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid=' . $row["ID"] . '"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Manage</span></a>
                                                                </div>
                                                                
                                                                  
                                                                </form>
                                                            </td> 
                                                        </tr>  
                                                        ';
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content 8 box">
                    <div class="tab-pane fade show active">
                        <div class="container-fluid">
                            <div class="row g-1 px-5 pt-3 pb-5">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-xl-12" style="overflow:auto;" id="res_table">
                                            <div class="table-responsive">
                                                <?php $query = "SELECT * FROM tblresident WHERE resStatus != 'Pending' AND resStatus !='Rejected' AND Purok='8' ORDER BY resStatus ASC, LastName";
                                                $result = mysqli_query($con, $query);  ?>
                                                <table id="8" class="table bg-white rounded shadow-sm  table-hover table-bordered " style="min-width: 1000px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th>Name</th>

                                                            <th>Age</th>

                                                            <th>Gender</th>

                                                            <th>Purok</th>

                                                            <th>Street</th>


                                                            <th>Action </th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle ';
                                                        if ($row["resStatus"] == "Active") {
                                                            echo "link-success";
                                                        }
                                                        if ($row["resStatus"] == "Inactive") {
                                                            echo "link-danger";
                                                        }
                                                        if ($row["resStatus"] == "Deceased") {
                                                            echo "link-secondary";
                                                        }

                                                        echo '  me-1"></i>
                                                                    ' . $row["resStatus"] . '
                                                                    
                                                                </td>
                                                                <td >' . $row["LastName"] . ', ' . $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["Suffix"] . '</td>';

                                                        $gbd = $row["BirthDate"];
                                                        $gbd = date('Y-m-d', strtotime($gbd));
                                                        $today = date('Y-m-d');
                                                        $diff = date_diff(date_create($gbd), date_create($today));

                                                        echo '
                                                                <td>' . $diff->format('%y') . '</td>  
                                                                <td><i class = "';
                                                        $gend = $row["Gender"];
                                                        $gen = "fa fa-venus link-danger ";
                                                        if ($gend == "Female") {
                                                            echo $gen;
                                                        } else {
                                                            $gen = "fa fa-mars link-info ";
                                                            echo $gen;
                                                        }
                                                        echo 'me-2"> </i>' . $row["Gender"] . '</td>  
                                                                <td>' . $row["Purok"] . '</td>  
                                                                <td>' . $row["streetName"] . '</td>
                                                                <form method="post">  
                                                                <td  class ="action" scope="col">
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a href  = "view-resident-personal.php?viewid=' . $row["ID"] . '" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                    </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid=' . $row["ID"] . '"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Manage</span></a>
                                                                </div>
                                                                
                                                                  
                                                                </form>
                                                            </td> 
                                                        </tr>  
                                                        ';
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content 9 box">
                    <div class="tab-pane fade show active">
                        <div class="container-fluid">
                            <div class="row g-1 px-5 pt-3 pb-5">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-xl-12" style="overflow:auto;" id="res_table">
                                            <div class="table-responsive">
                                                <?php $query = "SELECT * FROM tblresident WHERE resStatus != 'Pending' AND resStatus !='Rejected' AND Purok='9' ORDER BY resStatus ASC, LastName";
                                                $result = mysqli_query($con, $query);  ?>
                                                <table id="9" class="table bg-white rounded shadow-sm  table-hover table-bordered " style="min-width: 1000px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th>Name</th>

                                                            <th>Age</th>

                                                            <th>Gender</th>

                                                            <th>Purok</th>

                                                            <th>Street</th>


                                                            <th>Action </th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle ';
                                                        if ($row["resStatus"] == "Active") {
                                                            echo "link-success";
                                                        }
                                                        if ($row["resStatus"] == "Inactive") {
                                                            echo "link-danger";
                                                        }
                                                        if ($row["resStatus"] == "Deceased") {
                                                            echo "link-secondary";
                                                        }

                                                        echo '  me-1"></i>
                                                                    ' . $row["resStatus"] . '
                                                                    
                                                                </td>
                                                                <td >' . $row["LastName"] . ', ' . $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["Suffix"] . '</td>';

                                                        $gbd = $row["BirthDate"];
                                                        $gbd = date('Y-m-d', strtotime($gbd));
                                                        $today = date('Y-m-d');
                                                        $diff = date_diff(date_create($gbd), date_create($today));

                                                        echo '
                                                                <td>' . $diff->format('%y') . '</td>  
                                                                <td><i class = "';
                                                        $gend = $row["Gender"];
                                                        $gen = "fa fa-venus link-danger ";
                                                        if ($gend == "Female") {
                                                            echo $gen;
                                                        } else {
                                                            $gen = "fa fa-mars link-info ";
                                                            echo $gen;
                                                        }
                                                        echo 'me-2"> </i>' . $row["Gender"] . '</td>  
                                                                <td>' . $row["Purok"] . '</td>  
                                                                <td>' . $row["streetName"] . '</td>
                                                                <form method="post">  
                                                                <td  class ="action" scope="col">
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a href  = "view-resident-personal.php?viewid=' . $row["ID"] . '" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                    </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid=' . $row["ID"] . '"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Manage</span></a>
                                                                </div>
                                                                
                                                                  
                                                                </form>
                                                            </td> 
                                                        </tr>  
                                                        ';
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content 10 box">
                    <div class="tab-pane fade show active">
                        <div class="container-fluid">
                            <div class="row g-1 px-5 pt-3 pb-5">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-xl-12" style="overflow:auto;" id="res_table">
                                            <div class="table-responsive">
                                                <?php $query = "SELECT * FROM tblresident WHERE resStatus != 'Pending' AND resStatus !='Rejected' AND Purok='10' ORDER BY resStatus ASC, LastName";
                                                $result = mysqli_query($con, $query);  ?>
                                                <table id="10" class="table bg-white rounded shadow-sm  table-hover table-bordered " style="min-width: 1000px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Status</th>
                                                            <th>Name</th>

                                                            <th>Age</th>

                                                            <th>Gender</th>

                                                            <th>Purok</th>

                                                            <th>Street</th>


                                                            <th>Action </th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '  
                                                        <tr>
                                                                <td >
                                                                    <i class ="fa fa-circle ';
                                                        if ($row["resStatus"] == "Active") {
                                                            echo "link-success";
                                                        }
                                                        if ($row["resStatus"] == "Inactive") {
                                                            echo "link-danger";
                                                        }
                                                        if ($row["resStatus"] == "Deceased") {
                                                            echo "link-secondary";
                                                        }

                                                        echo '  me-1"></i>
                                                                    ' . $row["resStatus"] . '
                                                                    
                                                                </td>
                                                                <td >' . $row["LastName"] . ', ' . $row["FirstName"] . ' ' . $row["MiddleName"] . ' ' . $row["Suffix"] . '</td>';

                                                        $gbd = $row["BirthDate"];
                                                        $gbd = date('Y-m-d', strtotime($gbd));
                                                        $today = date('Y-m-d');
                                                        $diff = date_diff(date_create($gbd), date_create($today));

                                                        echo '
                                                                <td>' . $diff->format('%y') . '</td>  
                                                                <td><i class = "';
                                                        $gend = $row["Gender"];
                                                        $gen = "fa fa-venus link-danger ";
                                                        if ($gend == "Female") {
                                                            echo $gen;
                                                        } else {
                                                            $gen = "fa fa-mars link-info ";
                                                            echo $gen;
                                                        }
                                                        echo 'me-2"> </i>' . $row["Gender"] . '</td>  
                                                                <td>' . $row["Purok"] . '</td>  
                                                                <td>' . $row["streetName"] . '</td>
                                                                <form method="post">  
                                                                <td  class ="action" scope="col">
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a href  = "view-resident-personal.php?viewid=' . $row["ID"] . '" type="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class= "wal">View</span></a>
                                                                    </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="edit-resident-personal.php?editid=' . $row["ID"] . '"class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Manage</span></a>
                                                                </div>
                                                                
                                                                  
                                                                </form>
                                                            </td> 
                                                        </tr>  
                                                        ';
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                

                <!--END ALL PUROK-->




    </body>

    </html>
    <script>
        $(document).ready(function() {
            $('#alldata').DataTable();
        });
        $(document).ready(function() {
            $('#1').DataTable();
        });
        $(document).ready(function() {
            $('#2').DataTable();
        });
        $(document).ready(function() {
            $('#3').DataTable();
        });
        $(document).ready(function() {
            $('#4').DataTable();
        });
        $(document).ready(function() {
            $('#5').DataTable();
        });
        $(document).ready(function() {
            $('#6').DataTable();
        });
        $(document).ready(function() {
            $('#7').DataTable();
        });
        $(document).ready(function() {
            $('#8').DataTable();
        });
        $(document).ready(function() {
            $('#9').DataTable();
        });
        $(document).ready(function() {
            $('#10').DataTable();
        });
    </script>


<?php } ?>
<!--up-->