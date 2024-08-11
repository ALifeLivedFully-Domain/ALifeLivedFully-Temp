<?php

// set message sent to false by defailt
$message_sent = false;

// Validate user has submitted form
if (isset($_POST['submit'])) {

    // Sanitize user input
    $name           = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
    $phone          = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT); 
    $email          = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $projecttype    = filter_input(INPUT_POST, "projecttype", FILTER_SANITIZE_SPECIAL_CHARS);
    $aboutproject   = filter_input(INPUT_POST, "aboutproject", FILTER_SANITIZE_SPECIAL_CHARS);

    // Set variables for mail function
    $from       =   $email;

    $to         =   "Dani@alifelivedfully.com";

    $subject    =   "Requesting quote for project type: " . $projecttype;

    $headers    =   "From: " . $email . "\r\n" .
                    "Reply-To: " . $email . "\r\n";

    $message    =   "Name: " . "\r\n" . $name . "\r\n" . "\r\n" . 
                    "Phone: " . "\r\n" . $phone . "\r\n" . "\r\n" . 
                    "Email: " . "\r\n" . $email . "\r\n" . "\r\n" . 
                    "Project Type: " . "\r\n" . $projecttype . "\r\n" . "\r\n" . 
                    "About The Project: " . "\r\n" . $aboutproject . "\r\n" . "\r\n";

    // Send the email using mail function(built into php by default)
    mail($to, $subject, $message, $headers);

    // Update message sent var
    $message_sent = true;
}
?>