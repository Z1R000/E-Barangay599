<?php 
    $curr ="Other Services";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curr;?></title>
 
    <?php
        include('link.php');
    ?>
    <script>
           $(document).ready(function() {
        $('#srec').DataTable( {
        dom: 'Bfrtip',
        buttons: {
            buttons:[
                {
                    extend: 'print',
                    text: 'Generate Report',
                    title:'',
                    message: 'The following data are reports for services catered.',
                    className: 'btn btn-primary my-1',
                    exportOptions: {columns: [ 0, 1, 2, 3,4 ]},
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '16pt','')                    
                            .prepend(

                                '<div class= "row justify-content-center"><div class= "col-3 align-items-center"><img src ="https://scontent.fmnl4-6.fna.fbcdn.net/v/t1.15752-9/253840780_3043650102555884_6126132548248010936_n.png?_nc_cat=107&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeHtm0gSv39SpbH8YKdiyQmO9Q65UWXYIN71DrlRZdgg3gzdVs9nT_Emsy5607I5PSXaq0miUcTAhsnSWRVszXmU&_nc_ohc=nlQIQehSnbkAX-6AV7Y&_nc_ht=scontent.fmnl4-6.fna&oh=4ef3f4e19b84fbc2f8130d1d23dc16ce&oe=61AD6A25" style= "width: 100px"/></div><div class= "col-6"><div class = "fs-3 text-center">BARANGAY 599, ZONE 59, DISTRICT VI OFFICE OF THE SANGGUNIANG BARANGAY</div></div><div class= "col-3  align-items-center"><img class= "float-end" src ="https://scontent.fmnl4-2.fna.fbcdn.net/v/t1.15752-9/253727695_993694454821211_6742610281288759451_n.png?_nc_cat=105&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeEjZKbv7g_r_OkDANnMfmkmh6jj4naYPzqHqOPidpg_OjwuDdnXemIELY2YBxsifbVX6Q12cTqziZrf280CcmQ9&_nc_ohc=b0AupJm6_48AX8vajsF&tn=2Fn-qzGntt-ZZM-o&_nc_ht=scontent.fmnl4-2.fna&oh=923e9c42b5c658123e6afb3b5b0f1685&oe=61ACC77E" style= "width: 100px"/></div>'
                            )
                            .append(
                                '<img src="https://scontent.fmnl4-6.fna.fbcdn.net/v/t1.15752-9/254152885_569551377676151_8198043780541099030_n.png?_nc_cat=107&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeGaHlQ9SaCFDoumzSqNbuYpX-DTswHybhVf4NOzAfJuFQb0vwGo3iZ4lgoV0U9JXqhvQciPwTNCLoUH_nwOkFhZ&_nc_ohc=VlwYtPOMD-kAX8F3DOo&_nc_ht=scontent.fmnl4-6.fna&oh=fede1fd8b66a464f69ca2a47abd6af65&oe=61AAFC89" style="position:absolute; bottom:0; left:500; right:500" />'

                            );
                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    },
                
                },
            
                {
                    extend: 'excelHtml5',
                    text: 'Excel File',
                    className: 'btn-success my-1',
                    exportOptions: {columns: [0,1,2,3,4]}
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
    $('#opay').DataTable();
    } );
    </script>
    <script>
    $(document).ready(function() {
    $('#olist').DataTable();
    } );
    </script>
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
        
        .btng{
            width: 50px;
        }

        @media (max-width: 576px){
            .row{
                overflow-x: auto;
            }
            .dis{
                font-size: 15px;
            }
            .ser{
                width: 100%;
            }
            .wal{
                display:none;
            }
           
        }
        .red{
            background:#8B0000;
            border: 1px solid #8B0000;
        }
        .white{
            color: white;
        }
        .blue{
            background: #012f4e;
        }
        @import url('https://fonts.googleapis.com/css2?family=Acme&display=swap');


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
        <div class="d-flex align-items-center">
                <div class="container  mt-3 ">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a  class= "text-decoration-none" href="#service-choice" data-bs-toggle= "modal" role ="button"><i class="fa fa-hand-paper"></i>&nbsp;Services</a></li>
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-list text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
     <!--breadcrumb-->
    <form action="#" method= "POST">
        <div class="container-fluid px-5 mb-5">
                <div class="row">
                    <div class="col-xl-2">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href = "#srecords" aria-current="page" href="#" data-bs-toggle= "tab">Service Records</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#paymentsrecs" data-bs-toggle = "tab">Payment Logs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#ser" data-bs-toggle = "tab">Service List </a>
                            </li>
                        </ul>   
                    </div>
                    <div class="col-xl-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id = "srecords">

                                <?php include ('admin-osrecords.php');?>
                       
        
                            </div>
                            <div class="tab-pane fade show" id = "paymentsrecs">
                                <?php
                                    include('payment-logs-os.php');
                                ?>
                                </div>
                            </div>
                                <div class="tab-pane fade show" id="ser">
                                    <div class="container g-0 pt-2">
                                        <div class="row bg-599 text-white rounded-top">
                                            <div class="fs-5 px-2"><i class="fa fa-hands-helping mx-1"></i>Available Services</div>
                                        </div>
                                        <div class="row border-end border-start border-bottom">
                                            <div class="row pb-2 px-4 g-0 justify-content-end">
                                                <div class="col-3 ">
                                                    <div class="btn-group float-end">
                                                        <a href = "#new-serv"  data-bs-toggle ="modal" role = "button"class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus mx-1"></i><span class= "wal">New Service</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12" style ="overflow:auto;">

                                                    <table class= "table table-bordered table-striped" id = "olist" style= "min-width: 900px;">
                                                        
                                                        <thead class= "bg-light">
                                                            <tr>
                                                                <th style = "text-align: left;">Service Name</th>
                                                                <th style = "text-align: left;">Fee(₱)</th>
                                                                <th style = "text-align: left; ">Availablility</th>
                                                                <th style = "text-align: center;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td scope="col" style = "text-align: left">Seminar (droga)</td>
                                                            <td scope="col" style = "text-align: right">20.00</td>
                                                            <td scope="col" style = "text-align: left">Available</td>
                                                            <td scope="col" style = "text-align: center;width: 30%">
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <button  type="button" href ="#check-service" data-bs-toggle="modal" role="button" class="btn btn-primary"><i class = "fa fa-eye mx-1"></i><span class = "wal">View</span></button>
                                                                    </div>
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a href ="#edit-service" data-bs-toggle ="modal" role ="button" class="btn  btn-success"><i class = "fa fa-edit mx-1"></i><span class= "wal">Edit</span></a>
                                                                    </div>
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a type="button" href ="#delete-service" data-bs-toggle = "modal" role = "button" class="btn btn-danger"><i class = "fa fa-trash mx-1"></i><span class = "wal">Delete</span></a>
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
</form>
   
    <!--modal-->
   

    <div class="modal fade" id = "delete-service" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger" >
                    <div class="modal-header  white ">
                        <div class="modal-title bg-danger" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row">
                            <div class="col xl-4" align = "center">
                                <img src="../images/trash.png" alt="trash" class= " img-fluid " style ="width: 10%;">
                            </div>
                    
                        </div>
                        <div class="row">
                            <p class = "fs-4 text-center">You are about to delete an existing service, do you wish to continue?<br><span class="text-muted fs-6">*Select (<i class = "fa fa-check">)</i> if certain</span></p>
                        </div>
                        <div class="row justify-content-center" align = "center">
                            <div class="col-md-12">
                                <div class="float-end">
                                    <div class="btn-group">
                                <form method = "POST" action = "#">
                                    <button type = "button" class="btn btn-success " data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                        <i class= 'fa fa-check mx-1 '></i>Confirm
                                    </button>
                                    </div>
                                    <div class="btn-group">
                                    <button type = "button" class="btn btn-danger " data-bs-dismiss = "modal"  name = "no" value ="No">
                                        <i class= "fa fa-times-circle mx-1"></i>Cancel
                                    </button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
       
        <!--<div class="modal fade" id = "check-property" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 blue ">
                    <div class="modal-header blue white ">
                        <h5 class="modal-title" id="item">&nbsp;<i class = "fa fa-eye"></i>&nbsp;&nbsp;Basketball Court</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row">
                            <div class="col xl-6" align = "center">
                                <img src="../images/court-sample.jpeg" alt="trash" class= " img-fluid rounded " style ="width: 100%;">
                            </div>
                    
                        </div>
                        <div class="row">
                            <p class = "fs-4 text-center">Basketball Court<br></p>
                        </div>
                                        
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>-->
        

    <form action="" method ="POST">
        <div class="modal fade" id = "edit-service" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 border-0">
                    <div class="modal-header bg-599 border-599 text-white ">
                        <div class="modal-title" >&nbsp;<i class = "fa fa-edit"></i>&nbsp;&nbsp;Edit Service </div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        <div class="row">
                            <div class="col-xl-6" >
                                <label for="prate" class="fs-5 fw-bold">Service Fee</label>
                                <div class="input-group">    
                                    <button class="btn btn-secondary disable">
                                    ₱
                                    </button>
                                    <input type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "Rate" style= "text-align: right;">
                          
                               </div> 
                            </div>
                            <div class="col-xl-6" >  
                                <label for="status" class="fs-5 fw-bold">Service Availablility</label>
                                <select name="" class="form-select" id="status">
                                    <option value="avail">Available</option>
                                    <option value="noavail">Not Available</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12" >
                                <label for="pname" class="fs-5 fw-bold">Service Name</label>
                                <input type="text" id = "pname" class="form-control" name ="pName" placeholder="Name of the selected property">
                            </div>
                        </div>
                        <div class="row">
                       
                        </div>

                        <div class="row my-2 " >
                            <div class="col-md-12 ">
                                <div class="float-end">
                                    <div class=" btn-group">
                                <button type ="button" role = "button" class="btn btn-primary" >
                                    <i class="fa fa-save mx-1"></i> 
                                    Save
                                </button>
                                </div>
                                <div class="btn-group">
                                <button type ="button" role = "button" class="btn btn-secondary" data-bs-dismiss = "modal" >
                                    <i class="fa fa-times-circle mx-1"></i>
                                    Cancel
                                </button>
                                </div>
                                </div>
                            </div>
                        </div>
                    
                        
                                        
                    </div>
                  
                </div>
            </div>
        </div>
    </form>
    <?php
        include('services.php');
    ?>
    <form action="" method ="POST">
        <div class="modal fade" id = "new-serv" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 border-0">
                    <div class="modal-header bg-599 border-599 text-white ">
                        <div class="modal-title" >&nbsp;<i class = "fa fa-plus"></i>&nbsp;&nbsp;New Service</div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        <div class="row">
                            <div class="col-xl-5" >
                                <label for="prate" class="fs-5 fw-bold">Service Fee</label>
                                <div class="input-group">    
                                    <button class="btn btn-secondary disable">
                                    ₱
                                    </button>
                                    <input type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "Rate"style= "text-align:right;">
                  
                               </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12" >
                                <label for="pname" class="fs-5 fw-bold">Service Name</label>
                                <input type="text" id = "pname" class="form-control" name ="pName" placeholder="Name of the selected property">
                            </div>
                        </div>
                       

                        <div class="row g-0" >
                            <div class="col-md-12    my-2">
                                <div class="float-end">
                                    <div class="btn-group">
                                        <button type ="button" role = "button" class="btn btn-success" >
                                            <i class="fa fa-upload mx-1"></i>
                                            Upload
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                    <button type ="button" role = "button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            <i class="fa fa-times-circle mx-1"></i>
                                            Cancel
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        
                                        
                    </div>
              
                </div>
            </div>
        </div>
    </form>
    <div class="modal fade" id = "check-service" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 border-0 ">
                    <div class="modal-header bg-599 border-599 text-white ">
                        <div class="modal-title" >&nbsp;<i class = "fa fa-eye"></i>&nbsp;&nbsp;Service</div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        <div class="row">
                            <div class="col-xl-6" >
                                <label for="prate" class="fs-5 fw-bold">Service Fee</label>
                                <div class="input-group">    
                                    <button class="btn btn-secondary disable">
                                    ₱
                                    </button>
                                    <input readonly type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "Rate" style= "text-align:right;">
                                
                               </div> 
                            </div>
                            <div class="col-xl-6" >  
                                <label for="status" class="fs-5 fw-bold">Service Availablility</label>
                                <select name="" class="form-select" id="status" disabled>
                                    <option value="avail">Available</option>
                                    <option value="noavail">Not Available</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12" >
                                <label for="pname" class="fs-5 fw-bold">Service Name</label>
                                <input readonly  type="text" id = "pname" class="form-control" name ="pName" placeholder="Name of the selected property">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-md-12">
                                <div class="float-end">
                                    <button class="btn btn-secondary" data-bs-dismiss ="modal">Done</button>
                                </div>
                            </div>
                         
                        </div>

                     
                        
                                        
                    </div>
             
                </div>
            </div>
        </div>
        <form action="" method ="POST">

    </script>
    <script>
        $(document).ready(function() {
            $("select").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else {
                        $(".box").hide();
                    }
                });
            }).change();
        });
    </script>

<script type="text/javascript">
    function showDiv(divId, element) {
        document.getElementById(divId).style.display = element.value == 'Business' ? 'flex' : 'none';
    }
    function showOthersdec(divId, element) {
        document.getElementById(divId).style.display = element.value == 'others' ? 'flex' : 'none';
    }
    function showOthers(divId, element) {
        document.getElementById(divId).style.display = element.value == 'others' ? 'block' : 'none';
    }
    function showOthersEdit(divId, element) {
        document.getElementById(divId).style.display = element.value == 'others' ? 'block' : 'none';
    }

</script>
 

</body>
</html>