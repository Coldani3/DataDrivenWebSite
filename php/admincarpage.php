<?php include("databaseinit.php"); ?>
<?php
session_start();
if (isset($_SESSION["admin"])) $isAdmin = $_SESSION["admin"];
else $isAdmin = false;

if ($isAdmin)
{
    $query = $pdo->query("SELECT * FROM cars WHERE carIndex LIKE ".$_GET["carIndex"]);

    $row = $query->fetch();

    echo "<img src='".$row["image"]."' alt='Car'>";
    echo "<p><strong>Car Image URL</strong>: <input id='image' type='text' value='".$row["image"]."'></p>";
    echo "<p><strong>Description</strong>: <input id='description' type='text' value='".$row["description"]."'></p>";
    echo "<p><strong>Price</strong>: £<input id='price' type='text' value='".$row["price"]."'></p>";
    //extra details
    echo "<div class='box'>";
    echo "<p><strong>Make</strong>: <input id='make' type='text' value='".$row["make"]."'></p>";
    echo "<p><strong>Model</strong>: <input id='model' type='text' value='".$row["model"]."'></p>";
    echo "<p><strong>Colour</strong>: <input id='colour' type='text' value='".$row["colour"]."'></p>";
    echo "<p><strong>Reg</strong>: <input id='reg' type='text' value='".$row["Reg"]."'></p>";
    echo "<br />";
    echo "<p><strong>Miles</strong>: <input id='miles' type='text' value='".$row["miles"]."'></p>";
    echo "<p><strong>Dealer</strong>: <input id='dealer' type='text' value='".$row["dealer"]."'></p>";
    echo "<p><strong>Town</strong>: <input id='town' type='text' value='".$row["town"]."'></p>";
    echo "<p><strong>Region</strong>: <input id='region' type='text' value='".$row["region"]."'></p>";
    echo "<p><strong>Telephone</strong>: <input id='telephone' type='text' value='".$row["telephone"]."'></p>";
    echo "</div>";

    //echo "<div><button class='button' id='purchaseButton' onclick='purchase()' style='margin-right:5px;'>Purchase</button>";

    echo "<button onclick='updateValues()' class='button'>Update</button>";
    echo "<button onclick='carUnavailable()' class='button' style='margin-right:5px;'>Mark Unavailable</button>";
    echo "<button onclick='carDelete()' class='button' style='margin-right:5px;'>Delete</button>";
    echo "</div>";
}
else
{
    echo "You shouldn't be here";
}
?>