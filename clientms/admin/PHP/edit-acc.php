<div class="modal fade" id = "account" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content bg-dark g-0  ">
                    <div class="modal-header bg-dark  ">
                        <h4 class="modal-title text-white"><i class= "fa fa-cog text-secondary"></i> E-barangay Account Settings</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#ebgy" data-bs-toggle= "tab">E-barangay Account</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#person"data-bs-toggle= "tab">Personal Details</a>
                    </li>
                 
                    </ul>
                    <div class="tab-content ">
                        <div class="tab-pane active" id="ebgy">
                            <div class="row justify-content-center">
                                <div class="col-md-10 mt-4">
                                    <div class="row" align="center">
                                        <!--<div class="col-xl-12 my-3">
                                            <img src="../images/admin-logo.png" alt="" class="img-fluid border border-info rounded ava"  style = "height: 185px">
                                        </div>-->
                                        <!--<div class="col-xl-12 my-2">
                                        <input type="file" id="selectedFile" style="display: none;" />
                                        <button type="button"  class= "btn btn-primary" onclick="document.getElementById('selectedFile').click();" ><i class= "fa fa-camera me-2 "></i>Choose photo</button>
                                
                                        </div>-->
                                      
                                    </div>
                                        
                                    <div class="input-group">
                                        <input type="text" id = "fulname"class="form-control" placeholder = "Officials Name" style= "text-align:center;font-size: 1.4em;" readonly>
                                        <button class="btn btn-info text-white" onclick = "ful()" type ="button">
                                            <i class="fa fa-edit">

                                            </i>
                                        </button>
                                        <script>
                                                    function ful(){
                                                        var ps = document.getElementById('fulname').readOnly;

                                                        if (ps){
                                                            document.getElementById('fulname').readOnly = false;
                                                        }
                                                        else{
                                                            document.getElementById('fulname').readOnly = true;
                                                        }
                                                    }
                                                </script>
                                    

                                    </div>
                                    <div class="row justify-content-center text-center my-2">
                                        <h3>Day of Duty</h3>
                                        <div class="col-xl-12" align ="center">
                                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                            <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btncheck1">Monday</label>

                                            <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btncheck2">Tuesday</label>

                                            <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btncheck3">Wednesday</label>
                                            
                                            
                                        </div>
                                        <div class="col-xl-12 my-2">
                                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                            <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btncheck4">Thursday</label>

                                            <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btncheck5">Friday</label>

                                            <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btncheck6">Saturday</label>
                                            
                                            <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="btncheck7">Sunday</label>
                                            
                                        </div>

                                        </div>

                                        </div>
                                    </div>
                                   
                    
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 text-center">

                                            <label for="email" class="fs-5 text-secondary">Email Address</label>
                                            <div class="input-group">
                                                <input type="text" id = "email"class="form-control" placeholder = "e.g chairman@gmail.com" readonly>
                                                <button type= "button" name= "edit-em"class="btn btn-info" onclick = 'em()'>
                                                    <i class= "fa fa-edit text-white"></i>
                                                </button>

                                            </div>

                                            <script>
                                                    function em(){
                                                        var ps = document.getElementById('email').readOnly;

                                                        if (ps){
                                                            document.getElementById('email').readOnly = false;
                                                        }
                                                        else{
                                                            document.getElementById('email').readOnly = true;
                                                        }
                                                    }
                                                </script>
                                            
                                        
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 text-center">
                                            <label for="pas" class="fs-5 text-secondary">Password</label>
                                            <div class="input-group">
                                                <input type="text" id = "pas" class="form-control" placeholder = "123456" readonly >
                                                <button type= "button" name= "editpas" class="btn btn-info" onclick = 'pas()' >
                                                    <i class= "fa fa-edit text-white"></i>
                                                </button>
                                                <script>
                                                    function pas(){
                                                        var ps = document.getElementById('pas').readOnly;

                                                        if (ps){
                                                            document.getElementById('pas').readOnly = false;
                                                        }
                                                        else{
                                                            document.getElementById('pas').readOnly = true;
                                                        }
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-xl-8 my-2" align ="center">
                                        
                                        <button type= "submit" onclick= "alert('Credential Update Successful')" class= "btn btn-success"><i class= "fa fa-save me-2"></i>Save</button>
                                        </div>

                                    </div>
                                    
                                </div>
                            </div>            
                        </div>
                        <div class="tab-pane" id="person">
                            <div class="row g-0 justify-content-center  ms-2 me-3">
                                <div class="col-md-12 mt-4">        
                                    <table class="table">
                                        <tr>
                                            <th>
                                                <i class="fa fa-phone-square me-2"></i>Contact Number
                                            </th>
                                            <td style= "text-align:right">
                                                 09123456789
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-circle me-2"></i>Civil Status
                                            </th>
                                            <td style= "text-align:right">
                                                Single
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-id-card me-2"></i>Age
                                            </th>
                                            <td style= "text-align:right">
                                                35
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-venus-mars me-2"></i>Gender
                                            </th>
                                            <td style= "text-align:right">
                                                Male
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-birthday-cake me-2"></i>Date of Birth
                                            </th>
                                            <td style= "text-align:right">
                                                12/25/2000
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-check-square me-2"></i>Day/s of Duty
                                            </th>
                                            <td style= "text-align:right">
                                                M,W,F
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-calendar me-2"></i>Term
                                            </th>
                                            <td style= "text-align:right">
                                                2019-2021
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-info me-2"></i>Status
                                            </th>
                                            <td style= "text-align:right">
                                                Active
                                            </td>
                                        </tr>
                                    </table>                            
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
    </div> 
 </div>  


    <div class="modal fade" id = "view-info" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-primary ">
                    <div class="modal-header bg-danger bg-transparent ">
                        <h5 class="modal-title text-white" id="delete">&nbsp;<i class = "fa fa-user"></i>&nbsp;&nbsp;599 official</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body bg-white">
                            <div class="row">
                                <div class="fs-4">
                                    Officials Position:
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="display-6">
                                    Officials Name
                                </div>
                                
                            </div>
                            <div class="row g-0 justify-content-center  ms-2 me-3">
                                <div class="col-md-12 mt-4">        
                                    <table class="table">
                                        <tr>
                                            <th>
                                                <i class="fa fa-phone-square me-2"></i>Contact Number
                                            </th>
                                            <td style= "text-align:right">
                                                 09123456789
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-circle me-2"></i>Civil Status
                                            </th>
                                            <td style= "text-align:right">
                                                Single
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-id-card me-2"></i>Age
                                            </th>
                                            <td style= "text-align:right">
                                                35
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-venus-mars me-2"></i>Gender
                                            </th>
                                            <td style= "text-align:right">
                                                Male
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-birthday-cake me-2"></i>Date of Birth
                                            </th>
                                            <td style= "text-align:right">
                                                12/25/2000
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-check-square me-2"></i>Day/s of Duty
                                            </th>
                                            <td style= "text-align:right">
                                                M,W,F
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-calendar me-2"></i>Term
                                            </th>
                                            <td style= "text-align:right">
                                                2019-2021
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <i class="fa fa-info me-2"></i>Status
                                            </th>
                                            <td style= "text-align:right">
                                                Active
                                            </td>
                                        </tr>
                                    </table>                            
                                </div>
                            </div>
               
                        </div>
                    
                </div>
            </div>
        </div> 
                                                </div>