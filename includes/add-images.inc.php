<?php
ini_set('display_errors',0);
if (isset($_POST["submit"])) {

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputJob($title, $location, $price, $category, $subcategory, $desc) !== false) {
        header("location: ../add-job.php?error=emptyinput");
        exit();
    }
    if (invalidPrice($price) !== false) {
        header("location: ../add-job.php?error=invalidprice");
        exit();
    }
    if (tooShortTitle($title) !== false) {
        header("location: ../add-job.php?error=titleshort");
        exit();
    }
    if (tooShortDesc($desc) !== false) {
        header("location: ../add-job.php?error=descshort");
        exit();
    }
    createJobList($conn, $title, $location, $price, $category, $subcategory, $desc);
    header("location: ../add-images.php");

}
else{
    header("location: ../add-job.php");
    exit();
}