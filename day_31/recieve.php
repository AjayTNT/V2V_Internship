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
$add = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$course = $_POST['course'];
$gender = $_POST['gender'];

$sql = "INSERT INTO Registration(name,address,phone,email,course,gender)
VALUES ('$name','$add','$phone','$email','$course','$gender')";
if (mysqli_query($conn, $sql)) {
  global $name;
  echo "
    <div style='height: 90vh;width: 90vw; display: flex;justify-content: center;align-items: center;'>
        <div
            style='height: 60%;width: 40%;border: solid black 1px;background: linear-gradient(#f4f491, #ffa500, #ee6c9f);border-radius: 10px;display: flex;justify-content: center;align-items: center;flex-direction: column;'>
            <h1>Hello: $name</h1>
            <p>Your Record is updated successfully</p>
        </div>
    </div>
  ";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>