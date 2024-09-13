<?php

function strip_crlf($string)
{
    return str_replace("\r\n", "", $string);
}

if (! empty($_POST["send"])) {
    $name = $_POST["userName"];
    $email = $_POST["userEmail"];
    $subject = $_POST["subject"];
	$mobile = $_POST["mobile"];
    $content = $_POST["content"];

    $toEmail = "rani.ptntech@gmail.com";
    // CRLF Injection attack protection
    $name = strip_crlf($name);
    $email = strip_crlf($email);
    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "The email address is invalid.";
    } else {
        // appending \r\n at the end of mailheaders for end
		$to = 'rani.ptntech@gmail.com'; 

$header = "From: noreply@yourdomain.com\n"; 

$content= "Name: " . $name . "\n\n" . "E-mail: " . $email . "\n\n" ."Mobile Number: " . $mobile . "\n\n" . "Message: " . $content;


mail($to,$subject,$content,$header);

		
        $mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
        if (mail($toEmail, $subject, $content, $mailHeaders)) {
            $message = "Your contact information is received successfully.";
            $type = "success";
        }
    }
}
require_once "contact.php";
?>