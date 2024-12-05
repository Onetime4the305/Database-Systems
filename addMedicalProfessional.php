<!doctype html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <title>New Medical Professional Form</title>
</head>

<body>
    <div>
        <div>
            <form action="addMedicalProfessionalToDB.php" method="post">
                <h3>New Medical Professional</h3>
                <p>First Name: <input name="firstName" type="text" required></p>
                <p>Last Name: <input name="lastName" type="text" required></p>
                <p>Role: 
                    <select name="role" required>
                        <option value="Doctor">Doctor</option>
                        <option value="Nurse">Nurse</option>
                    </select>
                </p>
                <p>Department (for Doctor only): <input name="department" type="text"></p>
                <p>Nurse Grade (for Nurse only): <input name="nurseGrade" type="text"></p>
                <input type="submit" id="btn3" value="Submit">
                <a href="displayTable.php"><input type="button" id="btn1" value="Cancel"></a>
            </form>
        </div>
    </div>
</body>

</html>
