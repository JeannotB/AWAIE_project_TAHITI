<?php require '../controllers/news_administration.php';?>

<!-- TITLE -->
<?php $title = "TAHITI - AWAIE -- News Admin";?>

<!-- CONTENT -->
<?php ob_start();?>
    <div class="row mt">
        <div class="col-lg-3">
            <div class="form-panel-lg-3">
                <div class="form-horizontal style-form">
                    <div class="form-group centered">
                        <h4>Create a news</h4>
                        <button id="create news" class="btn btn-theme " onclick="fieldEmpty();">Create a news</button>
                    </div>
                    <div class="form-group centered">
                        <h4>Update a news</h4>
                        <select id="news_title_select" class="form-control">
                            <option value="none">Select a News</option>
                            <?php
                                foreach($news['title'] as $elem)
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


        <!-- Corps de la news à créer ou à update-->
        <div class="col-lg-9">
            <div class="form-panel">
                <form class="form-horizontal style-form" method="post">
                    <div class="form-group">
                        <input name="news_id" id="news_id" class="form-control" type="hidden"/> <!-- Hidden input for recovery id -->       
                        <label class="col-sm-2 col-sm-6 control-label">Title</label>
                        <div id="title" class="col-sm-10">
                            <input name="news_title" id="news_title" class="form-control" type="text"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-6 control-label">Description</label>
                        <div id="description" class="col-sm-10">
                            <textarea name="news_description" id="news_description" class="form-control" cols="40" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-2 col-sm-6 control-label">Online</label>
                        <div class="col-sm-10">
                            <div class="switch switch-square" id="switch_online"
                                    data-on-label="<i class=' fa fa-check'></i>"
                                    data-off-label="<i class='fa fa-times'></i>">
                                <input type="checkbox" id="news_online" name="news_online"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group centered">
                        <button id='submit' type='submit' name='submit' class='btn btn-theme'>Send News</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        var dataNews = <?php echo json_encode($news); ?>;

        window.onload = function() {

            var elemSelect = document.getElementById('news_title_select');
            elemSelect.onchange = function() {
                var elemTitle = document.getElementById('news_title');
                var elemDescription = document.getElementById('news_description');
                var elemOnline = document.getElementById('news_online');
                var elemId = document.getElementById('news_id');
                if(elemSelect.value === "none") {
                    fieldEmpty();
                } else {
                    for(var i= 0; i < dataNews['title'].length; i++){
                        if(dataNews['title'][i] === elemSelect.value){
                            elemTitle.value = dataNews['title'][i];
                            elemDescription.value = dataNews['description'][i];
                            elemId.value = dataNews['id'][i]; 
                            $('#switch_online').bootstrapSwitch('setState', (dataNews['online'][i] == 0 ? false : true ));
                        }
                        
                    }             
                }
            }
        };

        function fieldEmpty() {
            document.getElementById('news_title').value = "";
            document.getElementById('news_description').value = "";
            document.getElementById('news_online').value = "";
            document.getElementById('news_id').value = "";
            $('#switch_online').bootstrapSwitch('setState', false);
        };

    </script>
    <script src="./js/bootstrap-switch.js"></script>

<?php $content = ob_get_clean();?>

<?php require 'template.php';?>