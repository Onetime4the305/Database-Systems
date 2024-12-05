<!doctype html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <title>New Patient Form</title>
</head>

<body>
    <div>
        <div>
            <form action="addPatientToDB.php" method="post">
                <h3>New Patient</h3>
                <p>First Name: <input name="firstName" type="text" required></p>
                <p>Last Name: <input name="lastName" type="text" required></p>
                <p>Date of Birth: <input name="dob" type="date" required></p>
                <p>SSN: <input name="ssn" type="text" required></p>
                <p>Diagnosis: <input name="diagnosis" type="text" required></p>
                <p>Phone: <input name="phone" type="text" required></p>
                <input type="submit" id="btn3" value="Submit">
                <a href="displayTable.php"><input type="button" id="btn1" value="Cancel"></a>
            </form>
        </div>
    </div>
</body>

</html>
