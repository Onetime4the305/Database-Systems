<!doctype html>

<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>Adding Patient to DB</title>
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
$dob = $_POST['dob'];
$ssn = $_POST['ssn'];
$diagnosis = $_POST['diagnosis'];
$phone = $_POST['phone'];

// Insert into patients table
$sql = "INSERT INTO patients (FirstName, LastName, dob, ssn, Diagnosis, phone) 
        VALUES ('$firstName', '$lastName', '$dob', '$ssn', '$diagnosis', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "New patient added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
    <a href="displayTable.php"><input type="button" id="btn1" value="OK"></a>
    </div>
</body>

</html>
