<?php
try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', 'root', '');

    $resultat = $bd->query("SELECT * FROM bookings WHERE clientId=24 OR clientId=25");
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
    <title>Réservations</title>

  </head>
<body>

    <h1>Liste clients</h1>
    <table>
					<th>Id</th>
          <th>CLientID</th>

        <?php while ($donnees= $resultat ->fetch()) {
    ?>

          <tr>
            <td><?= $donnees['id']; ?></td>
            <td><?= $donnees['clientId']; ?></td>
            <td> <a href="./formulaire8.php?id=<?= $donnees['id']; ?>">supprimer</a> </td>
          </tr>

      <?php
} ?>


    </table>
  </body>
</html>
