<?php
session_start();
require("db.php");
/**
 * Created by IntelliJ IDEA.
 * User: Marc
 * Date: 28.11.2017
 * Time: 19:20
 */

if($_SESSION["id"] == "5") {

}
else {
    header("Location: main.php");
    exit();
}

$pmid = $_POST["pmid"];

$sql = "DELETE FROM `messages` WHERE `messages`.`id` = $pmid";
$conn->query($sql);
$conn->close();

//header("Location: main.php");
?>