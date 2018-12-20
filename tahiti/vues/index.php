<?php require('../controllers/index.php'); ?>

<?php $title = 'TAHITI - Accueil'; ?>

<?php ob_start();?>

	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">Bienvenue sur le nouveau site de TAHITI</h1>
				<p><br></p>
				<p><a class="btn btn-action btn-lg" role="button" href="#about">Plus d'infos</a> <a class="btn btn-default btn-lg"
					 role="button" href="#products">Notre produit</a></p>
			</div>
		</div>
	</header>
	<!-- /Header -->


	<!-- News -->
	<div class="container" id="news">
		<br> <br>
		<h2 class="text-center top-space">Dernière actualité</h2><br>
        <h4><i class="fa fa-send"></i>
            <?php echo $news[0]['title']; ?> 
		</h4> <br>
		<p class="text-muted">
			<?php 
				echo substr($news[0]['description'],0,200); 
				if (strlen($news[0]['description'])>200) {
					echo '...';
				}
			?> <br>
			<a href="news.php">Lire l'actualité</a>.
		</p>
	</div>
	<!-- /News -->

	<!-- About -->
	<div class="container" id="about">
		<br> <br>
		<h2 class="text-center top-space">TAHITI, qui sommes nous ?</h2>
		<p class="text-muted">
			TAHITI est une start-up créée par 5 jeunes ingénieurs de l'INSA Centre Val de Loire. <br><br>

			Au fur et à mesure de leur formation, tournée à la fois vers le développement informatique et l'instrumentation,
			ils se rendent compte de l'importance de la récupération de données pour les entreprises. Ce besoin pourraît cependant
			être bien mieux satisfait selon eux. <br><br>

			C'est ainsi qu'est créé TAHITI (Transfert Automate Html Intégration et Traitement de l'Information). Nous nous voulons
			résolument modernes dans les solutions que l'on peut apporter à chaque client, s'adapter à ses demandes et à ses capteurs.<br><br>

			Pour en savoir plus sur nos fondateurs, cliquez <a href="board.html">ici</a>.
		</p>
	</div>
	<!-- /About-->

	<!-- Products -->
	<div class="container" id="products">
		<br> <br>
		<h2 class="text-center top-space">Notre produit</h2>
		<p class="text-muted">
			Nous réalisons pour vous une solution complète de supervision de capteurs.<br><br>

			La connexion de l'ensemble de vos capteurs (pour gérer une température par exemple) est réalisée par notre structure. L'ensemble des
			données est rendue visible par le biais de notre site internet, en se connectant à votre compte. Vous avez ainsi accès à une interface
			moderne et dynamique, synthétisant le résultat de tous vos capteurs. Des alertes permettent de vous tenir informé des problèmes qu'il y a 
			pu avoir. Enfin, le téléchargement des données sous le format xls est possible. <br><br>

			En cas de problème, n'hésitez pas à contacter notre support. <br><br>
		</p>
	</div>
	<!-- /Products-->

	<!-- Contact -->
	<div class="container text-center container" id="about-us">
		<h2 class="text-center top-space">Nous contacter</h2>
		<br>
		<div class="contact" style="text-align:center;">
			<div class="form-group">
				<form id="contact-form" method="post" action="" onsubmit="return fieldtest()">
					<label>Votre nom (obligatoire)</label>
						<input type="text" name="name" class="form-control" placeholder="Votre nom" tabindex="1" onblur="verif(this)"><br>
					<label>Votre email (obligatoire)</label>
						<input type="text" name="email" class="form-control" placeholder="Votre adresse mail" tabindex="2" onblur="verif(this)"><br>
					<label>Sujet du mail (obligatoire)</label>
						<input type="text" name="subject" class="form-control" placeholder="Sujet du mail" tabindex="3" onblur="verif(this)"><br>
					<label>Votre message (obligatoire)</label>
						<textarea name="content" class="form-control" rows="5" placeholder="Votre message" tabindex="4" onblur="verif(this)"></textarea><br>
					<button class="btn btn-action btn-lg" type="submit" name="contact_submit" tabindex="5"><i class="fa fa-envelope"></i> Envoyer</button>
				</form>
			</div>
		</div> <!-- /row -->
	</div> <!-- /contact -->

	<!-- Modal -->
	<div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="Notification Mail" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Notification Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
	</div>

	<!-- JS SCRIPT -->
	<script type="text/javascript" language="javascript">

		window.onload = function(){
			var modal_content = '<?php echo $modal_content; ?>';
			if(modal_content != '') {
				$("#notification").modal()
				$(".modal-body").append(modal_content);
			}
		}


		function verif(champ){
			if(champ.value == "" || champ.value == "none")
			{
				champ.style.backgroundColor = 'rgba(255,0, 0, 0.65)';
				return false;
			}
			else
			{
				champ.style.backgroundColor = "#ffffff";
				return true;
			}
		}

		function fieldtest(){
			var form = document.getElementById("contact-form");
			var testOK = true;

			testOK &= verif(form.name);
			testOK &= verif(form.email);
			testOK &= verif(form.subject);
			testOK &= verif(form.content);

			if(testOK == false) {
				$("#notification").modal()
				$(".modal-body").append("Veuillez renseigner tous les champs obligatoires");

				return false;
			}
			else {
				return true;
			}
		}

	</script>


<?php $content = ob_get_clean();?>

<?php require 'template_front.php';?>