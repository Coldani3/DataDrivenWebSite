<?php include("databaseinit.php"); ?>
<?php

$query = $pdo->query("SELECT DISTINCT make FROM cars WHERE available = \"Y\"");

echo "<select id='make' onchange='generateModels()' style='width:100%'>";
echo "<option value='' disabled selected></option>";

while ($make = $query->fetch())
{
    $make = $make["make"];
    echo "<option value='$make'>$make</option>";
}

echo "</select>";
?>