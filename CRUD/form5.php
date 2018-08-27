<?php
try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', 'root', '');

    $resultat = $bd->query('SELECT * FROM shows');
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
    <title></title>

  </head>
<body>

    <h1>Liste clients</h1>
    <table>
      <th></th>
      <th>Spectacle</th>
      <th>Artiste</th>
      <th>Date</th>
      <th>Type de spectacle</th>
      <th>Genre1</th>
      <th>Genre2</th>
      <th>Durée</th>
      <th>Début</th>
        <?php while ($donnees= $resultat ->fetch()) {
    ?>

          <tr>
            <td><?= $donnees['id']; ?></td>
            <td><?= $donnees['title']; ?></td>
            <td><?= $donnees['performer']; ?></td>
            <td><?= $donnees['date']; ?></td>
            <td><?= $donnees['showTypesId']; ?></td>
            <td><?= $donnees['firstGenresId']; ?></td>
            <td><?= $donnees['secondGenreId']; ?></td>
            <td><?= $donnees['duration']; ?></td>
            <td><?= $donnees['startTime']; ?></td>
						<td> <a href="./formulaire5.php?id=<?= $donnees['id']; ?>">corriger</a> </td>
          </tr>

      <?php
} ?>


    </table>
  </body>
</html>
