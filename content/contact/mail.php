<?php
$message_sent = false;
if (isset($_POST['email'])) {
    if (filter_var($_POST['email']), FILTER_VALIDATE_EMAIL) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $projecttype = $_POST['project-type'];
        $aboutproject = $_POST['about-project'];

        $to = "dani@alifelivedfully.com";
        $subject = "New contact form submission";
        $message = "Name: " . "\r\n" . $name . "\r\n" . "\r\n" . "Phone: " . "\r\n" . $phone . "\r\n" . "\r\n" . "Email: " . "\r\n" . $email . "\r\n" . "\r\n" . "Project Type: " . "\r\n" . $projecttype . "\r\n" . "\r\n" . "About The Project: " . "\r\n" . $aboutproject . "\r\n" . "\r\n";
        $headers = "From: " . $email . "\r\n" .
                   "Reply-To: " . $email . "\r\n";

        mail($to, $subject, $message, $headers);
        $message_sent = true;
    }
}
header('Location: https://alifelivedfully.com');
?>