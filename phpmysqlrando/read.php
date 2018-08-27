<?php
try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8', 'root', '');

    $resultat = $bd->query('SELECT * FROM hiking');
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
    <title>Randonnées</title>
    <link rel="stylesheet" href=".basics.css" media="screen" title="no title" charset="utf-8">
  </head>
<body>

    <h1>Liste des randonnées</h1>
    <table>
					<th></th>
          <th>Nom</th>
          <th>Difficulté</th>
          <th>Distance</th>
          <th>Durée</th>
          <th>Dénivelé</th>
        <?php while ($donnees= $resultat ->fetch()) {
    ?>

          <tr>
            <td><?= $donnees['id']; ?></td>
            <td><?= $donnees['name']; ?></td>
            <td><?= $donnees['difficulty']; ?></td>
            <td><?= $donnees['distance']; ?></td>
            <td><?= $donnees['duration']; ?></td>
            <td><?= $donnees['height_difference']; ?></td>
						<td> <a href="./update.php?id=<?= $donnees['id']; ?>">corriger</a> </td>
						<td> <a href="./delete.php?id=<?= $donnees['id']; ?>">supprimer</a> </td>
          </tr>

      <?php
} ?>

<?php include "check_login.php" ?>

    </table>
  </body>
</html>
