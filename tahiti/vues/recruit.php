<?php 
require '../controllers/recruit.php';
require '../controllers/trad_date.php';
?>

<!-- TITLE -->
<?php $title = "TAHITI - Recrutement";?>
<!-- CONTENT -->
<?php ob_start();?>
    <!-- Title page -->
	<div class="jumbotron top-space container">
		<h1 class="text-center top-space">Offres</h1><br>
		<span class="pull-right">
			Vous ne trouvez une offre correspondant à vos compétences<br>
			Envoyez nous une <a data-toggle="modal" href="#ModalCandidatureSpontannee" tabindex="4">Candidature spontannée</a>
		</span>
	</div>
	<!-- /Title page -->




	<!-- Offer -->
	<?php
	for ($ite = $first_job_id; $ite < $last_job_id; $ite++) {?>
		
		<div class="container">
			<h4><i class="fa fa-paper-plane"></i>
				<?php if ($job_array[$ite]['type'] == 0) {
					echo '[CDI]  ';
				} elseif ($job_array[$ite]['type'] == 1) {
					echo '[CDD]  ';
				} else {
					echo '[STAGE]  ';
				}
				echo $job_array[$ite]['title']; ?> 
			</h4> <br>

			<h5>
			<i class="fa fa-calendar"></i> 
				<?php echo 'Offre publiée le ' . trad_date($job_array[$ite]['date_offer']); ?> &nbsp &nbsp &nbsp
			
			<i class="fa fa-bullseye"></i> 
				<?php echo $job_array[$ite]['localisation']; ?> &nbsp &nbsp &nbsp

			<i class="fa fa-calendar-check-o"></i> 
				<?php
				/*if ($job_array[$ite]['date_takeout'] <= getdate()){
					echo 'Prise de fonction immédiate';
				} else {*/
					echo 'Prise de fonction : ' . trad_date($job_array[$ite]['date_takeout']);
				/*}; */?>&nbsp &nbsp &nbsp
			</h5> 

			<h6> <i class="fa fa-briefcase"></i> 
				<i><?php echo 'Offre provenant de ' . $job_array[$ite]['name']; ?></i>
			</h6>
			
			<?php 
				echo substr($job_array[$ite]['description'],0,500); 
				if (strlen($job_array[$ite]['description'])>500) {
					echo '...';}
			?><br>
			<h5 class="text-center top-space">
				<a href="job-<?php echo $job_array[$ite]['offer_id'] ?>"><i class="fa fa-info"></i> Plus d'info </a>

				<?php for ($i = 0; $i < 30; $i++) {?> &nbsp <?php } ?>
				<a href="candidate-<?php echo $job_array[$ite]['offer_id'] ?>"><i class="fa fa-pencil-square-o"></i> Postuler </a>
			</h5>
	</div> <br> <br> <br> <br> <?php } ?>
	<!-- /Offer -->

	<!-- Offers path -->
	<div class="container">
        <h2 class="text-center top-space">
			<?php if ($first_job_id != 0) {?> 
				<a href="recruit-<?php echo $first_job_id-$number_offers_displayed?>"><i class="fa fa-angle-double-left"></i></a> <?php } ?>
			<?php if (($last_job_id) != $job_max) { ?>
				<a href="recruit-<?php echo $last_job_id?>"><i class="fa fa-angle-double-right"></i></a> <?php } ?>
		</h2> <br>
	</div>
	<!-- /Offers path -->

	<!-- Modal -->
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ModalCandidatureSpontannee" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="post" action="#">
					<div class="modal-header">
							<h4 class="modal-title">Formulaire de Candidature Spontannée</h4>
					</div>
					<div class="modal-body">
						<p class="text-center top-space">
							Votre nom : 
							<input type="text" name="nom" class="form-control placeholder-no-fix"> <br><br>
							Votre prénom : 
							<input type="text" name="prenom" class="form-control placeholder-no-fix"> <br><br>
							Votre candidature :
							<textarea  name="candidature" class="form-control placeholder-no-fix"></textarea>
						</p>
					</div>
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
						<button class="btn btn-theme" type="submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- modal -->




<?php $content = ob_get_clean();?>

<?php require 'template_front.php';?>