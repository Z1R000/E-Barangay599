<?php 
    $curr ="Resident Info";
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
    <link rel="stylesheet" href="../css/scrollbar.css">
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
        
        table,td,tr,th{
            
            text-align: left;
            font-size: 1em;
            padding: 100px;
            font-family: 'Noto Sans Display', sans-serif;
            
        }
        .smol{
            width: 50px;
        }

        .white{
            color: white;
        }
        .black{
            color: #000;
        }
        .right{
            margin-left: 8.5%;
        }
        
        @media (max-width: 576px){
            .right{
                margin: auto;
            }
            .dis{
                font-size: 15px;
            }
            .ser{
                width: 100%;
            }
           
        }
    </style>
</head>
<body>

    <?php 
        include ('../includes/sidebar.php');
    ?> 
            <div class="container mt-4 mx-5">   
                <nav aria-label="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item fs-6"><a href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                         
                            <li class="breadcrumb-item fs-6 active"><a href="admin-residence.php"><i class="fa fa-users"></i>&nbsp;Resident List</a></li>
                            <li class="breadcrumb-item fs-6 active"><a href="#"><i class="fa fa-user text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                        </ol>
                    </nav>
                </nav>
            </div>
            <div class="container-fluid mx-4 px-5">
        <div class="row g-0 mx-2">
            <div class="row g-3">
                <div class="mx-auto col-xl-10 white   ">
                    <div class="row g-0 rounded-top "  style= "background-color:#021f4e">
                        <div class="fs-5 px-3 py-1">
                            Resident #123
                        </div>
                    </div>
                    <div class="row g-0 border bg-white">
                        <div class="col-xl-3 py-3 border-end" align = "center">
                      
                            <img src="../images/user-res.png" alt="resident" style ="width: 105px; height: 100px;">
                            <div class = "fs-6 black">Portgas D. Ace</div>
                            
                        </div>
                        <div class="col-xl-4 mx-2  px-2">
                            
                            <table class="table my-3">
                                    <tr>
                                        <th class =""><i class ="fa fa-calendar me-2"></i>Age</th>
                                        <td><input type="number" class = "smol" value = "40"></td>
                                    </tr>
                                    <tr>
                                        <th class ="" > <i class= "fa fa-venus-mars me-1"></i> Gender</th>
                                        <td>Male</td>
                                    </tr>
                        
                                    <tr>
                                        <th class ="" > <i class= "fa fa-heart me-1"></i> Civil Status</th>
                                        <td><input type="text" class = "smol" value = "Single"></td>
                                    </tr>
                        
                            </table>
                           
                        </div>
                        <div class="col-xl-4 mx-2">
                            
                            <table class="table my-3">
                                    <tr>
                                        <th class =""><i class ="fa fa-birthday-cake me-2"></i>Birthdate</th>
                                        <td>September 9 1990</td>
                                    </tr>
                                    <tr>
                                        <th class ="" > <i class= "fa fa-info me-1"></i> Status</th>
                                        <td>
                                            <select>
                                                <option value="Active" selected>Active</option>
                                                <option value="Inactive" >Inactive</option>
                                            </select>
                                        </td>
                                    </tr>
                        
                                    
                            </table>
                           
                        </div>
                    </div>
                    
                
                </div>
            
            </div>
          
        </div>
    </div>
    <div class="container-fluid mx-4 px-5 mb-5">
        <div class="row g-0 mx-2">
            <div class="row g-2">
                <div class="mx-auto col-xl-10 ">
                    <div class="row g-0  rounded-top border bg-white">
                        <div class="col-xl-4 py-2 px-2  ">
                            <nav class="nav nav-pills flex-column  flex-sm-row">
                                <a class="flex-sm-fill  text-sm-center nav-link active" aria-current="page" href="#">Personal Details</a>
                                <a class="flex-sm-fill text-sm-center nav-link " href="edit-resident-account.php">Account Details</a>
                              
                           
        
        
                            </nav>

                        </div>
                        
                    </div>
                    <div class="row g-0 border bg-white" >
                    
                        <div class="col-xl-11 mx-2  mx-auto  px-2">
                            
                            <table class="table my-3" >
                                    <tr>
                                        <th class ="">Resident Type</th>
                                        <td style ="text-align: right; padding-right: 4%" > 
                                            <select class=" input-sm" id = "rtype" aria-label="Default select example">
                                    
                                                <option value="homeowner selected">Home Owner</option>
                                                <option value="caretaker">Care taker</option>
                                                <option value="rental">Rental/Boarder</option>
                                                <option value="wrelative">Living with Relatives</option>
                                                <option value="wrelative">Others</option>
                                            </select>  
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <th class ="">Contact No.</th>
                                        <td style ="text-align: right; padding-right: 4%" ><input type="text"  value = "12222"></td>
                                    </tr>
                                    <tr>
                                        <th class ="">First</th>
                                        <td style ="text-align: right; padding-right: 4%" ><input type="text" class = "" value = "Portgas"></td>
                                    </tr>
                                
                                    
                                    <tr>
                                        <th class ="">Middle Name</th>
                                        <td style ="text-align: right; padding-right: 4%" ><input type="text" class = "" value = "Dee"></td>
                                    </tr>
                                    <tr>
                                        <th class ="">Last Name</th>
                                        <td style ="text-align: right; padding-right: 4%" ><input type="text" class = "" value = "Ace"></td>
                                    </tr>
                                    <tr>
                                        <th class ="">House Unit/Number</th>
                                        <td style ="text-align: right; padding-right: 4%" >#<input type="text" class = "" value = "2124"></td>
                                    </tr>
                                
                                    <tr>
                                        <th class ="">Purok</th>
                                        <td style ="text-align: right; padding-right: 4%" >
                                            <select  id = "purok" aria-label="Default select example">
                                                <option value="1">Purok 1</option>
                                                <option value="2" selected>Purok 2</option>
                                                <option value="3">Purok 3</option>
                                            </select>      
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class ="">Street</th>
                                        <td  style ="text-align: right; padding-right: 4%"><select id = "vp" aria-label="Default select example">
                                            <option selected>Street Number</option>
                                            <option value="s1">Street 1</option>
                                            <option value="s2">Street 2</option>
                                        </select></td>    
       
                                       
                                    </tr>
                                  
                                    <tr>
                                        <th class ="">TIN</th>
                                        <td style ="text-align: right; padding-right: 4%" >123-456-789</td>
                                    </tr>
                                    <tr>
                                        <th class ="">SSS number</th>
                                        <td style ="text-align: right; padding-right: 4%" >13-45622-892</td>
                                    </tr>
                                    <tr>
                                        <th class ="">Voter's  </th>
                                        <td style ="text-align: right; padding-right: 4%" >  <select  id = "vp" aria-label="Default select example">
                                       
                                        <option value="50-A"selected>50-A</option>
                                        <option value="51-A">51-A</option>
                                    </select>        </td>
                                    </tr>

                            </table>
                           
                        </div>
              
                      
                    </div>
                    <div class="row my-2 justify-content-end">
                        <div class="col-8">

                        </div>
                        <div class="col-4">
                            <input type="submit" class="form-control btn btn-outline-primary" name = "submit"value = "Save Changes">
                        </div>
                    </div>
                    
                
                </div>
            
            </div>
          
        </div>
    </div>
            
           
                
    

    
</body>
</html>