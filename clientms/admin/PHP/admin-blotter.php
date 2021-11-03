<?php 
    $curr ="Blotter";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curr;?></title>
   
    <?php include ('link.php');?>
    <script>
          $(document).ready(function() {
        $('#brecord').DataTable( {
        dom: 'Bfrtip',
        buttons: {
            buttons:[
                {
                    extend: 'print',
                    text: 'Generate Report',
                    className: 'btn btn-primary my-1',
                    exportOptions: {columns: [ 0, 1, 2, 3,4 ]}
                
                },
            
                {
                    extend: 'excelHtml5',
                    text: 'Excel File',
                    className: 'btn-success my-1',
                    exportOptions: {columns: [0,1,2,3,4]}
                },
                {
                    extend: 'pdfHtml5',
                    text: 'PDF file',
                    className: 'btn-danger my-1',
                    exportOptions: {columns: [ 0, 1, 2, 3,4 ]}
                },
                {
                    extend: 'copyHtml5',
                    text:'Copy',
                    className: 'btn-secondary my-1',
                    exportOptions: {columns: [0,1,2,3,4] }
                },
                
            ],
        dom: {
            button:{
                className: 'btn'
            }
        }

        }
        } );
    } );
    </script>
    <script>
    $(document).ready(function() {
    $('#clist').DataTable();
    } );
    </script>

	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
       table,tr,td,th{
     
            font-size: 1em;
        }
        body,html{
            height: 100%;
        }
        .blue{
            background: #012f4e;
        }
        .right{
            height: auto;
            max-height: 550px;
            overflow-Y: auto;
        }
        .left{
            height: auto;
            max-height:250px;
            overflow-Y: auto;
        }
        .white{
            color:white;
        }
        @media (max-width: 576px){
            .btnx{
              margin-bottom: 10px;
            }
          
            .dis{
                font-size: 15px;
            }
            .wal{
                display:none;
            }
            .ser{
                width: 100%;
            }
            .sepa{
              overflow-x: auto;
            }
           
           
        }
                
    </style>
</head>
<body>

    <?php 
        include ('../includes/sidebar.php');
    ?> 
    <div class="d-flex align-items-center">
                <div class="container  mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a  class= "text-decoration-none" href="#service-choice" data-bs-toggle= "modal" role ="button"><i class="fa fa-hand-paper"></i>&nbsp;Services</a></li>
                            
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-gavel text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav> 
 
    <div class="container px-5 mb-5">
            <div class=" row g-0">
                <div class="col">
                    <div class="row rounded-top text-white bg-599">
                        <div class="fs-5">
                            <i class="fa fa-suitcase mx-1">
                             
                            </i>
                            Blotter Records
                        </div>
                    </div>
                    <div class="row">
                        <div class="row g-0 border bg-white border-start border-end border-bottom shadow-sm" >
                            <div class = "row py-1 g-0">
                                <div class="col-md-8 px-1" >
                                    <div class="btn-group" role="group">
                                        <a href = "create-blotter-resident.php"  class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;New Case</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-xl-12 mx-2  mx-auto py-2  px-2" style= "overflow-x:auto">
                                    <table class="table bg-white table-hover table-bordered  "  id ="brecord"style= "min-width: 1200px;"> 
                                        <thead class = "bg-light">
                                            <tr>
                                        
                                            </tr>
                                            <tr>
                                                <th style = "text-align: left">Status</th>
                                                <th style = "text-align: left">Complainant</th>
                                                <th style = "text-align: left">Incident Type</th>
                                                <th style = "text-align: left">Date Time Reported</th>
                                                <th style = "text-align: left">Incident's Estimated Time </th>
                                                <th style = "text-align: center">Actions</th>
                                                
                                            </tr>
                                        
                                        </thead>           
                                        <tbody class= "table-hover">
                                            <tr>
                                                <td scope="col" style = "text-align: left">On-going</td>
                                                <td scope="col" style = "text-align: left">Mang Berting</td>
                                                <td scope="col" style = "text-align: left">Public Disturbance</td>
                                         
                            
                                                
                                                <td scope="col" style = "text-align: right">12-10-2021</td>
                                                <td scope="col" style = "text-align: right">6:00pm</td>
                                                <td scope="col" style = "text-align: center">
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="" href ="blotter-report.php"class="btn btng btn-primary"><i class = "fa fa-print mx-1"></i><span class="wal"> Report</span></a>
                                                        </div>
                                                    
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a href ="edit-blotter.php"class="btn btng btn-success"><i class = "fa fa-edit mx-1"></i><span class="wal">Edit</span></a>
                                                        </div>
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="button" href ="#delete-record" data-bs-toggle = "modal" role = "button" class="btn btng btn-danger"><i class = "fa fa-trash mx-1"></i><span class="wal">Delete</span></a>
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

    </form>
   
    <!--modal-->
        <?php
            include('services.php');
        ?>
       
        <div class="modal fade" id = "delete-record" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger ">
                    <div class="modal-header bg-danger white ">
                        <h5 class="modal-title" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row">
                            <div class="col xl-4" align = "center">
                                <img src="../images/trash.png" alt="trash" class= " img-fluid " style ="width: 10%;">
                            </div>
                    
                        </div>
                        <div class="row">
                            <p class = "fs-4 text-center">You are about to delete an existing record, do you wish to continue?<br><span class="text-muted fs-6">*Select (<i class = "fa fa-check">)</i> if certain</span></p>
                        </div>
                        <div class="row justify-content-center" align = "center">
                            <form method = "POST" action = "#">
                                <button type = "button" class="btn btn-success rounded-circle" data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                    <i class= 'fa fa-check '></i>
                                </button>
                                <button type = "button" class="btn btn-danger rounded-circle" data-bs-dismiss = "modal"  name = "no" value ="No">
                                    <i class= "fa fa-times"></i>
                                </button>
                            </form>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>

      
    
</body>
</html>