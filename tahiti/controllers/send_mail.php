<?php
    function sendMail($mail_content)
    {
        try{
            require '../controllers/PHPMailer/PHPMailerAutoload.php';
            
            $mail = new PHPMailer;
            //init mail
            //$mail->SMTPDebug = 4;//for debug
            //$mail->Debugoutput = 'html';

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';
            $mail->Username='contact.sup.tahiti@gmail.com';
            $mail->Password='TahitiAWAIE41';

            $mail->setFrom($mail_content['email_address'],'Contact');
            $mail->addAddress('contact.sup.tahiti@gmail.com','Contact');
            //$mail->addAddress('baptiste.chevallier@insa-cvl.fr','Contact');
            $mail->AddReplyTo($mail_content['email_address'],$mail_content['name']);

            $mail->isHTML(true);
            $mail->Subject = $mail_content['subject'];
            $mail->Body='Name : ' . $mail_content['name'] . '<br>
                         Email : ' . $mail_content['email_address'] . '<br>
                         Telephone : ' . $mail_content['phone'] . '<br>
                         Message : ' . $mail_content['content'];

            $mail->Send();
            $result = 'Message has been sent';
            

        }catch (Exception $e) {
            $result = 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
        }

        return $result;
    }

