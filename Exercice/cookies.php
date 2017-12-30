<html>

<head>

<title>Cookies</title>

</head>

<body>
	

<?php 

if(isset($_COOKIE['Compt']))
{
echo 'Bonjour monsieur/madame '.$_COOKIE['Nom'].'';
echo 'Nombre de visites: '.$_COOKIE['Compt'].'';
$_COOKIE['Compt']+1;
}
else
{ 
$compt=0;?>
	<form method='POST' action='cookies.php'>

		Nom <input type="text" name="nom">

		<input type="submit" value="Valider"/><br/>

	<form/>	

	<?php
	setcookie('Nom', $_POST['nom'], (time()+30));	
	setcookie('Compt', $compt, (time()+30));
	$_COOKIE['Compt']+1;
?>
}

?>
</body>

</html>