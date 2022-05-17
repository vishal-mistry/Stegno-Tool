<?php
    session_start();
    if( is_dir('uploads/'.$_SESSION["username"]) === false )
{
    mkdir('uploads/'.$_SESSION["username"]);
}
    $currentDir = getcwd();
    $uploadDirectory = '/uploads/'.$_SESSION["username"].'/';

    $errors = []; // Store all foreseen and unforseen errors here
    $total = count($_FILES['myfile']['name']);

    for( $i=0 ; $i < $total ; $i++ ) {
    $fileName = $_FILES['myfile']['name'][$i];
    $fileSize = $_FILES['myfile']['size'][$i];
    $fileTmpName  = $_FILES['myfile']['tmp_name'][$i];
    $fileType = $_FILES['myfile']['type'][$i];

    $uploadPath = $currentDir . $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                echo "The file " . basename($fileName) . " has been uploaded<br>";
                if ($i==($total-1)) {
                    header("location: welcome.php");
                    exit;
                }
            } else {
                echo "An error occurred somewhere. Try again or contact the admin".$didUpload;
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
    }


    }
?>