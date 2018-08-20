<?php
// include "read.php";
try
{
	// On se connecte à MySQL
	$bd = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8', 'root', '');

}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
$sql = "INSERT INTO hiking (name, difficulty, distance, duration, height_difference)
    VALUES (:nom, :difficulte ,:distance, :duree, :denivele)" ;

$bd->exec($sql);

$tab = array(

		':nom'=> $_POST['name'],
    ':difficulte' => $_POST['difficulty'],
    ':distance'  => $_POST['distance'],
	  ':duree'  => $_POST['duration'],
		':denivele'  => $_POST['height_difference']

);


$req = $bd->prepare($sql);
$req->execute($tab);
if ($req->execute($tab)){
echo 'Le randonnée a bien été ajoutée avec succès !';
};
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>

	<a href="./read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="create.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>


</body>
</html>
