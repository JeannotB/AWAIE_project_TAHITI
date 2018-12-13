<!-- TITLE -->
<?php $title = "TAHITI - Baptiste Chevallier";?>
<!-- CONTENT -->
<?php ob_start();?>

    <!-- Board -->
    <div class="container">
		<ul class="ul_board">
			<li class="li_board"><a class="a_board" href=./board_bchevallier>Baptiste Chevallier</a></li>
			<li class="li_board"><a class="a_board" href=./board_shosik>Stéphane Ho Sik Chuen</a></li>
			<li class="li_board"><a class="a_board" href=./board_tgoward>Thomas Goward</a></li>
			<li class="li_board"><a class="a_board" href=./board_mpetit>Mikaël Petit</a></li>
			<li class="li_board"><a class="a_board_active" href=./board_gpomme>Gaël Pommé</a></li>
		</ul>
	</div>
	<!-- /Board-->

	<!-- Gaël -->
	<div class="container">
		<h2 class="text-center top-space">Gaël Pommé</h2>
		<h3 class="text-center top-space">Développeur</h3>
		<img src="assets/img/gpomme.jpg" alt="Gaël Pommé" title="Gaël Pommé" class="float_img" /> <br>
		<p class="text-muted">
			<h2>Cursus universitaire</h2><br>
			- Elève ingénieur de l'INSA Centre Val de Loire [Blois (41)].<br>
			- Semestre Erasmus à University of South-Eastern Norway [Porsgrunn, Norvège].<br>
			<br>
			<h2>Centres d'intérêt</h2><br>
			- Automates<br>
			- Programmation en C<br>
			- Musique<br>
			- Sport<br>
			<br>
			<h2>Projets et expériences</h2><br>
			- Réparation d'une maquette automatisée<br>
			- Programme de contrôle utilisant un LASER industriel<br>
			- Contrôle d'une maquette d'un hélicoptère<br>
			- Contrôle d'une maquette simulant un chauffage<br>
			- Membre d'une bureau d'une harmonie locale<br>
			<br>
		</p>
		<h2><a href="https://www.linkedin.com/in/gaelpomme/"><i class="fa fa-linkedin"></i></a></h2>
	</div>


<?php $content = ob_get_clean();?>

<?php require 'template_front.php';?>	