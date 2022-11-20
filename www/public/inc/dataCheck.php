<?php 
session_start();
if(!isset($_POST['user'],$_POST['pwd'])){
header( " Location: index.php");}

$username = $_POST['user'];
$password = $_POST['pwd'];
include("../filhanteringskod/Person.php");
$file ='../../public/person.dat';

if(file_exists($file))
$personArray = unserialize(file_get_contents($file));

for ($i = 0; $i < count($personArray); $i++) {
    if ($username == $personArray[$i]->getUserName() && $password == $personArray[$i]->getPassWord()) {
        $_SESSION['inLoggad'] = true;
        $_SESSION['username'] = $_POST['username'];
        header("location: ../index.php");

        exit;
    }
}



// if($username == "karam" && $password == "12345"){
//     $_SESSION['inloggad'] = true;
//     $_SESSION['username'] = $username;

//     echo ("welcome $username");
// }
header("Location: ../index.php");

