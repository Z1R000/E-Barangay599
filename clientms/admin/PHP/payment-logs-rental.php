                                <div class="container g-0 mb-5">
                                    <div class="row shadow-sm py-1 bg-599 text-white rounded-top">
                                        <div class="fs-5 px-2"><i class="fa fa-money-bill mx-1"></i>Payment Logs</div>
                                    </div>
                                        <div class="row bg-white py-4 border-start border-bottom border-end">
                                            <div class="col-xl-6" style = "overflow:auto;">
                                                <table class= "table table-striped table-bordered" id = "cpay" style = "min-width: 200px;max-heigth: 600px">
                                                    <thead>
                                                            <th style = "text-align: left">Rental</th>
                                                            <th style = "text-align: left">Requestor</th>
                                                            <th style = "text-align: left">Proof of Payment</th>
                                                 
                                                       </thead>  
                                                        <tbody>
                                                                <tr>
                                                                    <td scope="col" style = "text-align: left">Barangay Van</td>
                                                                    
                                                                    <td scope="col" style = "text-align: left">ekoc omsim</td>
                                                                    <td class= "text-center">
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a type="" style= " width:100px;"href ="#"class="link link-light bg-primary rounded"><i class = "fa fa-eye me-1"></i><span class= "wal">Payment</span></a>
                                                                    </div>
                                                                    </td>
                                                                    
                                                        
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td scope="col" style = "text-align: left">Barangay Hall</td>
                                                                    
                                                                    <td scope="col" style = "text-align: left">ekoc omsim</td>
                                                                    <td class= "text-center">
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a type="" style= " width:100px;"href ="#"class="link link-light bg-primary rounded"><i class = "fa fa-eye me-1"></i><span class= "wal">Payment</span></a>
                                                                    </div>
                                                                    </td>
                                                                    
                                                        
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td scope="col" style = "text-align: left">Library</td>
                                                                    
                                                                    <td scope="col" style = "text-align: left">ekoc omsim</td>
                                                                    <td class= "text-center">
                                                                    <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                        <a type="" style= " width:100px;"href ="#"class="link link-light  bg-primary rounded"><i class = "fa fa-eye me-1"></i><span class= "wal">Payment</span></a>
                                                                    </div>
                                                                    </td>
                                                                    
                                                        
                                                                    
                                                                </tr>
                                                        </tbody>
                                                </table>
                                            </div>
                                            <div class="col-xl-6" style= "overflow: auto;">
                                            <div class="row g-0 px-1" style= "max-height: 600px;">
                                                    <div class="row" >
                                                    <div class="col-md-5 ">
                                                            <label for="payid" class="fs-5">Payment ID</label>
                                                            <input id = "payid" type="text" class= "form-control" placeholder = "Payor Name" value = "213213123" readonly style = "text-align: left;">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 ">
                                                            <label for="payname" class="fs-5">Requestor Name</label>
                                                            <input id = "payname" type="text" class= "form-control" placeholder = "Payor Name"  readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                     
                                                        <div class="col-md-6 ">
                                                            <label for="payed" class="fs-5">Paid</label>
                                                            <div class="input-group">
                                                                <button class="btn btn-secondary disabled">₱</button>
                                                                <input id = "payed" type="text" class= "form-control" placeholder = "Payor Name" value = "50" style= "text-align: right"readonly > 

                                                            </div>
                                                    
                                                        </div>
                                                        <div class="col-md-6 " class="fs-5">
                                                            <label for="payed" class= "fs-5">Payable</label>
                                                            <div class="input-group">
                                                                <button class="btn btn-secondary disabled">₱</button>
                                                                <input id = "payed" type="text" class= "form-control" placeholder = "Payor Name" value = "50" style= "text-align: right"readonly> 

                                                            </div>
                                                        
                                                        </div>
                                                        <label for="payed" class="fs-5 mb-2">Proof of Payment- <a href= "../images/proof.jpg" download target = "_blank" class= "text-decoration-none"><i class= "fa fa-download"></i>Download proof</label></a>
                                                        
                                                        <div class="row justify-content-center text-center">
                                                            <div class="col-md-4"> 
                                                                <a align ="center" href = "#proof" data-bs-toggle ="modal" style= "max-height: 400px"><img src="../images/proof.jpg" alt="proof of payment" class= "img-fluid"></a>
                                                            </div>
                                                        </div>                                                    
                                                    </div>
                                                    <div class="row justify-content-end">
                                                        <div class="col" align= "right">

                                         
                                                        <div class="btn-group">
                                                        <div class="btn-group  mb-1  " role="group" aria-label="First group">
                                                            <a href ="#approve-proof "class="btn btn-success mx-1" data-bs-toggle=  "modal" style = ""><i class = "fa fa-check mx-1 "></i><span class= "wal">Accept</span></a>
                                                        </div>
                                                            <div class="btn-group  mb-1  " role="group" aria-label="First group">
                                                            <a href ="#decline-proof "class="btn btn-danger mx-1" data-bs-toggle=  "modal" style= ""><i class = "fa fa-times fa-1x mx-1 "></i><span class= "wal"> Decline</span></a>
                                                        </div>
                                                        </div>
                                                        </div>
                                                    </div>                     
                                            </div>
                                    </div>
                                    </div>                        
    
              

