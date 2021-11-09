<?php
//fetchdata.php
if(isset($_POST["action"]))
{
 $con = mysqli_connect("localhost", "root", "", "clientmsdb");
 $output = '';
 if($_POST["action"] == "ctype")
 {
  $query = "SELECT CertificatePrice FROM tblcertificate WHERE CertificateName = '".$_POST["query"]."'";
  $result = mysqli_query($con, $query);
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["CertificatePrice"].'" selected disabled>'.$row["CertificatePrice"].'</option>';
  }
 }
 echo $output;
}




if(isset($_POST["action"]))
{
 $con = mysqli_connect("localhost", "root", "", "clientmsdb");
 $output = '';
 if($_POST["action"] == "rtype")
 {
  $query = "SELECT rentalPrice FROM tblrental WHERE ID = '".$_POST["query"]."'";
  $result = mysqli_query($con, $query);
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["rentalPrice"].'" selected disabled>'.$row["rentalPrice"].'</option>';
  }
 }
 echo $output;
}
?>
