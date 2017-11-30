<?php
/**
 * Created by IntelliJ IDEA.
 * User: Marc
 * Date: 30.11.2017
 * Time: 20:42
 */
session_start();

if($_SESSION["id"] == "5") {

}
else {
    header("Location: main.php");
    exit();
}

$pmid = $_POST["pmid"];

require("db.php");
$sql = "DELETE FROM `messages` WHERE `messages`.`id` = $pmid";
$conn->query($sql);
$conn->close();

header("Location: admin.php");