<?php 
    $curr ="Dashboard";
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
    header('location:logout.php');
    }else{

 
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

    <link rel = "stylesheet" href= "../css/sidebar.css" />
    <link rel = "stylesheet" href = "../CSS/table.css"/>
    <link rel="stylesheet" href= "../CSS/scrollbar.css">
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');

            
            .sidebar li .submenu{ 
                list-style: none; 
                margin: 0; 
                padding: 0; 
                padding-left: 1rem; 
                padding-right: 1rem;
            }

            h4{
                font-family:'Segoe UI';
            }
            .text-inner{
                color: white;
            }
            .logo{
                color: #d3d3d3;
            }
            .left{
                margin-right: 1%;
            }
            .minor{
                background: #ff8c00;
            }
            .right{
                margin: 13.5%;
            }

            .voters{
                background: #008080;
            }
            .officials{
                background:  #004242;
            }
            .dis{
                display:none;
            }
            .blue{
                background: #6699cc;
            }

            @media (max-width:576px){
                .banner{
                    display:none;
                }
                .right{
                    margin-left: 8%;
                }
                .dis{
                    display: flex;
                }
            }
                
    </style>
</head>
<body>

    <?php 
        include ('../includes/sidebar.php');
    ?> 
    </nav>
            <!--breadcrumb-->
            
            <div class="container-fluid  right my-1" align  ="center">
                <div class="row g-3">
                    <div class="row g-3 px-2"  >
                        <div class="row g-3 my-2">
                            <div class="col-md-3 left rounded border shadow-lg bg-primary">
                                <div class="row g-3">
                                    <div class="p-3 bg-primary  d-flex justify-content-around align-items-center ">
                                        <div class = "text-inner">
                                            <h4 class="fs-3">
                                                <?php 
                                                    $sql ="SELECT ID from tblresident ";
                                                    $query = $dbh -> prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    $tser=$query->rowCount();
                                                    echo htmlentities($tser);
                                                ?>	
                                            </h4>
                                            <p class = "text-inner fs-5 card-text " href ="#">Total<Br> Residents</p>
                                        </div>
                                            <i class="fas fa-users fs-1 logo  p-4 "></i>
                                            
                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class = "text-inner text-decoration-none" href = "admin-residence.php"> <div class="fs-6">More info&nbsp;<i class = 'fa fa-arrow-circle-right'></i></a></div>
                                </div>
                            </div>

                            <div class="col-md-3 left rounded border shadow-lg blue">
                                <div class="row g-3">
                                    <div class="p-3 blue d-flex justify-content-around align-items-center ">
                                        <div class = "text-inner">
                                            <h4 class="fs-3">
                                                <?php 
                                                    $sql1 ="SELECT ID from tblrentalrequest ";
                                                    $query1 = $dbh -> prepare($sql1);
                                                    $query1->execute();
                                                    $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                                                    $renreq=$query1->rowCount();
                                                    echo htmlentities($renreq);
                                                ?>	
                                            </h4>
                                            <p class = "text-inner fs-5 card-text " href ="#">Rental <br>Requests</p>
                                        </div>
                                            <i class="fas fa-archive fs-1 logo  p-4"></i>
                                            
                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class = "text-inner text-decoration-none" href = "admin-rrequest.php"> <div class="fs-6">More info&nbsp;<i class = 'fa fa-arrow-circle-right'></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-3 rounded left border shadow-lg bg-success">
                                <div class="row g-3">
                                    <div class="p-3 bg-success d-flex justify-content-around align-items-center ">
                                        <div class = "text-inner">
                                            <h4 class="fs-3">
                                                <?php 
                                                    $sql2 ="SELECT ID from tblcertificaterequest ";
                                                    $query2 = $dbh -> prepare($sql2);
                                                    $query2->execute();
                                                    $results2=$query2->fetchAll(PDO::FETCH_OBJ);
                                                    $certreq=$query2->rowCount();
                                                    echo htmlentities($certreq);
                                                ?>	
                                            </h4>
                                            <p class = "text-inner fs-5 card-text " href ="">Certification Requests</p>
                                        </div>
                                            <i class="fas fa-folder fa-folder fs-1 logo  p-4 "></i>
                                            

                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class = "text-inner text-decoration-none" href = "admin-crequest.php"> <div class="fs-6">More info&nbsp;<i class = 'fa fa-arrow-circle-right'></i></a></div>
                                </div>
                                
                            </div>
                            
                         
                        </div>
                        
                    
                    </div>
                    <div class="row g-3 "  >
                        <div class="row g-3 my-1">
                            <div class="col-md-3 left rounded border shadow-lg  bg-warning">
                                <div class="row g-3">
                                    <div class="p-3 bg-warning  d-flex justify-content-around align-items-center ">
                                        <div class = "text-inner">
                                            <h4 class="fs-3">
                                                <?php
                                                     
                                                    $sql3 ="SELECT BirthDate from tblresident ";
                                                    $query3 = $dbh -> prepare($sql3);
                                                    $query3->execute();
                                                    $results3=$query3->fetchAll(PDO::FETCH_OBJ);
                                                    $sencount = 0;
                                                    if($query3->rowCount() > 0)
                                                    {
                                                        foreach($results3 as $row3)
                                                        { 
                                                            $sbd = $row3->BirthDate;
                                                            $sbd = date('Y-m-d', strtotime($sbd));
                                                            $today3 = date('Y-m-d');
                                                            $diff3 = date_diff(date_create($sbd), date_create($today3));
                                                            $check3 = $diff3->format('%y');
                                                            if ($check3 >= 60){
                                                                $sencount += 1;
                                                            }
                                                        }
                                                    }   
                                                    
                                                    echo $sencount;
                                                ?>	
                                            </h4>
                                            <p class = "text-inner fs-5 card-text " href ="#">Senior Citizens</p>
                                        </div>
                                            <i class="fas fa-blind fs-1 logo  p-4"></i>
                                            
                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class = "text-inner text-decoration-none" href = "#"> <div class="fs-6">More info&nbsp;<i class = 'fa fa-arrow-circle-right'></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-3 rounded left border shadow-lg minor">
                                <div class="row g-3">
                                    <div class="p-3 minor d-flex justify-content-around align-items-center ">
                                        <div class = "text-inner">
                                            <h4 class="fs-3">
                                                <?php
                                                     
                                                    $sql4 ="SELECT BirthDate from tblresident ";
                                                    $query4 = $dbh -> prepare($sql4);
                                                    $query4->execute();
                                                    $results4=$query4->fetchAll(PDO::FETCH_OBJ);
                                                    $mincount = 0;
                                                    if($query4->rowCount() > 0)
                                                    {
                                                        foreach($results4 as $row4)
                                                        { 
                                                            $mbd = $row4->BirthDate;
                                                            $mbd = date('Y-m-d', strtotime($mbd));
                                                            $today4 = date('Y-m-d');
                                                            $diff4 = date_diff(date_create($mbd), date_create($today4));
                                                            $check4 = $diff4->format('%y');
                                                            if ($check4 > 0 && $check4 < 18){
                                                                $mincount += 1;
                                                            }
                                                        }
                                                    }   
                                                    
                                                    echo $mincount;
                                                ?>	
                                            </h4>
                                            <p class = "text-inner fs-5 card-text " href ="#">Minor Residents</p>
                                        </div>
                                            <i class="fas fa-child fs-1 logo  p-4 "></i>
                                            

                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class = "text-inner text-decoration-none" href = "#"> <div class="fs-6">More info&nbsp;<i class = 'fa fa-arrow-circle-right'></i></a></div>
                                </div>
                                
                            </div>
                            <div class="col-md-3  rounded border left shadow-lg voters">
                                <div class="row g-3">
                                    <div class="p-3 voters  d-flex justify-content-around align-items-center ">
                                        <div class = "text-inner">
                                            <h4 class="fs-3">
                                                <?php
                                                     
                                                    $sql5 ="SELECT voter from tblresident ";
                                                    $query5 = $dbh -> prepare($sql5);
                                                    $query5->execute();
                                                    $results5=$query5->fetchAll(PDO::FETCH_OBJ);
                                                    $vcount = 0;
                                                    if($query5->rowCount() > 0)
                                                    {
                                                        foreach($results5 as $row5)
                                                        { 
                                                            $vc = $row5->voter;
                                                            if ($vc == 'Yes'){
                                                                $vcount += 1;
                                                            }
                                                        }
                                                    }   
                                                    
                                                    echo $vcount;
                                                ?>	
                                            </h4>
                                            <p class = "text-inner fs-5 card-text " href ="#">Total Voters</p>
                                        </div>
                                            <i class="fas fa-vote-yea fs-1 logo  p-4"></i>
                                            

                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class = "text-inner text-decoration-none" href = "#"> <div class="fs-6">More info&nbsp;<i class = 'fa fa-arrow-circle-right'></i></a></div>
                                </div>
                                
                            </div>
                            
                        </div>
                    
                    </div>
                    <div class="row g-3 "  >
                        <div class="row g-3 my-1">
                            <div class="col-md-3 left rounded border shadow-lg bg-info">
                                <div class="row g-3">
                                    <div class="p-3 bg-info  d-flex justify-content-around align-items-center ">
                                        <div class = "text-inner">
                                            <h4 class="fs-3">
                                                <?php 
                                                    $sql6 ="SELECT Gender from tblresident ";
                                                    $query6 = $dbh -> prepare($sql6);
                                                    $query6->execute();
                                                    $results6=$query6->fetchAll(PDO::FETCH_OBJ);
                                                    $gcount = 0;
                                                    if($query6->rowCount() > 0)
                                                    {
                                                        foreach($results6 as $row6)
                                                        { 
                                                            $gc = $row6->Gender;
                                                            if ($gc == 'Male'){
                                                                $gcount += 1;
                                                            }
                                                        }
                                                    }   
                                                    
                                                    echo $gcount;
                                                ?>	
                                            </h4>
                                            <p class = "text-inner fs-5 card-text " href ="#">Male Residents</p>
                                        </div>
                                            <i class="fas fa-mars fs-1 logo  p-4"></i>
                                            
                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class = "text-inner text-decoration-none" href = "#"> <div class="fs-6">More info&nbsp;<i class = 'fa fa-arrow-circle-right'></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-3 rounded left border shadow-lg bg-danger">
                                <div class="row g-3">
                                    <div class="p-3 bg-danger d-flex justify-content-around align-items-center ">
                                        <div class = "text-inner">
                                            <h4 class="fs-3">
                                                <?php 
                                                    $sql7 ="SELECT Gender from tblresident ";
                                                    $query7 = $dbh -> prepare($sql7);
                                                    $query7->execute();
                                                    $results7=$query7->fetchAll(PDO::FETCH_OBJ);
                                                    $fcount = 0;
                                                    if($query7->rowCount() > 0)
                                                    {
                                                        foreach($results7 as $row7)
                                                        { 
                                                            $fc = $row7->Gender;
                                                            if ($fc == 'Female'){
                                                                $fcount += 1;
                                                            }
                                                        }
                                                    }   
                                                    
                                                    echo $fcount;
                                                ?>	
                                            </h4>
                                            <p class = "text-inner fs-5 card-text " href ="#">Female Residents</p>
                                        </div>
                                            <i class="fas fa-venus fs-1 logo  p-4 "></i>
                                            

                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class = "text-inner text-decoration-none" href = "#"> <div class="fs-6">More info&nbsp;<i class = 'fa fa-arrow-circle-right'></i></a></div>
                                </div>
                                
                            </div>
                            <div class="col-md-3 left rounded border shadow-lg officials">
                                <div class="row g-3">
                                    <div class="p-3 officials  d-flex justify-content-around align-items-center ">
                                        <div class = "text-inner">
                                            <h4 class="fs-3">
                                                <?php 
                                                    $sql8 ="SELECT ID from tbladmin ";
                                                    $query8 = $dbh -> prepare($sql8);
                                                    $query8->execute();
                                                    $results8=$query8->fetchAll(PDO::FETCH_OBJ);
                                                    $of=$query8->rowCount();
                                                    echo htmlentities($of);
                                                ?>	
                                            </h4>
                                            <p class = "text-inner fs-5 card-text " href ="#">Current Officials</p>
                                        </div>
                                            <i class="fas fa-user-shield fs-1 logo  p-4"></i>
                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class = "text-inner text-decoration-none" href = "#"> <div class="fs-6">More info&nbsp;<i class = 'fa fa-arrow-circle-right'></i></a></div>
                                </div>
                            </div>
                        
                    
                    </div>
                </div>
            </div>

    <?php } ?>
</body>
</html>