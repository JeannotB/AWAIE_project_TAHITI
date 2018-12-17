<?php
header( 'content-type: text/html; charset=utf-8' ); //connection with utf8 charset

// Create connection
	//Local
		$sqlconnect = mysqli_connect('localhost', 'root', '', 'AWAIE');
	//Online
		//$sqlconnect = mysqli_connect('', '', '', 'piezo','');		
									//name site		//userID	//pw	//database		//Port

mysqli_set_charset($sqlconnect,"utf8"); //connection with utf8 charset
// Check connection
if (!$sqlconnect) {
    die("Connection failed: " . mysqli_connect_error());
}

error_reporting(0);
?>