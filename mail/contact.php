<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure you have the correct path to PHPMailer's autoload

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io'; // Mailtrap SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'asaresylvester033@gmail.com'; // Replace with Mailtrap username
        $mail->Password = 't@Mg.95p!j3Y@cd'; // Replace with Mailtrap password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('info@mmskumasi.com', 'Maria Montessori School');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "<h2>Contact Request</h2>
                     <p><strong>Name:</strong> $name</p>
                     <p><strong>Email:</strong> $email</p>
                     <p><strong>Message:</strong> $message</p>";

        // Send email
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
