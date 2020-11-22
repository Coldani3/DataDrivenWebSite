<?php 
//session_start();
include("databaseinit.php"); 
?>
<?php
//session_start();

$pwd = $_POST["pwd"];
$usr = $_POST["usr"];

// echo "PWD: ".$pwd;
// echo "USR: ".$usr;

$queryText = "SELECT * FROM users WHERE usr = \"$usr\" AND pwd = \"$pwd\"";

//echo $queryText;

$query = $pdo->query($queryText);

if ($query)
{
    echo "1";
}
else
{
    echo "0";
}

$result = $query->fetch();

//var_dump($result);

//$_SESSION["userID"] = $result["userID"];

// if ($result["admin"] == 1)
// {
//     $_SESSION["admin"] = true;
// }
// else
// {
//     $_SESSION["admin"] = false;
// }
?>