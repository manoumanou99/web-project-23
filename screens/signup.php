<?php
session_start();
include("connection.php");
include("functions.php");

// ///Retrieve form data
// if (isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['password'])) {
//     $name = $_POST['user_name'];
//     $email = $_POST['user_email'];
//     $password = $_POST['password'];
// } else {
//     echo "Please fill out all required fields.";
// }

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    var_dump($_POST);
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password = $_POST['password'];

    if (!empty($name) && !empty($password) && !is_numeric($name)) {
        //save to database

        $conn = new mysqli('localhost', 'root', '', 'login_sample_db');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO users (user_name,user_email,password) 
            VALUES ('$name','$email','$password')";


        mysqli_query($conn, $sql);

        header("Location: login.php");
        die;
    }
} else {
    echo "Please enter some valid information!";
}

?>



<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <script src="../scripts/validateForm.js"></script>
</head>

<body>
    <div class="container">
        <h1>Sign Up</h1>
        <form action="#" method="POST" onsubmit="return validateForm()">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" name="user_name" required>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="user_email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <p id="password-error" class="error"></p>
            <button type="submit" class="btn">Sign Up</button>
        </form>
    </div>
</body>

</html>