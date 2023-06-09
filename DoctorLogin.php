<?php
require_once("connect.php"); // Assuming "connect.php" contains the database connection code
$Username = $_POST['Username'];

// Prepare and execute the SQL query to check if the name exists in the table
$sql = "SELECT * FROM doctor WHERE Username = '$Username'";
$result = $conn->query($sql);

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // Name exists, redirect to the patient home page
    $_SESSION['Username'] = $Username;
    header("Location: DoctorHome.html?Username=" . urlencode($Username));
    exit(); // Stop further execution of the script
} else {
    // Name does not exist, display an error message
    echo "Invalid Username.";
}

// Close the database connection
$conn->close();
?>
