<?php include("databaseinit.php"); ?>
<?php
session_start();
if (isset($_SESSION["admin"])) $isAdmin = $_SESSION["admin"];
else $isAdmin = false;

if ($isAdmin == "true")
{
    // $query = $pdo->query("SELECT * FROM cars WHERE carIndex LIKE ".$_GET["carIndex"]);

    // $row = $query->fetch();

    echo "<p><strong>Car Image URL</strong>: <input id='image' type='text'></p>";
    echo "<p><strong>Description</strong>: <input id='description' type='text'></p>";
    echo "<p><strong>Price</strong>: £<input id='price' type='text'></p>";
    //extra details
    echo "<div class='box'>";
    echo "<p><strong>Make</strong>: <input id='make' type='text'></p>";
    echo "<p><strong>Model</strong>: <input id='model' type='text'></p>";
    echo "<p><strong>Colour</strong>: <input id='colour' type='text'></p>";
    echo "<p><strong>Reg</strong>: <input id='reg' type='text'></p>";
    echo "<br />";
    echo "<p><strong>Miles</strong>: <input id='miles' type='text'></p>";
    echo "<p><strong>Dealer</strong>: <input id='dealer' type='text'></p>";
    echo "<p><strong>Town</strong>: <input id='town' type='text'></p>";
    echo "<p><strong>Region</strong>: <input id='region' type='text'></p>";
    echo "<p><strong>Telephone</strong>: <input id='telephone' type='text'></p>";
    echo "</div>";

    echo "<div><button class='button' onclick='add()'>Add</button>";

    //echo "<div><button class='button' id='purchaseButton' onclick='purchase()' style='margin-right:5px;'>Purchase</button>";
    echo "</div>";
}
else
{
    echo "<p>You shouldn't be here</p>";
}
?>