<?php

session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(isset($_SESSION["adminLoggedIn"]) && $_SESSION["adminLoggedIn"] === true){
    header("location: adminhome.php");
    exit;
}

$db = mysqli_connect('localhost:3306', 'root', 'bestofluck', 'envault');

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$user = "";
$pass = "";
$_SESSION['success'] = "";

if (isset($_POST['sub'])) {
    // receive all input values from the form
    $user = mysqli_real_escape_string($db, $_POST['username']);
    $pass = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($user)) {
			echo "username is required";
		}
	if (empty($pass)) {
			echo "Password is required";
		}

	if (!empty($user) && !empty($pass)) {
			//$pass = md5($password);
			$query = "SELECT * FROM admin WHERE id='$user' AND password='$pass'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['adminLoggedIn'] = true;
				$_SESSION['adminid'] = $user;
				$_SESSION['success'] = "You are now logged in";
				header('location: adminhome.php');
			}else {
				echo "Wrong username/password combination";
			}
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
  <title>Admin Login</title>


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
      <a class="nav-link" href="../contact.php">Contact Us &nbsp;&nbsp;</a>
    </li>
  </ul>
</nav>

	<div class="containbox">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-center">
		<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link active" href="#" style="font-size: 30px">Administrator Login.</a>
    </li>
        </ul>
    </nav>
		<div class="logbox">
		<form method = "post" action="admin.php">
		<input type="text" name="username" placeholder="Enter You Username">
		<input type="password" name="password" placeholder="Enter Password"><br>
		<input type="submit" name="sub" class="submitbtn" style="margin-bottom: 15px">
		<div><a href="adminsignup.php" style="color: #eeeeee; margin-left: -5px">Sign Up for Admin Here.</a></div>
		</form>
	    </div>
	</div>
</body>
</html>