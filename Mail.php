<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

function sendMail($eMail){
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'kp747007@gmail.com';                 // SMTP username
        $mail->Password = 'lhqpyicjmahoyhhx';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                   // TCP port to connect to

        //Recipients
        $mail->setFrom('admin@indianricell.tk', "IndiaNRICell.tk");
        $mail->addAddress($eMail);     // Add a recipient
        $mail->addCC('admin@indianricell.tk');

        //Content
        $mail->Subject = 'Query Submission';
        $mail->Body    = 'Your Query is Submitted, We will Contact Back you soon!';

        $mail->send();
    } catch (Exception $e) {
        error_log('Message could not be sent. Mailer Error: ', $mail->ErrorInfo);
    }
}

function QuerySubMail($eMail, $fname, $lname, $dept, $query){
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'kp747007@gmail.com';                 // SMTP username
        $mail->Password = 'lhqpyicjmahoyhhx';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                   // TCP port to connect to

        //Recipients
        $mail->setFrom('admin@indianricell.tk', "IndiaNRICell.tk");
        $mail->addAddress($eMail);     // Add a recipient
        $mail->addCC('admin@indianricell.tk');

        //Content
        $mail->Subject = 'Query Submission';
        $mail->Body = "Hello ".$fname." ".$lname.", Your Query related to ".$dept." is ".$query." has received by us, We will Contact Back you soon!";

        $mail->send();
    } catch (Exception $e) {
        error_log('Message could not be sent. Mailer Error: ', $mail->ErrorInfo);
    }
}
?>