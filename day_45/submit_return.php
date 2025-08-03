<?php
$conn = new mysqli("localhost", "root", "", "ikea_furniture");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name     = $_POST['name'];
$email    = $_POST['email'];
$phone    = $_POST['phone'];
$order_id = $_POST['order_id'];
$reason   = $_POST['reason'];
$details  = $_POST['details'];

$sql = "INSERT INTO returns (name, email, phone, order_id, reason, details) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $email, $phone, $order_id, $reason, $details);

if ($stmt->execute()) {
    global $name;
    echo "$name <br> Return request submitted!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
