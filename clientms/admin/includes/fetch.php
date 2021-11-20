<?php
//fetch.php;
if(isset($_POST["view"])){
	
	include('includes/dbconnection.php');
	if($_POST["view"] != ''){
		mysqli_query($con,"update tbladminnotif set seen_status='1' where seen_status='0'");
	}
	
	$query=mysqli_query($con,"select * from tbladminnotif order by ID desc limit 10");
	$output = '';
 
	if(mysqli_num_rows($query) > 0){
	while($row = mysqli_fetch_array($query)){
        $getdate = $row['creationDate'];
        $getdate = date('F j, Y - h:i A', strtotime($cdate));
	$output .= '
	<li>
		<a href="../PHP/admin-registrations.php">
		Message: <strong>'.$row['message'].'</strong><br />
		Date: <strong>'.$getdate.'</strong>
		</a>
	</li>
	
	';
	}
	}
	else{
	$output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
	}
	
	$query1=mysqli_query($conn,"select * from tbladminnotif where seen_status='0'");
	$count = mysqli_num_rows($query1);
	$data = array(
		'notification'   => $output,
		'unseen_notification' => $count
	);
	echo json_encode($data);
	
}
?>