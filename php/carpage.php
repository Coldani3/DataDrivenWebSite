<?php include("databaseinit.php"); ?>
<?php
session_start();
$isAdmin = $_SESSION["admin"];

$query = $pdo->query("SELECT * FROM cars WHERE carIndex LIKE ".$_GET["carIndex"]);

$row = $query->fetch();

echo "<img src='".$row["image"]."' alt='Car'>";
echo "<p>Description: ".$row["description"]."</p>";
echo "<p>Price: £".$row["price"]."</p>";
//extra details
echo "<div class='box'>";

echo "</div>";

echo "<div><button class='button' id='purchaseButton' onclick='purchase()'>Purchase</button></div>";

if ($isAdmin == true)
{
    echo "<div>";
    echo "<button onclick='carDelete()' class='button'>Delete</button>";
    echo "</div>";
}

?>