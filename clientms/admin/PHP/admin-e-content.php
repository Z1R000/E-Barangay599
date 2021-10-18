<?php 
    $curr ="E-barangay Content";
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
        .hov{
            cursor: pointer;
        }
        .hov:hover a{
            background:#173b67;
            transition: .5s;
        }
        .hov:hover{
            transform:scale(1.05);
            transition: .5s;
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
                      
                               
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-cog  text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid  px-5">
        <div class="row g-0 pt-2 px-5 mb-5 justify-content-center">
            <div class="col-xl-5 hov px-3">
                <div class="row g-0 shadow-lg  py-1 px-2 border-bottom bg-dark text-white rounded-top fs-5">
                    Barangay's Information
                </div>
                <div class="row g-0 bg-white shadow-lg ">
                    <div class="col-xl-6 p-3 ">
                        <p class= "fs-5" style= "text-align: justify;">Textual contents of e-barangay 599 such as its history, e-barangay banner and title. </p>
                    </div>
                    <div class="col-xl-6 text-center py-4">
                        <i class="fa fa-comments text-dark fa-5x"></i>
                    </div>
                </div>
                <div class="row g-0 text-center bg-dark rounded-bottom">
                    <a class= "link link-primary text-white  fs-5 text-decoration-none" href ="#man-text" data-bs-toggle= "modal">Manage<i class= "fa fa-edit ms-2"></i></a>

                </div>
            </div>
            <div class="col-xl-5 hov px-3">
                    <div class="row g-0 py-1 px-2 border-bottom bg-primary text-white rounded-top fs-5">
                        E-barangay Media
                    </div>
                    <div class="row g-0 bg-white shadow-lg ">
                        <div class="col-xl-6 p-3">
                            <p class= "fs-5" style= "text-align: justify;">Images of E-barangay System such as the logos of the Barangay and its city.</p>
                        </div>
                        <div class="col-xl-6 text-center py-4">
                            <i class="fa fa-images text-primary fa-5x"></i>
                        </div>
                    </div>
                    <div class="row g-0 text-center bg-primary rounded-bottom">
                        <a class= "link link-primary text-white fs-5 text-decoration-none" href ="#man-img" data-bs-toggle="modal">Manage<i class= "fa fa-edit ms-2"></i></a>
                    </div>
                    
            </div>
      
        </div>
        <div class="row g-0 pt-2 px-5 mb-5 justify-content-center">
            <div class="row g-0 bg-secondary py-2 text-white rounded-top px-3">
                <div class= "fs-5"><i class= "fa fa-eye me-2"></i>Log In audits</div>
            </div>
            <div class="row g-0 bg-white justify-content-center p-2">
                <div class="col-xl-11 mt-2" style= "max-height: 600px; overflow-y:auto;">
                    <table class= "table">
                        <thead class= "bg-light">
                            <tr>
                                
                                <th>
                                    Position <i class= "fa fa-address-card ms-2"></i>
                                </th>
                                <th>
                                    Official's Name <i class= "fa fa-user-shield ms-2"></i>
                                </th>
                                <th>
                                    Access Date <i class= "fa fa-calendar ms-2"></i>
                                </th>
                                <th>
                                    Session Start <i class= "fa fa-sign-in-alt ms-2"></i>
                                </th>
                                <th>
                                    Activity <i class= "fa fa-book ms-2"></i>
                                </th>
                                <th>
                                    Session End <i class= "fa fa-sign-out-alt ms-2"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        
                            <tr>
                                <td>
                                    Secretary
                                </td>
                                <td>
                                    Maria Cecilia C. Dela Cruz
                                </td>
                                <td>
                                    10-19-2021
                                </td>
                                <td>
                                    7:32 AM
                                </td>
                                <td>
                                    <ul>
                                        <li>
                                            Rental
                                        </li>
                                        <li>
                                            Other Service
                                        </li>
                                        <li>
                                            Certification
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    5:58 PM
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Kagawad
                                </td>
                                <td>
                                    Nelson L. Labrador
                                </td>
                                <td>
                                    10-19-2021
                                </td>
                                <td>
                                    9:47 AM
                                </td>
                                <td>
                                    <ul>
                                        
                                        <li>
                                            Blotter
                                        </li>
                                        
                                    </ul>
                                </td>
                                <td>
                                    5:23 PM
                                </td>
                            </tr>
                            </tbody>

                    </table>

                </div>
            </div>
            
        </div>
    </div>

    <div class="modal fade" id = "man-text" tab-idndex = "-1">
        <form action="">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content g-0 bg-dark">
                    <div class="modal-header bg-dark">
                        <h5 class="modal-title white" id="delete" >&nbsp;<i class = "fa fa-comment "></i>&nbsp;&nbsp;E-barangay texts</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                     
                        <div class="row py-2">
                            <div class="col-md-6">
                                <label for = "etitle" class= "fs-5 fw-bold">E-barangay Title</label>
                                <input type="text" class="form-control" id = "etitle" placeholder = "599 title" value = "Barangay 599" >
                            </div>
                        </row>
                        <div class="row py-2">

                            <div class="col-md-6">
                                <label for = "eban1" class= "fs-5 fw-bold">E-barangay Banner Line 1</label>
                                <input type="text" class="form-control" id = "eban1" placeholder = "599 title" value = "BARANGAY 599, ZONE 59, DISTRICT VI" >
                            </div>
                            <div class="col-md-6">
                                <label for = "eban2" class= "fs-5 fw-bold">E-barangay Banner Line 2</label>
                                <input type="text" class="form-control" id = "" placeholder = "599 title" value = "OFFICE OF THE SANGGUNIANG BARANGAY" >
                                
                            </div>
                  
                        </div>
                        <div class="row g-2 pt-3 pb-1 px-3">
                            <label for = "eban2" class= "fs-5 fw-bold">Barangay 599 History</label>
                            <div class="form-floating mb-3">
                                <textarea type="text" class="form-control" id="edit-about" >
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis venenatis ex et cursus molestie. Suspendisse et facilisis libero. Morbi aliquet non felis eu tincidunt. Nam mattis tortor ex, eu fringilla mi dapibus id. Nulla facilisi. Morbi porta luctus diam a consequat. Aenean eu tempus velit, id rhoncus libero.

                                Donec tempor lorem sed nibh pellentesque vulputate eget id leo. Vestibulum maximus hendrerit eros. Integer vel facilisis sem, vel ullamcorper elit. Cras tincidunt mollis metus. Nunc id risus sed mi facilisis posuere. Quisque faucibus auctor dui id hendrerit. Ut in blandit enim. In venenatis pretium consequat. Proin sed luctus augue, ut laoreet leo. Mauris lorem nisi, scelerisque vitae leo sed, facilisis accumsan elit. Vivamus eu consectetur urna. Donec elementum erat ut blandit cursus. Nam ac blandit sem. Suspendisse potenti. Proin sodales nisi nec pretium faucibus.

                                Duis vel mattis elit, eget condimentum nisl. Integer ultricies tellus viverra mi vehicula cursus. Suspendisse magna lacus, varius sed magna id, semper euismod purus. Vestibulum tincidunt venenatis nunc a tempus. Vestibulum tincidunt maximus blandit. Sed vitae sapien interdum, volutpat justo luctus, aliquam odio. Aenean finibus, sapien ac laoreet luctus, metus magna dictum neque, a luctus tellus neque vitae lorem. Ut nulla sapien, dictum sed euismod eget, feugiat blandit nisl.

                                Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque luctus urna vel dui mattis fringilla. Pellentesque enim orci, blandit ut sapien at, cursus sagittis mauris. Suspendisse dignissim nulla tortor, in ultricies odio semper eu. Fusce ac dictum urna, at interdum nisl. Donec feugiat, justo in tristique malesuada, urna nunc tincidunt ex, sit amet pulvinar est augue sit amet dolor. Sed ultricies tempus sagittis. Morbi quis porttitor purus. In elementum enim ipsum, non laoreet diam posuere a. Praesent imperdiet pretium urna, vel efficitur felis fringilla quis. Aliquam erat volutpat. Quisque at condimentum augue. Nunc nec cursus nulla.

                                Sed at euismod elit, sit amet eleifend enim. Maecenas venenatis aliquet lorem in venenatis. Donec scelerisque rutrum nibh vel dapibus. Etiam sodales eros eget malesuada accumsan. Nunc egestas ornare nisi, in venenatis elit maximus vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque posuere porttitor neque id imperdiet. Vestibulum a posuere nulla. Nam eleifend ultrices finibus. Sed quis dolor eros. In hac habitasse platea dictumst.


                                </textarea>

                            </div>
                        </div>
                        <div class="row justify-content-center" align = "center">
                            <div class="col-xl-6">
                            <button type = "button" class="btn btn-success" data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                    <i class= 'fa fa-save me-2'></i>Save
                                </button>
                                <button type = "reset" class="btn btn-danger">
                                    <i class= "fa fa-redo-alt me-2"></i>Clear
                                </button>

                            </div>
                                
                        
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
        <div class="modal fade" id = "man-img" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-primary g-0  ">
                    <div class="modal-header bg-primary  ">
                    <h5 class="modal-title white" id="delete" >&nbsp;<i class = "fa fa-image "></i>&nbsp;&nbsp;E-barangay Media</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row justify-content-center px-4" align="center">
                            <div class="col-xl-4">
                                <div class="row g-0">
                                    <div class="col-md-10 mx-auto">
                                        <div class="fs-5 fw-bold">
                                            Barangay 599's Logo
                                        </div>
                                    
                                        <img src="../images/Barangay.png" alt="" class="img-fluid border border-info rounded ava"  style = "height: 185px">
                                
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-10 my-2 mx-auto">
                                        <input type="file" id="selectedFile" style="display: none;" />
                                        <button type="button"  class= "btn btn-primary" onclick="document.getElementById('selectedFile').click();" ><i class= "fa fa-camera me-2 "></i>Choose photo</button>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="row g-0">
                                    <div class="col-md-10 mx-auto">
                                        <div class="fs-5 fw-bold">
                                            599's Admin Logo
                                        </div>
                                    
                                        <img src="../images/admin-logo.png" alt="" class="img-fluid border border-info rounded ava"  style = "height: 185px">
                                
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-10 my-2 mx-auto">
                                        <input type="file" id="selectedFile" style="display: none;" />
                                        <button type="button"  class= "btn btn-primary" onclick="document.getElementById('selectedFile').click();" ><i class= "fa fa-camera me-2 "></i>Choose photo</button>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="row g-0">
                                    <div class="col-md-10 mx-auto">
                                        <div class="fs-5 fw-bold">
                                            City of Manila Logo
                                        </div>

                                    
                                        <img src="../images/maynila.png" alt="" class="img-fluid border border-info rounded ava"  style = "height: 185px">
                                
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-10 my-2 mx-auto">
                                        <input type="file" id="selectedFile" style="display: none;" />
                                        <button type="button"  class= "btn btn-primary" onclick="document.getElementById('selectedFile').click();" ><i class= "fa fa-camera me-2 "></i>Choose photo</button>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    
                                    <button type ="button" class= "btn btn-success form-control"><i class= "fa fa-save me-2"></i>Save</button>
                              </div>
                            </div>

                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>


       
 <script src = "../ckeditor/ckeditor.js"></script>
 <script>
     CKEDITOR.replace('edit-about');
 </script>
</body>
</html>