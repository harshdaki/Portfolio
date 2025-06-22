 
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$popupMessage = ""; // Default: no message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dakiharsh00@gmail.com';        // 🔁 Replace with your Gmail
        $mail->Password = 'saurjvspwnurdone';          // 🔁 App password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('dakiharsh00@gmail.com');       // Receiver
        $mail->Subject = "Contact: $subject";
        $mail->Body    = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";

        $mail->send();
        echo "<script>
        alert('Message sent successfully ✅');
        window.location.href = 'index.html'; // Redirect to index.html
        </script>";
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent ❌. Error: {$mail->ErrorInfo}');</script>";
    }
    }

?>