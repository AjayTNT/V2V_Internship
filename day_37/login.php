<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }

        input,
        label {
            font-size: 1.3rem;
            display: block;
            height: 30px;
            width: 80%;
            margin: auto;
            margin-bottom: 10px;
        }

        form {
            width: 400px;
            height: 500px;
            border-radius: 10px;
            box-shadow: 0 0 8px;
        }

        .sub {
            height: 40px;
            width: 40%;
            margin: 40px 0 0 35px;
            background-color: rgb(100, 128, 255);
        }
        p{
            margin:30px 0 0 35px;
            color:red;
            font-size:1.3rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="login.php" method="post">
            <h1 style="margin-left: 30px;">Login</h1>
            <label for="username">User:</label>
            <input type="text" name="username" id="username" required>
            <label for="password">password:</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Submit" class="sub" name="sub">
        
            <?php 
                if(isset($_POST['sub'])){
                    include('database.php');
                    $user = $_POST['username'];
                    $pass = $_POST['password'];
                    connectDB("v2v");
                    $sql = "SELECT * FROM admin where user='$user' and password = '$pass'";
                    $result = mysqli_query($conn, $sql);
                    $_SESSION["user"]=null;
                    if(mysqli_num_rows($result) == 1){
                        $_SESSION["user"]= $user;
                        header("location:logedin.php");
                    }else{
                        echo"<P>Login Fail</p>";
                    }
                    closeDB();
                }
            ?>

       </form>
    </div>
</body>
</html>

