<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/Exception.php");
    require("PHPMailer/SMTP.php");


    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPDebug = 4;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth = true;
    $mail->SMTPAutoTLS = false;

    $mail->Username = "contact.sup.tahiti@gmail.com";
    $mail->Password = "TahitiAWAIE41";
    
    $mail->setFrom('contact.sup.tahiti@gmail.com', 'Contact Tahiti-AWAIE');
    $mail->AddAddress("stephane.ho_sik_chuen@insa-cvl.fr");
    $mail->Subject = "Test";
    $mail->Body = "Test Hello";

    if(!$mail->Send())
    {
        echo "Mail wasn't send";
        echo "Mailer error : " .$mail->ErrorInfo;
    }
    else
        echo "Mail Send";
?>