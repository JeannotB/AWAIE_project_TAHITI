<?php
	session_start();
	
	//Need DataBase connection
    require './assets/php/db_connection.php';
    
    //get company id
    if(isset($_GET['id_company']))
        $company_id = $_GET['id_company'];
    else
        $company_id = 1;
    //Get All captors GPS
    $gps_lat = [];
    $gps_long = [];
    $ref_id = [];
    $sql_get_gps = "SELECT * FROM produits WHERE id_entreprise=$company_id";
    $result = mysqli_query($sqlconnect, $sql_get_gps);
    while ($row = mysqli_fetch_assoc($result)) {
        $gps_lat[] = $row['GPS_lat'];
        $gps_long[] = $row['GPS_long'];
        $ref_id[] = md5($row['ref_produit']);
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>TAHITI - AWAIE -- Company</title>

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
            include "./assets/html/menu.html";
        ?>
        
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-9 main-chart">                  
                            <!--loop display graph of all company's sensors -->
                            <!-- CHOICE 2 -->
                                <?php
                                    for($i=0; $i < count($ref_id); $i++) {
                                        $sql_get_temp_graph2 = "SELECT temperature,date,ref_produit FROM capteur JOIN produits WHERE capteur.sonde_id=produits.id_produit AND md5(produits.ref_produit)='".$ref_id[$i]."' ORDER BY capteur.date DESC LIMIT 12";
                                        $result = mysqli_query($sqlconnect, $sql_get_temp_graph2);
                                        $donnees_temp = [];
                                        $donnees_date = [];
                                        $sensor_name= [];
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $donnees_temp[] = $row['temperature'];
                                            $donnees_date[] = $row['date'];
                                            $sensor_name[] = $row['ref_produit'];
                                        }
                                ?>
                                        <!-- WEATHER-4 PANEL -->
                                        <div class="col-lg-4 col-md-4 col-sm-4 mb" style="position: relative;">
                                            <a href="capteurs_temp.php?sonde=<?php echo $ref_id[$i];?>">
                                            <div class="weather-4 pn centered">
                                                <i class="fa fa-thermometer-half"></i>
                                                <?php if(isset($donnees_temp[0])){echo "<h1>".$donnees_temp[0]." °C</h1>";}?>
                                                    <div class="row">
                                                            <?php echo "<h3 class='centered'>".$sensor_name[0]."</h3>";?>
                                                            <?php if(isset($donnees_temp[0])){echo "<p class='centered'>".$donnees_date[0]."</p>";}?>
                                                    </div>
                                            </div>
                                            
                                            <div class="darkblue-panel pn centered" style="position: absolute; top:0px; left:15px; right:15px; height: 100%; opacity: 0.2;">
                                                <div class="chart mt" style="position: absolute; left:0px; top: 25%;">
                                <script>
                                    var t = <?php echo json_encode($donnees_temp);?>;
                                    t = t.reverse();
                                </script>
                                                    <div id=<?php echo $ref_id[$i]."graph"; ?> class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4">
                                                    </div>
                                <script>
                                    document.getElementById("<?php echo $ref_id[$i].'graph';?>").setAttribute("data-data", "[" + t + "]");
                                </script>
                                                </div>
                                            </div>
                                            </a>
                                        </div><!-- /col-md-4 -->

                                <?php
                                    }
                                ?>
                    </div>
    <!-- **********************************************************************************************************************************************************
        RIGHT SIDEBAR CONTENT
        *********************************************************************************************************************************************************** -->                  
                    
                    <div class="col-lg-3 ds">
                        <h3>Alertes</h3>
                        <div class="desc">
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
                                        $sql_get_temp = "SELECT * FROM alertes JOIN produits, entreprise WHERE alertes.sonde_id=produits.id_produit AND produits.id_entreprise=entreprise.company_id AND entreprise.company_id=$company_id AND alertes.is_display=1 ORDER BY time DESC LIMIT 5";
                                        $result = mysqli_query($sqlconnect, $sql_get_temp);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td><a href='capteurs_temp.php?sonde=".md5($row['ref_produit'])."'>".$row['ref_produit']."</a></td>";
                                            echo "<td>".$row['time']."</td>";
                                            echo "<td>".$row['temp']."</td>";
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
            </section>
        </section>
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
        <script src="assets/js/jquery.sparkline.js"></script>


        <!--common script for all pages-->
        <script src="assets/js/common-scripts.js"></script>

        <!--script for this page-->
        <script src="assets/js/leaflet/leaflet.js"></script>
        <script src="assets/js/sparkline-chart.js"></script>

    <script>
        //custom select box

        $(function(){
            $('select.styled').customSelect();
        });
        
        function mean(a)
        {
            var j = 0;
            for (var i=0; i < a.length; i++) {
                j = j + parseFloat(a[i]);
            }
            return j / a.length;
        }

        //Map
        var gps_lat = <?php echo json_encode($gps_lat); ?>;
        var gps_long = <?php echo json_encode($gps_long); ?>;
        var ref_id = <?php echo json_encode($ref_id); ?>;
        
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

    </body>
</html>
