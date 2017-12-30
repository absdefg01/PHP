<?php
try {
$linkpdo = new PDO("mysql:host=localhost;dbname=lhs1483a", 'lhs1483a', 'Au4zp9k7');
}
catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}?>
<html>
	<head>
		<title>Rechercher un contact</title>
	</head>
<body>
<center><h1>Rechercher un contact</h1></center>
	<form method='Post' action='resultat.php'>
	<center><table>
	<tr><td height='35'>	Entrez le nom: 		</td><td><input type='text' name='nom'></input></td></tr><br/>
				<td height='35'> 	Entrez le prenom:	</td><td><input type='text' name='prenom'></input></td></tr><br/>
												<tr><td colspan="2"><center><input type='submit' name='sub' value='Rechercher' style='background-color:grey;  width:auto;  padding:8px 0;   display: inline-block;   margin:0 8px 0 0;  border-radius:7px;  font-size: 0.85em;  width:120px;  color:black;  font-family: Arial,sans-serif;'></input></center></td></tr>
	
	</table></center>
	</form>
<center><a href='Inscription.php' style="color:blue; text-decoration:none;">Inscription dans le carnet d'adresse.</a></center>
</body>
</html>
