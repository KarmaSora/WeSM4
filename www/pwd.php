<?php //uppgift 4 
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}


/**
  $userAsArray = array('admin123'=>'EDT','userTest'=>'Test', 'Mao'=> 'karma' );
   //$hashedPass = password_hash($_POST['pwd'] , PASSWORD_DEFAULT);
    // echo "<br><br>". " password in hash code is: ". "<br>" . $hashedPass . "<br><br>";
  foreach($userAsArray as $username => $password){
     echo(' userOfArray..: ' . $username . ' password is: ' . $password. '<br>');
  }
 * 
 */


 
$password = $_POST['pwd'];
$hashedPassWordTest =  password_hash($password, PASSWORD_DEFAULT);
$username = $_POST['user'];
$user['admin'] = $hashedPassWordTest;
$user['hank'] = $hashedPassWordTest;
$user['test'] =  $hashedPassWordTest;

/* 
if (password_verify($password, $hashedPassWordTest)) {
   echo ('ok');
} else {
   echo ('not ok');
}
*/


header('/home/karam/Skrivbord/WebbServer/Server-moment4/www/public/index.php');
