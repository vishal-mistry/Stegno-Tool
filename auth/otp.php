<?php

	require_once "config.php";
    require 'email/index.php'; 
    session_start();
    if($_SESSION["verified"] === true){
    header("location: signup.php");
    exit;
}

	if(!isset($_SESSION["verified"])) {$_SESSION["verified"]=false;}
	$errr="";

	if (isset($_POST['loginbtn'])){
		$email= $_POST["email"];
		$_SESSION["email"]=$email;
		$_SESSION["otp"]=rand(0,1000000);
		$content='<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet"><div style="background-color:#E8EAF6 ; padding-top:20px ; padding-bottom:20px ; padding-left:15px ; padding-right:15px"><h2 style="font-family:Ubuntu, sans-serif;color: black;">Dear User,</h2><p style="font-family:Ubuntu, sans-serif;text-align:left; font-size:15px;color: black;">Your One-Time-Password(OTP) for registeration to envault.ml is :</p><p style="font-family:Ubuntu, sans-serif; text-align:center; font-size:25px;color: black;"><strong>'.$_SESSION["otp"].'</strong></p><p style="font-family:Ubuntu, sans-serif;text-align:left; font-size:15px;color: black;">Please use this otp to complete your registration at envault.ml.<br>If you did not request this OTP, you can safely ignore this e-mail.<br><br><strong>Regards,<br>Team Envault.</strong></p></div>';
		email("user",$content,$email,"OTP For Envault");
	}
	else if (isset($_POST['otp']) && isset($_SESSION["otp"])){
		if($_POST["otp"]==$_SESSION["otp"]) {$_SESSION["verified"]=true;header("location: signup.php");} else {$errr="Incoorect OTP";}
	}

?>

<!DOCTYPE HTML>
<html>
<head>
    
    <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Envault 2019">
  <link rel="shortcut icon" href="../images/sqff1bde_128x127.png" type="image/x-icon">
  <title>Sign Up for Envault</title>


	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
*{
	box-sizing: border-box;
}
body{
		font-family: 'Josefin Sans', sans-serif;
		background-color: #1c1c1c;
		padding: 0;
		margin: 0;
	}

.containbox{
	margin-top: 7%;
	margin-left: 32%;
	padding: 0 0px 8px 0px;
	height: 500px;
	width: 460px;
	background-color: #393e46;
	text-align: center;
	border-bottom-left-radius: 7px;
	border-bottom-right-radius: 7px;
}
.logbox{
	width: 100%;
	height: 390px;
	margin-bottom: 0;
	padding: 18px 10px 10px 2px;
	text-align: center;
	background-color: #393e46;
	border-bottom-left-radius: 7px;
	border-bottom-right-radius: 7px;
}
.logbox input[type="text"], input[type="password"]{
	width: 60%;
	height: 50px;
	padding: 5px;
	margin-top: 5px;
	margin-bottom: 5px;
	background-color: #393e46;
	border: none;
	border-bottom: 2px solid  #dbedf3;
	font-size: 16px;
	color: #eeeeee;
}
.logbox input[type="text"]:focus, input[type="password"]:focus{
	background-color: #393e46;
	color: #eeeeee;
}
.submitbtn{
	width: 105px;
	height: 55px;
	margin-top: 25px;
	margin-left: -12px;
	padding: 8px 5px 8px 5px;
	font-size: 1.25em;
	background-color: #04879c;
	color: #eeeeee;
	border-radius: 20px;
	border: none;
}
.label{
	height: 10px;
	background-color: #393e46;
	width: 60%;
	margin: 2px 0 0 85px;
	font-size: 14px;
	color: #ca3e47;
	padding: 1px;
}
@media screen and (max-width: 1024px){
	.containbox{
	margin-top: 10%;
	margin-left: 26%;
	padding: 0 0px 8px 0px;
	height: 450px;
	width: 390px;
	background-color: #393e46;
	text-align: center;
	border-bottom-left-radius: 7px;
	border-bottom-right-radius: 7px;
}
.logbox{
	width: 100%;
	height: 390px;
	margin-bottom: 0;
	padding: 18px 10px 10px 2px;
	text-align: center;
	background-color: #393e46;
	border-bottom-left-radius: 7px;
	border-bottom-right-radius: 7px;
}
.submitbtn{
	width: 82px;
	height: 35px;
	margin-top: 25px;
	margin-left: -12px;
	padding: 5px 5px 8px 5px;
	font-size: 1.25em;
	background-color: #04879c;
	color: #eeeeee;
	border-radius: 20px;
	border: none;
}
.label{
	height: 8px;
	background-color: #393e46;
	width: 60%;
	margin: 2px 0 0 85px;
	font-size: 10px;
	color: #ca3e47;
	padding: 1px;
}
.banner_l{
  position: absolute;
  right: 0;
  top: 17%;  
  background-color: white;
  width: 10%;
  height: 70%;
  overflow: hidden;
  background-color
  text-align: center;
  padding: 10px;
}
.banner_bot{
  position: fixed;
  bottom: 0; 
  left: 15%;
  background-color: white;
  width: 70%;
  height: 10%;
  overflow: hidden;
  background-color
  text-align: center;
  padding: 10px;
}
}

