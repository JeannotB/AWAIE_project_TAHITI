<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<meta http-equiv="refresh" content="30">-->
        
        <title><?php echo $title; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="./css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="./font-awesome/css/font-awesome.css" rel="stylesheet" />

        <!-- Custom styles for this template -->
        <link href="./css/style.css" rel="stylesheet">
        <link href="./css/style-responsive.css" rel="stylesheet">
        <link href="./css/table-responsive.css" rel="stylesheet">
        <!-- Leaflet (Maps) CSS -->
        <link rel="stylesheet" href="./js/leaflet/leaflet.css" />


		<!--- Icon -->
        <link rel="icon" type="image/png" href="../img/icon.png" />
        


        <!-- JavaScript -->
        <script src="./js/jquery.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="./js/jquery.ui.touch-punch.min.js"></script>
        <script class="include" type="text/javascript" src="./js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="./js/jquery.nicescroll.js" type="text/javascript"></script>
        
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

    <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="dashboard.php" class="logo">
            </a>
            <!--logo end-->
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../controllers/logout.php">Logout</a></li>
                </ul>
            </div>
        </header>
    <!--header end-->

        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar"  class="nav-collapse ">
                <!-- sidebar menu start-->
                    <ul class="sidebar-menu" id="nav-accordion">
                        <?php
                            $name = 'Username';
                            //display name and logo
                            if (isset($_SESSION['username'])) {
                                $name = $_SESSION['username'];
                            }

                        ?>
                        <p class="centered"><a href="profile.php"><img src="../img/icon.png" class="img-circle" width="60"></a></p>
                        <h5 class="centered"><?php echo $name; ?></h5>

                        <?php
                            $admin = false;
                            if (isset($_SESSION['admin'])) {
                                $admin = $_SESSION['admin'];
                            }

                            if (password_verify('1',$admin)) {
                        ?>
                        <li class="sub-menu">
                            <a href="dashboard_admin.php">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard ADMIN</span>
                            </a>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;" >
                                <i class="fa fa-pencil-square-o "></i>
                                <span>Site Administration</span>
                            </a>
                            <ul class="sub">
                                <li><a href="news_administration.php">News Admin</a></li>
                                <li><a href="recruit_administration.php">Recuit Admin</a></li>
                            </ul>
                        </li>
                        <?php
                            }
                            else{
                        ?>
                        
                        <li class="mt">
                            <?php
                                //get company id
                                $company_path = 'dashboard.php';
                                if (isset($_SESSION['id_company'])) {
                                    $company_path = "dashboard.php?id_company=" . $_SESSION['id_company'];
                                }
                            ?>
                            <a href=<?php echo '"' . $company_path . '"'; ?>>
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <?php
                            }
                        ?>
                        <li class="sub-menu">
                            <a href="contact.php">
                                <i class="fa fa-question-circle"></i>
                                <span>Contact</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="../" target="_blank">
                                <i class="fa fa-sign-out"></i>
                                <span>Retour au site</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                              <a href="../controllers/logout.php">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Logout</span>
                              </a>
                        </li>

                  </ul>
                  <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->

        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <?php
                    echo $content;
                ?>
            </section><!-- /wrapper -->
        </section><!-- /MAIN CONTENT -->

        <!--main content end-->
        <!--footer-->
            <!--footer start-->
            <footer class="site-footer">
                <div class="text-center">
                    2018 - AWAIE Projects, Tahiti Team, TAHITI.io
                    <a href="#" class="go-top">
                        <i class="fa fa-angle-up"></i>
                     </a>
                </div>
            </footer>
        <!--footer end-->
    </section>
    
    <!-- JavaScript -->
        <script src="./js/jquery.scrollTo.min.js"></script>
        <script src="./js/common-scripts.js"></script>
    
    </body>
</html>
