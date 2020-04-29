<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.rupindersingh.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'me@rupindersingh.com';                     // SMTP username
    $mail->Password   = 'Developer101999';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom(htmlspecialchars($_POST['email']), htmlspecialchars("{$_POST['first_name']} {$_POST['last_name']}"));
    $mail->addAddress('me@rupindersingh.com', 'Rupinder Singh');     // Add a recipien

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = htmlspecialchars($_POST['subject']);
    $mail->Body    = nl2br($_POST['message']);

    $mail->send();
    echo 1;
} catch (Exception $e) {
    echo 0;
}