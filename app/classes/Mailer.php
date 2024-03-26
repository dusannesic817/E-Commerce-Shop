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
        $mail->Username   = 'shopforyourself3@gmail.com';
        $mail->Password   = 'nvpqhwbvufrgrhkv';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        
       
        $mail->setFrom('shopforyourself3@gmail.com', "Pl shop < reset your password >");
        $mail->addReplyTo('shopforyourself3@gmail.com', "");
        $mail->isHTML(true);
        $mail->addAddress($email);
        $mail->Subject = 'report';
        $mail->Body    = $htmlContent; 
       
   
        $mail->send();
        }


        public function sendMailReportPdf($pdf,$email){
            $mail = new PHPMailer(true);

            // Postavke SMTP servera
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'shopforyourself3@gmail.com';
            $mail->Password   = 'nvpqhwbvufrgrhkv'; 
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;
    
            // Postavke e-pošte
            $mail->setFrom('shopforyourself3@gmail.com', "Porudzbina");
            $mail->addReplyTo('shopforyourself3@gmail.com', "");
            $mail->isHTML(true);
            $mail->addAddress($email);
            $mail->Subject = 'Report';
            $mail->Body    = 'Postovani vasa potvrda o porudzbini';
    
            // Dodajte PDF fajl kao prilog
           
            $mail->addAttachment($pdf);
    
            // Pošaljite e-poštu
            $mail->send();
        }

}

