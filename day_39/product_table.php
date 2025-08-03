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
            width: 80%;
            box-shadow:0 0 5px grey; 
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
        h1 span{
            
            margin-left:10px;
        }
    </style>
</head>
<body>
        <div class="container">
            <div class="table-div">
                <h1>Products<span><i class="fa-solid fa-couch"></i></span></h1>
                <table id="userTable" class="display">
                    <thead class="bg-success">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Available Qnt</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        connectDB("ikea_furniture");
                        $sql = "SELECT * FROM products";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                        $id = $row['product_id'];
                        $name = $row['product_name'];
                        $cat = $row['category'];
                        $mrp = $row['price'];
                        $qnt = $row['stock_quantity'];
                        $des = $row['description'];
                    ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $cat; ?></td>
                            <td><?php echo $mrp; ?></td>
                            <td><?php echo $qnt; ?></td>
                            <td><?php echo $des; ?></td>
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