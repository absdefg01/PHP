
<html>
	
<?php
	if (!isset($_COOKIE['MyCookie'])) 
{
		
?>
		
<form method='POST' action='cookies1.php'>
	
		Nom <input type="text" name="nom">
	
		<input type="submit" value="Valider"/><br/>
	
	<form/>	
		
<?php
	}

	//Nom
	if(isset($_POST['nom']))
{
		$val=$_POST['nom'];

		setcookie('MyCookie', $val, time()+3600);

	
		if (isset($_COOKIE['MyCookie']))

			echo "Bonjour Monsieur ".$_COOKIE['MyCookie']."<br>";
	}

		
	//Compteur
	
	$compt=0;

	$compt=$_COOKIE['compteur']+1;

	if (setcookie('compteur', $compt, time()+3600) == 0)	
	exit ('Impossible de creer le cookie !');

	if (isset($_COOKIE['compteur']))

		echo "Nombre de visites : ".$_COOKIE['compteur'];
	
	?>
	

<html/>
