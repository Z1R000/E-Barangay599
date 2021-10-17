<div class="modal fade" id = "edit-sub" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content bg-dark g-0  ">
                    <div class="modal-header bg-dark  ">
                        <h4 class="modal-title text-white"><i class= "fa fa-cog text-secondary"></i> "Position of person" Account Update</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#off" data-bs-toggle= "tab">E-barangay Account</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#person-off"data-bs-toggle= "tab">Personal Details</a>
                    </li>
                 
                    </ul>
                    <div class="tab-content ">
                        <div class="tab-pane active" id="off">
                            <div class="row justify-content-center">
                                <div class="col-md-10 mt-4">
                                    <div class="row" align="center">
                                        <div class="col-xl-12">
                                            <img src="../images/admin-logo.png" alt="" class="img-fluid border border-info rounded ava"  style = "height: 185px">
                                        </div>
                                        <div class="col-xl-12 my-2">
                                        <input type="file" id="selectedFile" style="display: none;" />
                                        <button type="button"  class= "btn btn-primary" onclick="document.getElementById('selectedFile').click();" ><i class= "fa fa-camera me-2 "></i>Choose photo</button>
                                
                                        </div>
                                      
                                    </div>
                                        
                                    <div class="input-group">
                                        <input type="text" id = "fname"class="form-control" placeholder = "First Name" >
                                    

                                    </div>
                                    <div class="input-group my-2">
                                        <input type="text" id = "mname"class="form-control" placeholder = "Middle Name" >
                                    

                                    </div>
                                    <div class="input-group">
                                        <input type="text" id = "lname"class="form-control" placeholder = "Last Name" >
                                    

                                    </div>
                                    <div class="input-group mt-2">
                                        <input type="text" id = "suf"class="form-control" placeholder = "Suffix eg. Jr, Sr, 1st, 2nd ..." >
                                    

                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 text-center">

                                            <label for="email" class="fs-5 text-secondary">Email Address</label>
                                            <div class="input-group">
                                                <input type="text" id = "emailsub"class="form-control" placeholder = "e.g chairman@gmail.com" readonly>
                                                <button type= "button" name= "edit-em"class="btn btn-info" onclick = 'emailsub()'>
                                                    <i class= "fa fa-edit text-white"></i>
                                                </button>

                                            </div>
                                            
                                        
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 text-center">
                                            <label for="pas" class="fs-5 text-secondary">Password</label>
                                            <div class="input-group">
                                                <input type="text" id = "pasoff" class="form-control" placeholder = "123456" readonly >
                                                <button type= "button" name= "editpas" class="btn btn-info" onclick = 'pask()' >
                                                    <i class= "fa fa-edit text-white"></i>
                                                </button>
                                                <script>
                                                    function pask(){
                                                        var ps = document.getElementById('pasoff').readOnly;

                                                        if (ps){
                                                            document.getElementById('pasoff').readOnly = false;
                                                        }
                                                        else{
                                                            document.getElementById('pasoff').readOnly = true;
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
                        <div class="tab-pane" id="person-off">
                            <div class="row justify-content-center">
                                <div class="col-md-10 mt-4">
                                     
                                    <div class="input-group mt-2">
                                        <button class ="btn btn-secondary "> 
                                            <i class= "fa fa-phone-square "></i>
                                            
                                        </button>
                                        <input type="text" id = "fname"class="form-control" placeholder = "Contact Number" value = "09123456789">
                                    
                                    </div>
                                    <div class="input-group mt-2">
                                        <button class ="btn btn-secondary"> 
                                            <i class= "fa fa-circle"></i>
                                        </button>
                                        <select class="form-select border-secondary" name = "cstatus" aria-label="Default select example" >
                                                <option value=''selected disabled>--Civil Status--</option>
                                                <option value="Single"><i class= "fa fa-book text-danger"></i>Single</option>
                                                <option value="Married"><i class= "fa fa-circle text-success"></i>Married</option>
                                                <option value="Single"><i class= "fa fa-book text-danger"></i>Separated</option>
                                                <option value="Married"><i class= "fa fa-circle text-success"></i>Widow/widower</option>
                                                       
                                        </select> 
                                    
                                    </div>
                                    <div class="input-group mt-2">
                                        <button class ="btn btn-secondary "> 
                                            <i class= "fa fa-address-card "></i>
                                            
                                        </button>
                                        <input type="text" id = "fname"class="form-control" placeholder = "Age" onload= "age()">
                                    
                                    </div>
                                    <div class="input-group mt-2">
                                        <button class ="btn btn-secondary "> 
                                            <i class= "fa fa-venus-mars "></i>
                                            
                                        </button>
                                      
                                        <select class="form-select border-secondary" name = "cstatus" aria-label="Default select example" >
                                                <option value=''selected disabled>--Gender--</option>
                                                <option value="Single"><i class= "fa fa-book text-danger"></i>Single</option>
                                                <option value="Married"><i class= "fa fa-circle text-success"></i>Married</option>
                                        </select>
                                    
                                    </div>
                                    <div class="input-group mt-2">
                                        <button class ="btn btn-secondary "> 
                                            <i class= "fa fa-birthday-cake "></i>
                                            
                                        </button>
                                        <input type="date" id = "fname"class="form-control" placeholder = "" >
                                    </div>
                                    <div class="input-group mt-2">
                                        <button class ="btn btn-secondary "> 
                                            <i class= "fa fa-calendar "></i>
                                            
                                        </button>
                                        <input type="text" id = "fname"class="form-control" placeholder = "From" >
                                        <button class ="btn btn-secondary "disabled> 
                                            
                                            to
                                        </button>
                                        <input type="text" id = "fname"class="form-control" placeholder = "End" >

                                    </div>
                                    <div class="input-group mt-2">
                                        <button class ="btn btn-secondary "> 
                                            <i class= "fa fa-info "></i>
                                            
                                        </button>
                                      
                                        <select class="form-select border-secondary" name = "cstatus" aria-label="Default select example" >
                                                <option value=''selected disabled>--Status--</option>
                                                <option value="Single"><i class= "fa fa-book text-danger"></i>Active</option>
                                                <option value="Married"><i class= "fa fa-circle text-success"></i>Inactive</option>
                                        </select>
                                    
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-xl-8 my-2" align ="center">
                                        
                                        <button type= "submit" onclick= "alert('Credential Update Successful')" class= "btn btn-success"><i class= "fa fa-save me-2"></i>Save</button>
                                        </div>

                                    </div>
                                    
                                    

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
    </div> 



        <script>
    function emailsub(){
        var stat = document.getElementById('emailsub').readOnly;
        if (stat){
            document.getElementById('emailsub').readOnly= false;
        }
        else{
            document.getElementById('emailsub').readOnly= true;
        }
       
    };

</script>