<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <form method = "POST" action = "mpdf.php" class="offset-md-3 col-md-6">
            <div class="row mb-2">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder = "Requestor First Name" name= "rfname" required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder = "Requestor Last Name" name = "rlname">
                </div>
            </div>
            <div class="col-mb-2">
                <input type="text" class="form-control" placeholder = "Address" name = "addr">
            </div>
            <div class="col-mb-2 mt-2 w-100">
                <input type="submit" name ="submit"class="form-control btn btn-success">
            </div>
        </form>
        
    </div>
    
</body>
</html>