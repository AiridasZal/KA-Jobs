<?php
if (isset($_POST["submit"])) {
    session_start();
    $newEmail = $_POST["newEmail"];
    $userId = $_SESSION["userid"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyEmailChange($newEmail) !== false) {
        header("location: ../profile.php?error=emptyinputemail");
        exit();
    }

    if (invalidEmail($newEmail) !== false) {
        header("location: ../profile.php?error=invalidemail");
        exit();
    }
    changeEmail($conn, $newEmail, $userId);
    header("location: ../profile.php?error=emailnone");
}
   
else{
    header("location: ../profile.php");
    exit();
}