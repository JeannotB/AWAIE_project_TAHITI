<?php
    session_start();
    require ('../controllers/sql.php');
    require '../models/session.php';
    //Structure
    $profile = [
        'name' => "",
        'email' => "",
        'date_inscription' => "",
        'adresse_company' => "",
        'tel_company' => "",
        'nom_company' => "",
        'logo_company' => "",
    ];


    $token = $_SESSION['token'];

    //Code de validation des nouveaux paramètres du compte
    if(isset($_POST['submit']))
    {
        //check password
        if(isset($_POST['old_password']) && isset($_POST['new_password']))
        {
            //change-Update password
        }

        if(isset($_POST['password']) && isset($_POST['password_confirm']))
        {
            $data = get_members($token);
            //Check password
            if(password_verify(htmlspecialchars($_POST['password']), htmlspecialchars($_POST['password_confirm'])) && password_verify(htmlspecialchars($_POST['password']), $row['password']))
            {
                $profile['name'] = $_POST['name'];
                $profile['email'] = $_POST['email'];
                $profile['adresse_company'] = $_POST['adresse_company'];
                $profile['tel_company'] = $_POST['tel_company'];
                $profile['nom_company'] = $_POST['nom_company'];
                //$profile['logo_company'] = $row['logo'];

                //change member parameters
                $error = update_member($profile, $token);
            }
            else
            {
                $error = "Password must be identical or didn't correspond";
            }
        }
    }

    $data = get_entreprise_member($token);
    
    $profile['name'] = $data[0]['name'];
    $profile['email'] = $data[0]['email'];
    $date = new DateTime($data[0]['date_inscription']);
    $profile['date_inscription'] = $date->format('d-m-Y');
    $profile['adresse_company'] = $data[0]['company']['Adresse'];
    $profile['tel_company'] = $data[0]['company']['Tel'];
    $profile['nom_company'] = $data[0]['company']['Nom'];
    $profile['logo_company'] = $data[0]['company']['logo'];