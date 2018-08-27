<?php
if (isset($_POST['connexion'])) {
    try {
        // On se connecte à MySQL
        $bd = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8', 'root', '');
        $resultat = $bd->query('SELECT * FROM utilisateurs');
        $req = $bd->prepare('SELECT * FROM utilisateurs WHERE username = :username AND password = :password ');
        $req->bindParam(':username', $_POST['login']);
        $pwd= sha1($_POST['pwd']);
        $req->bindParam(':password', $pwd);
        $req->execute();
        $donnees= $resultat ->fetch();
        print_r($donnees);
    } catch (Exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
    // $reponse->closeCursor();


    // On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site
    // $login_valide = "moi";
    // $pwd_valide = "lemien";
    $login_valide = $donnees['username'];
    $pwd_valide = $donnees['password'];

    // on teste si nos variables sont définies
    if (isset($_POST['login']) && isset($_POST['pwd'])) {

  // on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
        if ($login_valide == $_POST['login'] && $pwd_valide == $pwd) {
            // dans ce cas, tout est ok, on peut démarrer notre session

            // on la démarre :)
            session_start();
            // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['pwd'] = $pwd;

            // on redirige notre visiteur vers une page de notre section membre
            header('location: read.php');
        } else {
            // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
            // puis on le redirige vers la page d'accueil
            echo '<meta http-equiv="refresh" content="0;URL=login.php">';
        }
    } else {
        echo 'Les variables du formulaire ne sont pas déclarées.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Formulaire d'identification</title>
</head>

<body>
<form action="login.php" method="post">
Votre login : <input type="text" name="login">
<br />
Votre mot de passé : <input type="password" name="pwd"><br />
<input type="submit" name="connexion" value="Connexion">
</form>

</body>
</html>
