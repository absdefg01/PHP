<?php
///Connexion au serveur MySQL

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
		
	
	// Si un champ obligatoire est vide
	if(empty($_POST['dateRdv']))
	{
		// On previent l'utilisateur
		echo "Aucun champ ne peut être vide\n<br><a href='saisieUsager.html'>Retour</a>";
	}
	else // Tous les champs sont remplis
	{
		if (!preg_match("^([0-9]){2}/([0-9]){2}/([1-2])([0-9]){3}^", $_POST['dateRdv'])) 
		{
			echo "La date de naissance n'est pas au bon format.";
		} 
		else 
		{
			$champsDate = explode("/", $_POST['dateRdv']);
			if (!checkdate($champsDate[1], $champsDate[0], $champsDate[2])) {
				echo "La date de rdv est invalide.";
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
					
					// Verifier que le creno est libre
					
					$queryRdv = $linkpdo->prepare("select * from rdv where date = :dateRdv && id_medecin = :id_medecin && heure = :heure  ");
					
					$queryRdv->bindParam('id_medecin', $_POST['medecins']);
					$dateAInserer = $champsDate[2]."-".$champsDate[1]."-".$champsDate[0];
					$queryRdv->bindParam('dateRdv',$dateAInserer);
					$queryRdv->bindParam('heure',$_POST['creno']);
					
					try {
						$reqSS = $queryRdv->execute() ;
					}
					catch (PDOException $e) {
						echo 'Error : ' . $e->getMessage();
						die();
					}
					if ($row = $queryRdv->fetch())
					{ // Il y a un rdv pour ce medecin, a cette date et ce creneau
						echo "Ce cr&eacuteneau n'est pas disponible pour ce m&eacutedecin!";
					}
					else
					{
						$query = $linkpdo->prepare(
						"INSERT INTO Rdv (numsecu,id_medecin, date, heure) VALUES
						(:numsecu,:id_medecin, :date,:heure)");
						
						$query->bindParam('numsecu',$_POST['usagers']);
						$query->bindParam('id_medecin',$_POST['medecins']);
						$dateAInserer = $champsDate[2]."-".$champsDate[1]."-".$champsDate[0];
						$query->bindParam('date',$dateAInserer);
						$query->bindParam('heure',$_POST['creno']);
						
					
						try {
							$req = $query->execute() ;
						}
						catch (PDOException $e) {
							echo 'Error : ' . $e->getMessage();
							die();
						}
						echo "Le rendez-vous a &eacutet&eacute ajouté !\n<br><a href='listeRdv.php'>Afficher planning rendez-vous</a>";
						
					}
				}
			}
		}
		
	}
	
?>
