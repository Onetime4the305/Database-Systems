<!doctype html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <title>Update Medical Professional</title>
</head>

<body>
    <div>
        <form action="updateMedicalProfessional.php" method="post">
            <h3>Find Medical Professional to Update</h3>
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
    // Get the medical professional's first and last name from the form
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    // Query to check if the professional exists in the database
    $sql = "SELECT professional_id, FirstName, LastName, Role FROM MedicalProfessional WHERE FirstName = '$firstName' AND LastName = '$lastName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Professional found
        $row = $result->fetch_assoc();
        echo "<h3>Medical Professional Found: " . $row['FirstName'] . " " . $row['LastName'] . "</h3>";
        echo "<form action='updateMedicalProfessional.php?professional_id=" . $row['professional_id'] . "' method='post'>";
        echo "<p>Do you want to update this record? <input type='submit' name='confirmUpdate' value='Yes'> <a href='displayTable.php'><input type='button' value='No'></a></p>";
        echo "</form>";
    } else {
        echo "<p>No medical professional found with that name.</p>";
    }
}

if (isset($_POST['confirmUpdate'])) {
    // Fetch professional_id from URL and display the update form
    $professional_id = $_GET['professional_id'];

    // Query to fetch the current details of the professional
    $sql = "SELECT * FROM MedicalProfessional WHERE professional_id = '$professional_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <form action="updateMedicalProfessionalToDB.php?professional_id=<?php echo $row['professional_id']; ?>" method="post">
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
            <input type="submit" value="Update">
            <a href="displayTable.php"><input type="button" value="Cancel"></a>
        </form>
        <?php
    } else {
        echo "<p>No medical professional found with that ID.</p>";
    }
}

$conn->close();  // Close the connection here, after all operations are done
?>

    </div>
</body>

</html>
