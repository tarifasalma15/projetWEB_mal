<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-danger fixed-top" style="padding-left: unset;">
	<div class="container">
		<a class="navbar-brand" href="index.php"><img class="logo" src="media/logo-min-r.jpg" alt="logo"></a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
			data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="carte.php">Order</a>
				</li>
				<!--
				<li class="nav-item">
					<a class="nav-link" href="carte.php">Our pizzas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Basket</a>
				</li>
				-->
				<?php if (isset($_SESSION["user_login"]) && $_SESSION["user_role"] == "user") { ?>
				<li class="nav-item">
					<a class="nav-link" href="commandes.php">My account</a>
				</li>
				<?php } else if (isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "admin") { ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						Gestion
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
						<a class="dropdown-item" href="admin_recette.php">Recipes</a>
						<a class="dropdown-item" href="admin_supplement.php">Supplements</a>
						<a class="dropdown-item" href="admin_commande.php">Orders received</a>
					</div>
				</li>
				<?php } else { ?>
				<li class="nav-item">
					<a class="nav-link" href="login.php">Log in</a>
				</li>
				<?php } ?>
				<?php if (isset($_SESSION["user_login"])) { ?>
				<li class="nav-item">
					<a class="nav-link" href="modules/logout.php">Log out</a>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>