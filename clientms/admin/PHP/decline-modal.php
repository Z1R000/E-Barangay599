<div class="modal fade" id = "decline" tab-idndex = "-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="delete-cert">&nbsp;<i class = "fa fa-info"></i>&nbsp;&nbsp;Decline Reason</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Reason for decline:</p>
                            <div class="row">
                                <div class="col-xl-8 my-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><a  disabled><i class ="fa fa-file"></i></a></div>
                                        
                                        </div>
                                        <!--populate with db kaw na populate hahaha galing db-->
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected disabled>-Decline Reason-</option>
                                            <option value="violence">Insufficient</option>
                                            <option value="public" >Invalid</option>
                                            <option value= "vb">Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                                <div class="col">
                                    <textarea class="form-control" placeholder="Decline Remarks" id="floatingTextarea2" style="height: 100px"></textarea>
                                   
                                    

                                </div>
                              
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">SMS
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                        <label class="form-check-label" for="flexCheckChecked">E-mail</label>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="modal-footer">
                    
                    <input type = "button" class="btn btn-success" data-bs-dismiss = "modal" onclick = "alert('Decline Message successfully sent!');" name = "delete" value ="Complete">
                    <input type="button" class="btn btn-secondary   " data-bs-dismiss="modal"  value = "Cancel">
                    </form>

                    </form>


                </div>
            </div>
        </div>
    </div>

       
