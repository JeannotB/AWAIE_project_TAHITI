<?php
	session_start();
	
	//Need DataBase connection
    require './assets/php/db_connection.php';
    
    //get all companies

    $company = array();

    $sql_get_company = "SELECT Nom,company_id FROM entreprise";
    $result = mysqli_query($sqlconnect, $sql_get_company);
    while ($row = mysqli_fetch_assoc($result)) {
        $company[] = array($row['company_id'], $row['Nom']);
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
                        
                        <?php
                            //Pour chaque entreprise
                            foreach($company as &$value)
                            {
                                
                                //Display pannel
                                echo "<div class='content-panel' style='overflow: auto; margin-bottom:15px;'>";
                                    echo "<a href='dashboard.php?id_company=".md5($value[1])."'><h3 style='margin-left:15px;'>".$value[1]."</a></h3>";

                                    //get all sensor of the company
                                    $sql_get_sensor = "SELECT ref_produit FROM produits WHERE id_entreprise=$value[0]";
                                    $result = mysqli_query($sqlconnect, $sql_get_sensor);
                                    $produit_ref = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $produit_ref[] = $row['ref_produit'];
                                    }
                                    
                                    //display each sensor
                                    foreach($produit_ref as &$sensor)
                                    {
                                        //get temp
                                        $temp = [];
                                        $date = [];
                                        $sql_get_temp_graph = "SELECT temperature,date FROM capteur JOIN produits WHERE capteur.sonde_id=produits.id_produit AND produits.ref_produit = '".$sensor."' ORDER BY capteur.date DESC LIMIT 12";
                                        $result = mysqli_query($sqlconnect, $sql_get_temp_graph);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $temp[] = $row['temperature'];
                                            $date[] = $row['date'];
                                        }

                                        ?>
                                            <!-- WEATHER-4 PANEL -->
                                            <div class="col-lg-4 col-md-4 col-sm-4 mb" style="position: relative;">
                                                <a href="capteurs_temp.php?sonde=<?php echo md5($sensor);?>">
                                                <div class="weather-4 pn centered">
                                                    <i class="fa fa-thermometer-half"></i>
                                                    <?php if(isset($temp[0])){echo "<h1>".$temp[0]." °C</h1>";}?>
                                                        <div class="row">
                                                                <?php echo "<h3 class='centered'>".$sensor."</h3>";?>
                                                                <?php if(isset($temp[0])){echo "<p class='centered'>".$date[0]."</p>";}?>
                                                        </div>
                                                </div>
                                                
                                                <div class="darkblue-panel pn centered" style="position: absolute; top:0px; left:15px; right:15px; height: 100%; opacity: 0.2;">
                                                    <div class="chart mt" style="position: absolute; left:0px; top: 25%;">
                                                        <script>
                                                            var t = <?php echo json_encode($temp);?>;
                                                            t = t.reverse();
                                                        </script>
                                                        <div id=<?php echo $sensor."graph"; ?> class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4">
                                                        </div>
                                                        <script>
                                                            document.getElementById("<?php echo $sensor.'graph';?>").setAttribute("data-data", "[" + t + "]");
                                                        </script>
                                                    </div>
                                                </div>
                                                </a>
                                            </div><!-- /col-md-4 -->
                                        <?php
                                    }
                                echo "</div>";
                            }
                        ?>
                    </div>
    <!-- **********************************************************************************************************************************************************
        RIGHT SIDEBAR CONTENT
        *********************************************************************************************************************************************************** -->                  
                    
                    <div class="col-lg-3 ds">
                        <h3>Alertes</h3>
                        <div class="desc">
                            <table class="table table-hover" style="height: 800px;overflow-y: scroll;display: block;">
                                <thead>
                                    <tr>
                                        <th>Sonde</th>
                                        <th>Date</th>
                                        <th>Temp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql_get_temp = "SELECT * FROM alertes JOIN produits, entreprise WHERE alertes.sonde_id=produits.id_produit AND produits.id_entreprise=entreprise.company_id AND alertes.is_display=1 ORDER BY time DESC";
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
               

    </script>

    </body>
</html>
