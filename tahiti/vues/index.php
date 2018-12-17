<?php require('../controllers/index.php'); ?>


<?php $title = 'TAHITI - Accueil'; ?>

<?php ob_start();?>

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
            <?php echo $news[0]['title']; ?> 
		</h4> <br>
		<p class="text-muted">
			<?php 
				echo substr($news[0]['description'],0,200); 
				if (strlen($news[0]['description'])>200) {
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
<?php $content = ob_get_clean();?>

<?php require 'template_front.php';?>