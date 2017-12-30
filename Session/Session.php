<?php

$log = "x";
$mdp = "y";
$visit1=0;
$visit2=0;
if (isset($_POST['log']) && isset($_POST['mdp'])) {

	if ($log == $_POST['log'] && $mdp == $_POST['mdp']) {
		
		session_start ();
		$visit1=$_SESSION['vis1'];
		$visit2=$_SESSION['vis2'];
		$_SESSION['log'] = $_POST['log'];
		$_SESSION['mdp'] = $_POST['mdp'];
		echo'<br/>Votre login est '.$_SESSION['log'].' et votre mot de passe est '.$_SESSION['mdp'].'';
		?>
		<br/><br/><br/><br/><li> <a href='page1.php'>Page une</a> 	consulte </li>
		<li> <a href='page2.php'>Page deux</a> consulte </li>
		<?php
}
else{
echo'Identifiant inconnue, essaie encore!!';
header ("Refresh: 1;URL=Session.php");
}
}
else{?>
<html>
<head>
<title></title>
</head>
<body>
Acces reserves aux personnes autorises</br>
<form method='POST' action='Session.php'>
<table style='border-width:1px;  border-style:ridge;  border-color:black; '>
<tr><td>Login:</td><td><input type='text' name='log'></input></td>
<td>Mot de passe:</td><td><input type='text' name='mdp'></input></td>
<td><input type='submit' name='sub' value='Envoyer'></input></td></tr>
</table></form><br/>
<?php

echo"<li> <a href='page1.php'>Page une </a>";if (isset($_POST['log']) && isset($_POST['mdp'])) {echo'consulte '.$visit1.' fois.'; }echo"</li>";
echo"<li> <a href='page2.php'>Page deux</a>";if (isset($_POST['log']) && isset($_POST['mdp'])) {echo'consulte '.$visit2.' fois.'; }echo"</li>";

?>

</body>
</html>
<?php
}
?>
