<?php
session_start();
if(!isset($_SESSION["id"])) {
    header("Location: index.php");
}
require("db.php");

/**
 * Created by IntelliJ IDEA.
 * User: Marc
 * Date: 28.11.2017
 * Time: 19:44
 */

$RECEIVER = $_POST["receiverid"];
$CONTENT = $_POST["content"];

$check_value = isset($_POST['showAuthor']) ? 1 : 0;

if($check_value) {
    $AUTHOR = $_SESSION["name"];
}
else {
    $AUTHOR = "Anonym";
}

echo $AUTHOR;

$sql = "INSERT INTO `messages` (`receiver`, `sent`, `content`, `author`) VALUES ('$RECEIVER', CURRENT_TIMESTAMP, '$CONTENT', '$AUTHOR')";
$conn->query($sql);


header("Location: main.php");