<?php

use Dotenv\Dotenv;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
  $mail->isSMTP();  //Send using SMTP
  $mail->Host = $_ENV['SMTP_HOST']; //Set the SMTP server to send through
  $mail->SMTPAuth = true; //Enable SMTP authentication
  $mail->Username = $_ENV['SMTP_USERNAME']; //SMTP username
  $mail->Password = $_ENV['SMTP_PASSWORD']; //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
  $mail->Port = $_ENV['SMTP_PORT']; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom($_ENV['SMTP_USERNAME']);
  $mail->addAddress('<email address>', '<Recipient Name> Optional');

  //Content
  $mail->isHTML(true); //Set email format to HTML
  $mail->Subject = 'Here is the subject';
  $mail->Body = 'This is the HTML message body <b>in bold!</b>';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
