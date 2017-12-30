
<?php
try {
$linkpdo = new PDO("mysql:host=localhost;dbname=lhs1483a", 'lhs1483a', 'Au4zp9k7');
}
catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}?>
<html>
<head>
<title>Insertion</title>
</head>
<body>

<?php
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

	$linkpdo->exec("INSERT INTO Contact VALUE('$nom','$prenom','$adresse','$cp','$ville','$telephone')") or die ('Erreur SQL !'.$sql.'<br />');
	echo "Vous etes a present inscrit dans le carnet d'adresse.<br/><br/>";
	echo "<center>Redirection dans 2 secondes.</center>";
	header ("Refresh: 2;URL=recherche.php");
	
}


?>

</body>
</html>
