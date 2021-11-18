<?php 
    session_start();
    $curr ="E-barangay Content";
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
    header('location:logout.php');
    }else{
        $err = "";
        $succesEditP = "";
        $infoArr=[];
        $curr ="E-barangay Information";
        $sql = "Select * from tblinformation";
        $query = $dbh->prepare($sql);
        $query->execute();
        $result= $query->fetchAll(PDO::FETCH_OBJ);
        foreach($result as $d){
            
            array_push($infoArr,$d->Baddress);
            array_push($infoArr,$d->bFullAdd);
            array_push($infoArr,$d->Blogoone);
            array_push($infoArr,$d->Blogotwo);
            array_push($infoArr,$d->bContact);
            array_push($infoArr,$d->blogo3);
            array_push($infoArr,$d->aboutus);
            array_push($infoArr,$d->Btitle);
            array_push($infoArr,$d->eTitle);
            array_push($infoArr,$d->gName);
            array_push($infoArr,$d->qr);
            array_push($infoArr,$d->reslogo);
            
        }
        $fileName = "";
        
        function upPhoto ($poid){
            $ftypes = array('png','jpeg','jpg');
        
            $fileName = $_FILES[''.$poid.'']['name'];
            $fileSize = $_FILES[''.$poid.'']['size'];
            $fileError = $_FILES[''.$poid.'']['error'];
            $filetmpname = $_FILES[''.$poid.'']['tmp_name'];
            $fileExt = explode('.',$fileName);
            $extension = strtolower(end($fileExt));
            
            $destination = "";

            if (in_array($extension,$ftypes)){
                if($fileSize<5000000){
                    $newfilename = uniqid('',TRUE).".".$extension;
                    $destination = "../../images/".$newfilename;
                    move_uploaded_file($filetmpname,$destination);
                   // header('Location: admin-e-content.php?success=1');
                }
            }
            
            return $destination;

        }
        if (isset($_POST['savepcred'])){

            $destination = upPhoto('qrc');
            $fileName = $destination;

            $sql= '';
                if ($fileName!= ""){
        
                   
                    $sql = 'Update tblinformation set qr = "'.$destination.'",bContact = "'.$_POST['gcnum'].'",gName ="'.$_POST['gcname'].'"';
                }
                else{
                    $sql = 'Update tblinformation set bContact = "'.$_POST['gcnum'].'",gName ="'.$_POST['gcname'].'"';
                }
            

            if (!preg_match('/^(09)+(\d{9})/',$_POST['gcnum'])){
                $err ='<div class="fs-6 text-danger">Contact Number Must start with 09 and is 11 characters Long (PH format)</div>';
                $succesEditP = "";
  
            }
      

            else{
                
                if ($con->query($sql)===TRUE){
                    header('Location: admin-e-content.php?updatepcred=success');
                    
                }
                else{
                    header('Location: admin-e-content.php?updatepcred=fail');
                }
            }

        }
    
        if (isset($_POST['saveText'])){
            $sql = 'Update tblinformation set eTitle = "'.$_POST['etitle'].'", Baddress = "'.$_POST['badd'].'", bFullAdd = "'.$_POST['bfadd'].'", Btitle = "'.$_POST['btitle'].'", aboutus = "'.$_POST['hist'].'" where ID = 1';

            if ($con->query($sql)===TRUE){
                header("Location: admin-e-content.php?textupdate=success");
            }
            else{
                header("Location: admin-e-content.php?textupdate=failed");
            }
        }
        
        if (isset($_POST['saveimg'])){
        
            $filenameone = $_FILES['bnine']['name'];
            $filenametwo = $_FILES['adnine']['name'];
            $filenamethree = $_FILES['manl']['name'];            
            $filenamefour = $_FILES['rlog']['name'];

            if($filenameone!=""){

                $destination = upPhoto('bnine');
                
                $sql= 'Update tblinformation set Blogoone = "'.$destination.'" where ID = 1';
                if ($con->query($sql)===TRUE){
                    header('Location: admin-e-content.php?successimag=1');
                }
                else{
                    header('Location: admin-e-content.php?successimag=0');
                }
    

            }
            if($filenametwo!=""){

                $destination = upPhoto('adnine');
                $sql= 'Update tblinformation set  blogo3= "'.$destination.'" where ID = 1';
                if ($con->query($sql)===TRUE){
                    header('Location: admin-e-content.php?successimag=1');
                }
                else{
                    header('Location: admin-e-content.php?successimag=0');
                }
            }

            if($filenamethree!=""){

                $destination = upPhoto('manl');
                $sql= 'Update tblinformation set Blogotwo = "'.$destination.'" where ID = 1';
                if ($con->query($sql)===TRUE){
                    header('Location: admin-e-content.php?successimag=1');
                }
                else{
                    header('Location: admin-e-content.php?successimag=0');
                }
            }
            
            if ($filenamefour!=""){

                $destination = upPhoto('rlog');
                $sql= 'Update tblinformation set reslogo = "'.$destination.'" where ID = 1';
                if ($con->query($sql)===TRUE){
                    header('Location: admin-e-content.php?successimag=1');
                }
                else{
                    header('Location: admin-e-content.php?successimag=0');
                }

            }
                        
        }

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
        buttons: {
            buttons:[
                {
                    extend: 'print',
                    text: 'Generate copy',
                    className: 'btn btn-primary my-1',
                    message:'The following data are report for audit of logs of the system.',
                    title:'',
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
                    exportOptions: {columns: [0,1,2,3,4,5]}
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
        $('#del-serv').DataTable({
        dom: 'Bfrtip',
        buttons: {
            buttons:[
                {
                    extend: 'print',
                    text: 'Generate copy',
                    className: 'btn btn-primary my-1',
                    message:'The following data are report for deleted service transactions in the system.',
                    title:'',
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
                    exportOptions: {columns: [0,1,2,3,4,5]}
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
        $('#del-req').DataTable({
        dom: 'Bfrtip',
        buttons: {
            buttons:[
                {

                    extend: 'print',
                    text: 'Generate copy',
                    className: 'btn btn-primary my-1',
                    message:'The following data are report for audit of deleted service requests in the system.',
                    title:'',
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
                    exportOptions: {columns: [0,1,2,3,4,5]}
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
        $('#del-pay').DataTable({
        dom: 'Bfrtip',
        buttons: {
            buttons:[
                {
                    extend: 'print',
                    text: 'Generate copy',
                    className: 'btn btn-primary my-1',
                    message:'The following data are report for the rejected payments of the system.',
                    title:'',
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
       
    });
    } );
    </script>
       <script>
    $(document).ready(function() {
        $('#del-reg').DataTable({
        dom: 'Bfrtip',
        buttons: {
            buttons:[   
                {
                    extend: 'print',
                    text: 'Generate copy',
                    className: 'btn btn-primary my-1',
                    message:'The following data are report for audit of logs of the system.',
                    title:'',
                    exportOptions: {columns: [ 0, 1, 2, 3]},
                
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
                    exportOptions: {columns: [0,1,2,3]}
                },

               
             
                
            ],
        dom: {
            button:{
                className: 'btn'
            }
        }

        }
      
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
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;</a></li>
                      
                               
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
                    <li class="nav-item">
                        <a class="nav-link " href= "#e-pay"data-bs-toggle = "tab">Payment Credentials</a>
                    </li>
                </ul>   
            </div>
        <div class="col-xl-10">
            <div class="tab-content">
                <div class="tab-pane fade show active" id  = "logaud">
                        <div class="container g-0 py-2 shadow-sm">
                        <div class="row g-0 text-white py-2 bg-dark">   
                                    <div class="fs-5 px-2">Login Audits </div>
                                </div>
                            <div class="row g-0 bg-white border border-top-0 shadow-sm  px-3">
                                
                                <div class="row py-2 ">
                                    <div class="col py-2" style= "overflow-x:auto;">
                                        <table class="table table-responsive table-striped  table-bordered" id = "login-auds" style = "min-width: 600px;">
                                            <thead class= "bg-light">
                                                <tr>
                                                    <th>
                                                        Position <i class="fa fa-address-card mx-1"></i>
                                                    </th>
                                                    <th>
                                                        Official <i class="fa fa-user-id"></i>
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

                                                <?php
                                                    $sql ='Select tblloginaudits.datesignedin, tblresident.FirstName, tblresident.LastName, tblresident.MiddleName, tblresident.Suffix, tblpositions.Position, tblloginaudits.timeIn,tblloginaudits.timeOut From tblloginaudits Inner join tblresident on tblresident.ID = tblloginaudits.resId Inner join tblpositions on tblpositions.ID = tblloginaudits.position';
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();

                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);

                                                    foreach($results as $r){
                                                        $cdate = $r->datesignedin;
                                                        $mid = $r->MiddleName;
                                                        $ctime =$r->timeIn;
                                                        $ctimout =$r->timeOut;
                                                        echo'
                                                        <tr>
                                                        <td>'.ucfirst($r->LastName).",".ucfirst($r->FirstName)." ".ucfirst($mid[0]).". ".ucfirst($r->Suffix).'</td>
                                                        <td>
                                                            '.$r->Position.'
                                                        </td>
                                                        <td>
                                                            '.date('F j, Y', strtotime($cdate)).'
                                                       </td>
                                                        <td>
                                                            '.date('h:i A', strtotime($ctime)).'
                                                        </td>
                                                        <td>';
                                                        if (!preg_match("/[1-9]/",($r->timeOut))){
                                                            echo "Currently logged in";
                                                        }
                                                        else{
                                                            echo date('h:i A', strtotime($ctimout));
                                                        }
                                                    
                                                        echo'
                                                        </td>
                                                        </tr>'
                                                        
                                                        ;
                                                    }   

                                                
                                                
                                                
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                                
                         </div>
                    </div>
                    
                </div>


                <div class="tab-pane fade show" id = "e-text">
                    <div class="container shadow-sm g-0 mb-5 ">
                        <form method = "POST">
                            <div class="row bg-dark text-white shadow-sm">
                                <div class="fs-5 py-1">E-barangay Texts <i class="fa fa-scroll mx-1"></i></div>
                            </div>
                            <div class="row bg-light py-2 shadow-sm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for = "etitle" class= "fs-5 fw-bold">E-barangay Title</label>
                                        <input type="text" name= "etitle" class="form-control" id = "etitle" placeholder = "599 title" value = "<?php
                                        echo $infoArr[8];?>" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for = "etitle" class= "fs-5 fw-bold">Barangay Title</label>
                                        <input type="text" name = "btitle" class="form-control" id = "etitle" placeholder = "599 title" value = "<?php
                                        echo $infoArr[7];?>" >
                                    </div>
                                </div>
                                <div class="row py-2 px-3 ">

                                    <div class="col-md-6">
                                        <label for = "eban1" class= "fs-5 fw-bold">Barangay Address <span class ="text-muted">(for Banner)</span></label>
                                        <input type="text" name = "badd" class="form-control" id = "eban1" placeholder = "599 title" value = "<?php
                                        echo $infoArr[0];?>" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for = "eban2" class= "fs-5 fw-bold">Barangay Full Address</label>
                                        <input type="text" name= "bfadd"class="form-control" id = "" placeholder = "599 title" value = "<?php
                                        echo $infoArr[1];
                                        ?>" >
                                        
                                    </div>
                        
                                </div>
                                    <div class="row g-2 pt-3 pb-1 px-3">
                                        <label for = "eban2" class= "fs-5 fw-bold">Barangay 599 History</label>
                                        <div class="form-floating mb-3">
                                            <textarea type="text" name= "hist" class="form-control" id="edit-about" >
                                            <?php echo $infoArr[6]?>

                                            </textarea>

                                        </div>
                                    </div>
                                    <div class="row justify-content-end" align = "right">
                                        <div class="col-xl-6">
                                        <button type = "submit" name= "saveText" class="btn btn-success" data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                                <i class= 'fa fa-save me-2'></i>Save
                                            </button>
                                            <button type = "reset" class="btn btn-danger">
                                                <i class= "fa fa-redo-alt me-2"></i>Clear
                                            </button>
                                        </div>       
                                    </div>
                                </div>
                                </form>
                        </div>
                    </div>    
                <div class="tab-pane" id = "e-img">
                    <div class="container mb-5 g-0 shadow-sm">
                        <div class="row bg-dark rounded-top">
                            <div class="fs-4 text-white">
                                E-barangay Images
                            </div>
                        </div>
                        <form method= "POST" enctype="multipart/form-data">
                        <div class="row p-4 bg-light justify-content-center align-items-center">
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="row g-0">
                                        <div class="col-md-10 mx-auto" align = "center">
                                            <div class="fs-5 fw-bold">
                                                Barangay 599's Logo
                                            </div>
                                        
                                            <img src="<?php echo $infoArr[2] ?>"  id = "blogo" alt="" class="img-fluid  rounded-circle  rounded ava"  style = "height: 185px">
                                    
                                        </div>
                                    </div>
                                    <div class="row" align = "center">
                                        <div class="col-xl-10 my-2 mx-auto">
                                            <input type="file" id="selectedFile1" name= "bnine"  onchange="loadFile(event,'blogo')" hidden/>
                                            <button type="button"  class= "btn btn-primary" onclick="document.getElementById('selectedFile1').click();" ><i class= "fa fa-camera me-2 "></i>Choose photo</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="row g-0">
                                        <div class="col-md-10 mx-auto" align = "center">
                                            <div class="fs-5 fw-bold">
                                                599's Admin Logo
                                            </div>
                                        
                                            <img src="<?php echo $infoArr[5] ?>" id = "nlogo" alt="" class="img-fluid rounded-circle  ava"  style = "height: 185px">
                                    
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-10 my-2 mx-auto" align = "center">
                                            <input type="file" id="selectedFile3" name= "adnine"  onchange = "loadFile(event,'nlogo') " hidden/>
                                            <button type="button"  class= "btn btn-primary" onclick="document.getElementById('selectedFile3').click();" ><i class= "fa fa-camera me-2 "></i>Choose photo</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="row g-0">
                                        <div class="col-md-10 mx-auto" align = "center">
                                            <div class="fs-5 fw-bold">
                                                City of Manila Logo
                                            </div>
                                            <img src="<?php echo $infoArr[3] ?>"  id = "mlogo" alt="" class="img-fluid rounded-circle ava"  style = "height: 185px">
                                    
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-10 my-2 mx-auto" align = "center">
                                            <input type="file" id="selectedFile2" name="manl"  onchange = "loadFile(event, 'mlogo');" hidden />
                                            <button type="button"  class= "btn btn-primary" onclick="document.getElementById('selectedFile2').click();" ><i class= "fa fa-camera me-2 "></i>Choose photo</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="row g-0">
                                        <div class="col-md-10 mx-auto" align = "center">
                                            <div class="fs-5 fw-bold">
                                                Resident Logo                                            </div>
                                            <img src="<?php echo $infoArr[11] ?>"  id = "rlogo" alt="" class="img-fluid rounded-circle ava"  style = "height: 185px">
                                    
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-10 my-2 mx-auto" align = "center">
                                            <input type="file" id="selectedFile5" name="rlog"  onchange = "loadFile(event, 'rlogo');" hidden />
                                            <button type="button"  class= "btn btn-primary" onclick="document.getElementById('selectedFile5').click();" ><i class= "fa fa-camera me-2 "></i>Choose photo</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-md-2 my-2 " >
                                        
                                        <button type ="submit" name = "saveimg" class= "btn btn-success form-control"><i class= "fa fa-save me-2"></i>Save</button>
                                </div>
                                </div>
                                </form>
                        </div>
                    </div> 
                </div>
                <div class="tab-pane" id = "e-purok">
                    
                    <div class="container mb-5 g-0 shadow-sm">
                        <div class="row bg-dark">
                            <div class="fs-4 text-white">
                                Puroks Management
                            </div>
                        </div>
                        <?php include ('manage-purok.php')?>
                    </div>
                <div class="tab-pane" id = "e-archive">
                    <div class="row g-0 mt-2">             
                        <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle= "tab" href="#ser">Certification</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle= "tab" href="#req">Rental</a>
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
                                <div class="fs-5">Declined Certifications</div>
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
                                                        Type
                                                    </th>
                                                    <th>
                                                        Date
                                                    </th>
                                                    <th>
                                                        Reason
                                                    </th>
                                         
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php
                                
                                                            $sql= "Select tblresident.*, tblcreatecertificate.*, tblcertificate.*
                                                            from tblcreatecertificate
                                                            INNER JOIN tblresident on tblresident.ID = tblcreatecertificate.Userid
                                                            inner join tblcertificate on tblcertificate.ID = tblcreatecertificate.CertificateId
                                                            where tblcreatecertificate.status = 8";
                                                            $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            
                                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                            $nu = 1;
                                                            foreach ($results as $r){
                                                                $cdate = $r->CreationDate;
                                                                echo'
                                                                <tr>
                                                                    <td>'.$nu.'</td>
                                                                    <td scope="col" style = "text-align: left">'.$r->LastName.",".$r->FirstName." ".$r->MiddleName." ".$r->Suffix.'</td>
                                                                    <td>'.$r->CertificateName.'</td>
                                                                    <td>'.date('l, j F Y - h:i A', strtotime($cdate)).'</td>
                                                                    <td>Invalid Credentials</td>
                                                                </tr>
                                                                
                                                                
                                                                ';
                                                                $nu++;
                                                            }
                                                    
                                                    
                                                    
                                                    ?>
                                               
                                                
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
                                <div class="fs-5">Declined Rentals</div>
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
                                                        Reason
                                                    </th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $sql = 'Select tblrental.*, tblcreaterental.*,tblresident.* from tblcreaterental inner join tblresident on tblresident.ID = tblcreaterental.userID inner join tblrental on tblrental.ID = tblcreaterental.rentalID where tblcreaterental.status = 8
                                                    ';
                                                    $query = $dbh->prepare($sql);
                                                            $query->execute();
                                                            
                                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                            $nu = 1;
                                                            foreach ($results as $r){
                                                                $cdate = $r->CreationDate;
                                                                echo'
                                                                <tr>
                                                                    <td>'.$nu.'</td>
                                                                    <td scope="col" style = "text-align: left">'.$r->LastName.",".$r->FirstName." ".$r->MiddleName." ".$r->Suffix.'</td>
                                                                    <td>'.$r->rentalName.'</td>
                                                                    <td>'.date('l, j F Y - h:i A', strtotime($cdate)).'</td>
                                                                    <td>Invalid Credentials</td>
                                                                </tr>
                                                                
                                                                
                                                                ';
                                                                $nu++;
                                                            }
                                                    


                                                
                                                
                                                
                                                ?>
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
                                                November 13 2021 - 04:03 PM
                                                </td>
                                                <td>
                                                    Mismatch Credentials
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
                                                November 13 2021 - 01:03 PM
                                                </td>
                                                <td>
                                                    Trolling Detection
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
                                                    Fake Person Sample  
                                                </td>
                                                
                                                <td>
                                                    November 13 2021 - 04:03 PM
                                                </td>
                                                <td>
                                                    Mismatched Credentials
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    Vert, Lil Uzi
                                                </td>
                                                
                                                <td>
                                                November 13 2021 - 01:03 PM
                                                </td>
                                                <td>
                                                    Trolling Detection
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
                <div class="tab-pane fade show" id="e-pay">
                    <div class="container">

                        <div class="row mb-5">
                            <div class="col-xl-8">
                            <div class="row bg-dark text-white shadow-sm">
                                <div class="fs-5 py-1">Payment Credentials </div>
                            </div>
                        
                            <div class="row  bg-light border shadow-sm">
                                <div class="row justify-content-center">
                                    <?php echo $fileName;?>
                                </div>

                            <form method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="row g-0">
                                        <div class="col-md-10 mx-auto" align = "center">
                                            <div class="row py-2">
                                                <div class="col-12">
                                                <button type= "button" class="btn-primary btn" id= "ed" onclick = "edit('ed')"><i class="fa fa-edit mx-1"></i>Edit</button>
                                                </div>
                                            </div>
                                            <div class="fs-5 fw-bold">
                                                QR code
                                            </div>
                                            <img src="<?php echo $infoArr[10]?>" alt="" id = "output" class="img-fluid border border-info rounded ava"  style = "height: 185px">
                                        </div>
                                    </div>
                                    <div class="row" align = "center">
                                        <div class="col-xl-10 my-2 mx-auto">
                                        <input id='fileid' type='file'name = "qrc" hidden onchange = "loadFile(event,'output')" />
                                            <button id='gbut' type='button'  onclick = "openDialog();"  class = " disabled btn btn-primary mx-1"value='Upload MB' ><i class="fa fa fa-camera mx-1"></i>Choose Photo</button>
                                        <script>          
                                            function openDialog() {
                                                document.getElementById('fileid').click();
                                            }
                                        </script>

                                    </div>
                                </div>
                                <div class="col-xl-12 px-5 ">
                                <div class="row py-5">
                                    <div class="col-xl-6 mx-auto">
                                    <label for="g-cashn" class="fs-5 " >G-cash Name</label>
                                    <div class="input-group" >
                                        <input type="text" value = "<?php echo $infoArr[9]?>" name= "gcname" id = "gnam"class="form-control" readonly>
                                    </div>
                                    <label for="g-cashn" class="fs-5">G-cash Number</label>
                                    <div class="input-group">
                                        <input type="text" value = "<?php echo $infoArr[4]?>"id = "gnum" name= "gcnum"  class="form-control" readonly>
                                        <?php echo $err;?>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 my-4"style= "display:none;" id = "hid">
                                        <div class="float-end">
                                            <div class="btn-group">
                                                <button type = "submit" name= "savepcred" class="btn btn-primary" ><i class="fa fa-save mx-1"></i>Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
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
        
   
<script>

    function edit(divid){
        var nam = document.getElementById('gnam').readOnly;
        var num = document.getElementById('gnum').readOnly;
        var bat = document.getElementById('gbut');
        var hd = document.getElementById('hid').style.display;
        if (nam){
            document.getElementById('gnam').readOnly = false;

        }else{
            document.getElementById('gnam').readOnly = true;
        }
        if (num){
            document.getElementById('gnum').readOnly = false;

        }else{
            document.getElementById('gnum').readOnly = true;
        }
        if(bat.classList.contains('disabled')){
            document.getElementById('gbut').classList.remove('disabled');
        }
        else{
            document.getElementById('gbut').classList.add('disabled');
        }
        if(hd =="block"){
            document.getElementById('hid').style.display  = "none";
       

        }
        else{
            document.getElementById('hid').style.display  = "block";
            
        }
        if(document.getElementById('ed').classList.contains('btn-primary')){
            document.getElementById('ed').classList.remove('btn-primary');
            document.getElementById('ed').classList.add('btn-secondary');
            document.getElementById('ed').innerHTML = "<i class= 'fa fa-times-circle mx-1'></i>Cancel";
        }
        else{
            document.getElementById('ed').classList.add('btn-primary');
            document.getElementById('ed').classList.remove('btn-secondary');
            document.getElementById('ed').innerHTML = "<i class= 'fa fa-edit mx-1'></i>Edit";
        }
        
        
    }
</script>
       <script>
        var loadFile = function (event,imgid) {
        var image = document.getElementById(imgid);
            image.src = URL.createObjectURL(event.target.files[0]);
        };





       </script>

       
 <script src = "../ckeditor/ckeditor.js"></script>
 <script>
     CKEDITOR.replace('edit-about');
 </script>
</body>
</html>
<?php }?>