<?php
    include_once 'header.php';

    require_once 'includes/dbh.inc.php';

    function getAllComments($conn){
        $sql = "SELECT * FROM `comments` AS `c` INNER JOIN `users` AS `u` ON `u`.`usersId` = `c`.`editor_id` ORDER BY id ASC;";
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

<style>
    .selected{
        color:gold;
    }

    .star{
        border: none;
        padding: 15px 32px;
        text-align: center;
        display: inline-block;
    }
</style>


<div class="main" style="margin-left: 35%; height: 660px; width: 500px;">
    <section class="contact section container" id="contact">
        <div class="contact__container">
            <div class="contact__content">
                <h2 class="section__title-center" >Comments</h2>
                <div class="wrapper" >
                    <div class="rating">
                    <?php
                            $comments = getAllComments($conn);
                            
                            foreach($comments as $comment){
                                $user = $comment['selected_user_id'];
                            }

                            $sql = "SELECT * FROM users WHERE usersId=$user";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                header("location: ../comments.php?error=stmtfailed");
                                exit();
                            }
                        
                            mysqli_stmt_execute($stmt);
                        
                            $userId = mysqli_stmt_get_result($stmt);
                        
                            mysqli_stmt_close($stmt);
                        
                            foreach($userId as $user){
                                $selecUser = $user['usersUid'];
                            }
                            
                            foreach($comments as $comment){
                                echo $comment['usersUid'] . '   įvertino <strong>' . $selecUser  .'</strong> '. $comment['rating'] . ' žvaigždutėmis.' . "<br>" .  ' Komentaras:  ' . $comment['comment'];
                                echo "<br>";
                                echo "<br>";
                                echo "<br>";
                            }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>   



<?php
    include_once 'footer.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $('.star').on('click', function(){
        $('.star').addClass('selected');
        var count = $(this).attr('name'); 

        for (var i=5; count < i + 1; i--){       
            $('.star').eq(i).removeClass('selected');
        }

        document.getElementById("star_rating").value = count;
    });
</script>


