<?php include("databaseinit.php"); ?>
<?php
session_start();
if (isset($_SESSION["admin"])) $isAdmin = $_SESSION["admin"];
else $isAdmin = false;

if ($isAdmin == "true")
{
    //$carIndex = $_POST["carIndex"];
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

    $queryText = "INSERT INTO cars (make, model, Reg, colour, miles, price, dealer, town, telephone, description, region, image, Available) VALUES (\"$make\", \"$model\", \"$reg\", \"$colour\", $miles, $price, \"$dealer\", \"$town\", \"$telephone\", \"$description\", \"$region\", \"$image\", \"Y\"";

    $pdo->query($queryText);
}
?>