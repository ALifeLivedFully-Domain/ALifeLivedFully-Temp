<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$projecttype = $_POST['project-type'];
$aboutproject = $_POST['about-project'];

$to = "info@alifelivedfully.com";
$subject = "New contact form submission";
$message = "Name: " . "\r\n" . $name . "\r\n" . "\r\n" . "Phone: " . "\r\n" . $phone . "\r\n" . "\r\n" . "Email: " . "\r\n" . $email . "\r\n" . "\r\n" . "Project Type: " . "\r\n" . $projecttype . "\r\n" . "\r\n" . "About The Project: " . "\r\n" . $aboutproject . "\r\n" . "\r\n";
$headers = "From: webmaster@alifelivedfully.com" . "\r\n" .
    "Reply-To: " . $email . "\r\n";

mail($to, $subject, $message, $headers);
?>
