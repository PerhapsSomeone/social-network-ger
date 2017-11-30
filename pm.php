<?php
/**
 * Created by IntelliJ IDEA.
 * User: Marc
 * Date: 28.11.2017
 * Time: 20:01
 */
session_start();
if(!isset($_SESSION["id"])) {
    header("Location: index.php");
}

$name = $_SESSION["name"];

require("db.php");

$sql = "SELECT * FROM `messages` WHERE receiver = '$name'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Private Nachrichten</title>
    <link rel="stylesheet" href="mainstyle.css">
</head>
<body style="text-align: center;">
    <h1 style="font-size: 55px; margin-bottom: 35px">Private Nachrichten von <?php echo $name;?></h1>
    <a style="font-size: 30px" href="main.php">Zurück</a>
    <br />
    <button style="margin: 30px;" onclick="window.location = 'delpm.php'">Nachrichten löschen</button>
    <?php
    while($row = $result->fetch_assoc()) {
        echo "<p style='font-size: 30px; margin-bottom: 5px'>Empfangen am ".$row["sent"]."</p><br />";
        echo "<p style='font-size: 25px;'>"."Gesendet von: ".$row["author"]."</p><br />";
        echo "<p style='font-size: 20px; margin-bottom: 5px'>".$row["content"]."</p><br />";
    }
    ?>
</body>
</html>