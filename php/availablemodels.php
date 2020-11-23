<?php include("databaseinit.php"); ?>
<?php

$query = $pdo->query("SELECT DISTINCT model FROM cars WHERE available = \"Y\" AND make = \"".str_replace("'", "", $_GET["make"])."\"");

//echo $query->fetch()["model"];

echo "<select id='model' style='width:100%'>";
echo "<option value='' disabled selected></option>";

while ($model = $query->fetch())
{
    $model = $model["model"];
    echo "<option value='$model'>$model</option>";
}

echo "</select>";
?>