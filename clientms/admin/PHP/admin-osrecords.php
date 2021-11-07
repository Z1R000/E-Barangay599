
                                 <div class="container g-0 pt-2">
                                        <div class="row bg-599 text-white rounded-top">
                                            <div class="fs-5 px-2"><i class="fa fa-clipboard-list mx-1"></i>Service Records</div>

                                        </div>
                                        <div class="row bg-white border-end border-start border-bottom py-3">
                                            <div class="row pb-2 px-4 g-0 justify-content-end">
                                            <div class="col-3 ">
                                                <div class="btn-group float-end">
                                                <a href = "#new-service"  data-bs-toggle ="modal" role = "button"class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus mx-1"></i><span class= "wal">Walk-in Service</span></a>
                                                </div>
                                            </div>
                                            <div class="row g-0">
                                                <table class= "table table-bordered table-striped "id = "srec">
                                                    <thead>
                                                        <tr>
                                                            <th style = "text-align: left;">Status</th>
                                                            <th style = "text-align: left;">Requestor</th>
                                                            <th style = "text-align: left; ">Service </th>        
                                                            <th style = "text-align: left;"> Fee(₱)</th>
                                                            <th style = "text-align: left;;">Date</th>
                                                            <th style = "text-align: center;">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody><tr>
                                                        <td scope="col" style = "text-align: left">On-going</td>
                                                        <td scope="col" style = "text-align: left">Tobirama Uchiha</td>
                                                        <td scope="col" style = "text-align: left">Drug Seminar</td>
                                                        <td style = "text-align: right;">40.00 </td>
                                                        <td scope="col" style = "text-align: left">10/16/2021,21:12:08</td>
                                                        
                                                        <td scope="col" style = "text-align: center">
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <button  type="button" href ="#check-srecord" data-bs-toggle="modal" role="button" class="btn  btn-primary"><i class = "fa fa-eye mx-1"></i><span class ="wal">View</span>    </button>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a href ="#edit-srecord" data-bs-toggle ="modal" role ="button" class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class = "wal">Edit</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="#delete-srecord" data-bs-toggle = "modal" role = "button" class="btn btn-danger"><i class = "fa fa-trash mx-1"></i><span class= "wal">Delete</span></a>
                                                                </div>        
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="#approve-transac" data-bs-toggle = "modal" role = "button" class="btn  btn-info text-white"><i class = "fa fa-paper-plane  mx-1"></i><span class= "wal">Send</span></a>
                                                                </div>  
                                                        </td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           

