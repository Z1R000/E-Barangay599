<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid'] == 0)) {
    header('location:logout.php');
} else {
    $aid=$_SESSION['clientmsaid'];
   $newpassword=$_POST['newpassword'];

   $sqlc="select * from tbladmin where ID=:aid";
   $queryc=$dbh->prepare($sqlc);
   $queryc->bindParam(':aid',$aid,PDO::PARAM_STR);
   $queryc->execute();
   $resultc=$queryc->fetchAll(PDO::FETCH_OBJ);

			
    if($queryc->rowCount() > 0)
    {
        foreach($resultc as $rowc)
        {        
            $getter = $rowc->Password;
        }
    }
    
    if(isset($_POST['submit']))
    {
  
  
    
    if($getter!=$_POST['currentpassword']){
        echo '<script>alert("Current password not match.")</script>';
    }else{
        $sql="update tbladmin set Password=:newpassword where ID=:aid";
        $query=$dbh->prepare($sql);
        $query->bindParam(':newpassword',$newpassword,PDO::PARAM_STR);
        $query->bindParam(':aid',$aid,PDO::PARAM_STR);
            $query->execute();
        
            echo '<script>alert("Password has been changed.")</script>';
            echo "<script>window.location.href ='change-password.php'</script>";
    }
   
   
  }            

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include ('link.php');?>
    

    <link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <title>Change Password</title>
    

    <style type="text/css">
        .sidebar li .submenu {
            list-style: none;
            margin: 0;
            padding: 0;
            padding-left: 1rem;
            padding-right: 1rem;
        }

        @media (max-width:576px) {
            .banner {
                display: none;
            }

            .right {
                margin-left: 8%;
            }

            .dis {
                display: flex;
            }
        }
    </style>

</head>

<body>
    
        <!-- Sidebar -->
        
        <?php $curr = "Password Settings";include_once('../includes/sidebar.php');       ?>
        <div class="d-flex align-items-center">
                <div class="container  mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp; Dashboard</a></li>
                      
                               
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-cog  text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
        </nav>
        
   
        <!-- /#sidebar-wrapper -->

  

                <div class="container-fluid px-4 my-5">
                    <div class="forms-main" style="margin: 20px;">
                        <form action="">
                            <div class="row  justify-content-center">
                                <div class="row g-2">
                                    <div class="col-xl-5 shadow-sm border-end border-start border-bottom mx-auto ">
                                    <div class="row g-2 bg-599 border-599 text-white">
                                       <div class="fs-4 px-2 py-1">
                                           Change Password
                                       </div>
                                    </div>
                                     <div class="row g-2 px-3  py-2 ">
                                    <label for="Current Password" class="fs-5">Current Password</label>
                                    <input type="text" class="form-control">
                                    <label for="New Password" class="fs-5">New Password</label>
                                    <input type="text" class="form-control">
                                    </div>
                                    <div class="row py-2">
                                        <div class="col-xl-12">
                                            <div class="float-end">
                                                <div class="btn-group">
                                                    <button class="btn btn-primary mx-1"><i class="fa fa-save mx-1"></i>
                                                        Save Changes
                                                    </button>                                              
                                              </div>
                                              <div class="btn-group">
                                                    <a class="btn btn-secondary mx-1" href = "admin-dashboard.php"><i class="fa fa-times-circle mx-1"></i>
                                                        Cancel
                                                    </a>                                              
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                  
                                </div>
                                <div class="col-xl-5">
                                    
                                </div>
                              
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <!-- /#page-content-wrapper -->
     


</body>

</html>
<?php } ?>
