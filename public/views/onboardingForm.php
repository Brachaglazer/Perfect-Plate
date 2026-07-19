<?php
    require_once '../../server/database.php';
    $conn = getConnection();

if ($conn) {
    $mealSql = "SELECT type FROM meal_types;";
    $mealResult = $conn->query($mealSql);
    $mealtypes = ["Weight Loss", "Healthy Eating", "Family Meals"];
    if ($mealResult->num_rows > 0) {
        $mealtypes = $mealResult;
    }

    $dietSql = "SELECT need FROM dietary_needs;";
    $dietResult = $conn->query($dietSql);
    $dietary = ["Gluten Free", "Lactose Intolerant", "Sugar Free", "Nut Free", "Vegetarian", "None/Other"];
    if ($dietResult->num_rows > 0) {
        $dietary = $dietResult;
    }

    /*$ingrSql = "SELECT name FROM ingredients;";
    $ingrResult = $conn->query($ingrSql);
    $ingredients = ["Flour", "Sugar", "Eggs", "Oil", "Salt"];
    if ($ingrResult->num_rows > 0) {
        $ingredients = $ingrResult;
    }*/

}
?>
<!DOCTYPE html>
<html lang ="en">
    <head>
        <link rel="stylesheet" href="../css/styles.css" type="text/css" />
        <title>Meal Planning Onboarding</title>
    </head>
    <body>
        <h1>Meal Planning Onboarding</h1>

        <form action="onboardingFormResponse.php" method="post">
            <p>
                <label>Username:
                    <input type ="text" name="username" placeholder="ex: Chef Maria">
                 </label>
            </p>

            <p>
                <label>How old are you?
                    <select name="age">
                        <option value="15-25">15-25</option>
                        <option value="25-40">25-40</option>
                        <option value="40-60">40-60</option>
                        <option value="60+">60+</option>
                        <option value="other">Other</option>
                    </select>
                </label>
            </p>

            <p>
                <label>Place of Origin:
                    <input type="text" name="origin" placeholder="ex: France">
                </label>
            </p>

            <p>Prepared Meals:
                <div class="options">
                    <label>Breakfast
                        <input type="checkbox" name="preparedmeals[]" value="Breakfast">
                    </label>
                    <label>Lunch
                        <input type="checkbox" name="preparedmeals[]" value="Lunch">
                    </label>
                    <label>Dinner
                        <input type="checkbox" name="preparedmeals[]" value="Dinner">
                    </label>
                </div>
            </p>
            <p>Meal plan type:
                <div class="options">
                    <?php
                        for ($i=0; $i < count($mealtypes); $i++){
                            echo "<label>$mealtypes[$i]";
                            echo    "<input type='radio' name='mealplantype' value='$mealtypes[$i]'>";
                            echo "</label>";
                        }
                    ?>
                </div>
            </p>

            <p>Dietary Needs:
                <div class="options">
                    <?php
                        for ($i=0; $i < count($dietary); $i++){
                            echo "<label>$dietary[$i]";
                            echo    "<input type='checkbox' name='dietaryrestrictions[]' value='$dietary[$i]'>";
                            echo "</label>";
                        }
                    ?>
                </div>
            </p>

            <p>
                <label>Tell us about yourself:
                    <textarea name="aboutyourself" rows="5" cols="40"></textarea>
                 </label>
            </p>

            <p>
                <input type="submit" value="Submit">
                <input type="reset" value="Clear">
            </p>



        </form>
    </body>
</html>