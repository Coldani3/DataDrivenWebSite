<?php include("databaseinit.php"); ?>
<?php
$query = $pdo->query("SELECT DISTINCT region FROM cars WHERE available = \"Y\"");

echo "<select id='regionSelect' style='width: 100%'>";
echo "<option value='' disabled selected></option>";

while ($region = $query->fetch())
{
    $region = $region["region"];
    echo "<option value='$region'>$region</option>";
}

echo "</select>";
?>