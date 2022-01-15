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
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="css/findjob.css">

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

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
                <a class='job_describtion' href='job_describe.php?job={$data['jobsId']}' target=_blank>
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
                                    <p class='rating'><ion-icon class='star' name='star-outline'></ion-icon>
                                        <strong>";
                                            $sql4 = "SELECT * FROM comments WHERE selected_user_id={$data['usersId']}";
                                            $result4 = $conn->query($sql4) or die($conn->error);
                                            $sum = 0;

                                            $sql5 = "SELECT * FROM comments WHERE selected_user_id={$data['usersId']};";
                                            $result5 = $conn->query($sql5);
                                            if ($result5 = mysqli_query($conn, $sql5)) {
                                                // Return the number of rows in result set
                                                $rowcount = mysqli_num_rows( $result5);
                                            }

                                            while($data4 = $result4->fetch_assoc()){
                                                    $sum += $data4['rating'];
                                                }
                                                $average = $sum / $rowcount;
                                                echo number_format($average, 1);
                                        echo "</strong>
                                    </p>
                                    <p class='rating_number'>";
                                    echo "(".$rowcount.")";

                                    echo "</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>             
            </div>";
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