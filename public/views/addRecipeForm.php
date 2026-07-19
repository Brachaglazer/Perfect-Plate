<?php
    require_once '../../server/database.php';
    $conn = getConnection();

if ($conn) {
    $catSql = "SELECT category FROM recipe_categories;";
    $catResult = $conn->query($catSql);
    $categories = ["Main", "Appetizer", "Dessert", "Drink"];
    if ($catResult->num_rows > 0) {
        $categories = $catResult;
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
        <title>Recipe Form</title>
    </head>
    <body>
        <h1>Add Recipe Form</h1>

        <form action="addRecipeFormResponse.php" method="post">
            <p>
                <label>Recipe Title:
                    <input type ="text" name="recipetitle">
                </label>
            </p>

            <p>Recipe Category:
                <div class="options">
                    <?php
                        for ($i=0; $i < count($categories); $i++){
                            echo "<label>$categories[$i]";
                            echo    "<input type='radio' name='recipecategory' value='$categories[$i]'>";
                            echo "</label>";
                        }
                    ?>
                </div>
            </p>
            <p>
                <label>Ingredients and Directions:
                    <textarea name="recipedirections" rows="5" cols="40"></textarea>
                 </label>
            </p>
            <p>Dietary Accommodations:
                <div class="options">
                    <?php
                        for ($i=0; $i < count($dietary); $i++){
                            echo "<label>$dietary[$i]";
                            echo    "<input type='checkbox' name='recipedietary[]' value='$dietary[$i]'>";
                            echo "</label>";
                        }
                    ?>
                </div>
            </p>
            <p>
                <input type="submit" value="Add Recipe">
                <input type="reset" value="Clear">
            </p>

        </form>
    </body>
</html>