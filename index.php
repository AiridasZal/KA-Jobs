<?php
    include_once 'header.php';
?>
        <main class="main">
        <!--=============== HOME ===============-->
            <section class="home section" id="home">
                <div class="home__container container grid">
                    <img src="img/Connect.svg" alt="connect-people" class="svg__img home__img">
                    <div class="home__data">
                        <h1 class="home__title">Connect with<br>specialists!</h1>
                        <p class="home__description">Employ a variety of specialists to complete various household tasks!</p>
                        
                        <a href="jobs.html" class="button button_home_fix"><img src="img/searchjob.png" class="img__size button_img" alt="Find Worker"> Find Worker</a>
                        <a href="add-job.html" class="button button_home_fix"><img src="img/addjob.png" class="img__size button_img" alt="Find job"> Create listing</a>
                    </div>
                </div>
            </section>
        <!--=============== ABOUT ===============-->
            <section class="about section container" id="about">
                <div class="about__container grid">
                    <div class="about__data">
                        <h2 class="section__title-center">Learn more about <br>Jobly!</h2>
                        <p class="about__description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec at augue eleifend, porttitor arcu e lementum, hendrerit augue. 
                        </p>
                    </div>
                    <img src="img/Tasks.svg" alt="About-Jobly" class="svg__img about__img">
                </div>
            </section>

        <!--=============== Locations ===============-->
        <section class="locations section container" id="locations">
            <div class="locations__container grid">
                <div class="section__title-center">
                    <h2>Explore cities where Jobly operates!</h2>
                </div>
                <div class="flex-container">
                    <div class="locations__data flex-child-1">
                        <p class="active-link">Lithuania</p>
                    </div>
                    <div class="locations__cities-list flex-child-2">
                        <a href="#" class="locations__btn">Vilnius</a>
                        <a href="#" class="locations__btn">Kaunas</a>
                        <a href="#" class="locations__btn">Klaipėda</a>
                        <a href="#" class="locations__btn">Šiauliai</a>
                        <a href="#" class="locations__btn">Panevėžys</a>
                    </div>
                </div>
            </div>
        </section>
        <!--=============== CONTACT US ===============-->
        <section class="contact section container" id="contact">
            <div class="contact__container grid">
                <div class="contact__content">
                    <h2 class="section__title-center">Contact Us Here</h2>
                    <p class="contact__description">You can contact us here, you can email us or call us,
                        we will gladly assist you.</p>
                </div>
                
                <ul class="contact__content grid">
                    <li class="contact__address">Telephone: <span class="contact__information">+37000000000</span></li>
                    <li class="contact__address">Email:  <span class="contact__information">temp@gmail.com</span></li>
                    <li class="contact__address">Location: <span class="contact__information">VU MIF - Lithuania</span></li>
                </ul>
            </div>
        </section>
        </main>
<?php
    include_once 'footer.php';
?>