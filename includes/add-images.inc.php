<?php
ini_set('display_errors',0);
if (isset($_POST["submit"])) {

    session_start();
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $file = $_FILES["jobImage"];

    $fileName = $_FILES["jobImage"]["name"];
    $fileTmpName = $_FILES["jobImage"]["tmp_name"];
    $fileSize = $_FILES["jobImage"]["size"];
    $fileError = $_FILES["jobImage"]["error"];
    $fileType = $_FILES["jobImage"]["type"];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $stop = false;
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = "../uploads/".$fileNameNew;
                createJobList($conn, $_SESSION["title"], $_SESSION["location"], $_SESSION["price"], $_SESSION["category"], $_SESSION["subCategory"], $_SESSION["desc"]);
                uploadImage($conn, $_SESSION["title"], $_SESSION["location"], $_SESSION["price"], $_SESSION["category"], $_SESSION["subCategory"], $_SESSION["desc"], $fileNameNew, $fileTmpName, $fileDestination);
            }
            else{
                header("location: ../add-images.php?error=size");
            }
        }
        else{
            header("location: ../add-images.php?error=oops");
        }
    }
    else{
        header("location: ../add-images.php?error=invalidtype");
    }

}
else{
    header("location: ../add-job.php");
    exit();
}