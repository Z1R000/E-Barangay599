<?php 
    $curr ="Resident Registration";
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
    <link rel = "stylesheet" href ="../css/scroll.css">

	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
      @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Display:wght@500&display=swap');
      table,td,tr,th{
            border: 1px solid #d3d3d3;
            text-align: left;
            font-size: 1.02em;
            font-family: 'Noto Sans Display', sans-serif;
            
        }
      
      .das::-webkit-scrollbar-thumb:horizontal  {
            height: 4px;
            width: 2px;
            background: #012f4e;;
       }
       @media(max-width: 786px){
           .wal{
               display:none;
               width: 80px;
           }
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
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-archive  text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
<form action="registration-request.php">
    <div class="container-fluid py-3 px-5" >
        
        <div class="row gx-0 shadow-sm" >
            <div class="row g-0 row-cols-4 justify-content-start">
                <div class="col">                
                    <div class="btn-group" role="group">
                        <a href = "resident-registration.php"  class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-user-plus"></i>&nbsp; New Resident</a>
                    </div>
                    </div>

            </div>
            <div class="row g-0  border rounded-top row-col-lg-12" style= "background: #012f4e;">
                <div class="fs-5 px-4 text-white" >
                    <i class="fa fa-archive me-2">

                    </i>Registration Requests

                </div>
            </div>
           
            
            <div class="row g-0 bg-white border border-1 das row-col-lg-12"  >
                <div class="row">

                
                <div class="col px-3 py-3" style= "overflow-x: auto;">
                    <table class="table table-striped border bg-light table-hover" style = "min-width: 1000px;">
                        <thead style = "vertical-align: middle">
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Resident Name
                                </th>
                                <th>
                                    Age
                                </th>
                                <th>
                                    Gender
                                </th>
                             
                                
                                <th>
                                    Date Submitted
                                </th>
                                <th class="text-center">
                                    Action
                                </th>
                            </tr>                
                        </thead>
                        <tbody style= "vertical-align: middle;">
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    Mang Bert
                                </td>
                                <td >
                                    45
                                </td>
                                <td>
                                    Male
                                </td>
                                <td>
                                    10-27-2021
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" >
                                        <button class="btn-primary btn" type= "submit">
                                            <i class="fa fa-check-circle mx-1 fa-1x">
                                            </i><span class = "wal">Manage</span> 
                                        </button>
                                    </div>
                                    
                                </td>
                            </tr>
                            
                        </tbody>
                        <tfoot class= "py-2 bg-light text-center">
                            <tr >
                                <th colspan = 9>
                                    End of table
                                </th>
                            </tr>    
                        </tfoot>
                        </table>
                        </div>
                </div>
     
            </div>
            
            </div>
            <div class="row py-2">

            
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</form>
</body>
</html>