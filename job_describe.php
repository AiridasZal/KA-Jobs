<?php
    ini_set('display_errors',0);
    session_start();
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';

    function getAllComments($conn, $commentid){
        $s = $_GET['job'];
        $sql = "SELECT * FROM jobs WHERE jobsId=$s";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: jobs.php?error=stmtfailed");
            exit();
        }
        $result = $conn->query($sql) or die($conn->error);
        while($data = $result->fetch_assoc()){
            $userid = $data['usersId'];
        }

        $sql = "SELECT * FROM `comments` AS `c` INNER JOIN `users` AS `u` ON `u`.`usersId` = `c`.`editor_id` WHERE selected_user_id=$userid AND id=$commentid ORDER BY id ASC;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../comments_display.php?error=stmtfailed");
            exit();
        }
    
        mysqli_stmt_execute($stmt);
    
        $comments = mysqli_stmt_get_result($stmt);
    
        return $comments;
    
        mysqli_stmt_close($stmt);
    }
?>
<main class="main">
        <!--=============== HOME ===============-->
            <section class="home section" id="home">
                <div class=" container">
                    <div class="title">
                        <h1 class="job_title">
                            <?php
                            $s = $_GET['job'];
                            $sql = "SELECT * FROM jobs WHERE jobsId=$s";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                header("location: jobs.php?error=stmtfailed");
                                exit();
                            }
                            $result = $conn->query($sql) or die($conn->error);
                            while($data = $result->fetch_assoc()){
                                echo "<h1 style='font-size: 40px;'>{$data['jobsTitle']}</h1>";
                            }
                            ?>
                        </h1>
                    </div>
                        <div class="job_describtion_profile grid_coll_2">
                        <div class="content">
                            <div class="main_decribtion">

                                <div class="photos">
                                <?php $s = $_GET['job'];
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
                                            $sql = "SELECT * FROM gallery WHERE jobsId={$data['jobsId']} AND galleryOrder=1 ";
                                            $result2 = $conn->query($sql) or die($conn->error);
                                            while($data2 = $result2->fetch_assoc()){
                                                echo "<img id='main_img' class='job_img_main' src='uploads/{$data2['imageFullName']}' alt='job img'>";
                                            }
                                        }
                                        mysqli_stmt_close($stmt);?>
                                    
                                    <div class="img_gallery grid_3">
                                        
                                    <?php
                                        $s = $_GET['job'];
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
                                            $sql = "SELECT * FROM gallery WHERE jobsId={$data['jobsId']}";
                                            $result2 = $conn->query($sql) or die($conn->error);
                                            $i = 1;
                                            while($data2 = $result2->fetch_assoc()){
                                                echo "
                                                <button class='img_btn' id='btn".$i."'> <img class='job_img' src='uploads/{$data2['imageFullName']}' alt='job img' ></button>
                                                ";
                                                $i++;
                                            }
                                        }
                                        mysqli_stmt_close($stmt);
                                    ?>
                                    </div>
                                </div>
                                    <div class="job_info">
                                        <h2 class="describtion">Description</h2>
                                        <?php
                                            $s = $_GET['job'];
                                            $sql = "SELECT * FROM jobs WHERE jobsId=$s";
                                            $stmt = mysqli_stmt_init($conn);
                                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                header("location: jobs.php?error=stmtfailed");
                                                exit();
                                            }
                                            $result = $conn->query($sql) or die($conn->error);
                                            while($data = $result->fetch_assoc()){
                                                echo "<p class=job_inform style='font-size: 24px;'>{$data['jobsDesc']}</p>";
                                            }
                                            mysqli_stmt_close($stmt);
                                        ?>
                                    </div>
                                    <div class="contact_us">
                                            <h3 class="contact_us_info">To contact us:</h3>
                                            <div>
                                            <?php
                                                $s = $_GET['job'];
                                                $sql = "SELECT * FROM jobs WHERE jobsId=$s";
                                                $stmt = mysqli_stmt_init($conn);
                                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                    header("location: jobs.php?error=stmtfailed");
                                                    exit();
                                                }
                                                $result = $conn->query($sql) or die($conn->error);
                                                while($data = $result->fetch_assoc()){
                                                    $sql3 = "SELECT * FROM users WHERE usersId={$data['usersId']}";
                                                    $result3 = $conn->query($sql3) or die($conn->error);
                                                    while($data3 = $result3->fetch_assoc()){
                                                        echo "<p><strong>Seller:</strong> {$data3['usersName']}</p>";
                                                    }
                                                    echo "<p><strong>Location:</strong> {$data['jobsLocation']}</p>";
                                                    echo "<p><strong>Starting price:</strong> {$data['jobsPrice']}€</p>";
                                                    echo "<p><strong>Jobs category:<br></strong> {$data['jobsCategory']}</p>";
                                                }
                                                mysqli_stmt_close($stmt);
                                            ?>
                                            <?php
                                                $s = $_GET['job'];
                                                $sql = "SELECT * FROM jobs WHERE jobsId=$s";
                                                $stmt = mysqli_stmt_init($conn);
                                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                    header("location: jobs.php?error=stmtfailed");
                                                    exit();
                                                }
                                                $result = $conn->query($sql) or die($conn->error);
                                                while($data = $result->fetch_assoc()){
                                                    $sql3 = "SELECT * FROM users WHERE usersId={$data['usersId']}";
                                                    $result3 = $conn->query($sql3) or die($conn->error);
                                                    while($data3 = $result3->fetch_assoc()){
                                                        $num_length = strlen((string)$data3['phoneNumber']);
                                                        if($num_length != 9 && $_SESSION["userid"] == $data3['usersId']){
                                                            echo "<a class='phone_numb' href='profile.php'>Add a phone number</a>";
                                                        }
                                                        else if($_SESSION["userid"] != $data3['usersId'] && $num_length != 9){
                                                            echo "<p class='phone_numb' style='cursor: default;'>No phone added</p>";
                                                        }
                                                        else{
                                                            echo "<a class='phone_numb' href='tel:{$data3['phoneNumber']}'>{$data3['phoneNumber']}</a>";
                                                        }
                                                    }
                                                }
                                                mysqli_stmt_close($stmt);
                                            ?>
                                            </div>
                                    </div>
                                    <div class='container_reviews'>
                                    <h3 class="title_reviews" style="font-size: 20px;">
                                    <?php
                                        $s = $_GET['job'];
                                        $sql = "SELECT * FROM jobs WHERE jobsId=$s";
                                        $stmt = mysqli_stmt_init($conn);
                                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                                            header("location: jobs.php?error=stmtfailed");
                                            exit();
                                        }
                                        $result = $conn->query($sql) or die($conn->error);
                                        while($data = $result->fetch_assoc()){
                                            $userid = $data['usersId'];
                                        }

                                        $sql = "SELECT * FROM comments WHERE selected_user_id = $userid;";
                                        $result = $conn->query($sql);
                                        if ($result = mysqli_query($conn, $sql)) {
                                            // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows( $result );
                                        }
                                        if($rowcount == 0){
                                            echo "There are no reviews about this user, be the first to give one!";
                                        }
                                        else{
                                            echo $rowcount ." reviews";
                                        }
                                    ?>
                                    </h3>
                                    <?php
                                        $s = $_GET['job'];
                                        $sql = "SELECT * FROM jobs WHERE jobsId=$s";
                                        $stmt = mysqli_stmt_init($conn);
                                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                                            header("location: jobs.php?error=stmtfailed");
                                            exit();
                                        }
                                        $result = $conn->query($sql) or die($conn->error);
                                        while($data = $result->fetch_assoc()){
                                            $userid = $data['usersId'];
                                        }

                                        $sql = "SELECT * FROM comments WHERE selected_user_id = $userid;";
                                        $result = $conn->query($sql);
                                        if ($result = mysqli_query($conn, $sql)) {
                                            // Return the number of rows in result set
                                            $rowcount = mysqli_num_rows( $result );
                                        }
                                        //echo $rowcount;
                                        $sql = "SELECT * FROM comments WHERE selected_user_id = ? ORDER BY id DESC;";
                                        $stmt = mysqli_stmt_init($conn);
                                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                                            header("location: ../add-images.php?error=stmtfailed");
                                            exit();
                                        }
                                        
                                        mysqli_stmt_bind_param($stmt, "i", $userid);
                                        mysqli_stmt_execute($stmt);
                                        $resultData = mysqli_stmt_get_result($stmt);

                                        for($i = 0; $i < $rowcount; $i++){
                                            echo "
                                            <div class='reviews'>
                                                <img class='user_img' src='img/profile.png' alt=''>
                                                <div class='account_review'>
                                                    <p><strong>";
                                                    if ($row = mysqli_fetch_assoc($resultData)) {
                                                        $commentid = $row["id"];
                                                    }
                                                    $comments = getAllComments($conn, $commentid);
                                                    foreach($comments as $comment){
                                                        echo $comment['usersUid'];
                                                    }
                                                    echo "
                                                    </strong></p>
                                                    <p class='yelow'><ion-icon class='yelow' name='star'></ion-icon>
                                                    ";
                                                    foreach($comments as $comment){
                                                        echo $comment['rating'];
                                                    }
                                                    echo "
                                                    </p>
                                                    <p>";
                                                    foreach($comments as $comment){
                                                        echo $comment['comment'];
                                                    }
                                                        echo "
                                                    </p>
                                                </div>
                                            </div>
                                            ";
                                        }
                                    ?>
                                    
                                        <div class="review_btn">
                                            <a  href="#" class="view_reviews">View all reviews</a>
                                            <?php
                                                    if($_SESSION["userid"] == $userid){
                                                        echo "<p class='button Submit_review' style='cursor: default;'> Can not review yourself</p>";
                                                    }
                                                    else{
                                                        echo "<a class='button Submit_review' href='comments.php?job=".$s."'> Submit review</a>";
                                                    }
                                            ?>
                                            
                                        </div>
                                    </div>
                            </div>
                        </div>
                            <div class="contacts">
                                <div class="contacts_info">
                                            <?php
                                                $s = $_GET['job'];
                                                $sql = "SELECT * FROM jobs WHERE jobsId=$s";
                                                $stmt = mysqli_stmt_init($conn);
                                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                                    header("location: jobs.php?error=stmtfailed");
                                                    exit();
                                                }
                                                $result = $conn->query($sql) or die($conn->error);
                                                while($data = $result->fetch_assoc()){
                                                    $sql3 = "SELECT * FROM users WHERE usersId={$data['usersId']}";
                                                    $result3 = $conn->query($sql3) or die($conn->error);
                                                    while($data3 = $result3->fetch_assoc()){
                                                        echo "<p><strong>Seller:</strong> {$data3['usersName']}</p>";
                                                    }
                                                    echo "<p><strong>Location:</strong> {$data['jobsLocation']}</p>";
                                                    echo "<p><strong>Starting price:</strong> {$data['jobsPrice']}€</p>";
                                                    echo "<p><strong>Jobs category:<br></strong> {$data['jobsCategory']}</p>";
                                                }
                                                mysqli_stmt_close($stmt);
                                            ?>
                                <?php
                                    $s = $_GET['job'];
                                    $sql = "SELECT * FROM jobs WHERE jobsId=$s";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        header("location: jobs.php?error=stmtfailed");
                                        exit();
                                    }
                                    $result = $conn->query($sql) or die($conn->error);
                                    while($data = $result->fetch_assoc()){
                                        $sql3 = "SELECT * FROM users WHERE usersId={$data['usersId']}";
                                        $result3 = $conn->query($sql3) or die($conn->error);
                                        while($data3 = $result3->fetch_assoc()){
                                            $num_length = strlen((string)$data3['phoneNumber']);
                                            if($num_length != 9 && $_SESSION["userid"] == $data3['usersId']){
                                                echo "<a class='phone_numb' href='profile.php'>Add a phone number</a>";
                                            }
                                            else if($_SESSION["userid"] != $data3['usersId'] && $num_length != 9){
                                                echo "<p class='phone_numb' style='cursor: default;'>No phone added</p>";
                                            }
                                            else{
                                                echo "<a class='phone_numb' href='tel:{$data3['phoneNumber']}'>{$data3['phoneNumber']}</a>";
                                            }
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        </div>

                </div>

            </section>
           
</main>
<script>
    let img = document.querySelector("#main_img");
    let btn1 = document.querySelector("#btn1");
    let btn2 = document.querySelector("#btn2");
    let btn3 = document.querySelector("#btn3");

    btn1.addEventListener("click", () => {
    img.src = "uploads/<?php $s = $_GET['job'];
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
                                            $sql = "SELECT * FROM gallery WHERE jobsId={$data['jobsId']} AND galleryOrder=1 ";
                                            $result2 = $conn->query($sql) or die($conn->error);
                                            while($data2 = $result2->fetch_assoc()){
                                                echo $data2['imageFullName'];
                                            }
                                        }
                                        mysqli_stmt_close($stmt);?>";
    });

    btn2.addEventListener("click", () => {
    img.src = "uploads/<?php $s = $_GET['job'];
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
                                            $sql = "SELECT * FROM gallery WHERE jobsId={$data['jobsId']} AND galleryOrder=2 ";
                                            $result2 = $conn->query($sql) or die($conn->error);
                                            while($data2 = $result2->fetch_assoc()){
                                                echo $data2['imageFullName'];
                                            }
                                        }
                                        mysqli_stmt_close($stmt);?>";
    });

    btn3.addEventListener("click", () => {
    img.src = "uploads/<?php $s = $_GET['job'];
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
                                            $sql = "SELECT * FROM gallery WHERE jobsId={$data['jobsId']} AND galleryOrder=3 ";
                                            $result2 = $conn->query($sql) or die($conn->error);
                                            while($data2 = $result2->fetch_assoc()){
                                                echo $data2['imageFullName'];
                                            }
                                        }
                                        mysqli_stmt_close($stmt);?>";
    });
</script>

<?php
    include_once 'footer.php';
?>

