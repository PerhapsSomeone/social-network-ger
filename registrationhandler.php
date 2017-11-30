<?php
session_start();
/**
 * Created by IntelliJ IDEA.
 * User: Marc
 * Date: 28.11.2017
 * Time: 17:13
 */
unset($_SESSION["id"]);
require("db.php");

$newuser = $_POST["username"];
$newpass = $_POST["password"];

$hashedpass = hash("sha512", $newpass);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `users` (`name`, `password`, `id`) VALUES ('$newuser', '$hashedpass', NULL)";
$result = $conn->query($sql);
$conn->close();

header("Location: index.php");