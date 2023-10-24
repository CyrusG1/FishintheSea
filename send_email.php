<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to autoload.php based on your project's structure.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $mail = new PHPMailer();

    // SMTP Configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'cgorji19@gmail.com'; // Replace with your Gmail address
    $mail->Password = 'Bulleen'; // Replace with your Gmail password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Sender and Recipient
    $mail->setFrom('cgorji19@gmail.com', 'Your Name'); // Sender's name and email
    $mail->addAddress('cgorji19@gmail.com', 'Your Name'); // Recipient's name and email

    // Email Content
    $mail->isHTML(true);
    $mail->Subject = 'Contact Form Submission';
    $mail->Body = "Name: $name<br>Email: $email<br>Message: $message";

    if ($mail->send()) {
        echo 'Message sent successfully!';
    } else {
        echo 'Message could not be sent. Error: ' . $mail->ErrorInfo;
    }
}
?>
