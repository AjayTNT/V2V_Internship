<?php
include("./db.php");
header('Content-Type: application/json');
$result = ['success' => false, 'message' => ''];

$name     = $_POST['name'];
$email    = $_POST['email'];
$order_id = $_POST['order_id'];
$issue    = $_POST['issue'];

$sql = "INSERT INTO complaints (name, email, order_id, issue) 
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $order_id, $issue);

if ($stmt->execute()) {
   $result['success'] = true;
    $result['message'] = 'Complaint submitted successfully!';
} else {
    $result['message'] = "Error: " . $stmt->error;
}
echo json_encode($result);

$stmt->close();
mysqli_close($conn);
?>
