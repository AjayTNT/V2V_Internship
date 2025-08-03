<?php
$server="localhost";
$user="root";
$password="";
$db="hospital";
$conn = mysqli_connect($server, $user, $password,$db);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$id = $_POST['pid'];
$name = $_POST['pname'];
$age = $_POST['page'];
$gender = $_POST['pgender'];
$phone = $_POST['pnum'];
$symp = $_POST['symp'];

$sql = "INSERT INTO patient(patient_id,patient_name,age,gender,phone,symptoms)
VALUES ('$id','$name','$age','$gender','$phone','$symp')";
if (mysqli_query($conn, $sql)) {
  global $name;
  echo "<h2>New Patient Registered successfully</h2>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>