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

        <title>TAHITI - AWAIE -- Blank</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
            
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

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
                <h3><i class="fa fa-angle-right"></i> Lien Entreprise Utilisateur</h3>
                <div class="row mt">
                    <div class="col-lg-12">
                    <p>Place your content here.</p>
                    

             <div class="col-lg-3 ds">
             <h3>entreprises</h3>
             <div class="desc">
                 <table class="table table-hover">
                     <thead>
                         <tr>
                             <th>Temp</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                             $sql_get_temp = "SELECT * FROM `entreprise`";
                             $result = mysqli_query($sqlconnect, $sql_get_temp);
                             while ($row = mysqli_fetch_assoc($result)) {
                                 echo "<tr>";
                                 echo "<td>".$row['Nom']."</td>";
                             
                                 echo "</tr>";
                             }
                         ?>
                     </tbody>
                 </table>                        
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

    </script>

    </body>
</html>
