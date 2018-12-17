<?php
    require ('../controllers/send_mail.php');
    require '../models/session.php';

    session_start();

    $modal_content = '';
    $prefill = [
        'name' => '',
        'email' => '',
    ];

    //Send mail
    if(isset($_POST['submit']))
    {
        if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['content']))
        {
            $mail = [
                'email_address' => $_POST['email'],
                'subject' => 'HELP : ' . $_POST['subject'],
                'content' => $_POST['content'],
                'phone' => $_POST['phone'],
                'name' => $_POST['name']
            ];

            if (filter_var($mail['email_address'], FILTER_VALIDATE_EMAIL))
            {
                $modal_content = sendMail($mail);
            }
            else
            {
                $modal_content = "Veuillez renseigner une adresse mail valide";
            }
        }
        else
        {
            $modal_content = "Veuillez renseigner tous les champs obligatoires";
        }
    }

    //Pre-fill email field
    if(isset($_SESSION['useremail']) && isset($_SESSION['username']))
    {
        $prefill['email'] = $_SESSION['useremail'];
        $prefill['name'] = $_SESSION['username'];
    }
