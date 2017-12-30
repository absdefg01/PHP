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
		$queryDel = $linkpdo->prepare("DELETE FROM Usager WHERE numsecu = :numsecu ");
		$queryDel->bindParam(':numsecu',$_GET['numSecu']);


		$queryDel->execute();
		header("Location: listeUsagers.php");

	}
	else
	{
		header("Location: listeUsagers.php");//sa te renvoit à la page que tu veux (mot-clé au lieu de modif)
	}

?>