@media screen and (max-width: 900px){
	.containbox{
	margin-top: 15%;
	margin-left: 28%;
	padding: 0 0px 8px 0px;
	height: 400px;
	width: 360px;
	background-color: #393e46;
	text-align: center;
	border-bottom-left-radius: 7px;
	border-bottom-right-radius: 7px;
}
.logbox{
	width: 100%;
	height: 390px;
	margin-bottom: 0;
	padding: 18px 10px 10px 2px;
	text-align: center;
	background-color: #393e46;
	border-bottom-left-radius: 7px;
	border-bottom-right-radius: 7px;
}
.submitbtn{
	width: 82px;
	height: 35px;
	margin-top: 25px;
	margin-left: -12px;
	padding: 5px 5px 8px 5px;
	font-size: 1.25em;
	background-color: #04879c;
	color: #eeeeee;
	border-radius: 20px;
	border: none;
}
.label{
	height: 8px;
	background-color: #393e46;
	width: 60%;
	margin: 2px 0 0 85px;
	font-size: 10px;
	color: #ca3e47;
	padding: 1px;
}
.banner_l{
  position: absolute;
  right: 0;
  top: 17%;  
  background-color: white;
  width: 10%;
  height: 70%;
  overflow: hidden;
  background-color
  text-align: center;
  padding: 10px;
}
.banner_bot{
  position: fixed;
  bottom: 0; 
  left: 15%;
  background-color: white;
  width: 70%;
  height: 10%;
  overflow: hidden;
  background-color
  text-align: center;
  padding: 10px;
}
}
@media screen and (max-width: 768px){
	.containbox{
	margin-top: 15%;
	margin-left: 28%;
	padding: 0 0px 8px 0px;
	height: 400px;
	width: 360px;
	background-color: #393e46;
	text-align: center;
	border-bottom-left-radius: 7px;
	border-bottom-right-radius: 7px;
}
.logbox{
	width: 100%;
	height: 390px;
	margin-bottom: 0;
	padding: 18px 10px 10px 2px;
	text-align: center;
	background-color: #393e46;
	border-bottom-left-radius: 7px;
	border-bottom-right-radius: 7px;
}
.submitbtn{
	width: 82px;
	height: 35px;
	margin-top: 25px;
	margin-left: -12px;
	padding: 5px 5px 8px 5px;
	font-size: 1.25em;
	background-color: #04879c;
	color: #eeeeee;
	border-radius: 20px;
	border: none;
}
.banner_l{
  display: none;
  position: absolute;
  right: 0;
  top: 17%;  
  background-color: white;
  width: 10%;
  height: 70%;
  overflow: hidden;
  background-color
  text-align: center;
  padding: 10px;
}
}
@media screen and (max-width: 591px){
	.banner_l{
  display: none;}
}
@media screen and (max-width: 575px){
	.containbox{
	margin-top: 19%;
	margin-left: 15%;
	padding: 0 0px 8px 0px;
	height: 400px;
	width: 360px;
	background-color: #393e46;
	text-align: center;
	border-bottom-left-radius: 7px;
	border-bottom-right-radius: 7px;
}
.logbox{
	width: 100%;
	height: 390px;
	margin-bottom: 0;
	padding: 18px 10px 10px 2px;
	text-align: center;
	background-color: #393e46;
	border-bottom-left-radius: 7px;
	border-bottom-right-radius: 7px;
}
.submitbtn{
	width: 82px;
	height: 35px;
	margin-top: 25px;
	margin-left: -12px;
	padding: 5px 5px 8px 5px;
	font-size: 1.25em;
	background-color: #04879c;
	color: #eeeeee;
	border-radius: 20px;
	border: none;
}
.banner_l{
  display: none;
  position: absolute;
  right: 0;
  top: 17%;  
  background-color: white;
  width: 10%;
  height: 70%;
  overflow: hidden;
  background-color
  text-align: center;
  padding: 10px;
}
}
@media screen and (max-width: 480px){
	.containbox{
	margin-top: 28%;
	margin-left: 10%;
	padding: 0 0px 8px 0px;
	height: 400px;
	width: 360px;
	background-color: #393e46;
	text-align: center;
	border-bottom-left-radius: 7px;
	border-bottom-right-radius: 7px;
}
.logbox{
	width: 100%;
	height: 390px;
	margin-bottom: 0;
	padding: 18px 10px 10px 2px;
	text-align: center;
	background-color: #393e46;
	border-bottom-left-radius: 7px;
	border-bottom-right-radius: 7px;
}
.submitbtn{
	width: 82px;
	height: 35px;
	margin-top: 25px;
	margin-left: -12px;
	padding: 5px 5px 8px 5px;
	font-size: 1.25em;
	background-color: #04879c;
	color: #eeeeee;
	border-radius: 20px;
	border: none;
}
.banner_l{
  display: none;
  position: absolute;
  right: 0;
  top: 17%;  
  background-color: white;
  width: 10%;
  height: 70%;
  overflow: hidden;
  background-color
  text-align: center;
  padding: 10px;
}
}		
</style>
<script type="text/javascript" src="ajaxfunc.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" style="padding: 0 0 0 0;">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="../index.php" style="background-color: #ca4336;">
  	&nbsp;&nbsp;&nbsp;
    <img src="../images/noun_Cloud_2845836-h_k0ax1k70-509x341.png" alt="logo" style="width:40px;">
    <big><big>Envault&nbsp;&nbsp;&nbsp;</big></big>
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav justify-content-end">
    <li class="nav-item">
      <a class="nav-link" href="../about.html">About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../contact.php">Contact Us</a>
    </li>
  </ul>
</nav>

	<div class="containbox">
		<div class="logbox">
		<form method = "post">
		<input type="text" name="otp" placeholder="Enter OTP"><br>
		<p id="errmsg" class="label"><?php echo $errr; ?></p>
		<input type="submit" name="otpbtn" class="submitbtn">
		</form>
	    </div>
	</div>
</body>
</html>