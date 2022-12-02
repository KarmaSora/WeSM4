<?php
if (session_status() == PHP_SESSION_NONE) {
     session_start();
  }
  $_SESSION['CSRFToken'] = bin2hex(random_bytes(32));
  echo $_SESSION['CSRFToken'] ."<br>";

?>

<form  method="post">
<label> username</label>
<input type="text" name="user">
<br>
<label> password</label>
<input type="password" name="pwd">
<input type="hidden" name="CSRFToken" value = "<?php echo($_SESSION['CSRFToken']);?>">
<br>
<input type="submit" value="send"> 
</form>

<?php
if(isset($pwd) && isset($user))
  require_once('../../pwd.php');
else
echo('not set');

foreach ($user as $usernameKey => $pwdKey) { 
  
  if ($username == $user[$usernameKey] && password_verify($password, $user[$pwdKey])) {
     echo ("password is correct");
     $_SESSION['inLoggad'] = true;
     $_SESSION['username'] = $_POST['user'];
     echo "<br><br><br>HHHH";
     header('Location: /home/karam/Skrivbord/WebbServer/Server-moment4/www/public/index.php');

  }


  //en loop så att user och password blir synliga vid testkörning.
  echo (' userOfArray..: ' . $username . ' password is: ' . $password . '<br>');
}

?>

