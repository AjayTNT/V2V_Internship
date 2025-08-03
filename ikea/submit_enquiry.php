<?php
include("./db.php");
header('Content-Type: application/json');
$result = ['success' => false, 'message' => ''];


$name     = $_POST['name'];
$email    = $_POST['email'];
$phone    = $_POST['phone'];
$product  = $_POST['product'];
$message  = $_POST['message'];


$sql = "INSERT INTO enquiries (name, email, phone, product, message) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $phone, $product, $message);


if ($stmt->execute()) {
   $result['success'] = true;
    $result['message'] = 'Enquiry submitted successfully!';
} else {
    $result['message'] = "Error: " . $stmt->error;
}
echo json_encode($result);
$stmt->close();
mysqli_close($conn);
?>
