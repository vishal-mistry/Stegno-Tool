<?php

	require_once "config.php";
    require 'email/index.php'; 

    session_start();

	if(!isset($_SESSION["verified"])) {$_SESSION["verified"]=false;}

	$email= $mobno= $pswd= $re_pswd= $err_msg= "";
	$email_err= $mob_err= $pswd_err= $re_pswderr= "";
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if ($_SESSION["verified"]) {
		$email= $_POST["email"];
		$mobno= $_POST["mobno"];
		$pswd= $_POST["password"];
		$re_pswd= $_POST["conf_password"];

		if (empty(trim($email))) {
			$email_err= "Mandatory field";
		}
		else{
			$sql = "SELECT id FROM register WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = trim($email);
          	
          	if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already registered";
                } else{
                    $email = trim($email);
                }
            } else{
                $err_msg= "Something went wrong. Please try again later";
            }
        }
         
        mysqli_stmt_close($stmt);
		}

		if (empty(trim($mobno))) {
			$mob_err= "Mandatory field";
		}
		elseif (strlen(trim($mobno))!=10 || !preg_match('/^[0-9]{10}+$/', $mobno)){
			$mob_err= "Invalid mobile number";
		}
		else{
			$sql = "SELECT id FROM test-register WHERE mob_no = ?";
        
        	if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_mobno);
            $param_mobno = trim($mobno);
          	
          	if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $mob_err = "This number is already registered";
                } else{
                    $mobno = trim($mobno);
                }
            } else{
                $err_msg= "Something went wrong. Please try again later";
            }
        }
         
        mysqli_stmt_close($stmt);
		}

		if (empty(trim($pswd))){
			$pswd_err= "Mandatory field";
		}
		elseif (strlen($pswd)<6) {
			$pswd_err= "Password should be minimum 8 characters";
		}

		elseif (empty(trim($re_pswd)) || $re_pswd!=$pswd) {
			$re_pswderr= "Password doesnt match";
		}

		if (empty($email_err) && empty($mob_err) && empty($pswd_err) && empty($re_pswderr)) {
		
			 $sql = "INSERT INTO register (email, mob_no, password) VALUES (?, ?, ?)";
         
        	if($stmt = mysqli_prepare($link, $sql)){

            	mysqli_stmt_bind_param($stmt, "sss", $param_email, $param_mobno, $param_password);
            
            	$param_email = $email;
            	$param_mobno = $mobno;
            	$param_password = password_hash($pswd, PASSWORD_DEFAULT);
            

            	if(mysqli_stmt_execute($stmt)){
                	
                	header("location: login.php");
                	email("user","hello ".$email,$email);
            	} else{
                	$errmsg= "Something went wrong. Please try again later";
            	}
        	}

        	mysqli_stmt_close($stmt);
		}
		mysqli_close($link);
	}
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
.banner_l{
  position: absolute;
  right: 0;
  top: 17%;  
  width: 10%;
  height: 70%;
  overflow: hidden;
  text-align: center;
  padding: 10px;
  background-color: white;
}
.banner_bot{
  position: fixed;
  bottom: 0; 
  left: 15%;
  width: 70%;
  height: 10%;
  overflow: hidden;
  text-align: center;
  padding: 10px;
  background-color: white;
}
.banner_2{
  position: absolute;
  left: 0;
  top: 17%;  
  width: 10%;
  height: 70%;
  overflow: hidden;
  text-align: center;
  padding: 10px;
  background-color: white;}

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
      <a class="nav-link" href="../about.php">About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../contact.php">Contact Us</a>
    </li>
  </ul>
</nav>

	<div class="containbox">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
		<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="login.php"><big><big><b>Log In</b></big></big></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">&nbsp;</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="signup.php"><big><big><b>Sign up</b></big></big></a>
    </li>
        </ul>
    </nav>
		<div class="logbox">
		<form method = "post" action="<?php echo ($_SESSION['verified']?'signup.php':'otp.php'); ?>">
	<?php 
		if ($_SESSION["verified"]) {
			echo '<input type="text" name="email" placeholder="Enter Email ID" value="'.$_SESSION["email"].'" readonly onblur= "ajaxfunction(this.value);">';
		}
		else {
			echo '<input type="text" name="email" placeholder="Enter Email ID" onblur= "ajaxfunction(this.value);">';
		}
	?>
		<p id="emailerr" class="label"><?php echo $email_err; ?></p>
		<?php 
		if ($_SESSION["verified"]) {
    echo '<input type="text" name="mobno" placeholder="Enter Mobile number">
		<p id="errmsg" class="label">'.$mob_err.'</p>
		<input type="password" name="password" placeholder="Enter Password">
		<p id="errmsg" class="label">'.$pswd_err.'</p>
		<input type="password" name="conf_password" placeholder="Confirm password">
		<p id="errmsg" class="label">'.$re_pswderr.'</p>';
		}
		?>
		<input type="submit" name="loginbtn" class="submitbtn" value="Sign Up" onclick="num_val()">
		</form>
	    </div>
	</div>

<div class="banner_l">
	<iframe src="https://www.pce.ac.in" class="banner_1"></iframe>
  </div>
<div class="banner_2">
	<iframe src="https://www.pce.ac.in" class="banner_2"></iframe>
  </div>
  <div class="banner_bot">
  	<iframe src="https://www.pce.ac.in" class="banner_bot"></iframe>
  </div>

</body>
<script type="text/javascript">
function num_val(){
	var numstr = document.getElementByName("mobno").value;
	returnValue=true;
	if (numstr.trim()=="") {
		document.getElementById("errmsg").innerHTML="Mandatory field";
		returnValue=false;
	}
	return returnValue;
}
</script>
</html>