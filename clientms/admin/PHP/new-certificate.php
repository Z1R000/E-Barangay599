<?php
    $name = "";
    $para= "";
    $store ="";
    $address ="";

    if (isset($_POST['name'])||
        (isset($_POST['para'])||(isset($_POST['store'])))){
        
        $name = $_POST['name'];
        $para = $_POST['para'];
        $store = $_POST['store'];
        $address= $_POST['add'];
    }
  
        


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <title>Certificate Template</title>
  <style>
    html,body {
      height: 100%;
    }
    .custom-container {
      margin: auto;
      width:8.5in;
      max-height: 11in;
      padding: 1cm;
      border:1px solid #d3d3d3;
      font-family:serif;
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
      padding:0 30px;
      border-bottom: 1px solid #333;
    }
    .form-check-input {
      border: 1px solid transparent ;
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
    
  </style>
</head>
<body>
  <main class="py-5">

    <div class="container d-flex justify-content-center mb-3">
      <button class="btn btn-primary" onclick="window.print()"><i class= "fa fa-print me-3"></i>Print</strongutton>
    </div>

    <section class="custom-container print-container">
      <!-- header -->
      <header class="row pb-4">

        <div class="col-2 d-flex justify-content-center align-items-center order-1">
          <img src="../IMAGES/Barangay.png" class="img-fluid">
        </div>

        <div class="col-2 d-flex justify-content-center align-items-center order-3">
          <img src="../IMAGES/Maynila.png" class="img-fluid">
        </div>

        <div class="col-8 d-flex justify-content-center align-items-center order-2 flex-column">
          <div class="text-uppercase mb-0 fs-5 fw-bold">Republic of the Philippines</div>
          <div class="text-uppercase">City of Manila</div>
          <small class="text-muted">
            <p align = "center">Barangay 599, Zone 59, District VI<br>#4745 Peralta St. V.Mapa Sta. Mesa, Manila</p>
          </small>
          <div class="text-uppercase fw-bold">office of the punong barangay</div>
        </div>  

      </header>
      <!-- header -->

      <!-- body -->
      <div class="row" style="min-height: 850px;">
        <div class="col-4 border left" style  = "text-align: center;">
            <ul class = "mt-2">
              <li id = "post">Punong Barangay</li>
              <li>Jose Milo L. Lacatan</li>
            </ul>
            <ul>
              <li id = "post">Kagawad</li>
              <li>Erwin L. Sampaga</li>
              <li>Alberto P. Ramos</li>
              <li>Florante V. Bonagua</li>
              <li>Crisanto G. Lorica</li>
              <li>Alexander S. Ce</li>
              <li>Nelson L. Labrador</li>
              <li>Marivic Villareal</li>              
            </ul>
            <ul style = "border-bottom: 1px solid #ddd;">
              <li id = "post">Sk Chairmana</li>
              <li >Miko Custodio</li>
            </ul>
    
            <ul>
              <li id = "post">Secretary</li>
              <li>Maria Cecilia C. Dela Cruz</li>
            </ul>
            <ul>
              <li id = "post" >Treasure</li>
              <li>Imelda G. Padilla</li>
            </ul>
        </div>
        <aside class="col position-relative border" style = "padding: 1.8%;">
          <h2 class="text-center"><i><b>BUSINESS CLEARANCE</i></b></h2>
          <div class="text-center">This is to certify that</div>
          <!--supply name of customer-->
          <div class="text-center fs-5"><b><?php echo $name?></b></div>
          <div class="text-center text-muted">Is the owner of</div>
          <!--supply with store name by customer-->
          <div class= "text-center fs-5"><b><?php echo $store?></b></div>
          <!--supply with store address-->
          <div class = "text-center text-muted"><?php echo $address?></div>

          <div class="my-1">
            <!--Supply initially with description in db-->
            <p align = "justify" id = "indent"> This further certifies <strong><?php echo $name,"s" ;?></strong><?php echo $address;?><!--supply name of store--></strong><?php echo $para?>
            
            <p align = "justify" id = "indent">This Certification issued upon the request of <strong>Name of owner<!--Supply name--><?php echo $name;?></strong> for the application of business permit, subject to all regulations prescribed by the City Government. This certificaation is valid only for one year from the date of issuance<br>
            </p>

            <p id = "indent">
            Issued this <strong>(date)<!--supply date-->)</strong>
              at Barangay 599, Zone 59, District VI Manila.
            </p>
           
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
                        Jose Milo L. Lacatan <!--name of chairman supply from db-->
                      </td>
                    </tr>
                    <tr>
                      <td class = "text-muted">Barangay Captain</td>
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
                      Maria Cecilia C. Dela Cruz <!--Supply from secretary postions db-->
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
          <div class = "col" style  = "margin: auto">
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