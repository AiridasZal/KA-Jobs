<?php
    include_once 'header.php';
?>
    <section class="signup-form">
        <h2>Sign Up</h2>
        <div class="signup-form-form">
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="name" placeholder="Full name...">
                <input type="text" name="email" placeholder="Email...">
                <input type="text" name="uid" placeholder="Username..">
                <input type="password" name="pwd" placeholder="Password...">
                <input type="password" name="pwdrepeat" placeholder="Repeat password...">
                <button type="submit" name="submit">Sign Up</button>
            </form>
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
    </section>

<?php
    include_once 'footer.php';
?>