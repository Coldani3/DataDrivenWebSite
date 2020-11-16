<?php include("databaseinit.php"); ?>
<?php

function clamp($val, $min, $max)
{
	return $val < $min ? $min : ($val > $max ? $max : $val);
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

$queryText = "SELECT * FROM cars WHERE make LIKE $make AND model LIKE $model AND price >= $minPrice AND price <= $maxPrice AND available = \"Y\" LIMIT $offset, $pageSize";
$query = $pdo->query($queryText);

echo "<div style='position:relative;overflow-y:auto;'>";
while ($row = $query->fetch())
{
    echo "<div>";
    echo "<a class='displayedCar' onclick='updateSession()' href='carpage.html?carIndex=".$row["carIndex"]."'>";
    echo "<div class='box' style='margin-bottom:10px; margin-right:5px;'><img src='".$row["image"]."' id='image' alt='Car'>";
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

if (($page - 1) >= 0)
{
    echo "<a onclick='setPageCount(".($page - 1).")'>&lt&lt&lt </a>";
}

//if the main for loop would not display the pagination for the first page, draw it specially
if (($page - 3) >= 1)
{
    echo "[<a onclick='setPageCount(0)'>1</a>] ... ";
}

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

if (($page + 3) <= $pageCount - 1)
{
    echo " ... [<a onclick='setPageCount(".($pageCount - 1).")'>$pageCount</a>]";
}

if (($page + 1) < $pageCount)
{
    echo "<a onclick='setPageCount(".($page + 1).")'> &gt&gt&gt</a>";
}

echo "</div>";
?>