<!--<div class="row g-0 shadow-lg bg-light border-end border-start border-bottom border-secondary " >
                                    <div class="col-md-6 px-3 py-5 " style= "max-height: 450px;overflow-y:auto;">
                                        <table class= "table pay border border-secondary shadow-md">
                                            <thead class="bg-primary white">
                                            <tr>
                                                <td>
                                                    Requestor Name
                                                </td>
                                                <td>
                                                    Rented Property
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
                                                        Basketball Court
                                                    </td>
                                                    <td>
                                                    G-cash
                                                    </td>
                                                    <td>
                                                        <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                            <a type="" href ="#"class="btn btn-primary" style= "padding:5px;width:100px;"><i class = "fa fa-eye mx-1"></i><span class= "wal"> Payment</span></a>
                                                        </div>
                                                    </td>
                                                    <td  scope="col" style = "text-align: center;">
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a href ="#approve-proof"class="btn btn-success" style= "width: 100px;" data-bs-toggle=  "modal"><i class = "fa fa-check mx-1"></i><span class = "wal">Accept</span></a>
                                                            </div>
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                <a type="button" href ="#decline-proof" data-bs-toggle = "modal" role = "button" class="btn  btn-danger" style= "width: 100px;" ><i class = "fa fa-times-circle mx-1"></i><span class= "wal">Decline</span></a>
                                                            </div>

                                                    </td>
                                                </tr>

                                            
                                            
                                            </tbody>
                                        
                                        </table>
                                    </div>
                                    <div class="col-md-6 border"style= "height: 100%;max-height: 450px;overflow-y:auto;" >
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
                                                    <input id = "payid" type="text" class= "form-control" placeholder = "Payor Name" value = "213213123" readonly style = "text-align: right;">
                                                </div>
                                                <div class="col-md-3 ">
                                                    <label for="payed" class="fs-5">Amount Paid</label>
                                                    <div class="input-group">
                                                        <button class="btn btn-secondary disabled">₱</button>
                                                        <input id = "payed" type="text" class= "form-control" placeholder = "Payor Name" value = "50" style= "text-align: right"readonly > 

                                                    </div>
                                               
                                                </div>
                                                <div class="col-md-3 " class="fs-5">
                                                    <label for="payed" class= "fs-5">Payable</label>
                                                    <div class="input-group">
                                                        <button class="btn btn-secondary disabled">₱</button>
                                                        <input id = "payed" type="text" class= "form-control" placeholder = "Payor Name" value = "50" style= "text-align: right"readonly> 

                                                    </div>
                                                   
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
                                </div>-->

        <!--modal-->
        <div class="modal fade" id = "proof" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md ">
                <div class="modal-content g-0 ">
                    <div class="modal-header bg-danger bg-white border-bottom ">
 
                        
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
                    <div class="modal-body bg-white ">
                        
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
                                        <label for="ars">Acquired Rental</label>
                                        <input id = "crs" type="text" class="form-control" value = "Basketball Court" readonly>
                   
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emails" >Payment Status</label>
                                        <input id = "emails" type="text" class="form-control" value = "Settled + amount payed" readonly>
                                       
                                    
                                    </div>
                                </div>
                                <div class="row mt-2">
                                        <label for="remarks" >Remarks</label>
                                        <div class="col-md-112">
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
                                        <button href ="#" type = "button" class="btn btn-success" data-bs-dismiss ="modal" data-bs-toggle= "modal" >
                                            <i class= 'fa fa-paper-plane me-2'> </i>Send
                                        </button>
                                        <button type = "button" class="btn btn-danger" data-bs-dismiss = "modal"  name = "no" value ="No">
                                            <i class= "fa fa-times me-2"></i>Discard
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
                        <div class="row mt-1 ms-2 me-3">
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
                                        <select name="" id="decreason" class= "form-control" onchange = "showOthersdec('other_txt-dec',this);">
                                            <option value="">Insufficient payment</option>
                                            <option value="">Invalid proof sent</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-0 my-2" id = "other_txt-dec">
                                 
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" placeholder= "Specify a purpose here">
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
                                        <button href ="#dec-val" type = "button" class="btn btn-success" data-bs-dismiss ="modal" data-bs-toggle= "modal" >
                                            <i class= 'fa fa-paper-plane py-1 me-2'></i>Send
                                        </button>
                                        <button type = "button" class="btn btn-danger" data-bs-dismiss = "modal"  name = "no" value ="No">
                                            <i class= "fa fa-times me-2"></i>Discard
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