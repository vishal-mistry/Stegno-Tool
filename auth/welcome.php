<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
$list = scandir(getcwd().'/uploads/'.$_SESSION["username"].'/');

    try {
    $dbname ="envault"; //name of database
    $username = "root";
    $password = "bestofluck";
    $host = "localhost:3306";
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // execute the stored procedure
            $sql = 'CALL getvisits()';
            // call the stored procedure
            $q = $pdo->query($sql);
            $q->setFetchMode(PDO::FETCH_ASSOC);
            $r = $q->fetch();
            $visits = $r['visits'];


        } catch (PDOException $e) {
            die("Error occurred:" . $e->getMessage());
        }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/473e8f3a80.js" crossorigin="anonymous"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; background-color: #1c1c1c;}
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
    </style>
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
      <a class="nav-link" href="reset-password.php">Reset Password &nbsp;&nbsp;</a>
    </li>
  </ul>
  <button type="button" onclick="window.location.href = 'logout.php';" class="navbar-btn btn" style="color: black;  background-color: rgb(239,239,239)">Log out</button>
  <big style="color: white;">&nbsp;&nbsp;&nbsp;<?php echo $visits ?> total Visits</big>
</nav>
<div style="margin-top: 100px; margin-left: 50px;">
    <form action="fileUpload.php" class="form-inline" method="post" enctype="multipart/form-data" style="width: 400px;" id="form">
        <div class="custom-file mb-3 form-group">
      <input type="file" class="custom-file-input" name="myfile[]" id="fileToUpload" multiple>
      <label class="custom-file-label" for="customFile">Choose file</label>
    </div>
    <div class="mt-3 form-group">
      <button type="submit" class="btn btn-primary" name="submit" id="trigger"><span class="spinner-border spinner-border-sm" id="loader" style="display: none;"></span> Upload</button>
    </div>
    </form>
    <h3 style="color: white;">Your Files:</h3>
    <ul class="list-group list-group-flush" style="text-align: left;">
    <?php 
    for ($i=2; $i<count($list); $i++) {
     echo '<a href="uploads/'.$_SESSION["username"].'/'.$list[$i].'" class="list-group-item list-group-item-action" style="background-color: #1c1c1c; color: white; font-size: 24px;" download>'.$list[$i].'</a><a href="delete.php?file='.$list[$i].'"><i class="fas fa-trash-alt" style="color: white; font-size: 24px;"></i></a>';
   }
  ?>
</ul>
</div>
</body>
<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
document.querySelector("#form").onsubmit = function() {
    document.querySelector("#loader").style.display="block";
}    
</script>
</html>