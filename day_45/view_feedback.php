<?php
$conn = new mysqli("localhost", "root", "", "ikea_furniture");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM feedback");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Feedback Table</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container-flued">
  <h2 class="mb-4">Customer Feedback</h2>
  <table id="dataTable" class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Rating</th>
        <th>Comments</th>
        <th>Submitted At</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['rating']) ?></td>
        <td><?= htmlspecialchars($row['comments']) ?></td>
        <td><?= $row['submitted_at'] ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<script>
  $(document).ready(function () {
    $('#dataTable').DataTable();
  });
</script>
</body>
</html>
