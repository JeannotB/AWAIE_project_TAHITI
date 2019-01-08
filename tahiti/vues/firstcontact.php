<?php require "testmail.php"; ?>

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
                <h3><i class="fa fa-angle-right"></i> Contact</h3>
                <!-- Form -->
                <div class="row mt">
                    <div class="col-lg-12">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Help form</h4>
                        <form class="form-horizontal style-form" method="POST" action='#'>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="first_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Surname</label>
                                <div class="col-sm-10">
                                    <input type="text" name="last_name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Telephone</label>
                                <div class="col-sm-10">
                                    <input type="text" name="telephone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text"  class="form-control" name="email" placeholder="example@email.com">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Subject</label>
                                <div class="col-sm-10">
                                    <input type="text" name="subject" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Message</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="message" maxlength="1000" cols="25" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-theme" name='submit'>Send</button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="notification" tabindex="-1" role="dialog" aria-labelledby="title" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="title">Votre Message...</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p><?php echo $result;?></p>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                        </form>
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
        <script src="assets/js/jquery.sparkline.js"></script>


        <!--common script for all pages-->
        <script src="assets/js/common-scripts.js"></script>


    <script>
        //modal scripts
        var affichageModal="<?php echo $result;?>";
        if (!!affichageModal)
        {
          $(document).ready(function(){
                  $("#notification").modal();
                  });
        }

    </script>

    </body>
</html>
