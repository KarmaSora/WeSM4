<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (empty($_POST['user']) || empty($_POST['pwd'])) {
    echo ("must insert both username and password");
    header("Location: ../pages/loggin.php");
    exit;
}
echo $_POST['CSRFToken'] . "<br>" . $_SESSION['CSRFToken'];
if ($_SESSION['CSRFToken'] == $_POST['CSRFToken']) {
    echo "OK!";


    if (!isset($_POST['user'], $_POST['pwd'])) {
        header(" Location: index.php");
    }
    $username = $_POST['user'];


    $password = $_POST['pwd'];
    $hashedPass = password_hash($_POST['pwd'] , PASSWORD_DEFAULT);
    // echo "<br><br>". " password in hash code is: ". "<br>" . $hashedPass . "<br><br>";




    include("../filhanteringskod/Person.php");
    $file = '../../person.dat';



    if (file_exists($file))
        $personArray = unserialize(file_get_contents($file));
    //test konto 
    if ($username == "admin" && $password == "123") {
        $_SESSION['inLoggad'] = true;
        $_SESSION['username'] = $username;
        echo ("welcome $username");
        header("Location: ../index.php");
        exit;
    }       

    for ($i = 0; $i < count($personArray); $i++) {
        echo "loopar " . $i . " : " . $personArray[$i]->getUserName()  . " : " .  $personArray[$i]->getPassWord() . "<br>";
        if ($username == $personArray[$i]->getUserName() && password_verify($password, $personArray[$i]->getPassWord())) {
            echo ("password is correct");
            $_SESSION['inLoggad'] = true;
            $_SESSION['username'] = $_POST['user'];
            header("location: ../index.php");
            echo "<br><br><br>HHHH";
            header("../index.php");
            exit;
         
        }
    }

    //header("Location: ../index.php");
} else {
    echo "Inte OK!";
     header('../index.php');
    exit;
}
