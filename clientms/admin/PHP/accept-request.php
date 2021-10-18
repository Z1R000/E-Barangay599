<div class="modal fade" id = "approve-req" tab-idndex = "-1">
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
                                        <label for="ars">Acquired service</label>
                                        <input id = "crs" type="text" class="form-control" value = "Marriage" readonly>
                   
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Amount to pay</label>
                                        <input id = "emails" type="text" class="form-control" value = "40 " readonly>
                                       
                                    
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
                                            <input class="form-check-input" type="checkbox" value="" id="em">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                E-mail
                                            </label>
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                                          
                                        </div>

                                    </div>
                                    
                                </div>
                                <div class="row justify-content-center" align = "center">
                                    
                                    <div class="col-mx-6">
                                        <button href ="#" type = "button" class="btn btn-success rounded-circle" data-bs-dismiss ="modal" onclick = "alert('Approval Message Sent')" >
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


        <div class="modal fade" id = "decline-req" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger ">
                    <div class="modal-header bg-danger bg-transparent ">
                        <h5 class="modal-title text-white" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Declining request?</h5>
                        
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
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    SMS
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    E-mail
                                                </label>  
                                            </div>
                                    </div>
                                    
                                </div>
                                <div class="row justify-content-center" align = "center">
                                    
                                    <div class="col-mx-6">
                                        <button href ="" onclick = "alert('Decline Message Sent')" type = "button" class="btn btn-success rounded-circle" data-bs-dismiss ="modal" data-bs-toggle= "modal" >
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