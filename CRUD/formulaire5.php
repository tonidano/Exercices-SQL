<?php


try {
    // On se connecte à MySQL
    $bd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', 'root', '');

    if (!isset($_POST['button'])) {
        $id = $_GET['id'];
        $resultat = $bd->query("SELECT * FROM shows WHERE id = $id");

        $donnees = $resultat->fetch();
    } else {
        $id=$_POST['id'];
        $title=$_POST['titre'];
        $performer=$_POST['artiste'];
        $date=$_POST['date'];
        $showTypesId=$_POST['showtype'];
        $firstGenresId=$_POST['genre1'];
        $secondGenreId=$_POST['genre2'];
        $duration=$_POST['duree'];
        $startTime=$_POST['duree'];

        $tab = array(
        ':id' => $_POST['id'],
        ':title'=> $_POST['titre'],
        ':performer' => $_POST['artiste'],
        ':date'  => $_POST['date'],
        ':showTypesId'  => $_POST['showtype'],
        ':firstGenresId'  => $_POST['genre1'],
        ':secondGenreId'  => $_POST['genre2'],
        ':duration'  => $_POST['duree'],
        ':startTime'  => $_POST['debut']

        );
        $sql = "UPDATE shows SET title= :title, performer= :performer, date= :date, showTypesId= :showTypesId, firstGenresId= :firstGenresId, secondGenreId= :secondGenreId , duration= :duration, startTime=:startTime WHERE id =:id";

        $req = $bd->prepare($sql);
        if ($req->execute($tab)) {
            echo 'Le client a été modifiées avec succès !';
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
     <title>Spectacles</title>
   </head>
 <body>
   <a href="./form5.php">Liste des données</a>
   <?php if (!isset($_POST['button'])) {
     ?>
   <h1>Modifier</h1>
 <form action="formulaire5.php" method="post">
 <label><p>Spectacle :
   <input type="text" name="titre" value="<?= $donnees['title']; ?>"></p></label>
 <label><p>Artiste :
   <input type="text" name="artiste" value="<?= $donnees['performer']; ?>"></p></label>
 <label><p>Date :
   <input type="date" name="date" value="<?= $donnees['date']; ?>"></p></label>
   <label><p>Type :
     <select name="showtype">
           <option value="1" <?php if ($donnees['showTypesId']==1) {
         echo 'selected="selected"' ;
     } ?>>Concert</option>
           <option value="2"<?php if ($donnees['showTypesId']==2) {
         echo 'selected="selected"'  ;
     } ?>>Théâtre </option>
           <option value="3"<?php if ($donnees['showTypesId']==3) {
         echo 'selected="selected"' ;
     } ?>>Humour</option>
           <option value="4"<?php if ($donnees['showTypesId']==4) {
         echo 'selected="selected"'  ;
     } ?>>Danse </option>
     </select></p></label>
 <label><p>Genre 1 :
   <select name="genre1">
         <option value="1" <?php if ($donnees['firstGenresId']==1) {
         echo 'selected="selected"' ;
     } ?>>Variété et chanson française</option>
         <option value="2" <?php if ($donnees['firstGenresId']==2) {
         echo 'selected="selected"' ;
     } ?>>Variété internationale</option>
         <option value="3" <?php if ($donnees['firstGenresId']==3) {
         echo 'selected="selected"' ;
     } ?>>Pop/Rock</option>
         <option value="4"<?php if ($donnees['firstGenresId']==4) {
         echo 'selected="selected"' ;
     } ?>>Musique électronique</option>
         <option value="5"<?php if ($donnees['firstGenresId']==5) {
         echo 'selected="selected"' ;
     } ?>>Folk</option>
         <option value="6"<?php if ($donnees['firstGenresId']==6) {
         echo 'selected="selected"' ;
     } ?>>Rap</option>
         <option value="7"<?php if ($donnees['firstGenresId']==7) {
         echo 'selected="selected"' ;
     } ?>>Hip Hop</option>
         <option value="8"<?php if ($donnees['firstGenresId']==8) {
         echo 'selected="selected"' ;
     } ?>>Slam</option>
         <option value="9"<?php if ($donnees['firstGenresId']==9) {
         echo 'selected="selected"' ;
     } ?>>Reggae</option>
         <option value="10"<?php if ($donnees['firstGenresId']==10) {
         echo 'selected="selected"' ;
     } ?>>Clubbing</option>

   </select></p></label>
 <label><p>Genre 2 :
   <select name="genre2">
         <option value="1"<?php if ($donnees['secondGenreId']==1) {
         echo 'selected="selected"' ;
     } ?>>Variété et chanson française</option>
         <option value="2"<?php if ($donnees['secondGenreId']==2) {
         echo 'selected="selected"' ;
     } ?>>Variété internationale</option>
         <option value="3"<?php if ($donnees['secondGenreId']==3) {
         echo 'selected="selected"' ;
     } ?>>Pop/Rock</option>
         <option value="4"<?php if ($donnees['secondGenreId']==4) {
         echo 'selected="selected"' ;
     } ?>>Musique électronique</option>
         <option value="5"<?php if ($donnees['secondGenreId']==5) {
         echo 'selected="selected"' ;
     } ?>>Folk</option>
         <option value="6"<?php if ($donnees['secondGenreId']==6) {
         echo 'selected="selected"' ;
     } ?>>Rap</option>
         <option value="7"<?php if ($donnees['secondGenreId']==7) {
         echo 'selected="selected"' ;
     } ?>>Hip Hop</option>
         <option value="8"<?php if ($donnees['secondGenreId']==8) {
         echo 'selected="selected"' ;
     } ?>>Slam</option>
         <option value="9"<?php if ($donnees['secondGenreId']==9) {
         echo 'selected="selected"' ;
     } ?>>Reggae</option>
         <option value="10"<?php if ($donnees['secondGenreId']==10) {
         echo 'selected="selected"' ;
     } ?>>Clubbing</option>

   </select></p></label>
 <label><p>Durée :
   <input type="time" name="duree" value="<?= $donnees['duration']; ?>"></p></label>
 <label><p>Début :
   <input type="time" name="debut" value="<?= $donnees['startTime']; ?>"></p></label>
 <input type="hidden" name="id" value="<?= $id; ?>">
   <button type="submit" name="button">Envoyer</button>
 </form>
 <?php
 } ?>
   </body>
 </html>
