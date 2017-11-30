<?php
session_start();
if(!isset($_SESSION["id"])) {
    header("Location: index.php");
}
require("db.php");

$userid = $_SESSION["id"];
/**
 * Created by IntelliJ IDEA.
 * User: Marc
 * Date: 28.11.2017
 * Time: 18:43
 */

$sql = "SELECT * FROM users WHERE id = '$userid'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $username = $row["name"];
    $realid = $row["ID"];
}

$sql = "SELECT * FROM `messages` WHERE receiver = '$username'";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="mainstyle.css">
    <title>Soziales Netzwerk</title>
</head>
<body>
    <div style="text-align: center;">
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script>
            $(document).ready(function(){
                var $form = $('form');
                $form.submit(function(){
                    $.post($(this).attr('action'), $(this).serialize(), function(response){

                    },'json');
                    return false;
                });
            });
        </script>
    <h1 style="margin-top: 50px; font-size: 40px;">Willkommen zurück <?php echo $username; ?>!</h1>
        <?php
        if ($result->num_rows > 0) {
            echo $result->num_rows." private Nachricht/en!"."<br />";
            echo "<a href='pm.php'>Ansehen</a>"."<br /><br />";
        }
        ?>
    <button style="margin-bottom: 30px" onclick="$('#optionSlide').slideToggle('slow', 'linear')">Optionen</button>
    <div style="display: none; text-align: center;" id="optionSlide">
            <a href="logout.php" style="text-align: center">Ausloggen</a>
            <p>User-ID: <?php echo $realid; ?></p>
    </div>
        <br />
        <button onclick="$('#menuSlide').slideToggle('slow', 'linear')">Neue private Nachricht</button>
    <div style="display: none" id="menuSlide">
            <form action="sendpm.php" id="pmSend">
                <p>Private Nachricht senden</p>
                <input type="text" placeholder="Empfänger-Name" name="receiverid" required>
                <br />
                <textarea rows="10" cols="40" name="content" form="pmSend" placeholder="Nachricht hier eingeben..." required></textarea>
                <br />
                <input type="checkbox" name="showAuthor">Absender zeigen</input>
                <br />
                <input type="submit" onclick="alert('Erfolgreich!')" value="Senden" />
            </form>
    </div>
        <br /><br />
        <button onclick="$('#postMenu').slideToggle('slow', 'linear')">Neuer Post</button>
        <div style="display: none" id="postMenu">
            <form id="newpost" action="sendpost.php" method="post">
                <br />
                <input type="text" name="heading" placeholder="Titel" required>
                <br /><br />
                <textarea rows="10" cols="40" name="content" form="newpost" placeholder="Post hier eingeben..." required></textarea>
                <br />
                <input onclick="window.location = 'main.php'" type="submit" value="Posten">
            </form>
            </form>
        </div>
    <p>Alle Posts: </p>
    <?php
    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
            echo "Post-ID: " .$row["id"]."<br />";
            echo "Gepostet am ".$row["posted"]."<br />";
            echo "Gepostet von ".$row["author"]."<br />";
            echo "<p style='font-size: 40px; margin: 0px'>".$row["heading"]."</p>"."<br />";
            echo "<p style='font-size: 20px; margin: 0px;'>".$row["content"]."</p><br />";
            echo "<p style='font-size: 20px'>Likes: ".$row["likes"]."</p><br />";
            echo "<div style='margin-bottom: 20px;'></div>";
    }
    ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>