<?php
    
  
    $connect = mysqli_connect("localhost", "root", "", "clientmsdb");
    $sql ="SELECT * from tbllistpurok";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $ctr =1;

?>

    <style type = "text/css">
      @import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Display:wght@500&display=swap'); 
        .display-5{
            font-family: 'Noto Serif Display', serif;
        }

        .hov:hover{
            transform: scale(1.05);
            transition: .5s;
        }
        .bg-599{
            background: #012f4e;
        }
    
          
                
    </style>
   
    <div class="row bg-light py-3">
    <div class="container ">
        <!--<div class="row">
            <div class="col-xl-12">
                <div class="float-end mb-3 mt-2">
                    <div class="btn-group">
                        <button class="btn-primary btn" data-bs-toggle ="modal" href ="#addpur" type = "button"><i class="fa fa-plus mx-1"></i>Add Purok</button>
                    </div>
                   
                </div>
            </div>
        </div>-->
        
   
        <form action="purok-streets.php" method = "GET">
        <div class="row g-3   justify-content-center">
        <?php  
        foreach($results as $row)
        {
            $ctr ++;
            
            echo ' <button name = "purok" value = "'.$row->pName.'" type= "submit" class= "btn col-xl col-xl-3 col-lg-4 col-md-4 col-sm-12 mx-1  hov rounded col-xs-12 bg-599 px-5 shadow-lg">
                    
            <div class="row">
                    <div class="fs-4 text-center text-white">
                        Purok
                    </div>
                </div>
                <div class="row">
                    <div class="display-5 text-center text-white">
                        '.$row->pName.'
                    </div>
                </div>    
            
            </button>';
        }
            ?> 
       </div>
        </div>
    </form>
    
    </div></div>
    <form method = "POST">
    <div class="modal fade" id="verif" tab-index = "-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content g-0 border-0">
                <div class="modal-header bg-599 border-599  text-white">
                    <div class="modal-title"><i class="fa fa-plus mx-1"></i>Add Purok Verification</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body bg-white">
                    <p class= "fs-5 text-center">You are about to add a new purok to the system, are you sure ?</p>
                    <div class="row">
                            <div class="col-xl-12">
                                <div class="float-end">
                                    <div class="btn-group">
                                        <button class="btn-success btn mx-1" data-bs-toggle= "modal" href= "#fin" data-bs-dismiss= "modal"><i class="fa fa-check mx-1"></i>Confirm</button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn-secondary btn mx-1" data-bs-dismiss="modal"><i class="fa fa-times-circle mx-1"></i>Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="fin" tab-index = "-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content g-0 border-0">
                <div class="modal-header bg-success border-success  text-white">
                    <div class="modal-title"><i class="fa fa-check-circle mx-1"></i>Success</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white">
                    <p class= "fs-5 text-center">You have successfully added a new purok </p>
                    <div class="row">
                            <div class="col-xl-12">
                                <div class="float-end">
                                   
                                    <div class="btn-group">
                                        <button class="btn-success btn mx-1" data-bs-dismiss="modal">Done</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="verif" tab-index = "-1">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content g-0 border-0">
                <div class="modal-header bg-success border-success text-white">
                    <div class="modal-title"><i class="fa fa-question-circle mx-1"></i>Add Purok Verification</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white">
                    <p class= "fs-5 text-center">You are about to add a new purok to the system, are you sure ?</p>
                    <div class="row">
                            <div class="col-xl-12">
                                <div class="float-end">
                                    <div class="btn-group">
                                        <button class="btn-success btn mx-1" data-bs-toggle= "modal" href= "#fin" data-bs-dismiss= "modal"><i class="fa fa-check mx-1"></i>Confirm</button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn-secondary btn mx-1" data-bs-dismiss="modal"><i class="fa fa-times-circle mx-1"></i>Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id = "addpur" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content g-0 border-0 ">
                    <div class="modal-header bg-599 border-599 text-white ">
                        <div class="modal-title" >&nbsp;<i class = "fa fa-eye"></i>&nbsp;&nbsp;Add Purok</div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        <div class="row">
                            <div class="col-xl-6" >
                           
                                <div class="input-group">    
                                    <button class="btn btn-secondary disabled" >
                                    New Purok
                                    </button>
                                    <input readonly type="text" id = "np" value = "<?php echo $ctr ?>" class="form-control me-2" name ="pRate" placeholder= "Rate" style= "text-align:right;">

                                
                               </div> 
                            </div>
                          
                        </div>
                        <div class="row g-0 justify-content-center">     
                            
                                <div class="row g-2 px-2 py-2" style = "max-height: 400px; overflow-y: auto;  ">
                                    <div class="col-lg-12">
                                        <div class="row" >
                                            <div class="col-lg-8">
                                                <div class="input-group mb-3">
                                                    <input type="text" name="str[1]" class="form-control" placeholder="New street 1" >  
                                                   
                                                    <div class="btn-group mx-1"> 
                                                        <button id="addper" type="button" class="btn btn-primary white"><i class= "fa fa-plus me-2"></i> Add Street</button>   
                                                    </div>  
                                                </div>
                                                <div id="newRow2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="float-end">
                                    <div class="btn-group">
                                        <button class="btn-success btn mx-1" data-bs-toggle= "modal" href= "#verif" data-bs-dismiss= "modal"><i class="fa fa-upload mx-1"></i>Upload</button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn-secondary btn mx-1" data-bs-dismiss="modal"><i class="fa fa-times-circle mx-1"></i>Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                                       
                    </div>
             
                </div>
            </div>
        </div>
        </form>
        
    <script type="text/javascript">
        var x = 0;
        // add row
     
        //involved persons
        var g = 2;

        $("#addper").click(function () {
            if (g>=11){
                alert('Over the limit');
           
            }else{
            
            var html = '';
            
                html += '<div id="inputFormRow2">';
                html += '<div class="input-group mb-3">';
                html += '<input type= "text" name="str['+g+']" class="form-control" placeholder="New Street '+g+'">';
                ;
                html += '<div class="input-group-append">';
                html += '<button id="removeper" type="button" class="btn btn-danger">Remove</button>';
                html += '</div>';
                html += '</div>';
                g++;
                $('#newRow2').append(html);
            }
        });

        // remove row
        $(document).on('click', '#removeper', function () {
         
            $(this).closest('#inputFormRow2').remove();
            g--;
            
        });
    </script>
