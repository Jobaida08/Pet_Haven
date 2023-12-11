<?php
session_start();
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = isset($_POST["first_name"]) ? $_POST["first_name"] : "";
    $last_name = isset($_POST["last_name"]) ? $_POST["last_name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $contact_number = isset($_POST["number"]) ? $_POST["number"] : "";
    $password = isset($_POST["password"]) ? password_hash($_POST["password"], PASSWORD_BCRYPT) : "";

    $sql = "INSERT INTO new_user (first_name, last_name, email, contact_number, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssss", $first_name, $last_name, $email, $contact_number, $password);
    $stmt->execute();

    echo "Registration successful";

    $stmt->close();
}

$conn->close();
?>
