<?php
session_start();
/**
 * Created by IntelliJ IDEA.
 * User: Marc
 * Date: 28.11.2017
 * Time: 18:17
 */
if(isset($_SESSION["id"])) {
    echo "<script>if (confirm('Du bist noch eingeloogt. Auf die Startseite weiterleiten?')) {
        window.location = 'main.php'; 
    }
    </script>";
}
?>

<html>
<head>
    <link rel="stylesheet" href="mainstyle.css">
    <title>Soziales Netzwerk</title>
</head>
<body style="text-align: center;">
<h1 style="margin: 40px; font-size: 50px;">Soziales Netzwerk - Remastered.</h1>
<form method="post" action="login.php">
    <input style="margin: 10px;" type="text" placeholder="Nutzername" name="username">
    <br />
    <input style="margin: 10px;" type="password" placeholder="Passwort" name="password">
    <br />
    <input type="submit" value="Login" />
</form>
<div style="margin-bottom: 70px;"></div>
<a href="register.php">Registrieren</a>
</body>
</html>
