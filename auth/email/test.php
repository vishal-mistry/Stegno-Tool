<?php
require 'vendor/autoload.php'; 

$OTP = '453823';
$TO_USER = 'Yogesh Choudhary';
$TO_EMAIL = 'thegodfathercy@gmail.com';
$subject = "OTP for Envault";
$API_KEY='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';
$FROM_EMAIL = 'admin@envault.ml';
$FROM_USER = "Envault Administrator";


$HTML_CONTENT = '<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet"><div style="background-color:#E8EAF6 ; padding-top:20px ; padding-bottom:20px ; padding-left:15px ; padding-right:15px"><h2 style="font-family:Ubuntu, sans-serif;color: black;">Dear '.$TO_USER.',</h2><p style="font-family:Ubuntu, sans-serif;text-align:left; font-size:15px;color: black;">Your One-Time-Password(OTP) for registeration to envault.ml is :</p><p style="font-family:Ubuntu, sans-serif; text-align:center; font-size:25px;color: black;"><strong>'.$OTP.'</strong></p><p style="font-family:Ubuntu, sans-serif;text-align:left; font-size:15px;color: black;">Please use this otp to complete your registration at envault.ml.<br>If you did not request this OTP, you can safely ignore this e-mail.<br><br><strong>Regards,<br>Team Envault.</strong></p></div>';


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
?>
