<?php include("databaseinit.php"); ?>
<?php
session_start();
if (isset($_SESSION["admin"])) $isAdmin = $_SESSION["admin"];
else $isAdmin = false;

if ($isAdmin == "true")
{
    $carIndex = $_POST["carIndex"];
    $queryText = "DELETE FROM cars WHERE carIndex = $carIndex";
    $pdo->query($queryText);
}
?>