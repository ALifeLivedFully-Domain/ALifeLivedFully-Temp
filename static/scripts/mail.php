<?php

$name = $_POST['name'];
// $phone = $_POST['phone'];
$email = $_POST['email'];
// $projecttype = $_POST['projectType'];
$aboutproject = $_POST['aboutProject'];

// $header = "From:".$name."<".$email.">\r\n";
$recipient = "info@alifelivedfully.com";
$subject = "New contact form submission";
// $message = "Name: ".$name."Phone: ".$phone."Email: ".$email."Project Type: ".$projecttype."About The Project: ".$aboutproject."";
// $message = "This is a test";

mail($recipient,$subject,$aboutproject)
  echo "Message sent"
  or die("Error!");

?>
