<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsuid']==0)) {
  header('location:logout.php');
  } 
     ?>
<!DOCTYPE html>
<link rel="stylesheet" href="css/sidebar.css" />
<html lang="en">
<body>
<div class='container-fluid px-4 mb-3'>
    <label></label>
<?php 
							$sql ="SELECT distinct tblannouncement.ID, tblannouncement.announcement, tblannouncement.announcementDate, tblannouncement.endDate, tblannouncement.adminID, tbladmin.BarangayPosition, tblresident.LastName from tblannouncement join tbladmin on tblannouncement.adminID = tbladmin.ID join tblresident on tbladmin.ID = tblresident.ID where tblannouncement.announcementDate <= now() and tblannouncement.endDate >= now() order by tblannouncement.ID desc";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							foreach($results as $row)
							{ 
                                
                                echo "
                                <div class = 'mb-3 table-responsive' style='background-color:aliceblue;border:1px solid black;  border-radius:4px; overflow: hidden;'>
                                <h1 class='h1font' style='float: left; margin:25px; font-family:Segoe UI;   color: #021f4e;'>Latest Announcement</h1>";
								$sDate = $row->announcementDate;
								$eDate = $row->endDate;
                            

						?>
                        <h4 class="testfont" style="float: right; font-family: Segoe UI; margin: 25px; color: #021f4e; text-align: justify;">
                            <?php  echo date('l, j F Y - h:i A', strtotime($sDate));?> <br>
                        </h4>
                        <br><br><br><br><br>
                        <div class="testulit" style="border-radius: 25px; ">
                            <h5 class="testfont" style="text-align: justify; font-family: Segoe UI; margin:25px; text-indent: 5%;"><?php  echo $row->announcement;?> </h5>
                        </div>
                        <h3 class="testfont" style="margin: 25px; font-family: Segoe UI; color: #021f4e;">Announced By:</h3>
                        <h2 class="testfont" style="margin: 25px; font-family: Segoe UI;color: #021f4e;"><?php  echo $row->BarangayPosition;?> <?php  echo $row->LastName;
                        echo "</h2></div>";    
                        }
                        
                        ?>
                       </div>