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
	
?>
<form action="listeRdv.php" method="post">
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
	Date de rendez-vous :
	</td>
	<td>
		<input type="text" name="dateRdv" 	/>
	</td>
	</tr>
</table>
<input type="submit" value="Valider">
<input type="reset" value="Annuler">
</form>	


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Planning RDV</title>
	</head>
	<body>
		<h1>Planning des rendez-vous</h1>

		


	<table>
		
	
	<?php
	
	if (isset($_POST['dateRdv']) && isset($_POST['medecins']))
	{
	
		if (!preg_match("^([0-9]){2}/([0-9]){2}/([1-2])([0-9]){3}^", $_POST['dateRdv'])) 
		{
			echo "La date de naissance n'est pas au bon format.";
		} 
		else 
		{
			$champsDate = explode("/", $_POST['dateRdv']);
			if (!checkdate($champsDate[1], $champsDate[0], $champsDate[2])) {
				echo "La date entree est invalide.";
			}
			else
			{
				$now = date('d-m-Y');
				if (new DateTime($_POST['dateRdv']) < $now)
				{
					echo "La date est ant&eacuterieur a la date d'aujourd'hui";
				}
				else
				{
					$queryRdv = $linkpdo->prepare("select distinct(heure), numsecu from rdv where date = :dateRdv && id_medecin = :id_medecin order by heure");

					$queryRdv->bindParam('id_medecin', $_POST['medecins']);
					$dateAInserer = $champsDate[2]."-".$champsDate[1]."-".$champsDate[0];
					$queryRdv->bindParam('dateRdv',$dateAInserer);
				
					
					try {
						$reqSS = $queryRdv->execute() ;
					}
					catch (PDOException $e) {
						echo 'Error : ' . $e->getMessage();
						die();
					}
				
					while ($row = $queryRdv->fetch())
					{
					
					
						$queryUsagers = $linkpdo->prepare("select numsecu,civilite,nom,prenom from usager where numsecu = :numsecu");
						
						$queryUsagers->bindParam('numsecu', $row[1]);
						try {
							$queryUsagers->execute() ;
						}
						catch (PDOException $e) {
							echo 'Error : ' . $e->getMessage();
							die();
						}
						
						if ($rowU = $queryUsagers->fetch())
						{
							if ($row[0] == 1)
							{
								echo "<tr><td>8h - 8h30</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 1){
								echo "<tr><td>8h - 8h30</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 2){
								echo "<tr><td>8h30 - 9h</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 3){
								echo "<tr><td>9h - 9h30</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 4){
								echo "<tr><td>9h30 - 10h</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 5){
								echo "<tr><td>10h - 10h30</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 6){
								echo "<tr><td>10h30 - 11h</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 7){
								echo "<tr><td>11h - 11h30</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 8){
								echo "<tr><td>11h30 - 12h</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 9){
								echo "<tr><td>14h - 14h30</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 10){
								echo "<tr><td>14h30 - 15h</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 11){
								echo "<tr><td>15h - 15h30</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 12){
								echo "<tr><td>15h30 - 16h</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 13){
								echo "<tr><td>16h - 16h30</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 14){
								echo "<tr><td>16h30 - 17h</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 15){
								echo "<tr><td>17h - 17h30</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
							if ($row[0] == 16){
								echo "<tr><td>17h30 - 18h</td><td>".$rowU[0]." - ".$rowU[1]." ".$rowU[2]." ".$rowU[3]."</td></tr>";
							}
						}
					}
				}
			}
		}
	}
?>
<?php






?>

		</table>

<?php #} ?>

<a href="saisieRdv.php">Ajouter un rendez-vous</a>
		</form>
			
			
	</body>
</html>
