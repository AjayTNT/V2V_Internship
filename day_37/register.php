<!DOCTYPE html>
<html>

<head>
    <title>User Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f3f3;
            padding: 20px;
        }

        .form-container {
            background-color: #ffffff;
            padding: 25px;
            max-width: 500px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .sub {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>User Information Form</h2>
        <form action="register.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required pattern="[0-9]{10}"
                title="Enter a 10-digit phone number">

            <label for="aadhaar">Aadhar Number:</label>
            <input type="text" id="aadhaar" name="aadhaar" placeholder="Enter your Aadhar number" required
                pattern="[0-9]{12}" title="Enter a 12-digit Aadhar number">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" placeholder="Enter your address" required></textarea>

            <input type="submit" value="Submit" name="sub" class="sub">
            <?php
            if(isset($_POST['sub'])){
                include('database.php');
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $aadhaar = $_POST['aadhaar'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                connectDB("v2v");
                $sql = "INSERT INTO users(name,phone,aadhaar,email,address)
                 VALUES('$name','$phone','$aadhaar','$email','$address')";
                 if (mysqli_query($conn, $sql)) {
                  echo "<p stlyle='color:green;font-size:1.2rem;'>Record Inserted Successfully</p>";
                } else {
                  echo "<p stlyle='color:red;font-size:1.2rem;'>Something went wrong<br>
                         Record not inserted</p>";
                }
                closeDB();
            }
            ?>
        </form>
    </div>

</body>

</html>
