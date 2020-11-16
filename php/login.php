<?php include("databaseinit.php"); ?>
<?php
session_start();

$username = $_SESSION["username"];
$password = $_SESSION["password"];

$query = $pdo->query("SELECT * FROM users WHERE username = $username AND password = $password");

if ($query)
{
    echo "1";
}
else
{
    echo "2";
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