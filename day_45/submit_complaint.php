<?php
$conn = new mysqli("localhost", "root", "", "ikea_furniture");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name     = $_POST['name'];
$email    = $_POST['email'];
$order_id = $_POST['order_id'];
$issue    = $_POST['issue'];

$sql = "INSERT INTO complaints (name, email, order_id, issue) 
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $order_id, $issue);

if ($stmt->execute()) {
    global $name;
    echo " $name <br> Your Complaint submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
