<?php

function clamp($val, $min, $max)
{
	return $val < $min ? $min : ($val > $max ? $max : $val);
}

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

if (!isset($_GET['maxPrice']) || $_GET['maxPrice'] == "") $maxPrice = 9999999;
else $maxPrice = $_GET['maxPrice'];

$page = $_GET["page"];
$pageSize = 10;
$offset = $pageSize * $page;
//NOTE: When displaying to pagination, show page + 1

$queryText = "SELECT * FROM cars WHERE make LIKE $make AND model LIKE $model AND price >= $minPrice AND price <= $maxPrice LIMIT $offset, $pageSize";
//$queryText = "SELECT * FROM cars LIMIT 0, 10";
$query = $pdo->query($queryText);

echo "<div style='position:relative;overflow-y:auto;'>";
while ($row = $query->fetch())
{
    echo "<div>";
    echo "<a class='displayedCar' onclick='updateSession()' href='carpage.html?carIndex=".$row["carIndex"]."'>";
    echo "<div class='box' style='background-color:lightgrey;margin-bottom:10px;'><img src='".$row["image"]."' id='image' alt='Car'>";
    echo "<p id='make'>Make: ".$row["make"]."</p>";
    echo "<p id='model'>Model: ".$row["model"]."</p>";
    echo "<p id='price'>Price: £".$row["price"]."</p>";
    echo "<p id='reg'>Registration: ".$row["Reg"]."</p>";
    echo "<p id='colour'>Colour: ".$row["colour"]."</p>";
    echo "<p id='telephone'>Telephone: ".$row["telephone"]."</p>";
    echo "<p id='dealer'>Dealer: ".$row["dealer"]."</p>";
    echo "</div>";
    echo "</a>";
    echo "</div>";
}
echo "</div>";

//GENERATE PAGINATION

$pageCount = ceil($pdo->query("SELECT COUNT(*) FROM cars WHERE make LIKE $make AND model LIKE $model AND price >= $minPrice AND price <= $maxPrice")->fetchColumn() / $pageSize);
echo "<div id='pagination' style='bottom:0;background-color:lightgrey;text-align:center;'>";
echo "<p>Page ".($page + 1)." of ".$pageCount."</p>";

for ($i = clamp($page - 3, 0, $pageCount); $i < clamp($page + 3, 0, $pageCount); $i++)
{
    if ($i != $page)
    {
        echo "[<a onclick='setPageCount(".$i.")'>".($i + 1)."</a>]";
    }
    else
    {
        echo "[<strong>".($i + 1)."</strong>]";
    }
}

echo "</div>";
?>