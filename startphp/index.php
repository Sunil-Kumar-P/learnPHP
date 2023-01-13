<?php
session_start();
require_once 'conn.php';

if(!empty($_SESSION['user'])){
    $user = $_SESSION['user'];
    $result = mysqli_query($conn, "SELECT * FROM register_login WHERE username = '$user'");
    $row = mysqli_fetch_assoc($result);
}
else {
    header('Location:login.php');
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
<h1>Welcome <?php echo $user; ?></h1>
<a href="logout.php">Logout</a>
</body>
</html>