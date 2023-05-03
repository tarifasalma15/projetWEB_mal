<?php
	$page_title="Mario Pizza";
  	require_once "includes/header.php"; ?>
  	<!-- Navigation -->
  	<?php require_once "includes/navbar.php";?>
  	<header>
  		<div id="carouselIndicators" class="carousel slide" data-ride="carousel">
  			<ol class="carousel-indicators">
  				<li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
  				<li data-target="#carouselIndicators" data-slide-to="1"></li>
  				<li data-target="#carouselIndicators" data-slide-to="2"></li>
  			</ol>
  			<div class="carousel-inner" role="listbox">
  				<!-- Slide One -->
  				<div class="carousel-item active" style="background-image: url('media/food_menu.jpg')">
  				</div>
  				<!-- Slide Two -->
  				<div class="carousel-item" style="background-image: url('media/pizza3.jpg')">
  					<div class="carousel-caption d-md-block">
  						<h3
  							style="border-top: 2px; border-bottom: 2px; border-radius: 20px; display: inline-block;color: black;background-color: whitesmoke; padding: 5px;">
  							1 pizza purchased = the 2nd free!</h3>
  					</div>
  				</div>
  				<!-- Slide Three -->
  				<div class="carousel-item" style="background-image: url('media/pizza2.jpg')"></div>
  			</div>
  			<div class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
  				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
  				<span class="sr-only">Previous</span>
			</div>
  			<div class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
  				<span class="carousel-control-next-icon" aria-hidden="true"></span>
  				<span class="sr-only">Next</span>
			</div>
  		</div>
  	</header>

  	<!-- Page Content -->
  	<div class="caroussel-title2">
		<h1 class="perso" <?php if(!isset($_SESSION['user_login'])) echo "style='padding:1%;'" ?>>Mario Pizza</h1>
		<?php if(isset($_SESSION["user_login"]) && ($_SESSION["user_role"] == "user")){
			echo ("Hello " . $_SESSION["user_name"] . " !");
		} else if (isset($_SESSION["user_login"]) && ($_SESSION["user_role"] == "admin")){
			echo "Hello chef !";
		}?>
  	</div>
  	<br />
  	<div class="container">
		<h1 class="my-4 h1_perso" style="font-size: 2.5rem;">Welcome to Mario Pizza</h1>
		<!-- Marketing Icons Section -->
		<h3 class="mt-5">Discover the irresistible of the moment!</h3>
		<div class="row">
			<?php 
			require_once "db_config.php";
			$select_sql = $bdd->query('SELECT nom FROM recettes LIMIT 3');
			while ($donnees = $select_sql->fetch()) { ?>
			<div class="col-lg-4 mb-4">
				<div class="card h-100">
					<h4 class="card-header text-center"><?php echo $donnees["nom"]?></h4>
					<div class="card-body">
						<p class="card-text text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
					</div>
					<div class="card-footer">
						<a href="carte.php" class="btn btn-primary float-right">Discover</a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<!-- /.row -->

		<!-- Mobile App Section -->
		<div class="row mt-5">
			<div class="col-lg-6">
				<h2 class="mt-3">Download our app</h2>
				<p>Discover the new mobile application to access the best discount offers. Mario Pizza Connect is:</p>
				<ul>
					<li><strong>Pizza when you want, where you want!</strong></li>
					<li>Click & Collect withdrawal</li>
					<li>Regular discount offers</li>
					<li>And many loyalty benefits!</li>
				</ul>
				<p>Do not wait any longer to download your new application.</p>
				<p class="mt-4" style="text-align: left;"><span><a href="#"><img src="media/app_store_badge.svg" alt="App Store" width="153" height="54"></a>&nbsp;<a href="#"><img src="media/google-play-badge.png" alt="Play Store" width="182" height="71"></a></span></p>
			</div>
			<div class="col-lg-6">
				<img class="img-fluid rounded" src="media/mobile_app.jpg" alt="Application mobile">
			</div>
    	</div>
    	<!-- /.row -->
    	<hr>
    	<!-- Call to Action Section -->
		<div class="row mb-4">
			<div class="col-md-8">
				<p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti
				beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
			</div>
			<div class="col-md-4 mt-1">
			<a class="btn btn-lg btn-secondary btn-block" href="#">Learn more</a>
			</div>
		</div>

  	</div>
  	<!-- /.container -->

  	<!-- Footer -->
  	<?php require_once("includes/footer.php"); ?>

<?php 
/*
 * Start Bootstrap - Modern Business (https://startbootstrap.com/template-overviews/modern-business)
 * Copyright 2013-2019 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-logomodern-business-nav/blob/master/LICENSE)
*/
?>