<?php  require('db/database.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <style>
        .table-div{
            width: 60%;
            box-shadow:0 0 10px; 
            padding:10px;
            border-radius:5px;
            margin-top:50px;
        }
        .container{
            display:flex;
            justify-content:center;
        }
        h1{
            text-align:center;
            font-family:American Typewriter, serif;
        }
    </style>
</head>
<body>
        <div class="container">
            <div class="table-div">
                <h1>Course Table</h1>
                <table id="userTable" class="display">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Duration(Months)</th>
                            <th>Fees</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        connectDB("v2v");
                        $sql = "SELECT * FROM course";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                        $id = $row['course_code'];
                        $name = $row['course_name'];
                        $dure = $row['duration'];
                        $fees = $row['fees'];
                    ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $dure; ?></td>
                            <td><?php echo $fees; ?></td>
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
<?php closeDB(); ?>