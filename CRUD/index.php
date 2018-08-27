<?php
try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', 'root', '');

    $resultat = $bd->query("SELECT *  FROM clients");
    // $donnees = $resultat->fetch();
    $donnees = '';
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
    <title>CRUD</title>
  </head>
<body>

    <h1>CRUD</h1>
    <table>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        <?php while ($donnees= $resultat ->fetch()) {
    ?>

          <tr>

            <td>Nom : <?= $donnees['lastName']; ?></td>
            </tr>
            <tr>
            <td>Prénom : <?= $donnees['firstName']; ?></td>
            </tr>
            <tr>
            <td>Date de naissance : <?= $donnees['birthDate']; ?></td>
            </tr>
            <tr>
              <?php
                if ($donnees['card']== 1) {
                    ?>
                    <td>Carte de fidélité : Oui</td>
              <?php
                } else {
                    ?>
              <td>Carte de fidélité : Non</td>
            <?php
                } ?>
            </tr>
            <tr>
              <?php
                if ($donnees['card']== 1) {
                    ?>
                    <td>Numéro de carte : <?= $donnees['cardNumber']; ?></td>
              <?php
                } ?>



          </tr>
          <tr>
          </tr>

      <?php
} ?>



    </table>
  </body>
</html>


<!-- Exercice 1 -->
  <!-- $resultat = $bd->query('SELECT * FROM clients'); -->
  <!-- <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>CRUD</title>
    </head>
  <body>

      <h1>CRUD</h1>
      <table>
  					<th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          <?php while ($donnees= $resultat ->fetch()) {
                    ?>

            <tr>
              <td><?= $donnees['id']; ?></td>
              <td><?= $donnees['lastName']; ?></td>
              <td><?= $donnees['firstName']; ?></td>
              <td><?= $donnees['birthDate']; ?></td>
              <td><?= $donnees['card']; ?></td>
              <td><?= $donnees['cardNumber']; ?></td>

            </tr>

        <?php
                } ?>



      </table>
    </body>
  </html> -->


<!-- Exercice 2 -->
  <!-- $resultat = $bd->query('SELECT * FROM showTypes'); -->
<!-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CRUD</title>
  </head>
<body>

    <h1>CRUD</h1>
    <table>
					<th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        <?php while ($donnees= $resultat ->fetch()) {
                    ?>

          <tr>
            <td><?= $donnees['id']; ?></td>
            <td><?= $donnees['type']; ?></td>


          </tr>

      <?php
                } ?> -->


<!-- Exercice 3 -->
<!-- html idem ex1 -->

<!-- Exercice 4 -->
  <!-- $resultat = $bd->query('SELECT * FROM clients WHERE card =1'); -->
<!-- html idem ex1 -->

<!-- Exercice 5 -->
  <!-- $resultat = $bd->query("SELECT firstName, lastName FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName ASC"); -->
  <!-- <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title>CRUD</title>
    </head>
  <body>

      <h1>CRUD</h1>
      <table>
  					<th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <?php while ($donnees= $resultat ->fetch()) {
                    ?>

              <tr>

                <td>Nom : <?= $donnees['lastName']; ?></td>
                </tr>
                <tr>
                <td>Prénom : <?= $donnees['firstName']; ?></td>


              </tr>

          <?php
                } ?>



      </table>
    </body>
  </html> -->

<!-- Exercice 6 -->
<!-- $resultat = $bd->query("SELECT title, performer, date, startTime FROM shows ORDER BY title ASC"); -->
<!-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CRUD</title>
  </head>
<body>

    <h1>CRUD</h1>
    <table>
					<th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <?php while ($donnees= $resultat ->fetch()) {
                    ?>

            <tr>

              <td><?= $donnees['title']; ?> par <?= $donnees['performer']; ?>, le <?= $donnees['date']; ?> à <?= $donnees['startTime']; ?></td>

            </tr>

        <?php
                } ?>



    </table>
  </body>
</html> -->

<!-- Exercice 7 -->
