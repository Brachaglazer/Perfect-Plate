<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Response</title>
</head>
<body>
    <h1>Form Response</h1>

    <p>Username:
        <?php echo $_POST["username"]; ?>
    </p>

    <p>Age:
        <?php echo $_POST["age"]; ?>
    </p>

    <p>Origin:
        <?php echo $_POST["origin"]; ?>
    </p>

    <p>Prepared Meals:<br>

        <?php
        if (isset($_POST["preparedmeals"])) {
            foreach ($_POST["preparedmeals"] as $pm){
                echo "$pm<br>";
            }
        }
        else {
            echo "None";

        }
        ?>

    </p>

    <p>Meal Plan Type:
        <?php echo $_POST["mealplantype"]; ?>
    </p>


    <p>Dietary Restrictions:<br>

        <?php
        if (isset($_POST["dietaryrestrictions"])) {
            foreach ($_POST["dietaryrestrictions"] as $dr){
                echo "$dr<br>";
            }
        }
        else {
            echo "None";

        }
        ?>

    </p>

    <p>About Yourself:
        <?php echo $_POST["aboutyourself"]; ?>
    </p>
</body>
</html>