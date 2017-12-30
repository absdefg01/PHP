<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<?php
///Connexion au serveur MySQL

	$login = 'zhm0566a';
	$mdp = 'GdkypF4D';

	$db = 'zhm0566a';
	$server = 'localhost';
	try 
	{
		$linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
    	$linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}
	catch (Exception $e) 
	{
		die('Erreur : '.$e->getMessage());
	}
	
	if(isset($_GET['numSecu']))
	{
		$query = $linkpdo->prepare("SELECT numsecu,civilite, nom, prenom, adresse1, adresse2, codepostal, ville, dateDeNaissance, lieuDeNaissance,
				telephone,medecin_traitant FROM Usager WHERE numsecu = :numsecu ");
		$query->bindParam(':numsecu',$_GET['numSecu']);

		$query->execute();
		//header("Location: listeUsagers.php");

	}

	$row = $query->fetch();

?>
<html>
	<head>
		<title>Saisie</title>
	</head>
	<body>
		<h1>Ajout usager</h1>
		
		<form action="miseAJourUsager.php" method="post">
		<table>
			<tr>
				<td>
					Num S&eacutecu :
				</td>
				<td>
					<input type="text" name="numsecu" disabled="true" value=<?php echo $row[0]; ?> />
					<input type="hidden" name="numsecuhd" value=<?php echo $row[0]; ?> />
				</td>
			</tr>
		<tr>
		<td>
		Civilit&eacute :
		</td>
		<td>
		<input type="radio" name="civilite" value="madame" <?php if(strcmp($row[1],"madame")== 0){echo "checked";} else {echo "";}?>>Madame</input>
		<input type="radio" name="civilite" value="monsieur" <?php if (strcmp($row[1],"monsieur") == 0){echo "checked";} else {echo "";}?>>Monsieur</input>
		</td>
		</tr>
		
		<tr>
		<td>
		Nom : 
		</td>
		<td>
		<input type="text" name="nom" 	value=<?php echo $row[2]; ?>	/>
		</td>
		</tr>
		<tr>
		<td>
		Pr&eacutenom :
		</td>
		<td>
		<input type="text" name="prenom" value=<?php echo $row[3]; ?>	/>
		</td>
		</tr>
		<tr>
		<td>
		Adresse1 :
		</td>
		<td>
		<input type="text" name="adresse1" value=<?php echo $row[4]; ?>	/>
		</td>
		</tr>
		<tr>
		<td>
		Adresse2 :
		</td>
		<td>
		<input type="text" name="adresse2" value=<?php echo $row[5]; ?>	/>
		</td>
		</tr>
		<tr>
		<td>
		Code postal : 
		</td>
		<td>
		<input type="text" name="codepostal" value=<?php echo $row[6]; ?>	/>
		</td>
		</tr>
		<tr>
		<td>
		Ville :
		</td>
		<td>
		<input type="text" name="ville"  value=<?php echo $row[7]; ?>	/>
		</td>
		</tr>
		<tr>
		<td>
		Date de naissance :
		</td>
		<td>
			<input type="text" name="dateDeNaissance" value=<?php echo $row[8]; ?>	/>
		</td>
		</tr>
		<tr>
		<td>
		Lieu de naissance :	
		</td>
		<td>
		<input type="text" name="lieuDeNaissance"value=<?php echo $row[9]; ?>	/>
		</td>
		</tr>
		<tr>
		<td>
		T&eacutel&eacutephone :
		</td>
		<td>
		<input type="text" name="telephone" value=<?php echo $row[10]; ?>	/>
		</td>
		</tr>
		<tr>
		<td>
		M&eacutedecin traitant : 	
		</td>
		<td>
		<input type="text" name="medecinTraitant" value=<?php echo $row[11]; ?>	/>
		</td>
		</tr>
		<tr>
		<td> 	
		</td>
		<td>
		<input type="submit" value="Modifier">
		<input type="reset" value="Annuler">
		</td>
		</tr>
		
		</table>
		
		</form>
			
	</body>
</html>
