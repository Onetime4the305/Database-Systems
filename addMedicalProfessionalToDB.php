<!doctype html>

<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>Adding Medical Professional to DB</title>
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

// Get form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$role = $_POST['role'];
$department = $_POST['department'];
$nurseGrade = $_POST['nurseGrade'];

// Insert into MedicalProfessional table
$sql = "INSERT INTO MedicalProfessional (FirstName, LastName, Role) VALUES ('$firstName', '$lastName', '$role')";
if ($conn->query($sql) === TRUE) {
    $professional_id = $conn->insert_id; // Get the last inserted ID
    
    // Insert into Doctor or Nurse table based on role
    if ($role == 'Doctor') {
        $sql = "INSERT INTO Doctor (professional_id, Department) VALUES ('$professional_id', '$department')";
    } elseif ($role == 'Nurse') {
        $sql = "INSERT INTO Nurse (professional_id, nurse_grade) VALUES ('$professional_id', '$nurseGrade')";
    }
    
    if ($conn->query($sql) === TRUE) {
        echo "New medical professional added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
    <a href="displayTable.php"><input type="button" id="btn1" value="OK"></a>
    </div>
</body>

</html>
