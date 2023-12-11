<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet_haven";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['login'])) {
  
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User authenticated successfully, redirect to another page
        header("Location: ../home.html");
        exit();
    } else {
        // Authentication failed, display error message
        echo "Incorrect username or password";
    }
}

$conn->close();
?>
