<?php
session_start();

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