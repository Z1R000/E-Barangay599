<?php
include('includes/dbconnection.php');
if(isset($_POST["id"]))
{
 $query = "DELETE FROM user WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($con, $query))
 {
  echo 'Data Deleted';
 }
}
?>