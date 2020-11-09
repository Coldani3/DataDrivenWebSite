<?php
session_start();

if (isset($_GET["username"]) && isset($_GET["password"]))
{
    $_SESSION["username"] = $_GET["username"];
    //very bad don't do this, replace with actual login
    $_SESSION["password"] = $_GET["password"];
}
?>