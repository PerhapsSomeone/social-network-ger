<?php
/**
 * Created by IntelliJ IDEA.
 * User: Marc
 * Date: 30.11.2017
 * Time: 19:35
 */
session_start();
unset($_SESSION["id"]);
unset($_SESSION["name"]);

if(!isset($_SESSION["id"]) && !isset($_SESSION["name"])) {
    echo "Logged out";
}

header("Location: index.php")
?>