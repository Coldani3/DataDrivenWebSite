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

if (!isset($_POST['make']) || $_POST['make'] == "") $make = "\"%\"";
else $make = "\"".$_POST['make']."\"";

if (!isset($_POST['model']) || $_POST['model'] == "") $model = "\"%\"";
else $model = "\"".$_POST['model']."\"";

if (!isset($_POST['minPrice']) || $_POST['minPrice'] == "") $minPrice = 0;
else $minPrice = $_POST['minPrice'];

if (!isset($_POST['maxPrice']) || $_POST['maxPrice'] == "") $maxPrice = 9999999999;
else $maxPrice = $_POST['maxPrice'];

$query = $pdo->query("SELECT * FROM cars WHERE make = $make AND model = $model AND price >= $minPrice AND price <= $maxPrice");

while ($row = $query->fetch())
{
    //echo "<DisplayedCar car-index=".$row["carIndex"]." car-image='".$row["image"]."' model='".$row["model"]."' make='".$row["make"]."' price=".$row["price"]." reg='".$row["reg"]."' colour='".$row["colour"]."' telephone='".$row["telephone"]."' dealer='".$row["dealer"]."' />";
    echo "<a class='displayedCar' onclick='updateSession()' href='carpage.html?carIndex=".$row["carIndex"]."'>";
    echo "<div class='box'><img src='".$row["image"]."' id='image' alt='Car' style='float:left;''>";
    echo "<p id='model'>Model: ".$row["model"]."</p>";
    echo "<p id='make'>Make: ".$row["make"]."</p>";
    echo "<p id='price'>Price: ".$row["price"]."</p>";
    echo "<p id='reg'>Registration: ".$row["reg"]."</p>";
    echo "<p id='colour'>Colour: ".$row["colour"]."</p>";
    echo "<p id='telephone'>Telephone: ".$row["telephone"]."</p>";
    echo "<p id='dealer'>Dealer: ".$row["dealer"]."</p>";
    echo "</div>";
    echo "</a>";
}
?>