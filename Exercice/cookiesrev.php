<html>

<head>

<title>Cookies</title>

</head>

<body>
	

<?php 

if(isset($_COOKIE['Compt']))
{
	
	
	if(!isset($_COOKIE['Nom']))
	{

	$compt=0;

	$compt=$_COOKIE['Compt']+1;

	if (setcookie('Compt', $compt, time()+3600) == 0)	
	exit ('Impossible de creer le cookie !');


		setcookie('Nom', $_POST['nom'], (time()+3600));
		echo 'Bonjour Monsieur/Madame '.$_POST['nom'].'!!<br/>';
		echo 'Nombre de visites : '.$_COOKIE['Compt'].'';
	}
	else
	{
	$compt=0;

	$compt=$_COOKIE['Compt']+1;

	if (setcookie('Compt', $compt, time()+3600) == 0)	
	exit ('Impossible de creer le cookie !');

	if (isset($_COOKIE['Compt']))

		echo 'Bonjour Monsieur/Madame '.$_COOKIE['Nom'].'!!<br/>';		
		echo 'Nombre de visites : '.$_COOKIE['Compt'].'';
		
	}
}

else
{ 
	$compt=1;
	setcookie('Compt', $compt, time()+3600);

?>
	<form method='POST' action='cookiesrev.php'>

		Entrez votre prenom :  	<input type="text" name="nom">

								<input type="submit" value="Valider"/><br/>

	<form/>	

<?php
}

?>
</body>

</html>