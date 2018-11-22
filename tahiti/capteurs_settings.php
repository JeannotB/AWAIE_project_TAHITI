<?php
	session_start();
	
	//Need DataBase connection
	require './assets/php/db_connection.php';

    //Structure
    $sonde_info = [
        'name' => "",
        'GPS_lat' => "",
        'GPS_long' => "",
        'alerte_sup' => "",
        'alerte_inf' => "",
    ];
    $error = "";

    //get sonde id
    if(isset($_GET['sonde']))
    {
        $sonde_id = $_GET['sonde'];

        //Code de validation des nouveaux paramètres de la sonde
        if(isset($_POST['submit']))
        {
                $sonde_info['name'] = $_POST['name'];
                $sonde_info['GPS_lat'] = $_POST['gps_lat'];
                $sonde_info['GPS_long'] = $_POST['gps_long'];
                $sonde_info['alerte_sup'] = $_POST['alerte_sup'];
                $sonde_info['alerte_inf'] = $_POST['alerte_inf'];

                //unique ref_produit
                $sql_get_ref_produit = 'SELECT ref_produit FROM produits';
                $result = mysqli_query($sqlconnect, $sql_get_ref_produit);
                while ($row = mysqli_fetch_assoc($result)) {
                    if($sonde_info['name'] == $row['ref_produit'])
                    {
                        $error = "Name already exists, must be unique";
                        break;
                    }
                }

                //change member parameters
                $sql_update_produits = "UPDATE produits SET ref_produit = '".$sonde_info['name']."',
                                                        GPS_lat = '".$sonde_info['GPS_lat']."',
                                                        GPS_long = '".$sonde_info['GPS_long']."',
                                                        alerte_sup = '".$sonde_info['alerte_sup']."',
                                                        alerte_inf = '".$sonde_info['alerte_inf']."'
                                                    WHERE md5(ref_produit) = '".$sonde_id."'";
                if(mysqli_query($sqlconnect, $sql_update_produits))
                {
                    $error = "Settings changed";
                    $path = "capteurs_settings.php?sonde=".md5($sonde_info['name']);
                    header('Location: '.$path.'');
                }
                else
                    $error = "Error: " . $sql_update_produits . " " . mysqli_error($sqlconnect);
        }

        $sql_get_sonde_info = "SELECT * FROM produits WHERE md5(ref_produit)='".$sonde_id."'";
        $result = mysqli_query($sqlconnect, $sql_get_sonde_info);
        while ($row = mysqli_fetch_assoc($result)) {
            $sonde_info['name'] = $row['ref_produit'];
            $sonde_info['GPS_lat'] = $row['GPS_lat'];
            $sonde_info['GPS_long'] = $row['GPS_long'];
            $sonde_info['alerte_sup'] = $row['alerte_sup'];
            $sonde_info['alerte_inf'] = $row['alerte_inf'];
        }
    }
    else
    {
        $error = "Invalid sensor id";
    }

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>TAHITI - AWAIE -- Sensor Settings</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
            
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

        <!-- Leaflet (Maps) CSS -->
        <link rel="stylesheet" href="assets/js/leaflet/leaflet.css" />

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
        <?php echo $error; ?>
        <section id="main-content">
            <section class="wrapper site-min-height">
                <h3><i class="fa fa-angle-right"></i> Sensor Settings Page</h3>
                <div class="row mt">
                    <div class="col-lg-3">
                        <!--Vide pour centrer-->
                    </div>
                    <div class="col-lg-6">
                        <div class="form-panel">
                            <form class="form-horizontal style-form" method="post">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-6 control-label">Name</label>
                                    <div class="col-sm-6">
                                        <div id="name" style="padding-top:7px;"><a href="#" onclick="transformIntoInput('name');"><?php echo $sonde_info['name'];?></a>
                                            <input type="hidden" name="name" id="<?php echo $sonde_info['name'];?>" value="<?php echo $sonde_info['name'];?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-6 control-label">GPS</label>
                                    <div class="col-sm-6">
                                        <div id="gps" style="padding-top:7px;">
                                            <div id="gps_map">
                                                <p>
                                                    <?php echo "Latitude : ".$sonde_info['GPS_lat']."<br/>"."Longitude : ".$sonde_info['GPS_long']."<br/>"; ?>
                                                </p>
                                                <a href="#" onclick="transformMap('gps_map');">Modifier GPS</a>
                                            </div>
                                            <input type="hidden" name="gps_lat" id="gps_lat" value="<?php echo $sonde_info['GPS_lat'];?>" />
                                            <input type="hidden" name="gps_long" id="gps_long" value="<?php echo $sonde_info['GPS_long'];?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-6 control-label">Alerte inf</label>
                                    <div class="col-sm-6">
                                        <div id="alerte_inf" style="padding-top:7px;"><a href="#" onclick="transformIntoInput('alerte_inf');"><?php echo $sonde_info['alerte_inf'];?></a>
                                            <input type="hidden" name="alerte_inf" id="<?php echo $sonde_info['alerte_inf'];?>" value="<?php echo $sonde_info['alerte_inf'];?>" />
                                        </div>
                                    </div>
                                    <br/>
                                    <br/>
                                    <label class="col-sm-2 col-sm-6 control-label">Alerte sup</label>
                                    <div class="col-sm-6">
                                        <div id="alerte_sup" style="padding-top:7px;"><a href="#" onclick="transformIntoInput('alerte_sup');"><?php echo $sonde_info['alerte_sup'];?></a>
                                            <input type="hidden" name="alerte_sup" id="<?php echo $sonde_info['alerte_sup'];?>" value="<?php echo $sonde_info['alerte_sup'];?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-sm-2 col-sm-6 control-label'></label>
                                    <div class='col-sm-6'>
                                        <button id='submit' type='submit' name='submit' class='btn btn-theme'>Submit</button>
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
        <script src="assets/js/leaflet/leaflet.js"></script>
        
    <script type="text/javascript">
        //custom select box

        $(function(){
            $('select.styled').customSelect();
        });

        var tab = [
            ['name', '<?php echo $sonde_info['name'];?>'],
            ['gps_lat', '<?php echo $sonde_info['GPS_lat'];?>'],
            ['gps_long', '<?php echo $sonde_info['GPS_long'];?>'],
            ['alerte_sup', '<?php echo $sonde_info['alerte_sup'];?>'],
            ['alerte_inf', '<?php echo $sonde_info['alerte_inf'];?>'],
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

        function transformMap(id) {
            //define new div
            var cible = document.getElementById(id);
            var newtag_div_principal = document.createElement("div")
                newtag_div_principal.setAttribute('class', 'content-panel');
                newtag_div_principal.setAttribute('style', 'width: 300px; height: 300px;');
            var newtag_div_secondaire = document.createElement("div");
                newtag_div_secondaire.setAttribute('id', 'map_gps');
                newtag_div_secondaire.setAttribute('style', 'width: 100%; height: 100%;');
            
            cible.parentNode.replaceChild(newtag_div_principal, cible);
            newtag_div_principal.appendChild(newtag_div_secondaire);

            //Add map
            var gps_lat = tab[1][1];
            var gps_long = tab[2][1];
            var mymap = L.map('map_gps').setView([gps_lat, gps_long], 22);

            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiamVhbm5vdGI3NiIsImEiOiJjam14OHZxeW0xbDAxM3dvOHdqenB2ZzVyIn0.oDxCNXkYiY3BgZTIqZ89SA', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox.streets'
            }).addTo(mymap);
                //Marker
            var marker = L.marker([gps_lat, gps_long]).addTo(mymap);

            function onMapClick(e) {
                marker.setLatLng(e.latlng);

                document.getElementById("gps_lat").setAttribute('value', e.latlng.lat);
                document.getElementById("gps_long").setAttribute('value', e.latlng.lng);

            }

            mymap.on('click', onMapClick);
        };
    </script>

    </body>
</html>
