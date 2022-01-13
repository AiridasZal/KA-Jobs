<?php
if (isset($_POST["submit"])) {
   

    $star_rating = $_POST["star_rating"];
    $comment = $_POST["comment"];
    $user_id = $_POST["user_id"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    saveComment($conn, $star_rating, $comment, $user_id);

}
else{
    header("location: ../signup.php");
    exit();
}