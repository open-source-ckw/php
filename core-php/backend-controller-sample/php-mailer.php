<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.example.com';       // SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your-email@example.com';
    $mail->Password   = 'your-email-password';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // or ENCRYPTION_SMTPS
    $mail->Port       = 587; // TLS port (465 for SSL)

    // Sender & recipient
    $mail->setFrom('your-email@example.com', 'Your Name');
    $mail->addAddress('recipient@example.com');

    // Email content
    $mail->isHTML(true);                        
    $mail->Subject = 'Test Email from PHPMailer';
    $mail->Body    = '<h3>This is a test email sent using PHPMailer via SMTP.</h3>';
    $mail->AltBody = 'This is a test email sent using PHPMailer via SMTP.';

    $mail->send();
    echo "Email sent successfully!";
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
