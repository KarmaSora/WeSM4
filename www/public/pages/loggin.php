<?php
if (session_status() == PHP_SESSION_NONE) {
     session_start();
  }
  $_SESSION['CSRFToken'] = bin2hex(random_bytes(32));
  echo $_SESSION['CSRFToken'] ."<br>";
?>
<form action="../inc/dataCheck.php" method="post">
<label> username</label>
<input type="text" name="user">
<br>
<label> password</label>
<input type="password" name="pwd">
<input type="hidden" name="CSRFToken" value = "<?php echo($_SESSION['CSRFToken']);?>">
<br>
<input type="submit" value="send"> 
</form>