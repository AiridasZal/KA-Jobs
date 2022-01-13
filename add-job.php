<?php
    ini_set('display_errors',0);
    session_start();
    if (!isset($_SESSION["useruid"])) {
        header("location: login.php");
    }
    include_once 'header.php';
?>

<main class="main">
            <div class="l-form container">
                <form action="includes/add-job.inc.php" method="post" class="form" style="width: 700px;">
                    <h1 class="form__title">Create a listing</h1>
                    <p class="form__description">General information 1/3</p>
                    <div class="form__div">
                        <input type="text" maxlength="20" class="form__input" name="title" placeholder=" " value="<?php if(isset($_SESSION["title"])) echo $_SESSION["title"];?>">
                        <label for="" class="form__label">Title</label>
                    </div>

                    <div class="form__div">
                        <input type="text" class="form__input" name="location" placeholder=" " value="<?php if(isset($_SESSION["location"])) echo $_SESSION["location"];?>">
                        <label for="" class="form__label">Location</label>
                    </div>

                    <div class="form__div">
                        <input type="text" class="form__input" name="price" placeholder=" " value="<?php if(isset($_SESSION["price"])) echo $_SESSION["price"];?>">
                        <label for="" class="form__label">Price (€)</label>
                    </div>

                    <div class="form__div">
                        <input type="text" class="form__input" name="category" placeholder=" " value="<?php if(isset($_SESSION["category"])) echo $_SESSION["category"];?>">
                        <label for="" class="form__label">Category</label>
                    </div>

                    <div class="form__div">
                        <input type="text" class="form__input" name="subCategory" placeholder=" " value="<?php if(isset($_SESSION["subcategory"])) echo $_SESSION["subcategory"];?>">
                        <label for="" class="form__label">SubCategory</label>
                    </div>

                    <div class="form__div">
                        <textarea name="desc" class="form__input" style="resize: none; border-radius: 4px;" placeholder=" "><?php if(isset($_SESSION["desc"])) echo $_SESSION["desc"];?></textarea>
                        <label for="" class="form__label">Description</label>
                    </div>

                    <input type="submit" class="button" style="width: 100px; float: right;" name="submit" value="Next">
                    <input type="button" class="button" style="width: 100px; float: left;" name="cancel" value="Cancel" id="atsaukti">

                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo '<p class=errormessage style="text-align: center; color: red;">Fill in all fields!</p>';
                        }
                        else if($_GET["error"] == "invalidprice"){
                            echo '<p class=errormessage style="text-align: center; color: red;">Wrong price format!</p>';
                        }
                        else if($_GET["error"] == "titleshort"){
                            echo '<p class=errormessage style="text-align: center; color: red;">The title is too short!</p>';
                        }
                        else if($_GET["error"] == "descshort"){
                            echo '<p class=errormessage style="text-align: center; color: red;">Description is too short!</p>';
                        }
                        else if($_GET["error"] == "stmtfailed"){
                            echo '<p class=errormessage style="text-align: center; color: red;">Could not connect to the database</p>';
                        }
                    }
                    ?>
                    </form>
                    
                <!-- MODAL SECTION -->
                
                <div class="bg-modal">
                    <div class="modal-content">
                        <div class="close">+</div>
                            <h1 class="h1text">Are you sure you want to cancel?</h1>
                            <input type="submit" value="Yes" name="yes" class="yes" onclick="window.location.href='index.php'">
                            <input type="submit" value="No" name="no"  class="no">
                            <?php
                                unset($_SESSION["title"]);
                                unset($_SESSION["location"]);
                                unset($_SESSION["price"]);
                                unset($_SESSION["category"]);
                                unset($_SESSION["subcategory"]);
                                unset($_SESSION["desc"]);
                            ?>
                    </div>
                </div>
                
</main>
        <script>
            document.getElementById("atsaukti").addEventListener("click", function() {
                document.querySelector('.bg-modal').style.display = 'flex';
            });
            document.querySelector(".close").addEventListener("click", function() {
                document.querySelector(".bg-modal").style.display = 'none';
            });
            document.querySelector(".no").addEventListener("click", function() {
                document.querySelector(".bg-modal").style.display = 'none';
            });
        </script>

<?php
    include_once 'footer.signup.php';
?>