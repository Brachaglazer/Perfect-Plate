<?php
require_once "database.php";

$sql = "SELECT day_name, type, recipe_name, favorite, notes
        FROM planned_meals
        JOIN days_of_week
            ON planned_meals.day_id = days_of_week.id
        JOIN meal_types
            ON planned_meals.meal_type_id = meal_types.id
        JOIN recipes
            ON planned_meals.recipe_id = recipes.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Meals</title>
</head>
<body>

<h2>All Planned Meals</h2>

<table border="1">
    <tr>
        <th>Day</th>
        <th>Meal Type</th>
        <th>Recipe</th>
        <th>Favorite</th>
        <th>Notes</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>

    <tr>
        <td><?php echo $row["day_name"]; ?></td>
        <td><?php echo $row["type"]; ?></td>
        <td><?php echo $row["recipe_name"]; ?></td>
        <td><?php echo $row["favorite"] ? "Yes" : "No"; ?></td>
        <td><?php echo $row["notes"]; ?></td>
    </tr>

    <?php } ?>

</table>

<br>

<a href="mealPlanForm.php">Back to Meal Planner</a>

</body>
</html>