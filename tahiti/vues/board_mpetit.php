<!-- TITLE -->
<?php $title = "TAHITI - Mikaël Petit";?>
<!-- CONTENT -->
<?php ob_start();?>

    <!-- Board -->
    <div class="container">
		<ul class="ul_board">
			<li class="li_board"><a class="a_board" href=./board_bchevallier>Baptiste Chevallier</a></li>
			<li class="li_board"><a class="a_board" href=./board_shosik>Stéphane Ho Sik Chuen</a></li>
			<li class="li_board"><a class="a_board" href=./board_tgoward>Thomas Goward</a></li>
			<li class="li_board"><a class="a_board_active" href=./board_mpetit>Mikaël Petit</a></li>
			<li class="li_board"><a class="a_board" href=./board_gpomme>Gaël Pommé</a></li>
		</ul>
	</div>
	<!-- /Board-->

	<!-- Mika -->
	<div class="container">
		<h2 class="text-center top-space">Mikaël Petit</h2>
		<h3 class="text-center top-space">Développeur</h3>
		<img src="./img/mpetit.JPG" alt="Mikaël Petit" title="Mikaël Petit" class="float_img" /> <br>
		<p class="text-muted">
			<h2>Cursus universitaire</h2><br>
			- Elève ingénieur de l'INSA Centre Val de Loire [Blois (41)].<br>
			- Classe préparatoire en Physique - Technologie au lycée A.R.Lesage [Vannes (56)]<br>
			<!-- Baccalauréat Scientifique spécialité Mathématique au lycée Marcel Gambier [Lisieux (14)]-->
			<br>
			<h2>Centres d'intérêt</h2><br>
			- Robotique Android<br>
			- Gestion de projet<br>
			- Impression 3D<br>
			<br>
			<h2>Expériences et projets</h2><br>
			<i>Réalisés</i><br>
			- Présidence du Pôle Technique (INSA CVL)<br>
			- Présidence du Club Robotique (INSA CVL)<br>
			- Réalisation du Robot Android InMoov<br><br>
			<i>A venir</i><br>
			- Contrôle à distance d'un Robot Android à taille humaine<br>
			<br>
		</p>
	</div>


<?php $content = ob_get_clean();?>

<?php require 'template_front.php';?>	