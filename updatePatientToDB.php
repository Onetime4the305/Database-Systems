<!doctype html>

<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>Updating Patient to DB</title>
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

// Get the patient_id from the URL
$patient_id = $_GET['patient_id'];

// Get the updated form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dob = $_POST['dob'];
$ssn = $_POST['ssn'];
$diagnosis = $_POST['diagnosis'];
$phone = $_POST['phone'];

// Update the patient record in the patients table
$sql = "UPDATE patients SET FirstName = '$firstName', LastName = '$lastName', dob = '$dob', ssn = '$ssn', Diagnosis = '$diagnosis', phone = '$phone' WHERE patient_id = '$patient_id'";

if ($conn->query($sql) === TRUE) {
    echo "Patient details updated successfully!";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
        <a href="displayTable.php"><input type="button" id="btn1" value="OK"></a>
    </div>
</body>

</html>
