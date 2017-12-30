<?php
try {
$linkpdo = new PDO("mysql:host=localhost;dbname=lhs1483a", 'lhs1483a', 'Au4zp9k7');
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
session_start ();

if(isset($_POST['yes'])){
$sql="DELETE FROM Contact WHERE Nom = '".$_SESSION['nom']."'";
$exec=$linkpdo->exec($sql) or die ('Erreur SQL !<br />');
echo "<center>Vous etes a prsent supprimer du carnet d'adresse.</center>";
echo"<center></br></br>Redirection dans 2 seconde</center>";
header ("Refresh: 2;URL=recherche.php");
}
if(isset($_POST['no'])){
header ("Refresh: 0;URL=recherche.php");

}
?>

</body>
</html>
