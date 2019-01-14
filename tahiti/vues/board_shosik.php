<!-- TITLE -->
<?php $title = "TAHITI - Stéphane Ho Sik Chuen";?>
<!-- CONTENT -->
<?php ob_start();?>

    	<!-- Board -->
	<div class="container">
		<ul class="ul_board">
			<li class="li_board"><a class="a_board" href=./board_bchevallier>Baptiste Chevallier</a></li>
			<li class="li_board"><a class="a_board_active" href=./board_shosik>Stéphane Ho Sik Chuen</a></li>
			<li class="li_board"><a class="a_board" href=./board_tgoward>Thomas Goward</a></li>
			<li class="li_board"><a class="a_board" href=./board_mpetit>Mikaël Petit</a></li>
			<li class="li_board"><a class="a_board" href=./board_gpomme>Gaël Pommé</a></li>
		</ul>
	</div>
	<!-- /Board-->

	<!-- Stéphane -->
	<div class="container">
		<h2 class="text-center top-space">Stéphane Ho Sik Chuen</h2>
		<h3 class="text-center top-space">Développeur</h3>
		<a href="./board_shosik2"><img src="./img/shosik.jpg" alt="Stéphane Ho Sik Chuen" title="Stéphane Ho Sik Chuen" class="float_img" /></a> <br>
		<p class="text-muted">
			<h2>Cursus universitaire</h2><br>
			- Master 2 Big Data Management and Analytics à l'Université de Tours [Tours (41)]<br>
			- Elève ingénieur de l'INSA Centre Val de Loire [Blois (41)].<br>
			- Classe préparatoire de Physique Chimie au Lycée Honoré de Balzac [Paris (75)]<br>
			<br>
			<h2>Compétences et centres d'intérêt</h2><br>
			- Programmation : <i>Python, C, HTML, JavaScript</i><br>
			- Activtés sportives<br>
			<br>
			<h2>Projets</h2><br>
			<i>Réalisés</i><br>
			- Membre du Club Robotique [INSA CVL]<br>
			- Administrateur du Pôle Technique [INSA CVL]<br>
			<br>
			<i>A venir</i><br>
			- Spécialisation en Software Engineering aux Etats-Unis
			<br>
		</p>
		<h2><a href="https://www.linkedin.com/in/st%C3%A9phane-ho-sik-chuen-908b97130/"><i class="fa fa-linkedin"></i></a></h2>
	</div>


<?php $content = ob_get_clean();?>

<?php require 'template_front.php';?>	