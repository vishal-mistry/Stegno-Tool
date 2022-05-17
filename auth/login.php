<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
require_once "config.php";
 
$username = $password = "";
$username_err = $password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["uname"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["uname"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
        
        $sql = "SELECT id, email, password FROM register WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
           
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            
            $param_username = $username;
            
           
            if(mysqli_stmt_execute($stmt)){
                
                mysqli_stmt_store_result($stmt);
                
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            
                           	if (isset($_POST["rememberme"])){
                            	session_start();
                            
                            	$_SESSION["loggedin"] = true;
                            	$_SESSION["id"] = $id;
                            	$_SESSION["username"] = $username;                            
                            
                            	header("location: welcome.php");
                        	}else{
                        		session_start();
                            
                            	$_SESSION["loggedin"] = true;
                            	$_SESSION["id"] = $id;
                            	$_SESSION["username"] = $username;
                				header("location: welcome.php");
                        	}
                        } else{
                            
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($link);
}
?>

<!DOCTYPE HTML>
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Envault 2019">
  <link rel="shortcut icon" href="../images/sqff1bde_128x127.png" type="image/x-icon">
  <title>Login to Envault</title>

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
      <a class="nav-link active" href="login.php"><big><big><b>Log In</b></big></big></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">&nbsp;</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="signup.php"><big><big><b>Sign up</b></big></big></a>
    </li>
        </ul>
    </nav>
		<div class="logbox">
		<form method= "post">
		<input type="text" name="uname" placeholder="Enter Username" onblur= "ajaxfunction(this.value);">
		<p id="emailerr" class="label"><?php echo $username_err; ?></p>
		<input type="password" name="password" placeholder="Enter Password">
		<p id="emailerr" class="label"><?php echo $password_err; ?></p>
		<input type="submit" name="loginbtn" class="submitbtn" value="Login"><br><br>
		<p style="color: #eeeeee;margin-left: -10px;margin-bottom: 25px;"><input type="checkbox" name="rememberme">Remember me!</p>
		<div><a href="login.php" style="color: #eeeeee; margin-left: -5px">Forgot password?</a></div>
        <div><a href="admin.php" style="color: #eeeeee; margin-left: -5px">Admin? login here</a></div>
		<p class="label" id="emailerr"></p>
	    </form>
	    </div>
	</div>
  <div>
    <iframe src="https://www.pce.ac.in" class="banner_1"></iframe>
  </div>
  <div>
    <iframe src="https://www.pce.ac.in" class="banner_bot"></iframe>
  </div>

</body>