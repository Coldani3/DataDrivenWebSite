<?php 
session_start();
include("databaseinit.php"); ?>
<?php

$usr = $_SESSION["username"];
$pwd = $_SESSION["password"];
$queryText = "SELECT * FROM users WHERE usr = \"$usr\" AND pwd = \"$pwd\"";

try
{
$query = $pdo->query($queryText);
}
catch (\PDOException $e)
{
    echo "$queryText";
}

if ($query)
{
    echo "1";
}
else
{
    echo "0";
}

$result = $query->fetch();

$_SESSION["userID"] = $result["userID"];

if ($result["admin"] == 1)
{
    $_SESSION["admin"] = true;
}
else
{
    $_SESSION["admin"] = false;
}
?>