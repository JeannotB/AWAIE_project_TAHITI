<?php require '../controllers/dashboard_admin.php';?>

<!-- TITLE -->
<?php $title = "TAHITI - AWAIE -- Dashboard Admin";?>
<!-- CONTENT -->
<?php ob_start();?>
<div class="row">
    <div class="col-lg-9 main-chart">
        <?php
            $GPS = null;
            for ($j = 0; $j < count($data); $j++) {
        ?>
        <div class='content-panel' style='overflow: auto; margin-bottom:15px;'>

        <?php
            
                echo "<a href='dashboard.php?id_company=".password_hash($data[$j]['company_id'], PASSWORD_BCRYPT)."'><h3 style='margin-left:15px;'>" . $data[$j]['Nom'] . "</h3></a>";
                //loop display graph of all company's sensors
                for ($i = 0; $i < count($data[$j]['produit']); $i++) {
                    $produit = $data[$j]['produit'][$i];
                    $GPS['lat'][] = $produit['GPS_lat'];
                    $GPS['long'][] = $produit['GPS_long'];
                    $GPS['name'][] = $produit['ref_produit'];
                    $temp = [];
                    foreach ($produit['temp'] as $elem) {
                        $temp[] = $elem['temperature'];
                    }
                ?>
        <!-- WEATHER-4 PANEL -->
        <div class="col-lg-4 col-md-4 col-sm-4 mb" style="position: relative;">
            <a href="capteurs_temp.php?sonde=<?php echo md5($produit['id_produit']); ?>">
                <div class="weather-4 pn centered">
                    <i class="fa fa-thermometer-half"></i>
                    <?php if (isset($produit['temp'][0]['temperature'])) {echo "<h1>" . $produit['temp'][0]['temperature'] . " °C</h1>";}?>
                        <div class="row">
                            <?php echo "<h3 class='centered'>" . $produit['ref_produit'] . "</h3>"; ?><?php if (isset($produit['temp'][0]['date'])) {echo "<p class='centered'>" . $produit['temp'][0]['date'] . "</p>";}?>
                        </div>
                </div>

                <div class="darkblue-panel pn centered" style="position: absolute; top:0px; left:15px; right:15px; height: 100%; opacity: 0.2;">
                    <div class="chart mt" style="position: absolute; left:0px; top: 25%;">
                        <script>
                            var t =<?php echo json_encode($temp); ?>;
                                t = t.reverse();
                        </script>
                        <div id=<?php echo $produit['ref_produit'] . "graph"; ?> class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4">
                        </div>
                        <script>
                            document.getElementById("<?php echo $produit['ref_produit'] . 'graph'; ?>").setAttribute("data-data", "[" + t + "]");
                        </script>
                    </div>
                </div>
            </a>
        </div><!-- /col-md-4 -->

        <?php
            }
            ?>
        </div>
    <?php
        }
    ?>
    </div>

    <!-- **********************************************************************************************************************************************************
        RIGHT SIDEBAR CONTENT
        *********************************************************************************************************************************************************** -->

        <div class="col-lg-3 ds">
            <h3>Alertes</h3>
                <div class="desc" style="height: 400px;overflow-y: scroll;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Sonde</th>
                                <th>Date</th>
                                <th>Temp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($data_alerts as $item) {
                                    echo "<tr>";
                                    echo "<td><a href='capteurs_temp.php?sonde=" . md5($item['name']) . "'>" . $item['name'] . "</a></td>";
                                    echo "<td>" . $item['date'] . "</td>";
                                    echo "<td>" . $item['temp'] . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

            <h3>Carte</h3>
                <div class="desc">
                    <div class="content-panel" style="height:300px;">
                        <div id="mapid" style="width: 100%; height: 100%;">
                        </div>
                    </div>
                </div>

        </div><!-- /col-lg-3 -->
</div><!--/row -->
<script src="./js/jquery.sparkline.js"></script>
<script src="./js/sparkline-chart.js"></script>
<script src="./js/leaflet/leaflet.js"></script>

<script>
        function mean(a)
        {
            var j = 0;
            for (var i=0; i < a.length; i++) {
                j = j + parseFloat(a[i]);
            }
            return j / a.length;
        }

        //Map
        var gps_lat =                                           <?php echo json_encode($GPS['lat']); ?>;
        var gps_long =                                             <?php echo json_encode($GPS['long']); ?>;
        var ref_id =                                         <?php echo json_encode($GPS['name']); ?>;

        var lat_moy = mean(gps_lat);
        var long_moy = mean(gps_long);

        var mymap = L.map('mapid');

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiamVhbm5vdGI3NiIsImEiOiJjam14OHZxeW0xbDAxM3dvOHdqenB2ZzVyIn0.oDxCNXkYiY3BgZTIqZ89SA', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox.streets'
        }).addTo(mymap);
            //Marker
            var length = gps_lat.length;
            var group = new L.featureGroup();
            for (var i = 0; i < length; i++) {
                var marker = L.marker([gps_lat[i], gps_long[i]]).addTo(mymap).bindPopup("<p><a href='capteurs_temp.php?sonde="+ref_id[i]+"'><b>" + ref_id[i] + "</b></a></p>" + gps_lat[i] + " / " + gps_long[i]);
                group.addLayer(marker);
            }
            mymap.fitBounds(group.getBounds());


    </script>



<?php $content = ob_get_clean();?>

<?php require 'template.php';?>

