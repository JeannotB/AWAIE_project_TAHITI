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
		<h3 class="text-center top-space">Developer</h3>
		<a href="./board_tgoward"><img src="./img/tgoward.jpg" alt="Thomas Goward" title="Thomas Goward" class="float_img" /></a><br>
		<p class="text-muted">
			<h2>University cursus</h2><br>
			- Student enginneer at INSA Centre Val de Loire [Blois (41)].<br>
      - Master student in Big Data Managment and Analytics at Tours University.<br>
			- Semester at the Univerisité du Québec à Chicoutimi [Sagunay, Canada].<br>
			<br>
			<h2>Hobbies</h2><br>
			- Programming<br>
			- Data science<br>
			- Archery<br>
			- Sim racing and gaming<br>
			- Photography<br>
			<br>
			<h2>Projects and experience</h2><br>
      - Designing and building a fully accutuated mini-drone prototype<br>
			- Participated in a start-up weekend<br>
			- Student entrepreneur<br>
			<br>
		</p>
		<h2><a href="https://www.linkedin.com/in/thomas-goward-456345a9/"><i class="fa fa-linkedin"></i></a></h2>
	</div>


<?php $content = ob_get_clean();?>

<?php require 'template_front.php';?>
