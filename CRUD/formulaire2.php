<?php
if (isset($_POST['ajouter'])) {
    try {
        $bd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', 'root', '');

        if ($_POST['cartefidelite']== 1) {
            $sql = "INSERT INTO clients (lastName, firstName, birthDate, card, cardNumber)
        VALUES (:lastName, :firstName ,:birthDate, :card, :cardNumber)" ;

            $tab = array(
      ':lastName'=> $_POST['nom'],
      ':firstName' => $_POST['prenom'],
      ':birthDate'  => $_POST['datenaissance'],
      ':card'  => $_POST['cartefidelite'],
      ':cardNumber'  => $_POST['numerocarte']
      );
        } else {
            $sql = "INSERT INTO clients (lastName, firstName, birthDate, card)
        VALUES (:lastName, :firstName ,:birthDate, :card)" ;
            $tab = array(
      ':lastName'=> $_POST['nom'],
      ':firstName' => $_POST['prenom'],
      ':birthDate'  => $_POST['datenaissance'],
      ':card'  => $_POST['cartefidelite']

      );
        }

        $sql1 = "INSERT INTO cards (cardNumber, cardTypesId)
      VALUES (:cardNumber, :cardTypesId)";

        $tab1 = array(
          ':cardNumber'  => $_POST['numerocarte'],
          ':cardTypesId' => $_POST['typecarte']

);

        $req = $bd->prepare($sql);
        $req1 = $bd->prepare($sql1);
        $req1->execute($tab1);
        if ($req->execute($tab)) {
            echo 'Le nouveau client a été ajouté avec succès !';
        };
    } catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}


?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CRUD2</title>
  </head>
<body>

    <h1>Formulaire</h1>
  <form action="formulaire2.php" method="post">
  <label><p>Nom :
    <input type="text" name="nom" value=""></p></label>
  <label><p>Prénom :
    <input type="text" name="prenom" value=""></p></label>
  <label><p>Date de naissance :
    <input type="date" name="datenaissance" value=""></p></label>
  <label><p>Carte de fidélité :
          <input type="radio" name="cartefidelite" value="1"> Oui </label>
          <input type="radio" name="cartefidelite" value="0"> Non </p></label>
  <label><p>Numéro de carte :
          <input type="number" name="numerocarte" value=""></p></label>
  <label><p>Type de carte :
          <input type="radio" name="typecarte" value="1">Fidélité
          <input type="radio" name="typecarte" value="2">Famille Nombreuse
          <input type="radio" name="typecarte" value="3">Etudiant
          <input type="radio" name="typecarte" value="4">Employé</p></label>
  <input type="submit" name="ajouter" value="Ajouter">
  </form>
  </body>
</html>
