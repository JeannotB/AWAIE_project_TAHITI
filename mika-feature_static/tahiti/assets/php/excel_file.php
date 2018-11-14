<?php
    require '../php/db_connection.php';

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


    $sql_get_temp_sensor = "SELECT * FROM capteur JOIN produits WHERE capteur.sonde_id=produits.id_produit AND md5(produits.ref_produit)='".$sonde_id."' ORDER BY capteur.date DESC LIMIT $limit";

    $result = mysqli_query($sqlconnect, $sql_get_temp_sensor);

    while ($row = mysqli_fetch_assoc($result)) {
        
        fputcsv($file, array($row['date'], $row['temperature']), ";");


    }
  


    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$filename.csv"); //filename named as sensor name
    header("Content-Type: application/csv");
    header("Content-Transfer-Encoding: binary");

    readfile("../excel/sensor.csv");

    fclose($file);

?>