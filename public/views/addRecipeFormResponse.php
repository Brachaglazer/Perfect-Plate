<?php
require_once '../../server/database.php';

if ($_POST["recipetitle"] === "") {
    echo "<p>Recipe title is required!</p>";
    echo "<p><a href='addRecipeForm.php'>Back to recipe form</a></p>";
    return;
}

if (empty($_POST["recipecategory"])) {
    echo "<p>Recipe category is required!</p>";
    echo "<p><a href='addRecipeForm.php'>Back to recipe form</a></p>";
    return;
}

if ($_POST["recipedirections"] === "") {
    echo "<p>Recipe directions is required!</p>";
    echo "<p><a href='addRecipeForm.php'>Back to recipe form</a></p>";
    return;
}

if (empty($_POST["recipedietary"])) {
    echo "<p>Recipe dietary accommodations is required!</p>";
    echo "<p><a href='addRecipeForm.php'>Back to recipe form</a></p>";
    return;
}

$recipetitle = $_POST["recipetitle"];
$recipecategory = $_POST["recipecategory"];
$recipedirections = $_POST["recipedirections"];
$rawrecipedietary = $_POST["recipedietary"];
$recipedietary = implode(', ', $rawrecipedietary);

$conn = getConnection();

if ($conn) {
    $sql = "INSERT INTO recipes (title, category, dietary, directions) VALUES ('$recipetitle', '$recipecategory', '$recipedietary', '$recipedirections')";
    $result = $conn->query($sql);
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
       if ($result === TRUE){
        echo "<p>Thank you for submitting a recipe!</p>";
        echo "<h1>$recipetitle</h1>";
        echo "<p>Category: $recipecategory</p>";
        echo "<p>Directions: $recipedirections</p>";
        echo "<p>Dietary Accommodations: $recipedietary</p>";
        echo "<p><a href='index.php'>Go to home page</a></p>";
       } else {
        echo "<p>Recipe save unsuccessful!</p>";
        echo "<p><a href='addRecipeForm.php'>Back to recipe form</a></p>";
       }
    ?>
    </body>
</html>