<?php
	include "./assets/php/get_offers.php";
	include "./assets/php/trad_date.php";

	if (isset($_GET['id_job']))
		$job_id = $_GET['id_job'];
	else
		$job_id = 0;

	$job_max = count($job_array['title']);

	if ($job_id < 0 || $job_id >= $job_max)
		$job_id = 0;

	$number_offers_displayed = 3;

	$first_job_id = (int)($job_id/$number_offers_displayed);
	
	$last_job_id = $first_job_id + $number_offers_displayed;

	if ($last_job_id > $job_max)
		$last_job_id = $job_max;
?>



<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">

	<title>TAHITI - Candidature</title>

	<link rel="shortcut icon" href="assets/img/icon.png">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Roboto:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme-static.css" media="screen">
	<link rel="stylesheet" href="assets/css/static.css">
</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom">
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span>
					<span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php"><img src="assets/img/icon.png" style="max-height: 75px;" alt="TAHITI" /></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="index.php">Accueil</a></li>
					<li><a href="news.php">Actualités</a></li>
					<li><a href="index.php#about">TAHITI</a></li>
					<li><a href="index.php#products">Notre produit</a></li>
					<li><a href="board.html">Board</a></li>
					<li class="active"><a href="recruit.php">Nous rejoindre</a></li>
					<!--<li><a href="#contact">Nous contacter</a></li>-->
					<li><a class="btn" href="login.php">SIGN IN / SIGN UP</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->


	<!-- Title page -->
	<div class="jumbotron top-space container">
		<h1 class="text-center top-space">Candidature</h1><br>
	</div>
	<!-- /Title page -->

	
	<!-- Application -->
	<div class="container">
		<form method="post" action =#>
			<p class="text-center top-space">Votre nom : 
				<input type="text" name="nom"> <br><br>
				Votre prénom : 
				<input type="text" name="prenom"> <br><br>
				Votre candidature :
				<textarea  name="candidature"></textarea><br></p>

			<p class="text-center top-space"><input type="submit" value="Envoyer"></p>
		</form>
	</div>
	<!-- /Application -->


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

					<!--<div class="col-md-3 widget">
						<h3 class="widget-title">Follow Us</h3>
						<div class="widget-body" style="min-height: 25px;">
							<p class="follow-me-icons">
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								<a href=""><i class="fa fa-dribbble fa-2"></i></a>
								<a href=""><i class="fa fa-github fa-2"></i></a>
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>
						</div>
					</div>-->

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
								<a href="index.php">Accueil</a> |
								<a href="index.php#news">Actualités</a> |
								<a href="index.php#about">TAHITI</a> |
								<a href="index.php#products">Nos produits</a> |
								<a href="board.html">Board</a> |
								<a href="recruit.html">Nous rejoindre</a> |
								<a href="index.php#contact">Nous contacter</a> |
								<b><a href="login.php">Sign up</a></b>
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

<script>
	function clear(element){
		element.value = null;
	}

</script>

</html>