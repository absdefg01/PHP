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
	
	
	// Requete de recupération de tous les Medecins
	$query = $linkpdo->prepare("SELECT  id_medecin,m_civilite,m_nom,m_prenom FROM Medecin ");
	
	// Execution de la requete
	$query->execute();
	

	//}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Medecin</title>
	</head>
	<body>
		<h1>Liste Medecins</h1>

		<!--<form action="listeMedecins.php" method="post">

		<p>Mot(s)-clé(s) : 	<input type="text" name="motscles"/></p>
 	
 	
 		<p><input type="submit" value="Rechercher"></p>-->

<?php

#if(isset($_POST['motscles'])){

?>

		<table>
		
		<th>Civilit&eacute</th>
		<th>Nom</th>
		<th>Prenom</th>
		

<?php


while ($row = $query->fetch()){

echo "<tr>";

echo "<td>".$row[1]."</td>";
echo "<td>".$row[2]."</td>";
echo "<td>".$row[3]."</td>";




echo '<td><a href="modificationMedecin.php?idMedecin='.$row[0].'">Modifier</a></td>';
echo '<td><a href="supprimerMedecin.php?idMedecin='.$row[0].'">Supprimer</a></td>';
echo "</tr>";

}

?>

		</table>
<a href="saisieMedecin.html">Ajouter un m&eacutedecin</a>


		</form>
			
			
	</body>
</html>
