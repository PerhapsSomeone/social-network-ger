<?php
session_start();
/**
 * Created by IntelliJ IDEA.
 * User: Marc
 * Date: 27.11.2017
 * Time: 18:35
 */

$inputuser = $_POST["username"];
$inputpassword = $_POST["password"];

require("db.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE name = '$inputuser'";
$result = $conn->query($sql);
$hashedinput = hash("sha512", $inputpassword);

while($row = $result->fetch_assoc()) {
    if($row["name"] == $inputuser && $row["password"] == $hashedinput) {
        echo "Successfully authenticated!";
        $_SESSION["id"] = $row["ID"];
        $_SESSION["name"] = $row["name"];
    }
}
if(!isset($_SESSION["id"])) {
    header("Location: index.php");
    $conn->close();
    exit();
}

$conn->close();
header("Location: main.php");


?>

<html>
<h1>Please wait...</h1>
</html>
