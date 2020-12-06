<?php include("databaseinit.php"); ?>
<?php

$query = $pdo->query("SELECT DISTINCT dealer FROM cars WHERE available = \"Y\"");

echo "<select id='dealerSelect' style='width:100%' class='searchField'>";
echo "<option value='' selected></option>";

while ($dealer = $query->fetch())
{
    $dealer = $dealer["dealer"];
    echo "<option value='$dealer'>$dealer</option>";
}

echo "</select>";
?>