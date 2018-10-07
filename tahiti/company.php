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
        $ref_id[] = $row['ref_produit'];
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
                <h3><i class="fa fa-angle-right"></i> Company Page</h3>
                <div class="row mt">
                    <div class="col-md-4 mt" style="height:500px;">
                        <div class="content-panel">
                            <h4>Alerts</h4>
                            <p>All company alerts here</p>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-8 mt">
                        <div class="content-panel" style="height:500px;">
                            <div id="mapid" style="width: 100%; height: 100%;">
                            </div>
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
                var marker = L.marker([gps_lat[i], gps_long[i]]).addTo(mymap).bindPopup("<p><b>" + ref_id[i] + "</b></p>" + gps_lat[i] + " / " + gps_long[i]);
                group.addLayer(marker);
            }
            mymap.fitBounds(group.getBounds());
        

    </script>

    </body>
</html>
