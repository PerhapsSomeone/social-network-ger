<?php
/**
 * Created by IntelliJ IDEA.
 * User: Marc
 * Date: 30.11.2017
 * Time: 20:19
 */
require("db.php");

$RECEIVER = "Marc";
$CONTENT = "Loreim ipsum";
$AUTHOR = "Marc";

$sql = "INSERT INTO `messages` (`receiver`, `sent`, `content`, `author`) VALUES ('$RECEIVER', CURRENT_TIMESTAMP, '$CONTENT', '$AUTHOR');";
$conn->query($sql);

echo $AUTHOR;

?>