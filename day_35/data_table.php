<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
</head>
<body style="height:120vh">
        <div class="container">
            <div style="box-shadow:0 0 10px; padding:10px;border-radius:5px;margin-top:50px;">
                <table id="userTable" class="display">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Course</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        require('connect.php');
                        $sql = "SELECT Id, Name, Phone,Address,Course FROM registration";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                        $id = $row['Id'];
                        $name = $row['Name'];
                        $phone = $row['Phone'];
                        $address = $row['Address'];
                        $course = $row['Course'];
                    ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $address; ?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo $course; ?></td>
                        </tr>
                       <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>