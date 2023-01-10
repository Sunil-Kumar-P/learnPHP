<?php

require_once 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $us = $_POST['username'];
    $email = $_POST['email'];
    $fn = $_POST['fullname'];
    $password = $_POST['password'];
    $rpassword = $_POST['repassword'];

    $checkonce = mysqli_query($conn, "SELECT * FROM register_login WHERE username = '$us'");
    if (mysqli_num_rows($checkonce) > 0) {
        echo "<script>alert('Username or Email already Taken');</script>";
    } else {
        if ($password === $rpassword) {
            $sql = "INSERT INTO register_login  VALUES ('','$us', '$email', '$fn', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script> alert('Registration Completed');</script>";
            }
        } else {
            echo "<script> alert('Password Not Matching');</script>";
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <style>
        body {
            text-align: center;
            margin: 10% auto;
        }
    </style>

</head>

<body>


    <h1>Register Form</h1>

    <form action="registration.php" method="post">
        <label for="Username">Username</label>
        <input type="text" name="username" id=""><br>

        <label for="Email">Email</label>
        <input type="email" name="email" id=""><br>

        <label for="Full Name">Full Name</label>
        <input type="text" name="fullname" id=""><br>

        <label for="Password">Password</label>
        <input type="password" name="password" id=""><br>

        <label for="Re-type Password">Re-type Password</label>
        <input type="password" name="repassword" id=""><br>

        <input type="submit" class="btn-submit" value="Register">
        <input type="reset" class="btn-reset" value="reset">
    </form>

    <a href="login.php">Login</a>
</body>

</html>