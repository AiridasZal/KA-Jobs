<?php
ini_set('display_errors',0);
if (isset($_POST["submit"])) {

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
}

else{
    header("location: ../add-job.php");
    exit();
}