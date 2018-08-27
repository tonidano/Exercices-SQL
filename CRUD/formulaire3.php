<?php
if (isset($_POST['ajouter'])) {
    try {
        $bd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', 'root', '');


        $sql = "INSERT INTO shows (title, performer, date, showTypesId, firstGenresId, secondGenreId, duration, startTime)
        VALUES (:title, :performer , :date, :showTypesId, :firstGenresId, :secondGenreId, :duration, :startTime)" ;
        //   $tab = array(
        // ':title'=> $_POST['titre'],
        // ':performer' => $_POST['artiste'],
        // ':date'  => $_POST['date'],
        // ':showTypesId'  => $_POST['showtype'],
        // ':firstGenresId'  => $_POST['genre1'],
        // ':secondGenreId'  => $_POST['genre2'],
        // ':duration'  => $_POST['duree'],
        // ':startTime'  => $_POST['debut']
        //
        // );

        $req = $bd->prepare($sql);
        $req->bindParam(':title', $_POST['titre']);
        $req->bindParam(':performer', $_POST['artiste']);
        $req->bindParam(':date', $_POST['date']);
        $req->bindParam(':showTypesId', $_POST['showtype']);
        $req->bindParam(':firstGenresId', $_POST['genre1']);
        $req->bindParam(':secondGenreId', $_POST['genre2']);
        $req->bindParam(':duration', $_POST['duree']);
        $req->bindParam(':startTime', $_POST['debut']);
        $req->execute();
        if ($req->execute($tab)) {
            echo 'Le nouveau spectacle a été ajouté avec succès !';
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
  <form action="formulaire3.php" method="post">
  <label><p>Spectacle :
    <input type="text" name="titre" value=""></p></label>
  <label><p>Artiste :
    <input type="text" name="artiste" value=""></p></label>
  <label><p>Date :
    <input type="date" name="date" value=""></p></label>
    <label><p>Type :
      <select name="showtype">
            <option value="1">Concert</option>
            <option value="2">Théâtre </option>
            <option value="3">Humour</option>
            <option value="4">Danse </option>
      </select></p></label>
  <label><p>Genre 1 :
    <select name="genre1">
  				<option value="1">Variété et chanson française</option>
  				<option value="2">Variété internationale</option>
  				<option value="3">Pop/Rock</option>
  				<option value="4">Musique électronique</option>
  				<option value="5">Folk</option>
          <option value="6">Rap</option>
          <option value="7">Hip Hop</option>
          <option value="8">Slam</option>
          <option value="9">Reggae</option>
          <option value="10">Clubbing</option>

  	</select></p></label>
  <label><p>Genre 2 :
    <select name="genre2">
          <option value="1">Variété et chanson française</option>
          <option value="2">Variété internationale</option>
          <option value="3">Pop/Rock</option>
          <option value="4">Musique électronique</option>
          <option value="5">Folk</option>
          <option value="6">Rap</option>
          <option value="7">Hip Hop</option>
          <option value="8">Slam</option>
          <option value="9">Reggae</option>
          <option value="10">Clubbing</option>

    </select></p></label>
  <label><p>Durée :
    <input type="time" name="duree" value=""></p></label>
  <label><p>Début :
    <input type="time" name="debut" value=""></p></label>

    <input type="submit" name="ajouter" value="Ajouter">
  </form>
  </body>
</html>
