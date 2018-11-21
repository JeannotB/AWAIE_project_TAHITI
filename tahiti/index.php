<?php
    include "./assets/php/get_news.php";
?>



<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">

	<title>TAHITI - Accueil</title>

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
					<li class="active"><a href="index.php">Accueil</a></li>
					<li><a href="news.php">Actualités</a></li>
					<li><a href="index.php#about">TAHITI</a></li>
					<li><a href="index.php#products">Notre produit</a></li>
					<li><a href="board.html">Board</a></li>
					<li><a href="recruit.html">Nous rejoindre</a></li>
					<!--<li><a href="#contact">Nous contacter</a></li>-->
					<li><a class="btn" href="login.php">SIGN IN / SIGN UP</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">Bienvenue sur le nouveau site de TAHITI</h1>
				<p><br></p>
				<p><a class="btn btn-action btn-lg" role="button" href="#about">Plus d'infos</a> <a class="btn btn-default btn-lg"
					 role="button" href="#products">Notre produit</a></p>
			</div>
		</div>
	</header>
	<!-- /Header -->


	<!-- News -->
	<div class="container" id="news">
		<br> <br>
		<h2 class="text-center top-space">Dernière actualité</h2><br>
        <h4><i class="fa fa-send"></i>
            <?php echo $news_array['title'][0]; ?> 
		</h4> <br>
		<p class="text-muted">
			<?php 
				echo substr($news_array['description'][0],0,200); 
				if (strlen($news_array['description'][0])>200) {
					echo '...';
				}
			?> <br>
			<a href="news.php">Lire l'actualité</a>.
		</p>
	</div>
	<!-- /News -->

	<!-- About -->
	<div class="container" id="about">
		<br> <br>
		<h2 class="text-center top-space">TAHITI, qui sommes nous ?</h2>
		<p class="text-muted">
			TAHITI est une start-up créée par 5 jeunes ingénieurs de l'INSA Centre Val de Loire. <br><br>

			Au fur et à mesure de leur formation, tournée à la fois vers le développement informatique et l'instrumentation,
			ils se rendent compte de l'importance de la récupération de données pour les entreprises. Ce besoin pourraît cependant
			être bien mieux satisfait selon eux. <br><br>

			C'est ainsi qu'est créé TAHITI (Transfert Automate Html Intégration et Traitement de l'Information). Nous nous voulons
			résolument modernes dans les solutions que l'on peut apporter à chaque client, s'adapter à ses demandes et à ses capteurs.<br><br>

			Pour en savoir plus sur nos fondateurs, cliquez <a href="board.html">ici</a>.
		</p>
	</div>
	<!-- /About-->

	<!-- Products -->
	<div class="container" id="products">
		<br> <br>
		<h2 class="text-center top-space">Notre produit</h2>
		<p class="text-muted">
			Nous réalisons pour vous une solution complète de supervision de capteurs.<br><br>

			La connexion de l'ensemble de vos capteurs (pour gérer une température par exemple) est réalisée par notre structure. L'ensemble des
			données est rendue visible par le biais de notre site internet, en se connectant à votre compte. Vous avez ainsi accès à une interface
			moderne et dynamique, synthétisant le résultat de tous vos capteurs. Des alertes permettent de vous tenir informé des problèmes qu'il y a 
			pu avoir. Enfin, le téléchargement des données sous le format xls est possible. <br><br>

			En cas de problème, n'hésitez pas à contacter notre support. <br><br>
		</p>
	</div>
	<!-- /Products-->

	<!-- Contact -->
	<div class="container text-center container" id="contact">
		<h2 class="text-center top-space">Nous contacter</h2>
		<br>

		<div class="contact" style="text-align:center;">
			<div class="form-group">
				<form method="post" action="">
					<input type="text" name="name" class="form-control" placeholder="Votre nom" tabindex="1"><br>
					<input type="text" name="email" class="form-control" placeholder="Votre adresse mail" tabindex="2"><br>

					<textarea name="content" class="form-control" rows="5" placeholder="Votre message" tabindex="3"></textarea><br>

					<button class="btn btn-action btn-lg" type="submit" name="Login" tabindex="4"><i class="fa fa-envelope"></i> Envoyer</button>

				</form>
			</div>

		</div> <!-- /row -->


	</div> <!-- /contact -->



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