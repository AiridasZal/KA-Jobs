<?php
if (isset($_POST["submit"])) {
    session_start();
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $star_rating = $_POST["star_rating"];
    $comment = $_POST["comment"];
    $user_id = $_POST["user_id"];

    $s = $_POST["job_id"];

    $sql = "SELECT * FROM jobs WHERE jobsId=$s;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../comments.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);

    $jobsId = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);

    foreach($jobsId as $id){
        $selectedUser = $id['usersId'];
    }
    saveComment($conn, $star_rating, $comment, $user_id, $selectedUser, $s);
}
else{
    header("location: ../signup.php");
    exit();
}