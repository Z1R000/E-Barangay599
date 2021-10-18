                                <div class="row g-0 border-end border-start border-bottom bg-white border-secondary" >
                                        <div class = "row py-2 g-0 px-5">
                                            <div class="col-md-8 px-2">
                                                <div class="btn-group" role="group">
                                                <a href = "#new-rental" data-bs-toggle ="modal"  class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;Walk-in rental</a>
                                            </div>
                                        </div>
                                        <div class="col-md-4  px-2" >
                                            <div class="d-flex">
                                                <input type="text" name ="searchProp" placeholder = "Search property"class="form-control">
                                                <button class= "btn btn-outline-info mx-1 my-1"><i class= "fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row border g-0">
                                        <div class="col-xl-11 mx-2  mx-auto py-3  px-2">
                                            <table class="table bg-white border border-secondary table-hover "> 
                                                <thead>
                                                    <tr>
                                                        <td scope = "col" colspan = 7 style ="background: #012f6e; color: white; text-align: center">Rental Records</td>
                                                    </tr>
                                                    <tr>
                                                        <th style = "text-align: left;">Rental Status</th>
                                                        <th style = "text-align: left;">Requestor Name</th>
                                                        <th style = "text-align: left; ">Requested Property </th>
                                         
                                                        <th style = "text-align: left;;">Date of rental</th>
                                                        <th style = "text-align: left;">Rental Duration</th>
                                                        <th style = "text-align: left;">Rate</th>
                                                       
                                                        
                                                    
                                                    
                                                        <th style = "text-align: center;">Action</th>
                                            
                                                    </tr>
                                                
                                                </thead>           
                                                <tbody class= "table-hover">
                                                    <tr>
                                                        <td scope="col" style = "text-align: left">On-going</td>
                                                        <td scope="col" style = "text-align: left">Tobirama Uchiha</td>
                                                        <td scope="col" style = "text-align: left">Barangay van</td>
                                         
                                                        <td scope="col" style = "text-align: left">10/16/2021,21:12:08</td>
                                                        <td scope="col" style = "text-align: left">2 hrs</td>
                                                        <td style = "text-align: left;">40.00 PHP</td>
                                                       

                                                        <td scope="col" style = "text-align: center">
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <button  type="button" href ="#check-rental" data-bs-toggle="modal" role="button" class="btn btng btn-primary"><i class = "fa fa-eye"></i></button>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a href ="#edit-rental    " data-bs-toggle ="modal" role ="button" class="btn btng btn-success"><i class = "fa fa-edit"></i></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="#delete-rental" data-bs-toggle = "modal" role = "button" class="btn btng btn-danger"><i class = "fa fa-trash"></i></a>
                                                                </div>   
                                                                
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="#approve-transac" data-bs-toggle = "modal" role = "button" class="btn btng btn-info"><i class = "fa fa-paper-plane white"></i></a>
                                                                </div>  
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>                        
                                        </div>   
                                    </div>
                                </div>


        <div class="modal fade" id = "new-rental" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 blue">
                    <div class="modal-header blue white ">
                        <h5 class="modal-title white" >&nbsp;<i class = "fa fa-plus"></i>&nbsp;&nbsp;New Rental</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        <div class="row">
                            <div class="col-xl-8" >
                                <label for="prate" class="fs-5 fw-bold">Requestor Name</label>
                                <div class="d-flex">    
                                    <input type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "Requestor Name">
                               </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4" >  
                                <label for="status" class="fs-5 fw-bold">Property to rent</label>
                                <select name="" class="form-control" id="status">
                                    <option value="avail">Barangay Van</option>
                                    <option value="noavail">Patrol</option>
                                    <option value="noavail">Basketball court</option>
                                </select>
                            </div>

                            <div class="col-xl-4" >
                                <label for="prate" class="fs-5 fw-bold">Duration<span class= "text-muted fs-6">(in hours)</span></label>
                                <div class="d-flex">    
                                    <input type="number" min =0 ; id = "prate" class="form-control me-2" name ="pRate" placeholder= "0.00" >
                               </div> 
                            </div>
                            <div class="col-xl-4" >
                                <label for="prate" class="fs-5 fw-bold">Rate<span class= "text-muted fs-6">(per hour)</span></label>
                                <div class="d-flex">    
                                    <input type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "0.00" readonly>
                               </div> 
                            </div>
                          
                        </div>
                        <div class="row">
                     
                          
                            <div class="col-xl-6" >
                                <label for="prate" class="fs-5 fw-bold">Date today</label>
                                <input type="text"  id = "date" class="form-control me-2" name ="date" readonly>
                              
                            </div>
                            <div class="col-xl-6" >
                                <label for="prate" class="fs-5 fw-bold">Rental Status</label>
                                    <select name="" class="form-control" id="status">
                                        <option value="avail">On going</option>
                                        <option value="noavail">Settled</option>
                                
                                    </select>
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                        <div class="row">
                         
                        </div>
                       
               
                 

                        <div class="row " align="center">
                            <div class="col-md-5  mx-auto my-2">
                                <button type ="button" role = "button" class="btn btn-outline-primary" >
                                    <i class="fa fa-check me-1"></i>
                                    Submit
                                </button>
                            </div>
                        </div>
                    
                        
                                        
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id = "edit-rental" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 blue">
                    <div class="modal-header blue white ">
                        <h5 class="modal-title white" >&nbsp;<i class = "fa fa-edit"></i>&nbsp;&nbsp;Edit Rental</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        <div class="row">
                            <div class="col-xl-8" >
                                <label for="prate" class="fs-5 fw-bold">Requestor Name</label>
                                <div class="d-flex">    
                                    <input type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "Requestor Name">
                               </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4" >  
                                <label for="status" class="fs-5 fw-bold">Property to rent</label>
                                <select name="" class="form-control" id="status">
                                    <option value="avail">Barangay Van</option>
                                    <option value="noavail">Patrol</option>
                                    <option value="noavail">Basketball court</option>
                                </select>
                            </div>

                            <div class="col-xl-4" >
                                <label for="prate" class="fs-5 fw-bold">Rate <span class= "text-muted fs-6">(per hour)</span></label>
                                <div class="d-flex">    
                                    <input type="number" min =0 ; id = "prate" class="form-control me-2" name ="pRate" placeholder= "0.00" >
                               </div> 
                            </div>
                            <div class="col-xl-4" >
                                <label for="prate" class="fs-5 fw-bold">Duration<span class= "text-muted fs-6">(in hours)</span></label>
                                <div class="d-flex">    
                                    <input type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "0.00" readonly>
                               </div> 
                            </div>
                          
                        </div>
                        <div class="row">
                           
                            <div class="col-xl-6" >
                                <label for="prate" class="fs-5 fw-bold">Date today</label>
                                <input type="text"  id = "date-edit" class="form-control me-2" name ="date" value = "10/16/2021,21:12:08" readonly>
                              
                            </div>
                            <div class="col-xl-6" >
                                <label for="prate" class="fs-5 fw-bold">Rental Status</label>
                                    <select name="" class="form-control" id="status">
                                        <option value="avail">On going</option>
                                        <option value="noavail">Settled</option>
                                
                                    </select>
                            </div>
                        </div>
                        <div class="row">

                            
                            
                        </div>
                        <div class="row">
                           
                        </div>
                       
               
                 

                        <div class="row " align="center">
                            <div class="col-md-5  mx-auto my-2">
                                <button type ="button" role = "button" class="btn btn-outline-primary" >
                                    <i class="fa fa-save me-1"></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    
                        
                                        
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id = "check-rental" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 blue">
                    <div class="modal-header blue white ">
                        <h5 class="modal-title white" >&nbsp;<i class = "fa fa-plus"></i>&nbsp;&nbsp;Rental record</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        <div class="row">
                            <div class="col-xl-8" >
                                <label for="prate" class="fs-5 fw-bold">Requestor Name</label>
                                <div class="d-flex">    
                                    <input type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "Requestor Name" readonly>
                               </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4" >  
                                <label for="status" class="fs-5 fw-bold">Property to rent</label>
                                <select name="" class="form-control" id="status" disabled>
                                    <option value="avail">Barangay Van</option>
                                    <option value="noavail">Patrol</option>
                                    <option value="noavail">Basketball court</option>
                                </select>
                            </div>

                            <div class="col-xl-4" >
                                <label for="prate" class="fs-5 fw-bold">Rate <span class= "text-muted fs-6">(per hour)</span></label>
                                <div class="d-flex">    
                                    <input type="number" min =0 ; id = "prate" class="form-control me-2" name ="pRate" placeholder= "0.00"  readonly>
                               </div> 
                            </div>
                            <div class="col-xl-4" >
                                <label for="prate" class="fs-5 fw-bold">Duration<span class= "text-muted fs-6">(in hours)</span></label>
                                <div class="d-flex">    
                                    <input type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "0.00" readonly>
                               </div> 
                            </div>
                          
                        </div>
                        <div class="row">
                          
                            <div class="col-xl-6" >
                                <label for="prate" class="fs-5 fw-bold">Date today</label>
                                <input type="text"  id = "date" class="form-control me-2" name ="date"value ="10/16/2021,21:12:08" readonly>
                              
                            </div>
                            <div class="col-xl-6" >
                            <label for="prate" class="fs-5 fw-bold">Rental Status</label>
                                    <select name="" class="form-control" id="status" disabled>
                                        <option value="og">On going</option>
                                        <option value="set">Settled</option>
                                
                                    </select>
                             
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                        <div class="row">
                            <div class="col-xl-6" >
                          
                            </div>
                        </div>
                       
               
                 

                        <div class="row " align="center">
                            <div class="col-md-5  mx-auto my-2">
                             
                            </div>
                        </div>
                    
                        
                                        
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
        
    </form>

    <div class="modal fade" id = "delete-rental" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger" >
                    <div class="modal-header  white ">
                        <h5 class="modal-title bg-danger" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                        
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
                                <button type = "button" class="btn btn-success rounded-circle" data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                    <i class= 'fa fa-check '></i>
                                </button>
                                <button type = "button" class="btn btn-danger rounded-circle" data-bs-dismiss = "modal"  name = "no" value ="No">
                                    <i class= "fa fa-times"></i>
                                </button>
                            </form>
                        </div>
                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id = "approve-transac" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-success ">
                    <div class="modal-header bg-success  ">
                        <h5 class="modal-title white">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Send Proof of transaction</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        
                        <div class="row mt-2">
                            <form action="" method = "POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="dname">Requestor Name</label>
                                        <input id = "dname" type="text" class="form-control" value = "Juan Dela Cruz" readonly>

                                    </div>
                           
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-5">
                                        <label for="contac">Contact Number</label>
                                        <input id = "contac" type="text" class="form-control" value = "09123456789" readonly>
                   
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Email Address</label>
                                        <input id = "emails" type="text" class="form-control" value = "juanDelaC@gmail.com" readonly>
                                        
                                    
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-5">
                                        <label for="ars">Acquired rental/service</label>
                                        <input id = "crs" type="text" class="form-control" value = "Marriage" readonly>
                   
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Payment Status</label>
                                        <input id = "emails" type="text" class="form-control" value = "Settled + amount payed" readonly>
                                       
                                    
                                    </div>
                                </div>
                                <div class="row mt-2">
                                        <label for="remarks" >Remarks</label>
                                        <div class="col-md-11">
                                            <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style=";height: 100px;resize: none;"></textarea>
                                            <label for="floatingTextarea2">Remarks here (max 10 words)</label>
                                                
                                            </div>
                                        </div>
                                   
                                </div>
                                <div class="row mt-2">
                                    <label for="remarks" >Mode of delivery <i class= "fa fa-envelope"></i></label>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="sms">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                SMS
                                            </label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="em" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                E-mail
                                            </label>
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Walk-in
                                            </label>
                                        </div>

                                    </div>
                                    
                                </div>
                                <div class="row justify-content-center" align = "center">
                                    
                                    <div class="col-mx-6">
                                        <button href ="#" type = "button" class="btn btn-success rounded-circle" data-bs-dismiss ="modal"  >
                                            <i class= 'fa fa-paper-plane py-1'></i>
                                        </button>
                                        <button type = "button" class="btn btn-danger rounded-circle" data-bs-dismiss = "modal"  name = "no" value ="No">
                                            <i class= "fa fa-times"></i>
                                        </button>
                                
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
    <script>
        function getDate(){
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            var hr = today.getHours();
            var mn = today.getMinutes();
            var sec = today.getSeconds();

            if(dd<10) {
                dd = '0'+dd
            } 

            if(mm<10) {
                mm = '0'+mm
            } 
            if (mn<10){
                mn = '0'+mn;
            }
            if (sec<10){
                sec = '0'+sec;
            }
            today =  mm + '/' + dd + '/' +yyyy + ',' +hr+ ':'+mn+':'+sec;
            document.getElementById('date').value  = today;
          
        }

                
        window.onload = function() {
            getDate();
        };
    </script>