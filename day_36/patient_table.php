<?php  require('database.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <style>
        .table-div{
            width: 60%;
            box-shadow:0 0 10px green; 
            padding:10px;
            border-radius:5px;
            margin-top:50px;
        }
        .container{
            display:flex;
            justify-content:center;
        }
        h1{
            color:grey;
            text-align:center;
            font-family:American Typewriter, serif;
        }
        h1 span{
            
            margin-left:10px;
        }
    </style>
</head>
<body>
        <div class="container">
            <div class="table-div">
                <h1>Patient Table<span><i class="fa-solid fa-bed-pulse"></i></span></h1>
                <table id="userTable" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Symptoms</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        connectDB("hospital");
                        $sql = "SELECT * FROM patient";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                        $id = $row['patient_id'];
                        $name = $row['patient_name'];
                        $age = $row['age'];
                        $gen = $row['gender'];
                        $phone = $row['phone'];
                        $symp = $row['symptoms'];
                    ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $age; ?></td>
                            <td><?php echo $gen; ?></td>
                            <td><?php echo $phone; ?></td>
                            <td><?php echo $symp; ?></td>
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