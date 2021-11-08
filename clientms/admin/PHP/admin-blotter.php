<?php 
    $curr ="Blotter";
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
    header('location:logout.php');
    }else{
    
    
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curr;?></title>
   
    <?php include ('link.php');
           
           
    ?>
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
                    title:'',
                    message:'The following data are the reported blotter cases to Barangay 599.',
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
                                                <th style = "text-align: left">Status</th>
                                                <th style = "text-align: left">Complainant</th>
                                                <th style = "text-align: left">Incident Type</th>
                                                <th style = "text-align: left">Date Time Reported</th>
                                                <th style = "text-align: left">Incident Date </th>
                                                <th style = "text-align: center">Actions</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody class= "table-hover">
                                            <?php
                                            
                                                
                                                $sql ="SELECT * from tblblotter";
                                                $query = $dbh -> prepare($sql);
                                                $query->execute();
                                                $results =$query->fetchAll(PDO::FETCH_OBJ);
                                                $ctr =1;
                                                foreach ($results as $rows){
                                                    $cdate = $rows->blotterCreationDate;
                                                    $idate = $rows->incidentDate;
                                                    echo'
                                                    <tr>
                                                        <td scope="col" style = "text-align: left">'.$rows->blotterStatus.'</td>
                                                        <td scope="col" style = "text-align: left">'.$rows->complainant.'</td>
                                                        <td scope="col" style = "text-align: left">'.$rows->blotterType.'</td>
                                                        <td scope="col" style = "text-align: left">'.date('l, j F Y - h:i A', strtotime($cdate)).'</td>
                                                        <td scope="col" style = "text-align: left">'.date('l, j F Y - h:i A', strtotime($idate)).'</td>
                                                        <td scope="col" style = "text-align: center">
                                                            
                                                            <div class="btn-group me-1 mb-1"  aria-label="First group">
                                                              <form action = "blotter-report.php" method= "GET">
                                                                <button type="submit" name= "id" value = "'.$rows->ID.'"class="btn btng btn-primary"><i class = "fa fa-print mx-1"></i><span class="wal"> Print</span></button>
                                                                </form>
                                                                
                                                            </div>
                                                            
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <form action = "edit-blotter.php" method = "GET">
                                                                <button name = "bid"  value = "'.$rows->ID.'" class="btn btng btn-success"><i class = "fa fa-edit mx-1"></i><span class="wal">Edit</span></buttonn>
                                                                </form>
                                                            </div>
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a type="button" href ="#delete-record'.$ctr.'" data-bs-toggle = "modal" role = "button" class="btn btng btn-danger"><i class = "fa fa-trash mx-1"></i><span class="wal">Delete</span></a>
                                                            </div>
                                                        
                                                        </td>                                                                      
                                                        </tr>


                                                        <div class="modal fade" id = "delete-record'.$ctr.'" tab-idndex = "-1">
                                                            <div class="modal-dialog modal-dialog-centered modal-md">
                                                                <div class="modal-content g-0 bg-danger ">
                                                                    <div class="modal-header bg-danger white ">
                                                                        <div class="modal-title" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</div>
                                                                        
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
                                                                            <div class="col-xl-12">
                                                                                <div class="float-end">
                                                                                    <div class="btn-group">
                                                                                        <button type = "button" class="btn btn-success " data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                                                                    <i class= "fa fa-check mx-1"></i>Confirm
                                                                                </button>
                                                                                </div>
                                                                                <div class="btn-group">
                                                                                <button type = "button" class="btn btn-danger " data-bs-dismiss = "modal"  name = "no" value ="No">
                                                                                    <i class= "fa fa-times-circle mx-1"></i>Cancel
                                                                                </button>
                                                                                </div>
                                                                        
                                                                            </div>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                                                                    
                                                    
                                                    ';
                                                    $ctr ++;
                                                   
                                                }
                                                
                                            ?>
                                            
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
        <?php
            include('services.php');
        ?>
       
        
    </body>
</html>
<?php  }?>