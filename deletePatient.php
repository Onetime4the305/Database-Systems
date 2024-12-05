<!doctype html>

<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>Deleting Patient from DB</title>
</head>

<body>
    <div>
<?php
$servername = "localhost";
$username = "root";
$password = "B@ller04221974";
$dbname = "HospitalManagement";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the patient_id from the URL
$patient_id = $_GET['patient_id'];

// Delete the record from the patients table
$sql = "DELETE FROM patients WHERE patient_id = '$patient_id'";

if ($conn->query($sql) === TRUE) {
    echo "Patient deleted successfully!";
} else {
    echo "Error deleting patient: " . $conn->error;
}

$conn->close();
?>
        <a href="displayTable.php"><input type="button" id="btn1" value="OK"></a>
    </div>
</body>

</html>
