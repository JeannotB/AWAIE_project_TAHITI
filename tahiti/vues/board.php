<!-- TITLE -->
<?php $title = "TAHITI - Board";?>
<!-- CONTENT -->
<?php ob_start();?>

<!-- About Us -->
<div class="jumbotron top-space container">
		<h2 class="text-center top-space">Board</h2>

		<div class="row">
			<div class="col-md-12 col-sm-12 highlight">
				<div class="h-caption">
					<h4><i class="fa fa-group"></i>
					<a href="./board_bchevallier">
					Développeur Pilote<br>
					Baptiste Chevallier</h4></a>
				</div>
				<div class="h-body text-center">
					<p>Directeur Général de TAHITI<br>
						Fondateur</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 highlight">
				<div class="h-caption">
					<h4><i class="fa fa-github"></i>
					<a href="./board_shosik">
					Développeur<br>
					Stéphane Ho Sik Chuen</h4></a>
				</div>
				<div class="h-body text-center">
					<p>Fondateur</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 highlight">
				<div class="h-caption">
					<h4><i class="fa fa-html5"></i>
					<a href="./board_tgoward">
					Développeur<br>
					Thomas Goward</h4></a>
				</div>
				<div class="h-body text-center">
					<p>Fondateur</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 highlight">
				<div class="h-caption">
					<h4><i class="fa fa-laptop"></i>
					<a href="./board_mpetit">
					Développeur<br>
					Mikaël Petit</h4></a>
				</div>
				<div class="h-body text-center">
					<p>Fondateur</p>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 highlight">
				<div class="h-caption">
					<h4><i class="fa fa-thermometer">
					<a href="./board_gpomme">
					</i>Développeur<br>
					Gaël Pommé</h4></a>
				</div>
				<div class="h-body text-center">
					<p>Fondateur</p>
				</div>
			</div>
		</div> <!-- /row  -->
	</div>
	<!-- /About Us -->

<?php $content = ob_get_clean();?>

<?php require 'template_front.php';?>