<?php
    include_once 'header.php';
?>
    <div class="welcome">
    <?php
        if (isset($_SESSION["useruid"])) {
            echo "<p>Hello there " . $_SESSION["useruid"] . "</p>";
        }
    ?>
        <h1>This Is An Introduction</h1>
        <p>Here is an important paragraph!</p>
    </div>
<?php
    include_once 'footer.php';
?>