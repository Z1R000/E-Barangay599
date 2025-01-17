<?php
$sql = "Select reslogo from tblinformation";
$query = $dbh->prepare($sql);
$query-> execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);



?>
<div style="background-color: #021f4e;" id="sidebar-wrapper">


    <div class="sidebar-heading text-center py-2 second-text fs-5 fw-bold border-bottom">
    <?php
    $logo= "";
    foreach ($results as $r){
        $logo= $r->reslogo;
    }
    
    
    
    ?>
        <br>Barangay 599 <br>E-barangay<br>
        <img src="<?php echo $logo; ?>" class="py-1" style="width: 60px;"><br>



        <div role="group">
            <br>
            <a href="client-profile.php"><i class="fas fa-user fs-3" title="Profile"></i></a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="change-password.php"><i class="fas fa-cog fs-3" title="Change Password"></i></a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href=""><i class="fas fa-bell fs-3" title="Notifications"></i></a>
            
        </div>
        <br>
        <div class="btn-group my-2" role="group" aria-label="Basic example">
            <a href="index.php" type=" button" class="btn border-danger link-danger fs-6"><i class="fa fa-power-off"></i>&nbsp;Logout </a>
        </div>


    </div>


    <nav class="sidebar py-2 mb-4">

        <ul class="nav flex-column" id="nav_accordion">

            <li class="nav-item">
                <a href="dashboard.php" class="list-group-item  list-group-item-action bg-transparent second-text active fs-6"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
            </li>

            <li class="nav-item has-submenu">
                <a href="announcement-list.php" class="list-group-item  list-group-item-action bg-transparent second-text active fs-6"><i class="fas fa-paperclip my-0 me-2"></i>Announcement List</a>

            </li>
            <li class="nav-item">
                <a href="official-list.php" class="list-group-item  list-group-item-action bg-transparent second-text active fs-6"><i class="fas fa-user-friends"></i> Officials</a>
            </li>
            <li class="nav-item has-submenu">
                <a href="#" class="list-group-item list-group-item-action dropdown-toggle bg-transparent second-text fw-bold nav-link fs-6">
                    <i class="fas fa-book my-0 me-2"></i>Request</a>
                <ul class="submenu collapse">
                    <li><a class="nav-link" href="certificate-request.php">Certificate Request </a></li>
                    <li><a class="nav-link" href="rental-request.php">Rental Request</a></li>
                </ul>
            </li>
            <li class="nav-item has-submenu">
                <a href="#" class="list-group-item list-group-item-action dropdown-toggle bg-transparent second-text fw-bold nav-link fs-6">
                    <i class="fas fa-book my-0 me-2"></i>Record</a>
                <ul class="submenu collapse">
                    <li><a class="nav-link" href="manage-certificate.php">Certification Record </a></li>
                    <li><a class="nav-link" href="manage-rental.php">Rental Record</a></li>

                </ul>
            </li>
        </ul>
    </nav>
</div>