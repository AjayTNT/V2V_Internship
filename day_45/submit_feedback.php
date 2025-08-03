<?php
$conn = new mysqli("localhost", "root", "", "ikea_furniture");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name     = $_POST['name'];
$email    = $_POST['email'];
$rating   = $_POST['rating'];
$comments = $_POST['comments'];

$sql = "INSERT INTO feedback (name, email, rating, comments) 
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssis", $name, $email, $rating, $comments);

if ($stmt->execute()) {
    global $name;
    echo "$name <br>Thank you for your feedback!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
