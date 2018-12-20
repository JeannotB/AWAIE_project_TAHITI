<?php
//PHPMailer code

  if(isset($_POST['submit']))
  {
    $result='';
    try{
      require 'assets/php/PHPMailer/PHPMailerAutoload.php';
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

      $mail->setFrom('contact.sup.tahiti@gmail.com',$_POST['last_name']);
      $mail->addAddress('contact.sup.tahiti@gmail.com',$_POST['last_name']);
      $mail->addReplyTo($_POST['email'],$_POST['last_name']);

      $mail->isHTML(true);
      $mail->Subject = 'HELP: '.$_POST['subject'];
      $mail->Body='Name : '.$_POST['first_name'].' '.$_POST['last_name'].'<br>Email : '.$_POST['email'].'<br>Message : '.$_POST['message'];

      $mail->Send();
      $result= '...à été envoyé!';
    }catch (Exception $e) {
      $result= '...n\'a pas été envoyé :( . Mailer Error: '. $mail->ErrorInfo;
  }
  }

 ?>
