<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
        include('link.php');
        
        if (isset($_POST['up'])){

            print_r($_FILES['file']);
            $fileName = $_FILES['file']['name'];
            
            $fileExt = explode('.',$fileName);
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];
            $fileTmpName = $_FILES['file']['tmp_name'];


            $extension = strtolower($fileExt[(count($fileExt)-1)]);
            echo $extension;
            $allowed  =['png','jpg','jpeg'];
            $deter = 0;
            foreach ($allowed as $ex){
                if ($ex==$extension){
                    $deter++;
                }
            }


            if ($deter >0){
                if ($fileSize<500000){
                    $newFileName = uniqid('',True).".".$extension;
                    $destination = '../images/'.$newFileName;
                    move_uploaded_file($fileTmpName,$destination);
                    header('Location: extracc.php?done=1');
                }
                else{
                    header('Location: extracc.php?error=met');
                }
            }
            else{
                echo "palayad";
            }

            echo "</br>".$fileName;
        }
    ?>
</head>
<body>
    
    <form method = "POST" enctype="multipart/form-data">
        <input type="file" name= "file" class="form-control">
        <button type = "submit" name = "up" class= "btn btn-primary">Upload</button>
    </form>
    
</body>
</html>