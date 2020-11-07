<?php
session_start();

if (isset($_GET["username"]) && isset($_GET["password"]))
{
    $_SESSION["username"] = $_GET["username"];
    $_SESSION["password"] = $_GET["password"];
}
?>