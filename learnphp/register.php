<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <style>
        * {
            background: #9999;
        }

        h1 {
            text-align:center;
            color:Blue;
        }
        form {
            text-align: center;
            margin:0 auto;
            padding:10% 10% ; 
        }
        input {
            width:100%;
            padding: 2%;
            margin:3%;
            border:1.2px solid #000;
        }

        .btn-submit {
            background: green;
        }

        .btn-reset {
            background: red;
        }
        h2 {
            color:red;
            text-align: center;
        }
    </style>
</head>
<body>

<?php

if($_SERVER["REQUEST_METHOD"]=='POST') {
    $us = $_POST['username'];
    $email = $_POST['email'];
    $fn = $_POST['fullname'];
    $password = $_POST['password'];
    $rpassword = $_POST['repassword'];

    if($password === $rpassword){
        $conn = new mysqli('localhost', 'root', '', 'login_test');
        if($conn){
            $sql = "INSERT INTO register_login  VALUES ('$us', '$email', '$fn', '$password')";
            $result = mysqli_query($conn,$sql);
            if($result){
                echo "<h1 style='color:green;'>Registration Completed</h1>";
            }
        }else {
            echo "<h2>DB not connected<h2>";
        }
    }else {
        echo "<h2>Password Not Matching<h2>";
    }
}


?>

<h1>Register Form</h1>
    
    <form action="register.php" method="post">
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
</body>
</html>

