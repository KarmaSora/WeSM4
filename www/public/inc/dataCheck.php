<?php 
session_start();
if(!isset($_POST['user'],$_POST['pwd'])){
header( " Location: index.php");}

$username = $_POST['user'];
$password = $_POST['pwd'];
include("../filhanteringskod/Person.php");
$file ='../../person.dat';

if(file_exists($file))
    $personArray = unserialize(file_get_contents($file));


    //test konto 
if($username == "admin" && $password == "123"){
    $_SESSION['inLoggad'] = true;
    $_SESSION['username'] = $username;
    echo ("welcome $username");
}


for ($i = 0; $i < count($personArray); $i++) {
    echo "loopar " . $i . " : " . $personArray[$i]->getUserName()  . " : " .  $personArray[$i]->getPassWord() . "<br>";
    if ($username == $personArray[$i]->getUserName() && $password == $personArray[$i]->getPassWord()) {
        $_SESSION['inLoggad'] = true;
        $_SESSION['username'] = $_POST['user'];
        header("location: ../index.php");
        echo "<br>HHHH";
        exit;
    }
    
}
 

header("Location: ../index.php");

