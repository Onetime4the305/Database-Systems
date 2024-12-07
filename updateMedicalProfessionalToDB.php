<!doctype html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <title>Updating Medical Professional to DB</title>
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

// Get the professional_id from the URL
$professional_id = $_GET['professional_id'];

// Get the updated form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$role = $_POST['role'];
$department = $_POST['department'];
$nurseGrade = $_POST['nurseGrade'];

// Update the MedicalProfessional table
$sql = "UPDATE MedicalProfessional SET FirstName = '$firstName', LastName = '$lastName', Role = '$role' WHERE professional_id = '$professional_id'";

if ($conn->query($sql) === TRUE) {
    // Now update the Doctor or Nurse table based on the role
    if ($role == 'Doctor') {
        $sql = "UPDATE Doctor SET Department = '$department' WHERE professional_id = '$professional_id'";
    } elseif ($role == 'Nurse') {
        $sql = "UPDATE Nurse SET nurse_grade = '$nurseGrade' WHERE professional_id = '$professional_id'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Medical professional details updated successfully!";
    } else {
        echo "Error updating related table: " . $conn->error;
    }
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
        <a href="displayTable.php"><input type="button" id="btn1" value="OK"></a>
    </div>
</body>

</html>
