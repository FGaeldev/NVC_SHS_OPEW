<?php
$host = "localhost";
$dbname = "oes_db";
$username = "root";
$password = "";

$mysqli = mysqli_connect($host, $username, $password, $dbname);
if(mysqli_connect_errno()){
  die("Connection Error: " . mysqli_connect_error());
}

return $mysqli;
?>