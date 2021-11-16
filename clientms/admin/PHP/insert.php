<?php
include('includes/dbconnection.php');
if(isset($_POST["first_name"], $_POST["last_name"]))
{
 $first_name = mysqli_real_escape_string($con, $_POST["first_name"]);
 $last_name = mysqli_real_escape_string($con, $_POST["last_name"]);
 $query = "INSERT INTO user(first_name, last_name) VALUES('$first_name', '$last_name')";
 if(mysqli_query($con, $query))
 {
  echo 'Data Inserted';
 }
}
?>