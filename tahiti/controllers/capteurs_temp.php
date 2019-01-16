<?php
    session_start();
    require ('../controllers/sql.php');
    require '../models/session.php';

    if(isset($_GET['sonde']))
        $sonde_id = $_GET['sonde'];
    else
        $sonde_id = null;


    $data = get_produits_and_temp($sonde_id);


    $sonde_name = $data[0]['ref_produit'];
    $GPS['lat'] = $data[0]['GPS_lat'];
    $GPS['long'] = $data[0]['GPS_long'];

    foreach($data[0]['temp'] as $elem) {
        $temp['temperature'][] = $elem['temperature'];
        $temp['date'][] = $elem['date'];
    }

    $temp['temperature'] = array_reverse($temp['temperature']);
    $temp['date'] = array_reverse($temp['date']);
