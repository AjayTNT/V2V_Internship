<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <br><br>
    <form action="" method="POST">
        <div class="container">
            <div class="row">
                <table id="example" class="table table-striped table-bordered">
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
                        <?php}?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</body>
</html>