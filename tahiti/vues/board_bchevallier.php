<!-- TITLE -->
<?php $title = "TAHITI - Baptiste Chevallier";?>
<!-- CONTENT -->
<?php ob_start();?>

    <!-- Board -->
    <div class="container">
		<ul class="ul_board">
			<li class="li_board"><a class="a_board_active" href=./board_bchevallier>Baptiste Chevallier</a></li>
			<li class="li_board"><a class="a_board" href=./board_shosik>Stéphane Ho Sik Chuen</a></li>
			<li class="li_board"><a class="a_board" href=./board_tgoward>Thomas Goward</a></li>
			<li class="li_board"><a class="a_board" href=./board_mpetit>Mikaël Petit</a></li>
			<li class="li_board"><a class="a_board" href=./board_gpomme>Gaël Pommé</a></li>
		</ul>
	</div>
	<!-- /Board-->

	<!-- Baptiste -->
	<div class="container">
		<h2 class="text-center top-space">Baptiste Chevallier</h2>
		<h3 class="text-center top-space">Développeur pilote</h3>
		<img src="assets/img/bchevallier.jpg" alt="Baptiste Chevallier" title="Baptiste Chevallier" class="float_img" /> <br>
		<p class="text-muted">
			<h2>Cursus universitaire</h2><br>
			- Elève ingénieur de l'INSA Centre Val de Loire [Blois (41)].<br>
			- Semestre Erasmus à Univerisity Polytechnic of Bucharest [Bucharest, Roumanie].<br>
			<br>
			<h2>Centres d'intérêt</h2><br>
			- Sciences et High-Tech<br>
			- Automatisme<br>
			- Dévelepomment Web<br>
			- Voyage<br>
			- Sport<br>
			<br>
			<h2>Projets et expériences</h2><br>
			- Création de plusieurs sites internet<br>
			- Conception d'outils logiciels pour une production industrielle<br>
			<br>
		</p>
		<h2><a href="https://www.linkedin.com/in/baptiste-chevallier-7b5122158/"><i class="fa fa-linkedin"></i></a></h2>
	</div>


<?php $content = ob_get_clean();?>

<?php require 'template_front.php';?>	