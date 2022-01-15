<?php
    ini_set('display_errors',0);
    session_start();
    if (!isset($_SESSION["useruid"])) {
        header("location: login.php");
    }
    if(!isset($_SESSION["title"])){
        header("location: add-job.php");
    }
    include_once 'header.php';
?>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/add-images.css">
<main class="main">
    <div class="l-form container content">
        <form action="includes/add-images.inc.php" method="post" enctype="multipart/form-data" class="form" style="width: 700px;">
            <h1 class="form__title">Create a listing</h1>
            <p class="form__description">General information     2/2</p>
            <div class="form-group text-center" style="position: relative;" >
                <span class="img-div">
                    <div class="img-placeholder"  onClick="triggerClick()">
                        <h4>Upload image</h4>
                    </div>
                    <img src="img/emptyimg.png" onClick="triggerClick()" id="profileDisplay">
                </span>
                <input type="file" name="jobImage" onChange="displayImage(this)" id="jobImage" class="form-control" style="display: none;">
            </div>
        <input type="submit" class="button" style="width: 100px; float: right;" name="submit" value="Upload">
        <input type="button" class="button" style="width: 100px; float: left;" name="back" value="Back" id="atsaukti">
                    
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "invalidtype") {
                            echo '<p class=errormessage style="text-align: center; color: red;">Not supported file format!</p>';
                        }
                        else if($_GET["error"] == "oops"){
                            echo '<p class=errormessage style="text-align: center; color: red;">Something went wrong, try again!</p>';
                        }
                        else if($_GET["error"] == "size"){
                            echo '<p class=errormessage style="text-align: center; color: red;">File size is too big!</p>';
                        }
                        else if($_GET["error"] == "none"){
                            echo '<p class=errormessage style="text-align: center; padding: 10px; margin-top: 50px; color: green;">Image uploaded successfully, upload another image!</p>';
                        }
                        else if($_GET["error"] == "stmtfailed"){
                            echo '<p class=errormessage style="text-align: center; color: red;">Could not connect to the database</p>';
                        }
                    }
                    ?>
                    </form>
                    <script>
                        function triggerClick(e) {
                        document.querySelector('#jobImage').click();
                        }
                        function displayImage(e) {
                        if (e.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e){
                            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
                            } 
                            reader.readAsDataURL(e.files[0]);
                        }
                    }
                    </script>
                    </div>
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
    include_once 'footer.php';
?>