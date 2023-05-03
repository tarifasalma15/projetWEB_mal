<?php 
	session_start();
	if (isset($_SESSION["user_login"])){ 
		header("location: index.php");
		exit();
	}
	$page_title="S'inscrire";
	require_once "includes/header.php";
	require_once "includes/navbar.php"; ?>
<div class="container mt-5">
	<form action="modules/authentication.php" method="POST" id="validateForm">
		<div class="row justify-content-center">
			<div class="col-xs-12 col-sm-8 col-md-7 col-sm-offset-2 col-md-offset-3">
				<h2>Create an account <small></small></h2>
				<hr class="colorgraph_register">
				<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Nom" autofocus>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="Prénom">
						</div>
					</div>
				</div>
				<div class="form-group">
					<input type="text" name="pseudo" id="pseudo" class="form-control input-lg" placeholder="Pseudo">
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirmer le mot de passe">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-8 col-sm-9 col-md-10">
					Clicking on <strong class="badge badge-primary">Create an account</strong>, you accept our <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms
					of use</a>, notre <a href="#" data-toggle="modal" data-target="#t_and_c_m">Policy
					confidentiality</a> and our use of
					Cookies.
					</div>
				</div>
				<hr class="colorgraph_register">
				<div class="row">
					<div class="col-xs-12 col-md-6"><input name="btn_register" type="submit" value="Create an account" class="btn btn-primary btn-block btn-lg2"></div>
					<div class="col-xs-12 col-md-6"><a href="login.php" class="btn btn-success btn-block btn-lg2">Already registered ?</a></div>
				</div>
			</div>
		</div>
	</form>
	<!-- Modal -->
	<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">						
                        <h4 class="modal-title">Terms of Use and Privacy Policy</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque non est purus. Ut elementum tempor est, in venenatis ipsum finibus et. Fusce sodales neque massa, vel sollicitudin lorem pharetra et. Donec fermentum dignissim libero, nec maximus magna. Donec facilisis, eros id sollicitudin malesuada, justo ligula laoreet ante, quis placerat urna quam id mauris. Ut consectetur egestas sem, eu auctor odio finibus non. Nunc et magna placerat, molestie sapien nec, aliquam orci. Suspendisse tincidunt aliquet rutrum. </p>
					<p>Praesent venenatis posuere est sodales sollicitudin. Sed blandit lobortis accumsan. Proin ornare mi sed risus vehicula accumsan. Nulla nec tellus massa. In hac habitasse platea dictumst. Pellentesque aliquet, diam a facilisis rhoncus, lectus massa tempor neque, vel gravida neque tortor a urna. Nulla lobortis vel sem sit amet condimentum. Proin ultrices vehicula sapien, et sodales purus blandit at. Pellentesque scelerisque condimentum ultrices. </p>
					<p>Nulla at leo ac nibh facilisis ultricies vitae vel nisi. Cras tristique tristique euismod. Fusce nisl velit, scelerisque sit amet finibus ac, ornare nec turpis. Vivamus vulputate sapien nec velit euismod convallis. Aenean sit amet felis neque. Nulla egestas erat in dapibus sagittis. Mauris ac ipsum eleifend, rutrum elit at, euismod ex. Nulla erat sem, suscipit vel condimentum quis, tempor et dolor. Praesent quam risus, tempus eget tortor id, scelerisque lobortis risus. Phasellus venenatis nisl at lacinia feugiat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>
					<p>Maecenas sed sagittis tortor. In hac habitasse platea dictumst. Morbi suscipit justo accumsan sem finibus pharetra. Vivamus mi tortor, aliquam sit amet neque vel, tempus sodales mi. Nam ac tortor pulvinar, venenatis orci vel, congue nisl. Mauris vitae vestibulum ante. Sed odio nibh, laoreet ac aliquet eget, sodales quis neque. Vestibulum purus nunc, pharetra non lorem ut, auctor faucibus diam. Cras nec ipsum purus. Sed tempor sit amet augue quis ornare. Aenean odio sapien, iaculis in suscipit a, blandit vel ante. </p>
					<p>Curabitur aliquam eleifend tellus non convallis. Phasellus pulvinar tempor dui. Ut nibh lacus, finibus at egestas eget, malesuada vitae est. Cras vulputate lacinia metus. Etiam fringilla tincidunt vestibulum. Integer sodales lorem eu ligula ullamcorper, id dapibus erat scelerisque. Nulla vestibulum, arcu ac condimentum pharetra, lorem elit sodales tellus, sed varius dui augue in neque. Vestibulum sit amet quam non nisi volutpat aliquet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
					<p>Sed velit dolor, ultrices nec sem id, vehicula malesuada neque. Donec consequat ornare arcu. Aliquam molestie dui vel odio euismod, a condimentum diam posuere. Integer rutrum accumsan pulvinar. Aliquam augue orci, luctus sit amet augue sed, cursus tempus nisi. Pellentesque euismod dignissim mi, quis sollicitudin dui varius at. Phasellus tristique mollis justo ut hendrerit. Morbi posuere placerat eleifend. Sed bibendum sem ac lorem vehicula, et porttitor elit ornare. Donec feugiat odio vitae arcu malesuada auctor. Donec a orci libero. Maecenas fringilla lacus lorem, ut tempor eros rhoncus ac. Fusce a tempor risus. Morbi velit nibh, facilisis eu nisl id, pharetra condimentum neque. </p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">I accept</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div>

<?php require_once "includes/footer.php"; ?>

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
		last_name: {
			validators: {
				stringLength: {
					max: 30,
					message: "Your name must not exceed 30 characters"
				},
				notEmpty: {
					message: 'Please enter your name'
				}
			}
		},
		first_name: {
			validators: {
				stringLength: {
					max: 30,
					message: "Your first name must not exceed 30 characters"
				},
				notEmpty: {
					message: 'Please enter your first name'
				}
			}
		},
		pseudo: {
			validators: {
				stringLength: {
					max: 30,
					message: "Your nickname must not exceed 30 characters "
				},
				notEmpty: {
					message: 'Please enter a nickname'
				},
				regexp: {
					regexp: /^[a-z0-9\-\._]{4,254}$/, // symboles autorisés : "-", ".", "_"
                    message: "Your username must be at least four characters long. It can combine lowercase letters, numbers and symbols."
                }
			}
		},
		password: {
			validators: {
				notEmpty: {
					message: 'Please enter a password'
				},
				regexp: {
					regexp: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,254}$/,
                    message: 'Your password must contain at least six characters, one uppercase letter, one lowercase letter and one number'
                }
			}
		},
		password_confirmation: {
			validators: {
				notEmpty: {
					message: 'Please confirm password'
				},
				identical: {
					field: 'password',
					message: 'Passwords do not match'
				}
			}
		},
	}
});

$('link[href="assets/style/crud.min.css"]').prop('disabled', true);
</script>

