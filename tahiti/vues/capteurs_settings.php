<?php require '../controllers/capteurs_settings.php';?>

<!-- TITLE -->
<?php $title = "TAHITI - AWAIE -- Capteur Settings";?>
<!-- CONTENT -->
<?php ob_start();?>
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
                            <div id="name" style="padding-top:7px;"><a href="#" onclick="transformIntoInput('name');"><?php echo $sonde_info['ref_produit']; ?></a>
                                <input type="hidden" name="name" id="<?php echo $sonde_info['ref_produit']; ?>" value="<?php echo $sonde_info['ref_produit']; ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-6 control-label">GPS</label>
                        <div class="col-sm-6">
                            <div id="gps" style="padding-top:7px;">
                                <div id="gps_map">
                                    <p>
                                        <?php echo "Latitude : " . $sonde_info['GPS_lat'] . "<br/>" . "Longitude : " . $sonde_info['GPS_long'] . "<br/>"; ?>
                                    </p>
                                    <a href="#" onclick="transformMap('gps_map');">Modifier GPS</a>
                                </div>
                                <input type="hidden" name="gps_lat" id="gps_lat" value="<?php echo $sonde_info['GPS_lat']; ?>" />
                                <input type="hidden" name="gps_long" id="gps_long" value="<?php echo $sonde_info['GPS_long']; ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-6 control-label">Alerte inf</label>
                        <div class="col-sm-6">
                            <div id="alerte_inf" style="padding-top:7px;"><a href="#" onclick="transformIntoInput('alerte_inf');"><?php echo $sonde_info['alerte_inf']; ?></a>
                                <input type="hidden" name="alerte_inf" id="<?php echo $sonde_info['alerte_inf']; ?>" value="<?php echo $sonde_info['alerte_inf']; ?>" />
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <label class="col-sm-2 col-sm-6 control-label">Alerte sup</label>
                        <div class="col-sm-6">
                            <div id="alerte_sup" style="padding-top:7px;"><a href="#" onclick="transformIntoInput('alerte_sup');"><?php echo $sonde_info['alerte_sup']; ?></a>
                                <input type="hidden" name="alerte_sup" id="<?php echo $sonde_info['alerte_sup']; ?>" value="<?php echo $sonde_info['alerte_sup']; ?>" />
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

    <script src="./js/leaflet/leaflet.js"></script>
    <script>
    var tab = [
            ['name', '<?php echo $sonde_info['ref_produit'];?>'],
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
<?php $content = ob_get_clean();?>

<?php require 'template.php';?>