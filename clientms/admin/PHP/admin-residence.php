<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
  	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Residents</title>
   
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
            border: 1px solid #d3d3d3;
            text-align: left;
            font-size: 1.08em;
        
            font-family: 'Noto Sans Display', sans-serif;
            
        }
        .ov{
            min-width: 576px;
            overflow-y:auto;
        }

       
        .action{
          
            text-align: center;
        }
        .btng{
            width: 50px;
        }
        
        @media (max-width: 576px){
            table{
                overflow-y: auto;
            }
            .ov{
                overflow-y:auto;
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
		.pagination{display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}
		.pagination>li{display:inline}
		.pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#337ab7;text-decoration:none;background-color:#fff;border:1px solid #ddd}
		.pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-top-left-radius:4px;border-bottom-left-radius:4px}
		.pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}
		.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover{z-index:2;color:#23527c;background-color:#eee;border-color:#ddd}
		.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover{z-index:3;color:#fff;cursor:default;background-color:#337ab7;border-color:#337ab7}
		.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover{color:#777;cursor:not-allowed;background-color:#fff;border-color:#ddd}
		.pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px;line-height:1.3333333}
		.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-top-left-radius:6px;border-bottom-left-radius:6px}
		.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}
		.pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px;line-height:1.5}.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-top-left-radius:3px;border-bottom-left-radius:3px}
		.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-top-right-radius:3px;border-bottom-right-radius:3px}
    </style>
