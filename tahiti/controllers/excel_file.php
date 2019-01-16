<?php
    require ('../controllers/sql.php');

    if(isset($_GET['sonde']))
        $sonde_id = $_GET['sonde'];
    else
        $sonde_id = 1;
    if(isset($_GET['filename']))
        $filename = $_GET['filename']."-temp";
    else
        $filename = "sensor";

    if(isset($_GET['limit']))
        $limit = $_GET['limit'];
    else
        $limit = 30;

    $file = fopen("../excel/sensor.csv", "w") or die("Unable to open file!");


    $data = get_produits_and_temp($sonde_id);
    
    $data = $data[0];
    $data['temp'] = array_reverse($data['temp']);
    $data['temp'] = array_splice($data['temp'], 0, $limit);

    //---------------- Fill CSV --------------------
    
    //Name of the product
    fputcsv($file, array("Sensor Name : ", $data['ref_produit']), ";");

    //GPS Coordinates of the product
    fputcsv($file, array("GPS (lat / long) : ", $data['GPS_lat'], $data['GPS_long']), ";");

    //Limit alerts of the product
    fputcsv($file, array("Alerts limits (inf / sup) : ", $data['alerte_inf'], $data['alerte_sup']), ";");

    //Last Temperature of the product
    fputcsv($file, array("Date", "Temperature"), ";");
    foreach($data['temp'] as $elem) {
        fputcsv($file, array($elem['date'], $elem['temperature']), ";");
    }
    
    


  


    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename.csv"); //filename named as sensor name
    header("Content-Type: application/csv");
    header("Content-Transfer-Encoding: binary");

    readfile("../excel/sensor.csv");

    fclose($file);