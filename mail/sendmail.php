<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
require_once 'PHPMailer/src/Exception.php';
    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'zerefs124@gmail.com';
    $mail->Password = 'kxpi hupu xqkr eqpb';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('zerefs124@gmail.com');

    $mail->addAddress('ngodinhtungthi@gmail.com');

    $mail->isHTML(true);



    $mail->Subject = 'MAIL MAIL';
    $mail->Body = '<h1> THI DEP TRAI</h1>';
    $mail->CharSet = 'UTF-8';

    $mail->send();



?>