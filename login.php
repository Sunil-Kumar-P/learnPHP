<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
    * {
        background: #9999;
    }

    h1 {
        text-align: center;
        color: Blue;
    }

    form {
        text-align: center;
        margin: 0 auto;
        padding: 10% 10%;
    }

    input {
        width: 100%;
        padding: 2%;
        margin: 3%;
        border: 1.2px solid #000;
    }

    .btn-submit {
        background: green;
    }

    .btn-reset {
        background: red;
    }

    h2 {
        color: red;
        text-align: center;
    }
    </style>
</head>

<body>

    <?php

if($_SERVER["REQUEST_METHOD"]=='POST') {
    $us = $_POST['username'];
    $passwd = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'login_test');
    if(!$conn){
        echo "<h2>DB not connected<h2>";
    }
    $sql = "SELECT * FROM register_login";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $username = $row['username'];
            $password = $row['password'];
            if($us === $username && $passwd == $password ){
                echo "login Successfull ";
            }
        }
    } 
}
?>

    <h1>Login Form</h1>

    <form action="login.php" method="post">
        <label for="Username">Username</label>
        <input type="text" name="username" id=""><br>

        <label for="Password">Password</label>
        <input type="password" name="password" id=""><br>


        <input type="submit" class="btn-submit" value="Login">
        <input type="reset" class="btn-reset" value="reset">
    </form>
</body>

</html>