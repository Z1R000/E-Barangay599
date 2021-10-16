<?php 
    $curr ="Edit Blotter";
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
 
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <link rel = "stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../CSS/scrollbar.css">
    <link rel="stylesheet" href="../css/dominp.css"/>

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

       table,tr,td,th{
            border: 1px solid grey;
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

<div class="d-flex align-items-center">
                <div class="container  mt-3">
                    <nav aria-label="breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class= "text-decoration-none" href="admin-dashboard.php"><i class="fa fa-tachometer-alt"></i>&nbsp;Dashboard</a></li>
                                <li class="breadcrumb-item"><a  class= "text-decoration-none" href="#service-choice" data-bs-toggle= "modal" role ="button"><i class="fa fa-paperclip"></i>&nbsp;Services</a></li>
                                <li class="breadcrumb-item"><a  class= "text-decoration-none" href="admin-blotter.php"><i class="fa fa-gavel"></i>&nbsp;Blotters</a></li>
                            
                            
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-paste text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav> 
    <form action="" method = "POST">
 
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
                            <div class="row border g-0 rounded-top px-2 py-0 bg-primary">
                                <div class= "fs-5 py-1 white" id="step-2">Step 2: Respondent/s <span class="fs-6">(attending barangay personnel)</span></div>
                            </div>
                        
                            <div class="row g-2 px-3 py-2">
                            
                                <div class="col-md-10 form_field_outer p-0 form_sec_outer_task " >
                                    <div class="row form_field_outer_row"  style= "max-height: 400px;">
                                       
                                    <div class="row">
                                            <div class="col-lg-5">
                                                <div id="inputFormRow">
                                                    <div class="input-group mb-3">
                                                        <Select type="text" name="kag[]" class="form-select" placeholder="" >
                                                                <option value="">--Kagawad--</option>
                                                                <option value="">Kagawad 1</option>
                                                                <option value="">Kagawad 2</option>
                                                        </select>
                                                                    
                                                            <button id="removekag" type="button" class="btn btn-danger" disabled>Remove</button>
                                                 
                                                    </div>
                                                </div>

                                                <div id="newRow"></div>
                                                <button id="addkag" type="button" class="btn btn-info white"><i class= "fa fa-plus me-2"></i>Add Respondent</button>
                                            </div>
                                        </div>
                                       
                                        </div>
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
                    
                        <div class="row g-2 px-2 py-2">
                       
                            <div class="col-lg-4">
                                <div class="input-group mb-3">
                                    <input type="text" name="kag[]" class="form-control" placeholder="Involved person 1" >            
                                    <button id="removeper" type="button" class="btn btn-danger" disabled>Remove</button>         
                                </div>
                                <div id="newRow2"></div>
                                        <button id="addper" type="button" class="btn btn-info white"><i class= "fa fa-plus me-2"></i> Add Involved</button>
                                </div>
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
                                            <button type="button" href="#submit-record"  data-bs-toggle ="modal" role="modal"  class="btn btn-primary"><i class= "fa fa-save me-2"></i>Save</button>
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
    <?php
        include('services.php');
    ?>
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
                            <p class = "fs-5 text-center">You are about to add a new record of blotter in the system. By clicking yes you attest to the legibility, truthfullness and credibility of the information supplied by the complainant.  Once saved some information will be unchangeable. <br><span class="text-muted fs-6"></span></p>
                        </div>
                        <div class="row justify-content-center" align = "center">
                            
                                <button type = "button" class="btn btn-success rounded my-1" data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                    Yes, I am certain
                                </button>
                                <button type = "button" class="btn btn-danger rounded" data-bs-dismiss = "modal"  name = "no" value ="No">
                                    No, I am not
                                </button>
                            </form>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
        

    <script type="text/javascript">
        var x = 0;
        // add row
        $("#addkag").click(function () {
            if (x>=6){
                alert('There are only 7 kagawads');
            }else{
            
            var html = '';
            
                html += '<div id="inputFormRow">';
                html += '<div class="input-group mb-3">';
                html += '<select name="kag['+x+']" class="form-select" placeholder="Enter title"><option value ="">Kagawad 1</option><option value ="">Kagawad 2</option><option value ="">Kagawad 2</option></select>'
                ;
                html += '<div class="input-group-append">';
                html += '<button id="removekag" type="button" class="btn btn-danger">Remove</button>';
                html += '</div>';
                html += '</div>';
                x++;
                $('#newRow').append(html);
            }
        });

        // remove row
        $(document).on('click', '#removekag', function () {
            $(this).closest('#inputFormRow').remove();
        });

        //involved persons
        var g = 2;

        $("#addper").click(function () {
            if (g>=6){
                alert('Over the limit');
           
            }else{
            
            var html = '';
            
                html += '<div id="inputFormRow2">';
                html += '<div class="input-group mb-3">';
                html += '<input type= "text" name="per['+g+']" class="form-control" placeholder="Involved Person '+g+'">';
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

</body>
</html>