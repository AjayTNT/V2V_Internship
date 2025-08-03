<?php
$server="localhost";
$user="root";
$password="";
$db="v2v";
$conn = mysqli_connect($server, $user, $password,$db);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$code = $_POST['code'];
$name = $_POST['name'];
$dur = $_POST['dur'];
$fees = $_POST['fees'];

$sql = "INSERT INTO course(course_code,course_name,duration,fees)
VALUES ('$code','$name','$dur','$fees')";
if (mysqli_query($conn, $sql)) {
  global $name;
  echo "<h2>New Course inserted successfully</h2>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>