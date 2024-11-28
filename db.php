<?php
$servername = "localhost";
$username = "root";
$password = "B@ller04221974"; // ensure this is the correct password
$dbname = "HospitalManagement";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}
?>

