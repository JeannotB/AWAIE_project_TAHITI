<?php
	require '../models/db_connection.php';
	require '../models/session.php';
	require '../controllers/sql.php';

	session_start();

	
    //deafult error message and inactive
    $isOnline = false;

    if(isset($_POST['Login']))
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
        
		//Prevent SQL injection
		$email = htmlspecialchars($email);
		$password = htmlspecialchars($password);

		$result = mysqli_query($sqlconnect, 'SELECT * FROM members WHERE email="'.$email.'"');

		if(mysqli_num_rows($result) === 1)
		{
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			
			//Verify password
			if(password_verify($password,$row['password']))
			{
				//Create auth token, availiable during
				$token = bin2hex(openssl_random_pseudo_bytes(50));
				//Crypt token
				$token = password_hash($token, PASSWORD_BCRYPT);
				//add token into member database
				insertAuthToken($row['member_id'], $token);
				
				//add token to the session
				createSession($token, password_hash($row['admin'], PASSWORD_BCRYPT), password_hash($row['id_company'], PASSWORD_BCRYPT));



				$_SESSION['username'] = $row['name'];
				$_SESSION['useremail'] = $row['email'];

				//update isOnline on DataBase
				
				$sql = "UPDATE members SET isOnline = '1'
							WHERE 	member_id='".$row['member_id']."'";

				if(mysqli_query($sqlconnect, $sql))
					$error = "Successfully register";
				else
					$error = "Error: " . $sql . " " . mysqli_error($sqlconnect);

				if($row['admin']) {
					$company_path = "dashboard_admin.php";
				}
				else
					$company_path = "dashboard.php?id_company=".password_hash($row['id_company'], PASSWORD_BCRYPT);
				header('Location: ./vues/'.$company_path.'');
			}
			else
				$error = "Account Invalid, please verify your email or your password";
		}
		else
		{
			$error = "Account Invalid, please verify your email or your password";
		}
		
		/*Inserer une fenetre de confirmation de login */

	}
	else
	{
		$error = "";
	}
