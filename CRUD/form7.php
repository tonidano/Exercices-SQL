<?php
try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', 'root', '');

    $resultat = $bd->query("SELECT * FROM clients WHERE id=24 OR id=25");
    // $donnees = $resultat->fetch();
    $donnees='';
} catch (Exception $e) {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}
// $reponse->closeCursor();

?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste clients</title>

  </head>
<body>

    <h1>Liste clients</h1>
    <table>
					<th>Numéro client</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Date de naissance</th>
          <th>Carte de fidélité</th>
          <th>Numéro de carte</th>
        <?php while ($donnees= $resultat ->fetch()) {
    ?>

          <tr>
            <td><?= $donnees['id']; ?></td>
            <td><?= $donnees['lastName']; ?></td>
            <td><?= $donnees['firstName']; ?></td>
            <td><?= $donnees['birthDate']; ?></td>
            <td><?= $donnees['card']; ?></td>
            <td><?= $donnees['cardNumber']; ?></td>
						<td> <a href="./formulaire7.php?id=<?= $donnees['id']; ?>">supprimer</a> </td>
          </tr>

      <?php
} ?>


    </table>
  </body>
</html>
