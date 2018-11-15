<?php
    //deafult error message and inactive
    $error = "";
    $errorBool = true;

    //define struc register
    $register = [
        'name' => "",
        'email' => "",
        'email_confirm' => "",
        'password' => "",
        'password_confirm' => "",
        'concent' => "",
    ];

    //Test if the post_method 'Register' has been call
    if(isset($_POST['Register']))
	{
    //verify mandatory fields
        //A name is required
		if(isset($_POST['name']) and $_POST['name'] != "")
		{
			$register['name'] = $_POST['name'];
            $errorBool &= true;
        }
        else
        {
            $error &= false;
            $error = "A name is required";
        }
		
		//A email is required
		if(isset($_POST['email']) and $_POST['email'] != "")
		{
            //email confirmation
            if(isset($_POST['email_confirm']) and $_POST['email_confirm'] != "")
            {
                if($_POST['email_confirm'] == $_POST['email']) //email and email_confirm match
                {
                    $register['email'] = $_POST['email'];
                    $errorBool &= true;
                }
                else
                {
                    $errorBool &= false;
                    $error = "Email and Email confirmation must be identical";
                }
            }
            else
            {
                $errorBool &= false;
                $error = "A confirmation email is required";
            }

        }
        else
        {
            $errorBool &= false;
            $error = "An email is required";
        }

		//A password is required
		if(isset($_POST['password']) and $_POST['password'] != "")
		{
            //Password confirmation
            if(isset($_POST['password_confirm']) and $_POST['password_confirm'] != "")
            {
                if(md5($_POST['password_confirm']) == md5($_POST['password'])) //password and password_confirm match
                {
                    $register['password'] = md5($_POST['password']); //encrypt password
                    $errorBool &= true;
                }
                else
                {
                    $errorBool &= false;
                    $error = "Password and Password confirmation must be identical";
                }
            }
            else
            {
                $errorBool &= false;
                $error = "A confirmation password is required";
            }
        }
        else
        {
            $errorBool &= false;
            $error = "A password is required";
        }

        //no error
        if($errorBool == true) // /!\ A re bosser dessus
		{
			//Detect duplicate Email
			$sql = "SELECT * FROM members WHERE email='".$register['email']."'";
			$result = mysqli_query($sqlconnect,$sql);
			if(mysqli_num_rows($result) == 0) // No duplicate
			{
				
				//Insert new member
				$sql = "INSERT INTO members (name, email, password, isonline)
							VALUES ('".$register['name']."','".$register['email']."','".$register['password']."','".true."')";

                if(mysqli_query($sqlconnect, $sql))
                {
                    $error = "Successfully register";
                    
                    header('Location: dashboard.php');
                }
				else
					$error = "Error: " . $sql . "" . mysqli_error($sqlconnect);
				
			}
			else
				$error = "This Email are already used";
		}



    }

?>