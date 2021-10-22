<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/scrollbar.css">
    <link rel="stylesheet" href="front.css">
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>

    </style>
    
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark op positon-fixed mb-5">
  <div class="container-fluid opacity-25">
    <a class="navbar-brand" href="#"><img src="admin/images/barangay.png" alt="" style= "width: 28px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse opacity-100" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item fs-6">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item fs-6">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item fs-6">
          <a class="nav-link" href="#">Contact Us</a>
        </li>
      </ul>
    
    <div class="d-flex">
        <button class="btn btn-outline-white btn-success"data-bs-toggle= "modal" role = "button"  href = "#signin-choice">
            Sign in
        </button>
    </div>
    </div>
  </div>
  
</nav>
<div class="masthead p-5">
    <div class="container px-3 position-relative">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-10 col-sm-12 col-xs-12 border bg-heb rounded">
                <h2 class= " text-center text-white p-1">
                    WELCOME TO BARANGAY 599's: E-barangay Information Management System
                </h2>
                <div class="row justify-content-center text-center" >
                    <label for = "reg" class = "text-white">A resident of the barangay but not yet registered?</label>
                    <div class="col-xl-3 mx-auto" align ="center">
                        <div class="btn-group mx-auto my-2" >
                            <a class= "btn btn-primary w-100" href = "create-resident.php" id = "reg" target = "_blank">
                        Click Here
                    </a>
                </div>
            </div>
                
                </div>
                
            </div>
        </div>
    </div>    
</div>
<section class="features-icons bg-light text-center py-5 ">
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
<div class="row">
    <br><br><br>
    <br><br><br>
    <br><br><br>


</div>

<footer class="footer bg-dark border-top">
            <div class="container foot">
                <div class="row">
                    <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item"><a href="#!">About</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Contact</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Terms of Use</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">Privacy Policy</a></li>
                        </ul>
                        <p class="text-muted small mb-4 mb-lg-0">&copy; E-barangay 599 2021. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-facebook fs-3"></i></a>
                            </li>
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-telephone fs-3"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!"><i class="bi-window fs-3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>




<div class="modal fade" id = "signin-choice" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md ">
                <div class="modal-content bg-info g-0 ">
                    <div class="modal-header bg-primary white">
                        <div class="modal-title text-white" id="delete">&nbsp;<i class = "fa fa-user text-white"></i>&nbsp;&nbsp;Log In as?</div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row  px-3 py-4">
                            <div class="col xl-4 px-3" align = "center">
                                <img src="client/images/resident-logo.png" alt="trash" class= " img-fluid " style ="width: 50%;">
                                
                            <div class="row">
                                    <a type = "button" href="client/index.php" class="btn btn-outline-info rounded"  name = "resident" value ="resident">
                                        599 resident
                                    </a>
                                </div>                           
                            </div>

                            <div class="col xl-4 px-3" align = "center">
                                <img src="admin/images/admin-logo.png" alt="trash" class= " img-fluid " style ="width: 50%;">
                                <div class="row">
                                    <a class="btn btn-outline-info rounded" href ="admin/PHP/admin-login.php"  name = "outsider" value ="outsider">
                                        599 Official
                                    </a>
                                </div>   
                            </div>
                            
                        </div>
                 
                
                    </div>
                   
                </div>
            </div>
        </div>

</body>
</html>