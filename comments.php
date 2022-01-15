<?php
    ini_set('display_errors',0);
    session_start();
    if (!isset($_SESSION["useruid"])) {
        header("location: login.php");
    }
    include_once 'header.php';
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
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
    <form action="includes/comment.inc.php" method="post">
        <section class="contact section container" id="contact">
            <div class="contact__container">
                <div class="contact__content">
                    <h2 class="section__title-center" >Star Rating</h2>
                    <div class="wrapper" style="margin-left: 15%;">
                        <div class="rating">
                            <span class="star selected" name="1">&#9733;</span> 
                            <span class="star" name="2">&#9733;</span> 
                            <span class="star" name="3">&#9733;</span> 
                            <span class="star" name="4">&#9733;</span> 
                            <span class="star" name="5">&#9733;</span> 
                        </div>
                    </div>
                    <br>
                    <br>
                    <textarea id="comment" name="comment" rows="8" cols="70" placeholder="Please leave the comment"></textarea>
                    <br>
                    <br>

                    <input type="hidden" id="star_rating" name="star_rating" value="1"/>
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION["userid"]?>"/>
                    <input type="hidden" id="user_id" name="job_id" value="<?php echo $_GET["job"]?>"/>
                </div>
            </div>
        </section>
        <input type="submit" class="button" name="submit" value="Save"></input>
    </form>  
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


