<?php
    session_start();
    ini_set('display_errors',0);
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
?>
    <style>
        img{
            width: 200px;
            height: 200px;
        }
    </style>
        <main class="main">
        <!--=============== HOME ===============-->
            <section class="home section" id="home">
                <div style="margin-left: px; text-align: center;">
                    <?php
                        $sql = "SELECT * FROM jobs";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("location: jobs.php?error=stmtfailed");
                            exit();
                        }
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("location: jobs.php?error=stmtfailed");
                            exit();
                        }
                        $result = $conn->query($sql) or die($conn->error);
                        while($data = $result->fetch_assoc()){
                            echo "<h2>{$data['jobsTitle']}</h2>";
                            echo "<h2>{$data['jobsLocation']}</h2>";
                            echo "<h2>{$data['jobsPrice']}</h2>";
                            echo "<h2>{$data['jobsCategory']}</h2>";
                            echo "<h2>{$data['jobsSubCategory']}</h2>";
                            echo "<h1>{$data['jobsDesc']}</h1>";
                            $sql = "SELECT * FROM gallery WHERE jobsId={$data['jobsId']}";
                            $result2 = $conn->query($sql) or die($conn->error);
                            while($data2 = $result2->fetch_assoc()){
                                echo "<img src=uploads/{$data2['imageFullName']} >";
                            }
                            echo "<hr>";
                        }
                        mysqli_stmt_close($stmt);
                    ?>
                </div>
            </section>
        </main>
<?php
    include_once 'footer.php';
?>