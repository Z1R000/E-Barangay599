 <div class="sidebar-menu">
    <header class="logo">
        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="dashboard.php"> <span id="logo"> <h1>#<?php $id=$_SESSION['clientmsaid']; echo $id; ?></h1></span> 
            <!--<img id="logo" src="" alt="Logo"/>--> 
        </a> 
    </header>
    <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
    <!--/down-->
    <div class="down">  
        <?php
$aid=$_SESSION['clientmsaid'];
$sql="SELECT distinct tbladmin.ID, tbladmin.BarangayPosition, tblresident.LastName, tblresident.FirstName, tblresident.MiddleName from  tbladmin join tblresident where tbladmin.ID=:aid AND tbladmin.ID = tblresident.ID";
$query = $dbh -> prepare($sql);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
        <a href="dashboard.php"><img src="https://img.pngio.com/profile-icon-png-image-free-download-searchpngcom-profile-icon-png-673_673.png" height="70" width="70"></a>
        <a href="dashboard.php"><span class=" name-caret"><?php  echo $row->LastName;?>, <?php  echo $row->FirstName;?> <?php  echo $row->MiddleName;?></span><span class=" name-caret" style="font-size:95%; font-style: italic;"><?php  echo $row->BarangayPosition;?></span></a>
        
        <?php $cnt=$cnt+1;}} ?>
        <ul>
            <li><a class="tooltips" href="admin-profile.php"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
            <li><a class="tooltips" href="change-password.php"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
            <li><a class="tooltips" href="logout.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
        </ul>
    </div>
    <!--//down-->
    <div class="menu">
        <ul id="menu" >
            <li><a href="dashboard.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
			<li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span>Announcement</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="announcement.php">Post Announcement</a></li>
                    <li id="menu-academico-boletim" ><a href="announcement-list.php">Prev. Announcement</a></li>
                   
                </ul>
            </li>
            <li id="menu-academico" ><a href="#"><i class="fa fa-user"></i> <span>Officials</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="add-official.php"> Add Officials</a></li>
                    <li id="menu-academico-boletim" ><a href="manage-official.php">Official List</a></li>
                   
                </ul>
            </li>
			<li id="menu-academico" ><a href="#"><i class="fa fa-user"></i> <span>Residents</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="add-client.php"> Add Residents</a></li>
                    <li id="menu-academico-boletim" ><a href="manage-client.php">Residents List</a></li>
                   
                </ul>
            </li>
			<li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span> Certificate</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="create-certificate.php">Create Certificate</a></li>
                    <li id="menu-academico-boletim" ><a href="search-certificate.php">Certification Record</a></li>
                   
                </ul>
            </li>

            <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> Rentals</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="create-rental.php">Create Rental</a></li>
                    <li id="menu-academico-boletim" ><a href="search-rental.php">Rental Record</a></li>
                   
                </ul>
            </li>
			
			<li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span> Blotter</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="create-blotter.php">Create Blotter</a></li>
                    <li id="menu-academico-boletim" ><a href="search-blotter.php">Blotter Record</a></li>
                   
                </ul>
            </li>
			<li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span> Request</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="blotter-request.php">Blotter Request</a></li>
                    <li id="menu-academico-boletim" ><a href="certificate-request.php">Certification Request</a></li>
					<li id="menu-academico-boletim" ><a href="rental-request.php">Rental Request</a></li>
                   
                </ul>
            </li>
            <li><a href="login-audit.php"><i class="fa fa-user"></i> <span>Login Audits</span></a></li>
            
      
        </ul>
		
    </div>
</div>