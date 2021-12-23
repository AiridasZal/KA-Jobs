<?php
    ini_set('display_errors',0);
    session_start();
     if (isset($_SESSION["useruid"])) {
        header("location: profile.php");
    }
    include_once 'header.php';
?>

        <!--=============== SIGN IN SIDE ===============-->
        <main class="main">
            <div class="l-form container">
                <form action="includes/login.inc.php" method="post" class="form">
                    <a href="login.php" class="account__cselect active-link">Sign In</a>
                    <a href="signup.php" class="inactive__select account__cselect">Register</a>
                    <h1 class="form__title">Sign In</h1>
                    <p class="form__description">Sign in to continue to our site</p>

                    <div class="form__div">
                        <input type="text" class="form__input" name="uid" placeholder=" ">
                        <label for="" class="form__label">Email/Username</label>
                    </div>

                    <div class="form__div">
                        <input type="password" class="form__input" name="pwd" placeholder=" ">
                        <label for="" class="form__label">Password</label>
                    </div>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p class=errormessage>Fill in all fields!</p>";
                        }
                        else if($_GET["error"] == "wronglogin"){
                            echo "<p class=errormessage>Incorrect login information!</p>";
                        }
                    }
                    ?>
                    <input type="submit" class="button" name="submit" value="Sign In">
                </form>
            </div>
        </main>
<?php
    include_once 'footer.signup.php';
?>