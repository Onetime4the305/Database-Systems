<!doctype html>
<html lang="en">

<head lang="en">
    <meta charset="UTF-8">
    <title>Delete Medical Professional</title>
</head>

<body>
    <div>
        <form action="deleteMedicalProfessionalFromDB.php" method="post">
            <h3>Delete Medical Professional</h3>
            <p>First Name: <input name="firstName" type="text" required></p>
            <p>Last Name: <input name="lastName" type="text" required></p>
            <input type="submit" id="btn1" value="Delete">
        </form>
        <a href="displayTable.php"><input type="button" id="btn2" value="Cancel"></a>
    </div>
</body>

</html>
