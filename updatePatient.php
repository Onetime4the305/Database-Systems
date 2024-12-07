<!doctype html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <title>Update Patient</title>
</head>

<body>
    <div>
        <form action="updatePatient.php" method="post">
            <h3>Find Patient to Update</h3>
            <p>First Name: <input name="firstName" type="text" required></p>
            <p>Last Name: <input name="lastName" type="text" required></p>
            <input type="submit" value="Search">
        </form>

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the patient's first and last name from the form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    // Query to check if patient exists in the database
    $sql = "SELECT patient_id, FirstName, LastName FROM patients WHERE FirstName = '$firstName' AND LastName = '$lastName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Patient found
        $row = $result->fetch_assoc();
        echo "<h3>Patient Found: " . $row['FirstName'] . " " . $row['LastName'] . "</h3>";
        echo "<form action='updatePatient.php?patient_id=" . $row['patient_id'] . "' method='post'>";
        echo "<p>Do you want to update this record? <input type='submit' name='confirmUpdate' value='Yes'> <a href='displayTable.php'><input type='button' value='No'></a></p>";
        echo "</form>";
    } else {
        echo "<p>No patient found with that name.</p>";
    }
}

if (isset($_POST['confirmUpdate'])) {
    // Fetch patient_id from URL and display the update form
    $patient_id = $_GET['patient_id'];

    // Query to fetch the current details of the patient
    $sql = "SELECT * FROM patients WHERE patient_id = '$patient_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <form action="updatePatientToDB.php?patient_id=<?php echo $row['patient_id']; ?>" method="post">
            <h3>Update Patient</h3>
            <p>First Name: <input name="firstName" type="text" value="<?php echo $row['FirstName']; ?>" required></p>
            <p>Last Name: <input name="lastName" type="text" value="<?php echo $row['LastName']; ?>" required></p>
            <p>Date of Birth: <input name="dob" type="date" value="<?php echo $row['dob']; ?>" required></p>
            <p>SSN: <input name="ssn" type="text" value="<?php echo $row['ssn']; ?>" required></p>
            <p>Diagnosis: <input name="diagnosis" type="text" value="<?php echo $row['Diagnosis']; ?>" required></p>
            <p>Phone: <input name="phone" type="text" value="<?php echo $row['phone']; ?>" required></p>
            <input type="submit" value="Update">
            <a href="displayTable.php"><input type="button" value="Cancel"></a>
        </form>
        <?php
    } else {
        echo "<p>No patient found with that ID.</p>";
    }
}

// Close connection after all operations are complete
$conn->close();
?>

    </div>
</body>

</html>
