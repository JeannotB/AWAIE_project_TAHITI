<?php require '../controllers/capteurs_temp.php';?>

<!-- TITLE -->
<?php $title = "TAHITI - AWAIE -- Capteur";?>
<!-- CONTENT -->
<?php ob_start();?>
    <h3><i class="fa fa-map-marker"></i> Capteur de la sonde <?php echo $sonde_name; ?></h3>
    <p>
        <a href=<?php echo 'capteurs_settings.php?sonde=' . $sonde_id; ?>><i class="fa fa-cog"></i> Settings</a> <br/>
        <a href="../controllers/excel_file.php?sonde=<?php echo $sonde_id; ?>&filename=<?php echo $sonde_name; ?>">[Download Temperature]</a>
    </p>

    <div class="row mt">
        <div class="col-md-4 mt">
            <div class="content-panel" style="height: 395.083px;">
                <div id="mapid" style="width: 100%; height: 100%;">
                </div>
            </div>
        </div>
        <div class="col-md-8 mt">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Graph</h4>
                    <div class="tab-pane" id="chartjs">
                        <div class="panel-body text-center" >
                            <canvas id="line" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt">
                <div class="content-panel" style="display: block; height: 395.083px; overflow-y: scroll;">
                    <table class="table table-hover">
                        <h4><i class="fa fa-angle-right"></i> Temperature</h4>
                        <hr>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Temp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                for($i = 0; $i < count($temp['temperature']); $i++) {
                                    echo "<tr>";
                                    echo "<td>" . $temp['date'][$i] . "</td>";
                                    echo "<td>" . $temp['temperature'][$i] . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div><!--/content-panel -->
            </div>
        </div>
    </div>

    <script src="./js/chart-master/Chart.js"></script>
    <script src="./js/leaflet/leaflet.js"></script>

    <script>
        //Map
            var gps_lat = <?php echo json_encode($GPS['lat']); ?>;
            var gps_long = <?php echo json_encode($GPS['long']); ?>;
            var mymap = L.map('mapid').setView([gps_lat, gps_long], 22);

            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiamVhbm5vdGI3NiIsImEiOiJjam14OHZxeW0xbDAxM3dvOHdqenB2ZzVyIn0.oDxCNXkYiY3BgZTIqZ89SA', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox.streets'
            }).addTo(mymap);
                //Marker
            var marker = L.marker([gps_lat, gps_long]).addTo(mymap);

        //Graph
            var temp = <?php echo json_encode($temp['temperature']); ?>;
            var date = <?php echo json_encode($temp['date']); ?>;
            temp = temp.slice(0, 20).reverse();
            date = date.slice(0, 20).reverse();
            var lineChartData = {
                labels : date,
                datasets : [

                    {
                        fillColor : "rgba(151,187,205,0.5)",
                        strokeColor : "rgba(151,187,205,1)",
                        pointColor : "rgba(151,187,205,1)",
                        pointStrokeColor : "#fff",
                        data : temp,
                    }
                ],

            };

            var canvas = document.getElementById("line");
            canvas.width = $("#chartjs").width();

            new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);

    </script>


<?php $content = ob_get_clean();?>

<?php require 'template.php';?>