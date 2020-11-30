<?php include("databaseinit.php"); ?>
<?php
$query = $pdo->query("UPDATE cars SET available = \"N\" WHERE carIndex LIKE ".$_POST["carIndex"]);
?>