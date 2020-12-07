<?php include("databaseinit.php"); ?>
<?php
session_start();

if (isset($_SESSION["admin"]))
{
    $isAdmin = $_SESSION["admin"];
}
else
{
    $isAdmin = "";
}

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

if (!isset($_GET['minMileage']) || $_GET['minMileage' == ""]) $minMileage = 0;
else $minMileage = $_GET['minMileage'];

if (!isset($_GET['maxMileage']) || $_GET['maxMileage'] == "") $maxMileage = 9999999;
else $maxMileage = $_GET['maxMileage'];

if (!isset($_GET['colour']) || $_GET['colour'] == "") $colour = "\"%\"";
else $colour = "\"".$_GET['colour']."\"";

if (!isset($_GET['region']) || $_GET['region'] == "") $region = "\"%\"";
else $region = "\"".$_GET['region']."\"";

if (!isset($_GET['town']) || $_GET['town'] == "") $town = "\"%\"";
else $town = "\"".$_GET['town']."\"";

if (!isset($_GET['dealer']) || $_GET['dealer'] == "") $dealer = "\"%\"";
else $colour = "\"".$_GET['colour']."\"";

$page = $_GET["page"];
$pageSize = 8;
$offset = $pageSize * $page;
//NOTE: When displaying to pagination, show page + 1

$queryText = "SELECT * FROM cars WHERE make LIKE $make AND model LIKE $model AND price >= $minPrice AND price <= $maxPrice AND miles >= $minMileage AND miles <= $maxMileage AND colour LIKE $colour AND region LIKE $region AND town LIKE $town AND dealer LIKE $dealer AND available = \"Y\" LIMIT $offset, $pageSize";
$query = $pdo->query($queryText);

echo "<div style='position:relative;overflow-y:auto;'>";
while ($row = $query->fetch())
{
    echo "<div>";
    if ($isAdmin == "true")
    {
        echo "<a class='displayedCar' onclick='updateSession()' href='admincarpage.html?carIndex=".$row["carIndex"]."'>";
    }
    else
    {
        echo "<a class='displayedCar' onclick='updateSession()' href='carpage.html?carIndex=".$row["carIndex"]."'>";
    }
    echo "<div class='box' style='margin-bottom:10px; margin-right:5px;'><img src='".$row["image"]."' id='image' alt='Car'>";
    echo "<p id='make'><strong>Make</strong>: ".$row["make"]."</p>";
    echo "<p id='model'><strong>Model</strong>: ".$row["model"]."</p>";
    echo "<p id='price'><strong>Price</strong>: £".$row["price"]."</p>";
    echo "<p id='reg'><strong>Registration</strong>: ".$row["Reg"]."</p>";
    echo "<p id='colour'><strong>Colour</strong>: ".$row["colour"]."</p>";
    echo "<p id='telephone'><strong>Telephone</strong>: ".$row["telephone"]."</p>";
    echo "<p id='dealer'><strong>Dealer</strong>: ".$row["dealer"]."</p>";

    if ($isAdmin == "true")
    {
        echo "<br />";
        echo "<div>";
        echo "<button onclick='markUnavailable(".$row["carIndex"].")' class='button style='padding-right:5px;'>Mark Unavailable</button>";
        echo "<button onclick='adminDelete(".$row["carIndex"].")' class='button'>Delete</button>";
        echo "</div>";
    }

    echo "</div>";
    echo "</a>";
    echo "</div>";
}
echo "</div>";

//GENERATE PAGINATION

$pageCount = ceil($pdo->query("SELECT COUNT(*) FROM cars WHERE make LIKE $make AND model LIKE $model AND price >= $minPrice AND price <= $maxPrice AND miles >= $minMileage AND miles <= $maxMileage AND colour LIKE $colour AND region LIKE $region AND town LIKE $town AND dealer LIKE $dealer")->fetchColumn() / $pageSize);
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