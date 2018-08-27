<?php


try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', 'root', '');

    if (!isset($_POST['button'])) {
        $id = $_GET['id'];
        $resultat = $bd->query("SELECT * FROM clients WHERE id = $id");

        $donnees = $resultat->fetch();
    } else {
        $sql = "DELETE FROM clients WHERE id = :id";
        $tab = array(
    ':id' => $_POST['id']
    );

        $req = $bd->prepare($sql);
        if ($req->execute($tab)) {
            echo 'Le client a été supprimé avec succès !';
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
	<a href="./form7.php">Liste des données</a>
<?php if (!isset($_POST['button'])) {
     ?>
	<h1>Supprimer</h1>
	<form action="formulaire7.php" method="post">
    <label><p>Numéro client :
      <input type="number" name="id" value="<?= $donnees['id']; ?>"></p></label>

    <label><p>Nom :
      <input type="text" name="nom" value="<?= $donnees['lastName']; ?>"></p></label>
    <label><p>Prénom :
      <input type="text" name="prenom" value="<?= $donnees['firstName']; ?>"></p></label>
    <label><p>Date de naissance :
      <input type="date" name="datenaissance" value="<?= $donnees['birthDate']; ?>"></p></label>
    <label><p>Carte de fidélité :
            <input type="radio" name="cartefidelite" value="1" <?php if ($donnees['card']==1) {
         echo 'checked="checked"' ;
     } ?>> Oui </label>
            <input type="radio" name="cartefidelite" value="0" <?php if ($donnees['card']==0) {
         echo 'checked="checked"' ;
     } ?>> Non </p></label>
    <label><p>Numéro de carte :
            <input type="number" name="numerocarte" value="<?= $donnees['cardNumber']; ?>"></p></label>
		<input type="hidden" name="id" value="<?= $id; ?>">
		<button type="submit" name="button">supprimer</button>
	</form>
<?php
 } ?>



</body>
</html>