<!--<div class="row g-0 border-end border-start border-bottom bg-white border-secondary" >
                                <div class = "row py-2 g-0 ">
                                            <div class="col-md-8 px-2">
                                                <div class="btn-group" role="group">
                                                <a href = "#new-service" data-bs-toggle ="modal"  class="btn btn-outline-primary mx-1 my-1"><i class="fa fa-plus"></i>&nbsp;Walk-in service</a>
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
                                        <div class="col-xl-12 mx-2  mx-auto py-3  px-2" style= "overflow-x:auto;">
                                            <table class="table bg-white border border-secondary table-hover "style= "min-width: 1000px"> 
                                                <thead>
                                                    <tr>
                                                        <td scope = "col" colspan = 8 style ="background: #012f6e; color: white; text-align: center">Service Records</td>
                                                    </tr>
                                                    <tr>
                                                        <th style = "text-align: left;">Status</th>
                                                        <th style = "text-align: left;">Requestor</th>
                                                        <th style = "text-align: left; ">Service </th>
                                                        <th style = "text-align: left; ">Purpose</th>
                                                       
                                                        <th style = "text-align: left;"> Fee</th>
                                                        <th style = "text-align: left;;">Date recorded</th>
                                                        <th style = "text-align: left;;">Mode of payment</th>

                                                        <th style = "text-align: center;">Action</th>
                                            
                                                    </tr>
                                                
                                                </thead>           
                                                <tbody class= "table-hover">
                                                    <tr>
                                                        <td scope="col" style = "text-align: left">On-going</td>
                                                        <td scope="col" style = "text-align: left">Tobirama Uchiha</td>
                                                        <td scope="col" style = "text-align: left">Drug Seminar</td>
                                                        <td scope="col" style = "text-align: left">For Recreation</td>
                                                        
                                                        <td style = "text-align: right;">₱40.00 </td>
                                                        <td scope="col" style = "text-align: left">10/16/2021,21:12:08</td>
                                                        <td scope="col" style = "text-align: left">Cash</td>
                                                                       
                                                       

                                                        <td scope="col" style = "text-align: center">
                                                            <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <button  type="button" href ="#check-srecord" data-bs-toggle="modal" role="button" class="btn  btn-primary"><i class = "fa fa-eye mx-1"></i><span class ="wal">View</span>    </button>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a href ="#edit-srecord" data-bs-toggle ="modal" role ="button" class="btn btn-success"><i class = "fa fa-edit mx-1"></i><span class = "wal">Edit</span></a>
                                                                </div>
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="#delete-srecord" data-bs-toggle = "modal" role = "button" class="btn btn-danger"><i class = "fa fa-trash mx-1"></i><span class= "wal">Delete</span></a>
                                                                </div>        
                                                                <div class="btn-group me-1 mb-1" role="group" aria-label="First group">
                                                                    <a type="button" href ="#approve-transac" data-bs-toggle = "modal" role = "button" class="btn  btn-info text-white"><i class = "fa fa-paper-plane  mx-1"></i><span class= "wal">Send</span></a>
                                                                </div>  
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>                        
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-2">

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
    </nav>
    </div> -->



        <div class="modal fade" id = "new-service" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content g-0 blue">
                    <div class="modal-header blue white ">
                        <div class="modal-title white" >&nbsp;<i class = "fa fa-plus"></i>&nbsp;&nbsp;New Service Record</div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                    <div class="row gx-3">
                                <div class="col-xl-12" >
                                    <div class="row">
                                        <div class="col-6 ">
                                            <label for="prate" class="fs-5 fw-bold">Requestor Name</label>
                                            <div class="d-flex">    
                                            <input type="text" id = "prate" class="form-control" name ="pRate" placeholder= "Requestor Name">
                                            </div>
                                        </div> 
                                       
                                    </div>
                                    <div class="row">
                                    <div class="col-xl-6">
                                            <label for="purp" class= "fs-5 fw-bold">Purposes</label>
                                            <select class= "select form-select" name="" id="purp" onchange = "showOthers('others', this)">
                                                <option  selected>Purposes</option>
                                                <option value="ent">For entertainment</option>
                                                <option value="med">For medical reasons</option>
                                                <option value="others">Others</option>
                                            </select>
                                            <div class="col-xl-12" id = "others">
                                                <label for="prate" class="fs-5 fw-bold">Purpose</label>
                                                <input type="text"  id = "date" class="form-control " name ="date">
                                            </div>
                                
                                        </div>

                                        <div class="col-xl-6" >
                                            <label for="prate" class="fs-5 fw-bold">Service Date</label>
                                            <input type="date"  id = "date" class="form-control " name ="date">
                                        </div>
                                        
                                     
                                    
                                    </div>
                                
                                    <div class="row">
                                            <div class="col-xl-6" >  
                                            <label for="sa" class="fs-5 fw-bold">Service to avail</label>
                                            <select name="" class="form-select" id="sa">
                                                <option value="avail">Drug Seminar</option>
                                                <option value="noavail">Circumcision</option>
                                                <option value="noavail">Marriage</option>
                                            </select>
                                            </div>
                                            <div class="col-xl-6" >
                                            <label for="prate" class="fs-5 fw-bold">Fee<span class= "text-muted fs-6">(₱)</span></label>
                                            <div class="input-group">
                                                <button class="btn btn-secondary disabled">
                                                ₱
                                                </button>    
                                                <input type="text" id = "prate" class="form-control " name ="pRate" placeholder= "0.00" readonly style= "text-align:right">
                                        </div> 
                                    </div>
                                    

                                
                                    </div>
                            
                                    <div class="row">

                                    
                                        <div class="col-xl-6" >  
                                            <label for="status" class="fs-5 fw-bold">Mode of payment</label>
                                            <select name="" class="form-select" id="status">
                                            <option value="g-cash">G-cash</option>
                                            <option value="cash">Cash</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6" >
                                        <label for="prate" class="fs-5 fw-bold">Service Status</label>
                                            <select name="" class="form-select" id="status">
                                                <option value="avail">On going</option>
                                                <option value="noavail">Settled</option>
                                        
                                            </select>
                                    </div>
                                    
                                    <div class="row g-0">

                                        <div class="col-md-12  pe-3    my-2">
                                            <div class="float-end ">
                                                <div class="btn-group  ">
                                            <button type ="button" role = "button" class="btn btn-success px-2" >
                                                <i class="fa fa-upload mx-1"></i>
                                                Submit
                                            </button>
                                            </div>
                                            <div class="btn-group">
                                            <button type ="button" role = "button" class="btn btn-secondary px-2" data-bs-dismiss= "modal" >
                                                <i class="fa fa-times-circle mx-1"></i>
                                                Cancel
                                            </button>
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
        </div>
        <div class="modal fade" id = "edit-srecord" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content g-0 blue">
                    <div class="modal-header blue white ">
                        <div class="modal-title white" >&nbsp;<i class = "fa fa-edit"></i>&nbsp;&nbsp;Edit Service Record</div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                    <div class="row gx-3">
                                <div class="col-xl-12" >
                                    <div class="row">
                                        <div class="col-xl-6 ">
                                            <label for="prate" class="fs-5 fw-bold">Requestor Name</label>
                                            <div class="d-flex">    
                                            <input type="text" id = "prate" class="form-control" name ="pRate" placeholder= "Requestor Name">
                                            </div>
                                        </div>
                                       
                                       
                                      
                              

                                    </div>
                                    <div class="row">
                                    <div class="col-xl-6">
                                                <label for="purp" class= "fs-6 fw-bold">Purposes</label>
                                                    <select class= "select form-select" name="" id="purp" onchange = "showOthersEdit('othersed', this)">
                                                        <option  selected>Purposes</option>
                                                        <option value="ent">For entertainment</option>
                                                        <option value="med">For medical reasons</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                    <div class="col-xl-12" id ="othersed">
                                        <label for="purp" class= "fs-6 fw-bold">Purpose </label>
                                            <input type="text" class="form-control" placeholder = "Specify purpose here">
                                        </div>
                                            </div>
                                        <div class="col-xl-6" >
                                            <label for="prate" class="fs-5 fw-bold">Service Date</label>
                                            <input type="date"  id = "date" class="form-control " name ="date">
                                        </div>
                                        
                                    
                                    </div>
                                
                                    <div class="row">
                                    <div class="col-xl-6" >  
                                            <label for="sa" class="fs-5 fw-bold">Service to avail</label>
                                            <select name="" class="form-select" id="sa">
                                                <option value="avail">Drug Seminar</option>
                                                <option value="noavail">Circumcision</option>
                                                <option value="noavail">Marriage</option>
                                            </select>
                                            </div>
                                        <div class="col-xl-6" >
                                            <label for="prate" class="fs-5 fw-bold">Fee<span class= "text-muted fs-6">(₱)</span></label>
                                            <div class="input-group">
                                                <button class="btn btn-secondary disabled">
                                                ₱
                                                </button>    
                                                <input type="text" id = "prate" class="form-control " name ="pRate" placeholder= "0.00" readonly style= "text-align:right">
                                        </div> 
                                    </div>
                                    

                                
                                    </div>
                            
                                    <div class="row">

                                    
                                        <div class="col-xl-6" >  
                                            <label for="status" class="fs-5 fw-bold">Mode of payment</label>
                                            <select name="" class="form-select" id="status">
                                            <option value="g-cash">G-cash</option>
                                            <option value="cash">Cash</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6" >
                                        <label for="prate" class="fs-5 fw-bold">Service Status</label>
                                            <select name="" class="form-select" id="status">
                                                <option value="avail">On going</option>
                                                <option value="noavail">Settled</option>
                                        
                                            </select>
                                    </div>
                                    
                                    <div class="row g-0 " >
                                        <div class="col-md-12 pe-3 my-2">
                                            <div class="float-end">
                                                <div class="btn-group">
                                            <button type ="button" role = "button" style = "" class="btn btn-primary px-2" >
                                                <i class= "fa fa-save mx-1"></i>
                                                Save
                                            </button>
                                            </div>
                                            <div class="btn-group">
                                            <button type ="button" role = "button" class="btn btn-secondary px-2" data-bs-dismiss= "modal" >
                                                <i class="fa fa-times-circle mx-1"></i>
                                                Cancel
                                            </button>
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
        </div>
        <div class="modal fade" id = "check-srecord" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content g-0 border-0">
                    <div class="modal-header bg-599 border-599 text-white ">
                        <div class="modal-title white" >&nbsp;<i class = "fa fa-eye"></i>&nbsp;&nbsp;Service Record</div>
                        
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white ">
                    <div class="row gx-3">
                                <div class="col-xl-12" >
                                    <div class="row">
                                        <div class="col-6 ">
                                            <label for="prate" class="fs-5 fw-bold">Requestor Name</label>
                                            <div class="d-flex">    
                                            <input type="text" id = "prate" class="form-control" name ="pRate" placeholder= "Requestor Name" readonly>
                                            </div>
                                        </div> 
                                        

                                    </div>
                                    <div class="row">
                                    <div class="col-xl-6">
                                            <label for="purp" class= "fs-5 fw-bold">Purposes</label>
                                            <select class= "select form-select" name="" id="purp" disabled onchange = "showOthers('others', this)">
                                                <option  selected>Purposes</option>
                                                <option value="ent">For entertainment</option>
                                                <option value="med">For medical reasons</option>
                                                <option value="others">Others</option>
                                            </select>
                                
                                        </div>
                                        <div class="col-xl-6" >
                                            <label for="prate" class="fs-5 fw-bold">Service Date</label>
                                            <input type="date"  id = "date" class="form-control " readonly name ="date">
                                        </div>
                                       
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-xl-6" >  
                                            <label for="status" class="fs-5 fw-bold">Service to avail</label>
                                            <select name="" class="form-select" id="status" disabled>
                                                <option value="avail">Barangay Van</option>
                                                <option value="noavail">Patrol</option>
                                                <option value="noavail">Basketball court</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6" >
                                            <label for="prate" class="fs-5 fw-bold">Fee<span class= "text-muted fs-6">(₱)</span></label>
                                            <div class="input-group">
                                                <button class="btn btn-secondary disabled">
                                                ₱
                                                </button>    
                                                <input type="text" id = "prate" class="form-control " name ="pRate" placeholder= "0.00" readonly style= "text-align:right">
                                        </div> 
                                    </div>
                                    
                                    
                                
                                    </div>
                            
                                    <div class="row">

                                    
                                        <div class="col-xl-6" >  
                                            <label for="status" class="fs-5 fw-bold">Mode of payment</label>
                                            <select name="" class="form-select" id="status" disabled>
                                            <option value="g-cash">G-cash</option>
                                            <option value="cash">Cash</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6" >
                                        <label for="prate" class="fs-5 fw-bold">Service Status</label>
                                            <select name="" class="form-control" id="status" disabled>
                                                <option value="avail">On going</option>
                                                <option value="noavail">Settled</option>
                                        
                                            </select>
                                    </div>
                                    <div class="row g-0" >
                                        <div class="col-md-12   pe-3  mx-auto my-2">
                                        <div class="float-end">
                                            <button type ="button" role = "button" class="btn btn-secondary px-2" data-bs-dismiss= "modal">
                                                Done
                                            </button>
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

    <div class="modal fade" id = "delete-srecord" tab-idndex = "-1">
    <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-danger" >
                    <div class="modal-header  white ">
                        <div class="modal-title bg-danger" id="delete">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Are you sure</div>
                        
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
                            <div class="col-xl-12">
                                <div class="float-end">
                                    <div class="btn-group">
                                        <button type = "button" class="btn btn-success " data-bs-dismiss = "modal"  name = "yes" value ="Yes">
                                    <i class= 'fa fa-check mx-1'></i>Confirm
                                </button>
                                </div>
                                <div class="btn-group">
                                <button type = "button" class="btn btn-danger " data-bs-dismiss = "modal"  name = "no" value ="No">
                                    <i class= "fa fa-times-circle mx-1"></i>Cancel
                                </button>
                                </div>
                           
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

        <div class="modal fade" id = "approve-transac" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-success ">
                    <div class="modal-header bg-success  ">
                        <div class="modal-title white">&nbsp;<i class = "fa fa-question-circle"></i>&nbsp;&nbsp;Send Proof of transaction</div>
                        
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
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;resize: none;"></textarea>
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
                                    
                                    <div class="col-md-12">
                                        <div class="float-end">
                                            <div class="btn-group">
                                        <button href ="#" type = "button" class="btn btn-success " data-bs-dismiss ="modal"  >
                                            <i class= 'fa fa-paper-plane py-1 me-2'></i>Send
                                        </button>
                                        </div>
                                        <div class="btn-group">
                                        <button type = "button" class="btn btn-danger " data-bs-dismiss = "modal"  name = "no" value ="No">
                                            <i class= "fa fa-times me-2"></i>Discard
                                        </button>
                                        </div>
                                        </div>
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