<!doctype html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <title>Deleting Medical Professional from DB</title>
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

// Get the professional details from the form
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];

// Fetch the professional_id based on first name and last name
$sql = "SELECT professional_id FROM MedicalProfessional WHERE FirstName = '$firstName' AND LastName = '$lastName'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Medical professional found, now delete the related data from Doctor or Nurse table
    $row = $result->fetch_assoc();
    $professional_id = $row['professional_id'];

    // First delete from Doctor or Nurse table based on the role
    $roleResult = $conn->query("SELECT Role FROM MedicalProfessional WHERE professional_id = '$professional_id'");
    $roleRow = $roleResult->fetch_assoc();
    $role = $roleRow['Role'];

    if ($role == 'Doctor') {
        // Delete from the Doctor table
        $sql = "DELETE FROM Doctor WHERE professional_id = '$professional_id'";
    } elseif ($role == 'Nurse') {
        // Delete from the Nurse table
        $sql = "DELETE FROM Nurse WHERE professional_id = '$professional_id'";
    }

    // Execute the deletion from the Doctor/Nurse table
    if ($conn->query($sql) === TRUE) {
        // Now delete the record from the MedicalProfessional table
        $sql = "DELETE FROM MedicalProfessional WHERE professional_id = '$professional_id'";
        if ($conn->query($sql) === TRUE) {
            echo "Medical professional deleted successfully!";
        } else {
            echo "Error deleting from MedicalProfessional: " . $conn->error;
        }
    } else {
        echo "Error deleting from Doctor/Nurse table: " . $conn->error;
    }
} else {
    echo "No medical professional found with that name.";
}

$conn->close();
?>
        <a href="displayTable.php"><input type="button" id="btn1" value="OK"></a>
    </div>
</body>

</html>
