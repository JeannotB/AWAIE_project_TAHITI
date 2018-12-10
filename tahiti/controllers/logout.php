<?php
    session_start();
    
    require '../models/db_connection.php';

	//LOGOUT
	
	if(isset($_SESSION['username']) AND isset($_SESSION['isOnline']))
	{
		if($_SESSION['isOnline'] == true)
		{        
            //update isOnine on DataBase
			
            $sql = "UPDATE members SET isOnline = '0'
                        WHERE 	member_id='".$_SESSION['user_id']."'";

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
			session_destroy();
		}
		
	}
	header('Location: ../vues/login.php');