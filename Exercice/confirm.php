
<?php
try {
$linkpdo = new PDO("mysql:host=localhost;dbname=lhs1483a", 'root', '');
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
///$sql=$linkpdo->query("INSERT INTO Contact VALUE('$nom','$prenom','$adresse','$cp','$ville','$telephone')");
///$exec = $linkpdo->prepare("SELECT COUNT(*) AS nb_resultat FROM Contact WHERE nom = :nom AND prenom=:prenom ");

///$resultat = $exec->execute(array('nom'=>$nom,'prenom'=>$prenom));

$req = $linkpdo->prepare('SELECT * FROM CONTACT WHERE Nom = :nom AND Prenom = :prenom');
$req->execute(array('nom'=> $nom,'prenom'=> $prenom));
$nb_resultats_recherche_membre=$req->fetch();
if($nb_resultats_recherche_membre) 
///if ($resultat['nb_resultat'] > 0) 
{

   echo 'Ce nom est deja utilise, essaie encore!';

} 
else 
{

$linkpdo->exec("INSERT INTO Contact VALUE('$nom','$prenom','$adresse','$cp','$ville','$telephone')") or die ('Erreur SQL !'.$sql.'<br />');
echo "Vous etes a prsent inscrit dans le carnet d'adresse.<br/><br/>";
echo "<center>Redirection dans 2 secondes.</center>";
	
	
	header ("Refresh: 2;URL=recherche.php");
	///echo "Il n'y a pas de conatact du nom de ".$nom.".";
}


?>

</body>
</html>
