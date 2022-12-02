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
$user = array("admin"=>"12345", "hank"=>"321", "test"=>"qwerty"); // en array kan tas bort

foreach($user as $keyOfUser => $valOfPass) { //loop igenom arrayn
  echo "Key=" . $keyOfUser . ", Value=" . $valOfPass; // skriva ut key och value, i detta fall user och password
  echo "<br>";
}

 
$password = $_POST['pwd'];
$hashedPassWordTest =  password_hash($password, PASSWORD_DEFAULT);
$username = $_POST['user'];
$user['admin'] = $hashedPassWordTest;           //samma som övan men med hashad lödsenord
$user['hank'] = $hashedPassWordTest;
$user['test'] =  $hashedPassWordTest;




header('/home/karam/Skrivbord/WebbServer/Server-moment4/www/public/index.php');
