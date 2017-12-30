<html>
	<head>
		<meta charset = "UTF-8">
		<title>Cabinet Médical - Identification</title>
	</head>
	<?php
		$login_valide = "admin";
		$pwd_valide = "123456a";
	?>

<body>

	<center><h1>Rechercher un usager</h1></center>
		<form method='Post' action='resultat.php'>
		<center><table>
		<tr><td height='35'>	Entrez le nom: 		</td><td><input type='text' name='nom'></input></td></tr><br/>
		<td height='35'> 	Entrez le prenom:	</td><td><input type='text' name='prenom'></input></td></tr><br/>
		<tr><td colspan="2"><center><input type='submit' name='sub' value='Rechercher' style='background-color:grey;  width:auto;  padding:8px 0;   display: inline-block;   margin:0 8px 0 0;  border-radius:7px;  font-size: 0.85em;  width:120px;  color:black;  font-family: Arial,sans-serif;'></input></center></td></tr>
	<center><a href='InscriptionUsager.php' style="color:blue; text-decoration:none;">Inscrivez vous.</a></center>
</body>


	<form action = "identification.php" method = "post">
		Login <input type = "text" name = "login"/>
		Mot de passe <input type = "password" name = "mdp"/>
		<input type = "submit" value = "Envoyer"/>
	</form>

	<?php
	session_start();
	if(isset($_SESSION['login'])){
		header('Location : accueil.php');
	}
	if(isset($_POST['login']) && isset($_POST['mdp'])){
		if($login_valide == $_POST['login'] && $pwd_valide == $_POST['mdp']){
		$_SESSION['login'] = $_POST['login'];
		header('Location : accueil.php');
	}else{
		echo '<body onLoad = "alert(\'Membre non reconnu...\')">';	
	}

	?>
</html>

		
	
