<?php include("databaseinit.php"); ?>
<?php
$usr = $_POST["usr"];
$pwd = $_POST["pwd"];
$email = $_POST["email"];

$queryText = "SELECT * FROM users WHERE usr = \"$usr\"";
$query = $pdo->query($queryText);

if ($query)
{
    $queryText = "INSERT INTO users (usr, pwd, email) VALUES (\"$usr\", \"$pwd\", \"$email\")";

    $query = $pdo->query($queryText);
    echo "1";
}
else
{
    echo "0";
}

?>