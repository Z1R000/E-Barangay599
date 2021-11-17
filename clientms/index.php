<?php
    include ('admin/PHP/includes/dbconnection.php');
    error_reporting(1);
    $user = $_GET['logout'];
    $time = new DateTime("now", new DateTimeZone('Asia/Manila'));
    $e = "";
    $aud = "Update tblloginaudits set timeOut = \"".$time->format("h:i:s")."\" where ID = ".$user.";";
    if (isset($_GET['logout'])){
        session_start();
        session_destroy();
        session_unset();
        if ($con->query($aud)===TRUE){
            $e = "tama";
        }
        else{
            $e =  "mali";
        }
        
    }
    
   


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Barangay599 System</title>
    <link rel="icon" href="admin/images/Barangay.png" type="image/icon type">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="front.css">
    <link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .bg-bar {
            background-image: url('admin/images/barangaybackground.png');
            background-size: cover;


        }

        .bg-599 {
            background: #012f4e;
            color: #fff;
        }

        .color-599 {
            color: #012f4e;
        }

        .abs {
            margin: 0;
            padding: 0;
            right: -100px;
            left: 0px;
            top: 120px;
            bottom: px;

        }

        .abs img {
            width: 300px;
        }

        .cmor {
            border-radius: 30px;
            width: 100px;

        }

        .cmor:hover {
            background: white;
            color: #000;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Verdana, sans-serif;
        }

        .mySlides {
            display: none;
        }

        img {
            vertical-align: middle;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fader {
            -webkit-animation-name: fader;
            -webkit-animation-duration: 5s;
            animation-name: fader;
            animation-duration: 5s;
        }

        @-webkit-keyframes fader {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @keyframes fader {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .text {
                font-size: 11px
            }
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-599 op positon-fixed mb-5 ">
        <div class="container-fluid opacity-25">
            <a class="navbar-brand " href="#"><img src="admin/images/barangay.png" alt="" style="width: 30px;"><span class="px-1 fs-6">Barangay 599</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse opacity-100" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                    <li class="nav-item fs-6">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item fs-6">
                        <a class="nav-link" href="#au">About Us</a>
                    </li>
                    <li class="nav-item fs-6">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    <li class="nav-item dropdown fs-6">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">More</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#of">Features</a></li>
                            <li><a class="dropdown-item" href="create-resident.php">Register</a></li>
                            
                            

                        </ul>
                    </li>
                </ul>

                <div class="d-flex">
                    <button class="btn btn-outline-white btn-success" data-bs-toggle="modal" role="button" href="#signin-choice">
                        Sign in
                    </button>
                </div>
            </div>
        </div>

    </nav>
    <br><br>
    <div class="masthead p-2 mb-3">
        <div class="container px-1">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 py-5 mt-5 align-items-center">
                    <div class="row">
                        <div class="display-6 text-uppercase text-white " style="letter-spacing: 1.9px;">
                            Welcome to BARANGAY 599, ZONE 59, DISTRICT VI : E-barangay Information Management System
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-xl-6 text-white">

                            <label for="" class="fs-6 small">Resident of the barangay but not yet registered ?</label><br>
                            <div class="btn-group my-2">
                                <a href="create-resident.php" class="btn btn-primary">Register Here</a>
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

    <section class="offer mt-5" id="of">
        <h2 class="page-section-heading text-center fs-4 text-uppercase">What we Offer</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line bg-599"></div>
            <div class="divider-custom-icon "><i class="fas fa-question fa-2x"></i></div>
            <div class="divider-custom-line bg-599"></div>
        </div>
        <div class="container text-center">
            <div class="row  py-3 px-5">
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-window m-auto"></i></div>
                        <h3>Fully Responsiveness</h3>
                        <p class="lead mb-0">The system can cater to on any device, regardless of screen size!</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi bi-shield m-auto "></i></div>
                        <h3>Security</h3>
                        <p class="lead mb-0">Ensures the protection of all user's information handled by the system. </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto"></i></div>
                        <h3>Convenience</h3>
                        <p class="lead mb-0">Descriptive features which can easily be comprehended by the users.</p>
                    </div>
                </div>
                <div class="row p-5 justify-content-center">

                    <div class="col-lg-12 border-bottom">

                    </div>

                </div>
            </div>

        </div>

    </section>
    <section class="bg-white text-white py-5 mb-5 border" id="au">
        <h2 class="page-section-heading text-center fs-4 text-uppercase text-dark">About Us</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line bg-599"></div>
            <div class="divider-custom-icon "><i class="fas fa-scroll fa-2x"></i></div>
            <div class="divider-custom-line bg-599"></div>
        </div>
        <div class="container-fluid px-5">
            <div class="container mx-auto">
                <div class="row g-0 py-1">
                    <div class="col-xl-11 col-lg-10 mx-auto border border-0 fs-5 rounded text-center about-us px-5" style="letter-spacing: 3px;">
                                        
                        <?php
                            $sql = "Select aboutus from tblinformation";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $result = $query->fetchAll(PDO::FETCH_OBJ);
                            $abt = "";
                            foreach ($result as $a){
                                $abt = $a->aboutus;
                            }
                            

                           
                            $len = strlen($abt);
                            $counter = 0;
                            for ($i = 0; $i<$len;$i++){
                                if ($i == $len-1){
                                    echo "</span>";
                                    
                                }
                                if ($counter==100){
                                    echo "
                                    <span id='dot'>......</span></br>
                                    <span style='display:none;' id='simor'>";
                                    
                                    $counter=-1000;
                                   
                                }
                                else{
                                    if (preg_match('/\s/',$abt[$i])){
                                        $counter++;
                                        echo $abt[$i];
                                        
                                    }
                                    else{
                                        echo $abt[$i];
                                    }
                                }
                            }
                            
                        
                        ?>
                       
                        
                      
                    </div>
           
                    <script>
                        function seemor() {
                            var x = document.getElementById('dot');
                            var y = document.getElementById('simor');
                            var z = document.getElementById('semorbtn');

                            if (x.style.display === "none") {
                                x.style.display = "inline";
                                z.innerHTML = "See More";
                                y.style.display = "none";
                            } else {
                                x.style.display = "none";
                                z.innerHTML = "See Less";
                                y.style.display = "inline";
                            }

                        }
                    </script>

                </div>
                <div class="row justify-content-center border">
                    <div class="col-12 d-flex " >  
                        <div class="mx-auto btn-group justify-content-center">
                            <a onclick='seemor();' id='semorbtn' class='btn btn-outline-dark '>See More</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <section class="offer mt-5" id="of">
        <h2 class="page-section-heading text-center fs-4 text-uppercase">Gallery</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line bg-599"></div>
            <div class="divider-custom-icon "><i class="fas fa-image fa-2x"></i></div>
            <div class="divider-custom-line bg-599"></div>
        </div>
        <div class="container text-center">
            
                    

                        <div class="mySlides fader">
                            <div class="numbertext">1 / 3</div>
                            <img src="images/testbanner.jpg" style="width:80%">
                            <div class="text">Caption Text</div>
                        </div>

                        <div class="mySlides fader">
                            <div class="numbertext">2 / 3</div>
                            <img src="images/barangaybackground.png" style="width:80%">
                            <div class="text">Caption Two</div>
                        </div>

                        <div class="mySlides fader">
                            <div class="numbertext">3 / 3</div>
                            <img src="images/testbanner.jpg" style="width:80%">
                            <div class="text">Caption Three</div>
                        </div>

                    
                    <br>

                    <div style="text-align:center">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>

                    <div class="col-lg-12 border-bottom">

                    </div>

            

        </div>

    </section>
    <section class="contact bg-info py-4">
        <h2 class="page-section-heading text-center fs-4 text-uppercase text-white" id="contact">Contact Us</h2>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line bg-599"></div>
            <div class="divider-custom-icon "><i class="fas fa-phone-square fa-2x"></i></div>
            <div class="divider-custom-line bg-599"></div>
        </div>
        <div class="container mx-auto py-5">
            <div class="row g-2 justify-content-center">
                <div class="col-xl-3  ">
                    <div class="text-center py-3 bg-light rounded" style="height: 190px;max-height: 250px;">
                        <i class="fa fa-mobile-alt fa-4x">
                        </i>
                        <br>
                        <p class="text-center fs-4 px-3">
                            Contact us here:<br> 0927 581 2141
                        </p>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="text-center py-3 bg-light rounded" style="height: 190px;max-height: 250px;">
                        <i class="fab fa-facebook fa-4x">
                        </i>
                        <br>
                        <p class="text-center fs-4 px-3">
                            Contact us here: <a href="https://www.facebook.com/BRGY-599-252130648298565/" target = "_blank" class="text-decoration-none"> facebook.com/BRGY-599</a>
                        </p>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="text-center py-3 bg-light rounded" style="height: 190px;max-height: 220px;">
                        <i class="fa fa-compass fa-4x">
                        </i>
                        <br>
                        <p class="text-center fs-4 px-3">
                            We are located at:<Br> <a href="https://www.google.com/maps/place/Victorino+Mapa+St,+Manila,+Metro+Manila/@14.5993331,121.0148925,17z/data=!3m1!4b1!4m5!3m4!1s0x3397c9da258d418f:0x735f62c62e86acf6!8m2!3d14.5993331!4d121.0170812" target = "_blank" class="text-decoration-none">Victorino Mapa Sta Mesa Manila </a>
                        </p>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="text-center py-3 bg-light rounded" style="height: 190px;max-height: 250px;">
                        <i class="fa fa-at fa-4x">
                        </i>
                        <br>
                        <p class="text-center fs-4">
                            Contact us here: barangay599@gmail.com
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--
<section class="features-icons bg-light text-center ">
            <div class="container">
                <div class="row border-bottom border-primary pb-3 text-center">
                    <h4>E-barangay 599 is...</h4>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-window m-auto"></i></div>
                            <h3>Fully Responsive</h3>
                            <p class="lead mb-0">The system can cater to on any device, regardless of screen size!</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex" ><i class="bi bi-shield m-auto "></i></div>
                            <h3>Secured</h3>
                            <p class="lead mb-0">Ensures the protection of all user's information handled by the system.  </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex" ><i class="bi-terminal m-auto"></i></div>
                            <h3>Easy to Use</h3>
                            <p class="lead mb-0">Descriptive features which can easily be comprehended by the users.</p>
                        </div>
                    </div>
                </div>
            </div>
</section>



<div class="container-fluid  bg-white pb-5 border-bottom">

        <div class="row g-0 px-4 justify-content-center" >
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 px-4 py-5 text-center mx-auto" align="center">
                <h2>What does the E-barangay Offer</h2>
                    <p class="lead mb-0 p-4">E-barangay 599 information management system is a tailor made system for the Barangay 599 Sta. Mesa Manila. This system is equipped with a set of module which are solutions towards several struggles the barangay is facing. Struggles which are determine after the conducted study was made. E-barangay 599 is set to do make the lives of both residents and officials of Barangay 599 easier, of course in the aspect of handling their queries with the barangay.       
                    </p>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 py-5">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/record.png" class="d-block" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class ="">Reports and paperwork management</h5>
                                <p class ="">The usual barangay system handles tasks which generate reports and documents. Certifications and blotters are to name a few. E-barangay 599 Information Management system poses an innovative solution to it as it handles all aspects from storage to generation.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/ann.png" class="d-block" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Dissemination of Information</h5>
                                <p>Barangay's are often central body for disseminating crucial information among its residence. They do use several options. However, it still only reaches a portion of the residency. The system can improve that by being equipped with more media of information dissemination. </p>
                            </div>                    
                        </div>
                        <div class="carousel-item">
                            <img src="images/blotter.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Information Management</h5>
                                <p>The barangay handles requests, queries and certifications that comes from the resident. They are loaded with information everday. E-barangay 599 information management system will take off that load as it offers beteter coordination of information, its transformation and as well as its presentation.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="features-icons py-2 bg-white text-center">
            
<div class="container">
<div class="row  border-primary pb-3 text-center">
                    <h4>Barangay 599 Official's Roster</h4>
                </div>
  <div class="row g-2 justify-content-center">
    <div class="col-2 ">
        <div class="row g-0 shadow-lg">
            <div class="row g-0 bg-599  rounded-top">
                <div class="fs-5">Punong Barangay</div>
            </div>
            <div class="row g-0 justify-content-center bg-bar">
                <div class="col-8 p-3 my-2">
                    <img src="admin/images/user-res.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row g-0 bg-light text-dark">
                <div class="fs-5">Jose Milo L. Lacatan</div>
            </div>
        </div>
    </div>
    
  </div>
</div>
            
<div class="container py-2">
    
  <div class="row g-2 justify-content-center">
    <div class="col-2"   >
        <div class="row g-0 shadow-lg" >
            <div class="row g-0 bg-599  rounded-top">
                <div class="fs-5">Sk Chairman</div>
            </div>
            <div class="row g-0 justify-content-center bg-bar">
                <div class="col-8 p-3 my-2">
                    <img src="admin/images/user-res.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row g-0 bg-light text-dark align-items-center"style= "height: 60px;">
                <div class="fs-5">Miko M Custodio</div>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="row g-0 shadow-lg">
            <div class="row g-0 bg-599  rounded-top">
                <div class="fs-5">Secretary</div>
            </div>
            <div class="row g-0 justify-content-center bg-bar">
                <div class="col-8 p-3 my-2">
                    <img src="admin/images/user-res.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row g-0 bg-light text-dark align-items-center" style= "height: 60px;">
                <div class="fs-5">Maria Cecilia C. Dela Cruz</div>
            </div>
        </div>
    </div>
    <div class="col-xl-2">
    <div class="row g-0 shadow-lg">
            <div class="row g-0 bg-599  rounded-top">
                <div class="fs-5">Treasurer</div>
            </div>
            <div class="row g-0 justify-content-center bg-bar">
                <div class="col-8 p-3 my-2">
                    <img src="admin/images/user-res.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row g-0 bg-light text-dark">
                <div class="fs-5">Imelda G. Padilla</div>
            </div>
        </div>
    </div>
    
</div>
        
</section>
-->
    <div class="row">
        <br><br><br>
        <br><br><br>
        <br><br><br>


    </div>


    <footer class="footer bg-599  border-top">
        <div class="container foot">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="#au">About</a></li>

                        <li class="list-inline-item"><a href="#contact">Contact</a></li>
                        <li class="list-inline-item"></li>

                    </ul>
                    <p class="text-muted  mb-4 mb-lg-0">&copy; E-barangay 599 2021. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="https://www.facebook.com/BRGY-599-252130648298565/" target = "_blank"><i class="bi-facebook fs-4"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="fa fa-at fs-4"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><i class="fa fa-compass fs-4">&nbsp;&nbsp;&nbsp;</i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><i class="fa fa-mobile-alt fs-4"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>



    <div class="modal fade" id="signin-choice" tab-idndex="-1">
        <div class="modal-dialog modal-dialog-centered modal-md ">
            <div class="modal-content bg-info g-0 ">
                <div class="modal-header bg-primary white">
                    <div class="modal-title text-white" id="delete">&nbsp;<i class="fa fa-user text-white"></i>&nbsp;&nbsp;Log In As</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white">
                    <div class="row  px-3 py-4">
                        <div class="col xl-4 px-3" align="center">
                            <img src="client/images/resident-logo.png" alt="trash" class=" img-fluid " style="width: 50%;">

                            <div class="row">
                                <a type="button" href="client/index.php" class="btn btn-outline-info rounded" name="resident" value="resident">
                                    599 Resident
                                </a>
                            </div>
                        </div>

                        <div class="col xl-4 px-3" align="center">
                            <img src="admin/images/admin-logo.png" alt="trash" class=" img-fluid " style="width: 50%;">
                            <div class="row">
                                <a class="btn btn-outline-info rounded" href="admin/PHP/admin-login.php" name="outsider" value="outsider">
                                    599 Official
                                </a>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
    <script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>

</body>

</html>