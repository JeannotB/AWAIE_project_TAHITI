<!-- TITLE -->
<?php $title = "TAHITI - Thomas Goward";?>
<!-- CONTENT -->
<?php ob_start();?>

    <!-- Board -->
    <div class="container">
		<ul class="ul_board">
			<li class="li_board"><a class="a_board" href=./board_bchevallier>Baptiste Chevallier</a></li>
			<li class="li_board"><a class="a_board" href=./board_shosik>Stéphane Ho Sik Chuen</a></li>
			<li class="li_board"><a class="a_board_active" href=./board_tgoward>Thomas Goward</a></li>
			<li class="li_board"><a class="a_board" href=./board_mpetit>Mikaël Petit</a></li>
			<li class="li_board"><a class="a_board" href=./board_gpomme>Gaël Pommé</a></li>
		</ul>
	</div>
	<!-- /Board-->

	<!-- Thomas -->
	<div class="container">
		<h2 class="text-center top-space">Thomas Goward</h2>
		<h3 class="text-center top-space">Développeur</h3>
		<a href="./board_tgoward2"><img src="./img/tgoward.jpg" alt="Thomas Goward" title="Thomas Goward" class="float_img" /></a><br>
		<p class="text-muted">
			<h2>Cursus universitaire</h2><br>
			- Elève ingénieur de l'INSA Centre Val de Loire [Blois (41)].<br>
      - Master Big Data Managment and Analysis à l'Université de Tours [Tours (37)].<br>
			- Semestre à l'Univerisité du Québec à Chicoutimi [Sagunay, Canada].<br>
			<br>
			<h2>Centres d'intérêt</h2><br>
			- Programmation<br>
			- Data science<br>
			- Tir à l'arc<br>
			- Simulateur de course<br>
			- Photographie<br>
			<br>
			<h2>Projets and expériences</h2><br>
      - Conception d'un drone entièrement actionné<br>
			- Vainqueur d'un start-up weekend<br>
			- Etudiant entrepreneur<br>
			<br>
		</p>
		<h2><a href="https://www.linkedin.com/in/thomas-goward-456345a9/"><i class="fa fa-linkedin"></i></a></h2>
	</div>


<?php $content = ob_get_clean();?>

<?php require 'template_front.php';?>
