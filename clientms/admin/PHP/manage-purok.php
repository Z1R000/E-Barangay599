<?php 
    $curr ="Manage Puroks";
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
   
    <link rel = "stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../CSS/scrollbar.css">

	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
      @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Display:wght@500&display=swap'); 
        .display-5{
            font-family: 'Noto Serif Display', serif;
        }

        .hov:hover{
            transform: scale(1.05);
            transition: .5s;
        }
        .bg-599{
            background: #012f4e;
        }
    
          
                
    </style>
</head>
<body>
    <?php 
        include ('../includes/sidebar.php');
    ?> 
     <!--breadcrumb-->
     <div class="d-flex align-items-center">
                <div class="container  mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                      
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-e-content.php"><i class="fa fa-cog"></i>&nbsp;E Content</a></li>
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-map  text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
<form action="purok-streets.php" method = "GET">
    <div class="container-fluid border ">
        <div class="row g-3 p-5  border justify-content-center">
            

       
                <button name = "purok" value = "1" type= "submit" class= "btn col-xl col-xl-3 col-lg-4 col-md-4 col-sm-12 mx-1  hov rounded col-xs-12 bg-599 px-5 shadow-lg">
                    
                    <div class="row">
                            <div class="fs-4 text-center text-white">
                                Purok
                            </div>
                        </div>
                        <div class="row">
                            <div class="display-5 text-center text-white">
                                I
                            </div>
                        </div>    
                    
                </button>
                <button name = "purok" value = "2" type= "submit" class= "btn col-xl col-xl-3 col-lg-4 col-md-4 col-sm-12 mx-1  hov rounded col-xs-12 bg-599 px-5 shadow-lg">
                    
                    <div class="row">
                            <div class="fs-4 text-center text-white">
                                Purok
                            </div>
                        </div>
                        <div class="row">
                            <div class="display-5 text-center text-white">
                                II
                            </div>
                        </div>    
                    
                </button>
                <button name = "purok" value = "3" type = "submit" class= "btn col-xl col-xl-3 col-lg-4 col-md-4 col-sm-12 mx-1  hov rounded col-xs-12 bg-599 px-5 shadow-lg">
                    
                    <div class="row">
                            <div class="fs-4 text-center text-white">
                                Purok
                            </div>
                        </div>
                        <div class="row">
                            <div class="display-5 text-center text-white">
                                III
                            </div>
                        </div>    
                    
                </button>
                <button name = "purok" value = "4" type = "submit" class= "btn col-xl col-xl-3 col-lg-4 col-md-4 col-sm-12 mx-1  hov rounded col-xs-12 bg-599 px-5 shadow-lg">
                    
                    <div class="row">
                            <div class="fs-4 text-center text-white">
                                Purok
                            </div>
                        </div>
                        <div class="row">
                            <div class="display-5 text-center text-white">
                                IV
                            </div>
                        </div>    
                    
                </button>
                <button name = "purok" value = "5" type= "button" class= "btn col-xl col-xl-3 col-lg-4 col-md-4 col-sm-12 mx-1  hov rounded col-xs-12 bg-599 px-5 shadow-lg">
                    
                    <div class="row">
                            <div class="fs-4 text-center text-white">
                                Purok
                            </div>
                        </div>
                        <div class="row">
                            <div class="display-5 text-center text-white">
                                V
                            </div>
                        </div>    
                    
                </button>
                <button name = "purok" value = "6" type = "submit" class= "btn col-xl col-xl-3 col-lg-4 col-md-4 col-sm-12 mx-1  hov rounded col-xs-12 bg-599 px-5 shadow-lg">
                    
                    <div class="row">
                            <div class="fs-4 text-center text-white">
                                Purok
                            </div>
                        </div>
                        <div class="row">
                            <div class="display-5 text-center text-white">
                                VI
                            </div>
                        </div>    
                    
                </button>
                <button name = "purok" value = "7" type ="submit"  class= "btn col-xl col-xl-3 col-lg-4 col-md-4 col-sm-12 mx-1  hov rounded col-xs-12 bg-599 px-5 shadow-lg">
                    
                    <div class="row">
                            <div class="fs-4 text-center text-white">
                                Purok
                            </div>
                        </div>
                        <div class="row">
                            <div class="display-5 text-center text-white">
                                VII
                            </div>
                        </div>    
                    
                </button>
                <button name = "purok" value = "8" type ="submit" class= "btn col-xl col-xl-3 col-lg-4 col-md-4 col-sm-12 mx-1  hov rounded col-xs-12 bg-599 px-5 shadow-lg">
                    
                    <div class="row">
                            <div class="fs-4 text-center text-white">
                                Purok
                            </div>
                        </div>
                        <div class="row">
                            <div class="display-5 text-center text-white">
                                VIII
                            </div>
                        </div>    
                    
                </button>
                <button name = "purok" value = "9" type = "submit"  class= "btn col-xl col-xl-3 col-lg-4 col-md-4 col-sm-12 mx-1  hov rounded col-xs-12 bg-599 px-5 shadow-lg">
                    
                    <div class="row">
                            <div class="fs-4 text-center text-white">
                                Purok
                            </div>
                        </div>
                        <div class="row">
                            <div class="display-5 text-center text-white">
                                IX
                            </div>
                        </div>    
                    
                </button> 
                <button  name = "purok" value = "10"  type ="submit" class= "btn col-xl col-xl-3 col-lg-4 col-md-4 col-sm-12 mx-1  hov rounded col-xs-12 bg-599 px-5 shadow-lg">
                    
                    <div class="row">
                            <div class="fs-4 text-center text-white">
                                Purok
                            </div>
                        </div>
                        <div class="row">
                            <div class="display-5 text-center text-white">
                                X
                            </div>
                        </div>    
                    
                </button>    
            </div>
        </div>
    </form>


   
</body>
</html>