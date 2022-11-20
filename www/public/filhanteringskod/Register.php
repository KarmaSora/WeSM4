<!DOCTYPE html>
<html lang="se">

<head>
    <meta charset="UTF-8">
    <title>Filhantering Skriv</title>
</head>

<body>

    <?php // filen motsvarat personWrite.php i M2, som i mitt fall är en blanding av personWrite och personRead
    include("./Person.php");
    $personArray = array();

    $newFirstName = $_POST['firstName'];
    $newFirstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $newFirstName = strip_tags( $_POST['firstName']);

    $newAfterName = $_POST['afterName'];
    $newAfterName = filter_input(INPUT_POST, 'afterName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $newAfterName =  strip_tags($_POST['afterName']);


    $newUser =  $_POST['user'];
    $newUser = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $newUser = strip_tags($_POST['user']);

    $newPwd = $_POST['pwd'];
    $newPwd = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $newPwd = strip_tags($_POST['pwd']);

    $hashCode = password_hash($newPwd , PASSWORD_DEFAULT);

    $file = "../../person.dat";
    if (file_exists($file)) {
        $personArray = unserialize(file_get_contents($file));
        $personArray[] = new Person($newFirstName, $newAfterName, $newUser, $newPwd);
    }
    file_put_contents($file, serialize($personArray));

    // Färdigt! Resten av koden gör enbart en utskrift av innehållet.
    header('Content-Type: text/html; charset=utf-8');

    for ($i = 0; $i < count($personArray); $i++) {
        echo "<h1>" . $personArray[$i]->getFirstName() . " " . $personArray[$i]->getSurName() . "</h1>";
        echo "<p><strong>Användarnamn: </strong>" . $personArray[$i]->getUserName() . "</p>";
        echo "<p><strong>Lösenord: </strong>" . $personArray[$i]->getPassWord() . "</p>";
        echo "<hr>";
    }


    ?>

    <a href="../index.php">Go to login page!</a>
</body>

</html>