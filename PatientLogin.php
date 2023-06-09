<?php
require_once("connect.php"); // Assuming "connect.php" contains the database connection code
$Username = $_POST['Username'];

// Prepare and execute the SQL query to check if the name exists in the "patients" table
$sql = "SELECT * FROM patients WHERE Username = '$Username'";
$result = $conn->query($sql);

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // Username exists, redirect to the patient home page
    header("Location: PatientHome.html?name=" . urlencode($Username));
    $_SESSION['Username'] = $Username;
    exit(); // Stop further execution of the script
} else {
    // Username does not exist, display an error message
    echo "Invalid username.";
}

// Close the database connection
$conn->close();
?>

