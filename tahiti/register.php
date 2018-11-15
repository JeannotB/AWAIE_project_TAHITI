<?php
    session_start();

    //Need DataBase connection
    require './assets/php/db_connection.php';
    
    require './assets/php/register_function.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>TAHITI - AWAIE -- Register</title>

		<!-- Bootstrap core CSS -->
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<!--external css-->
		<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
			
		<!-- Custom styles for this template -->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/style-responsive.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

		<!-- **********************************************************************************************************************************************************
		MAIN CONTENT
		*********************************************************************************************************************************************************** -->

		<div id="login-page">
			<div class="container">
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
							<a class="" href="index.php">
								Login
							</a>
						</div>
			
					</div>
			
				</form>	  	
			
			</div>
		</div>

		<!-- js placed at the end of the document so the pages load faster -->
		<script src="assets/js/jquery.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!--BACKSTRETCH-->
		<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
		<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
		<script>
			$.backstretch("assets/img/automate2.png", {speed: 500});
		</script>


	</body>
</html>
