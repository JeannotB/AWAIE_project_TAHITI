<?php
	require '../models/db_connection.php';

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
				$_SESSION['username'] = $row['name'];
				$_SESSION['useremail'] = $row['email'];
				$_SESSION['user_id'] = $row['member_id'];
				$_SESSION['isOnline'] = true;
				$_SESSION['delete'] = false;
				$_SESSION['id_company'] = $row['id_company'];
				$_SESSION['admin'] = $row['admin'];

				//update isOnline on DataBase
				
				$sql = "UPDATE members SET isOnline = '1'
							WHERE 	member_id='".$_SESSION['user_id']."'";

				if(mysqli_query($sqlconnect, $sql))
					$error = "Successfully register";
				else
					$error = "Error: " . $sql . " " . mysqli_error($sqlconnect);

				if($row['admin']) {
					$company_path = "dashboard_admin.php";
				}
				else
					$company_path = "dashboard.php?id_company=".md5($row['id_company']);
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
