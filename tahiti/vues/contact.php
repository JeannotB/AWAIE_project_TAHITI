<?php require '../controllers/contact.php';?>

<!-- TITLE -->
<?php $title = "TAHITI - AWAIE -- Contact";?>
<!-- CONTENT -->
<?php ob_start();?>
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Help form</h4>
                <form id="contact-form" class="form-horizontal style-form" method="POST" action='testmail.php'>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input id="name" type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Telephone</label>
                        <div class="col-sm-10">
                            <input id="phone" type="text" name="phone" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input id="email" type="text"  class="form-control" name="email" placeholder="example@email.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Subject</label>
                        <div class="col-sm-10">
                            <input id="subject" type="text" name="subject" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Message (max 1000 caractères)</label>
                        <div class="col-sm-10">
                            <textarea id="content" type="text" name="content" maxlength="1000" cols="25" rows="6" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="submit" class="btn btn-theme" data-toggle="modal" data-target="#notification" name='submit'>Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Titre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">OK</button>
                </div>
            </div>
        </div>
    </div>   

    <script>
        window.onload = function(){
			var modal_content = '<?php echo $modal_content; ?>';
			if(modal_content != '') {
				$("#notification").modal()
				$(".modal-body").append(modal_content);
            }
            document.getElementById("name").value = '<?php echo $prefill["name"]; ?>';
            document.getElementById("email").value = '<?php echo $prefill["email"]; ?>';
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
            testOK &= verif(form.phone);
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

<?php require 'template.php';?>

