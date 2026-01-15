<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['send'])){

  $name    = htmlspecialchars($_POST['name']);
  $email   = htmlspecialchars($_POST['email']);
  $message = nl2br(htmlspecialchars($_POST['message']));

  $mail = new PHPMailer(true);

  try {
    // SMTP config
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'aminulasif20@gmail.com';   // 🔴 your gmail
    $mail->Password = 'pozr nvxy fqnt acei';      // 🔴 16-digit app password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Email setup
    $mail->setFrom($email, $name);
    $mail->addAddress('YOUR_GMAIL@gmail.com'); // 🔴 where you receive mail

    $mail->isHTML(true);
    $mail->Subject = "New Portfolio Feedback";
    $mail->Body = "
      <h3>New Feedback Received</h3>
      <p><b>Name:</b> $name</p>
      <p><b>Email:</b> $email</p>
      <p><b>Message:</b><br>$message</p>
    ";

    $mail->send();

    header("Location: contact.php?success=1");
    exit();

  } catch (Exception $e) {
    header("Location: contact.php?error=1");
    exit();
  }
}
