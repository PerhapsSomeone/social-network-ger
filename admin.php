<?php
session_start();
/**
 * Created by IntelliJ IDEA.
 * User: Marc
 * Date: 28.11.2017
 * Time: 19:13
 */

if($_SESSION["id"] == "5") {

}
else {
    header("Location: main.php");
    exit();
}

?>

<html>
<head>
    <link rel="stylesheet" href="mainstyle.css">
    <title>Adminbereich</title>
</head>
<body style="text-align: center">
<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<h1 style="font-size: 80px; color: #ff0015; margin: 50px;">ADMINBEREICH</h1>
<form method="post" action="delpost.php">
    <input type="number" placeholder="Post-ID" name="postid">
    <button type="submit">Post löschen</button>
</form>
<form method="post" action="delpmadmin.php">
    <input type="number" placeholder="PM-ID" name="pmid">
    <button type="submit">Nachricht löschen</button>
    <br />
</form>
<form action="forcelogin.php" method="post">
    <input type="number" placeholder="Account-ID">
    <input type="submit" value="Einloggen">
    <br />
</form>
<div style="margin: 50px;"></div>
<hr size="20" style="background-color: silver;">
<p style="font-size: 30px">Private Nachrichten</p>
<?php
require("db.php");
$sql = "SELECT * FROM `messages`";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo "<hr size='3'>";
    echo "<p style='font-size: 15px; margin-bottom: 0px'>PM ID: ".$row["id"]."</p><br />";
    echo "<p style='font-size: 15px; margin-bottom: 0px'>Gesendet um ".$row["sent"]."</p><br />";
    echo "<p style='font-size: 15px; margin-bottom: 0px'>Gesendet von: ".$row["author"]."</p><br />";
    echo "<p style='font-size: 15px; margin-bottom: 0px'>Inhalt: ".$row["content"]."</p><br />";
}
?>
<hr size="20" style="background-color: silver;">
<p>Nutzer:</p>
<?php
$sql = "SELECT * FROM `users`";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    echo "<p style='font-size: 15px; margin-bottom: 0px'>Nutzer-ID: ".$row["ID"]."</p><br />";
    echo "<p style='font-size: 15px; margin-bottom: 0px'>Nutzername ".$row["name"]."</p><br />";
    echo "<p style='font-size: 15px; margin-bottom: 0px'>Passwort (SHA512) ".$row["password"]."</p><br />";
    echo "<hr size='3'>";
}
?>
</body>
</html>
