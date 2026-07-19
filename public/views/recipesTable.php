<?php
    require_once '../../server/database.php';
    $conn = getConnection();

if ($conn) {
    $sql = "SELECT * FROM recipes;";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recipes</title>
</head>
<body>
    <table>
        <?php
            if ($result->num_rows > 0) {
                echo "<tr><th>Title</th><th>Category</th><th>Directions</th><th>Accommodations</th></tr>";
                while($row = $result->fetch_assoc()) {
                echo "<tr><th>" . $row['title']. "</th><td>" . $row['category']. "</td><td>" . $row['directions']. "</td><td>" . $row['dietary']. "</td></tr>";
              }
            }
        ?>

    </table>
</body>
</html>