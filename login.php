<?php 
	session_start();
	if (isset($_SESSION["user_login"])){ 
		header("location: index.php");
		exit();
	}
	$page_title="Se connecter";
	include("includes/header.php");
	include("includes/navbar.php"); 
	include("modules/cookie_login.php"); 
	?>
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-xs-12 col-sm-8 col-md-7 col-sm-offset-2 col-md-offset-3">
			<form action="modules/authentication.php" method="POST" id="validateForm">
				<h2>Log in <small></small></h2>
				<hr class="colorgraph_register">
				<div class="form-group">
					<input type="text" name="pseudo" id="pseudo" class="form-control input-lg" placeholder="Pseudo" autofocus>
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe">
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="remember" name="remember" value="checked">
							<label class="custom-control-label" for="remember">Remember me</label>
							<!-- METTRE COOKIES -->
						</div>
					</div>
				</div>
				<hr class="colorgraph_register">
				<div class="row">
					<div class="col-xs-12 col-md-6"><input name="btn_login" type="submit" value="Log in" class="btn btn-primary btn-block btn-lg2"></div>
					<div class="col-xs-12 col-md-6"><a href="register.php" class="btn btn-success btn-block btn-lg2">Create an account</a></div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php include_once("includes/footer.php");

// open register confirmation modal
if (isset($_SESSION['registered'])) { ?>
<!-- Confirmation Modal HTML -->
<div id="registeredModal" class="modal fade" tabindex='-1'>
	<div class="modal-dialog modal-confirm modal-dialog-centeredddd" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>
				<h4 class="modal-title">Congratulations <?php echo $_SESSION["registered"]; ?> !</h4>
			</div>
			<div class="modal-body">
				<p span class="text-center">Your account has been successfully created !</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div>
<script>
$('#registeredModal').modal('show');
</script>
<?php unset($_SESSION['registered']);
} ?>


<!-- form verification -->
<script src='assets/bootstrap/js/bootstrapvalidator.min.js'></script>
<script>
$('#validateForm').bootstrapValidator({
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
					message: "Your nickname cannot exceed 30 characters"
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
					message: 'Your password has at least five characters'
					// 5 caractères au lieu de 6 afin d'être testé sans problème
				},
				notEmpty: {
					message: 'Please enter your password'
				}
			}
		}
	}
});
</script>

