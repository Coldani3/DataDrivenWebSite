<?php include("databaseinit.php"); ?>
<?php
session_start();
if (isset($_SESSION["admin"])) $isAdmin = $_SESSION["admin"];
else $isAdmin = false;

$query = $pdo->query("SELECT * FROM cars WHERE carIndex LIKE ".$_GET["carIndex"]);

$row = $query->fetch();

echo "<img src='".$row["image"]."' alt='Car'>";
echo "<p><strong>Description</strong>: ".$row["description"]."</p>";
echo "<p><strong>Price</strong>: £".$row["price"]."</p>";
//extra details
echo "<div class='box'>";
echo "<p><strong>Make</strong>: ".$row["make"]."</p>";
echo "<p><strong>Model</strong>: ".$row["model"]."</p>";
echo "<p><strong>Colour</strong>: ".$row["colour"]."</p>";
echo "<p><strong>Reg</strong>: ".$row["Reg"]."</p>";
echo "<br />";
echo "<p><strong>Miles</strong>: ".$row["miles"]."</p>";
echo "<p><strong>Dealer</strong>: ".$row["dealer"]."</p>";
echo "<p><strong>Town</strong>: ".$row["town"]."</p>";
echo "<p><strong>Region</strong>: ".$row["region"]."</p>";
echo "<p><strong>Telephone</strong>: ".$row["telephone"]."</p>";
echo "</div>";

echo "<div><button class='button' id='purchaseButton' onclick='purchase()' style='margin-right:5px;'>Purchase</button>";

if ($isAdmin == "true")
{
    echo "<button onclick='carDelete()' class='button'>Delete</button>";
}
echo "</div>";

?>