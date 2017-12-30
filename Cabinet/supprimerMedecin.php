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
		$queryDel = $linkpdo->prepare("DELETE FROM Medecin WHERE id_medecin = :id_medecin ");
		$queryDel->bindParam(':id_medecin',$_GET['idMedecin']);


		$queryDel->execute();
		header("Location: listeMedecins.php");

	}
	else
	{
		header("Location: listeMedecins.php");//sa te renvoit à la page que tu veux (mot-clé au lieu de modif)
	}

?>
