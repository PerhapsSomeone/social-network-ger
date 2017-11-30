<?php
/**
 * Created by IntelliJ IDEA.
 * User: Marc
 * Date: 28.11.2017
 * Time: 20:12
 */
session_start();
if(!isset($_SESSION["id"])) {
    header("Location: index.php");
    exit();
}

$name = $_SESSION["name"];

require("db.php");

$sql = "DELETE FROM `messages` WHERE receiver = '$name'";
$result = $conn->query($sql);
header("Location: pm.php");
?>