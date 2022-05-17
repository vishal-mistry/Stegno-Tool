<?php

$host="localhost:3306";
$username="root";
$password="bestofluck";
$db_name="envault";
$con=mysqli_connect($host,$username,$password,$db_name)or die("cannot connect"); 
$uid = $_POST["uid"];
$pid = $_POST["passid"];
$SQL = "SELECT email, password FROM tsql WHERE email = '$uid' and password = '$pid' ";

$result = mysqli_query($con,$SQL);


if(mysqli_num_rows($result)>0){
echo "SUCCESSFULLY LOGGED IN";
}
else
  echo "Invalid user id or password";

?>


