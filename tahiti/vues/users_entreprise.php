<?php require '../controllers/users_entreprise.php';?>

<!-- TITLE -->
<?php $title = "TAHITI - AWAIE -- Dashboard Admin";?>
<!-- CONTENT -->
<?php ob_start();?>

<!-- **********************************************************************************************************************************************************
        RIGHT SIDEBAR CONTENT
        *********************************************************************************************************************************************************** -->

<div class="col-lg-4 ds">
    <h3>Entreprise</h3>
    <div class="desc" style="height: inherit;">
        <table class="table">
            <thead>
                <tr>
                    <th>Entreprise</th>
                    <th>Tel</th>
                    <th>Adresse</th>
                </tr>
            </thead>
            <tbody>
                <?php
                                foreach ($entreprise as $item) {
                                    echo "<tr>";
                                    echo "<td>" . $item['Nom'] . "</td>";
                                    echo "<td>" . $item['Tel'] . "</td>";
                                    echo "<td>" . $item['Adresse'] . "</td>";
                                    echo "</tr>";
                                }
                            ?>
            </tbody>
        </table>
    </div>
</div><!-- /col-lg-3 -->
<div class="col-lg-offset-2 col-lg-4 ds">
    <h3>Members</h3>
    <div class="desc" style="height: inherit;">
        <table class="table ">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Email</th>
                    <th>Entreprise</th>
                </tr>
            </thead>
            <tbody>
                <?php
                                foreach ($members as $item) {
                                    echo "<tr>";
                                    echo "<td>" . $item['name'] . "</td>";
                                    echo "<td>" . $item['email'] . "</td>";
                                    echo "<td>" . $item['id_company'] . "</td>";
                                    echo "</tr>";
                                }
                            ?>
            </tbody>
        </table>
    </div>
</div><!-- /col-lg-3 -->

<div>
    <button class="button">Hello World</button>
</div>
<!--/row -->
<script src="./js/jquery.sparkline.js"></script>
<script src="./js/sparkline-chart.js"></script>
<script src="./js/leaflet/leaflet.js"></script>

<script>
    function mean(a) {
        var j = 0;
        for (var i = 0; i < a.length; i++) {
            j = j + parseFloat(a[i]);
        }
        return j / a.length;
    }

    //Map
    var gps_lat = <?php echo json_encode($GPS['lat']); ?>;
    var gps_long = <?php echo json_encode($GPS['long']); ?>;
    var ref_id = <?php echo json_encode($GPS['name']); ?>;

    var lat_moy = mean(gps_lat);
    var long_moy = mean(gps_long);

    var mymap = L.map('mapid');

    L.tileLayer(
        'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiamVhbm5vdGI3NiIsImEiOiJjam14OHZxeW0xbDAxM3dvOHdqenB2ZzVyIn0.oDxCNXkYiY3BgZTIqZ89SA', {
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
        var marker = L.marker([gps_lat[i], gps_long[i]]).addTo(mymap).bindPopup("<p><a href='capteurs_temp.php?sonde=" +
            ref_id[i] + "'><b>" + ref_id[i] + "</b></a></p>" + gps_lat[i] + " / " + gps_long[i]);
        group.addLayer(marker);
    }
    mymap.fitBounds(group.getBounds());
</script>



<?php $content = ob_get_clean();?>

<?php require 'template.php';?>