<?php


//##########################################################################
// ITEXMO SEND SMS API - PHP - CURL METHOD
// Visit www.itexmo.com/developers.php for more info about this API
//##########################################################################
function itexmo($number,$message,$apicode,$passwd){
  $ch = curl_init();
  $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
  curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
  curl_setopt($ch, CURLOPT_POST, 1);
   curl_setopt($ch, CURLOPT_POSTFIELDS, 
            http_build_query($itexmo));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  return curl_exec ($ch);
  curl_close ($ch);
}
//##########################################################################

if ($_POST) {
  $number = $_POST['number'];
  $sdate = $_POST['sdate'];
  $edate = $_POST['edate'];
  $name = $_POST['name'];
  $msg = $_POST['msg'];
  $api = "TR-SALLA708062_SVUYX";
  $passwd = '&ln{%g{$ft';
  $text = $name . ";" . $msg . ";" . $sdate . ";" . $edate;

  if (!empty($_POST['name']) && ($_POST['number']) && ($_POST['msg']) && ($_POST['sdate']) && ($_POST['edate'])) {
    $result = itexmo($number, $text, $api, $passwd);
    if ($result == "") {
      echo "iTexMo: No response from server!!!
Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
Please CONTACT US for help. ";
    } else if ($result == 0) {
      echo "Message Sent!";
    } else {
      echo "Error Num " . $result . " was encountered!";
    }
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>SMS Module</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <form method="POST" actions="index.php">
          <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" maxlength="10" class="form-control" id="name" placeholder="Name" name="name" required>
          </div>
          <div class="form-group">
            <label for="name">Recipient's Mobile Number</label>
            <input type="text" maxlength="11" class="form-control" id="name" placeholder="Ex: 09123123121" name="number" required>
          </div>
          <div class="form-group">
            <label for="msg">Your Name</label>
            <textarea class="form-control" rows="3" name="msg" placeholder="Message here" onkeyup="countChar(this)" required></textarea>
            <p class="text-right" id="charNum">
              85
            </p>
            <div class="form-group">
                            <div class="col-md-6">
                                <label for = "sdate" class= "fs-5 fw-bold">Starting date</label>
                                <input type="datetime-local" class="form-control" id = "sdate" name = "sdate" placeholder = "Date of start" >
                            </div>
                            <div class="col-md-6">
                                <label for = "edate" class= "fs-5 fw-bold">Ending date</label>
                                <input type="datetime-local" class="form-control" id = "edate" name = "edate">
                            </div>
                  
                        </div>
            <button type="submit" class="btn btn-success">Send</button><br>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script>
    function countChar(val) {
      var len = val.value.length;
      if (len >= 85) {
        val.value = val.value.substring(0, 85);
      } else {
        $('#charNum').text(85 - len);
      };
    }
  </script>
</body>

</html>