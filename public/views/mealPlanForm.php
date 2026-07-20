<?php
require_once "database.php";

$days = $conn->query("SELECT id, day_name FROM days_of_week ORDER BY id");

$mealTypes = $conn->query("SELECT id, type FROM meal_types ORDER BY type");

$recipes = $conn->query("SELECT id, recipe_name FROM recipes ORDER BY recipe_name");


?>


<!DOCTYPE html>
<html>
<head>
    <title>Meal Planner</title>
</head>

<body>

<h1>PerfectPlate Meal Planner</h1>

<form action="processForm.php" method="post">

<label>Day of the Week:</label>
<select name="day_id">
    <?php while($day = $days->fetch_assoc()) { ?>

        <option value="<?php echo $day["id"]; ?>">
            <?php echo $day["day_name"]; ?>
        </option>
    <?php } ?>
</select>
<br><br>


<label for="meal_type_id">Meal Type:</label>

<select name="meal_type_id">

    <?php while ($mealType = $mealTypes->fetch_assoc()) { ?>

        <option value="<?php echo $mealType["id"]; ?>">
            <?php echo $mealType["type"]; ?>
        </option>

    <?php } ?>
</select>
<br><br>

<label for="recipe_id">Recipe:</label>
<select name="recipe_id">
    <?php while ($recipeName = $recipes->fetch_assoc()) { ?>
        <option value="<?php echo $recipeName["id"]; ?>">
            <?php echo $recipeName["recipe_name"]; ?>
        </option>
    <?php } ?>
</select>
<br><br>


<label>Favorite</label>
    <input type="checkbox" name="favorite" value="1">


<br><br>


<label for="notes">Notes:</label>
<br>
    <textarea id="notes" name="notes" rows="5" cols="40"></textarea>
<br><br>
<button type="submit">Save Meal</button>

</form>

</body>
</html>
