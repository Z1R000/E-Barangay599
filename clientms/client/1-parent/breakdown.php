<?php

    include('includes/dbconnection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        include('../admin/PHP/link.php');
    
    ?>
   
    <script>
          $(document).ready(function() {
        $('#bd').DataTable( {
        dom: 'Bfrtip',
         buttons: {
            buttons:[
                {
                    extend: 'print',
                    title:'',
                    text: '<i class= "fa fa-print"></i> Print Breakdown',
                    message:'Rental request payable breakdown',
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
   
    <style>
        .dataTables_filter {
            display: none;
            }
    </style>
</head>
<body>
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-12">
                <div class="float-end">
                    <div class="btn-group">
                        <a href= "rental-request.php"class="btn btn-secondary">
                            <i class="fa fa-arrow-circle-left"></i>
                            Go Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container align-items-center">
        <div class="row py-5  justify-content-center">
            <div class="col-xl-4">
                <table class= "table table-bordered " id = "bd">
                    <thead>
                        <tr>
                            <th>Day/s</th>
                            <th>Hour/s</th>
                            <th>Day/s</th>
                            <th>Rate</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            echo'
                            <tr>
                               
                                <td>'.$_GET['d'].'</td>
                      
                            
                                <td>'.$_GET['h'].'</td>
                           
                               
                                <td>'.$_GET['m'].'</td>
                               
                                <td>'.$_GET['r'].'</td>
                                <td>'.$_GET['total'].'</td>
                            </tr>
                                                        
                            
                            ';
                        
                        
                        ?>
                    </tbody>
                    <tfoot>
                        <?PHP

                            echo ' <tr>
                                
                               
                            </tr>
                                 '
                        
                        ?>
                    </tfoot>



                </table>
         
            </div>
           
        </div>
    </div>
    
</body>
</html>