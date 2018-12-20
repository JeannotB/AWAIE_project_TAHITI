<?php
    session_start();
    
    require '../models/db_connection.php';

	//LOGOUT
	
	if(isset($_SESSION['token']) && isset($_SESSION['LAST_ACTIVITY']))
	{   
        //update isOnine on DataBase
		$sql = "UPDATE members SET isOnline = '0'
                        	   WHERE 	token='".$_SESSION['token']."'";

        if(mysqli_query($sqlconnect, $sql))
            $error = "Successfully register";
        else
            $error = "Error: " . $sql . " " . mysqli_error($sqlconnect);


		$_SESSION = array();
			
		//Destroy cookie session_cache_expire
		if (ini_get("session.use_cookies"))
		{
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}
		session_unset();
		session_destroy();
	}
	header('Location: ../login');