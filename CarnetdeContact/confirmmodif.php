
<?php

try {
$linkpdo = new PDO("mysql:host=localhost;dbname=lhs1483a", 'lhs1483a', 'Au4zp9k7');
}
catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}?>

<html>
<head>
<title>Confirmation Modification</title>
</head>
<body>
<?php
session_start ();
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$adresse=$_POST['adresse'];
$cp=$_POST['cp'];
$ville=$_POST['ville'];
$telephone=$_POST['telephone'];
$req = $linkpdo->prepare('SELECT * FROM CONTACT WHERE Nom = :nom AND Prenom = :prenom');
$req->execute(array('nom'=> $nom,'prenom'=> $prenom));
$nb_resultats_recherche_membre=$req->fetch();
if($nb_resultats_recherche_membre) 
{

   echo 'Ce nom est deja utilise, essaie encore!';

} 
else 
{
	$req="UPDATE Contact SET Nom='".$nom."', Prenom='".$prenom."', Adresse='".$adresse."', CodePostal='".$cp."', Ville='".$ville."', Telephone='".$telephone."' WHERE Nom = '".$_SESSION['nom']."' AND Prenom = '".$_SESSION['prenom']."'";
	
	$linkpdo->exec($req) or die ('Erreur SQL !<br />');
	echo "<center>Le contact a bien ete modifie.</center>";
	session_destroy ();
echo"<center><br/></br>Redirection dans 2 seconde</center>";
header ("Refresh: 2;URL=recherche.php");
}


?>

</body>
</html>
