<?php
session_start(); // Start the session

require_once "db.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user_table WHERE `Name` = ? AND `Password` = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Authentication successful
        $_SESSION['username'] = $username; // Store the username in the session
        header("Location: privatePage.php"); // Redirect to privatePage.html
        exit();
    } else {
        // Authentication failed
        echo "Invalid username or password";
    }

    $stmt->close();
}

$conn->close();
?>
