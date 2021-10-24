<div class="row g-0 shadow-lg bg-light border-end border-start border-bottom border-secondary " >   
                                    <div class="col-md-6 px-3 py-5 " style= "max-height: 450px;overflow-y:auto;">
                                        <table class= "table pay border border-secondary shadow-md">
                                            <thead class="bg-primary white">
                                            <tr>
                                                <td>
                                                    Requestor Name
                                                </td>
                                                <td>
                                                    Requested Service
                                                </td>
                                                <td>
                                                    Mode of payment
                                                </td>
                                                
                                                <td>
                                                    Proof of payment
                                                </td>
                                                
                                                <td scope="col" style = "text-align: center">
                                                    Actions
                                                </td>
                                                
                                            </tr>

                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Edward Newgate
                                                    </td>
                                                    
                                                    <td>
                                                        Drug related Seminar
                                                    </td>
                                                    <td>
                                                    G-cash
                                                    </td>
                                                    <td>
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="" href ="#"class="btn btn-primary" style= "padding:5px;"><i class = "fa fa-eye me-1"></i>Payment</a>
                                                        </div>
                                                    </td>
                                                    <td  scope="col" style = "text-align: center;">
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a href ="#approve-proof"class="btn btn-success" data-bs-toggle=  "modal" style= "width:100px;"><i class = "fa fa-eye me-1"></i>Accept</a>
                                                            </div>
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a type="button" href ="#decline-proof" data-bs-toggle = "modal" role = "button" class="btn  btn-danger" style= "width:100px;"><i class = "fa fa-times-circle me-1" ></i>Decline</a>
                                                            </div>

                                                    </td>
                                                </tr>

                                            
                                            
                                            </tbody>
                                        
                                        </table>
                                    </div>
                                <div class="col-md-6 border-start"style= "height: 100%;max-height: 450px;overflow-y:auto;" >
                                    <form action="" action ="POST">
                                        <div class="row g-0 px-4 py-5">
                                            <div class="row">
                                                <div class="col-md-7 ">
                                                    <label for="payname" class="fs-5">Requestor Name</label>
                                                    <input id = "payname" type="text" class= "form-control" placeholder = "Payor Name"  readonly>
                                                </div>
                                            
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-5 ">
                                                    <label for="payid" class="fs-5">Payment ID</label>
                                                    <input id = "payid" type="text" class= "form-control" placeholder = "Payor Name" value = "213213123" readonly>
                                                </div>
                                                <div class="col-md-3 ">
                                                    <label for="payed" class="fs-5">Amount Paid</label>
                                                    <input id = "payed" type="text" class= "form-control" value = "20" style= "width: 100%;"readonly> 
                                                </div>
                                                <div class="col-md-3 " class="fs-5">
                                                    <label for="payed" class= "fs-5">Payable</label>
                                                    <input id = "payed" type="text" class= "form-control"  value = "20" style= "width: 100%;"readonly> 
                                                </div>
                                                <label for="payed" class="fs-5 mb-2">Proof of Payment- <a href= "../images/proof.jpg" download target = "_blank" class= "text-decoration-none"><i class= "fa fa-download"></i>Download proof</label></a>
                                                
                                                <div class="row justify-content-center text-center">
                                                    <div class="col-md-4">
                                                        
                                                        <a align ="center" href = "#proof" data-bs-toggle ="modal" style= "max-height: 400px"><img src="../images/proof.jpg" alt="proof of payment" class= "img-fluid"></a>
                                                       
                                                        
                                                

                                                    
                                                    </div>

                                                </div>
                                          
                                                
                                            
                                            </div>
                           
                                        </div>


                                    </form>
                                </div>

        <!--modal-->
        <div class="modal fade" id = "proof" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 ">
                    <div class="modal-header bg-danger bg-transparent ">
        
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white" align = "center">
                            <img src="../images/proof.jpg" alt="">
                    </div>
                   
                </div>
            </div>
        </div>


        
        <div class="modal fade" id = "approve-proof" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-success ">
                    <div class="modal-header bg-success  ">
                        <h5 class="modal-title white">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Accept payment?</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        
                        <div class="row mt-2 ms-2 me-3">
                            <form action="" method = "POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="dname">Requestor Name</label>
                                        <input id = "dname" type="text" class="form-control" value = "Juan Dela Cruz" readonly>

                                    </div>
                           
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="contac">Contact Number</label>
                                        <input id = "contac" type="text" class="form-control" value = "09123456789" readonly>
                   
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Email Address</label>
                                        <input id = "emails" type="text" class="form-control" value = "juanDelaC@gmail.com" readonly>
                                        
                                    
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="ars">Acquired Service</label>
                                        <input id = "crs" type="text" class="form-control" value = "Marriage" readonly>
                   
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Payment Status</label>
                                        <input id = "emails" type="text" class="form-control" value = "Settled + amount payed" readonly>
                                       
                                    
                                    </div>
                                </div>
                                <div class="row mt-2">
                                        <label for="remarks" >Remarks</label>
                                        <div class="col-md-12">
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
                                        <button href ="#dec-val" type = "button" class="btn btn-success rounded-circle" data-bs-dismiss ="modal" data-bs-toggle= "modal" >
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
        <div class="modal fade" id = "dec-val" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger ">
                    <div class="modal-header bg-danger bg-transparent ">
                        <h5 class="modal-title" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                       
                        <div class="row">
                            <p class = "fs-4 text-center">You are about to decline a proof of payment, do you wish to proceed sending decline message?<br><span class="text-muted fs-6">*Select (<i class = "fa fa-check">)</i> if certain</span></p>
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


        <div class="modal fade" id = "decline-proof" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger ">
                    <div class="modal-header bg-danger bg-transparent ">
                        <h5 class="modal-title" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Declining payment?</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row mt-2 ms-2 me-3">
                            <form action="" method = "POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="dname">Requestor Name</label>
                                        <input id = "dname" type="text" class="form-control" value = "Juan Dela Cruz" readonly>

                                    </div>
                           
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <label for="contac">Contact Number</label>
                                        <input id = "contac" type="text" class="form-control" value = "09123456789" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Email Address</label>
                                        <input id = "emails" type="text" class="form-control" value = "juanDelaC@gmail.com" readonly>
                                        
                                    
                                    </div>
                                    <div class="col-md-12">
                                        <label for="decreason" >Decline Reason</label>
                                        <select name="" id="decreason" class= "form-select" onclick = "showOthersdec('other_txt-dec',this)">
                                            <option value="">Insufficient payment</option>
                                            <option value="">Invalid proof sent</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-0 my-2" id = "other_txt-dec" style= "display:none;">
                                 
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder= "Specify a reason here">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                        <label for="remarks" >Remarks</label>
                                        <div class="col-md-12">
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
                                        <button href ="#dec-val" type = "button" class="btn btn-success rounded-circle" data-bs-dismiss ="modal" data-bs-toggle= "modal" >
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