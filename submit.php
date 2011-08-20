<?php
require_once('recaptchalib.php');

$privatekey = "6Ld6R8cSAAAAALUNRBeuYGAjKBhZc6pslHAlKZNR";
$resp = recaptcha_check_answer ($privatekey,
$_SERVER["REMOTE_ADDR"],
$_POST["recaptcha_challenge_field"],
$_POST["recaptcha_response_field"]);

$response = new stdClass;

if (!$resp->is_valid) {
	echo "fail";
}
else {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$story = $_POST['story'];
	$email_address_to = "iuwebnative@att.net, brian@chirls.com";
	$subject = "Inspire USA Story Submission";
	$message_contents = "Name: $name\nemail: $email\n\n $story";
	$header = "From: noreply@webmademovies.org\r\n";
	$header .= "Reply-To: noreply@webmademovies.org\r\n";
	$header .= "Return-Path: noreply@webmademovies.org\r\n";
	mail($email_address_to,$subject,$message_contents,$header);
	echo "success";
}
?>