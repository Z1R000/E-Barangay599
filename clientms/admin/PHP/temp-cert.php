<?php
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
      header('location:logout.php');
      } else{
        $vid=intval($_GET['viewid']);
        
           
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/cert.css">
  <title></title>
  <style>
    html,body {

      height: 100%;
      font-family:'arial';
      font-size: 17px;
    }
    .custom-container {
      font-family:'arial';
      margin: auto;
      width:8in;
      height: 10in;
      padding: .5cm 1cm;  

      
    }
    header .fs-5 {
      letter-spacing: 3px;
    }
    aside strong {
      text-transform: uppercase;
      padding:0 8px
    }
    .line {
      position:absolute;
      bottom: 130px;
      right:50px
    }
    .line span {
      width:100px;
      border-top: 1px solid #000;
      padding:0 80px;
    }
    .note span {
  
      border-bottom: 1px solid #333;
    }
    .form-check-input {

      box-shadow:none;
      padding:8px;
      margin-right:5px
    }
    .form-check-input:checked {
      background-color: #222;
      border: 1px solid #ddd;
      box-shadow:none;
    }
    @media print{
      body * {
        visibility: hidden;
      }
      .print-container , .print-container * {
        visibility: visible;
      }
      .print-container {
        border:0;
        padding:1cm;
        position:absolute;
        top:0;
      }
    }
    #post{
      color: red;
    }
    .left ul li{
      font-size: 18px;
      margin-bottom: 20px;
      list-style-type: none;

    }
    #indent{
      text-indent: 25px;
    }
    .blue{
      border-bottom: 3px solid #0f162e;
    }
    .bottom{
      position: absolute;
      bottom:0px;
    }
  </style>
