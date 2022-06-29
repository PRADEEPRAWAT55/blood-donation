<?php
 $user = 'root';
 $password = '';
 $database = 'drblood';
 $servername='localhost';
 $mysqli = new mysqli($servername, $user,
         $password, $database);

 if ($mysqli->connect_error) {
   die('Connect Error (' .$mysqli->connect_errno . ') '.$mysqli->connect_error);
 }
?>
