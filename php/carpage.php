<?php include("databaseinit.php"); ?>
<?php
$query = $pdo->query("SELECT * FROM cars WHERE carIndex LIKE ".$_GET["carIndex"]);

$row = $query->fetch();

echo "<img src='".$row["image"]."' alt='Car'>";
echo "<p>Description: ".$row["description"]."</p>";
echo "<p>Price: £".$row["price"]."</p>";
//extra details
echo "<div class='box'>";

echo "</div>";

echo "<div><button class='button' id='purchaseButton' onclick='purchase()'>Purchase</button></div>";

?>