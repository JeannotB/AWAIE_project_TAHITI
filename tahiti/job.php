<?php
	include "./assets/php/get_offers.php";
	include "./assets/php/trad_date.php";

	if (isset($_GET['id_job']))
		$job_id = $_GET['id_job'];
	else {
		header('Location: recruit.php');
		exit(); }

?>



<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">

	<title>TAHITI - Recrutement</title>

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
		<h1 class="text-center top-space">
			<?php if ($job_array['type'][$job_id] == 0) {
					echo '[CDI]  ';
				} elseif ($job_array['type'][$job_id] == 1) {
					echo '[CDD]  ';
				} else {
					echo '[STAGE]  ';
				}
				echo $job_array['title'][$job_id]; ?></h1><br>
	</div>
	<!-- /Title page -->




	<!-- Offer -->
	<div class="container">

		<h3 class="text-center top-space">
		<i class="fa fa-calendar"></i> 
			<?php echo 'Offre publiée le ' . trad_date($job_array['date_offer'][$job_id]); ?> <br> <br>
		
		<i class="fa fa-bullseye"></i> 
			<?php echo $job_array['localisation'][$job_id]; ?> <br> <br>

		<i class="fa fa-calendar-check-o"></i> 
		<?php
			/*if ($job_array['date_takeout'][$ite] <= getdate()){
				echo 'Prise de fonction immédiate';
			} else {*/
				echo 'Prise de fonction : ' . trad_date($job_array['date_takeout'][$job_id]);
			/*}; */?> <br>
		</h3> 

		<h4 class="text-center top-space"> <i class="fa fa-briefcase"></i> 
			<i><?php echo 'Offre provenant de ' . $job_array['author'][$job_id]; ?></i>
		</h4> <br> <br> <br>
		
		<?php 
			echo $job_array['description'][$job_id]; 
		?><br>
	
		<h4 class="text-center top-space"> <a href="candidate.php?id_job=<?php echo $job_id ?>"><i class="fa fa-pencil-square-o"></i> Postuler </a>
		</h4>
	</div>
	<!-- /Offer -->

	<!-- Return path -->
	<div class="container">
        <h4 class="text-center top-space">
			<a href="recruit.php?id_job=<?php echo $job_id?>"><i class="fa fa-angle-double-left"></i>&nbsp &nbsp &nbspRetour aux offres</a>
		</h4> <br>
	</div>
	<!-- /News path -->


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