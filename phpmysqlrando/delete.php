<?php
$tf='';
$f='';
$m='';
$d='';
$td='';

try
{
	// On se connecte à MySQL
	$bd = new PDO('mysql:host=localhost;dbname=reunion_island;charset=utf8', 'root', '');

	if (!isset($_POST['supprimerid'])) {
		$id = $_GET['id'];
		$resultat = $bd->query("SELECT * FROM hiking WHERE id = $id");
		$donnees = $resultat->fetch();
    switch ($donnees['difficulty']){

      case "très facile" :
      $tf='selected';
      $f='';
      $m='';
      $d='';
      $td='';
      break;
      case "facile" :
      $tf='';
      $f='selected';
      $m='';
      $d='';
      $td='';
      break;
      case "moyen" :
      $tf='';
      $f='';
      $m='selected';
      $d='';
      $td='';
      break;
      case "difficile" :
        $tf='';
        $f='';
        $m='';
        $d='selected';
        $td='';
      break;
      case "très difficile" :
        $tf='';
        $f='';
        $m='';
        $d='';
        $td='selected';
      break;
    }
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

		$sql = "DELETE FROM hiking WHERE id =:id AND name= :nom AND difficulty=:difficulte AND distance= :distance AND duration= :duree AND height_difference= :denivele";


		$req = $bd->prepare($sql);
		if ($req->execute($tab)){
		echo 'Le randonnée a bien été supprimées avec succès !';
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
 	<title>supprimer une randonnée</title>
 	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
 </head>
 <body>
 	<a href="./read.php">Liste des données</a>
<?php if (!isset($_POST['supprimerid'])) { ?>
 	<h1>Supprimer</h1>
 	<form action="delete.php" method="post">
 		<div>
 			<label for="name">Name</label>
 			<input type="text" name="name" value="<?= $donnees['name']?>">
 		</div>

 		<div>
 			<label for="difficulty">Difficulté</label>
 			<select name="difficulty">
 				<option value="très facile" <?= $tf;?> >Très facile</option>
 				<option value="facile" <?= $f;?> >Facile</option>
 				<option value="moyen" <?= $m;?> >Moyen</option>
 				<option value="difficile" <?= $d;?> >Difficile</option>
 				<option value="très difficile" <?= $td;?> >Très difficile</option>
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
 		<button type="submit" name="supprimerid">Supprimer</button>
 	</form>
  <?php } ?>



 </body>
 </html>
