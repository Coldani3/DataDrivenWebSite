<?php include("databaseinit.php"); ?>
<?php

$query = $pdo->query("SELECT DISTINCT colour FROM cars WHERE available = \"Y\"");

echo "<select id='colourSelect' style='width:100%' class='searchField'>";
echo "<option value='' selected></option>";

while ($colour = $query->fetch())
{
    $colour = $colour["colour"];
    echo "<option value='$colour'>$colour</option>";
}

echo "</select>";
?>