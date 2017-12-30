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
	
	if(isset($_GET['idMedecin']))
	{
		$query = $linkpdo->prepare("SELECT id_medecin,m_civilite, m_nom, m_prenom
				 FROM Medecin WHERE id_medecin = :id_medecin ");
		$query->bindParam(':id_medecin',$_GET['idMedecin']);

		$query->execute();
		//header("Location: listeMedecins.php");

	}

	$row = $query->fetch();

?>
<html>
	<head>
		<title>Saisie</title>
	</head>
	<body>
		<h1>Ajout Medecin</h1>
		
		<form action="miseAJourMedecin.php" method="post">
		<table>
		
		<tr>
		<td>
		Civilit&eacute :
		</td>
		<td>
		<input type="hidden" name="idMedecin" value=<?php echo $row[0]; ?> />
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
