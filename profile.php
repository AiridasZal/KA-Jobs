<?php
    include_once 'header.signup.php';
?>
<main class="main">
        <!--=============== HOME ===============-->
            <section class="home section" id="home">
                <div class="home__container container grid">
                    <div class="home__data">
                    <?php
                        if (isset($_SESSION["useruid"])) {
                            echo 
                            "<h1 style='text-align: center'>
                                You are logged in as ". $_SESSION["useruid"] ."
                            </h1>";
                        }
?>
                    </div>
                </div>
            </section>
</main>

<?php
    include_once 'footer.signup.php';
?>

