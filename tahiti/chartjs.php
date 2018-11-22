<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>DASHGUM - Bootstrap Admin Template</title>

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
            include "./assets/html/menu.php";
        ?>
        
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Chartjs Charts</h3>
                <!-- page start-->
                <div class="tab-pane" id="chartjs">
                    <div class="row mt">
                        <div class="col-lg-6">
                            <div class="content-panel">
                                <h4><i class="fa fa-angle-right"></i> Doughnut</h4>
                                <div class="panel-body text-center">
                                    <canvas id="doughnut" height="300" width="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="content-panel">
                                <h4><i class="fa fa-angle-right"></i> Line</h4>
                                <div class="panel-body text-center">
                                    <canvas id="line" height="300" width="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt">
                        <div class="col-lg-6">
                            <div class="content-panel">
                                <h4><i class="fa fa-angle-right"></i> Radar</h4>
                                <div class="panel-body text-center">
                                    <canvas id="radar" height="300" width="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="content-panel">
                                <h4><i class="fa fa-angle-right"></i> Polar Area</h4>
                                <div class="panel-body text-center">
                                    <canvas id="polarArea" height="300" width="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt">
                        <div class="col-lg-6">
                            <div class="content-panel">
                                <h4><i class="fa fa-angle-right"></i> Bar</h4>
                                <div class="panel-body text-center">
                                    <canvas id="bar" height="300" width="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="content-panel">
                                <h4><i class="fa fa-angle-right"></i> Pie</h4>
                                <div class="panel-body text-center">
                                    <canvas id="pie" height="300" width="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- page end-->
            </section>          
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
        <script src="assets/js/chartjs-conf.js"></script>
        
    <script>
        //custom select box

        $(function(){
            $('select.styled').customSelect();
        });

    </script>

    </body>
</html>
