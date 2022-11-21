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

if($username == "admin" && $password == "test"){
    $_SESSION['inloggad'] = true;
    $_SESSION['username'] = $username;
    echo ("welcome $username");
}


for ($i = 0; $i < count($personArray); $i++) {
    if ($username == $personArray[$i]->getUserName() && $password == $personArray[$i]->getPassWord()) {
        $_SESSION['inLoggad'] = true;
        $_SESSION['username'] = $_POST['username'];
        header("location: ../index.php");
        exit;
    }
    
}
 

header("Location: ../index.php");

