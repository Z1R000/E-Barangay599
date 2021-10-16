<style>
 
    .img-fluid:hover{
        transform: scale(1.1);
        transition: .25s;
    }
</style>

        <div class="modal fade" id = "service-choice" tab-idndex = "-1">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content g-0 bg-info">
                    <div class="modal-header bg-info white">
                        <h5 class="modal-title" id="delete">&nbsp;<i class = "fa fa-paperclip"></i>&nbsp;&nbsp;Service Navigation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body bg-white">
                        <div class="row g-2 px-2">
                            <div class="col xl-4 px-3" align = "center">
                                <a href = "admin-rentals.php"><img src="../images/notebook.png" alt="trash" class= " img-fluid my-2" style ="width: 40%;"></a>
                                
                            <div class="row">
                                    <a type = "button" href="admin-rentals.php" class="op link-info rounded text-decoration-none"  name = "resident" value ="resident">
                                        Rentals
                                    </a>
                                </div>                           
                            </div>

                            <div class="col xl-4 px-3" align = "center">
                                <a href ="admin-certificate.php"><img src="../images/folder.png" alt="trash" class= " img-fluid my-2" style ="width: 40%;"></a>
                                <div class="row">
                                    <a class="op link-info rounded text-decoration-none" href ="admin-certificate.php"  name = "outsider" value ="outsider">
                                        Certifications
                                    </a>
                                </div>   
                            </div>
                            
                        </div>
                        <div class="row  px-2">
                            <div class="col xl-4 px-3" align = "center">
                                <a href ="admin-blotter.php"><img src="../images/drawer.png" alt="trash" class= " img-fluid my-2" style ="width: 40%;"></a>
                                
                            <div class="row">
                                    <a type = "button" href="admin-blotter.php" class="op link-info rounded text-decoration-none"  name = "resident" value ="resident">
                                        Blotter
                                    </a>
                                </div>                           
                            </div>

                            <div class="col xl-4 px-3" align = "center">
                                <a href ="admin-otherservice.php"><img src="../images/binder.png" alt="trash" class= "img-fluid my-2" style ="width: 40%;"></a>
                                <div class="row">
                                    <a class="op link-info rounded text-decoration-none" href ="admin-otherservice.php"  name = "outsider" value ="outsider">
                                        Other Services
                                    </a>
                                </div>   
                            </div>
                            
                        </div>
                        
                 
                
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>  