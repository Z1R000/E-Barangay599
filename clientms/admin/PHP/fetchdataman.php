<?php
//fetchdataman.php
include('includes/dbconnection.php');
if(isset($_POST["action"]))
{
 $output = '';
 if($_POST["action"] == "prk")
 {
  $query = "SELECT * FROM tblstreet WHERE Purok = '".$_POST["query"]."'";
  $check = $_POST["query"];
  $result = mysqli_query($con, $query);
  $output .= '<option value="" selected disabled>--Street--</option>';
  while($row = mysqli_fetch_array($result))
  {
      $tcheck = $row["Purok"];
      if ($check == $tcheck){
        $output .= '<option value="'.$row["streetName"].'" selected>'.$row["streetName"].'</option>';
      }else{
        $output .= '<option value="'.$row["streetName"].'">'.$row["streetName"].'</option>';
      }
   
  }
 }
 echo $output;
}
?>
