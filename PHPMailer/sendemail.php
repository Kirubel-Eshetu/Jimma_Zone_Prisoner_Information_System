<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';



$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'Kirubelwinner@gmail.com';
    $mail->Password   = 'wykjnqjnovzlexsu';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
    $mail->Port = 465; 

    $fname = "JZPIS";
    $emailr = $_SESSION['email'];
    $otp = $_SESSION['otp'];
    $mail->setFrom('Kirubelwinner@gmail.com', 'Jimma Zone Prisoner Information System');
    $mail->addAddress($emailr, $fname);

    $mail->isHTML(true);

    $customMessage = 'Hello Your OTP is: '.$otp.'<br>Insert this OTP to the system for verification.';

    $mail->Subject = 'One Time Password';
    $mail->Body    = $customMessage;

    $mail->send();
    $message = 'Email has been sent successfully.';
    
} catch (Exception $e) {
    // Log the error instead of displaying directly to the user
    error_log("Email could not be sent. Mailer Error: {$mail->ErrorInfo}. Exception Details: " . $e->getMessage());
    echo 'An error occurred while sending the email. Please try again later.';
}
?>