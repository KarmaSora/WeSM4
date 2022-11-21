<?php 
session_start();
?>
<h1>Webbservern fungerar!</h1>
<p><strong>Denna sida (index.php) skall bytas ut.</strong></p>
<h2>main page</h2>
<br> 
<?php if(!isset($_SESSION['inLoggad'])){
include('./inc/unknownUserMenu.php');
}
if(isset($_SESSION['inLoggad'])){
    echo('welcome you are logged in as ' .  $_SESSION['username'] . ' \n');
include('./inc/knownUserMenu.php');} ?>
  