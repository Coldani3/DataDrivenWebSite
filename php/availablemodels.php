<?php
$host = 'localhost';
$db   = 'carsdatabase';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [    
PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,    
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,    
PDO::ATTR_EMULATE_PREPARES   => false,];

try 
{    
	$pdo = new PDO($dsn, $user, $pass, $options);
} 
catch (\PDOException $e) 
{     
	throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$query = $pdo->query("SELECT DISTINCT model FROM cars WHERE available = \"Y\" AND make = \"".str_replace("'", "", $_GET["make"])."\"");

//echo $query->fetch()["model"];

echo "<select id='model'>";
echo "<option value='' disabled selected></option>";

while ($model = $query->fetch())
{
    $model = $model["model"];
    echo "<option value='$model'>$model</option>";
}

echo "</select>";
?>