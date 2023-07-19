<?php
include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $user_email = $_POST['email'];
    $password = $_POST["password"];


    //connection with server
    $conn = new mysqli('localhost', 'root', '', 'login_sample_db');


    // check connection
    if ($conn->connect_error) { {
            die("connection failed");
        }
    }
    $sql = "SELECT * from users WHERE user_email = '$user_email' and password = '$password'";


    // execute query
    //$row = mysqli_fetch_array($sql);
    mysqli_query($conn, $sql);
    session_start();
    header("Location: main.php");
    die;
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login-style.css">
    <script src="../scripts/validateForm.js"></script>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form action="#" method="POST">
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
            <p class="message">Don't have an account? <a href="../screens/signup.php">Sign Up</a></p>
        </form>
    </div>
</body>

</html>