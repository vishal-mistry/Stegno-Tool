<?php
require 'email/index.php'; 
email("User","<h3> Hello ".$_GET['email'].", Your request is being reviewed, youl will be notified shortly...</h3>",$_GET['email'],"Envault query");
header("location: adminhome.php");
?>