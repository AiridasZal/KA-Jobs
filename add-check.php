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
                <form action="includes/add-check.inc.php" method="post" enctype="multipart/form-data" class="form" style="height:800px; width: 700px;">
                    <h1 class="form__title2" style="text-align: center;">Finishing the listing</h1>
                    <p class="form__description"style="text-align: center;">Last checkup</p>
                    <div>
                        <img src="img/add-image.png" class="img-placeholder" Style="margin-left: 66px; margin-bottom: 10px; width:170px; height:170px;" alt="testing">
                        <img src="img/add-image.png" class="img-placeholder" Style="margin-bottom: 10px; width:170px; height:170px;" alt="testing">
                        <img src="img/add-image.png" class="img-placeholder" Style="margin-bottom: 10px; width:170px; height:170px;" alt="testing">
                    </div>
                    <div class="form__div">
                            <p class="form__input">Testing the text thing</p>
                            <label for="" class="form__label">Title</label>
                        </div>
                    <div class="input__grid">
                        <div class="input__div">
                        <p class="form__input">Testing the text thing</p>
                            <label for="" class="form__label">Location</label>
                        </div>

                        <div class="input__div2">
                        <p class="form__input">Testing the text thing</p>
                            <label for="" class="form__label">Price (€)</label>
                        </div>

                        <div class="input__div" style="margin-top: 73px;">
                            <p class="form__input">Testing the text thing</p>
                            <label for="" class="form__label">Category</label>
                        </div>

                        <div class="input__div2" style="margin-top: 73px;">
                            <p class="form__input">Testing the text thing</p>
                            <label for="" class="form__label">SubCategory</label>
                        </div>
                    </div>

                    <div class="form__div">
                        <textarea name="desc" class="form__input" style="resize: none; border-radius: 4px; height: 150px;">TESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTINGTESTING</textarea>
                        <label for="" class="form__label">Description</label>
                    </div>
                    <input type="submit" class="button" style="margin-top: 100px; width: 100px; float: right;" name="submit" value="Finish">
                    <input type="button" class="button" style="margin-top: 100px; width: 100px; float: left;" name="cancel" value="Back" id="atsaukti">
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