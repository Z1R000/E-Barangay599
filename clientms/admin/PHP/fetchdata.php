<?php
//fetchdata.php
if(isset($_POST["action"]))
{
 $con = mysqli_connect("localhost", "root", "", "clientmsdb");
 $output = '';
 if($_POST["action"] == "ctype")
 {
  $query = "SELECT CertificatePrice, ID FROM tblcertificate WHERE ID = '".$_POST["query"]."'";
  $result = mysqli_query($con, $query);
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["CertificatePrice"].'" selected disabled>'.$row["CertificatePrice"].'</option>';
  }
 }
 echo $output;
}




if(isset($_POST["action"]))
{
 $con = mysqli_connect("localhost", "root", "", "clientmsdb");
 $output = '';
 if($_POST["action"] == "rtype")
 {
  $query = "SELECT rentalPrice FROM tblrental WHERE ID = '".$_POST["query"]."'";
  $result = mysqli_query($con, $query);
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<button class="btn btn-secondary disabled">₱</button>    
                <input type= "text" name="rprice" id="rprice" style= "text-align:right" value = "'.$row['rentalPrice'].' "class="form-control action" readonly>';
  }
 }
 echo $output;
}


if(isset($_POST["id"]))
{
 $con = mysqli_connect("localhost", "root", "", "clientmsdb");
 $output = '';
    
  $sql= 'Select tblresident.FirstName,tblcreaterental.ID as cID,tblcreaterental.payment,tblcreaterental.paymentID, tblcreaterental.proof, tblresident.LastName,tblresident.MiddleName, tblresident.Suffix, tblcreaterental.status, tblcreaterental.rentalStartDate, tblcreaterental.rentalEndDate, tblcreaterental.creationDate, tblpurposes.Purpose, tblrental.rentalName, tblrental.rentalPrice, tblcreaterental.payable, tblstatus.statusName from tblcreaterental join tblresident on tblresident.ID = tblcreaterental.userID join tblrental on tblrental.ID = tblcreaterental.rentalID join tblpurposes on tblpurposes.ID = tblcreaterental.purpID join tblstatus on tblstatus.ID = tblcreaterental.status where tblcreaterental.status = 3 and tblcreaterental.status<8 and tblcreaterental.ID = '.$_POST['id'].' order by tblcreaterental.creationDate DESC
  ';

  if ($result = mysqli_query($con, $sql)){
    if (mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result))
        {
            
            echo '
            <div class= "row">
                <div class="col-xl-12">
                
                <label for="payid" class="fs-5">Payment ID</label>
                <input id = "payid" type="text" class= "form-control" placeholder = "Payor Name" value = "'.$row['paymentID'].'" readonly style = "text-align: left;">
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
                    <input id = "payed" type="text" class= "form-control" placeholder = "payment" value = "'.$row['payment'].'" style= "text-align: right"readonly > 

                </div>
    
            </div>
            <div class="col-md-6 " class="fs-5">
            <label for="payed" class= "fs-5">Payable</label>
            <div class="input-group">
                <button class="btn btn-secondary disabled">₱</button>
                <input id = "payed" type="text" class= "form-control" placeholder = "Payor Name" value = "'.$row['payable'].'" style= "text-align: right"readonly> 

            </div>
        
        </div>
        <label for="payed" class="fs-5 mb-2">Proof of Payment- <a href= "../'.$row['proof'].'" download target = "_blank" class= "text-decoration-none"><i class= "fa fa-download"></i>Download proof</label></a>
        
        <div class="row justify-content-center text-center">
            <div class="col-md-4"> 
                <a align ="center" href = "#proof" data-bs-toggle ="modal" style= "max-height: 400px"><img src="../'.$row['proof'].'" class= "img-fluid"></a>
            </div>
        </div>                                                    
    </div>
    <div class="row justify-content-end">
        <div class="col" align= "right">


        <div class="btn-group">
        <div class="btn-group  mb-1  " role="group" aria-label="First group">
            <a href ="payment-verification.php?payment=success&rid='.$row['cID'].'"class="btn btn-success mx-1"  style = ""><i class = "fa fa-check mx-1 "></i><span class= "wal">Accept</span></a>
        </div>
            <div class="btn-group  mb-1  " role="group" aria-label="First group">
            <a href ="payment-verification.php?payment=rejected&rid='.$row['cID'].' "class="btn btn-danger mx-1" style= ""><i class = "fa fa-times fa-1x mx-1 "></i><span class= "wal"> Decline</span></a>
        </div>
        </div>


        <div class="modal fade" id = "proof" tab-idndex = "-1">
        <div class="modal-dialog modal-dialog-centered modal-md ">
            <div class="modal-content g-0 ">
                <div class="modal-header bg-danger bg-white border-bottom ">

                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white" align = "center">
                        <img src="../'.$row['proof'].'" alt="" style= "max-width: 100%;">
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
