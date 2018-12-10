<?php
    session_start();
    require ('../controllers/sql.php');

    if(isset($_GET['sonde'])){

        $sonde_id = $_GET['sonde'];
        if(isset($_POST['submit'])){
            $sonde_info['ref_produit'] = $_POST['name'];
            $sonde_info['GPS_lat'] = $_POST['gps_lat'];
            $sonde_info['GPS_long'] = $_POST['gps_long'];
            $sonde_info['alerte_sup'] = $_POST['alerte_sup'];
            $sonde_info['alerte_inf'] = $_POST['alerte_inf'];
            
            $data = get_produits();
            
            
            //search eventually duplicate ref_produit
            foreach($data as $elem) {
                if($elem['ref_produit'] == $sonde_info['ref_produit']){
                    $error = "Name already exists, must be unique";
                    break;
                }
            }
            
            if(!isset($error)) {
                $error = update_produit($sonde_info, $sonde_id);
            }
        }

    }
    else
        $sonde_id = null;


    $data = get_produits($sonde_id);

    $sonde_info = $data[0];