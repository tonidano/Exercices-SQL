<?php

if (isset($_POST['logout'])) {


// On démarre la session
    session_start();

    // On détruit les variables de notre session
    session_unset();

    // On détruit notre session
    session_destroy();

    // On redirige le visiteur vers la page d'accueil
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Logout</title>
</head>

<body>
<input type="button" name="logout" value="Logout">

</body>
</html>
