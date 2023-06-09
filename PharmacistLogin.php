<?php
require_once("connect.php"); 

// Get the submitted username and password from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// Query the database to check if the username and password exist
$query = "SELECT * FROM pharmacist WHERE Username='$username' AND Password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // User exists, display welcome message and link to the home page
    $_SESSION['username'] = $username;
    echo "Welcome, " . $username . "!<br>";

    header("Location: PharmacistHome.html?username=" . urlencode($username));
} else {
    // Invalid username or password, display error message
    echo "Invalid username or password.";
}

// Close the database connection
mysqli_close($conn);
?>
