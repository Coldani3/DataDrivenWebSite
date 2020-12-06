<?php include("databaseinit.php"); ?>
<?php
$query = $pdo->query("SELECT DISTINCT town FROM cars WHERE available = \"Y\"");

echo "<select id='townSelect' style='width: 100%' class='searchField'>";
echo "<option value='' selected></option>";

while ($town = $query->fetch())
{
    $town = $town["town"];
    echo "<option value='$town'>$town</option>";
}

echo "</select>";
?>