


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
    }
    .custom-container {
      font-family:'arial';
      margin: auto;
      width:8.5in;
      max-height: 11in;
      padding: .8cm;
      border:1px solid #d3d3d3;
      
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
      text-indent: 50px;
    }
    .blue{
      border-bottom: 3px solid #0f162e;
    }
    
  </style>
</head>
<body>
  <main class="py-5">
    <div class="container justify-content-start">
        <a href="#" onclick= 'history.back();' class="link-primary"><i class= "fas fa-arrow-left me-2"></i>Go back</a>
        
    </div>
    <div class="container d-flex justify-content-center mb-3">
      <button class="btn btn-primary" onclick="window.print()"><i class= "fa fa-print me-3"></i>Print</strongutton>
    </div>

    <section class="custom-container print-container bg-white">
      <!-- header -->
      <header class="row pb-4 blue ">

        <div class="row mx-2 g-0">
            <div class="col-3 justify-content-center">
                <img src="../images/Barangay.png" style ="width: 150px" >
            </div>
            <div class="col-6 text-center ">
                <h5>BARANGAY 599, ZONE 59, DISTRICT VI</h5>
                <h5>OFFICE OF THE SANGGUNIANG BARANGAY</h5>
                <h6>#4745 Peralta St. V. Mapa Sta. Mesa, Manila
                </h6>
            </div>

            <div class="col-3">
                <img src="../images/Maynila.png" style ="width: 150px" >
            </div>
        </div>


       

      </header>
      <!-- header -->

      <!-- body -->
      <div class="row" style="min-height: 850px;">
        
        <aside class="col position-relative border" style = "padding: 1.8%;">
          <h2 class="text-center"><b>Blotter Report</b></h2>
          <div class="text-center"></div>
       
          <div class="text-center fs-5"><b></b></div>
          <div class="text-center text-muted"></div>
      
          <div class= "text-center fs-5"><b></b></div>
        
          <div class = "text-center text-muted"></div>

          <div class="my-1 mt-5">
          <div class="my-1">
              <!--Supply initially with description in db-->
            <table>
                <tr>
                    <td>Complainant Name:</td>
                    <th>--Supplied Name of complainant--</th>
                </tr>
                <tr>
                    <td>Incident type:</td>
                    <th>--Supplied type of incident--</th>
                </tr>
                <tr>
                    <td>Incident date & time:</td>
                    <th>--Supplied date and time of incident--</th>
                </tr>
                <tr>
                    <td>Summary of complainant</td>
                   
                </tr>
                <tr>
                    <td>
                     <p align = "justify" id = "indent">-----supplied summary here----</p>
                    </td>
                </tr>
            
            </table>                

            
              
              </p>

          
            </div>
            
          </div>
         <div class = "row w-100">
              <div class= "col">
                <div class="float-end">
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
                        Chairman Name
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
                      Responded by: 
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
                       --Supplied Respondent name--
                    </td>
                  </tr>
                  <tr>
                    <td class = "text-muted mb-2">
                      Kagawad
                    </td>
                  </tr>
                  <tr>
                      <td> </td>
                      <td> </td>
                      <td> </td>
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
              <b>blotter id 015-22</b><!--supply with blotter id-->
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