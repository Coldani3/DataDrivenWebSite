<?php include("databaseinit.php"); ?>
<?php
session_start();
if (isset($_SESSION["admin"])) $isAdmin = $_SESSION["admin"];
else $isAdmin = false;

if ($isAdmin == "true" && $_POST["carIndex"] > 1000)
{
    $carIndex = $_POST["carIndex"];
    $image = $_POST["image"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $make = $_POST["make"];
    $model = $_POST["model"];
    $colour = $_POST["colour"];
    $reg = $_POST["Reg"];
    $miles = $_POST["miles"];
    $dealer = $_POST["dealer"];
    $town = $_POST["town"];
    $region = $_POST["region"];
    $telephone = $_POST["telephone"];

    $queryText = "UPDATE cars SET image = \"$image\", description = \"$description\", price = $price, make = \"$make\", model = \"$model\", colour = \"$colour\", Reg = \"$reg\", miles = \"$miles\", dealer = \"$dealer\", town = \"$town\", region = \"$region\", telephone = \"$telephone\" WHERE carIndex = $carIndex";

    $pdo->query($queryText);
}
?>