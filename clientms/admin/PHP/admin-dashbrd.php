<?php
    $curr = "Dashboard";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/sidebar.css" />
    
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <title>Bootstap 5 Responsive Admin Dashboard</title>
    <script>
        
        document.addEventListener("DOMContentLoaded", function(){
        document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
        element.addEventListener('click', function (e) {
        let nextEl = element.nextElementSibling;
        let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
            }); // addEventListener
        }) // forEach
        }); 
    </script>


    <style type = "text/css">
    @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');


    .sidebar li .submenu{ 
        list-style: none; 
        margin: 0; 
        padding: 0; 
        padding-left: 1rem; 
        padding-right: 1rem;
    }

    h4{
        font-family: 'Acme','sans-serif';
    }
    .text-inner{
        color: white;
    }
    .logo{
        color: #d3d3d3;
    }
    .left{
        margin-right: 1%;
    }
    .minor{
        background: #ff8c00;
    }
    .right{
        margin: 2.5%;
    }
   
    .voters{
        background: #008080;
    }
    @media (max-width:576px){
        .banner{
            display:none;
        }
        .right{
            margin-left: 8%;
        }
    }
    </style>

</head>

<body>
   
    <?php
        include('../includes/sidebar.php');
    ?>
    
           <div class="container-fluid banner " align = "center">
                <div class="row my-2 ">
                    <div class="col-xl-3 px-4 ">
                        <img src = "../images/barangay.png" style ="width: 90px;">
                    </div>
                    <div class="col-xl-6 " align = "center">
                        <h4 >BARANGAY 599, ZONE 59, DISTRICT VI
                            OFFICE OF THE SANGGUNIANG<br> BARANGAY</h4>
                    </div>
                    <div class="col-xl-3 mb-1">
                        
                            <img src = "../images/maynila.png" style ="width: 90px;">
              
                        
                    </div>
                    
                </div>
            </div>
            <div class="container-fluid  right my-2" align  ="center">
                <div class="row g-2 px-1">
                    <div class="row g-3 px-2"  >
                        <div class="row g-3 my-2">
                            <div class="col-md-3 left rounded border shadow-md bg-primary">
                                <div class="row g-3">
                                    <div class="p-3 bg-primary  d-flex justify-content-around align-items-center ">
                                        <div class = "text-inner">
                                            <h4 class="fs-3">2500</h4>
                                            <p class = "text-inner fs-5 card-text " href ="#">Total Residents</p>
                                        </div>
                                            <i class="fas fa-users fs-1 logo  p-4 "></i>
                                            
                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class = "text-inner text-decoration-none" href = "#"> <div class="fs-6">More info&nbsp;<i class = 'fa fa-arrow-circle-right'></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-3 rounded left border shadow-md bg-info">
                                <div class="row g-3">
                                    <div class="p-3 bg-info  d-flex justify-content-around align-items-center ">
                                        <div class = "text-inner">
                                            <h4 class="fs-3">1200</h4>
                                            <p class = "text-inner fs-5 card-text " href ="#">Male Residents</p>
                                        </div>
                                            <i class="fas fa-mars fs-1 logo  p-4 "></i>
                                            

                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class = "text-inner text-decoration-none" href = "#"> <div class="fs-6">More info&nbsp;<i class = 'fa fa-arrow-circle-right'></i></a></div>
                                </div>
                                
                            </div>
                            <div class="col-md-3  rounded border left shadow-md bg-danger">
                                <div class="row g-3">
                                    <div class="p-3 bg-danger  d-flex justify-content-around align-items-center ">
                                        <div class = "text-inner">
                                            <h4 class="fs-3">2500</h4>
                                            <p class = "text-inner fs-5 card-text " href ="#">Female Residents</p>
                                        </div>
                                            <i class="fas fa-venus fs-1 logo  p-4 "></i>
                                            

                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class = "text-inner text-decoration-none" href = "#"> <div class="fs-6">More info&nbsp;<i class = 'fa fa-arrow-circle-right'></i></a></div>
                                </div>
                                
                            </div>
                            
                        </div>
                    
                    </div>
                    <div class="row g-2 px-2"  >
                        <div class="row g-3 my-1">
                            <div class="col-md-3 left rounded border shadow-md bg-warning">
                                <div class="row g-3">
                                    <div class="p-3 bg-warning  d-flex justify-content-around align-items-center ">
                                        <div class = "text-inner">
                                            <h4 class="fs-3">420</h4>
                                            <p class = "text-inner fs-5 card-text " href ="#">Senior Citizens</p>
                                        </div>
                                            <i class="fas fa-blind fs-1 logo  p-4"></i>
                                            
                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class = "text-inner text-decoration-none" href = "#"> <div class="fs-6">More info&nbsp;<i class = 'fa fa-arrow-circle-right'></i></a></div>
                                </div>
                            </div>
                            <div class="col-md-3 rounded left border shadow-md minor">
                                <div class="row g-3">
                                    <div class="p-3 minor d-flex justify-content-around align-items-center ">
                                        <div class = "text-inner">
                                            <h4 class="fs-3">5100</h4>
                                            <p class = "text-inner fs-5 card-text " href ="#">Minor Residents</p>
                                        </div>
                                            <i class="fas fa-mars fs-1 logo  p-4 "></i>
                                            

                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class = "text-inner text-decoration-none" href = "#"> <div class="fs-6">More info&nbsp;<i class = 'fa fa-arrow-circle-right'></i></a></div>
                                </div>
                                
                            </div>
                            <div class="col-md-3  rounded border left shadow-md voters">
                                <div class="row g-3">
                                    <div class="p-3 voters  d-flex justify-content-around align-items-center ">
                                        <div class = "text-inner">
                                            <h4 class="fs-3">2500</h4>
                                            <p class = "text-inner fs-5 card-text " href ="#">Total Voters</p>
                                        </div>
                                            <i class="fas fa-venus fs-1 logo  p-4"></i>
                                            

                                    </div>
                                </div>
                                <div class="row border-top g-0 ">
                                    <a class = "text-inner text-decoration-none" href = "#"> <div class="fs-6">More info&nbsp;<i class = 'fa fa-arrow-circle-right'></i></a></div>
                                </div>
                                
                            </div>
                            
                        </div>
                    
                    </div>



                </div>
               
                  

                <!--
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Recent Orders</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Television</td>
                                    <td>Jonny</td>
                                    <td>$1200</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Laptop</td>
                                    <td>Kenny</td>
                                    <td>$750</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Cell Phone</td>
                                    <td>Jenny</td>
                                    <td>$600</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Fridge</td>
                                    <td>Killy</td>
                                    <td>$300</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Books</td>
                                    <td>Filly</td>
                                    <td>$120</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>Gold</td>
                                    <td>Bumbo</td>
                                    <td>$1800</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>  
                                    <td>Pen</td>
                                    <td>Bilbo</td>
                                    <td>$75</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>Notebook</td>
                                    <td>Frodo</td>
                                    <td>$36</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>Dress</td>
                                    <td>Kimo</td>
                                    <td>$255</td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>Paint</td>
                                    <td>Zico</td>
                                    <td>$434</td>
                                </tr>
                                <tr>
                                    <th scope="row">11</th>
                                    <td>Carpet</td>
                                    <td>Jeco</td>
                                    <td>$1236</td>
                                </tr>
                                <tr>
                                    <th scope="row">12</th>
                                    <td>Food</td>
                                    <td>Haso</td>
                                    <td>$422</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>-->
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>