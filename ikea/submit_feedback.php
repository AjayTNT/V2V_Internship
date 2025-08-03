<?php
include("./db.php");
header('Content-Type: application/json');
$result = ['success' => false, 'message' => ''];

$name     = $_POST['name'];
$email    = $_POST['email'];
$ord    = $_POST['order_id'];
$rating   = $_POST['rating'];
$comments = $_POST['comments'];

$sql = "INSERT INTO feedback (name, email, order_id, rating, comments) 
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $email, $ord, $rating, $comments);

if ($stmt->execute()) {
   $result['success'] = true;
    $result['message'] = 'Feedback submitted successfully!';
} else {
    $result['message'] = "Error: " . $stmt->error;
}
echo json_encode($result);
$stmt->close();
mysqli_close($conn);
?>
