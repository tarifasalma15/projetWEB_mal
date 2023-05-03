<?php
  $page_title="Nos pizzas";
  require_once "includes/header.php";
  require_once "includes/navbar.php";
?>

<style>

</style>


<!-- Page Content -->
<div class="container">

	<!-- Page Heading/Breadcrumbs -->
	<h1 class="mt-5 mb-3">Order
		<small>Our pizzas</small>
	</h1>

	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php">Mario Pizza</a>
		</li>
		<li class="breadcrumb-item active">Our pizzas</li>
	</ol>
	<div class="row">
		<?php require_once ("db_config.php");
      // On récupère tout le contenu de la table recettes
      $select_sql = $bdd->query('SELECT rid, nom, cast(prix as decimal(10,2)) as prix FROM recettes');

      // On affiche chaque entrée une à une
      while ($donnees = $select_sql->fetch()) { ?>
		<div class="col-lg-4 col-sm-6 portfolio-item">
			<div class="card h-100">
				<img class="card-img-top" src="media/logo-min-r.jpg" alt="Image du produit">
				<div class="card-body">
					<h4 class="card-title text-center">
						<a href="#" style="pointer-events: none;"><?php echo $donnees['nom']; ?></a>
					</h4>
					<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit! </p>
					<p class="card-price text-center"
						style="border-top: 2px; border-bottom: 2px; border-radius: 20px; border: solid; border-width: 1px; background-color: whitesmoke;">
						Prix : <span class="card-ammount"><?php echo $donnees['prix']; ?> €</span> </p>
				</div>
				<div class="card-footer">
					<form action="modules/order.php" method="post">
						<input type="hidden" name="rid_order" id="rid_order" value="<?php echo $donnees["rid"]; ?>">
						<input type="button" class="btn btn-light float-left btn-perso" data-toggle="modal"
							data-target="#extraModal" data-rid="<?php echo $donnees["rid"]; ?>" value="Suppléments"
							style="border: solid; border-width: 1px;">
						<input type="submit" name="btn_order"
							class="btn btn-danger float-right btn_order" <?php if (isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "admin") echo "disabled" ?> value="Commander">
					</form>
				</div>
			</div>
		</div>
		<?php
      }
      $select_sql->closeCursor(); // Termine le traitement de la requête ?>
	</div>

	<!-- Pagination 
	<ul class="pagination justify-content-center">
		<li class="page-item">
			<a class="page-link" href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
				<span class="sr-only">Previous</span>
			</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="#">1</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="#">2</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="#">3</a>
		</li>
		<li class="page-item">
			<a class="page-link" href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
				<span class="sr-only">Next</span>
			</a>
		</li>
	</ul> -->

</div>
<!-- /.container -->

<!-- Extra Modal HTML -->
<div id="extraModal" class="modal fade" tabindex='-1'>
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form action="modules/order.php" method="post">
				<div class="modal-header">
					<h4 class="modal-title"><strong> Add un supplement</strong></h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body" style="margin: -7%; margin-bottom:2%; margin-top:-5%;">
					<table class="table table-bordered table-sm m-0" style="border-color:white;">
						<thead class="">
							<tr class="text-primary">
								<th></th>
								<th>Name</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$select_supp = $bdd->query('SELECT nom, sid, cast(prix as decimal(10,2)) as prix FROM supplements ORDER BY nom');
							while ($donnees_supp = $select_supp->fetch()) { ?>
							<tr>
								<td>
									<div class="custom-control custom-checkbox text-center">
										<input type="checkbox" class="custom-control-input" name="check_list[]"
											id="customCheck<?php echo $donnees_supp['sid']; ?>"
											value="<?php echo $donnees_supp['sid']; ?>">
										<label class="custom-control-label"
											for="customCheck<?php echo $donnees_supp['sid']; ?>"></label>
									</div>
								</td>
								<td><?php echo $donnees_supp['nom']; ?></td>
								<td><?php echo $donnees_supp['prix']; ?> €</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
					<input type="hidden" name="productIdFromModal" id="productIdFromModal">
					<input type="submit" name="btn_order" class="btn btn-danger btn_order" <?php if (isset($_SESSION["user_role"]) && $_SESSION["user_role"] == "admin") echo "disabled" ?> value="Commander">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Confirmation Modal HTML -->
<div id="confirmationModal" class="modal fade" tabindex='-1'>
	<div class="modal-dialog modal-confirm modal-dialog-centeredddd" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>
				<h4 class="modal-title">Commande #<?php echo $_SESSION["order"][2]; ?></h4>
			</div>
			<div class="modal-body">
				<p span class="text-center">Your order for an amount
					<?php if(isset($_SESSION["order"][3])) echo "total"; ?> de <?php echo $_SESSION["order"][1]; ?> € To
well 				recorded.<br />It will be prepared in a few moments.</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div>

<!-- Login Modal HTML -->
<?php if (!isset($_SESSION["user_login"])) { ?>
<div id="loginModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Please login</h4>
			</div>
			<div class="modal-body">
				<form action="modules/authentication.php" method="post" id="loginForm">
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" name="pseudo" id="pseudo" class="form-control input-lg" placeholder="Pseudo"
							autofocus>
					</div>
					<div class="form-group">
						<i class="fa fa-lock"></i>
						<input type="password" name="password" id="password" class="form-control input-lg"
							placeholder="Mot de passe"> <!-- pas de vérification de saisi ici -->
					</div>
					<div class="form-group">
						<input name="btn_login" type="submit" value="Se connecter"
							class="btn btn-primary btn-block btn-lg">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a href="register.php">Create an account</a>
			</div>
		</div>
	</div>
</div>
<?php } 
?>

<!-- Footer -->
<?php require_once ("includes/footer.php"); ?>

<script>
$('link[href="assets/datatables/css/jquery.dataTables.css"]').prop('disabled', true);

// modal passing values
$('[data-toggle="modal"]').click(function () {
	var productId = $(this).attr('data-rid')
	document.getElementById("productIdFromModal").value = productId;
});

// open login modal
<?php
if (isset($_SESSION["visitor"]) && $_SESSION["visitor"] == "visitor") { ?>
$('#loginModal').modal('show');
<?php unset($_SESSION["visitor"]);
} ?>

// open order confirmation modal
<?php
if (isset($_SESSION['order'])) { ?>
$('#confirmationModal').modal('show');
<?php unset($_SESSION['order']);
} ?>
</script>

<!-- form verification -->
<script src='assets/bootstrap/js/bootstrapvalidator.min.js'></script>
<script>
$('#loginForm').bootstrapValidator({
	feedbackIcons: {
		valid: 'glyphicon glyphicon-ok',
		invalid: 'glyphicon glyphicon-remove',
		validating: 'glyphicon glyphicon-refresh'
	},
	fields: {
		pseudo: {
			validators: {
				stringLength: {
					max: 30,
					message: "Your username cannot exceed 30 characters"
				},
				notEmpty: {
					message: 'Please enter your nickname'
				}
			}
		},
		password: {
			validators: {
				stringLength: {
					min: 5,
					max: 254,
					message: 'Your password has at least 5 characters'
				},
				notEmpty: {
					message: 'Please enter your password'
				}
			}
		}
	}
});
</script>