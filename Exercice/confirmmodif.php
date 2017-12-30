<?php
try {
$linkpdo = new PDO("mysql:host=localhost;dbname=lhs1483a", 'root', '');
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
///if ($resultat['nb_resultat'] > 0) 
{

   echo 'Ce nom est deja utilise, essaie encore!';

} 
else 
{

$linkpdo->exec("UPDATE Contact SET Nom=".$nom.", Prenom=".$prenom.", Adresse=".$adresse.", CodePostal=".$cp.", Ville=".$ville.", Telephone=".$telephone." WHERE Nom = ".$nom." AND Prenom = ".$prenom."") or die ('Erreur SQL !<br />');
echo "Le contact a bien ete modifie.";
}


?>

</body>
</html>