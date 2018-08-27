<?php
try
{
	// On se connecte à MySQL
	$bd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}


// $resultat->closeCursor();



$ville = $_POST['ville'];
$haut = $_POST['haut'];
$bas = $_POST['bas'];

$tab = array(
    ':Ville'=> $_POST['ville'],
    ':Haut' => $_POST['haut'],
    ':Bas'  => $_POST['bas'],

);


$sql = "INSERT INTO météo (Ville, Haut, Bas)
    VALUES (:Ville, :Haut ,:Bas)" ;


$req = $bd->prepare($sql);
$req->execute($tab);

$resultat = $bd->query('SELECT * FROM météo');
// $resultat = $bd->query('INSERT INTO météo (Ville, Haut, Bas) VALUES ($_POST['ville'], $_POST['haut'], $_POST['bas'])');

// $donnees = $resultat->fetch();

$matable ='';
while ($donnees = $resultat->fetch())
{
  $matable = $matable. '<tr>';

  $matable = $matable.'<td>' .$donnees['Ville']. '</td>';
  $matable = $matable.'<td>' .$donnees['Haut']. '</td>';
  $matable = $matable.'<td>' .$donnees['Bas']. '</td>';
  $matable = $matable.'</tr>';
}

// fermeture de la connection à la bdd

if($bd){
    $bd = NULL;
  }

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form  action="index.php" method="post">
      <label>Ville <input type="text" name="ville" value=""></label>
      <label>Haut <input type="number" name="haut" value=""></label>
      <label>Bas <input type="number" name="bas" value=""></label>
      <button type="submit" name="button">Envoyer</button>
    </form>
    <table>
			<th></th>
      <th>Ville</th>
      <th>Haut</th>
      <th>Bas</th>

      <?= $matable; ?>
    </table>

  </body>
</html>
