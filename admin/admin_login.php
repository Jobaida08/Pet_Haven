<?php
// Include the database connection logic here
$servername = "localhost"; // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "pet_haven"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize the error message
$errorMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $adminId = $_POST['admin-id'];
    $password = $_POST['password'];

    // Perform authentication logic here
    $sql = "SELECT * FROM admin_table WHERE admin_id = '$adminId' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Authentication successful
        header("Location: admin.html");
        exit();
    } else {
        // Authentication failed, set error message
        $errorMessage = "Invalid admin ID or password";
    }
}

// Close the database connection
$conn->close();
?>

<!-- Include the HTML form -->
<?php if (!empty($errorMessage)): ?>
    <p style="color: red;"><?php echo $errorMessage; ?></p>
<?php endif; ?>