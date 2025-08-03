<?php
$server="localhost";
$user="root";
$password="";
$db="v2v";
$conn = mysqli_connect($server, $user, $password,$db);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * from registration";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)){
    echo "ID: ".$row['Id']."<br>";
    echo "Name: ".$row['Name']."<br>";
    echo "Phone: ".$row['Phone']."<br>";
    echo "Email: ".$row['Email']."<br>";
    echo "Course: ".$row['Course']."<br>";
    echo "Address: ".$row['Address']."<br>";
    echo "<br><br>";
  }
} else {
  echo "No Data Available";
}
mysqli_close($conn);
?>