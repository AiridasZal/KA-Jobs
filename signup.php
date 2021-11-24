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
                <form action="includes/signup.inc.php" method="post" class="form">
                    <a href="login.php" class="inactive__select account__cselect">Sign In</a>
                    <a href="signup.php" class="account__cselect active-link">Register</a>
                    <h1 class="form__title">Register</h1>
                    <p class="form__description">Create an account to start using our service.</p>   
                                     
                    <div class="form__div">
                        <input type="text" name="name" class="form__input" placeholder=" ">
                        <label for="" class="form__label">Full name</label>
                    </div>

                    <div class="form__div">
                        <input type="text" name="uid" class="form__input" placeholder=" ">
                        <label for="" class="form__label">Username</label>
                    </div>

                    <div class="form__div">
                        <input type="text" name="email" class="form__input" placeholder=" ">
                        <label for="" class="form__label">Email</label>
                    </div>

                    <div class="form__div">
                        <input type="password" name="pwd" class="form__input" placeholder=" ">
                        <label for="" class="form__label">Password</label>
                    </div>

                    <div class="form__div">
                        <input type="password" name="pwdrepeat" class="form__input" placeholder=" ">
                        <label for="" class="form__label">Confirm password</label>
                    </div>
                    <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "emptyinput") {
                        echo "<p class=errormessage>Fill in all fields!</p>";
                    }
                    else if($_GET["error"] == "invalidUid"){
                        echo "<p class=errormessage>Choose a proper username</p>";
                    }
                    else if($_GET["error"] == "invalidemail"){
                        echo "<p class=errormessage>Choose a proper email</p>";
                    }
                    else if($_GET["error"] == "passwordsdontmatch"){
                        echo "<p class=errormessage>Passwords doesn't match!</p>";
                    }
                    else if($_GET["error"] == "stmtfailed"){
                        echo "<p class=errormessage>Something went wrong!</p>";
                    }
                    else if($_GET["error"] == "usernametaken"){
                        echo "<p class=errormessage>Username already taken!</p>";
                    }
                    else if($_GET["error"] == "none"){
                        echo "<p class=errormessagenone>You have signed up!</p>";
                    }
                }       
                ?>
                    <input type="submit" name="submit" class="button" value="Create an account">
                </form>
            </div>
        </main>
<?php
    include_once 'footer.php';
?>