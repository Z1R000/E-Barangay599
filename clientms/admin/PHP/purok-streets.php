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
    
          
                
    </style>
</head>
<body>
    <?php
        if(isset($_GET['purok'])){
            $pur = $_GET['purok'];
        }else{
            header('Location: ../../unauthorized-access.php');
        }
       
    ?>
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

    <div class="container-fluid ">
        <div class="row g-3 p-5   justify-content-center">
            <div class="row bg-white">
                <div class="display-6">
                    <?php echo 'Purok '.$pur;?>
                </div>
            </div>
            <div class="row justify-content-center px-5 py-3     ">
            <div class="row g-0 py-2">
                
                <div class="col-xl-9">

                </div>
                
                <div class="col-xl-3">
                    <div class="float-end">

                    
                    <button class="btn btn-success">
                            Save changes
                        </button>
                </div>
                </div>     
                    </div>
                <div class="row g-0 border row-col-xl-12 ">
                    <div class="row g-0 ">
                        <div class="fs-5 text-dark  bg-light rounded p-2">Street List</div>
                    </div>
                 
                    <div class="row py-2 px-5">
                        <table class= "table ">
                            <tr>
                                <th>#</th>
                                <th>Street Name</th>
                                <th class ="text-end">
                                    Edit <i class="fa-fa-edit ms-2"></i>
                                </th>
                            </tr>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td class= "pe-4">
                                    <input type="text" name = "str" id = "str" class="form-control border-0" readonly value = "Street Name ">
                                </td>
                                <td class= "text-end">
                                    <button type = "button" onclick = "enable('str')" class="btn btn-outline-primary">
                                        <i class="fa fa-edit"></i>                                   
                                     </button>                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2
                                </td>
                                <td class= "pe-4">
                                    <input type="text" name = "str" id = "str1" class="form-control border-0" readonly value = "Street Name ">
                                </td>
                                <td class= "text-end">
                                    <button type = "button" onclick = "enable('str1')" class="btn btn-outline-primary">
                                        <i class="fa fa-edit"></i>                                   
                                     </button>
                                    
                                     
                                    
                                </td>
                            </tr>
                            


                        </table>
                    </div>
                            
                    </div>  
                </div>
                   
         
            
        </div>
    </div>

    <script>
        function enable(strId){
            var x = document.getElementById(strId).readOnly;
            if (x){
                document.getElementById(strId).readOnly = false;
                document.getElementById(strId).classList.remove('border-0');
            }
            else{
                document.getElementById(strId).readOnly = true;
                document.getElementById(strId).classList.add('border-0');
                                                
            }
        }
    </script>
   
</body>
</html>