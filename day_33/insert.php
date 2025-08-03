<?php
$server="localhost";
$user="root";
$password="";
$db="v2v";
$conn = mysqli_connect($server, $user, $password,$db);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$designation = $_POST['designation'];
$add = $_POST['add'];

$sql = "INSERT INTO employee(emp_name,emp_phone,emp_email,designation,address)
VALUES ('$name','$phone','$email','$designation','$add')";
if (mysqli_query($conn, $sql)) {
  global $name;
  echo "<h2>Record inserted successfully</h2>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>