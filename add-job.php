<?php
    ini_set('display_errors',0);
    session_start();
    if (!isset($_SESSION["useruid"])) {
        header("location: login.php");
    }
    include_once 'header.php';
?>

<main class="main">
    <div class="l-form2 container">
        <form action="includes/add-job.inc.php" method="post" class="form2" style="width: 700px;">
            <h1 class="form__title">Create a listing</h1>
            <p class="form__description">General information 1/2</p>
            <div class="form__div">
                <input type="text" maxlength="80" class="form__input" name="title" placeholder=" " value="<?php if(isset($_SESSION["title"])) echo $_SESSION["title"];?>">
                <label for="" class="form__label">Title</label>
            </div>
            
            <div class="input__grid">
                <div class="input__div">
                    <select name="location" class="form__input" placeholder=" " value="<?php if(isset($_SESSION["location"])) echo $_SESSION["location"];?>">
                    <option value="" disabled selected hidden>Select your option</option>
                        <option value="Vilnius">Vilnius</option>
                        <option value="Kaunas">Kaunas</option>
                        <option value="Klaipėda">Klaipėda</option>
                        <option value="Panevėžys">Panevėžys</option>
                        <option value="Šiauliai">Šiauliai</option>
                    </select>
                    <label for="" class="form__label">Location</label>
                </div>

                <div class="input__div2">
                    <input type="text" class="form__input" name="price" placeholder=" " value="<?php if(isset($_SESSION["price"])) echo $_SESSION["price"];?>">
                    <label for="" class="form__label">Price (€)</label>
                </div>
            </div>
            <div class="input__grid">
                <div class="input__div">
                    <select name="category" class="form__input" placeholder=" " value="<?php if(isset($_SESSION["category"])) echo $_SESSION["category"];?>">
                        <option value="" disabled selected hidden>Select your option</option>
                        <option value="gardening">Gardening</option>
                        <option value="coding">Coding</option>
                        <option value="cleaning">Cleaning</option>
                    </select>
                    <label for="" class="form__label">Category</label>
                </div>

                <div class="input__div2">
                    <select name="subCategory" class="form__input" placeholder=" " value="<?php if(isset($_SESSION["subcategory"])) echo $_SESSION["subcategory"];?>">
                        <option value="" disabled selected hidden>Select your option</option>
                        <option value="gardening">Gardening</option>
                        <option value="coding">Coding</option>
                        <option value="cleaning">Cleaning</option>
                    </select>
                    <label for="" class="form__label">SubCategory</label>
                </div>
            </div>

            <div class="form__div">
                <textarea name="desc" class="form__input" style="resize: none; border-radius: 4px; height: 150px;" placeholder=" "><?php if(isset($_SESSION["desc"])) echo $_SESSION["desc"];?></textarea>
                <label for="" class="form__label">Description</label>
            </div>

            <input type="submit" class="button" style="margin-top: 100px; width: 100px; float: right;" name="submit" value="Next">
            <input type="button" class="button" style="margin-top: 100px; width: 100px; float: left;" name="cancel" value="Cancel" id="atsaukti">

            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo '<p class=errormessage style="margin-top: 130px; text-align: center;">Fill in all fields!</p>';
                }
                else if($_GET["error"] == "invalidprice"){
                    echo '<p class=errormessage style="margin-top: 130px; text-align: center;">Wrong price format!</p>';
                }
                else if($_GET["error"] == "titleshort"){
                    echo '<p class=errormessage style="margin-top: 130px; text-align: center;">The title is too short!</p>';
                }
                else if($_GET["error"] == "descshort"){
                    echo '<p class=errormessage style="margin-top: 130px; text-align: center;">Description is too short!</p>';
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