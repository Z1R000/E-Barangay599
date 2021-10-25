<?php

require_once('includes/dbconnection.php');

  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT * FROM tblresident WHERE FirstName LIKE :country OR MiddleName LIKE :country OR LastName LIKE :country OR Suffix LIKE :country';
    $stmt = $dbh->prepare($sql);
    $stmt->execute(['country' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
      foreach ($result as $row) {
        echo '<a href="#" class="list-group-item list-group-item-action border-1">' . $row['FirstName'] . $row['MiddleName'] . $row['LastName'] . $row['Suffix'] . '</a>';
		
      }
    } else {
      echo '<p class="list-group-item border-1">No Record</p>';
    }
  }
?>