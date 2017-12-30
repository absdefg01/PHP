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
		
	//if(isset($_POST['numsecu']))
	//{
	
		// Si un champ obligatoire est vide
		if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['adresse1']) || empty($_POST['codepostal']) || empty($_POST['ville']) || empty($_POST['dateDeNaissance']) || empty($_POST['lieuDeNaissance']) || empty($_POST['telephone']) || empty($_POST['medecinTraitant']))
		{
			// On previent l'utilisateur
			echo "Aucun champ ne peut être vide\n<br><a href='saisieUsager.html'>Retour</a>";
		}
		else // Tous les champs sont remplis
		{
			
			$query = $linkpdo->prepare(
			"UPDATE Usager set civilite = :civilite, nom = :nom, prenom = :prenom, adresse1 = :adresse1, adresse2 = :adresse2, codepostal = :codepostal, ville = :ville, dateDeNaissance = :dateDeNaissance, lieuDeNaissance = :lieuDeNaissance,
			telephone = :telephone,medecin_traitant = :medecinTraitant where numsecu = :numsecu ");
			
			$query->bindParam('numsecu',$_POST['numsecuhd']);
			$query->bindParam('civilite',$_POST['civilite']);
			$query->bindParam('nom',$_POST['nom']);
			$query->bindParam('prenom',$_POST['prenom']);
			$query->bindParam('adresse1',$_POST['adresse1']);
			$query->bindParam('adresse2',$_POST['adresse2']);
			$query->bindParam('codepostal',$_POST['codepostal']);
			$query->bindParam('ville',$_POST['ville']);
			$query->bindParam('dateDeNaissance',$_POST['dateDeNaissance']);
			$query->bindParam('lieuDeNaissance',$_POST['lieuDeNaissance']);
			$query->bindParam('telephone',$_POST['telephone']);
			$query->bindParam('medecinTraitant',$_POST['medecinTraitant']);
			
			
			try {
				$req = $query->execute() ;
			}
			catch (PDOException $e) {
				echo 'Error : ' . $e->getMessage();
				die();
			}
			echo "L'usager a été modifié !\n<br><a href='listeUsagers.php'>Afficher liste usagers</a>";
			
	
?>
