<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<?php

	$login = 'zhm0566a';
	$mdp = 'GdkypF4D';

	$db = 'zhm0566a';
	$server = 'localhost';
	try {
		$linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
    	$linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}
	catch (Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
?>

<html>
	<head>
		<title>Saisie</title>
	</head>
	<body>
		<h1>Ajout usager</h1>
		
		<form action="ajoutRdv.php" method="post">
		<table>
			<tr>
				<td>
					M&eacutedecin :
				</td>
				<td>
					<select name="medecins" >
					
						<?php
							
						
							$queryMedecins = $linkpdo->prepare("select id_medecin,m_civilite,m_nom,m_prenom from medecin");
							try {
								$queryMedecins->execute() ;
							}
							catch (PDOException $e) {
								echo 'Error : ' . $e->getMessage();
								die();
							}
							while ($row = $queryMedecins->fetch())
							{
								echo "<option value=\"".$row[0]."\" >".$row[1]." ".$row[2]." ".$row[3]."</option>";
							
							}
						?>
						
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Usagers :
				</td>
				<td>
					<select name="usagers" >
					
						<?php
							
						
							$queryUsagers = $linkpdo->prepare("select numsecu,civilite,nom,prenom from usager");
							try {
								$queryUsagers->execute() ;
							}
							catch (PDOException $e) {
								echo 'Error : ' . $e->getMessage();
								die();
							}
							while ($row = $queryUsagers->fetch())
							{
								echo "<option value=\"".$row[0]."\" >".$row[1]." ".$row[2]." ".$row[3]."</option>";
							
							}
						?>
						
					</select>
				</td>
			</tr>
		
		<tr>
		<td>
		Date de rendez-vous :
		</td>
		<td>
			<input type="text" name="dateRdv" 	/>
		</td>
		</tr>
		<tr>
				<td>
					Cr&eacuteneaux :
				</td>
				<td>
					<select name="creno" >
						<option value="1">8h - 8h30</option>
						<option value="2">8h30 - 9h</option>
						<option value="3">9h - 9h30</option>
						<option value="4">9h30 - 10h</option>
						<option value="5">10h - 10h30</option>
						<option value="6">10h30 - 11h</option>
						<option value="7">11h - 11h30</option>
						<option value="8">11h30 - 12h</option>
						<option value="9">14h - 14h30</option>
						<option value="10">14h30 - 15h</option>
						<option value="11">15h - 15h30</option>
						<option value="12">15h30 - 16h</option>
						<option value="13">16h - 16h30</option>
						<option value="14">16h30 - 17h</option>
						<option value="15">17h - 17h30</option>
						<option value="16">17h30 - 18h</option>
					</select>
				</td>
			</tr>
		<tr>
		<td> 	
		</td>
		<td>
		<input type="submit" value="Valider">
		<input type="reset" value="Annuler">
		</td>
		</tr>
		
		</table>
		
		</form>
			
	</body>
</html>