</head>
<body>

    <?php 
        $curr = "Resident List";
        include ('../includes/sidebar.php');
    ?> 
            <!--breadcrumb-->
            
            <div class="float-end">
            <div class="container mt-4 mx-5">
                <nav aria-label="breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item fs-6"><a href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                         
                            <li class="breadcrumb-item fs-6 active"><a href="#"><i class="fa fa-users text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                        </ol>
                    </nav>
                </nav>
            </div>

            </div>
            
        </nav>

        <div class="container-fluid px-5">
                    <div class="row px-5">
                        <div class="col-xl-5"></div>
                        <div class="col-xl-7">
                            <div class="float-end">
                                <a href="admin-dashboard.php"  class="link link-primary text-decoration-none fs-4"><i class="fa fa-arrow-circle-left me-2"></i>Go back</a>
                            </div>
                            
                        </div>
                    </div>
            </div>
        
    <div class="container-fluid my-4  ">
        <div class="row border mx-5 bg-white shadow-lg">
            <div class="row border-bottom g-0 py-1 px-3">
                <h4 class="fs-5">
                    <i class ="fa fa-chart-bar"></i>
                    Resident List
                </h4>
            </div>
            
                <!--<div class="row g-0 mb-5">
                    <div class="row g-2 px-5">
                        <div class="col-xl-8 col-md-12 col-sm-12 col-sm-12">

                        </div>
                    <div class="col-xl-4 col-md- 12 col-xs-12 col-sm-12 float-end">
                        <div class="d-flex float-end">
                            <div class="dis fs-4 me-3 d-flex">Search:</div>
                            <input class = "ser form-control"type="text" placeholder ="Search here">
                            
                        </div>
                    </div>
                </div>-->

                <div class = "row g-1 px-5">
              
                    <div class="col-xl-12 col-md-12 col-sm-12 ">
                        <div class = "row my-2">
                            <div class="col-md-8">
                                  
                                <div class="btn-group" role="group">
                                    <a href = "resident-registration.php"  class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;New Resident</a>
                                </div>

                            </div>
                            <div class="col-md-4 " >
                                <form class = "d-flex" method="post" name="search" action="">
									<p style="font-size:16px; color:red" align="center"> <?php if($msg){
										echo $msg;
									  }  ?> </p>
                                        
                                        <input id="searchdata" type = "text" class= "form-control" name="searchdata"placeholder = "Search here">
                                        <button type ="submit" class = "btn btn-outline-info" name="search"><i class = "fa fa-search"></i></button>
                                </form>

                            </div>
                            
                        </div>
                    </div>
                </div>
               
				<?php
					if(isset($_POST['search']))
					{ 

					$sdata=$_POST['searchdata'];
				?>
				<h4 align="center">Result for "<?php echo $sdata;?>"</h4>
                <div class="row g-1 px-5">
                    <div class="col-xl-12 col-md-12 col-sm-12 ">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th  scope="col">
                                        Status  </th>
                                    <th   scope="col">Name </th>
                                    <th   scope="col">Age </th>
                                    <th   scope="col">Gender </th>
                                    <th   scope="col">Purok</th>
                                    <th  scope="col">Street </th>
                                    <th   scope="col">Action </th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
								<?php
									$sql="SELECT * from tblresident where tblresident.LastName like '%$sdata%'";
									$query = $dbh -> prepare($sql);
									$query->execute();
									$results=$query->fetchAll(PDO::FETCH_OBJ);

									$cnt=1;
									if($query->rowCount() > 0)
									{
									foreach($results as $row)
									{               
								?>
                                <td  class ="small" scope="col">
                                    <i class ="fa fa-circle link-success me-1"></i>
                                    Active
                                </td>
                                
                                <td  scope="col"><?php  echo htmlentities($row->LastName);?>, <?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->MiddleName);?></td>
                                <td  scope = "col">35</td>
                                <td    scope="col"><i class = "<?php 
                                $gend = htmlentities($row->Gender);
                                $gen = "fa fa-venus link-danger ";
                                if ($gend =="Female"){
                                    echo $gen;
                                }
                                else{
                                    $gen = "fa fa-mars link-info ";  
                                    echo $gen;
                                }
                                
                                ?>me-2"> </i>
                                <?php echo $gend;

                                ?> </td>
                                <td   scope="col"><?php  echo htmlentities($row->Purok);?></td>
                                <td scope="col"><?php  echo htmlentities($row->streetName);?> </td>
                                <td  class ="action" scope="col">
                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                        <a href  = "view-resident-personal.php?viewid=<?php echo $row->ID;?>" type="button" class="btn btn-primary"><i class = "fa fa-eye me-2"></i>View</a>
                                    </div>
                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                        <a type="button" href ="edit-resident-personal.php?editid=<?php echo $row->ID;?>"class="btn btn-success"><i class = "fa fa-edit me-2"></i>Edit</a>
                                    </div>
                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                        <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn btn-danger"> <i class = "fa fa-trash me-2"></i>Delete</button>
                                    </div>
                                </td>                         
                            </tr>
                            <?php $cnt=$cnt+1;}}}else{?>   
                            </tbody>
                        </table>
                    </div>
                </div>
				<!--END SEARCH -->
                
                <div class="container-fluid px-5 mx-auto">
                    <div class="row px-2  g-0" style= "border-radius: 10px 10px 0px 0px;">
                        <ul class="nav nav-pills py-2" id="pills-tab" role="tablist">
                            <li class="nav-item px-1" role="presentation">
                                <button class="btn btn-outline-primary active fs-5" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#all" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All Residents</button>
                            </li>
                            <li class="nav-item px-1 " role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#p1" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Purok 1</button>
                            </li>
                            <li class="nav-item px-1 " role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p2" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 2</button>
                            </li>
                            <li class="nav-item px-1" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p3" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 3</button>
                            </li>
                            <li class="nav-item px-1" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p4" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 4</button>
                            </li>
                            <li class="nav-item px-1" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p5" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 5</button>
                            </li>
                            <li class="nav-item px-1 " role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p6" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 6</button>
                            </li>
                            <li class="nav-item px-1" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p7" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 7</button>
                            </li>
                            <li class="nav-item px-1" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p8" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 8</button>
                            </li>
                            <li class="nav-item px-1" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p9" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 9</button>
                            </li>
                            <li class="nav-item px-1" role="presentation">
                                <button class="btn btn-outline-primary fs-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#p10" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Purok 10</button>
                            </li>
                        </ul>
                        
               

                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id = "all">
                        <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                <div class="row" >
                                    <table class="table bg-white rounded shadow-sm  table-hover ">
                                    <div class="" style= "overflow-x:auto">
                                        <thead>
                                            <tr>
                                                <th  scope="col">
                                                    Status  </th>
                                                <th   scope="col">Name </th>
                                                <th   scope="col">Age </th>
                                                <th   scope="col">Gender </th>
                                                <th   scope="col">Purok</th>
                                                <th  scope="col">Street </th>
                                                <th   scope="col">Action </th>
                                            </tr>   
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <?php
                                                if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                                                    $page_no = $_GET['page_no'];
                                                    } else {
                                                        $page_no = 1;
                                                        }
                                                $total_records_per_page = 10;
                                                $offset = ($page_no-1) * $total_records_per_page;
                                                $previous_page = $page_no - 1;
                                                $next_page = $page_no + 1;
                                                $adjacents = "2";
                                                
                                                $count = "SELECT * FROM tblresident";
                                                $queryc = $dbh -> prepare($count);
                                                $queryc->execute();
                                                $resultc=$queryc->fetchAll(PDO::FETCH_OBJ);
                                                $total_records=$queryc->rowCount();
                                                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                                $second_last = $total_no_of_pages - 1;
                                                
                                                
                                                $sql="SELECT * from tblresident LIMIT $offset, $total_records_per_page";
                                                $query = $dbh -> prepare($sql);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                
                                                
                                                $cnt=1;
                                                if($query->rowCount() > 0)
                                                {
                                                foreach($results as $row)
                                                {               
                                            ?>
                                            <td  class ="small" scope="col">
                                                <i class ="fa fa-circle link-success me-1"></i>
                                                Active
                                            </td>
                                            
                                            <td  scope="col"><?php  echo htmlentities($row->LastName);?>, <?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->MiddleName);?></td>
                                            <td  scope = "col"><?php $gbd = $row->BirthDate;
                                                            $gbd = date('Y-m-d', strtotime($gbd));
                                                            $today = date('Y-m-d');
                                                            $diff = date_diff(date_create($gbd), date_create($today));
                                                            echo $diff->format('%y');?></td>
                                            <td    scope="col"><i class = "fa <?php 
                                            $gend = htmlentities($row->Gender);
                                            $gen = "fa fa-venus link-danger ";
                                            if ($gend =="Female"){
                                                echo $gen;
                                            }
                                            else{
                                                $gen = "fa fa-mars link-info ";  
                                                echo $gen;
                                            }
                                            
                                            ?> me-2"> </i><?php  echo htmlentities($row->Gender);?> </td>
                                            <td   scope="col"><?php  echo htmlentities($row->Purok);?></td>
                                            <td scope="col"><?php  echo htmlentities($row->streetName);?> </td>
                                            <td  class ="action" scope="col">
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a href  = "view-resident-personal.php?viewid=<?php echo $row->ID;?>" type="button" class="btn btn-primary"><i class = "fa fa-eye me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a type="button" href ="edit-resident-personal.php?editid=<?php echo $row->ID;?>"class="btn btn-success"><i class = "fa fa-edit me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash me-2"></i>Delete</button>
                                                </div>
                                            </td>
                                        
                                        
                                        </tr>
                                        <?php $cnt=$cnt+1;}}}?>   
                                        </tbody>
                                    </table>
                                    </div>
                                    
                                    <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                                        <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
                                    </div>
                                    <ul class="pagination">
                                        <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
                                        
                                        <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                                        <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
                                        </li>
                                        
                                        <?php 
                                        if ($total_no_of_pages <= 10){  	 
                                            for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                                                if ($counter == $page_no) {
                                            echo "<li class='active'><a>$counter</a></li>";	
                                                    }else{
                                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                                    }
                                            }
                                        }
                                        elseif($total_no_of_pages > 10){
                                            
                                        if($page_no <= 4) {			
                                        for ($counter = 1; $counter < 8; $counter++){		 
                                                if ($counter == $page_no) {
                                            echo "<li class='active'><a>$counter</a></li>";	
                                                    }else{
                                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                                    }
                                            }
                                            echo "<li><a>...</a></li>";
                                            echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                                            echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                                            }

                                        elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                                            echo "<li><a href='?page_no=1'>1</a></li>";
                                            echo "<li><a href='?page_no=2'>2</a></li>";
                                            echo "<li><a>...</a></li>";
                                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                                            if ($counter == $page_no) {
                                            echo "<li class='active'><a>$counter</a></li>";	
                                                    }else{
                                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                                    }                  
                                        }
                                        echo "<li><a>...</a></li>";
                                        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                                        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                                                }
                                            
                                            else {
                                            echo "<li><a href='?page_no=1'>1</a></li>";
                                            echo "<li><a href='?page_no=2'>2</a></li>";
                                            echo "<li><a>...</a></li>";

                                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                            if ($counter == $page_no) {
                                            echo "<li class='active'><a>$counter</a></li>";	
                                                    }else{
                                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                                    }                   
                                                    }
                                                }
                                        }
                                    ?>
                                        
                                        <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                                        <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
                                        </li>
                                        <?php if($page_no < $total_no_of_pages){
                                            echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
                                            } ?>
                                    </ul>
                                </div>
                                <!--<div class="row  border justiy-content-center">
                                
                                    <div class="col-xl-4"></div>
                                    <div class="col-xl-4"></div>
                                    <div class="col-xl-4"><a class= "" href = "#"> <i class="fas fa-forward fa-2x text-primary"></i></a></div>
                                </div>-->
                                </div>
                            </div>
                    </div>
                    <div class="tab-pane fade show" id="p1">
                        <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <table class="table bg-white rounded shadow-sm  table-hover ">
                                        <div class="" style= "overflow-x:auto">
                                            <thead>
                                                <tr>
                                                    <th  scope="col">
                                                        Status  </th>
                                                    <th   scope="col">Name </th>
                                                    <th   scope="col">Age </th>
                                                    <th   scope="col">Gender </th>
                                                    <th   scope="col">Purok</th>
                                                    <th  scope="col">Street </th>
                                                    <th   scope="col">Action </th>
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                <td>p1</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>

                                                </td>
                                                <td  class ="action" scope="col">
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a href  = "view-resident-personal.php?viewid=<?php echo $row->ID;?>" type="button" class="btn btn-primary"><i class = "fa fa-eye me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a type="button" href ="edit-resident-personal.php?editid=<?php echo $row->ID;?>"class="btn btn-success"><i class = "fa fa-edit me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash me-2"></i>Delete</button>
                                                </div>
                                            </td>
                                                
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                    
                    <div class="tab-pane fade show" id="p2">
                    <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <table class="table bg-white rounded shadow-sm  table-hover ">
                                        <div class="" style= "overflow-x:auto">
                                            <thead>
                                                <tr>
                                                    <th  scope="col">
                                                        Status  </th>
                                                    <th   scope="col">Name </th>
                                                    <th   scope="col">Age </th>
                                                    <th   scope="col">Gender </th>
                                                    <th   scope="col">Purok</th>
                                                    <th  scope="col">Street </th>
                                                    <th   scope="col">Action </th>
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                <td>p2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>

                                                </td>
                                                <td  class ="action" scope="col">
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a href  = "view-resident-personal.php?viewid=<?php echo $row->ID;?>" type="button" class="btn btn-primary"><i class = "fa fa-eye me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a type="button" href ="edit-resident-personal.php?editid=<?php echo $row->ID;?>"class="btn btn-success"><i class = "fa fa-edit me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash me-2"></i>Delete</button>
                                                </div>
                                            </td>
                                                
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
       
                    <div class="tab-pane fade show" id="p3">
                    <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <table class="table bg-white rounded shadow-sm  table-hover ">
                                        <div class="" style= "overflow-x:auto">
                                            <thead>
                                                <tr>
                                                    <th  scope="col">
                                                        Status  </th>
                                                    <th   scope="col">Name </th>
                                                    <th   scope="col">Age </th>
                                                    <th   scope="col">Gender </th>
                                                    <th   scope="col">Purok</th>
                                                    <th  scope="col">Street </th>
                                                    <th   scope="col">Action </th>
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                <td>p3</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>

                                                </td>
                                                <td  class ="action" scope="col">
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a href  = "view-resident-personal.php?viewid=<?php echo $row->ID;?>" type="button" class="btn btn-primary"><i class = "fa fa-eye me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a type="button" href ="edit-resident-personal.php?editid=<?php echo $row->ID;?>"class="btn btn-success"><i class = "fa fa-edit me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash me-2"></i>Delete</button>
                                                </div>
                                            </td>
                                                
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    <div class="tab-pane fade show" id="p4">
                    <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <table class="table bg-white rounded shadow-sm  table-hover ">
                                        <div class="" style= "overflow-x:auto">
                                            <thead>
                                                <tr>
                                                    <th  scope="col">
                                                        Status  </th>
                                                    <th   scope="col">Name </th>
                                                    <th   scope="col">Age </th>
                                                    <th   scope="col">Gender </th>
                                                    <th   scope="col">Purok</th>
                                                    <th  scope="col">Street </th>
                                                    <th   scope="col">Action </th>
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                <td>p4</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>

                                                </td>
                                                <td  class ="action" scope="col">
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a href  = "view-resident-personal.php?viewid=<?php echo $row->ID;?>" type="button" class="btn btn-primary"><i class = "fa fa-eye me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a type="button" href ="edit-resident-personal.php?editid=<?php echo $row->ID;?>"class="btn btn-success"><i class = "fa fa-edit me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash me-2"></i>Delete</button>
                                                </div>
                                            </td>
                                                
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                   
                    <div class="tab-pane fade show" id="p5">
                    <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <table class="table bg-white rounded shadow-sm  table-hover ">
                                        <div class="" style= "overflow-x:auto">
                                            <thead>
                                                <tr>
                                                    <th  scope="col">
                                                        Status  </th>
                                                    <th   scope="col">Name </th>
                                                    <th   scope="col">Age </th>
                                                    <th   scope="col">Gender </th>
                                                    <th   scope="col">Purok</th>
                                                    <th  scope="col">Street </th>
                                                    <th   scope="col">Action </th>
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                <td>p5</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>

                                                </td>
                                                <td  class ="action" scope="col">
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a href  = "view-resident-personal.php?viewid=<?php echo $row->ID;?>" type="button" class="btn btn-primary"><i class = "fa fa-eye me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a type="button" href ="edit-resident-personal.php?editid=<?php echo $row->ID;?>"class="btn btn-success"><i class = "fa fa-edit me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash me-2"></i>Delete</button>
                                                </div>
                                            </td>
                                                
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                   
                    <div class="tab-pane fade show" id="p6">
                    <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <table class="table bg-white rounded shadow-sm  table-hover ">
                                        <div class="" style= "overflow-x:auto">
                                            <thead>
                                                <tr>
                                                    <th  scope="col">
                                                        Status  </th>
                                                    <th   scope="col">Name </th>
                                                    <th   scope="col">Age </th>
                                                    <th   scope="col">Gender </th>
                                                    <th   scope="col">Purok</th>
                                                    <th  scope="col">Street </th>
                                                    <th   scope="col">Action </th>
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                <td>p6</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>

                                                </td>
                                                <td  class ="action" scope="col">
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a href  = "view-resident-personal.php?viewid=<?php echo $row->ID;?>" type="button" class="btn btn-primary"><i class = "fa fa-eye me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a type="button" href ="edit-resident-personal.php?editid=<?php echo $row->ID;?>"class="btn btn-success"><i class = "fa fa-edit me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash me-2"></i>Delete</button>
                                                </div>
                                            </td>
                                                
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                   

                     <div class="tab-pane fade show" id="p7">
                     <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <table class="table bg-white rounded shadow-sm  table-hover ">
                                        <div class="" style= "overflow-x:auto">
                                            <thead>
                                                <tr>
                                                    <th  scope="col">
                                                        Status  </th>
                                                    <th   scope="col">Name </th>
                                                    <th   scope="col">Age </th>
                                                    <th   scope="col">Gender </th>
                                                    <th   scope="col">Purok</th>
                                                    <th  scope="col">Street </th>
                                                    <th   scope="col">Action </th>
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                <td>p7</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>

                                                </td>
                                                <td  class ="action" scope="col">
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a href  = "view-resident-personal.php?viewid=<?php echo $row->ID;?>" type="button" class="btn btn-primary"><i class = "fa fa-eye me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a type="button" href ="edit-resident-personal.php?editid=<?php echo $row->ID;?>"class="btn btn-success"><i class = "fa fa-edit me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash me-2"></i>Delete</button>
                                                </div>
                                            </td>
                                                
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                   
                    <div class="tab-pane fade show" id="p8">
                    <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <table class="table bg-white rounded shadow-sm  table-hover ">
                                        <div class="" style= "overflow-x:auto">
                                            <thead>
                                                <tr>
                                                    <th  scope="col">
                                                        Status  </th>
                                                    <th   scope="col">Name </th>
                                                    <th   scope="col">Age </th>
                                                    <th   scope="col">Gender </th>
                                                    <th   scope="col">Purok</th>
                                                    <th  scope="col">Street </th>
                                                    <th   scope="col">Action </th>
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                <td>p8</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>

                                                </td>
                                                <td  class ="action" scope="col">
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a href  = "view-resident-personal.php?viewid=<?php echo $row->ID;?>" type="button" class="btn btn-primary"><i class = "fa fa-eye me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a type="button" href ="edit-resident-personal.php?editid=<?php echo $row->ID;?>"class="btn btn-success"><i class = "fa fa-edit me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash me-2"></i>Delete</button>
                                                </div>
                                            </td>
                                                
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    
                    <div class="tab-pane fade show" id="p9">
                    <div class="container-fluid " style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <table class="table bg-white rounded shadow-sm  table-hover ">
                                        <div class="" style= "overflow-x:auto">
                                            <thead>
                                                <tr>
                                                    <th  scope="col">
                                                        Status  </th>
                                                    <th   scope="col">Name </th>
                                                    <th   scope="col">Age </th>
                                                    <th   scope="col">Gender </th>
                                                    <th   scope="col">Purok</th>
                                                    <th  scope="col">Street </th>
                                                    <th   scope="col">Action </th>
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                <td>p9</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>

                                                </td>
                                                <td  class ="action" scope="col">
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a href  = "view-resident-personal.php?viewid=<?php echo $row->ID;?>" type="button" class="btn btn-primary"><i class = "fa fa-eye me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a type="button" href ="edit-resident-personal.php?editid=<?php echo $row->ID;?>"class="btn btn-success"><i class = "fa fa-edit me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash me-2"></i>Delete</button>
                                                </div>
                                            </td>
                                                
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                  
                    <div class="tab-pane fade" id="p10">
                    <div class="container-fluid" style= "overflow-x:auto">
                            <div class="row g-1 px-5">
                                <div class="col-xl-12 col-md-12 col-sm-12 ">
                                    <div class="row" >
                                        <table class="table bg-white rounded shadow-sm  table-hover ">
                                        <div class="" style= "overflow-x:auto">
                                            <thead>
                                                <tr>
                                                    <th  scope="col">
                                                        Status  </th>
                                                    <th   scope="col">Name </th>
                                                    <th   scope="col">Age </th>
                                                    <th   scope="col">Gender </th>
                                                    <th   scope="col">Purok</th>
                                                    <th  scope="col">Street </th>
                                                    <th   scope="col">Action </th>
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                <td>p10</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>

                                                </td>
                                                <td  class ="action" scope="col">
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a href  = "view-resident-personal.php?viewid=<?php echo $row->ID;?>" type="button" class="btn btn-primary"><i class = "fa fa-eye me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <a type="button" href ="edit-resident-personal.php?editid=<?php echo $row->ID;?>"class="btn btn-success"><i class = "fa fa-edit me-2"></i>Edit</a>
                                                </div>
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                    <button type="button" href= "#delete" data-bs-toggle= "modal" role= "button" class="btn btn-danger"> <i class = "fa fa-trash me-2"></i>Delete</button>
                                                </div>
                                            </td>
                                                
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                  
                </div>





            
        <div class="modal fade" id = "delete" tab-idndex = "-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content g-0 bg-danger ">
                        <div class="modal-header bg-danger white ">
                            <h5 class="modal-title" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                            
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
                                    <button type = "button" class="btn btn-success rounded-circle" data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                        <i class= 'fa fa-check '></i>
                                    </button>
                                    <button type = "button" class="btn btn-danger rounded-circle" data-bs-dismiss = "modal"  name = "no" value ="No">
                                        <i class= "fa fa-times"></i>
                                    </button>
                                </form>
                            </div>
                    
                        </div>
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                </div>
            </div>

        


        
    </body>
    </html>
    <?php }  ?>