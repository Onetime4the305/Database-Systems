<!doctype html>

<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>Update Patient</title>
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

// Fetch current details of the patient
$sql = "SELECT * FROM patients WHERE patient_id = '$patient_id'";
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
    $dob = $_POST['dob'];
    $ssn = $_POST['ssn'];
    $diagnosis = $_POST['diagnosis'];
    $phone = $_POST['phone'];

    // Update the patient table
    $sql = "UPDATE patients SET FirstName = '$firstName', LastName = '$lastName', dob = '$dob', ssn = '$ssn', Diagnosis = '$diagnosis', phone = '$phone' WHERE patient_id = '$patient_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Patient details updated successfully!";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>
        <form action="updatePatient.php?patient_id=<?php echo $patient_id; ?>" method="post">
            <h3>Update Patient</h3>
            <p>First Name: <input name="firstName" type="text" value="<?php echo $row['FirstName']; ?>" required></p>
            <p>Last Name: <input name="lastName" type="text" value="<?php echo $row['LastName']; ?>" required></p>
            <p>Date of Birth: <input name="dob" type="date" value="<?php echo $row['dob']; ?>" required></p>
            <p>SSN: <input name="ssn" type="text" value="<?php echo $row['ssn']; ?>" required></p>
            <p>Diagnosis: <input name="diagnosis" type="text" value="<?php echo $row['Diagnosis']; ?>" required></p>
            <p>Phone: <input name="phone" type="text" value="<?php echo $row['phone']; ?>" required></p>
            <input type="submit" id="btn3" value="Update">
            <a href="displayTable.php"><input type="button" id="btn1" value="Cancel"></a>
        </form>
    </div>
</body>

</html>
