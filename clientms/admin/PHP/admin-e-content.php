<?php 
    $curr ="E-barangay Information";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curr;?></title>
   
    <?php include ('link.php');?>
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <script>
    $(document).ready(function() {
        $('#login-auds').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy',  'print', 'pdf','excel'
        ]
    } );
    } );
    </script>
    <script>
    $(document).ready(function() {
        $('#del-serv').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy',  'print', 'pdf','excel'
        ]
    });
    } );
    </script>
      <script>
    $(document).ready(function() {
        $('#del-req').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy',  'print', 'pdf','excel'
        ]
    });
    } );
    </script>
       <script>
    $(document).ready(function() {
        $('#del-pay').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy',  'print', 'pdf','excel'
        ]
    });
    } );
    </script>
       <script>
    $(document).ready(function() {
        $('#del-reg').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy',  'print', 'pdf','excel'
        ]
    });
    } );
    </script>


    <style type = "text/css">
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');
        table,td,tr,th{
            
            text-align: left;
            font-size: 1em;
            
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
            transform:scale(1.015);
            transition: .65s;
        }
        
        .nav-pills li.active a{
            color: red;
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
<div class="container-fluid px-5">
    <div class="row">
            <div class="col-xl-2">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href = "#logaud" aria-current="page" href="#" data-bs-toggle= "tab">Log-in audits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#e-img" data-bs-toggle = "tab">E-barangay Media</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#e-text" data-bs-toggle = "tab">E-barangay Texts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href = "#e-purok" data-bs-toggle = "tab">E-barangay Puroks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href= "#e-archive"data-bs-toggle = "tab">E-barangay Archives</a>
                    </li>
                </ul>   
            </div>
        <div class="col-xl-10">
            <div class="tab-content">
                <div class="tab-pane fade show active" id  = "logaud">
                        <div class="container g-0 py-2 shadow-sm">
                        <div class="row g-0 text-white py-2 bg-dark">   
                                    <div class="fs-5 px-2">Login Audits</div>
                                </div>
                            <div class="row g-0 bg-white border-top-0 shadow-sm  px-3">
                                
                                <div class="row py-2 ">
                                    <div class="col py-2" style= "overflow-x:auto;">
                                        <table class="table table-responsive table-striped  table-bordered" id = "login-auds" style = "min-width: 600px;">
                                            <thead class= "bg-light">
                                                <tr>
                                                    <th>
                                                        Position <i class="fa fa-address-card mx-1"></i>
                                                    </th>
                                                    <th>
                                                        Official <i class="fa fa-user-shield"></i>
                                                    </th>
                                                    <td>
                                                        Access Date <i class="fa fa-calendar mx-1"></i>
                                                    </td>
                                                    <th>
                                                        Session Started <i class="fa fa-sign-in-alt mx-1"></i>
                                                    </th>
                                                    <th>
                                                        Session End <i class="fa fa-sign-out-alt mx-1"></i>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Secretary
                                                    </td>
                                                    <td>
                                                        MARIA CECILIA C. DELA CRUZ
                                                    </td>
                                                    <td>
                                                        10/30/2021
                                                    </td>
                                                    <td>
                                                        7:35 AM
                                                    </td>
                                                    <td>
                                                        8:00PM
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        Kagawad
                                                    </td>
                                                    <td>
                                                        Erwin L. Sampaga
                                                    </td>
                                                    <td>
                                                        10/30/2021
                                                    </td>
                                                    <td>
                                                        7:00 AM
                                                    </td>
                                                    <td>
                                                        6:00 PM
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                                
                         </div>
                    </div>
                    
                </div>
                <div class="tab-pane fade show" id = "e-text">
                    <div class="container shadow-sm g-0 mb-5 ">
                            <div class="row bg-dark text-white shadow-sm">
                                <div class="fs-5 py-1">E-barangay Texts <i class="fa fa-scroll mx-1"></i></div>
                            </div>
                            <div class="row bg-light py-2 shadow-sm">
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for = "etitle" class= "fs-5 fw-bold">E-barangay Title</label>
                                        <input type="text" class="form-control" id = "etitle" placeholder = "599 title" value = "Barangay 599" >
                                    </div>
                                </div>
                                <div class="row py-2 px-3 ">

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
                                    <div class="row justify-content-end" align = "right">
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
                            
                        </div>
                    </div>    
                
                <div class="tab-pane" id = "e-img">
                    <div class="container mb-5 g-0 shadow-sm">
                        <div class="row bg-dark rounded-top">
                            <div class="fs-4 text-white">
                                E-barangay Images
                            </div>
                        </div>
                        <div class="row p-4 bg-light justify-content-center align-items-center">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="row g-0">
                                        <div class="col-md-10 mx-auto" align = "center">
                                            <div class="fs-5 fw-bold">
                                                Barangay 599's Logo
                                            </div>
                                        
                                            <img src="../images/Barangay.png" alt="" class="img-fluid border border-info rounded ava"  style = "height: 185px">
                                    
                                        </div>
                                    </div>
                                    <div class="row" align = "center">
                                        <div class="col-xl-10 my-2 mx-auto">
                                            <input type="file" id="selectedFile" style="display: none;" />
                                            <button type="button"  class= "btn btn-primary" onclick="document.getElementById('selectedFile').click();" ><i class= "fa fa-camera me-2 "></i>Choose photo</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="row g-0">
                                        <div class="col-md-10 mx-auto" align = "center">
                                            <div class="fs-5 fw-bold">
                                                599's Admin Logo
                                            </div>
                                        
                                            <img src="../images/admin-logo.png" alt="" class="img-fluid border border-info rounded ava"  style = "height: 185px">
                                    
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-10 my-2 mx-auto" align = "center">
                                            <input type="file" id="selectedFile" style="display: none;" />
                                            <button type="button"  class= "btn btn-primary" onclick="document.getElementById('selectedFile').click();" ><i class= "fa fa-camera me-2 "></i>Choose photo</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="row g-0">
                                        <div class="col-md-10 mx-auto" align = "center">
                                            <div class="fs-5 fw-bold">
                                                City of Manila Logo
                                            </div>

                                        
                                            <img src="../images/maynila.png" alt="" class="img-fluid border border-info rounded ava"  style = "height: 185px">
                                    
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-10 my-2 mx-auto" align = "center">
                                            <input type="file" id="selectedFile" style="display: none;" />
                                            <button type="button"  class= "btn btn-primary" onclick="document.getElementById('selectedFile').click();" ><i class= "fa fa-camera me-2 "></i>Choose photo</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-md-2 my-2 " >
                                        
                                        <button type ="button" class= "btn btn-success form-control"><i class= "fa fa-save me-2"></i>Save</button>
                                </div>
                                </div>

                        </div>
                    </div> 
                </div>
                <div class="tab-pane" id = "e-purok">
                    
                    <div class="container mb-5 g-0 shadow-sm">
                        <div class="row bg-dark">
                            <div class="fs-4 text-white">
                                Officials Log-in Audits
                            </div>
                        </div>
                        <?php include ('manage-purok.php')?>

                </div>
                <div class="tab-pane" id = "e-archive">
                    <div class="row g-0 mt-2">             
                        <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle= "tab" href="#ser">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle= "tab" href="#req">Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle= "tab" href="#pay">Payments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href = "#reg" data-bs-toggle= "tab">Registrations</a>
                        </li>
                        </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id = "ser">
                        <div class="container g-0 py-2">
                            <div class="row g-0 border border-top-0 px-3">
                                
                                <div class="row py-2">
                                <div class="fs-5">Declined Service Transactions</div>
                                </div>
                                <div class="row">
                                    <div class="col py-2" style= "overflow-x:auto;">
                                        <table class="table table-striped  table-bordered" id= "del-serv" style = "min-width: 600px;">
                                            <thead class= "bg-light">
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Requestor
                                                    </th>
                                                    <th>
                                                        Service Type
                                                    </th>
                                                    <th>
                                                        Date
                                                    </th>
                                                    <th>
                                                        Decline Reason
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Boss idol
                                                </td>
                                                <td>
                                                    Certification - Employment
                                                </td>
                                                <td>
                                                    10/30/2021
                                                </td>
                                                <td>
                                                    Invalid Payment
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Boss Manong
                                                </td>
                                                <td>
                                                    Rental - barangay Van
                                                </td>
                                                <td>
                                                    10/30/2021
                                                </td>
                                                <td>
                                                    Has pending debt
                                                </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id = "req">
                    <div class="container g-0 py-2">
                            <div class="row g-0 border border-top-0 px-3">
                                
                                <div class="row py-2">
                                <div class="fs-5">Declined Service Requests</div>
                                </div>
                                <div class="row">
                                    <div class="col py-2" style= "overflow-x:auto;">
                                        <table class="table table-striped  table-bordered" id = "del-req" style = "min-width: 600px;">
                                            <thead class= "bg-light">
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Requestor
                                                    </th>
                                                    <th>
                                                        Request Type
                                                    </th>
                                                    <th>
                                                        Date
                                                    </th>
                                                    <th>
                                                        Decline Reason
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Boss idol
                                                </td>
                                                <td>
                                                    Certification - Employment
                                                </td>
                                                <td>
                                                    10/30/2021
                                                </td>
                                                <td>
                                                    Invalid Payment
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Boss Manong
                                                </td>
                                                <td>
                                                    Rental - barangay Van
                                                </td>
                                                <td>
                                                    10/30/2021
                                                </td>
                                                <td>
                                                    Has pending debt
                                                </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                           
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id = "pay">
                    <div class="container g-0 py-2">
                            <div class="row g-0 border border-top-0 px-3">
                                
                                <div class="row py-2">
                                <div class="fs-5">Declined Proof of Payments</div>
                                </div>
                                <div class="row">
                                    <div class="col py-2" style= "overflow-x:auto;">
                                        <table class="table table-striped  table-bordered" id = "del-pay" style = "min-width: 600px;">
                                            <thead class= "bg-light">
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Requestor
                                                    </th>
                                                    <th>
                                                        Service Type
                                                    </th>
                                                    <th>
                                                        Date
                                                    </th>
                                                    <th>
                                                        Decline Reason
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Boss idol
                                                </td>
                                                <td>
                                                    Certification - Employment
                                                </td>
                                                <td>
                                                    10/30/2021
                                                </td>
                                                <td>
                                                    Invalid proof 
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Boss Manong
                                                </td>
                                                <td>
                                                    Rental - barangay Van
                                                </td>
                                                <td>
                                                    10/30/2021
                                                </td>
                                                <td>
                                                    Insufficient
                                                </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id = "reg">
                    <div class="container g-0 py-2">
                            <div class="row g-0 border border-top-0 px-3">
                                
                                <div class="row py-2">
                                <div class="fs-5">Declined Registrations</div>
                                </div>
                                <div class="row">
                                    <div class="col py-2" style= "overflow-x:auto;">
                                        <table class="table table-striped  table-bordered" id = "del-reg" style = "min-width: 600px;">
                                            <thead class= "bg-light">
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Requestor
                                                    </th>
                                                   
                                                    <th>
                                                        Date
                                                    </th>
                                                    <th>
                                                        Decline Reason
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    Boss idol
                                                </td>
                                                
                                                <td>
                                                    10/30/2021
                                                </td>
                                                <td>
                                                    Invalid Payment
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Boss Manong
                                                </td>
                                                
                                                <td>
                                                    10/30/2021
                                                </td>
                                                <td>
                                                    Has pending debt
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