<form action="../filhanteringskod/Register.php" method="post">
<label> firstName</label>
<input type="text" name="firstName">
<br>
<label> afterName</label>
<input type="text" name="afterName">
<br><label> username</label>
<input type="text" name="user">
<br>
<label> password</label>
<input type="password" name="pwd">
<input type="hidden" name="CSRFToken" value = "<?php echo($_SESSION['CSRFToken']);?>" >
<br>
<input type="submit" value="send"> 

</form>