<?php
try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', 'root', '');

    $resultat = $bd->query("SELECT * FROM tickets WHERE bookingsId=24 OR bookingsId=25");
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
    <title>Billets</title>

  </head>
<body>

    <h1>Liste clients</h1>
    <table>
					<th>Id</th>
          <th>Prix</th>
          <th>Réservation Id</th>

        <?php while ($donnees= $resultat ->fetch()) {
    ?>

          <tr>
            <td><?= $donnees['id']; ?></td>
            <td><?= $donnees['price']; ?></td>
            <td><?= $donnees['bookingsId']; ?></td>
            <td> <a href="./formulaire9.php?id=<?= $donnees['id']; ?>">supprimer</a> </td>
          </tr>

      <?php
} ?>


    </table>
  </body>
</html>
