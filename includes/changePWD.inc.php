<?php

if (isset($_POST["submit"])) {
    session_start();
    $newPwd = $_POST["newPassword"];
    $newPwdRepeat = $_POST["repNewPwd"];
    $userId = $_SESSION["userid"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($newPwd, $newPwdRepeat) !== false) {
        header("location: ../profile.php?error=emptyinput");
        exit();
    }

    if (pwdMatch($newPwd, $newPwdRepeat) !== false) {
        header("location: ../profile.php?error=passwordsdontmatch");
        exit();
    }
    changePassword($conn ,$newPwd, $userId);
    header("location: ../profile.php?error=none");
}
else{
    header("location: ../profile.php");
    exit();
}