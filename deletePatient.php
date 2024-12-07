<!doctype html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <title>Delete Patient</title>
</head>

<body>
    <div>
        <form action="deletePatientFromDB.php" method="post">
            <h3>Delete Patient</h3>
            <p>First Name: <input name="firstName" type="text" required></p>
            <p>Last Name: <input name="lastName" type="text" required></p>
            <input type="submit" id="btn1" value="Delete">
        </form>
        <a href="displayTable.php"><input type="button" id="btn2" value="Cancel"></a>
    </div>
</body>

</html>
