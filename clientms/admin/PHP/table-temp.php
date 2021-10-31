<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title><?php echo $curr;?></title>
    
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link href = "https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" rel = "stylesheet">
    
    <!--font-as-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

   <!--Jquery-->
    <script src = "https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src = "https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src = "https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src= "https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src= "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src ="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src= "https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
    <!--sidebar-scrollbar-->
    <link rel = "stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../CSS/scrollbar.css">

	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">    <script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
</head>
<body>
    <?php $curr = "xx";include ('../includes/sidebar.php')?>
</div>
</nav>
    <div class="container py-5">
    <div class="col" style ="overflow-x:auto">
<form action = "#" method ="POST">
    
    <table class="table bg-white table-hover table-bordered shadow-sm  " id ="example" style = "min-width: 1100px;"> 
                                            <thead>
                                           
                                                <tr>
                                                    <th style = "text-align: left">BCN #</th>
                                                    <th style = "text-align: left">Status</th>
                                                    <th style = "text-align: left">Requestor</th>
                                             
                                                    <th style = "text-align: left">Purpose</th>
                                                    <th style = "text-align: left">Certification</th>
                                                    <th style = "text-align: left">Fee</th>
                                                    <th style = "text-align: left">Mode of Payment</th>
                                                    <th style = "text-align: left">Date</th>
                                                    <th style = "text-align: center">Actions</th>
                                                    
                                                </tr>
                                            </thead>           
                                            <tbody class= "table-hover">
                                                <tr>
                                                    <td scope="col" style = "text-align: left">015-22</td>
                                                    <td scope="col" style = "text-align: left">On-Going</td>
                                                    <td scope="col" style = "text-align: left">ekoc omsim</td>

                                                    <td scope="col" style = "text-align: left">For employment</td>
                                                    <td scope="col" style = "text-align: left">Barangay Clearance</td>
                                                    <td scope="col" style = "text-align: right">₱ 300000</td>
                                                    <td scope="col" style = "text-align: left">G-cash</td>
                                                    <td scope="col" style = "text-align: right">10-12-2021</td>
                                                  
                                                    <td scope="col" style = "text-align: center">
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a type="" href ="edit-cert-record.php"class="btn btn-primary"><i class = "fa fa-edit mx-1"></i><span class="wal">Edit</span></a>
                                                            </div>
                                                        
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a type="" href ="temp-cert.php"class="btn btn-success"><i class = "fa fa-print mx-1"></i><span class="wal">Print</span></a>
                                                            </div>
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="#approve-transac" data-bs-toggle = "modal" role = "button" class="btn  btn-info white"><i class = "fa fa-paper-plane mx-1 white"></i><span class="wal">Send</span></a>
                                                                </div> 
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a type="button" href ="#delete-record" data-bs-toggle = "modal" role = "button" class="btn btn-danger"><i class = "fa fa-trash mx-1"></i><span class="wal">Delete</span></a>
                                                            </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>      
                                        </div>   
</div>        </form>
    </div>
</body>
</html>