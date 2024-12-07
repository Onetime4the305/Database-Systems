<!doctype html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <title>Deleting Patient from DB</title>
</head>

<body>
    <div>
<?php
$servername = "localhost";
$username = "jvincent15";
$password = "jvincent15";
$dbname = "jvincent15";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the patient details from the form
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];

// Fetch the patient_id based on first name and last name
$sql = "SELECT patient_id FROM patients WHERE FirstName = '$firstName' AND LastName = '$lastName'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Patient found, delete the record
    $row = $result->fetch_assoc();
    $patient_id = $row['patient_id'];
    
    // Delete the patient record
    $sql = "DELETE FROM patients WHERE patient_id = '$patient_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Patient deleted successfully!";
    } else {
        echo "Error deleting patient: " . $conn->error;
    }
} else {
    echo "No patient found with that name.";
}

$conn->close();
?>
        <a href="displayTable.php"><input type="button" id="btn1" value="OK"></a>
    </div>
</body>

</html>
