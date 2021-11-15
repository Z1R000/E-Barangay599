<?php

require_once('includes/dbconnection.php');

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sqlcc = 'SELECT * FROM tblresident WHERE FirstName LIKE :country OR MiddleName LIKE :country OR LastName LIKE :country OR Suffix LIKE :country';
    $stmt = $dbh->prepare($sqlcc);
    $stmt->execute(['country' => '%' . $inpText . '%']);
    $resultcc = $stmt->fetchAll();
    if ($resultcc) {
      foreach ($resultcc as $rowcc) {
        
        echo "<a  id='clicker' class='list-group-item list-group-item-action border-1'>";
        echo $rowcc['ID']." ".$rowcc['LastName'] . ' ';
        echo $rowcc['FirstName'] . ' ';
		    echo $rowcc['MiddleName'] . ' ';
        echo $rowcc['Suffix'];
		    echo "</a>";
        
    
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  
}
#searchname.php
?>