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
		
	if(isset($_POST['numsecu']))
	{
	
		// Si un champ obligatoire est vide
		if(empty($_POST['numsecu']) ||empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['adresse1']) || empty($_POST['codepostal']) || empty($_POST['ville']) || empty($_POST['dateDeNaissance']) || empty($_POST['lieuDeNaissance']) || empty($_POST['telephone']) || empty($_POST['medecinTraitant']))
		{
			// On previent l'utilisateur
			echo "Aucun champ ne peut être vide\n<br><a href='saisieUsager.html'>Retour</a>";
		}
		else // Tous les champs sont remplis
		{
			if (!preg_match("^([0-9]){2}/([0-9]){2}/([1-2])([0-9]){3}^", $_POST['dateDeNaissance'])) 
			{
				echo "La date de naissance n'est pas au bon format.";
			} 
			else 
			{
				$champsDate = explode("/", $_POST['dateDeNaissance']);
				if (!checkdate($champsDate[1], $champsDate[0], $champsDate[2])) {
					echo "La date de naissance est invalide.";
				}
				else
				{
				
					// Verifier que le numero de SS n'existe pas déjà en base
					
					$querySS = $linkpdo->prepare("select * from Usager where numsecu = :numsecu ");
					$querySS->bindParam('numsecu',$_POST['numsecu']);
					try {
						$reqSS = $querySS->execute() ;
					}
					catch (PDOException $e) {
						echo 'Error : ' . $e->getMessage();
						die();
					}
					if ($row = $querySS->fetch())
					{ // Le num de SS existe en base
						echo " Num&eacutero de s&eacutecurit&eacute sociale d&eacutej&aacute utilis&eacute!";
					}
					else
					{
						$query = $linkpdo->prepare(
						"INSERT INTO Usager (numsecu,civilite, nom, prenom, adresse1, adresse2, codepostal, ville, dateDeNaissance, lieuDeNaissance,
						telephone,medecin_traitant) VALUES
						(:numsecu,:civilite, :nom,:prenom,:adresse1,:adresse2,:codepostal,:ville,:dateDeNaissance,
						:lieuDeNaissance,:telephone, :medecinTraitant)");
						
						$query->bindParam('numsecu',$_POST['numsecu']);
						$query->bindParam('civilite',$_POST['civilite']);
						$query->bindParam('nom',$_POST['nom']);
						$query->bindParam('prenom',$_POST['prenom']);
						$query->bindParam('adresse1',$_POST['adresse1']);
						$query->bindParam('adresse2',$_POST['adresse2']);
						$query->bindParam('codepostal',$_POST['codepostal']);
						$query->bindParam('ville',$_POST['ville']);
						$dateAInserer = $champsDate[2]."-".$champsDate[1]."-".$champsDate[0];
						$query->bindParam('dateDeNaissance',$dateAInserer);
						$query->bindParam('lieuDeNaissance',$_POST['lieuDeNaissance']);
						$query->bindParam('telephone',$_POST['telephone']);
						$query->bindParam('medecinTraitant',$_POST['medecinTraitant']);
						
						echo "INSERT INTO Usager (numsecu, civilite, nom, prenom, adresse1, adresse2, codepostal, ville, dateDeNaissance, lieuDeNaissance,
						telephone,medecin_traitant) VALUES
						('".$_POST['numsecu']."', '".$_POST['civilite']."', '".$_POST['nom']."','".$_POST['prenom']."','".$_POST['adresse1']."','".$_POST['adresse2']."','".$_POST['codepostal']."','".$_POST['ville']."','".$_POST['dateDeNaissance']."',
						'".$_POST['lieuDeNaissance']."','".$_POST['telephone']."', '".$_POST['medecinTraitant']."')";
							
						try {
							$req = $query->execute() ;
						}
						catch (PDOException $e) {
							echo 'Error : ' . $e->getMessage();
							die();
						}
						echo "L'usager a été ajouté !\n<br><a href='listeUsagers.php'>Afficher liste usagers</a>";
						/*
						if($query->execute()){
							echo "L'usager a été ajouté !\n<br><a href='recherche.php'>Rechercher</a>";
						}else{
							echo "L'usager existe déjà\n<br><a href='saisieUsager.html'>Retour</a>";
						}
						*/
					}
				}
			}
		}
	}
	else
	{
		header("Location: saisieUsager.html");
	}
	
?>
