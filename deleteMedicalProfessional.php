<!doctype html>

<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>Deleting Medical Professional from DB</title>
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

// Get the professional_id from the URL
$professional_id = $_GET['professional_id'];

// First, delete the related data from Doctor or Nurse table
$sql = "DELETE FROM Doctor WHERE professional_id = '$professional_id'";
if ($conn->query($sql) === TRUE) {
    // Then, delete the record from MedicalProfessional table
    $sql = "DELETE FROM MedicalProfessional WHERE professional_id = '$professional_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Medical professional deleted successfully!";
    } else {
        echo "Error deleting medical professional: " . $conn->error;
    }
} elseif ($conn->query("DELETE FROM Nurse WHERE professional_id = '$professional_id'") === TRUE) {
    // If not a Doctor, delete from Nurse table
    $sql = "DELETE FROM MedicalProfessional WHERE professional_id = '$professional_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Medical professional deleted successfully!";
    } else {
        echo "Error deleting medical professional: " . $conn->error;
    }
} else {
    echo "Error deleting related records: " . $conn->error;
}

$conn->close();
?>
        <a href="displayTable.php"><input type="button" id="btn1" value="OK"></a>
    </div>
</body>

</html>
