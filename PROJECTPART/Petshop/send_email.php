<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
// Get POST data
$data = json_decode(file_get_contents("php://input"));

// Extract data
$to = $data->to;
$subject = $data->subject;
$message = $data->message;

// Initialize PHPMailer
$mail = new PHPMailer(true);
try {
    // SMTP configuration (change as per your SMTP settings)
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'praxware@gmail.com';
    $mail->Password = 'foaozgkqjnwpzfex';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender and recipient
    $mail->setFrom('kachhelahitesh@gmail.com', 'hitesh');
    $mail->addAddress($to);

    // Email content
    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send email
    $mail->send();
    echo json_encode(array("message" => "Email sent successfully"));
} catch (Exception $e) {
    echo json_encode(array("error" => $mail->ErrorInfo));
}
?>
