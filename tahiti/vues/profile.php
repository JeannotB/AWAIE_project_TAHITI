<?php require '../controllers/profile.php';?>

<!-- TITLE -->
<?php $title = "TAHITI - AWAIE -- Edit Profile";?>

<!-- CONTENT -->
<?php ob_start();?>

    <h3><i class="fa fa-angle-right"></i> Profile Page</h3>
    <div class="row mt">
        <div class="col-lg-3">
            <!--Vide pour centrer-->
        </div>
        <div class="col-lg-6">
            <div class="form-panel">
                <form class="form-horizontal style-form" method="post">
                    <div class="form-group">
                        <p class="centered"><a href="profile.php"><img src="../img/jeannot.jpg" class="img-circle" width="60"></a></p>
                        <h5 class="centered"><?php echo $profile['name']; ?></h5>
                        <p class="centered">Date d'inscription :                                                                 <?php echo date($profile['date_inscription']); ?></p>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-6 control-label">Name</label>
                        <div class="col-sm-6">
                            <div id="name" style="padding-top:7px;"><a href="#" onclick="transformIntoInput('name');"><?php echo $profile['name']; ?></a>
                                <input type="hidden" name="name" id="<?php echo $profile['name']; ?>" value="<?php echo $profile['name']; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-6 control-label">Email</label>
                        <div class="col-sm-6">
                            <div id="email" style="padding-top:7px;"><a href="#" onclick="transformIntoInput('email');"><?php echo $profile['email']; ?></a>
                                <input type="hidden" name="email" id="<?php echo $profile['email']; ?>" value="<?php echo $profile['email']; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="changepassword_div">
                        <div id="changepassword_clear">
                            <label class="col-sm-2 col-sm-6 control-label"></label>
                            <div class="col-sm-6">
                                <button id="changepassword_button" class="btn btn-theme" onclick="changePassword();">Change Password</button>
                            </div>
                        </div>
                    </div>
                    <h3>Entreprise</h3>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-6 control-label">Nom</label>
                        <div class="col-sm-6">
                            <div id="nom_company" style="padding-top:7px;"><a href="#" onclick="transformIntoInput('nom_company');"><?php echo $profile['nom_company']; ?></a>
                                <input type="hidden" name="nom_company" id="<?php echo $profile['nom_company']; ?>" value="<?php echo $profile['nom_company']; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-6 control-label">Adresse</label>
                        <div class="col-sm-6">
                            <div id="adresse_company" style="padding-top:7px;"><a href="#" onclick="transformIntoInput('adresse_company');"><?php echo $profile['adresse_company']; ?></a>
                                <input type="hidden" name="adresse_company" id="<?php echo $profile['adresse_company']; ?>" value="<?php echo $profile['adresse_company']; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-6 control-label">Telephone</label>
                        <div class="col-sm-6">
                            <div id="tel_company"><a href="#" onclick="transformIntoInput('tel_company');"><?php echo $profile['tel_company']; ?></a>
                                <input type="hidden" name="tel_company" id="<?php echo $profile['tel_company']; ?>" value="<?php echo $profile['tel_company']; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="password_div">
                        <div id="password_clear">
                            <label class="col-sm-2 col-sm-6 control-label"></label>
                            <div class="col-sm-6">
                                <button id="password_button" class="btn btn-theme" onclick="submitForm();">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var tab = [
            ['name', '<?php echo $profile['name'];?>'],
            ['email', '<?php echo $profile['email'];?>'],
            ['adresse_company', '<?php echo $profile['adresse_company'];?>'],
            ['tel_company', '<?php echo $profile['tel_company'];?>'],
            ['nom_company', '<?php echo $profile['nom_company'];?>'],
        ];

        function transformIntoInput(id) {
            var result;

            for(var i = 0; i < tab.length; i++){
                if(tab[i][0] == id){
                    result = tab[i][1];
                    break;
                }	
		    }

            var cible = document.getElementById(id);
            var newtag = document.createElement("input");
                newtag.setAttribute('type', 'text');
                newtag.setAttribute('name', id);
                newtag.setAttribute('id', id);
                newtag.setAttribute('value', result);
                newtag.setAttribute('class', 'form-control');

            cible.parentNode.replaceChild(newtag, cible);
            //document.getElementById(id).focus();
        }
        
        function changePassword() {
            var cible_change = document.getElementById("changepassword_clear");

            document.getElementById('changepassword_div').removeChild(cible_change);
            //create imput password
			document.getElementById('changepassword_div').innerHTML = 
			    "<label class='col-sm-2 col-sm-6 control-label'>Old Password</label><div class='col-sm-6'><input class='form-control' type='password' name='old_password' id='old_password' value='*************************' onclick=clearDefaultPassword('old_password')></div><br/><br/><br/>\
                <label class='col-sm-2 col-sm-6 control-label'>New Password</label><div class='col-sm-6'><input class='form-control' type='password' name='new_password' id='new_password' value='*************************' onclick=clearDefaultPassword('new_password')></div>";
            
                
        }

        function submitForm() {
            var cible = document.getElementById('password_clear');
            var parent = document.getElementById('password_div');

            parent.removeChild(cible);
            parent.innerHTML = 
                "<label class='col-sm-2 col-sm-6 control-label'>Password</label><div class='col-sm-6'><input class='form-control' type='password' name='password' id='password' value='*************************' onclick=clearDefaultPassword('password')></div><br/><br/><br/>\
                <label class='col-sm-2 col-sm-6 control-label'>Confirm Password</label><div class='col-sm-6'><input class='form-control' type='password' name='password_confirm' id='password_confirm' value='*************************' onclick=clearDefaultPassword('password_confirm')></div><br/><br/><br/>\
                <label class='col-sm-2 col-sm-6 control-label'></label><div class='col-sm-6'><button id='submit' type='submit' name='submit' class='btn btn-theme'>Submit</button></div>";
        }

        function clearDefaultPassword(id) {
            document.getElementById(id).value = null;
        }

    </script>

<?php $content = ob_get_clean();?>

<?php require 'template.php';?>