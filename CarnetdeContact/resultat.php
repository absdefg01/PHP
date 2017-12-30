<html>
<head>
<title>
Resultat
</title>
</head>
<body>

<?php
try {
$linkpdo = new PDO("mysql:host=localhost;dbname=lhs1483a", 'lhs1483a', 'Au4zp9k7');
}
catch (Exception $e) {
die('Erreur : ' . $e->getMessage());

}

session_start ();

$_SESSION['nom']=$_POST['nom'];
$_SESSION['prenom']=$_POST['prenom'];

$req = $linkpdo->prepare('SELECT * FROM Contact WHERE Nom = :nom AND Prenom = :prenom');
$req->execute(array('nom'=> $_SESSION['nom'],'prenom'=> $_SESSION['prenom']));
$nb_resultats_recherche_membre=$req->fetch();
$req1 = $linkpdo->prepare("Select Adresse 	FROM Contact WHERE Nom = :nom AND Prenom = :prenom");
$req2 = $linkpdo->prepare("Select CodePostal 	FROM Contact WHERE Nom = :nom AND Prenom = :prenom");
$req3 = $linkpdo->prepare("Select Ville 	FROM Contact WHERE Nom = :nom AND Prenom = :prenom");
$req4 = $linkpdo->prepare("Select Telephone 	FROM Contact WHERE Nom = :nom AND Prenom = :prenom");


if($nb_resultats_recherche_membre)  
{



?>
<center><table style='background-color:#8C9493; opacity:0.9;'>
	<tr><td width='150' height='35' style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>Nom</td>			<td width='150' style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>	<?php echo $_SESSION['nom']; ?></td></tr>

	<tr><td 			height='35' style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>Prenon</td>		<td 			style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>	<?php echo $_SESSION['prenom']; ?></td></tr>

	<tr><td 			height='35' style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>Adresse</td>		<td 			style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>	<?php $req1->execute(array('nom'=> $_SESSION['nom'],'prenom'=> $_SESSION['prenom'])); 	while($don = $req1->fetch()){echo $don['Adresse'];} ?></td></tr>

	<tr><td 			height='35' style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>Code Postal</td>	<td 				style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>	<?php $req2->execute(array('nom'=> $_SESSION['nom'],'prenom'=> $_SESSION['prenom'])); 	while($don = $req2->fetch()){echo $don['CodePostal'];}?></td></tr>

	<tr><td 			height='35' style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>Ville</td>		<td 			style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>	<?php $req3->execute(array('nom'=> $_SESSION['nom'],'prenom'=> $_SESSION['prenom'])); 	while($don = $req3->fetch()){echo $don['Ville'];}?></td></tr>

	<tr><td 			height='35' style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>Telephone</td>	<td 				style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>	<?php $req4->execute(array('nom'=> $_SESSION['nom'],'prenom'=> $_SESSION['prenom'])); 	while($don = $req4->fetch()){echo $don['Telephone'];}?></td></tr>
	<tr><td 			height='35' >

		<center><form method='POST' action='suppression.php'><input type='submit' name='sup' value='Supprimer' style='background-color:grey;  width:auto;  padding:8px 0;   display: inline-block;   margin:0 8px 0 0;  border-radius:7px;  font-size: 0.85em;  width:120px;  color:black;  font-family: Arial,sans-serif;'></input></form></center>
		</td>
		<td>
		<center><form method='POST' action='modification.php'><input type='submit' name='mod' value='Modifier' style='background-color:grey;  width:auto;  padding:8px 0;   display: inline-block;   margin:0 8px 0 0;  border-radius:7px;  font-size: 0.85em;  width:120px;  color:black;  font-family: Arial,sans-serif;'></input></form></center>
		</td>
	</tr>
</table></center>


<?php

}
else
{
?>
	<script>alert(<?php echo htmlspecialchars("Pas de conatact du nom de ".$_SESSION['nom'].".", ENT_QUOTES); ?>)</script>
	<center>Redirection dans 2 secondes.</center>
	<?php
	
	header ("Refresh: 2;URL=recherche.php");
}

?>
</body>
</html>
