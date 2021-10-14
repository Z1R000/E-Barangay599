<?php 
    $curr ="Resident Info";
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
      header('location:logout.php');
      } else{
        if(isset($_POST['submit']))
        {
        $eid=intval($_GET['editid']);
        $clientmsaid=$_SESSION['clientmsaid'];
            $rest=$_POST['rest'];
            $lname=$_POST['lname'];
            $fname=$_POST['fname'];
            $mname=$_POST['mname'];
            $hu=$_POST['hu'];
            $vp=$_POST['vp'];
            $prk=$_POST['prk'];
            $stn=$_POST['stn'];
            $gnd=$_POST['gnd'];
            $contact=$_POST['contact'];
            $cstat=$_POST['cstat'];
            $vstat=$_POST['vstat'];
            $email=$_POST['email'];
            $sss=$_POST['sss'];
            $tin=$_POST['tin'];
            $bdt=$_POST['bdt'];
        
        $sql="update tblresident set ResidentType=:rest, Purok=:prk, houseUnit=:hu, streetName=:stn, LastName=:lname, FirstName=:fname, MiddleName=:mname, houseUnit=:hu, streetName=:stn, Purok=:prk, Cellphnumber=:contact, CivilStatus=:cstat, voter=:vstat, Email=:email where ID=:eid";
        $query=$dbh->prepare($sql);
        $query->bindParam(':rest',$rest,PDO::PARAM_STR);
        $query->bindParam(':vstat',$vstat,PDO::PARAM_STR);
        $query->bindParam(':lname',$lname,PDO::PARAM_STR);
        $query->bindParam(':fname',$fname,PDO::PARAM_STR);
        $query->bindParam(':mname',$mname,PDO::PARAM_STR);
        $query->bindParam(':hu',$hu,PDO::PARAM_STR);
        $query->bindParam(':stn',$stn,PDO::PARAM_STR);
        $query->bindParam(':prk',$prk,PDO::PARAM_STR);
        $query->bindParam(':contact',$contact,PDO::PARAM_STR);
        $query->bindParam(':cstat',$cstat,PDO::PARAM_STR);
        $query->bindParam(':email',$email,PDO::PARAM_STR);
        $query->bindParam(':eid',$eid,PDO::PARAM_STR);
        $query->execute();
        echo '<script>alert("Resident detail has been updated")</script>';
        echo "<script type='text/javascript'> document.location ='edit-resident-account.php?editid=" + $eid + "'; </script>";
            }
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
 <div class="d-flex align-items-center">
                <div class="container mx-5 mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a  class= "text-decoration-none" href="admin-residence.php"><i class="fa fa-users"></i>&nbsp;Resident List</a></li>
                            
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-address-book text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
   
    <div class="container-fluid mx-auto px-5">
        <div class="row g-0 mx-2">
            <div class="row g-3">
                <div class="mx-auto col-xl-10 white  ">
                <form method="post"> 
                    <?php
                        $eid=$_GET['editid'];
                        $sql="SELECT * from tblresident where ID=:eid";
                        $query = $dbh -> prepare($sql);
                        $query->bindParam(':eid',$eid,PDO::PARAM_STR);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $cnt=1;
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $row)
                        {               
                    ?>
                    <div class="row g-0 rounded-top"  style= "background-color:#021f4e">
                        <div class="fs-5 px-3 py-1">
                            Resident #<?php echo $row->ID; ?>
                        </div>
                    </div>
                    <div class="row g-0 border bg-white">
                        <div class="col-xl-3 py-3 border-end" align = "center">
                      
                            <img src="../images/user-res.png" alt="resident" style ="width: 105px; height: 100px;">
                            <div class = "fs-6 black"><?php echo "$row->FirstName "; echo "$row->MiddleName "; echo $row->LastName; ?></div>
                            
                        </div>
                        <div class="col-xl-4 mx-2  px-2">
                            
                            <table class="table my-3">
                                    <tr>
                                        <th class =""><i class ="fa fa-calendar me-2"></i>Age</th>
                                        <td>
                                            <?php 
                                                $gbd = $row->BirthDate;
                                                $gbd = date('Y-m-d', strtotime($gbd));
                                                $today = date('Y-m-d');
                                                $diff = date_diff(date_create($gbd), date_create($today));
                                                echo $diff->format('%y'); 
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class ="" > <i class= "fa fa-venus-mars me-1"></i> Gender</th>
                                        <td><?php echo $row->Gender; ?></td>
                                    </tr>
                        
                                    <tr>
                                        <th class ="" > <i class= "fa fa-heart me-1"></i> Civil Status</th>
                                        <td>
                                        <select  name="cstatus"  class="form-control select2" required='true' style="padding: 1px; width: 90%; font-size: 90%; color: black;">
                                            <option value="<?php  echo htmlentities($row->CivilStatus);?>"><?php  echo htmlentities($row->CivilStatus);?></option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widow">Widow</option>
                                            <option value="Separated">Separated</option>
                                            
                                        </select>
                                        </td>
                                    </tr>
                        
                            </table>
                           
                        </div>
                        <div class="col-xl-4 mx-2">
                            
                            <table class="table my-3">
                                    <tr>
                                        <th class =""><i class ="fa fa-birthday-cake me-2"></i>Birthdate</th>
                                        <td>
                                            <?php 
                                                $gbd = $row->BirthDate;
                                                $gbd = date('j F Y', strtotime($gbd));
                                                echo $gbd;
                                            ?>
                                        </td>
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
                <?php $cnt=$cnt+1;}} ?>
            </div>
                        </form>
          
        </div>
    </div>
    <div class="container-fluid mx-auto px-5 mb-5">
        <div class="row g-0 mx-2">
            <div class="row g-2">
                <div class="mx-auto col-xl-11 ">
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
                                        <select class="form-select input-sm" name = "rest" aria-label="Default select example">
                                            <option value="<?php  echo htmlentities($row->ResidentType);?>"><?php  echo htmlentities($row->ResidentType);?></option>
                                            <option value="homeowner">Home Owner</option>
                                            <option value="caretaker">Care taker</option>
                                            <option value="rental">Rental/Boarder</option>
                                            <option value="wrelative">Living with Relatives</option>
                                        </select>  
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <th class ="">Contact Number</th>
                                        <td style ="text-align: right; padding-right: 4%" ><input type="text" name="contact"  value = "<?php echo $row->Cellphnumber ?>"></td>
                                    </tr>
                                    <tr>
                                        <th class ="">First Name</th>
                                        <td style ="text-align: right; padding-right: 4%" ><input type="text" name="fname" class = "" value = "<?php echo $row->FirstName ?>"></td>
                                    </tr>
                                
                                    
                                    <tr>
                                        <th class ="">Middle Name</th>
                                        <td style ="text-align: right; padding-right: 4%" ><input type="text" name="mname" class = "" value = "<?php echo $row->MiddleName ?>"></td>
                                    </tr>
                                    <tr>
                                        <th class ="">Last Name</th>
                                        <td style ="text-align: right; padding-right: 4%" ><input type="text" name="lname" class = "" value = "<?php echo $row->LastName ?>"></td>
                                    </tr>
                                    <tr>
                                        <th class ="">House Unit/Number</th>
                                        <td style ="text-align: right; padding-right: 4%" >#<input type="text" name="hu" class = "" value = "<?php echo $row->houseUnit ?>"></td>
                                    </tr>
                                
                                    <tr>
                                        <th class ="">Purok</th>
                                        <td style ="text-align: right; padding-right: 4%" >
                                            <select name="prk" id = "purok" aria-label="Default select example">
                                                <option value="<?php echo $row->Purok ?>">Purok <?php echo $row->Purok ?></option>
                                                <option value="1">Purok 1</option>
                                                <option value="2">Purok 2</option>
                                                <option value="3">Purok 3</option>
                                            </select>      
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class ="">Street</th>
                                        <td  style ="text-align: right; padding-right: 4%">
                                            <select name="stn" id = "vp" aria-label="Default select example">
                                                <option value="<?php echo $row->streetName ?>"><?php echo $row->streetName ?></option>
                                                <option value="s1">Street 1</option>
                                                <option value="s2">Street 2</option>
                                            </select>
                                        </td>    
       
                                       
                                    </tr>
                                  
                                    <tr>
                                        <th class ="">TIN</th>
                                        <td style ="text-align: right; padding-right: 4%" ><?php echo $row->tinNumber ?></td>
                                    </tr>
                                    <tr>
                                        <th class ="">SSS number</th>
                                        <td style ="text-align: right; padding-right: 4%" ><?php echo $row->sssNumber ?></td>
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
<?php }  ?>