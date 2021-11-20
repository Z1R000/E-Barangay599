<?php
include('includes/dbconnection.php');


if(isset($_POST["cid"]))
{
  $output = '';  
  $sql= 'Select tblresident.*, tblcreatecertificate.*, tblcertificate.*, tblcreatecertificate.ID as cID from tblcreatecertificate join tblresident on tblresident.ID = tblcreatecertificate.Userid join tblcertificate on tblcertificate.ID = tblcreatecertificate.CertificateId and tblcreatecertificate.ID = '.$_POST['cid'].' ORDER BY tblcreatecertificate.resDate DESC';
  '
  ORDER BY tblcreatecertificate.resDate DESC ';

  if ($result = mysqli_query($con, $sql)){
    if (mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result))
        {
            $pay = '';
            $ref = '';
            $proof = '';
            $da = '';
            $pd = '';
            $payment = "Select * from tblpaymentlogs where creationID = ".$_POST['cid']." and servicetype = 2";
                if ($res = mysqli_query($con,$payment)){
                    if(mysqli_num_rows($res)>0){   
                        while($rows=mysqli_fetch_array($res)){
                            $pay = $rows['payment'];
                            $ref = $rows['refNum'];
                            $proof = $rows['proof'];
                            $da =date('F j, Y - h:i ', strtotime($rows['dateAccepted']));
                            $pd = date('F j, Y - h:i ', strtotime($rows['paymentDate']));
                        

                    }
                    
            
                } 
            }           
            echo '
            <div class= "row">
                <div class="col-xl-12">
                <div class="fs-5 text-primary">Sent: '.$pd.'</div>
                <div class="fs-5 pb-3 text-primary">Verified: '.$da.'</div>
                <label for="payid" class="fs-5">Payment ID</label>
                <input id = "payid" type="text" class= "form-control" placeholder = "Payor Name" value = "'.$ref.'" readonly style = "text-align: left;">
                </div>
            </div>
            <div class="row">
            <div class="col-md-12 ">
                <label for="payname" class="fs-5">Requestor Name</label>
                <input id = "payname" type="text" class= "form-control" placeholder = "" value = "'.$row['LastName'].",".$row['FirstName']." ".$row['MiddleName']." ".$row['Suffix'].'" readonly>
            </div>
            </div>
            <div class="row">
     
            <div class="col-md-6 ">
                <label for="payed" class="fs-5">Paid</label>
                <div class="input-group">
                    <button class="btn btn-secondary disabled">₱</button>
                    <input id = "payed" type="text" class= "form-control" placeholder = "payment" value = "'.$pay.'" style= "text-align: right"readonly > 

                </div>
    
            </div>
            <div class="col-md-6 " class="fs-5">
            <label for="payed" class= "fs-5">Payable</label>
            <div class="input-group">
                <button class="btn btn-secondary disabled">₱</button>
                <input id = "payed" type="text" class= "form-control" placeholder = "Payor Name" value = "'.$row['CertificatePrice'].'" style= "text-align: right"readonly> 
            </div>
        </div>
    
        <label for="payed" class="fs-5 mb-2">Proof of Payment- <a href= "'.$proof.'" download target = "_blank" class= "text-decoration-none"><i class= "fa fa-download"></i>Download proof</label></a>
        
        <div class="row justify-content-center text-center">
            <div class="col-md-4"> 
                <a align ="center" href = "'.$proof.'" target= "_blank"><img style= "max-height: 400px" src="'.$proof.'" class= "img-fluid"></a>
            </div>
        </div>                                                    
    </div>
        <div class="modal fade" id = "proof" tab-idndex = "-1">
        <div class="modal-dialog modal-dialog-centered modal-md ">
            <div class="modal-content g-0 ">
                <div class="modal-header bg-danger bg-white border-bottom ">

                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white" align = "center">
                        <img src="'.$proof.'" alt="" style= "max-width: 100%;">
                </div>
               <div class="row">
                   <div class="col-md-12">
                        <div class="float-end px-4 py-3">
                            <div class="btn-group">
                                <button class="btn-secondary btn">Done</button>
                            </div>
                        </div>
                   </div>
               </div>
            </div>
        </div>
    </div>

     ';
        }
      }
      else{
          echo "ala pre";
      }
        
  }else{
    echo "ala talga";
  }
    

 }




?>