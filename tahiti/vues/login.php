<?php require '../controllers/login.php';?>

<!-- TITLE -->
<?php $title = "TAHITI - AWAIE -- Login";?>
<!-- CONTENT -->
<?php ob_start();?>
	<form class="form-login" action="#" method="post">
		<h2 class="form-login-heading">sign in now</h2>
		<div class="login-wrap">
			<input type="text" name="email" class="form-control" placeholder="Email" tabindex="1" autofocus>
			<br>
			<input type="password" name="password" class="form-control" placeholder="Password" tabindex="2">
			<label class="checkbox">
				<span class="pull-right">
					<a data-toggle="modal" href="login.html#myModal" tabindex="4"> Forgot Password?</a>
				</span>
			</label>
			<button class="btn btn-theme btn-block" type="submit" name="Login" tabindex="3"><i class="fa fa-lock"></i> SIGN IN</button>
			<hr>
			<div class="registration">
				Don't have an account yet?<br/>
				<a class="" href="register.php">Create an account</a>
			</div>
		</div>
		<!-- Modal -->
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Forgot Password ?</h4>
					</div>
					<div class="modal-body">
						<p>Enter your e-mail address below to reset your password.</p>
							<input type="text" name="email_modal" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
					</div>
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
						<button class="btn btn-theme" type="button">Submit</button>
					</div>
				</div>
			</div>
		</div>
		<!-- modal -->
	</form>
<?php $content = ob_get_clean();?>

<?php require 'template_access.php';?>	  	
