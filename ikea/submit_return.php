<?php
$conn = new mysqli("localhost", "root", "", "ikea_furniture");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
header('Content-Type: application/json');
$result = ['success' => false, 'message' => ''];

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
   $result['success'] = true;
    $result['message'] = 'Return Request submitted successfully!';
} else {
    $result['message'] = "Error: " . $stmt->error;
}
echo json_encode($result);

$stmt->close();
mysqli_close($conn);
?>
