<?php
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
        
function pwdMatch($pwd, $pwdRepeat){
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd){
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}

function emptyInputJob($title, $location, $price, $category, $subcategory, $desc){
    $result;
    if(empty($title) || empty($location) || empty($price) || empty($category) || empty($subcategory) || empty($desc)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidPrice($price){
    $result = is_nan($price);
    return $result;
}

function tooShortTitle($title){
    $result;
    if(strlen($title) < 5){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function tooShortDesc($desc){
    $result;
    if(strlen($desc) < 10){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function createJobList($conn, $title, $location, $price, $category, $subcategory, $desc){
    session_start();

    $sql = "SELECT * FROM jobs WHERE usersId = ? AND jobsTitle = ? AND jobsLocation = ? AND jobsPrice = ? AND jobsCategory = ? AND jobsSubCategory = ? AND jobsDesc = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../add-job.php?error=stmtfailed");
        exit();
    }
    
    $usersId = $_SESSION["userid"];

    mysqli_stmt_bind_param($stmt, "issdsss", $usersId, $title, $location, $price, $category, $subcategory, $desc);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        return;
    }
    mysqli_stmt_close($stmt);

    $sql = "INSERT INTO jobs (usersId, jobsTitle, jobsLocation, jobsPrice, jobsCategory, jobsSubCategory, jobsDesc) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../add-job.php?error=stmtfailed");
        exit();
    }
    
    $usersId = $_SESSION["userid"];

    mysqli_stmt_bind_param($stmt, "issdsss", $usersId, $title, $location, $price, $category, $subcategory, $desc);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    //------------------------------------------------------------------------------------------------------------------------
}
function uploadImage($conn, $title, $location, $price, $category, $subcategory, $desc, $fileNameNew, $fileTmpName, $fileDestination){
    session_start();
    $sql = "SELECT * FROM jobs WHERE usersId = ? AND jobsTitle = ? AND jobsLocation = ? AND jobsPrice = ? AND jobsCategory = ? AND jobsSubCategory = ? AND jobsDesc = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../add-images.php?error=stmtfailed");
        exit();
    }

    $usersId = $_SESSION["userid"];
    
    mysqli_stmt_bind_param($stmt, "issdsss", $usersId, $title, $location, $price, $category, $subcategory, $desc);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        $jobNumber = $row["jobsId"];
    }
    mysqli_stmt_close($stmt);
    //-------------------------------------------------------------------------------------------------------------------------

    $sql = "SELECT * FROM gallery WHERE jobsId=$jobNumber;";
    $result = $conn->query($sql);
    if ($result = mysqli_query($conn, $sql)) {
        // Return the number of rows in result set
        $rowcount = mysqli_num_rows( $result );
    }
    if($rowcount == 0){
        $order = 1;
        $sql = "INSERT INTO gallery (jobsId, imageFullName, galleryOrder) VALUES (?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../add-images.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "isi", $jobNumber, $fileNameNew, $order);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    
        move_uploaded_file($fileTmpName, $fileDestination);
        header("location: ../add-images.php?error=none");
    }
    else if($rowcount == 1){
        $order = 2;
        $sql = "INSERT INTO gallery (jobsId, imageFullName, galleryOrder) VALUES (?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../add-images.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "isi", $jobNumber, $fileNameNew, $order);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        move_uploaded_file($fileTmpName, $fileDestination);
        header("location: ../add-images.php?error=none");
    }
    else if($rowcount == 2){
        $order = 3;
        $sql = "INSERT INTO gallery (jobsId, imageFullName, galleryOrder) VALUES (?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../add-images.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "isi", $jobNumber, $fileNameNew, $order);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        move_uploaded_file($fileTmpName, $fileDestination);
        unset($_SESSION["title"]);
        unset($_SESSION["location"]);
        unset($_SESSION["price"]);
        unset($_SESSION["category"]);
        unset($_SESSION["subcategory"]);
        unset($_SESSION["desc"]);
        header("location: ../index.php");
        exit();
    }
    else{
        unset($_SESSION["title"]);
        unset($_SESSION["location"]);
        unset($_SESSION["price"]);
        unset($_SESSION["category"]);
        unset($_SESSION["subcategory"]);
        unset($_SESSION["desc"]);
        header("location: ../index.php");
        exit();
    }
}

function changePassword($conn, $newPwd, $userId){
    $sql = "UPDATE users SET usersPwd = ? WHERE usersId = $userId";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profiles.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($newPwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "s", $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function emptyfield($newEmail, $newName, $number, $country, $city){
    $result;
    if (empty($newEmail) && empty($newName) && empty($number) && empty($country) && empty($city)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function changeEmail($conn, $newEmail, $userId){
    $sql = "SELECT * FROM users WHERE usersEmail = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $newEmail);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        header("location: ../profile.php?error=emailalreadyused");
        exit();
    }

    $sql = "UPDATE users SET usersEmail = ? WHERE usersId = $userId";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $newEmail);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function changeName($conn, $newName, $userId){
    $sql = "SELECT * FROM users WHERE usersUid = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $newName);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        header("location: ../profile.php?error=usernamealreadyused");
        exit();
    }

    $sql = "UPDATE users SET usersUid = ? WHERE usersId = $userId";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $newName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function changeNumber($conn, $number, $userId){
    $sql = "SELECT * FROM users WHERE phoneNumber = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $number);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        header("location: ../profile.php?error=numberalreadyused");
        exit();
    }
    $num_length = strlen((string)$number);
    if($num_length == 9) {
        $sql = "UPDATE users SET phoneNumber = ? WHERE usersId = $userId";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../profile.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "i", $number);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    else if($num_length > 9){
        header("location: ../profile.php?error=toolongnumber");
        exit();
    }
    else{
        header("location: ../profile.php?error=toolshortnumber");
        exit();
    }
}

function changeCountry($conn, $country, $userId){
    $sql = "UPDATE users SET country = ? WHERE usersId = $userId";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $country );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function changeCity($conn, $city, $userId){
    $sql = "UPDATE users SET city = ? WHERE usersId = $userId";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../profile.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $city );
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}