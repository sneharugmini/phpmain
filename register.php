<?php
require_once "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize inputs
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    
    // Validate inputs
    
    // Check if the username already exists
    $checkUsernameQuery = "SELECT * FROM admin WHERE username = '$username'";
    $checkResult = $conn->query($checkUsernameQuery);
    
    if ($checkResult->num_rows > 0) {
        echo "Username already exists.";
    } else {
        // Insert user data into the admin table
        $insertQuery = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";
        
        if ($conn->query($insertQuery) === TRUE) {
            echo "Registration successful.";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>
