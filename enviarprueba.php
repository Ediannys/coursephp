<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


$create_pass_link="http://google.com";
$mensage= 'Hi, <br /><br /> You just have one more step to join the GymnasticsHQ SkillTrakker community! <br /><br />Click the link below to create your password: <br /><br/><br /><br />';
$mensage.='<a style= "background: #7555a4; padding: 15px; text-decoration: none; color: white; border-radius: 7px; text-transform: uppercase; font-weight: 300; font-family: sans-serif; text-align:center"';
$mensage.=' href="' . $create_pass_link . '"> Continue to Create your Account </a>';
$mensage.=" <br/><br/><br/>We are so excited to have you and can't wait to see you work hard and improve your gymnastics!<br /><br />Please do not reply to this email, if you have questions please send me an email: <a href='mailto:gymnasticshq@gmail.com '>gymnasticshq@gmail.com </a><br /><br />Jessica";



try {
    //Server settings
    $mail->SMTPDebug = 0;                     // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'cursosweb.aem@gmail.com';                     // SMTP username
    $mail->Password   = 'desarrollo1234';                               // SMTP password
    $mail->SMTPSecure = 'tls';       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('cursosweb.aem@gmail.com', 'SkillTrakker');
    $mail->addAddress('cursosweb.aem@gmail.com', 'Joe User'); 
    //$mail->addAttachment('videos/skilltrakkertutorial.MOV');     // Add a recipient
    
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Get Started with SkillTrakker';
    $mail->Body= $mensage;  
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )

);
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
