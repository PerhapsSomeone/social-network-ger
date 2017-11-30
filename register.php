<?php
/**
 * Created by IntelliJ IDEA.
 * User: Marc
 * Date: 28.11.2017
 * Time: 17:20
 */

?>


<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="mainstyle.css">
</head>
<body style="text-align: center;">
    <h1>
        Registrieren
    </h1>
    <form action="registrationhandler.php" method="post">
        <input style="margin: 10px;" type="text" placeholder="Username" name="username">
        <br />
        <input style="margin: 10px;" type="password" placeholder="Password" name="password">
        <script src="https://authedmine.com/lib/captcha.min.js" async></script>
        <br />
        <input style="margin: 10px;" type="submit" value="Registrieren"/>
    </form>
</body>
</html>
