<?php
include('db.php'); // Include the database connection file

// Function to handle adding data to the tables
if (isset($_POST['add'])) {
    $table = $_POST['table'];
    
    // Prepared statement for MedicalProfessional table
    if ($table == 'MedicalProfessional') {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $role = $_POST['role'];
        $stmt = $conn->prepare("INSERT INTO MedicalProfessional (FirstName, LastName, Role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $firstName, $lastName, $role);
        $stmt->execute();
    } 
    // Prepared statement for Doctor table
    elseif ($table == 'Doctor') {
        $professionalId = $_POST['professionalId'];
        $department = $_POST['department'];
        $stmt = $conn->prepare("INSERT INTO Doctor (professional_id, Department) VALUES (?, ?)");
        $stmt->bind_param("is", $professionalId, $department);
        $stmt->execute();
    }
    // Prepared statement for Nurse table
    elseif ($table == 'Nurse') {
        $professionalId = $_POST['professionalId'];
        $nurseGrade = $_POST['nurseGrade'];
        $stmt = $conn->prepare("INSERT INTO Nurse (professional_id, nurse_grade) VALUES (?, ?)");
        $stmt->bind_param("is", $professionalId, $nurseGrade);
        $stmt->execute();
    }
    // Prepared statement for patients table
    elseif ($table == 'patients') {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $dob = $_POST['dob'];
        $ssn = $_POST['ssn'];
        $diagnosis = $_POST['diagnosis'];
        $phone = $_POST['phone'];
        $stmt = $conn->prepare("INSERT INTO patients (FirstName, LastName, dob, ssn, Diagnosis, phone) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $firstName, $lastName, $dob, $ssn, $diagnosis, $phone);
        $stmt->execute();
    }
    
    // Check if the query executed successfully
    if ($stmt->affected_rows > 0) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close(); // Close the prepared statement
}

// Function to handle deleting data from the tables
if (isset($_POST['delete'])) {
    $table = $_POST['table'];
    $id = $_POST['id'];
    
    if ($table == 'MedicalProfessional') {
        $stmt = $conn->prepare("DELETE FROM MedicalProfessional WHERE professional_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    } elseif ($table == 'Doctor') {
        $stmt = $conn->prepare("DELETE FROM Doctor WHERE doctor_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    } elseif ($table == 'Nurse') {
        $stmt = $conn->prepare("DELETE FROM Nurse WHERE nurse_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    } elseif ($table == 'patients') {
        $stmt = $conn->prepare("DELETE FROM patients WHERE patient_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    if ($stmt->affected_rows > 0) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close(); // Close the prepared statement
}

// Display the tables' data
function displayTable($table) {
    global $conn;
    
    if ($table == 'MedicalProfessional') {
        $sql = "SELECT * FROM MedicalProfessional";
    } elseif ($table == 'Doctor') {
        $sql = "SELECT * FROM Doctor";
    } elseif ($table == 'Nurse') {
        $sql = "SELECT * FROM Nurse";
    } elseif ($table == 'patients') {
        $sql = "SELECT * FROM patients";
    }
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table border='1'><tr>";
        // Output column names
        $fields = $result->fetch_fields();
        foreach ($fields as $field) {
            echo "<th>" . $field->name . "</th>";
        }
        echo "</tr>";
        
        // Output data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management - Edit Database</title>
    <script>
        // JavaScript for dynamically updating the add data form fields
        document.getElementById('table').addEventListener('change', function() {
            var table = this.value;
            var addFieldsDiv = document.getElementById('addFields');
            addFieldsDiv.innerHTML = ''; // Clear any previous inputs
            
            if (table == 'MedicalProfessional') {
                addFieldsDiv.innerHTML = ` 
                    <label for="firstName">First Name:</label><input type="text" name="firstName" required><br>
                    <label for="lastName">Last Name:</label><input type="text" name="lastName" required><br>
                    <label for="role">Role:</label><select name="role" required>
                        <option value="Doctor">Doctor</option>
                        <option value="Nurse">Nurse</option>
                    </select><br>
                `;
            } else if (table == 'Doctor') {
                addFieldsDiv.innerHTML = `
                    <label for="professionalId">Professional ID:</label><input type="number" name="professionalId" required><br>
                    <label for="department">Department:</label><input type="text" name="department" required><br>
                `;
            } else if (table == 'Nurse') {
                addFieldsDiv.innerHTML = `
                    <label for="professionalId">Professional ID:</label><input type="number" name="professionalId" required><br>
                    <label for="nurseGrade">Nurse Grade:</label><input type="text" name="nurseGrade" required><br>
                `;
            } else if (table == 'patients') {
                addFieldsDiv.innerHTML = `
                    <label for="firstName">First Name:</label><input type="text" name="firstName" required><br>
                    <label for="lastName">Last Name:</label><input type="text" name="lastName" required><br>
                    <label for="dob">Date of Birth:</label><input type="date" name="dob" required><br>
                    <label for="ssn">SSN:</label><input type="text" name="ssn" required><br>
                    <label for="diagnosis">Diagnosis:</label><input type="text" name="diagnosis" required><br>
                    <label for="phone">Phone:</label><input type="text" name="phone" required><br>
                `;
            }
        });
    </script>
</head>
<body>
    <h1>Hospital Management System</h1>

    <!-- Form for adding records -->
    <h2>Add Data</h2>
    <form method="POST">
        <label for="table">Select Table:</label>
        <select name="table" id="table">
            <option value="MedicalProfessional">MedicalProfessional</option>
            <option value="Doctor">Doctor</option>
            <option value="Nurse">Nurse</option>
            <option value="patients">Patients</option>
        </select><br>

        <!-- Input fields for each table will appear here -->
        <div id="addFields"></div><br>

        <input type="submit" name="add" value="Add">
    </form>

    <hr>

    <!-- Form for deleting records -->
    <h2>Delete Data</h2>
    <form method="POST">
        <label for="table">Select Table:</label>
        <select name="table" id="tableDelete">
            <option value="MedicalProfessional">MedicalProfessional</option>
            <option value="Doctor">Doctor</option>
            <option value="Nurse">Nurse</option>
            <option value="patients">Patients</option>
        </select><br>

        <label for="id">Enter ID of Record to Delete:</label>
        <input type="text" name="id" id="idDelete" required><br>

        <input type="submit" name="delete" value="Delete">
    </form>

    <hr>

    <!-- Displaying data from the database -->
    <h2>View Data</h2>
    <form method="GET">
        <label for="table">Select Table:</label>
        <select name="table" id="tableView" onchange="this.form.submit()">
            <option value="MedicalProfessional">MedicalProfessional</option>
            <option value="Doctor">Doctor</option>
            <option value="Nurse">Nurse</option>
            <option value="patients">Patients</option>
        </select>
    </form>

    <?php
    if (isset($_GET['table'])) {
        displayTable($_GET['table']);
    }
    ?>
</body>
</html>
