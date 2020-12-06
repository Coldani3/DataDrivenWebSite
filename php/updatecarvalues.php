<?php include("databaseinit.php") ?>
<?php
session_start();
if (isset($_SESSION["admin"])) $isAdmin = $_SESSION["admin"];
else $isAdmin = false;

if ($isAdmin == "true")
{
    //$queryText = 
}
?>