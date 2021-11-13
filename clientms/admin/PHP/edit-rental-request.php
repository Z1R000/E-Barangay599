<?php 
    $curr ="Manage Rental";

    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['clientmsaid']==0)) {
    header('location:logout.php');
    }else{
        $sql= "Select tblcreaterental.ID as rid, tblresident.FirstName, tblresident.LastName,tblresident.MiddleName, tblresident.Suffix, tblcreaterental.status, tblcreaterental.rentalStartDate, tblcreaterental.rentalEndDate, tblcreaterental.creationDate, tblpurposes.Purpose, tblrental.rentalName, tblrental.rentalPrice, tblcreaterental.payable from tblcreaterental join tblresident on tblresident.ID = tblcreaterental.userID join tblrental on tblrental.ID = tblcreaterental.rentalID join tblpurposes on tblpurposes.ID = tblcreaterental.purpID and tblcreaterental.ID = ".$_GET['id'].";";
        $query = $dbh ->prepare($sql);
        $query ->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        $arr= [];

        foreach ($result as $r){
            $cdate = $r->creationDate;
            $sdate = $r->rentalStartDate;
            $edate = $r->rentalEndDate;
            array_push($arr,$r->ID);
            array_push($arr,$r->LastName.", ".$r->FirstName." ".$r-> MiddleName." ".$r->Suffix);
            array_push ($arr, $r->Purpose);
            array_push($arr,date("j F Y",strtotime($cdate)));
            array_push($arr,date("j F Y - h:i A",strtotime($sdate)));
            array_push($arr,date("j F Y - h:i A",strtotime($edate)));
            array_push($arr, $r->payable);
            array_push($arr,$r->rentalName);
            array_push($arr,$r->mode);
            array_push($arr,$r->status);
            


        }

        //$sql= "UPDATE tblcreaterental SET purpID = '".$_POST['purp']."', = '".$_POST['payable']."' WHERE `tblcreaterental`.`ID` = ;";
    
        

       

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
        $('#rrecord').DataTable( {
        dom: 'Bfrtip',
         buttons: {
            buttons:[
                {
                    extend: 'print',
                    title:'',
                    text: 'Generate Report',
                    message:'The following data are reports of the rentals catered today by Barangay 599',
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
    $('#rpay').DataTable();
    } );
    </script>
    <script>
    $(document).ready(function() {
    $('#rlist').DataTable();
    } );
    </script>

	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
  

        #size{
            width: 10%;
        }

        @media (max-width: 576px){
         
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
                <div class="container  mt-3">
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="float-end">
                <div class="btn-group">
                <a type ="button" role = "button" href = "admin-rental-request.php"class="btn btn-secondary px-2" data-bs-dismiss= "modal" >
                                                    <i class="fa fa-arrow-circle-left mx-1"></i>
                                                            Go back
                                                    </a>
                
                                                    </div>
                                                                                </div>
            </div>
        </div>
    </div>
     <!--breadcrumb-->
    <div class="container-fluid p-5 ">
        <div class="row">
            <div class="col-xl-8   mx-auto">
                <div class="row gx-3 bg-599 border-599 text-white">
                    <div class="fs-5">Rental Record</div>
                </div>
                <div class="row gx-3 border-start border-end border-bottom shadow-sm">
                    <div class="col-xl-12 p-3" >
                        <div class="row ">
                            <div class="col-xl-6 ">
                                <label for="prate" class="fs-5 fw-bold">Requestor Name</label>
                                    <div class="input-group">    
                                        <input readonly  type="text"  id = "search" value = "<?php echo $arr[1]; ?>" class="form-control" name ="pRate" placeholder= "">
                                    </div>
                                    

                                    <div class="col" style= "z-index: 9;position:relative">
                                            <div class="list-group w-100"  id="show-list" style="position: absolute">
                                            <!-- Here autocomplete list will be display -->
                                            </div>
                                            </div>
                                </div>
                                <div class="col-xl-6">
                                    <label for="purp" class= "fs-5 fw-bold">Purposes</label>
                                    <?php
                                        
                                        $sql = 'SELECT * FROM tblpurposes where serviceType = "rental"';
                                        $query= $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    
                                        $opt = "<option  selected disabled>Purposes</option>";
                                        foreach($results as $row){
                                            if ($row->Purpose == $arr[2] ){
                                                $opt .= '<option  value ="'.$row->ID.'" selected>'.$row->Purpose.'</option>';
                                              
                                            }
                                            $opt .= '<option  value ="'.$row->ID.'" >'.$row->Purpose.'</option>';
                                           
                                        }
                                       
                                    
                                    
                                    ?>
                                        <select class= " form-select"disabled  name="purp" id="purp" onchange = "showotherEdit('othersed',this);">                  
                                                <?php echo $opt; ?>
                                        </select>
                                    <div class="col-xl-12" id ="othersed" style= "display : none ">
                                        <label for="purp" class= "fs-6 fw-bold">Purpose </label>
                                        <input type="text" class="form-control" placeholder = "Specify purpose here">
                                    </div>                                      
                                </div>
                            </div>
                                <div class="row gy-2">
                                    <div class="col-xl-3" >
                                        <label for="prate" class="fs-5 fw-bold">Rental Date</label>
                                            <input type="text" id = "date" class="form-control " value = "<?php echo $arr[3]; ?>" name ="date" readonly>
                                    </div>
                                    <div class="col-xl-9" >
                                        <div class="row ">
                                        <label for="prate" class="fs-5 fw-bold">Rental Duration</label>
                                            <div class="input-group">
                                                <button class="btn btn-secondary disabled">From</button>
                                                    <input readonly type="text" readonly value = "<?php echo $arr[4]; ?>"class="form-control">
                                                    <button class="btn btn-secondary disabled">to</button>
                                                    <input readonly type="text" readonly value = "<?php echo $arr[5]; ?>"class="form-control">
                                                    <button type= "button" class="btn btn-outline-primary  " id = "edit2" onclick = "newDuration('editStarttoEnd','edit2')"><i class="fa fa-edit" disabled></i></button>     
                                                </div>
                                                <div class="col" style = "display:none" id ="editStarttoEnd">
                                                    <label for="purp" class= "fs-5 fw-bold">New Duration </label>
                                                <div class="input-group">
                                                    <button class="btn btn-secondary disabled">From</button>
                                                    <input readonly name= "newEnd" type="datetime-local" class="form-control" placeholder = "Specify purpose here">
                                                    <button class="btn btn-secondary disabled">to</button>
                                                    <input readonly name = "newStart" type="datetime-local" class="form-control" placeholder = "Specify purpose here">
                                                </div>
                                                </div> 
                                            </div>
                                    </div>
                                    </div>
                                    
                                        
                                    <div class="row">
                                        <div class="col-xl-6" >  
                                            <?php
                                                $sql = 'SELECT * FROM tblrental';
                                                $query= $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            
                                                $prp = "<option  selected disabled>Property</option>";
                                                foreach($results as $row){
                                                    if ($row->rentalName == $arr[7] ){
                                                        $prp .= '<option  value ="'.$row->ID.'" selected>'.$row->rentalName.'</option>';
                                                        
                                                    }else{
                                                        
                                                        $prp .= '<option  value ="'.$row->ID.'" >'.$row->rentalName.'</option>';
                                                    }
                                                }   
                                            
                                            
                                            ?>
                                                <label for="status" class="fs-5 fw-bold">Property to rent</label>
                                                <select name="rtype" class="form-select action" id="rtype" disabled>
                                                    <?php echo $prp; ?>
                                                </select>

                                                
                                        </div>
                                        <div class="col-xl-6" >
                                            <label for="prate" class="fs-5 fw-bold">Rate<span class= "text-muted fs-6">(per hour)</span></label>
                                            <div class="input-group" id = "result">
                                                <button class="btn btn-secondary disabled">₱</button>    
                                                <input type= "text" name="rprice" id="rprice" style= "text-align:right" value = "<?php echo $arr[6]; ?>"class="form-control action" disabled>
                                                 
                                                
                                            </div> 
                                            </div>
                                                                                
                                        </div>                
                                        <div class="row">
                                            <div class="col-xl-6" >  
                                                <?php
                                                    $sql= "Select * from tblmodes";
                                                    $query = $dbh->prepare($sql);
                                                    $query -> execute();

                                                    $result = $query->fetchAll(PDO::FETCH_OBJ);
                                                    $mod = "";
                                                    foreach($result as $row){
                                                        if ($arr[8]== $row->mode){
                                                            $mod.= '<option selected value="'.$row->ID.'">'.$row->mode.'</option>';
                                                        }
                                                        else{
                                                            $mod.= '<option value="'.$row->ID.'">'.$row->mode.'</option>';
                                                        }
                                                    }
                                                
                                                ?>
                                                <label for="status" class="fs-5 fw-bold">Mode of payment</label>
                                                    <select name="" class="form-select" id="status" disabled>
                                                       <?php   echo $mod; ?>
                                                    </select>
                                            </div>
                                            <div class="col-xl-6" >
                                                <?php
                                                    $sql = "select * from tblstatus where id = 1 OR id = 2 or id = 6";
                                                    $query = $dbh->prepare($sql);
                                                    $query -> execute();

                                                    $result = $query->fetchAll(PDO::FETCH_OBJ);
                                                    $stat = "";
                                                    foreach($result as $r){
                                                       
                                                        
                                                        if ($arr[9] == $r->status){
                                                            $stat.='<option value="'.$r->ID.'" selected>'.$r->statusName.'</option>';
                                                        }
                                                        else{
                                                            $stat.='<option value="'.$r->ID.'">'.$r->statusName.'</option>';
                                                        }
                                                        
                                                    }
                                                
                                                
                                                ?>
                                                    <label for="prate" class="fs-5 fw-bold">Rental Status</label>
                                                    <select name="" class="form-select" id="status" >
                                                           <?php echo $stat; ?>       
                                                    </select>
                                            </div>
                                                                
                                            <div class="row g-0" align= "right">
                                                <div class="col-md-12  px-3 mx-auto my-2">
                                                    <button type ="button" role = "button" class="btn btn-success px-2" >
                                                    <i class= "fa fa-check mx-1"></i>Approve</button>
                                                    <button type ="button" role = "button" href = ""class="btn btn-danger px-2" data-bs-dismiss= "modal" >
                                                    <i class="fa fa-trash mx-1"></i>
                                                            Decline
                                                    </button>
                                                  
                                                    
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
    </div>
    <?php
        include('services.php');
    ?>
    <div class="modal fade" id = "delete-rental" tab-idndex = "-1">
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
                            <p class = "fs-4 text-center">You are about to delete an existing record, do you wish to continue?<br><span class="text-muted fs-6">*Select (<i class = "fa fa-check">)</i> if certain</span></p>
                        </div>
                        <div class="row justify-content-center" align = "center">
                            <form method = "POST" action = "#">
                            <div class="col-xl-12">
                                <div class="float-end">
                                    <div class="btn-group">
                                        <button type = "button" class="btn btn-success " data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                    <i class= 'fa fa-check mx-1'></i>Confirm
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
</script>
<script type="text/javascript">
    function showDiv(divId, element) {
        document.getElementById(divId).style.display = element.value == 'Business' ? 'flex' : 'none';
    }
    function showOthersdec(divId, element) {
        document.getElementById(divId).style.display = element.value == 'others' ? 'flex' : 'none';
    }
    function showOtherspurp(divId, element) {
        document.getElementById(divId).style.display = element.value == 'others' ? 'flex' : 'none';
    }
    function showOthers(divId, element) {
        document.getElementById(divId).style.display = element.value == 'others' ? 'block' : 'none';
    }
    function showotherEdit(divId, element) {
        document.getElementById(divId).style.display = element.value == '13' ? 'block' : 'none';
    }
    function newDuration(divid,element) {
        var ebut = document.getElementById(element);
        if (document.getElementById(divid).style.display == "none"){
            document.getElementById(divid).style.display = "block";
        }
        else{
            document.getElementById(divid).style.display = "none";
            
        }
        if(document.getElementById(element).classList.contains('btn-outline-primary')){
            document.getElementById(element).classList.remove('btn-outline-primary');
            document.getElementById(element).classList.add('btn-outline-secondary');
            document.getElementById(element).innerHTML = "<i class= 'fa fa-times-circle mx-1'></i>";
        }
        else{
            document.getElementById(element).classList.add('btn-outline-primary');
            document.getElementById(element).classList.remove('btn-outline-secondary');
            document.getElementById(element).innerHTML = "<i class= 'fa fa-edit mx-1'></i>";
        }
        

        
    }
</script>
<script>
$(document).ready(function () {
  // Send Search Text to the server
  $("#search").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "searchname.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
          $("#show-list").html(response);
        },
      });
    } else {
      $("#show-list").html("");
    }
  });
  $(document).on("click", "#clicks", function () {
    $("#search").val($(this).text());
    $("#show-list").html("");
  });
});


  </script>
   <script>
$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "rtype")
   {
    result = 'rprice';
   }
   $.ajax({
    url:"fetchdata.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#result').html(data);
    }
   })
  }
 });
});



    </script>
 


</body>
</html>
<?php } ?>