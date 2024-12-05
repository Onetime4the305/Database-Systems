<!doctype html>

<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>Update Medical Professional</title>
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

// Get the id from the URL
$professional_id = $_GET['professional_id'];

// Fetch current details of the medical professional
$sql = "SELECT * FROM MedicalProfessional WHERE professional_id = '$professional_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No records found.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the updated form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $role = $_POST['role'];
    $department = $_POST['department'];
    $nurseGrade = $_POST['nurseGrade'];

    // Update MedicalProfessional table
    $sql = "UPDATE MedicalProfessional SET FirstName = '$firstName', LastName = '$lastName', Role = '$role' WHERE professional_id = '$professional_id'";

    if ($conn->query($sql) === TRUE) {
        // Update related Doctor or Nurse tables if necessary
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
}

$conn->close();
?>
        <form action="updateMedicalProfessional.php?professional_id=<?php echo $professional_id; ?>" method="post">
            <h3>Update Medical Professional</h3>
            <p>First Name: <input name="firstName" type="text" value="<?php echo $row['FirstName']; ?>" required></p>
            <p>Last Name: <input name="lastName" type="text" value="<?php echo $row['LastName']; ?>" required></p>
            <p>Role: 
                <select name="role" required>
                    <option value="Doctor" <?php if ($row['Role'] == 'Doctor') echo 'selected'; ?>>Doctor</option>
                    <option value="Nurse" <?php if ($row['Role'] == 'Nurse') echo 'selected'; ?>>Nurse</option>
                </select>
            </p>
            <p>Department (for Doctor only): <input name="department" type="text" value="<?php echo $row['Department']; ?>"></p>
            <p>Nurse Grade (for Nurse only): <input name="nurseGrade" type="text" value="<?php echo $row['nurse_grade']; ?>"></p>
            <input type="submit" id="btn3" value="Update">
            <a href="displayTable.php"><input type="button" id="btn1" value="Cancel"></a>
        </form>
    </div>
</body>

</html>
