<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../vendor/autoload.php'; // Include PHPMailer

function sendEmail($recipient, $subject, $message) {
    $mail = new PHPMailer(true); // Create a new PHPMailer instance

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF; // Enable verbose debug output
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = 'mail.kzone.ca'; // Specify your SMTP server
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'info@kzone.ca'; // SMTP username
        $mail->Password = '(DkYOwhwdQja'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable TLS encryption
        $mail->Port = 465; // TCP port to connect to

        // Recipients
        $mail->setFrom('info@kzone.ca', 'KZONE');
        $mail->addAddress($recipient); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        return true; // Email sent successfully
    } catch (Exception $e) {
        return false; // Email sending failed
    }
}

function sendNoReplyEmail($recipient, $subject, $message) {
    $mail = new PHPMailer(true); // Create a new PHPMailer instance

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF; // Enable verbose debug output
        $mail->isSMTP(); // Send using SMTP
        $mail->Host = 'mail.kzone.ca'; // Specify your SMTP server
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'no-reply@kzone.ca'; // SMTP username
        $mail->Password = '+j)N%S8;QHtP'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable TLS encryption
        $mail->Port = 465; // TCP port to connect to

        // Recipients
        $mail->setFrom('no-reply@kzone.ca', 'KZONE');
        $mail->addAddress($recipient); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
        return true; // Email sent successfully
    } catch (Exception $e) {
        return false; // Email sending failed
    }
}
?>
