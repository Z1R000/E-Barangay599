<?php 
    $curr ="Create Blotter";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $curr;?></title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <link rel = "stylesheet" href="../CSS/sidebar.css" />
    <link rel = "stylesheet" href = "../CSS/table.css"/>
    <link rel= "stylesheet" href = "../CSS/scrollbar.css"/>
	<link rel="icon" href="../IMAGES/Barangay.png" type="image/icon type">

    <style type = "text/css">
      
        label{
            font-family:'Segoe UI';
        }
        body,html{
            height: 100%;
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

    </style>
</head>
<body>

    <?php 
        include ('../includes/sidebar.php');
    ?> 
    <form action="" method = "POST">
            <!--breadcrumb-->
        <div class="container mx-5 mt-3">
            <nav aria-label="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                        <li class="breadcrumb-item"><a  class= "text-decoration-none" href="#"><i class="fa fa-paperclip"></i>&nbsp;Services</a></li>
                        <li class="breadcrumb-item"><a  class= "text-decoration-none" href="admin-blotter.php"><i class="fa fa-gavel"></i>&nbsp;Blotters</a></li>
                        <li class="breadcrumb-item active"><a href="#"><i class="fas fa-paste text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                    </ol>
                </nav>
            </nav>
        </div>
        <div class="container-fluid  mx-auto px-2 py-1">
            <div class="row g-0 p-1">
                <div class="row g-0 justify-content-center">
                    <div class="col-xl-10 px-3">
                        <div class="row g-0 my-2 bg-white shadow-sm">
                            <div class="row border-bottom shadow-sm g-0 rounded-top px-2 py-0 bg-primary">
                                <div class= "fs-5 py-1 white">Step 1: Complaint Details</div>
                            </div>
                            <div class="row px-2 g-2 px-3 pt-2 pb-3">
                                <div class="col-md-5">
                                    <label for="rname"class= "fw-bold fs-6">Complainant Name: </label>
                                    <input type="text" class="form-control" placeholder = "e.g Juan Dela Cruz">
                                    <!--intellisence resident list-->
                                </div>     
                                <div class="col-md-5">
                                  
                                    
                                    <label for="btype"class= "fw-bold fs-6">Incident Type: </label>
                                    <select class="form-select input-sm" id = "btype" aria-label="Default select example">
                                        <option selected>Select Blotter type</option>
                                        <option value="homeowner">Violence</option>
                                        <option value="caretaker">Vehicular Related</option>
                                        <option value="rental">Public Disturbance</option>
                                        <option value="wrelative">Littering</option>
                                    </select>
                                </div>        
                                
                            </div>
                        

                        </div>

                    </div>
                   
                </div>
         
                <div class="row g-0 justify-content-center">
                
                    <div class="col-xl-10  px-3 py-2">
                        <div class="row g-0 my-2 bg-white shadow-sm">
                            <div class="row border g-2 rounded-top px-2 py-0 bg-primary">
                                <div class= "fs-5 py-1 white" id="step-2">Step 2: Respondent/s <span class="fs-6">(attending barangay personnel)</span></div>
                            </div>
                        
                            <div class="row g-2 px-3 py-2">
                                <div class="col-md-10">
                                    <label for="narrative" class= "fw-bold fs-6">Persons Involved: </label><br>
                                    <textarea class= "form-control" type = "text" name="" id="respo"  cols="10" rows="1" style= "resize: none;" placeholder ="e.g Kagawad. Juan Dela Cruz"></textarea>
                                </div>
                                
                            </div>
                    
                        </div>

                    </div>
                </div>

                <div class="row g-0 justify-content-center">
                
                <div class="col-xl-10  px-3 py-2">
                    <div class="row g-0 my-2 bg-white shadow-sm">
                        <div class="row border g-0 rounded-top px-2 py-0 bg-primary">
                            <div class= "fs-5 py-1 white" id="step-2">Step 3: Involved Persons <span class="fs-6">(e.g Juan Dela Cruz, Asiong Salonga..)</span></div>
                        </div>
                    
                        <div class="row g-2 px-3 py-2">
                            <div class="col-md-10">
                                <label for="narrative" class= "fw-bold fs-6">Persons Involved: </label><br>
                                <textarea class= "form-control" type = "text" name="" id="personsinvolved"  cols="10" rows="1" style= "resize: none;" placeholder ="Enumerate Involved person/s"></textarea>
                            </div>
                            
                        </div>
                
                        </div>

                    </div>
                </div>
            

                <div class="row g-0 justify-content-center">
                
                    <div class="col-xl-10  px-3 ">
                        <div class="row g-0 my-2 bg-white shadow-sm">
                            <div class="row border g-0 rounded-top px-2 py-0 bg-primary">
                                <div class= "fs-5 py-1 white" id="step-2">Step 4: Incident Information <span class="fs-6">(Details regarding the incident)</span></div>
                            </div>
                            
                            <div class="row g-0 py-2 px-3">
                                
                                <div class="col-md-5 ms-2">
                                  
                                    
                                  <label for="btype"class= "fw-bold fs-6">Status </label>
                                  <select class="form-select input-sm" id = "btype" aria-label="Default select example">
                                  
                                     
                                      <option value="og">On going</option>
                                      <option value="settled">Settled</option>
                                      <option value="dismissed">Dismissed</option>
                                  </select>
                              </div>   
                                
                       

                                
                            </div>
                           
                            <div class="row g-0 py-2 px-3">
                                
                                <div class="col-md-5 ms-2 ">
                                    
                                    <label for="narrative" class= "fw-bold fs-6">Incident Date and time</label>
                                    <input type="datetime-local" class="form-control" name='inciDate-start'>
                

                                </div>
                                <div class="col-md-5 ms-2">
                                    <label for="narrative" class= "fw-bold fs-6">Incident Location</label>
                                    <input type="text" class="form-control" name='inciAdd' placeholder='e.g Near Purok 2 along the road'>
                
                                </div>
                                
                       

                                
                            </div>
                            <div class="row g-0 px-3 py-2">
                                <div class="col-md-12 mb-3">
                                    <label for="narrative" class= "fw-bold fs-6">Incident Narrative </label><br>
                                    <textarea class= "form-control" type = "text" name="" id="narrative"   rows="6" style= "resize: none;" placeholder ="Complainant's Summary"></textarea>
                                  
                                </div>
                                
                            </div>
                            <div class="row g-0 ">
                                    <div class="col-md-8">

                                    </div>
                                    <div class="col-md-4 col-sm-12 p-3">
                                        <div class="float-end">
                                            <button type="button" href="#submit-record"  data-bs-toggle ="modal" role="modal"  class="btn btn-success">Submit</button>
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
    <div class="modal fade" id = "submit-record" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 " style="background: #021f4e;">
                    <div class="modal-header  white " style="background: #021f4e;">
                        <h5 class="modal-title" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;New Blotter Record</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row">
                            <div class="col xl-4" align = "center">
                                <i class="fa fa-suitcase"  style ="width: 10%;"></i>
                            </div>
                    
                        </div>
                        <div class="row">
                            <p class = "fs-5 text-center">You are about to add a new record of blotter in the system. By clicking yes you attest to the legibility and credibility of the information supplied by the complainant.  Once saved some information will be unchangeable. <br><span class="text-muted fs-6"></span></p>
                        </div>
                        <div class="row justify-content-center" align = "center">
                            
                                <button type = "button" class="btn btn-success rounded my-1" data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                    Yes I am certain
                                </button>
                                <button type = "button" class="btn btn-danger rounded" data-bs-dismiss = "modal"  name = "no" value ="No">
                                    No I am not
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
    <!--<script src = "../ckeditor/ckeditor.js"></script>
    <script>
        
        CKEDITOR.replace('narrative')
        
    </script>-->
</html>