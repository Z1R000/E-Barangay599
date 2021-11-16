<?php 
    $curr ="Manage Purok ".$_GET['purok'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curr;?></title>
   
    <?php include ('link.php');?>

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
<script>
     $(document).ready(function() {
        $('#st').DataTable({
       
    } );
});
</script>
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

        $connect = mysqli_connect("localhost", "root", "", "clientmsdb");
        $sql ="SELECT * from tblstreet where Purok = ".$_GET['purok']."";
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $ctr =1;

      
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
        <div class="row g-3 p-3  justify-content-center">
            <div class="row justify-content-center px-5 py-3     ">
            <div class="row g-0 py-2">
                
                <div class="col-xl-9">

                </div>
                
                <div class="col-xl-12">
                    <div class="float-end">
                        <div class="btn-group">
                            <a class="btn-secondary btn"  href ="admin-e-content.php" type = "button"><i class="fa fa-arrow-circle-left mx-1"></i>Back</a>
                        </div>

                     
                      <!--  <div class="btn-group">
                            <button class="btn-danger btn" data-bs-toggle ="modal" href ="#addpur" type = "button"><i class="fa fa-trash mx-1"></i>Delete This Purok</button>
                        </div>-->
                </div>
                </div>     
                    </div>
                <div class="row g-0 border shadow-sm row-col-xl-12 ">
                    <div class="row g-0 ">
                        <div class="fs-5 text-dark  bg-599  rounded-top text-white p-2">Street List</div>
                    </div>
                 
                    <div class="row py-2 px-5">
                        <table class= "table table-bordered table-striped " id= "st">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Street Name</th>
                                <th class ="text-center">
                                    Action <i class="fa-fa-edit ms-2"></i>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                <form method = "GET" action = "#edit-st">
                                <?php
                                foreach($results as $row){

                                    echo'<tr>
                                    <td>
                                     '.$ctr.'   
                                    </td>
                                    <td>
                                        '.$row->streetName.'
                                    <div class="modal fade" id = "edit-st'.$ctr.'" tab-idndex = "-1">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                        <div class="modal-content g-0 border-0 ">
                                            <div class="modal-header bg-599 border-599 text-white ">
                                                <div class="modal-title" >&nbsp;<i class = "fa fa-edit"></i>&nbsp;&nbsp;Edit Street</div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body bg-white ">
                                                <div class="row g-2 justify-content-center">
                                                
                                                    
                                                    <div class = "col-xl-4">
                                                    <label for = "prn" class= "fs-5">Current Purok </label>
 
                                                                ';
                                           
                                                 
                                                        $sql_purok ="SELECT * FROM `tbllistpurok`";
                                                        $query_purok = $dbh -> prepare($sql_purok);
                                                        $query_purok->execute();
                                                        $resultspur=$query_purok->fetchAll(PDO::FETCH_OBJ);
                                                        
                                                        $puroks = "";
                                                        foreach($resultspur as $p){
                                                            if ($p->pName == $row->Purok){
                                                                $puroks.='<option selected value = "'.$p->pName.'">'.$p->pName.'</option>';
                                                            }
                                                            else{
                                                                $puroks.='<option  value = "'.$p->pName.'">'.$p->pName.'</option>';
                                                            }
                                                          
                                                        }
                                                        echo '<select class= "form-select" name= "prn">'.$puroks.'</select>';

                                    echo'
                                    
                                                    </div>
                                                    
                                                    <div class="col-xl-8">
                                                    <label for = "sname" class= "fs-5">Street Name </label>
                                                        <input name= "sname" type = "text" value ="'.$row->streetName.'" class= "form-control"/>
                                                    </div>
                                                    </div>
                                                    <div class="row my-2">
                                                    <div class="col-xl-12">
                                                    <div class="float-end">
                                                    <div class="btn-group">
                                                       <button type= "submit" class="btn-primary btn"><i class="fa fa-save mx-1"></i>Save Changes</button>
                                                    </div>
                                                    <div class="btn-group">
                                                    <button data-bs-dismiss ="modal" class="btn-secondary btn"><i class="fa fa-times-circle mx-1"></i>Cancel</button>
                                                    </div>
                                                 
                                                    </div></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id = "delete-street" tab-idndex = "-1">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                        <div class="modal-content g-0 bg-danger" >
                                            <div class="modal-header  white ">
                                                <div class="modal-title bg-danger" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</div>
                                                
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body bg-white">
                                                <div class="row">
                                                    <div class="col xl-4" align = "center">
                                                        <img src="../images/trash.png" alt="trash" class= " img-fluid " style ="width: 10%;">
                                                    </div>
                                            
                                                </div>
                                                <div class="row">
                                                    <p class = "fs-4 text-center">You are about to delete an existing record, do you wish to continue?<br><span class="text-muted fs-6">*Select (<i class = "fa fa-check">)</i> if certain</span></p>
                                                </div>
                                                <div class="row justify-content-center" align = "center">
                                                    <form method = "POST" action = "#">
                                                    <div class="col-xl-12">
                                                        <div class="float-end">
                                                            <div class="btn-group">
                                                                <button type = "button" class="btn btn-success " data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                                            <i class= "fa fa-check mx-1"></i>Confirm
                                                        </button>
                                                        </div>
                                                        <div class="btn-group">
                                                        <button type = "button" class="btn btn-danger " data-bs-dismiss = "modal"  name = "no" value ="No">
                                                            <i class= "fa fa-times-circle mx-1"></i>Cancel
                                                        </button>
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
                                    </td>
                                    <td style= "width:30%;text-align:center;">
                                        <div class= "btn-group">
                                        <button type= "submit" name= "edit" class= "btn btn-primary" value= "'.$row->ID.'"  data-bs-toggle = "modal" href= "#edit-st'.$ctr.'"><i class="fa fa-edit mx-1"></i>Manage</button> 
                                        </div>
                                     

                                        <div class= "btn-group">
                                        <button class= "btn btn-danger" value= "'.$row->ID.'"><i class="fa fa-trash mx-1"></i>Delete</button> 
                                        </div>
                                    </td>
                                                                
                                    </tr> 
                                    
                                    

                                    ';

                                    $ctr++;

                                }                                
                               
                                
                               ?>
                                
                            </tbody>
                    
                            


                        </table>
                    </div>
                            
                    </div>  
                </div>
                   
         
            
        </div>
    </div>
    
        </form>
   
</body>
</html>