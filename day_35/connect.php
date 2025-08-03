<?php
function greet($dbname) {
$server="localhost";
$user="root";
$password="";
$db= $dbname;
$conn = mysqli_connect($server, $user, $password,$db);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
}
?>