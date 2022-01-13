<?php
if (isset($_POST["submit"])) {
    session_start();
    $newEmail = $_POST["newEmail"];
    $newName = $_POST["newName"];
    $userId = $_SESSION["userid"];
    $number = $_POST["number"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyfield($newEmail, $newName, $number, $country, $city) !== false) {
        header("location: ../profile.php?error=emptyinputs");
        exit();
    }
    if (!empty($newEmail)){
        if (invalidEmail($newEmail) !== false) {
            header("location: ../profile.php?error=invalidemail");
            exit();
        }
        else{
            changeEmail($conn, $newEmail, $userId);
            header("location: ../profile.php?error=emailnone");
            exit();
        }
    }
    if (!empty($newName)){
        if(!preg_match("/^[a-zA-Z0-9]*$/", $newName)){
            header("location: ../profile.php?error=wrongusername");
        }
        else{
            changeName($conn, $newName, $userId);
            header("location: ../profile.php?error=usernone");
            exit();
        }
    }
    if (!empty($number)){
        if (!is_numeric($number)) {
            header("location: ../profile.php?error=invalidnumber");
            exit();
        }
        else{
            changeNumber($conn, $number, $userId);
            header("location: ../profile.php?error=numbernone");
            exit();
        }
    }
    if (!empty($country)){
        if (is_numeric($country)) {
            header("location: ../profile.php?error=invalidcountry");
            exit();
        }
        else{
            changeCountry($conn, $country, $userId);
            header("location: ../profile.php?error=countrynone");
            exit();
        }
    }
    if (!empty($city)){
        if (is_numeric($city)) {
            header("location: ../profile.php?error=invalidcity");
            exit();
        }
        else{
            changeCity($conn, $city, $userId);
            header("location: ../profile.php?error=citynone");
            exit();
        }
    }
}   
   
else{
    header("location: ../profile.php");
    exit();
}