<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./favicon.png" rel="icon" type="image/png">
</head>

<body>
    <h1>Webbservern fungerar!</h1>
    <p><strong>Denna sida (index.php) skall bytas ut.</strong></p>
    <h2>main page</h2>
    <br><br>
    <?php 
    if (!isset($_SESSION['inLoggad'])) {
    
        include('./inc/unknownUserMenu.php');
    }
    if (isset($_SESSION['inLoggad'])) {
        echo ('welcome you are logged in as ' .  $_SESSION['username'] . ' \n');
        include('./inc/knownUserMenu.php');
    } ?>
</body>

</html>