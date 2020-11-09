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

$query = $pdo->query("SELECT * FROM cars WHERE carIndex = ".$_GET["carIndex"]);

$row = $query.fetch();

echo "<img href='".$row["image"]."' alt='Car'>";
echo "<p>Description</p>";
echo "<p>".$row["description"]."</p>";
//extra details
echo "<div class='box'>";

echo "</div>";

echo "<div><button class='button' id='purchaseButton'>Purchase</button></div>";

?>