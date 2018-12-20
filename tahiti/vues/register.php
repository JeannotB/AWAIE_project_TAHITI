<?php require '../controllers/register.php';?>

<!-- TITLE -->
<?php $title = "TAHITI - AWAIE -- Register";?>
<!-- CONTENT -->
<?php ob_start();?>
    <form class="form-login" action="#"  method="post">
        <h2 class="form-login-heading">Register</h2>
        <div class="login-wrap">
            <div id="error" style="color: red;"><?php echo $error;?></div>
                <input type="text" name="name" class="form-control" placeholder="Name" autofocus>
                <hr>
                <input type="text" name="email" class="form-control" placeholder="E-mail" autofocus>
                <br>
                <input type="text" name="email_confirm" class="form-control" placeholder="Confirm E-mail" autofocus>
                <hr>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <br>
                <input type="password" name="password_confirm" class="form-control" placeholder="Comfirm Password">
                <br>
                <button class="btn btn-theme btn-block" href="basic.php" type="submit" name="Register" value="Register"><i class="fa fa-lock"></i> Register</button>
                <hr>
                            
                <div class="registration">
                    You have an account ?<br/>
                    <a class="" href="../login">Login</a>
                </div>
                <hr>
                <div class="registration">
                    <a class="" href="../">Return to website</a>
                </div>
            </div>
        </div>	
	</form>


<?php $content = ob_get_clean();?>

<?php require 'template_access.php';?>