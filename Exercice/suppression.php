<?php
try {
$linkpdo = new PDO("mysql:host=localhost;dbname=lhs1483a", 'root', '');
}
catch (Exception $e) {
die('Erreur : ' . $e->getMessage());

}
?>
<html>
<head>
</head>
<body>
<?php 
if(!isset($_POST['yes'])){ ?>
<form method='POST' action='suppression.php'>
<center>Etes vous sur de vouloir supprimer ce contact ?<br/>
<input type='submit' name='yes' value='Oui'></input>
<input type='submit' name='no' value='Non'></input></center>
</form>
<?php

}
?>

<?php

$sql="DELETE FROM Contact WHERE Nom = ".$_COOKIE['Nomres']." AND Prenom = ".$_COOKIE['Prenomres']."";
if(isset($_POST['yes'])){ 
$exec=$linkpdo->exec($sql) or die ('Erreur SQL !<br />');
echo "Vous etes a prsent supprimer du carnet d'adresse.";

}
if(isset($_POST['no'])){
header ("Refresh: 0;URL=recherche.php");

}
?>

</body>
</html>