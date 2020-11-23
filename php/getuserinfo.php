<?php include("databaseinit.php"); ?>
<?php
$userInfo = new stdClass();
$result = "";
$usr = $_POST["usr"];
//$query = $pdo->query("SELECT * FROM users WHERE usr LIKE \"$usr\"");
$query = $pdo->prepare("SELECT * FROM users WHERE usr = ?");
$query->execute([$usr]);
//$queryResult = $query->fetch();

while ($queryResult = $query->fetch())
{
    $userInfo->email = $queryResult["email"];
    $userInfo->usr = $queryResult["usr"];
    $userInfo->admin = $queryResult["admin"];
    $userInfo->profilePic = $queryResult["profilePic"];

    $result = json_encode($userInfo);
}

echo $result;
?>