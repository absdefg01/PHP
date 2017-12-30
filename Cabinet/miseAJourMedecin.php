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
	if(empty($_POST['nom']) || empty($_POST['prenom']))
	{
		// On previent l'utilisateur
		echo "Aucun champ ne peut être vide\n<br><a href='saisieMedecin.html'>Retour</a>";
	}
	else // Tous les champs sont remplis
	{
		
		$query = $linkpdo->prepare(
		"UPDATE Medecin set m_civilite = :civilite, m_nom = :nom, m_prenom = :prenom WHERE id_medecin = :id_medecin ");
		
		$query->bindParam('id_medecin',$_POST['idMedecin']);
		$query->bindParam('civilite',$_POST['civilite']);
		$query->bindParam('nom',$_POST['nom']);
		$query->bindParam('prenom',$_POST['prenom']);
		
		
		try {
			$req = $query->execute() ;
		}
		catch (PDOException $e) {
			echo 'Error : ' . $e->getMessage();
			die();
		}
		echo "Le m&eacutedecin a &eacutet&eacute modifi&eacute !\n<br><a href='listeMedecins.php'>Afficher liste Medecins</a>";
		
		
	}
	
	
?>
