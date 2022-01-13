<?php
    session_start();
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Employ a variety of specialists to complete various tasks or create your own job oppurtunities.">
        <!--=============== BOXICONS ===============-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!--=============== REMIX ICONS ===============-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/add-job.css">
        <link rel="stylesheet" href="css/jobs.css">
        <title>Jobly</title>
    </head>
    <body>
        <!--=============== HEADER ===============-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="index.php" class="nav__logo">Jobly</a>

                <div class="nav__menu" id="nav-menu">
                        <ul class="nav__list">
                            <li class="nav__item">
                                <a href="index.php#home" class="nav__link">Home</a>
                            </li>
                            <li class="nav__item">
                                <a href="index.php#about" class="nav__link">About us</a>
                            </li>
                            <li class="nav__item">
                                <a href="index.php#locations" class="nav__link">Locations</a>
                            </li>
                            <li class="nav__item">
                                <a href="jobs.php" class="nav__link">Jobs</i></a>
                            </li>
                            <li class="nav__item">
                                <a href="index.php#contact" class="nav__link">Contact us</a>
                            </li>
                            <?php
                            if (isset($_SESSION["useruid"])) {
                                echo 
                                    "<li class='nav__item'>
                                        <a href='profile.php' class='nav__link'>Profile page</a>
                                    </li>";
                                echo
                                    "<li class='nav__item'>
                                    <a href='includes/logout.inc.php' class='nav__link-fix button__menu'>Log out</a>
                                    </li>";
                            }
                            else{
                                echo
                                    "<li class='nav__item'>
                                        <a href='login.php' class='nav__link-fix button__menu'>Sign In</a>
                                    </li>";
                            }
                            ?>
                        </ul>
                        <div class="nav__close" id="nav-close">
                            <i class="ri-close-line"></i>
                        </div>
                    </div>
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
                <?php
                    if (isset($_SESSION["useruid"])) {
                        echo "<a href='includes/logout.inc.php' class='button button__header'>Log out</a>";
                    }
                    else{
                        echo "<a href='login.php' class='button button__header'>Sign In</a>";
                    }
                ?>
            </nav>
        </header>