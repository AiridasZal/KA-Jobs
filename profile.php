<?php
    ini_set('display_errors',0);
    session_start();
    if (!isset($_SESSION["useruid"])) {
        header("location: login.php");
    }
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
?>
    <link rel="stylesheet" href="css/profile.css">
<main class="main">
        <!--=============== HOME ===============-->
            <section class="home section" id="home">
                <div class="container profile_container" id="profile">
                    <div class="user_information">

                        <img class="profileIMG" src="img/profile.png" style="width: 200px; position: relative;">
                        <?php
                        $sql = "SELECT * FROM users WHERE usersId=$_SESSION[userid]";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            exit();
                        }
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            exit();
                        }
                        $result = $conn->query($sql) or die($conn->error);
                        while($data = $result->fetch_assoc()){
                            echo 
                            "<h1 style='text-align: center;'>
                            {$data['usersName']}
                            </h1>";
                            echo 
                            "<p style='text-align: center; font-size: 20px;'>
                            {$data['usersUid']}
                            </p>";
                            echo 
                            "<p style='text-align: center; font-size: 20px;'>
                                {$data['usersEmail']}
                            </p>";
                        }
                    ?>
                </div>
                <div class="change_settings">

                    <div id="title"><h1>Profile settings<h1></div>
                    <div id="emailChange">
                        <form action="includes/changeEmail.inc.php" method="post">
                            <div class="label_grid">

                                <div class="form__div">
                                    <input type="" class="form__input" name="newEmail" placeholder=" ">
                                    <label for="" class="form__label">Name</label>
                                </div>
                                <div class="form__div">
                                    
                                    <input type="" class="form__input" name="newEmail" placeholder=" ">
                                    <label for="" class="form__label">Last name</label>
                                </div>
                            </div>
                            <div class="form__div">
                                <input type="" class="form__input" name="newEmail" placeholder=" ">
                                <label for="" class="form__label">New Email</label>
                            </div>
                            <div class="form__div">
                                <input type="" class="form__input" name="newEmail" placeholder=" ">
                                <label for="" class="form__label">Phone number</label>
                            </div>
                            <div class="label_grid">

                            <div class="form__div ">
                                    <input type="" class="form__input" name="newEmail" placeholder=" ">
                                    <label for="" class="form__label">Country</label>
                                </div>

                                <div class="form__div">
                                    
                                    <input type="" class="form__input" name="newEmail" placeholder=" ">
                                    <label for="" class="form__label">City</label>
                                </div>
                                </div>
                            <input type="submit" class="button" name="submit" value="Change">
                        </form>
                        <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinputemail") {
                                echo '<p class=errormessage style="text-align: center; color: red;">Fill in all fields!</p>';
                            }
                            else if($_GET["error"] == "invalidemail"){
                                echo '<p class=errormessage style="text-align: center; color: red;">Wrong E-Mail format!</p>';
                            }
                            else if($_GET["error"] == "emailalreadyused"){
                                echo '<p class=errormessage style="text-align: center; color: red;">Email already in use!</p>';
                            }
                            else if($_GET["error"] == "emailnone"){
                                echo '<p class=errormessagenone style="text-align: center; color: green;">E-Mail changed successfully!</p>';
                            }
                        }
                        ?>
                    </div>
                    <div id="passwordChange">
                        <h1 class="spacing">Change password</h1>
                        <form action="includes/changePWD.inc.php" method="post">
                            
                            <div class="form__div">
                                <input type="password" class="form__input" name="newPassword" placeholder=" ">
                                <label for="" class="form__label">Password</label>
                            </div>
                            
                            <div class="form__div">
                                <input type="password" class="form__input" name="repNewPwd" placeholder=" ">
                                <label for="" class="form__label">New Password</label>
                            </div>
                            
                            <input type="submit" class="button" name="submit" value="Change">
                        </form>
                        <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinput") {
                                echo '<p class=errormessage style="text-align: center; color: red;">Fill in all fields!</p>';
                            }
                            else if($_GET["error"] == "passwordsdontmatch"){
                                echo '<p class=errormessage style="text-align: center; color: red;">Passwords do not match!</p>';
                            }
                            else if($_GET["error"] == "none"){
                                echo '<p class=errormessagenone style="text-align: center; color: green;">Password changed successfully!</p>';
                            }
                        }
                        ?>
                    </div>
                    
                </div>
                </div>
            </section>
        </main>

<?php
    include_once 'footer.signup.php';
    ?>

