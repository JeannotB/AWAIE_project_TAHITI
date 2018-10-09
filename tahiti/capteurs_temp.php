<?php
	session_start();
	
	//Need DataBase connection
    require './assets/php/db_connection.php';
    
    if(isset($_GET['sonde']))
        $sonde = $_GET['sonde'];
    else
        $sonde = null;

    //Get GPS
    $sql_get_gps = "SELECT * FROM produits WHERE ref_produit='".$sonde."'";
    $result = mysqli_query($sqlconnect, $sql_get_gps);
    while ($row = mysqli_fetch_assoc($result)) {
        $gps_lat = $row['GPS_lat'];
        $gps_long = $row['GPS_long'];
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>TAHITI - AWAIE -- Capteur</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
            
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

        <!-- Leaflet (Maps) CSS -->
        <link rel="stylesheet" href="assets/js/leaflet/leaflet.css" />

        
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
            <section class="wrapper site-min-height">
                <h3><i class="fa fa-map-marker"></i> Capteur de la sonde <?php echo $sonde;?></h3>
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
                                        if($sonde <> null)
                                        {
                                            $sql_get_temp = "SELECT * FROM capteur JOIN produits WHERE capteur.sonde_id=produits.id_produit AND produits.ref_produit='".$sonde."' ORDER BY capteur.date DESC";
                                            $result = mysqli_query($sqlconnect, $sql_get_temp);
                                            $temp = [];
                                            $date = [];
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                    echo "<td>".$row['date']."</td>";
                                                    echo "<td>".$row['temperature']."</td>";
                                                    $temp[] = $row['temperature'];
                                                    $date[] = $row['date'];
                                                echo "</tr>";
                                            }
                                        }
                                        

                                    ?>
                                </tbody>
                            </table>
                    </div><!--/content-panel -->
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
        <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


        <!--common script for all pages-->
        <script src="assets/js/common-scripts.js"></script>

        <!--script for this page-->
        <script src="assets/js/chart-master/Chart.js"></script>
        <script src="assets/js/leaflet/leaflet.js"></script>
        
    <script>
        //custom select box

            $(function(){
                $('select.styled').customSelect();
            });

        //Map
            var gps_lat = <?php echo json_encode($gps_lat); ?>;
            var gps_long = <?php echo json_encode($gps_long); ?>;
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
            var temp = <?php echo json_encode($temp); ?>;
            var date = <?php echo json_encode($date); ?>;
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

    </body>
</html>
