<?php
    session_start();
    ini_set('display_errors',0);
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
?>


<!-- Job section -->
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
        if(empty($_GET['job'])){
            echo "<main class='main'>";
            echo "<section class='home section' id='home'>
            <div class='container grid_coll_3 container_job'>";
            while($data = $result->fetch_assoc()){

                $sql2 = "SELECT * FROM gallery WHERE jobsId={$data['jobsId']} AND galleryOrder=1";
                $result2 = $conn->query($sql2) or die($conn->error);
                echo "<div class='job'>
                <a class='job_describtion' href='?job={$data['jobsId']}' target=_blank>
                <div class='job_information'>
                    <div class='photo'>";

                    while($data2 = $result2->fetch_assoc()){
                            echo "<img class='job_img' src='uploads/{$data2['imageFullName']}' alt=''>";
                        }
                        
                        echo "</div>
                        <div class='border_description'>    

                            <div class='description'>
                                <div class='title_container'>
                                    <h3 class='title'>{$data['jobsTitle']}</h3>
                                    <div class='information'>

                                        <p class='price'>From <strong>{$data['jobsPrice']}€</strong></p>

                                        <p class='city'>{$data['jobsLocation']}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class='profile'>";
                            $sql3 = "SELECT * FROM users WHERE usersId={$data['usersId']}";
                            $result3 = $conn->query($sql3) or die($conn->error);
                                while($data3 = $result3->fetch_assoc()){
                                        echo "<p class='name'>{$data3['usersUid']}</p>";
                                    }
                                echo "
                                <div class='rating_container'>
                                    <p class='rating'><ion-icon class='star' name='star'></ion-icon> <strong>5.0 </strong></p>
                                    <p class='rating_number'>(459)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>             
            </div>";
            }
            mysqli_stmt_close($stmt);
        }
        else{
            $s = $_GET['job'];
            echo "<main class='main'>
                <section class='home section' id='home'>
                    <div style='margin-left: px; text-align: center;'>";
                            $sql = "SELECT * FROM jobs WHERE jobsId=$s";
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
                            }
                            mysqli_stmt_close($stmt);
        }
                        ?>
                    </div>
                </section>
            </main>
<?php
    include_once 'footer.php';
?>