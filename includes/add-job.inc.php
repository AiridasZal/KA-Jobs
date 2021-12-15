<?php
session_start();
ini_set('display_errors',0);
if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $location = $_POST["location"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $subcategory = $_POST["subCategory"];
    $desc = $_POST["desc"];

    $_SESSION["title"] = $title;
    $_SESSION["location"] = $location;
    $_SESSION["price"] = $price;
    $_SESSION["category"] = $category;
    $_SESSION["subcategory"] = $subcategory;
    $_SESSION["desc"] = $desc;

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
    header("location: ../add-images.php");
}
else{
    header("location: ../login.php");
    exit();
}