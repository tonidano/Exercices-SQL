<?php

try
{
	// On se connecte à MySQL
	$bd = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8', 'root', '');

	if (!isset($_POST['button'])) {
			$id = $_GET['id'];
		$resultat = $bd->query("SELECT * FROM hiking WHERE id = $id");
		$donnees = $resultat->fetch();
	}else {
		$id=$_POST['id'];
		$name=$_POST['name'];
		$difficulty=$_POST['difficulty'];
		$distance=$_POST['distance'];
		$duration=$_POST['duration'];
		$height_difference=$_POST['height_difference'];

		$tab = array(
				':id' => $_POST['id'],
				':nom'=> $_POST['name'],
				':difficulte' => $_POST['difficulty'],
				':distance'  => $_POST['distance'],
				':duree'  => $_POST['duration'],
				':denivele'  => $_POST['height_difference']

		);

		$sql = "UPDATE hiking SET name= :nom, difficulty=:difficulte, distance= :distance, duration= :duree, height_difference= :denivele WHERE id =:id";
		// $nb_modifs = $bd->exec($sql);
		// echo $nb_modifs . ' entrées ont été modifiées !';



		$req = $bd->prepare($sql);
		if ($req->execute($tab)){
		echo 'Le randonnée a bien été modifiées avec succès !';
		};
	}




}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

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
<?php if (!isset($_POST['button'])) { ?>
	<h1>Ajouter</h1>
	<form action="update.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?= $donnees['name']?>">
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
			<input type="text" name="distance" value="<?= $donnees['distance'];?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?= $donnees['duration'];?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?= $donnees['height_difference'];?>">
		</div>
		<input type="hidden" name="id" value="<?= $id; ?>">
		<button type="submit" name="button">Envoyer</button>
	</form>
<?php } ?>



</body>
</html>
