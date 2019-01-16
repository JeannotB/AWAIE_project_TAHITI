<?php 
require '../controllers/jobs.php';
require '../controllers/trad_date.php';
?>

<!-- TITLE -->
<?php $title = "TAHITI - Recrutement";?>
<!-- CONTENT -->
<?php ob_start();?>
    <!-- Title page -->
	<div class="jumbotron top-space container">
		<h1 class="text-center top-space">
			<?php if ($job_array[0]['type'] == 0) {
					echo '[CDI]  ';
				} elseif ($job_array[0]['type'] == 1) {
					echo '[CDD]  ';
				} else {
					echo '[STAGE]  ';
				}
				echo $job_array[0]['title']; ?></h1><br>
	</div>
	<!-- /Title page -->

	<!-- Offer -->
	<div class="container">

		<h3 class="text-center top-space">
		<i class="fa fa-calendar"></i> 
			<?php echo 'Offre publiée le ' . trad_date($job_array[0]['date_offer']); ?> <br> <br>
		
		<i class="fa fa-bullseye"></i> 
			<?php echo $job_array[0]['localisation']; ?> <br> <br>

		<i class="fa fa-calendar-check-o"></i> 
		<?php
			/*if ($job_array['date_takeout'][$ite] <= getdate()){
				echo 'Prise de fonction immédiate';
			} else {*/
				echo 'Prise de fonction : ' . trad_date($job_array[0]['date_takeout']);
			/*}; */?> <br>
		</h3> 

		<h4 class="text-center top-space"> <i class="fa fa-briefcase"></i> 
			<i><?php echo 'Offre provenant de ' . $job_array[0]['name']; ?></i>
		</h4> <br> <br> <br>
		
		<?php 
			echo $job_array[0]['description']; 
		?><br>
	
		<h4 class="text-center top-space"> <a href="candidate-<?php echo $job_id ?>"><i class="fa fa-pencil-square-o"></i> Postuler </a>
		</h4>
	</div>
	<!-- /Offer -->

	<!-- Return path -->
	<div class="container">
        <h4 class="text-center top-space">
			<a href="recruit-<?php echo $job_id?>"><i class="fa fa-angle-double-left"></i>&nbsp &nbsp &nbspRetour aux offres</a>
		</h4> <br>
	</div>
	<!-- /News path -->


<?php $content = ob_get_clean();?>

<?php require 'template_front.php';?>