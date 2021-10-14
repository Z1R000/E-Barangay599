<form action="" method ="POST">
    <div class="modal fade" id = "edit-record" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content g-0 blue">
                    <div class="modal-header blue white ">
                        <h5 class="modal-title" >&nbsp;<i class = "fa fa-edit"></i>&nbsp;&nbsp;Basketball Court</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        <div class="row">
                            <div class="col-xl-6" >
                                <label for="prate" class="fs-5 fw-bold">Requestor Name</label>
                                <div class="d-flex">    
                                    
                                    <input type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "e.g Juan Dela Cruz">
                                    
                               </div> 
                            </div>
                            <div class="col-xl-6" >
                                <label for="prate" class="fs-5 fw-bold">Requestor Name</label>
                                <div class="d-flex">    
                                    
                                    <input type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "e.g Juan Dela Cruz">
                                    
                               </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8" >
                                <label for="pname" class="fs-5 fw-bold">Property Name</label>
                                <input type="text" id = "pname" class="form-control" name ="pName" placeholder="Name of the selected property">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8" >  
                                <label for="status" class="fs-5 fw-bold">Property Availablility</label>
                                <select name="" class="form-control" id="status">
                                    <option value="avail">Available</option>
                                    <option value="noavail">Not Available</option>
                                </select>
                            </div>
                        </div>

                        <div class="row " align="center">
                            <div class="col-md-5  mx-auto my-2">
                                <button type ="button" role = "button" class="btn btn-outline-primary" >
                                    <i class="fa fa-save"></i>
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
    </form>
    <div class="modal fade" id = "check-property" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 blue">
                    <div class="modal-header blue white ">
                        <h5 class="modal-title" >&nbsp;<i class = "fa fa-edit"></i>&nbsp;&nbsp;Basketball Court</h5>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                        <div class="row">
                            <div class="col-xl-6" >
                                <label for="prate" class="fs-5 fw-bold">Property Rate</label>
                                <div class="d-flex">    
                                    
                                    <input readonly type="text" id = "prate" class="form-control me-2" name ="pRate" placeholder= "Rate">
                                    <div class="fs-5 fw-bold">PHP</div>  
                               </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8" >
                                <label for="pname" class="fs-5 fw-bold">Property Name</label>
                                <input readonly  type="text" id = "pname" class="form-control" name ="pName" placeholder="Name of the selected property">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8" >  
                                <label for="status" class="fs-5 fw-bold">Property Availablility</label>
                                <select name="" class="form-control" id="status" disabled>
                                    <option value="avail">Available</option>
                                    <option value="noavail">Not Available</option>
                                </select>
                            </div>
                        </div>

                    
                        
                                        
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>