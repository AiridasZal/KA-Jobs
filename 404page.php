<?php
	include_once 'header.php';
?>

<style>
	#notfoundimg{
		width: auto;
		height: auto;
	}
	@media (max-width: 2000px){
		#notfoundimg{
			width: 700px;
			height: auto;
		}
	}
	@media (max-width: 400px){
		.home__title{
			font-size: 24px;	
		}
		h2{
			font-size: 16px;	
		}
	}
</style>

	<main class="main">
        <!--=============== HOME ===============-->
		
         <section class="home section" id="home">
                 <div style="margin-left: px; text-align: center;">
					 <video autoplay muted play id="notfoundimg">
        					<source src="img/Error404.mp4">
							Sorry, your browser doesn't support embedded videos.
        				</video>
                    <h1 class="home__title">Oops.</h1>
					<h2>We can't find the page you're looking for...</h2>
					<br>
					<a href='index.php' class='button'>Home</a>
                </div>
        </section>
    </main>

<?php
	include_once 'footer.php';
?>