<?php
/**
 * Created by IntelliJ IDEA.
 * User: Marc
 * Date: 28.11.2017
 * Time: 20:20
 */
session_start();
if(!isset($_SESSION["id"])) {
    header("Location: index.php");
}

$AUTHOR = $_SESSION["name"];
$HEADING = $_POST["heading"];
$CONTENT = $_POST["content"];



require("db.php");

$sql = "INSERT INTO `posts` (`id`, `content`, `posted`, `heading`, `author`) VALUES (NULL, '$CONTENT', CURRENT_TIMESTAMP, '$HEADING', '$AUTHOR')";
$conn->query($sql);

header("Location: main.php");