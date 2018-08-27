<?php


try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', 'root', '');

    if (!isset($_POST['button'])) {
        $id = $_GET['id'];
        $resultat = $bd->query("SELECT * FROM bookings WHERE id = $id");

        $donnees = $resultat->fetch();
    } else {
        $sql = "DELETE FROM bookings WHERE id = :id";
        $tab = array(
    ':id' => $_POST['id']
    );

        $req = $bd->prepare($sql);
        if ($req->execute($tab)) {
            echo 'La réservations a été supprimée avec succès !';
        };
    }
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Clients</title>
</head>
<body>
	<a href="./form8.php">Liste des données</a>
<?php if (!isset($_POST['button'])) {
     ?>
	<h1>Supprimer</h1>
	<form action="formulaire8.php" method="post">
    <label><p>Id :
      <input type="number" name="id" value="<?= $donnees['id']; ?>"></p></label>

    <label><p>Cliant Id :
      <input type="number" name="clientId" value="<?= $donnees['clientId']; ?>"></p></label>

		<input type="hidden" name="id" value="<?= $id; ?>">
		<button type="submit" name="button">supprimer</button>
	</form>
<?php
 } ?>



</body>
</html>
