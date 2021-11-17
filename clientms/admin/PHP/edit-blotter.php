<?php 
    $curr ="Edit Blotter Record";
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
   
    <?php include('link.php');?>

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
                                <li class="breadcrumb-item"><a  class= "text-decoration-none" href="#service-choice" data-bs-toggle= "modal" role ="button"><i class="fa fa-hand-paper"></i>&nbsp;Services</a></li>
                                <li class="breadcrumb-item"><a  class= "text-decoration-none" href="admin-blotter.php"><i class="fa fa-gavel"></i>&nbsp;Blotters</a></li>
                            
                            
                                <li class="breadcrumb-item active"><a href="#"><i class="fa fa-paste text-muted"></i></a>&nbsp;<?php echo $curr;?></li>
                            </ol>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
    <?php 
        $bid = $_GET['bid'];
        
        $sql = 'SELECT * from tblblotter where ID ="'.$bid.'"';  
        $query = $dbh -> prepare($sql);
        $query->execute();
        $results =$query->fetchAll(PDO::FETCH_OBJ);
        foreach ($results as $row){
            $idate = $row->$incedentDate;
            $idate = date('l, j F Y - h:i A', strtotime($idate));
        }
    ?> 
    <form action="" method = "POST">
    
        <div class="container-fluid  mx-auto px-2 py-1  mb-5">
            <div class="row g-0 p-1">
                <div class="row g-0 justify-content-center">
                    <div class="col-xl-10 px-3">
                        <div class="row g-0 my-2 bg-white border shadow-sm">
                            <div class="row border-bottom  g-0 rounded-top px-2 py-0 bg-599">
                                <div class= "fs-5 py-1 white">Step 1: Complaint Details</div>
                            </div>
                            <div class="row px-2 g-2 px-3 pt-2 pb-3 ">
                            <div class="col-md-5">
                                        <label for="crstatus" class="fw-bold fs-6">Complainant Type: </label>
                                        <select class="form-select" name="crstatus" aria-label="Default select example" disabled>
                                            <option value="<?php echo $row->compStatus?>" selected><?php echo $row->compStatus?></option>
                                        </select>
                                    </div>
                                <div class="col-md-5">
                                    <label for="rname"class= "fw-bold fs-6">Complainant Name: </label>
                                    <input type="text" name= "comp" value = "<?php echo $row->complainant?>" class="form-control" placeholder = "e.g Juan Dela Cruz" disabled>
                                    <!--intellisence resident list-->
                                </div>     
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-0 justify-content-center">
                    <div class="col-xl-10  px-3 py-2">
                        <div class="row g-0 my-2 border bg-white shadow-sm">
                            <div class="row border g-0 rounded-top px-2 py-0 bg-599">
                                <div class= "fs-5 py-1 white" id="step-2">Step 2: Attending barangay personnel <span class="fs-6"></span></div>
                            </div>
                        
                            <div class="row g-2 px-3 py-2" style = "max-height: 400px; overflow-y: auto;  ">
                            
                            <div class="col-md-10 form_field_outer p-0 form_sec_outer_task ">
                                        <div class="row form_field_outer_row">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                <div class="input-group mb-3">
                                                <h3><em>Number of Kagawad Involved: </em></h3><input type="text" id='numberkag' name="numberkag" value="1" readonly class="form-control" style="width: 7%; text-align: center;"></div>
                                                    <br>
                                                    <div id="inputFormRow">
                                                        <div class="input-group mb-3">
                                                            <input type="text" name="kag1" id="search" class="form-control action" placeholder="Personnel">
                                                            

                                                            <div class="btn-group mx-2">
                                                                <button id="addkag" type="button" class="btn btn-primary "><i class="fa fa-plus me-2"></i>Add Respondent</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div id="newRow"></div>
                                                    
                                                </div>
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
                        <div class="row g-0 my-2 bg-white border shadow-sm">
                            <div class="row border g-0 rounded-top px-2 py-0 bg-599">
                                <div class="fs-5 py-1 white" id="step-2">Step 3: Involved Persons <span class="fs-6">(e.g Juan Dela Cruz, Asiong Salonga..)</span></div>
                            </div>

                            <div class="row g-2 px-2 py-2" style="max-height: 400px; overflow-y: auto;  ">
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-8">
                                        <div class="input-group mb-3">
                                                <h3><em>Number of Person Involved: </em></h3><input type="text" id='numberper' name="numberper" value="<?php echo $row->numpers?>" readonly class="form-control" style="width: 7%; text-align: center;"></div>
                                            <div class="input-group mb-3">
                                                <input type="text" name="per1" class="form-control" placeholder="Involved person">

                                                <div class="btn-group mx-1">
                                                    <button id="addper" type="button" class="btn btn-primary white"><i class="fa fa-plus me-2"></i> Add Involved</button>
                                                </div>
                                            </div>
                                            <div id="newRow2"></div>
                                        </div>
                                    </div>
                                </div>
                            </diV>
                        </div>
                    </div>
                </div>
                

                <div class="row g-0 justify-content-center">
                
                    <div class="col-xl-10  px-3 ">
                        <div class="row g-0 my-2 bg-white border shadow-sm">
                            <div class="row border g-0 rounded-top px-2 py-0 bg-599">
                                <div class= "fs-5 py-1 white" id="step-2">Step 4: Incident Information <span class="fs-6">(Details regarding the incident)</span></div>
                            </div>
                            
                            <div class="row gx-3 py-2 px-3">
                                
                             
                              <div class="col-md-5">
                                    <?php    
                                        $sql = 'SELECT * from tblbtype ';  
                                        $query = $dbh -> prepare($sql);
                                        $query->execute();
                                        $results =$query->fetchAll(PDO::FETCH_OBJ);
                                        $bty = '';
                                        foreach($results as $row){
                                            if ($arr[2]==$row->btype){
                                                $bty.= '<option value = "'.$arr[2].'"selected>'.$row->btype.'</option>';
                                            }
                                            else{
                                                $bty.= '<option value = "'.$row->btype.'">'.$row->btype.'</option>';

                                            }
                                        }
                                    ?>
                                    <label for="btype"class= "fw-bold fs-6">Incident Type: </label>
                                    <select class="form-select input-sm" id = "btype" aria-label="Default select example">
                                        <?php echo $bty; ?>
                                    </select>

                                </div>    
                         
                                
                       

                                
                            </div>
                           
                            <div class="row gx-3 py-2 px-3">
                                <div class="col-md-5 ms-2 ">
                                    <label for="narrative" class= "fw-bold fs-6">Incident Date and time</label>
                                    <input type="text" class="form-control" name='inciDate-start' value = "<?php echo $arr[3]?>" disabled>
                                </div>
                                <div class="col-md-5 ms-2">
                                    <label for="narrative" class= "fw-bold fs-6">Incident Location</label>
                                    <input type="text" class="form-control" value = "<?php echo $arr[4]; ?>"name='inciAdd' placeholder='e.g Near Purok 2 along the road'>
                
                                </div>
                                
                       

                                
                            </div>
                            <div class="row g-0 px-3 py-2">
                                <div class="col-md-12 mb-3">
                                    <label for="narrative" class= "fw-bold fs-6">Incident Narrative </label><br>
                                    <textarea class= "form-control" type = "text" name="" id="narrative"   rows="6" style= "resize: none;" placeholder ="Complainant's Summary"><?php echo $arr[5]; ?></textarea>
                                  
                                </div>
                                
                            </div>
                            <div class="row g-0 ">
                                    <div class="col-md-8">

                                    </div>
                                    <div class="col-md-12 col-sm-12 p-3">
                                        <div class="float-end">
                                            <div class="btn-group">
                                            <button type="button" href="#submit-record"  data-bs-toggle ="modal" role="modal"  class="btn btn-primary"><i class="fa fa-save mx-1"></i> Save</button>
                                            </div>
                                            <div class="btn-group">
                                            <a type="button"  data-bs-toggle ="modal" role="modal" href = "admin-blotter.php"  class="btn btn-secondary"><i class="fa fa-arrow-circle-left mx-1"></i> Back</a>
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
    </form>
    <?php
        include('services.php');
    ?>
    <div class="modal fade" id = "submit-record" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered border-0 modal-md">
                <div class="modal-content g-0 border-0">
                    <div class="modal-header  border-599 bg-599 white ">
                        <div class="modal-title" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Update Blotter Record Verification</div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row">
                            <div class="col xl-4" align = "center">
                                <i class="fa fa-suitcase"  style ="width: 10%;"></i>
                            </div>
                        </div>
                        <div class="row">
                            <p class = "fs-5 text-center">You are about to override data recorded for this blotter case, Are you certain. <br><span class="text-muted fs-6"></span></p>
                        </div>
                        <div class="row justify-content-center" align = "center">
                            <div class="col-xl-12">
                                <div class="float-end">
                                <div class="btn-group">
                                <button type = "button" class="btn btn-success rounded my-1" data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                    Yes, I am certain
                                </button>
                                </div>
                                <div class="btn-group">
                                <button type = "button" class="btn btn-danger rounded" data-bs-dismiss = "modal"  name = "no" value ="No">
                                    No, I am not
                                </button>
                                </div>  
                                </div>
                            </form>
                            </div>
                        </div>
                
                    </div>
                   
                </div>
            </div>
        </div>
        

        <script type="text/javascript">
            var x = 2;
            // add row
            $("#addkag").click(function() {
                if (x > 7) {
                    alert('There are only 7 kagawads');
                } else {

                    var html = '';

                    html += '<div id="inputFormRow">';
                    html += '<div class="input-group mb-3">';
                    html += '<input type="text" name="kag' + x + '" placeholder="Personnel" class="form-control action">';
                    html += '<div class="input-group-append">';
                    html += '<button id="removekag" type="button" class="btn btn-danger">Remove</button>';
                    html += '</div>';
                    html += '</div>';
                    x++;
                    document.getElementById('numberkag').value++;
                    $('#newRow').append(html);
                }
            });

            // remove row
            $(document).on('click', '#removekag', function() {
                $(this).closest('#inputFormRow').remove();
                x--;
                document.getElementById('numberkag').value--;
            });

            //involved persons
            var g = 2;

            $("#addper").click(function() {
                if (g > 50) {
                    alert('Over the limit');

                } else {

                    var html = '';

                    html += '<div id="inputFormRow2">';
                    html += '<div class="input-group mb-3">';
                    html += '<input type= "text" name="per' + g + '" class="form-control" placeholder="Involved Person">';;
                    html += '<div class="input-group-append">';
                    html += '<button id="removeper" type="button" class="btn btn-danger">Remove</button>';
                    html += '</div>';
                    html += '</div>';
                    g++;
                    document.getElementById('numberper').value++;
                    $('#newRow2').append(html);
                }
            });

            // remove row
            $(document).on('click', '#removeper', function() {

                $(this).closest('#inputFormRow2').remove();
                g--;
                document.getElementById('numberper').value--;

            });
        </script>

</body>
</html>
<?php } ?>