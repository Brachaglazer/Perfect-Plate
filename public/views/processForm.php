<?php
require_once "database.php";



$dayId = $_POST["day_id"];
$mealTypeId = $_POST["meal_type_id"];
$recipeId = $_POST["recipe_id"];
$notes = $_POST["notes"];
$favorite = isset($_POST["favorite"]) ? 1 : 0;
if (empty($dayId)) {
    die("Please select a day.");
}

if (empty($mealTypeId)) {
    die("Please select a meal type.");
}

if (empty($recipeId)) {
    die("Please select a recipe.");
}

if (strlen($notes) > 500) {
    die("Notes cannot be longer than 500 characters.");
}

$sql = "INSERT INTO planned_meals
        (day_id, meal_type_id, recipe_id, favorite, notes)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param(
    "iiiis",
    $dayId,
    $mealTypeId,
    $recipeId,
    $favorite,
    $notes
);

if ($stmt->execute()) {
    $mealId = $stmt->insert_id;

    header("Location: mealConfirmation.php?id=" . $mealId);
    exit;
}

echo "The meal could not be saved: " . $stmt->error;
?>
?>