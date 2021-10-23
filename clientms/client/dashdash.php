<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } 
     ?>
<!DOCTYPE html>
<html lang="en">
<body>
<div class='container-fluid px-4 mb-3'>
						<?php 
							$sql ="SELECT distinct tblannouncement.ID, tblannouncement.announcement, tblannouncement.announcementDate, tblannouncement.endDate, tblannouncement.adminID, tbladmin.BarangayPosition, tblresident.LastName from tblannouncement join tbladmin on tblannouncement.adminID = tbladmin.ID join tblresident on tbladmin.ID = tblresident.ID order by tblannouncement.ID desc";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$cnt = 0;
							if($query->rowCount() > 0){
								$cnt = 1;
								foreach($results as $row)
								{ 
									
									echo "
									<div class = 'mb-3 table-responsive' style='background-color:aliceblue;border:1px solid black;  border-radius:4px; overflow: hidden;'>
									<h1 style='float: left; margin:25px;    color: #021f4e;'>Announcement</h1>";
									$sDate = $row->announcementDate;
									$eDate = $row->endDate;
								

								?>
								<h4 style="float: right; font-family: Segoe UI; margin: 25px; color: #021f4e; text-align: justify;">
									For <?php  echo date('l, j F Y - h:i A', strtotime($sDate));?> <br> To <?php  echo date('l, j F Y - h:i A', strtotime($eDate));?>
								</h4>
								<br><br><br>
								<div class="testulit" style="border-radius: 25px; ">
									<h5 style="text-align: justify; margin:25px; text-indent: 5%;"><?php  echo $row->announcement;?> </h5>
								</div>
								<h3 style="margin: 25px; color: #021f4e;">Announced By:</h3>
								<h2 style="margin: 25px; color: #021f4e;"><?php  echo $row->BarangayPosition;?> <?php  echo $row->LastName;
								echo "</h2></div>";    
								}
							}
							if ($cnt = 0){
								echo "<div class = 'mb-3 table-responsive' style='background-color:aliceblue;border:1px solid black;  border-radius:4px; overflow: hidden;'>
                                <h1 style='text-align: center; margin:25px;    color: #021f4e;'>No Announcement</h1>'</div>";
							}
							
                        
                        ?>
                       </div>
</body>
</html>