<?php
    $content = "";
    $name = "";
    if (!isset($_POST['cert-info'])){
        $content = "----Supply Text  here---";
    }

    else{
      $content  = $_POST['cert-info'];
    }

    if (!isset($_POST['cname'])){
      $name = "Certification  Name";

    }
    else{
      $name =$_POST['cname'];
    }
   
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
  <title>business Clearance</title>
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
  

    <section class="custom-container   print-container bg-white">
      <!-- header -->
      <header class="row pb-4 blue ">

        <div class="row  g-0">
            <div class="col-3 justify-content-center">
                <img src="../images/Barangay.png" style ="width: 150px" >
            </div>
            <div class="col-6 text-center ">
                <h4>BARANGAY 599, ZONE 59, DISTRICT VI</h4>
                <h4>OFFICE OF THE SANGGUNIANG BARANGAY</h4>
                <h6>#4745 Peralta St. V. Mapa Sta. Mesa, Manila
                </h6>
                <h6>Barangay Contact Number
                </h6>
            </div>

            <div class="col-3">
                <img src="../images/Maynila.png" style ="width: 150px" >
            </div>
        </div>


       

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
                  JOSE MILO L. LACATAN

                </li>
            </ul>
            <table class= "mt-2 px-2 ">
              <tr>

                <td colspan=2 class= "fs-6 fw-bold  "id = "post">Kagawad</td>
              </tr>
              <tr>
              <td class= "fs-6" style= "padding-top:30px;padding-right: 10px;">K</td>
                <td class= "fs-6 " style= "padding-top:30px;float:left">Erwin L. Sampaga</td>
              </tr>
              <tr>
                <td class= "fs-6" style= "padding-top:30px;padding-right: 10px;">A</td>
                <td class= "fs-6" style= "padding-top:30px;float:left">Alberto P. Ramos</td>
              </tr>
              <tr>
              <td class= "fs-6" style= "padding-top:30px; padding-right: 10px;">G</td>
                <td class= "fs-6" style= "padding-top:30px; float:left">Florante V. Bonagua</td>
              </tr>
              <tr>
              <td class= "fs-6" style= "padding-top:30px; padding-right: 10px;">A</td>
                <td class= "fs-6" style= "padding-top:30px;float:left">Crisanto G. Lorica</td>
              </tr>
              <tr>
              <td class= "fs-6" style= "padding-top:30px; padding-right: 10px;">W</td>
                <td class= "fs-6" style= "padding-top:30px; float:left">Alexander S. Ceño</td>
              </tr>
              <tr>
              <td class= "fs-6" style= "padding-top:30px; padding-right: 10px;">A</td>
                <td class= "fs-6" style= "padding-top:30px;float:left">Nelson L. Labrador</td>
              </tr>
              <tr>
              <td class= "fs-6" style= "padding-top:30px; padding-right: 10px;">D</td>
                <td class= "fs-6" style= "padding-top:30px;float:left">Marivic M. Villareal</td>
              </tr>

              
               
            </table>            
            <ul class= "mt-4 blue">
                <li class= "fs-6 fw-bold" id="post">
                  SK CHAIRMAN
                </li>
                <li class= "fs-6 mb-4">
                  MIKO CUSTODIO
                </li>
            </ul>

            <ul class= "">
                <li class= "fs-6 fw-bold" id="post">
                  SECRETARY
                </li>
                <li class= "fs-6 ">
                MARIA CECILIA C. DELA CRUZ
                </li>
                <li class= "fs-6 fw-bold" id="post">
                  Treasurer
                </li>
                <li class= "fs-6 ">
                MELDA G. PADILLA
                </li>
            </ul>
       
            <h5>
              <i style = "color:#012f4e">NOT VALID WITHOUT SEAL</i>
            </h5>
            </div>
           
        </div>
        <aside class="col position-relative border" style = "padding: 1.5%;">
          <h2 class="text-center"><b><?php echo $name?></b></h2>
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
              <p align = "justify" id = "indent">This is to certify that <strong>Requestor Name</strong> for their <strong>certification type</strong> </p>
              <p align = "justify" id = "indent"><?php echo $content;?></p>


              <p id = "indent">
              Issued this <strong>(date)<!--supply date-->)</strong>
                at Barangay 599, Zone 59, District VI Manila.
              </p>
            
            </div>
            
          </div>
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
                        Chairman Name
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
                        Kagawad Name <!--Supply from secretary postions db-->
                    </td>
                  </tr>
                  <tr>
                    <td class = "text-muted">
                      Kagawad on Duty
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
                        Secretary name <!--Supply from secretary postions db-->
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