<?php 
    session_start();
    require ('../controllers/sql.php');
    require ('../controllers/send_mail.php');


    $modal_content = "";

    //Contact form test
    if(isset($_POST['contact_submit']))
    {
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['content']))
        {
            $mail = [
                'email_address' => $_POST['email'],
                'subject' => 'HELP : ' . $_POST['subject'],
                'content' => $_POST['content'],
                'phone' => '',
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

    $news = get_news_front_page(1);