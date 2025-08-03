<?php 
      session_start();       
      include('./db.php');
      $user = $_POST['user'];
      $pass = $_POST['password'];
      $sql = "SELECT * FROM employee_login where user='$user' and password = '$pass'";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['role'] = $row['role'];
            $id = $row['emp_id'];
            $sql = "SELECT emp_name FROM employee where emp_id = $id";
            $result = mysqli_query($conn, $sql);
            $emp = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $emp['emp_name'];
            $date = new DateTime($emp['joining_date']);
            $formatedDate = $date->format('M. Y');
            $_SESSION['joiningDate'] = $formatedDate;
            header("Location: ./index.php");
      }else{
         echo "Invalid Username/password";
      }

      mysqli_close($conn);
     
?>