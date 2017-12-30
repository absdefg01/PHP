<?php

///Connexion au serveur MySQL
	$login = 'zhm0566a';
	$mdp = 'GdkypF4D';

	$db = 'zhm0566a';
	$server = 'localhost';
	//
	try {
		$linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
		$linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}
	catch (Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
	
	
	// Requete de recupération de tous les usagers
	$query = $linkpdo->prepare("SELECT  numsecu,civilite,nom,prenom,adresse1,adresse2,codepostal,ville,dateDeNaissance,lieuDeNaissance,telephone,medecin_traitant FROM Usager ");
	
	// Execution de la requete
	$query->execute();
	

	//}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Usager</title>
	</head>
	<body>
		<h1>Liste usagers</h1>

		<!--<form action="listeUsagers.php" method="post">

		<p>Mot(s)-clé(s) : 	<input type="text" name="motscles"/></p>
 	
 	
 		<p><input type="submit" value="Rechercher"></p>-->

<?php

#if(isset($_POST['motscles'])){

?>

		<table>
		<th>Numsecu</th>
		<th>Civilit&eacute</th>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Adresse</th>
		<th>Adresse2</th>
		<th>Code postal</th>
		<th>Ville</th>
		<th>Date de naissance</th>
		<th>Lieu de naissance</th>
		<th>Telephone</th>
		<th>M&eacutedecin traitant</th>

<?php


while ($row = $query->fetch()){

echo "<tr>";
echo "<td>".$row[0]."</td>";
echo "<td>".$row[1]."</td>";
echo "<td>".$row[2]."</td>";
echo "<td>".$row[3]."</td>";
echo "<td>".$row[4]."</td>";
echo "<td>".$row[5]."</td>";
echo "<td>".$row[6]."</td>";
echo "<td>".$row[7]."</td>";
echo "<td>".$row[8]."</td>";
echo "<td>".$row[9]."</td>";
echo "<td>".$row[10]."</td>";
echo "<td>".$row[11]."</td>";


echo '<td><a href="modificationUsager.php?numSecu='.$row[0].'">Modifier</a></td>';
echo '<td><a href="supprimerUsager.php?numSecu='.$row[0].'">Supprimer</a></td>';
echo "</tr>";

}

?>

		</table>

<?php #} ?>

<a href="saisieUsager.html">Ajouter un usager</a>
		</form>
			
			
	</body>
</html>
