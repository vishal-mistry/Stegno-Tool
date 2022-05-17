<?php
	require_once "config.php";
	
	$email = $_GET["qa"];
	$email_err= "";
	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	{
		 	$email_err = "Inavlid email-id";
	}
	else{
		$email_err = "";
	}
	echo $email_err;

?>