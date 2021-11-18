 <div class="sidebar-menu">
    <header class="logo">
        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="dashboard.php"> <span id="logo"> <h1>#<?php
$uid=$_SESSION['clientmsuid']; echo $uid;?></h1></span> 
            <!--<img id="logo" src="" alt="Logo"/>--> 
        </a> 
    </header>
    <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
    <!--/down-->
    <div class="down">
    <?php
$uid=$_SESSION['clientmsuid'];
$sql="SELECT LastName, FirstName, MiddleName from  tblresident where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>  
        <a href="dashboard.php"><img src="images/images.jpg" height="100" width="100"></a>
        <a href="dashboard.php"><span class=" name-caret"><?php  echo $row->LastName;?>, <?php  echo $row->FirstName;?> <?php  echo $row->MiddleName;?></span></a>
        <?php $cnt=$cnt+1;}} ?>
        <ul>
            <li><a class="tooltips" href="client-profile.php"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
            <li><a class="tooltips" href="change-password.php"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
            <li><a class="tooltips" href="logout.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
        </ul>
    </div>
    <!--//down-->
    <div class="menu">
        <ul id="menu" >
            <li><a href="dashboard.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>

            
            <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span>Announcement</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="current-announcement.php">Current Announcement</a></li>
                    <li id="menu-academico-boletim" ><a href="announcement-list.php">Announcement History</a></li>
                </ul>
            </li>

           
            <li><a href="official-list.php"><i class="fa fa-user"></i> <span>Officials</span></a></li>
			
			<li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span>Request</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="certificate-request.php">Certification Request</a></li>
                    <li id="menu-academico-boletim" ><a href="blotter-request.php">Blotter Request</a></li>
					<li id="menu-academico-boletim" ><a href="rental-request.php">Rental Request</a></li>
                   
                </ul>
            </li>

           
            <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span>Record</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="manage-certificate.php">Certification Record</a></li>
                    <li id="menu-academico-boletim" ><a href="manage-blotter.php">Blotter Record</a></li>
					<li id="menu-academico-boletim" ><a href="manage-rental.php">Rental Record</a></li>
                   
                </ul>
            </li>
         
        </ul>
    </div>
</div>