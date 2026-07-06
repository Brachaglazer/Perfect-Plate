<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Response</title>
</head>
<body>
    <h1>Form Response</h1>

    <p>First Name:
        <?php echo $_POST["firstname"]; ?>
    </p>

    <p>Last Name:
        <?php echo $_POST["lastname"]; ?>
    </p>

    <p>Email:
        <?php echo $_POST["email"]; ?>
    </p>

    <p>Password:
        <?php echo $_POST["password"]; ?>
    </p>
</body>
</html>