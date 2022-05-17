<?php
require 'vendor/autoload.php'; 

function email($name,$content,$email,$sub) {
$TO_USER = $name;   #change this
$TO_EMAIL = $email;   #change this

$subject = $sub;
$API_KEY='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';
$FROM_EMAIL = 'admin@envault.ml';
$FROM_USER = "Envault Administrator";

$HTML_CONTENT = $content;

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom($FROM_EMAIL, $FROM_USER);
$email->setSubject($subject);
$email->addTo($TO_EMAIL, $TO_USER);
#$email->addContent("text/plain", "PLAIN TEXT TEST");
$email->addContent("text/html",$HTML_CONTENT);

$sendgrid = new \SendGrid($API_KEY);

$response = $sendgrid->client->mail()->send()->post($email);
			
	if ($response->statusCode() == 202) {
		// Successfully sent
		echo 'done';
	} else {
		echo 'false';
		print_r($response);
	}
}
?>