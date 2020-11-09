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

if (!isset($_GET['make']) || $_GET['make'] == "") $make = "\"%\"";
else $make = "\"".$_GET['make']."\"";

if (!isset($_GET['model']) || $_GET['model'] == "") $model = "\"%\"";
else $model = "\"".$_GET['model']."\"";

if (!isset($_GET['minPrice']) || $_GET['minPrice'] == "") $minPrice = 0;
else $minPrice = $_GET['minPrice'];

if (!isset($_GET['maxPrice']) || $_GET['maxPrice'] == "") $maxPrice = 9999999999;
else $maxPrice = $_GET['maxPrice'];

$pageSize = 10;
$offset = $pageSize * $_GET["page"];
//NOTE: When displaying to pagination, show page + 1

$queryText = "SELECT * FROM cars WHERE make = $make AND model = $model AND price >= $minPrice AND price <= $maxPrice LIMIT $offset, $pageSize";
$query = $pdo->query($queryText);

while ($row = $query->fetch())
{
    echo "<div style='overflow-y:auto;'>";
    echo "<a class='displayedCar' onclick='updateSession()' href='carpage.html?carIndex=".$row["carIndex"]."'>";
    echo "<div class='box'><img src='".$row["image"]."' id='image' alt='Car' style='float:left;'>";
    echo "<p id='model'>Model: ".$row["model"]."</p>";
    echo "<p id='make'>Make: ".$row["make"]."</p>";
    echo "<p id='price'>Price: ".$row["price"]."</p>";
    echo "<p id='reg'>Registration: ".$row["reg"]."</p>";
    echo "<p id='colour'>Colour: ".$row["colour"]."</p>";
    echo "<p id='telephone'>Telephone: ".$row["telephone"]."</p>";
    echo "<p id='dealer'>Dealer: ".$row["dealer"]."</p>";
    echo "</div>";
    echo "</a>";
    echo "</div>";
}

//GENERATE PAGINATION

$pageCount = $pdo->query(str_replace("*", "COUNT(*)", $queryText))->fetchColumn();
?>