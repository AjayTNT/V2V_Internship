<?php
// Connect to database
$conn = new mysqli("localhost", "root", "", "ikea_furniture");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch form data
$name     = $_POST['name'];
$email    = $_POST['email'];
$phone    = $_POST['phone'];
$product  = $_POST['product'];
$message  = $_POST['message'];

// Insert query
$sql = "INSERT INTO enquiries (name, email, phone, product, message) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $phone, $product, $message);

// Execute and respond
if ($stmt->execute()) {
    global $name;
    echo "$name <br>Thank you! Your enquiry has been submitted.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
