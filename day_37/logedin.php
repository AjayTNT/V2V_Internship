<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user:<?php echo $_SESSION['user']?></title>
</head>
<body>
<h1>Welcome <?php echo $_SESSION['user']?></h1>
    
</body>
</html>