<?php

$name = $_POST['name'];
$email = $_POST['email'];
$location = $_POST['location'];
$message = $_POST['message'];

$to ="???";
$subject = "Items";

$body = "Name: $name\n";
$body .= "Email: $email\n";
$body .= "Location: $location\n\n";
$body .= "Message:\n$message";

$headers = "From: $email";

mail($to, $subject, $body, $headers);

echo "Message sent successfully";

?>