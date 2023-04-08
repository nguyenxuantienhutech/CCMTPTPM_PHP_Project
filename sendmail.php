<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include  "PHPMailer/src/PHPMailer.php";
include  "PHPMailer/src/Exception.php";
// include  "PHPMailer/src/OAuth.php";
// include  "PHPMailer/src/POP3.php";
include  "PHPMailer/src/SMTP.php";
// require 'vendor/autoload.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'xuantien8a1@gmail.com';                     //SMTP username
    $mail->Password   = 'uxwpnbksmvogycqy';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('xuantien8a1@gmail.com', 'Mailer');
    $mail->addAddress('xuantien8a2@gmail.com', 'Joe User');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    //get
    if (isset($_POST['submit'])) {
        // Lấy thông tin từ form liên hệ
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Thiết lập các thông số cho email
        $to = 'xuantien8a1@gmail.com';
        $headers = "From: " . $name . " <" . $email . ">\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Phone: " . $phone . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Tạo nội dung email
        $email_content = "Name: $name<br>";
        $email_content .= "Email: $email<br>";
        $email_content .= "Phone: $phone<br>";
        $email_content .= "Subject: $subject<br>";
        $email_content .= "Message: $message<br>";

        // Gửi email
        if (mail($to, $subject, $email_content, $headers)) {
            echo "<p>Your message was sent successfully!</p>";
        } else {
            echo "<p>There was an error sending your message. Please try again later.</p>";
        }
    }


    //end get
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
