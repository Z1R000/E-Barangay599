<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('link.php'); ?>
    <?php
    
echo'
<script>
    function successalert(){
        Swal.fire({
      title: \'Certificate Update\',
      icon: \'success\',
      showCancelButton: false,
      confirmButtonColor: \'#3085d6\',
      cancelButtonColor: \'#d33\',
      confirmButtonText: \'Yes, delete it!\'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          \'Deleted!\',
          \'Your file has been deleted.\',
          \'success\'
        )
        window.location.href =\'payment-verification-cert.php?editid=".$eid."&diff=".$diff."&type=1\'
      }
    })
    }
    </script>
    ';
  

    
    ?>
    
    
</head>
<body>
<div class="container">
<form method = "POST">
    <div class="row">
<div class="col-8 border mx-auto">
    <div class="row justify-content-center">
<div class="form-check">
  <input class="form-check-input" name ="check" type="checkbox" onchange = "document.getElementById('submit').disabled = !this.checked" value="ssss" id="flexCheckDefault">

 
</div>

<button type= "submit" id = "submit" onclick = "successalert()" class = "btn btn-primary" name ="submit">SUBMIT</button>
</form>


</div>
</div>
</div>
</div>
</body>
</html>
