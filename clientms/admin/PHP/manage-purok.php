<?php
    
  
    $connect = mysqli_connect("localhost", "root", "", "clientmsdb");
    $sql ="SELECT * from tbllistpurok";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
 

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
    <form method = "POST">
    <div class="row bg-light py-3">
    <div class="container ">
        <div class="row">
            <div class="col-xl-12">
                <div class="float-end mb-3 mt-2">
                    <div class="btn-group">
                        <button class="btn-primary btn" data-bs-toggle ="modal" href ="#addpur" type = "button"><i class="fa fa-plus mx-1"></i>Add Purok</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
   
        <form action="purok-streets.php" method = "GET">
        <div class="row g-3   justify-content-center">
        <?php  
        foreach($results as $row)
        {
            
            
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

    <div class="modal fade" id = "addpur" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 border-0 ">
                    <div class="modal-header bg-599 border-599 text-white ">
                        <div class="modal-title" >&nbsp;<i class = "fa fa-eye"></i>&nbsp;&nbsp;Purok</div>
                        
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