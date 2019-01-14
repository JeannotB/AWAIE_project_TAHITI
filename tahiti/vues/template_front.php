<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">


	<title><?php echo $title; ?></title>

	<link rel="shortcut icon" href="./img/icon.png">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Roboto:300,400,700">
	<link rel="stylesheet" href="./vues/css/bootstrap.css">
	<link rel="stylesheet" href="./vues/font-awesome/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="./vues/css/style-responsive.css" >
	<link rel="stylesheet" href="./vues/css/bootstrap-theme-static.css" media="screen">
	<link href="./vues/css/static.css" rel="stylesheet">



</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span>
					<span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="./"><img src="./img/icon.png" style="max-height: 100px;" alt="TAHITI" /></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="./">Accueil</a></li>
					<li><a href="./news">Actualités</a></li>
					<li><a href="./#about">TAHITI</a></li>
					<li><a href="./#products">Notre produit</a></li>
					<li><a href="./board">Board</a></li>
					<li><a href="./recruit">Nous rejoindre</a></li>
					<li><a class="btn" href="login">SIGN IN / SIGN UP</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

	<!-- CONTENT -->

	<?php echo $content; ?>

	<!-- /Content -->



	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p><a href="mailto:contact.sup.tahiti@gmail.com">contact.sup.tahiti@gmail.com</a><br>
								<br>
								TAHITI<br>
								INSA Centre Val de Loire<br>
								3 rue de la Chocolaterie<br>
								41000 Blois<br>
								FRANCE
							</p>
						</div>
					</div>
				<!--
					<div class="col-md-3 widget">
						<h3 class="widget-title">Follow Us</h3>
						<div class="widget-body" style="min-height: 25px;">
							<p class="follow-me-icons">
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								<a href=""><i class="fa fa-dribbble fa-2"></i></a>
								<a href=""><i class="fa fa-github fa-2"></i></a>
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>
						</div>
					</div>
				-->
					<div class="col-md-3 widget">
						<h3 class="widget-title">Respect de la vie privée</h3>
						<div class="widget-body">
							<p>En poursuivant votre navigation sur ce site, vous acceptez l'utilisation de cookies susceptibles de réaliser des
								statistiques de visites ou de permettre de vous proposer des services, y compris de partenaires tiers, adaptés
								à vos centre d'intérêt. <br>
							 Pour éviter cela, vous pouvez modifier le paramétrage de votre navigateur.							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="./">Home</a> |
								<a href="./#about">About</a> |
								<a href="./#products">Products</a> |
								<a href="./#about-us">Contact</a> |
								<b><a href="./login">Sign up</a></b>
							</p>
						</div>
					</div>
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2018, TAHITI. Designed by <a href="http://gettemplate.com/" rel="designer">gettemplate</a>
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>
</body>

		<!-- js placed at the end of the document so the pages load faster -->
		<script src="./vues/js/jquery.js"></script>
		<script src="./vues/js/bootstrap.min.js"></script>

<script>
	function clear(element){
		element.value = null;
	}

</script>

</html>
