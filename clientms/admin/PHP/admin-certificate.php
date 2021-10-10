<?php 
    $curr ="Certificates List";
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

    <link rel = "stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../CSS/scrollbar.css">

	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
          table,td,tr,th{
            border: 1px solid #d3d3d3;
            text-align: left;
            font-size: 1em;
            padding: 100px;
            font-family: 'Noto Sans Display', sans-serif;
            
        }   
        td{
            vertical-align: middle;
     
        }
        .btng{
            width: 50px;
        }

        @media (max-width: 576px){
            .row{
                overflow-x: auto;
            }
            .dis{
                font-size: 15px;
            }
            .ser{
                width: 100%;
            }
           
        }
        .red{
            background:#8B0000;
            border: 1px solid #8B0000;
        }
        .white{
            color: white;
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
     <!--breadcrumb-->

     <div class="container mx-5 mt-3">
            <nav aria-label="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#"><i class="fa fa-paperclip text-muted"></i></a>&nbsp;Services</li>
                        <li class="breadcrumb-item active"><a href="#"><i class="fa fa-file text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                    </ol>
                </nav>
            </nav>
    </div>


    <div class="container-fluid border mx-3 px-5">
        <div class="row gx-3 ">
            
            <div class="row g-0 border" style= "background: #f0f8ff">
                <div class="col-xl-10 col-sm-12 mx-auto my-3" style= "">
                    <table class="table bg-white table-hover ">
                       
                            <tr>
                                <td scope = "col" colspan = 3 style ="background: #012f6e; color: white; text-align: center">Certifications List</td>
                            </tr>
                            <tr>
                                
                                <th style = "text-align: left">Certification Name</th>
                                <th style = "text-align: left">Certification Fee</th>
                                <th style = "text-align: center">Action</th>
                    
                            </tr>
                       
                       
                           <tr>

                                <td scope="col" style = "text-align: left">Barangay Clearance</td>
                                <td scope="col" style = "text-align: left">20 PHP</td>
                                <td scope="col" style = "text-align: center">
                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                            <a href  = "" type="button" class="btn btng btn-primary"><i class = "fa fa-eye"></i></a>
                                        </div>
                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                            <a type="button" href =""class="btn btng btn-success"><i class = "fa fa-edit"></i></a>
                                        </div>
                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                            <a type="button" href =""class="btn btng btn-danger"><i class = "fa fa-trash"></i></a>
                                        </div>
                                      
                                </td>

                           </tr>
                         
                    </table>

                </div>
                
            </div>

        </div>
    </div>
    

</body>
</html>