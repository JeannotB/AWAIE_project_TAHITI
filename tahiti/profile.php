<?php
	session_start();
	
	//Need DataBase connection
	require './assets/php/db_connection.php';

    //Structure
    $profile = [
        'name' => "",
        'email' => "",
        'date_inscription' => "",
        'adresse_company' => "",
        'tel_company' => "",
        'nom_company' => "",
        'logo_company' => "",
    ];
    $error = "";
    $id = $_SESSION['user_id'];

    //Code de validation des nouveaux paramètres du compte
    if(isset($_POST['submit']))
    {
        //check password
        if(isset($_POST['old_password']) && isset($_POST['new_password']))
        {
            //change-Update password
        }


        if(isset($_POST['password']) && isset($_POST['password_confirm']))
        {
            $sql_get_password = "SELECT password FROM members WHERE member_id=$id";
            $result = mysqli_query($sqlconnect, $sql_get_password);
            $row = mysqli_fetch_assoc($result);

            if(md5(htmlspecialchars($_POST['password'])) == md5(htmlspecialchars($_POST['password_confirm'])) && md5(htmlspecialchars($_POST['password'])) == $row['password'])
            {
                $profile['name'] = $_POST['name'];
                $profile['email'] = $_POST['email'];
                $profile['adresse_company'] = $_POST['adresse_company'];
                $profile['tel_company'] = $_POST['tel_company'];
                $profile['nom_company'] = $_POST['nom_company'];
                //$profile['logo_company'] = $row['logo'];

                //change member parameters
                $sql_update_member = "UPDATE members SET name = '".$profile['name']."',
                                                        email = '".$profile['email']."'
                                                WHERE member_id = $id";

				if(mysqli_query($sqlconnect, $sql_update_member))
					$error = "Parameters changed";
				else
                    $error = "Error: " . $sql_update_member . " " . mysqli_error($sqlconnect);
                    
            }
            else
            {
                $error = "Password must be identical or didn't correspond";
            }
        }
    }

    $sql_get_profile = "SELECT * FROM members JOIN entreprise WHERE members.id_company=entreprise.company_id AND member_id=$id";
    $result = mysqli_query($sqlconnect, $sql_get_profile);
    while ($row = mysqli_fetch_assoc($result)) {
        $profile['name'] = $row['name'];
        $profile['email'] = $row['email'];
        $date = new DateTime($row['date_inscription']);
        $profile['date_inscription'] = $date->format('d-m-Y');
        $profile['adresse_company'] = $row['Adresse'];
        $profile['tel_company'] = $row['Tel'];
        $profile['nom_company'] = $row['Nom'];
        $profile['logo_company'] = $row['logo'];
    }


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>TAHITI - AWAIE -- Profile</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
            
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

        <!--- Icon -->
        <link rel="icon" type="image/png" href="assets/img/icon.png" />

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

    <section id="container" >
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        
        <?php
            include "./assets/html/header.html";
        ?>
        
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <?php
            include "./assets/html/menu.php";
        ?>
        
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <h3><i class="fa fa-angle-right"></i> Profile Page</h3>
                <div class="row mt">
                    <div class="col-lg-3">
                        <!--Vide pour centrer-->
                    </div>
                    <div class="col-lg-6">
                        <div class="form-panel">
                            <form class="form-horizontal style-form" method="post">
                                <div class="form-group">
                                    <p class="centered"><a href="profile.php"><img src="assets/img/jeannot.jpg" class="img-circle" width="60"></a></p>
                                    <h5 class="centered"><?php echo $profile['name'];?></h5>
                                    <p class="centered">Date d'inscription : <?php echo date($profile['date_inscription']);?></p>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-6 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <div id="name" style="padding-top:7px;"><a href="#" onclick="transformIntoInput('name');"><?php echo $profile['name'];?></a>
                                            <input type="hidden" name="name" id="<?php echo $profile['name'];?>" value="<?php echo $profile['name'];?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-6 control-label">Email</label>
                                    <div class="col-sm-6">
                                        <div id="email" style="padding-top:7px;"><a href="#" onclick="transformIntoInput('email');"><?php echo $profile['email'];?></a>
                                            <input type="hidden" name="email" id="<?php echo $profile['email'];?>" value="<?php echo $profile['email'];?>" />
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
                                        <div id="nom_company" style="padding-top:7px;"><a href="#" onclick="transformIntoInput('nom_company');"><?php echo $profile['nom_company'];?></a>
                                            <input type="hidden" name="nom_company" id="<?php echo $profile['nom_company'];?>" value="<?php echo $profile['nom_company'];?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-6 control-label">Adresse</label>
                                    <div class="col-sm-6">
                                        <div id="adresse_company" style="padding-top:7px;"><a href="#" onclick="transformIntoInput('adresse_company');"><?php echo $profile['adresse_company'];?></a>
                                            <input type="hidden" name="adresse_company" id="<?php echo $profile['adresse_company'];?>" value="<?php echo $profile['adresse_company'];?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-6 control-label">Telephone</label>
                                    <div class="col-sm-6">
                                        <div id="tel_company"><a href="#" onclick="transformIntoInput('tel_company');"><?php echo $profile['tel_company'];?></a>
                                            <input type="hidden" name="tel_company" id="<?php echo $profile['tel_company'];?>" value="<?php echo $profile['tel_company'];?>" />
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
                
            </section><!-- /wrapper -->
        </section><!-- /MAIN CONTENT -->

        <!--main content end-->
        <!--footer-->
        <?php
            include "./assets/html/footer.html";
        ?>
    </section>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


        <!--common script for all pages-->
        <script src="assets/js/common-scripts.js"></script>

        <!--script for this page-->
        
    <script>
        //custom select box

        $(function(){
            $('select.styled').customSelect();
        });

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

    </body>
</html>
