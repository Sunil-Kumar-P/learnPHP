<?php

require_once 'conn.php';

if($_SERVER["REQUEST_METHOD"] == 'POST') {
    $user = $_POST['username'];
    $passwd = $_POST['password'];

    $sql = "SELECT * FROM `register_login` WHERE `username`='$user'; ";
    $result = mysqli_query($conn,$sql);

    if ($result->num_rows>0) {
        echo "in";
        while($row = $result->fetch_assoc()) {
            $username = $row['username'];
            $password = $row['password'];
            if($passwd == $password ){
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['user'] = $user;
                
                // echo "<script> alert('Login Successful');</script>";
                header('location: index.php'); 
            }
            else {
                echo "<script> alert('Incorrect Password');</script>";
            }
        }
    } else {
        echo "<script> alert('User Not Registered');</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
      <style>
    body {
        text-align: center;
        margin: 10% auto;
    }

    </style>
   
</head>

<body>


    <h1>Login Form</h1>

    <form action="login.php" method="post">
        <label for="Username">Username</label>
        <input type="text" name="username" required><br>

        <label for="Password">Password</label>
        <input type="password" name="password" required><br>


        <input type="submit" name="submit" value="Login">
        <input type="reset"  value="reset">
    </form><br>
    <a href="registration.php">Register</a>
</body>

</html>