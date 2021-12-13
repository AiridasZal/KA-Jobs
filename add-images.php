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
                <form action="includes/add-images.inc.php" method="post" enctype="multipart/form-data" class="form" style="width: 700px;">
                    <h1 class="form__title">Create a listing</h1>
                    <p class="form__description">Additional information     2/3</p>
                    <div class="form__div">
                        <input type="file" class="form__input" name="my-image" placeholder=" ">
                        <label for="" class="form__label">Choose image</label>
                    </div>
                    <input type="submit" class="button" style="width: 100px; float: right;" name="submit" value="Upload">
                    <input type="button" class="button" style="width: 100px; float: left;" name="back" value="Back" id="atsaukti">
                    
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo '<p class=errormessage style="text-align: center;">Fill in all fields!</p>';
                        }
                        else if($_GET["error"] == "invalidprice"){
                            echo '<p class=errormessage style="text-align: center;">Wrong price format!</p>';
                        }
                        else if($_GET["error"] == "titleshort"){
                            echo '<p class=errormessage style="text-align: center;">The title is too short!</p>';
                        }
                        else if($_GET["error"] == "descshort"){
                            echo '<p class=errormessage style="text-align: center;">Description is too short!</p>';
                        }
                    }
                    ?>
                    </form>
                    
                <!-- MODAL SECTION -->
                <div class="bg-modal">
                    <div class="modal-content">
                        <div class="close">+</div>
                            <h1 style="margin-top: 10px;">Are you sure you want to go back?</h1>
                            <input type="submit" value="Yes" name="yes" class="yes" onclick="window.location.href='add-job.php'">
                            <input type="submit" value="No" name="no"  class="no">
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