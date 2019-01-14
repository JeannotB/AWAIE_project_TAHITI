<?php require '../controllers/recruit_administration.php';?>

<!-- TITLE -->
<?php $title = "TAHITI - AWAIE -- Offer Admin";?>

<!-- CONTENT -->
<?php ob_start();?>
    <div class="row mt">
        <div class="col-lg-3">
            <div class="form-panel-lg-3">
                <div class="form-horizontal style-form">
                    <div class="form-group centered">
                        <h4>Create an offer</h4>
                        <button id="create offer" class="btn btn-theme " onclick="fieldEmpty();">Create an offer</button>
                    </div>
                    <div class="form-group centered">
                        <h4>Update an offer</h4>
                        <select id="offer_title_select" class="form-control">
                            <option value="none">Select an Offer</option>
                            <?php
                                foreach($offer['title'] as $elem)
                                {
                                    echo "<option value='".$elem."'>".$elem."</option>";
                                }
                            ?>

                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN DE CHOIX -->


        <!-- Corps de la offer à créer ou à update-->
        <div class="col-lg-9">
            <div class="form-panel">
                <form class="form-horizontal style-form" method="post">
                    <div class="form-group">
                        <input name="offer_id" id="offer_id" class="form-control" type="hidden"/> <!-- Hidden input for recovery id -->       
                        <label class="col-sm-2 col-sm-6 control-label">Title</label>
                        <div id="title" class="col-sm-10">
                            <input name="offer_title" id="offer_title" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-6 control-label">Description</label>
                        <div id="description" class="col-sm-10">
                            <textarea name="offer_description" id="offer_description" class="form-control" cols="40" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-6 control-label">Localisattion</label>
                        <div id="localisation" class="col-sm-10">
                            <input name="offer_localisation" id="offer_localisation" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-6 control-label">Type</label>
                        <div id="type" class="col-sm-10">
                            <select name="offer_type" id="offer_type" class="form-control" type="text">
                                <option value="0">Permanent</option>
                                <option value="1">Non-Permanent</option>
                                <option value="2">Internship</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-6 control-label">Takeout date</label>
                        <div id="takeout" class="col-sm-10">
                            <input name="offer_takeout" id="offer_takeout" class="form-control" type="date" />
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-2 col-sm-6 control-label">Online</label>
                        <div class="col-sm-10">
                            <div class="switch switch-square" id="switch_online"
                                    data-on-label="<i class=' fa fa-check'></i>"
                                    data-off-label="<i class='fa fa-times'></i>">
                                <input type="checkbox" id="offer_online" name="offer_online"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group centered">
                        <button id='submit' type='submit' name='submit' class='btn btn-theme'>Send offer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        var dataOffer = <?php echo json_encode($offer); ?>;

        window.onload = function() {

            var elemSelect = document.getElementById('offer_title_select');
            elemSelect.onchange = function() {
                var elemTitle = document.getElementById('offer_title');
                var elemDescription = document.getElementById('offer_description');
                var elemOnline = document.getElementById('offer_online');
                var elemId = document.getElementById('offer_id');
                var elemLocalisation = document.getElementById('offer_localisation');
                var elemType = document.getElementById('offer_type');
                var elemTakeoutDate = document.getElementById('offer_takeout');


                if(elemSelect.value === "none") {
                    fieldEmpty();
                } else {
                    for(var i= 0; i < dataOffer['title'].length; i++){
                        if(dataOffer['title'][i] == elemSelect.value){
                            elemTitle.value = dataOffer['title'][i];
                            elemDescription.value = dataOffer['description'][i];
                            elemId.value = dataOffer['id'][i];
                            elemLocalisation.value = dataOffer['localisation'][i];
                            elemType.value = dataOffer['type'][i];
                            elemTakeoutDate.value = dataOffer['date_takeout'][i];
                            $('#switch_online').bootstrapSwitch('setState', (dataOffer['online'][i] == 0 ? false : true ));
                        }
                        
                    }             
                }
            }
        };

        function fieldEmpty() {
            document.getElementById('offer_title').value = "";
            document.getElementById('offer_description').value = "";
            document.getElementById('offer_online').value = "";
            document.getElementById('offer_id').value = "";
            document.getElementById('offer_localisation').value = "";
            document.getElementById('offer_type').value = "";
            document.getElementById('offer_takeout').value = "";
            $('#switch_online').bootstrapSwitch('setState', false);
        };

    </script>
    <script src="./js/bootstrap-switch.js"></script>

<?php $content = ob_get_clean();?>

<?php require 'template.php';?>