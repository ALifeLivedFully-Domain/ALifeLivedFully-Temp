<?php
$data = array(
            'secret' => "my-secret (should start with 0x..)",
            'response' => $_POST['h-captcha-response']
        );
$verify = curl_init();
curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
curl_setopt($verify, CURLOPT_POST, true);
curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($verify);

// var_dump($response);

$responseData = json_decode($response);
if($responseData->success) {
    // Excecutes only if a valid captcha is completed

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

    $headers    =   "From: info@alifelivedfully.com" . "\r\n" .
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
    echo "Success";
} 
else {
   // return error to user; they did not pass
   echo "Captcha not completed or not passed, please try again.";
}?>