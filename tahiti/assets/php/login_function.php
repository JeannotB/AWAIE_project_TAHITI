<?php
    //deafult error message and inactive
    $isOnline = false;

    if(isset($_POST['Login']))
	{
		$name = $_POST['name'];
		$password = $_POST['password'];
        
		//Prevent SQL injection
		$name = htmlspecialchars($name);
		$password = htmlspecialchars($password);
		
		//Verify password
		$password = md5($password);

		$result = mysqli_query($sqlconnect, 'SELECT * FROM members WHERE name="'.$name.'" AND password="'.$password.'"');

		if(mysqli_num_rows($result) === 1)
		{
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$_SESSION['username'] = $row['name'];
			$_SESSION['useremail'] = $row['email'];
			$_SESSION['user_id'] = $row['member_id'];
			$_SESSION['isOnline'] = true;
			$_SESSION['delete'] = false;
			

			//update isOnline on DataBase
			
			$sql = "UPDATE members SET isOnline = '1'
				  		WHERE 	member_id='".$_SESSION['user_id']."'";

			if(mysqli_query($sqlconnect, $sql))
				$error = "Successfully register";
			else
				$error = "Error: " . $sql . " " . mysqli_error($sqlconnect);


			header('Location: dashboard.php');
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

?>