</head>
<body>
  <main class="py-5">
    <div class="container justify-content-start">
        <a href="edit-cert-record.php?editid=<?php echo $vid; ?>" class="link-primary"><i class= "fas fa-arrow-left me-2"></i>Go back</a>
        
    </div>
    <div class="container d-flex justify-content-center mb-3">
      <button class="btn btn-primary" onclick="window.print()"><i class= "fa fa-print me-3"></i>Print</strongutton>
    </div>

    <section class="custom-container   print-container bg-white">
      <!-- header -->
      <header class="row pb-4 blue ">
      <?php
              $sql1 = "select * from tblinformation";
              $query1 = $dbh->prepare($sql1);
              $query1->execute();
              $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
              
                  foreach ($results1 as $row1) {
        ?>
                  

        <div class="row  g-0">
            <div class="col-3 justify-content-center">
                <img src="../<?php echo $row1->Blogoone ?>" style ="width: 150px" >
            </div>
            
            <div class="col-6 text-center ">
                <h4><?php echo $row1->Baddress ?></h4>
                <h4><?php echo $row1->Btitle ?></h4>
                <h6><?php echo $row1->bFullAdd ?>
                </h6>
                <h6><?php echo $row1->bContact ?>
                </h6>
            </div>

            <div class="col-3">
                <img src="../<?php echo $row1->Blogotwo ?>" style ="width: 150px" >
            </div>
        </div>
      <?php } ?>
                     

      </header>
      <!-- header -->

      <!-- body -->
      
      <div class="row g-4" style="min-height: 11in;">
      
        <div class="col-4 border pt-3  mx-auto left text-center text-uppercase">
            <div class="row">
              <ul class= "mt-3 ">
                <li class= "fs-6 fw-bold" id="post">
                  Punong Barangay
                </li>
                <li class= "fs-6 ">
                <?php 
        $sql = "SELECT tbladmin.*, tblresident.* from tbladmin JOIN tblresident on tbladmin.residentID=tblresident.ID WHERE tbladmin.BarangayPosition = '1'";
        $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $ac = "";
                    foreach ($results as $row) {
                      $mid = explode(" ", "$row->MiddleName");
                      foreach($mid as $m){
                        $ac .= $m[0];
                      }
                      $complete = "$row->FirstName $ac. $row->LastName $row->Suffix";
                      $up = strtoupper($complete);
                      
                      echo "$up";
                    }
      ?>

                </li>
                
            </ul>
            <p class= "fs-6 fw-bold" id="post">Kagawad</p>
            <table class= "px-2 " style="width: 15%; float: left;">
                            <tr>
              <td class= "fs-6" style= "padding-top:30px;padding-right: 10px;">K</td>
              </tr>
              <tr>
                <td class= "fs-6" style= "padding-top:30px;padding-right: 10px;">A</td>
              </tr>
              <tr>
              <td class= "fs-6" style= "padding-top:30px; padding-right: 10px;">G</td>
              </tr>
              <tr>
              <td class= "fs-6" style= "padding-top:30px; padding-right: 10px;">A</td>
              </tr>
              <tr>
              <td class= "fs-6" style= "padding-top:30px; padding-right: 10px;">W</td>
              </tr>
              <tr>
              <td class= "fs-6" style= "padding-top:30px; padding-right: 10px;">A</td>
              </tr>
              <tr>
              <td class= "fs-6" style= "padding-top:30px; padding-right: 10px;">D</td>
              </tr>               
            </table>
            
            <table class= "px-2 " style="width: 85%; float: right;">
            <?php 
               $sql = "SELECT tbladmin.*, tblresident.* from tbladmin JOIN tblresident on tbladmin.residentID=tblresident.ID WHERE tbladmin.BarangayPosition = '4'";
               $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    
                    foreach ($results as $row) {
                      $ac = "";
                      $mid = explode(" ", "$row->MiddleName");
                      foreach($mid as $m){
                        $ac .= $m[0];
                      }
                      $complete = "$row->FirstName $ac. $row->LastName $row->Suffix";
                      $up = strtoupper($complete);
                      
                      echo "<tr><td class= 'fs-6' style= 'padding-top:30px;padding-right: 10px;'> $up </td>
                      </tr>";
                    }
              ?>
                          </table> 
             
            <ul class= "mt-4 blue">
                <li class= "fs-6 fw-bold" id="post">
                  SK CHAIRMAN
                </li>
                <li class= "fs-6 mb-4">
                <?php 
        $sql = "SELECT tbladmin.*, tblresident.* from tbladmin JOIN tblresident on tbladmin.residentID=tblresident.ID WHERE tbladmin.BarangayPosition = '5'";
        $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $ac = "";
                    foreach ($results as $row) {
                      $mid = explode(" ", "$row->MiddleName");
                      foreach($mid as $m){
                        $ac .= $m[0];
                      }
                      $complete = "$row->FirstName $ac. $row->LastName $row->Suffix";
                      $up = strtoupper($complete);
                      
                      echo "$up";
                    }
      ?>
                </li>
            </ul>

            <ul class= "">
                <li class= "fs-6 fw-bold" id="post">
                  SECRETARY
                </li>
                <li class= "fs-6 ">
                <?php 
        $sql = "SELECT tbladmin.*, tblresident.* from tbladmin JOIN tblresident on tbladmin.residentID=tblresident.ID WHERE tbladmin.BarangayPosition = '2'";
        $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $ac = "";
                    foreach ($results as $row) {
                      $mid = explode(" ", "$row->MiddleName");
                      foreach($mid as $m){
                        $ac .= $m[0];
                      }
                      $complete = "$row->FirstName $ac. $row->LastName $row->Suffix";
                      $up = strtoupper($complete);
                      
                      echo "$up";
                    }
      ?>
                </li>
                <li class= "fs-6 fw-bold" id="post">
                  Treasurer
                </li>
                <li class= "fs-6 ">
                <?php 
        $sql = "SELECT tbladmin.*, tblresident.* from tbladmin JOIN tblresident on tbladmin.residentID=tblresident.ID WHERE tbladmin.BarangayPosition = '3'";
        $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $ac = "";
                    foreach ($results as $row) {
                      $mid = explode(" ", "$row->MiddleName");
                      foreach($mid as $m){
                        $ac .= $m[0];
                      }
                      $complete = "$row->FirstName $ac. $row->LastName $row->Suffix";
                      $up = strtoupper($complete);
                      
                      echo "$up";
                    }
      ?>
                </li>
            </ul>
       
            <h5>
              <i style = "color:#012f4e">NOT VALID WITHOUT SEAL</i>
            </h5>
            </div>
           
        </div>
        <?php 
          $sql = "SELECT tblcertificate.*, tblcreatecertificate.*, tblcreatecertificate.CreationDate as getDate, tblresident.LastName, tblresident.FirstName, tblresident.MiddleName, tblresident.Suffix FROM tblcertificate join tblcreatecertificate on tblcreatecertificate.CertificateId = tblcertificate.ID join tblresident on tblcreatecertificate.Userid = tblresident.ID WHERE tblcreatecertificate.ID = :vid";
          $query = $dbh -> prepare($sql);
          $query->bindParam(':vid',$vid,PDO::PARAM_STR);
          $query->execute();
          $result = $query->fetchAll(PDO::FETCH_OBJ);
          foreach ($result as $row) {
            $gdate = $row->getDate;
            $cdate = date('m/d/Y h:i A', strtotime($gdate));
            $mid = $row->MiddleName;
            foreach($mid as $m){
              $ac .= $m[0];
            }
            $complete = "$row->FirstName $ac. $row->LastName $row->Suffix";
            $upn = strtoupper($complete);
            $upc = "$row->CertificateName";
            $upc = strtoupper($upc);
        ?>
        <aside class="col position-relative border" style = "padding: 1.5%;">
          <h2 class="text-center"><b><?php echo "$row->CertificateName";?></b></h2>
          <div class="text-center"></div>
          <!--supply name of customer--> 
          <div class="text-center fs-5"><b></b></div>
          <div class="text-center text-muted"></div>
          <!--supply with store name by customer-->
          <div class= "text-center fs-5"><b></b></div>
          <!--supply with store address-->
          <div class = "text-center text-muted"></div>

          <div class="my-1">
          <div class="my-1">
              <!--Supply initially with description in db-->
              <p align = "justify" id = "indent">This is to certify that <strong><?php echo "$upn";?></strong> for their <strong><?php echo "$upc";?></strong> </p>
              <p align = "justify" id = "indent"><?php echo $row->content;?></p>


              <p id = "indent">
              Issued this<strong><?php echo $cdate;?></strong>at Barangay 599, Zone 59, District VI Manila.
              </p>
            
            </div>
            
          </div>
          <?php } ?>
         <div class = "row w-100">
              <div class= "col">
                <div class="float-end">
                  <table>
                    <tr>
                      <td>
                        Certified by: 
                        <br>
                      </td>
                    </tr>
                    <tr>
                      <td><br></td>
                    </tr>
                    <tr style="border-bottom: 1px solid black">
      
                    </tr>
                    
                    <tr>
                      <td>
                      <?php 
        $sql = "SELECT tbladmin.*, tblresident.* from tbladmin JOIN tblresident on tbladmin.residentID=tblresident.ID WHERE tbladmin.BarangayPosition = '1'";
        $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $ac = "";
                    foreach ($results as $row) {
                      $mid = explode(" ", "$row->MiddleName");
                      foreach($mid as $m){
                        $ac .= $m[0];
                      }
                      $complete = "$row->FirstName $ac. $row->LastName $row->Suffix";
                      $up = $complete;
                      
                      echo "$up";
                    }
      ?>
                      </td>
                    </tr>
                    <tr>
                      <td class = "text-muted">Punong Barangay</td>
                    </tr>
                  </table><br>
              </div>
          </div>
        </div>
          <div class = "row w-100">
            <div class= "col">
              
              <div class="float-start">
                <table>
                <tr>
                    <td>

                      <br>
                    </td>
                  </tr>
                  <tr>
                    <td><br></td>
                  </tr>
                  <tr style="border-bottom: 1px solid black">
                  </tr>
                  
                  <tr>
                    <td>
                    <?php 
                    $vid=intval($_GET['viewid']);
        $sql2 = "SELECT * from tblcreatecertificate where ID = :vid";
        $query2 = $dbh->prepare($sql2);
        $query2->bindParam(':vid',$vid,PDO::PARAM_STR);
        $query2->execute();
        $result2 = $query2->fetchAll(PDO::FETCH_OBJ);
        foreach ($result2 as $row2) {
          echo $row2->cAdmin;
        }
      ?>
                    </td>
                  </tr>
                  <tr>
                    <td class = "text-muted">
                      Officer on Duty
                    </td>
                  </tr>
                  <tr>

                        
                  </tr>
                  <tr>
                    <td>
                      Prepared by: 
                      <br>
                    </td>
                  </tr>
                  <tr>
                    <td><br></td>
                  </tr>
                  <tr style="border-bottom: 1px solid black">
                  </tr>
                  
                  <tr>
                    <td>
                    <?php 
        $sql = "SELECT tbladmin.*, tblresident.* from tbladmin JOIN tblresident on tbladmin.residentID=tblresident.ID WHERE tbladmin.BarangayPosition = '2'";
        $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $ac = "";
                    foreach ($results as $row) {
                      $mid = explode(" ", "$row->MiddleName");
                      foreach($mid as $m){
                        $ac .= $m[0];
                      }
                      $complete = "$row->FirstName $ac. $row->LastName $row->Suffix";
                      $up = $complete;
                      
                      echo "$up";
                    }
      ?>
                    </td>
                  </tr>
                  <tr>
                    <td class = "text-muted">
                      Barangay Secretary
                    </td>
                  </tr>
                </table><br>
            </div>
        </div>
        <div class="container">
          <div class="col">
            <div class="float-end">
              <b>bcn 015-22</b><!--supply with bcn-->
            </div>
          </div>
        </div>
        
        <div class = "row w-100  mx-2 my-3">
          <div class = "col bottom" style  = "margin: auto">
            <h5 align = "center" id = "post"><b><i>"Serbisyong Totoo at tapat Barangay Aasenso"</i></b></h5>
          </div>
        </div>       
            
        </aside>
        

      </div>
      <!-- body -->

    </section>
    
  </main>
</strongody>
</html>
<?php } ?>