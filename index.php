<?php

require_once("upload.php");

$file = new Upload();

if (isset($_POST["upload"]) && count($_POST["upload"]) > 0) {
    if ($file->fileUpload($_FILES["file"], "images/") === true) {
        echo $file->getFinallyName();
    } else {
        echo $file->getErrorMsg();
    }
}

?>

<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <title></title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/main/style.css">        
        <link rel="shortcut icon" type="image/x-icon" href="">
        <link rel="icon" type="image/png" href="">
    </head>
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="my-awesome-dropzone" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="form-group fallback">
                            <input type="file" name="file" id="file" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Upload" name="upload" class="form-control btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    </body>
</html>