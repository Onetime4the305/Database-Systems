<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Management System</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
        tr:nth-child(even) { background-color: #a0a0a0; }
        tr:nth-child(odd) { background-color: #ffffff; }
        tr:nth-child(1) { font-weight: bold; }
    </style>
</head>
<body>

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

// Fetch Medical Professionals (Doctors and Nurses)
$sql = "SELECT professional_id, FirstName, LastName, Role FROM MedicalProfessional";
$result = $conn->query($sql);
echo "<h3>Medical Professionals</h3>";
if ($result->num_rows > 0) {
    echo "<table><tr><th>First Name</th><th>Last Name</th><th>Role</th></tr>";
    while($row = $result->fetch_assoc()) {
        $firstName = $row["FirstName"];
        $lastName = $row["LastName"];
        $role = $row["Role"];
        echo "<tr><td>".$firstName."</td><td>".$lastName."</td><td>".$role."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Fetch Doctors
$sql = "SELECT Doctor.doctor_id, MedicalProfessional.FirstName, MedicalProfessional.LastName, Doctor.Department 
        FROM Doctor 
        JOIN MedicalProfessional ON Doctor.professional_id = MedicalProfessional.professional_id";
$result = $conn->query($sql);
echo "<h3>Doctors</h3>";
if ($result->num_rows > 0) {
    echo "<table><tr><th>First Name</th><th>Last Name</th><th>Department</th></tr>";
    while($row = $result->fetch_assoc()) {
        $firstName = $row["FirstName"];
        $lastName = $row["LastName"];
        $department = $row["Department"];
        echo "<tr><td>".$firstName."</td><td>".$lastName."</td><td>".$department."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Fetch Nurses
$sql = "SELECT Nurse.nurse_id, MedicalProfessional.FirstName, MedicalProfessional.LastName, Nurse.nurse_grade 
        FROM Nurse 
        JOIN MedicalProfessional ON Nurse.professional_id = MedicalProfessional.professional_id";
$result = $conn->query($sql);
echo "<h3>Nurses</h3>";
if ($result->num_rows > 0) {
    echo "<table><tr><th>First Name</th><th>Last Name</th><th>Grade</th></tr>";
    while($row = $result->fetch_assoc()) {
        $firstName = $row["FirstName"];
        $lastName = $row["LastName"];
        $grade = $row["nurse_grade"];
        echo "<tr><td>".$firstName."</td><td>".$lastName."</td><td>".$grade."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Fetch Patients
$sql = "SELECT patient_id, FirstName, LastName, Diagnosis FROM patients";
$result = $conn->query($sql);
echo "<h3>Patients</h3>";
if ($result->num_rows > 0) {
    echo "<table><tr><th>First Name</th><th>Last Name</th><th>Diagnosis</th></tr>";
    while($row = $result->fetch_assoc()) {
        $firstName = $row["FirstName"];
        $lastName = $row["LastName"];
        $diagnosis = $row["Diagnosis"];
        echo "<tr><td>".$firstName."</td><td>".$lastName."</td><td>".$diagnosis."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Fetch Hospital information
$sql = "SELECT HospitalID, HospitalName, Address, NumberOfEmployees FROM Hospital";
$result = $conn->query($sql);
echo "<h3>Hospital Information</h3>";
if ($result->num_rows > 0) {
    echo "<table><tr><th>Hospital Name</th><th>Address</th><th>Number of Employees</th></tr>";
    while($row = $result->fetch_assoc()) {
        $hospitalName = $row["HospitalName"];
        $address = $row["Address"];
        $numberOfEmployees = $row["NumberOfEmployees"];
        echo "<tr><td>".$hospitalName."</td><td>".$address."</td><td>".$numberOfEmployees."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

<div>
    <a href="addMedicalProfessional.php"><input type="button" id="btn1" value="Add New Medical Professional"></a>
    <a href="addPatient.php"><input type="button" id="btn1" value="Add New Patient"></a>
    <a href="updateMedicalProfessional.php"><input type="button" id="btn1" value="Update Medical Professionals"></a>
    <a href="updatePatient.php"><input type="button" id="btn1" value="Update Patient"></a>
    <a href="deleteMedicalProfessional.php"><input type="button" id="btn1" value="Delete Medical Professional"></a>
    <a href="deletePatient.php"><input type="button" id="btn1" value="Delete Patient"></a>
    <a href="login.php"><input type="button" id="btn1" value="Logout"></a>
</div>

</body>
</html>
