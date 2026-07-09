
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../css/styles.css" type="text/css" />
        <title>Login Form Response</title>
    </head>
    <body>
        <?php 
        session_start();
        if ($_SESSION["loggedIn"] == true){
            echo "<h1>Hello " . $_COOKIE['userName']."</h1>";
        } else {
            echo "<h1>Access denied, you need to login.</h1>";
            echo "<a href='login.php'>Back to Login</a>";
        }

        ?>
    </body>
</html>