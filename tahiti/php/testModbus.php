<!DOCTYPE html>
<head>
    <meta http-equiv="refresh" content="300">
</head>

<?php



require 'PHPModbus/ModbusMaster.php';
require 'PHPModbus/ModbusMasterTcp.php';
require 'PHPModbus/PhpType.php';
require 'PHPModbus/IecType.php';

require 'db_connection.php';




use PHPModbus\ModbusMaster; 
use PHPModbus\PhpType; 

// Modbus master TCP
$modbus = new ModbusMaster("192.168.1.99", "TCP"); 

try {
    $recData = $modbus->readMultipleRegisters(0, 0, 32);
}
catch (Exception $e) {
    // Print error information if any
    echo $modbus;
    echo $e;
    exit;
}

// Print status information
    //echo "</br>Status:</br>" . $modbus;

// Print read data
    //echo "</br>Data:</br>";
    //print_r($recData); 
    //echo "</br><br><br>";


function convertData2Temp($data)
{
    return  $data / 10;
}

$temp1 = convertData2Temp($recData[32]*256 + $recData[33]);
$temp2 = convertData2Temp($recData[34]*256 + $recData[35]);
$temp3 = convertData2Temp($recData[36]*256 + $recData[37]);
$temp4 = convertData2Temp($recData[38]*256 + $recData[39]);

echo "Temp 1 : ".$temp1. "°C<br>";
echo "Temp 2 : ".$temp2. "°C<br>";
echo "Temp 3 : ".$temp3. "°C<br>";
echo "Temp 4 : ".$temp4. "°C<br>";

$temp = [['1',$temp1], ['2',$temp2], ['3',$temp3], ['4',$temp4]];



//Update Database
foreach($temp as $elem)
{
    $sql_set_temp = 'INSERT INTO capteur(sonde_id, date, temperature)
                    VALUES ('.$elem[0].', "'.date("Y-m-d H:i:s").'", '.$elem[1].')';

    if(mysqli_query($sqlconnect,$sql_set_temp))
        echo "SENSOR ".$elem[0]." SQL : New record created successfully<br/>";
    else
        echo "SENSOR ".$elem[0]." SQL Error : ".$sql_set_temp."<br/>".mysqli_error($sqlconnect);
}


sleep(1);

?>