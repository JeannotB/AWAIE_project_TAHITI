<?php 
require '../controllers/news.php';
require ('../controllers/trad_date.php');
?>

<!-- TITLE -->
<?php $title = "TAHITI - Actualités";?>
<!-- CONTENT -->
<?php ob_start();?>

    <!-- Title page -->
    <div class="jumbotron top-space container">
		<h1 class="text-center top-space">Actualités</h1><br>
	</div>
	<!-- /Title page -->

	<!-- News -->
	<div class="container">
        <h2><i class="fa fa-send"></i>
            <?php echo $news_array[$news_id]['title']; ?> 
		</h2> <br>
		<h6><i class="fa fa-calendar"></i>
            <?php echo 'Actualité publiée le ' . trad_date($news_array[$news_id]['date']); ?> 
		</h6> <br>
		<?php echo $news_array[$news_id]['description']; ?><br>
	</div>
	<!-- /News -->

	<!-- News path -->
	<div class="container">
        <h2 class="text-center top-space">
			<a href="news-<?php echo $news_id_after ?>"><i class="fa fa-angle-double-left"></i></a>
			<a href="news-<?php echo $news_id_before ?>"><i class="fa fa-angle-double-right"></i></a>
		</h2> <br>
	</div>
	<!-- /News path -->

<?php $content = ob_get_clean();?>

<?php require 'template_front.php';?>	  	
