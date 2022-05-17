<?php
require 'email/index.php'; 
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
    header("location: admin.php");
    exit;
}

$db = mysqli_connect('localhost:3306', 'root', 'bestofluck', 'envault');

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['status'])) {
    // receive all input values from the form
    $staus = mysqli_real_escape_string($db, $_POST['status'][0]);


    $query = "UPDATE query SET status=".$_POST["status"]." WHERE qid=".$_POST["id"];
    $result = mysqli_query($db, $query);
    } 
?>
<!DOCTYPE HTML>
<html>
<head>

<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Envault 2019">
  <link rel="shortcut icon" href="../images/sqff1bde_128x127.png" type="image/x-icon">
  <title>Admin Portal</title>


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
		color: white;
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
    <li class="nav-item">
      <button type="button" onclick="window.location.href = 'logout.php';" class="btn" style="color: black;  background-color: rgb(239,239,239)">Log out</button>
      <!--   -->
    </li>
  </ul>
</nav>
<?php
$db = mysqli_connect('localhost:3306', 'root', 'bestofluck', 'envault');

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

 $query = "SELECT * FROM query WHERE status=0";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
    echo "<div class='container' style='margin-top: 100px;'><h1 style='color: white'><b>Support Messages/Suggestions from contact form:</b></h1><br>";
    while($row = mysqli_fetch_assoc($result)) {
        echo  '<button type="button" style="background-color: #AB47BC; color: white;" class="btn" data-toggle="collapse" data-target="#x'.$row["qid"].'">From '.$row["name"].'</button>
  <div id="x'.$row["qid"].'" class="collapse"><span class="badge badge-primary">From</span><br>'.$row["email"].',<br><span class="badge badge-primary">Message</span><br>'.$row["message"].'<br><span class="badge badge-primary">Issued At</span><br>'.$row["issued_at"].'
<form method="post">
  <div class="custom-control custom-switch">
    <input type="checkbox" name="status[]" class="custom-control-input" id="switch'.$row["qid"].'" onchange="this.form.submit()" value="1">
    <label class="custom-control-label" for="switch'.$row["qid"].'">Mark As Resolved</label>
  </div><br>
  <input type="hidden" name="id" vlaue="'.$row["qid"].'">
 <a href="email.php?email='.$row["email"].'"><button class="btn btn-primary">Send Email</button></a>
</form>
 </div><br><br>';
    }
    echo "</div>";
} else {
    echo "0 results";
}
?>
</body>
</html>