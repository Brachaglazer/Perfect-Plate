<?php
require_once '../../server/database.php';

session_start();

$username = $_POST["username"];
$password = $_POST["password"];

$conn = getConnection();

if ($conn) {
    $sql = "SELECT * FROM authorized_users WHERE password = '$password' AND username = '$username';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $loggedIn = true;
    } else {
        $loggedIn = false;
    }
}
//created rows in db for these values
//$validUsernames = ["miriam", "bracha", "professor gutherc"];
//$validPasswords = ["1234", "wordpass", "5678"];

if ($loggedIn) {
    $_SESSION["loggedIn"] = true;
    setcookie('userName', $username, time() + 4800);
} else{
    $_SESSION["loggedIn"] = false;
}




?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../css/styles.css" type="text/css" />
        <title>Login Form Response</title>
    </head>
    <body>

    <?php
       if ($loggedIn){
        echo "<p>Login successful!</p>";
        echo "<p><a href='content.php'>Go to content page</a></p>";
       } else {
        echo "<p>Login unsuccessful!</p>";
        echo "<p><a href='login.html'>Back to login page</a></p>";
       }
    ?>
    </body>
</html>