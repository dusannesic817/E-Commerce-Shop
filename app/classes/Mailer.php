<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';
require_once 'phpmailer/src/Exception.php';

class Mailer{
    public function sendMail($email) {
        $htmlContent = file_get_contents('resetText.php');
        $mail = new PHPMailer(true);
        
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'dusannesic28@gmail.com';
        $mail->Password   = '';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        
       
        $mail->setFrom('dusannesic28@gmail.com', "");
        $mail->addReplyTo('dusannesic28@gmail.com', "");
        $mail->isHTML(true);
        $mail->addAddress($email);
        $mail->Subject = 'Report';
        $mail->Body    = $htmlContent; 
       
   
        $mail->send();
        }

}