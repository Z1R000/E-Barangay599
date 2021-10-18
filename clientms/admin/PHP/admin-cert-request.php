<?php 
    $curr ="Certification Requests";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curr;?></title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <link rel = "stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../CSS/scrollbar.css">

	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
        table,td,tr,th{
            border: 1px solid #d3d3d3;
            text-align: left;
            font-size: 1em;
            padding: 100px;
            font-family: 'Noto Sans Display', sans-serif;
            
        }
        
        td{
            vertical-align: middle;
     
        }
        .btng{
            width: 100px;
        }
        .black{
          color: black;
        }
        .btnx{
          width: 150px;
        }

        #frame { 
          width: 850px; 
          height: 650px; 
          border: 1px solid black; 
        }
        #frame { 
          zoom: -100%;
          -webkit-transform:scale(0.76);
        
          -ms-transform: scale(0.75);
          -moz-transform: scale(0.75);
          -o-transform: scale(0.75);
          -webkit-transform: scale(0.75);
          transform: scale(0.75);

          -ms-transform-origin: 0 0;
          -moz-transform-origin: 0 0;
          -o-transform-origin: 0 0;
          -webkit-transform-origin: 0 0;
          transform-origin: 0 0;*/
        }
        
     
 
   
    
        @media screen and (-webkit-min-device-pixel-ratio:0) {
          #scaled-frame {
            zoom: 1;
          }
        }

        @media (max-width: 576px){
            .btnx{
              margin-bottom: 10px;
            }
          
            .row {
                overflow-x: auto;
            }
            .dis{
                font-size: 15px;
            }
            .ser{
                width: 100%;
            }
            .sepa{
              overflow-x: auto;
            }
           
           
        }
        .red{
            background:#8B0000;
            border: 1px solid #8B0000;
        }
        .white{
            color: white;
        }
    


            .sidebar li .submenu{ 
                list-style: none; 
                margin: 0; 
                padding: 0; 
                padding-left: 1rem; 
                padding-right: 1rem;
            }

          
                
    </style>
</head>
<body>
    <?php 
        include ('../includes/sidebar.php');
    ?> 
     <!--breadcrumb-->
     <div class="d-flex align-items-center">
                <div class="container  mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a  class= "text-decoration-none text-muted" href=""></a><i class="fa fa-book text-muted"></i>&nbsp;Requests</li>
                               
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-exclamation-circle  text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid p-3 ">
        <div class="row g-0 px-5 ">
        <div class="row g-0">
            <div class="row gx-4 gy-2 ">
                <div class="mx-auto col-xl-12 ">
                    <div class="row g-0  rounded-top border white border-start border-end border-bottom border-secondary" style= "background: #021f4e">
                        <div class="col-xl-5  px-2  ">
                            <div class="row ">
                                <h5 class="flex-sm-fill  text-sm-left nav-link  " aria-current="page" >
                                    <i class= "fa fa-exclamation-circle me-2"></i>Certification Request</h5>
                            </div>
        

                        </div>
                        
                    </div>
                    <div class="row g-0 border bg-white border-start border-end border-bottom border-secondary" >
                      

                        <div class = "row py-2 g-0 px-3">
                            <div class="col-md-8 px-1">
                              
                            </div>
                            <div class="col-md-4  px-2" >
                                <div class="d-flex">
                            
                                <input type="text" name ="searchCert" placeholder = "Search Record" class="form-control">
                                <button class= "btn btn-outline-info mx-1 my-1"><i class= "fa fa-search"></i></button>

                                </div>
                        
                            
                            </div>
                            
                        </div>
                        <div class="row g-0">
                            <div class="col-xl-11 mx-2  mx-auto py-3  px-2">
                                    <table class="table bg-white table-hover "> 
                                        <thead class = "bg-light">
                                            <tr>
                                           
                                            </tr>
                                            <tr>
                

                                                <th style = "text-align: left">Requestor Name</th>
                                                <th style = "text-align: left">Requested Certificate</th>
                                                <th style = "text-align: left">Certification Fee</th>
                                                <th style = "text-align: left">Purpose </th>
                                                <th style = "text-align: left">Business Name </th>
                                                <th style = "text-align: left">Date </th>
                                                <th style = "text-align: center">Actions</th>
                                                
                                                
                                    
                                            </tr>
                                        
                                        </thead>           
                                        <tbody class= "table-hover">
                                            <tr>
                  
                                                <td scope="col" style = "text-align: left"><a href = "#">Mang Berting</a></td>
                                                <td scope="col" style = "text-align: left">Indigency</td>
                                         
                            
                                                
                                                <td scope="col" style = "text-align: left">0.00</td>
                                                <td scope="col" style = "text-align: left">Employment</td>
                                                <td scope="col" style = "text-align: left">N/a</td>
                                                <td scope="col" style = "text-align: left">10-19-2021</td>
                                                <td scope="col" style = "text-align: center">
                                                       
                                                    
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <button href ="#approve-req"class="btn btng btn-success" data-bs-toggle = "modal"><i class = "fa fa-check"></i>
                                                            Accept</button>
                                                        </div>
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="button" href ="#decline-req" data-bs-toggle = "modal" role = "button" class="btn btng btn-danger"><i class = "fa fa-times-circle me-2"></i>Decline</a>
                                                        </div>
                                                    
                                                </td>
                                            </tr>
                                              <tr>
                  
                                                <td scope="col" style = "text-align: left"><a href = "#">Bertong Apoy</a></td>
                                                <td scope="col" style = "text-align: left">Business Clearance</td>
                                         
                            
                                                
                                                <td scope="col" style = "text-align: left">0.00</td>
                                                <td scope="col" style = "text-align: left">Business</td>
                                                <td scope="col" style = "text-align: left">Sari sari store ni berto</td>
                                                <td scope="col" style = "text-align: left">10-19-2021</td>
                                                <td scope="col" style = "text-align: center">
                                                       
                                                    
                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <button href ="#approve-req"class="btn btng btn-success" data-bs-toggle = "modal"><i class = "fa fa-check"></i>
                                                            Accept</button>
                                                        </div>
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="button" href ="#decline-req" data-bs-toggle = "modal" role = "button" class="btn btng btn-danger"><i class = "fa fa-times-circle me-2"></i>Decline</a>
                                                        </div>
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>                        
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>


        </div>

    </div>
    <?php include('accept-request.php');?>
 
</body>
</html>