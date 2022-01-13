<?php
    ini_set('display_errors',0);
    session_start();
    if (!isset($_SESSION["useruid"])) {
        header("location: login.php");
    }
    include_once 'header.php';
?>
<main class="main">
        <!--=============== HOME ===============-->
            <section class="home section" id="home">
                <div class=" container">
                    <div class="title">
                        <h1 class="job_title">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </h1>
                    </div>
                        <div class="job_describtion_profile grid_coll_2">
                        <div class="content">
                            <div class="main_decribtion">

                                <div class="photos">
                                    <img id="main_img" class="job_img_main" src="uploads/61bb06aa01e498.88125614.jpg" alt="job img">

                                    
                                    <div class="img_gallery grid_3">
                                        
                                        <button class="img_btn" id="btn1"> <img class="job_img" src="uploads/61bb030a175d90.85068967.jpg" alt="job img" ></button>
                                        <button class="img_btn" id="btn2"><img class="job_img" src="uploads/61bb06aa01e498.88125614.jpg" alt="job img" ></button> 
                                        <button class="img_btn" id="btn3"> <img class="job_img" src="uploads/61bb06562fa539.22708589.jpg" alt="job img" ></button>
                                        
                                    </div>
                                </div>
                                    <div class="job_info">
                                        <h2 class="describtion">Describtion</h2>
                                        <p class="job_inform">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel, repudiandae at iusto beatae id laudantium ratione vitae libero! Eveniet laboriosam officia esse sunt nobis exercitationem, maxime quod minima cum ipsum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste dignissimos itaque hic iusto est? Voluptatem, sit reprehenderit? Nihil magni repellendus incidunt quos aperiam commodi nesciunt quibusdam nulla, asperiores deserunt necessitatibus!locale_filter_matches Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quod at dolorem quia voluptatum nulla assumenda veritatis fuga, aspernatur veniam, ullam eum modi corrupti velit nostrum accusamus dignissimos illum quibusdam!</p>
                                    </div>
                                    <div class="contact_us">
                                            <h3 class="contact_us_info">To contact us:</h3>
                                            <div>
                                            <p><strong>Seller:</strong> Vardas P.</p>
                                    <p><strong>Location:</strong> Klaipėda</p>
                                    <p><strong>Starting price:</strong> 15$</p>
                                <p><strong>Delivery time:</strong> 1 day</p>
                                <a class="phone_numb" href="tel:+37060000000" >+370 600 00000</a>
                                            </div>
                                    </div>
                                    <div class="container_reviews">
                                        `   <h3 class="title_reviews">52 reviews</h3>
                                        <div class="reviews">
                                            <img class="user_img" src="img/profile.png" alt="">
                                            <div class="account_review">
                                                <p><strong>Username</strong></p>
                                                <p class="yelow"><ion-icon class="yelow" name='star'></ion-icon> 5.0 </p>
                                                <p>
                                                    Very nice review!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="reviews">
                                            <img  class="user_img" src="img/profile.png" alt="">
                                            <div class="account_review">
                                                <p><strong>Username</strong></p>
                                                <p class="yelow"><ion-icon class="yelow" name='star'></ion-icon> 4.0 </p>
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid animi maiores quidem enim ea magni et nihil ratione!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="reviews">
                                            <img  src="img/profile.png" alt="" class="user_img">
                                            <div class="account_review">
                                                <p><strong>Username</strong></p>
                                                <p class="yelow"><ion-icon class="yelow" name='star'></ion-icon> 4.5 </p>
                                                <p>
                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                                </p>
                                            </div>
                                        </div>

                                        <div class="review_btn">
                                            <a  href="#" class="view_reviews">View all reviews</a>
                                            <a href='#' class="button Submit_review">Submit review</a>
                                        </div>
                                        

                                    </div>
                            </div>
                        </div>
                            <div class="contacts">
                                <div class="contacts_info">
                                    
                                    <p><strong>Seller:</strong> Vardas P.</p>
                                    <p><strong>Location:</strong> Klaipėda</p>
                                    <p><strong>Starting price:</strong> 15$</p>
                                <p><strong>Delivery time:</strong> 1 day</p>
                                <a class="phone_numb" href="tel:+37060000000" >+370 600 00000</a>
                            </div>
                        </div>
                        </div>

                </div>

            </section>
           
</main>
<script src="js/src_change.js"></script>

<?php
    include_once 'footer.php';
?>

