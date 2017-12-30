<?php
try {
$linkpdo = new PDO("mysql:host=localhost;dbname=lhs1483a", 'root', '');
}
catch (Exception $e) {
die('Erreur : ' . $e->getMessage());

}
$req1 = $linkpdo->prepare("Select Adresse FROM CONTACT WHERE Nom = :nom AND Prenom = :prenom");
$req2 = $linkpdo->prepare("Select CodePostal FROM CONTACT WHERE Nom = :nom AND Prenom = :prenom");
$req3 = $linkpdo->prepare("Select Ville FROM CONTACT WHERE Nom = :nom AND Prenom = :prenom");
$req4 = $linkpdo->prepare("Select Telephone FROM CONTACT WHERE Nom = :nom AND Prenom = :prenom");
?>
<form method='POST' action='confirmmodif.php'>
<center><table style='background-color:#8C9493; opacity:0.9;'>
	<tr><td width='150' height='35' style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>Nom</td>			<td width='150' style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>	<input type='text' name='nom' value='<?php echo $_COOKIE['Nomres']; ?>'></td></tr>
	<tr><td 			height='35' style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>Prenon</td>		<td 			style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>	<input type='text' name='prenom' value='<?php echo $_COOKIE['Prenomres']; ?>'></td></tr>
	<tr><td 			height='35' style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>Adresse</td>		<td 			style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>	<input type='text' name='adresse' value="<?php $req1->execute(array('nom'=> $_COOKIE['Nomres'],'prenom'=> $_COOKIE['Prenomres'])); while($don = $req1->fetch()){echo $don['Adresse'];} ?>"></td></tr>
	<tr><td 			height='35' style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>Code Postal</td>	<td 			style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>	<input type='text' name='cp' value="<?php $req2->execute(array('nom'=> $_COOKIE['Nomres'],'prenom'=> $_COOKIE['Prenomres'])); while($don = $req2->fetch()){echo $don['CodePostal'];}?>"></td></tr>
	<tr><td 			height='35' style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>Ville</td>		<td 			style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>	<input type='text' name='ville' value="<?php $req3->execute(array('nom'=> $_COOKIE['Nomres'],'prenom'=> $_COOKIE['Prenomres'])); while($don = $req3->fetch()){echo $don['Ville'];}?>"></td></tr>
	<tr><td 			height='35' style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>Telephone</td>	<td 			style='border-width:2px;  border-style:outset;  border-color:red; text-align:center;'>	<input type='text' name='telephone' value="<?php $req4->execute(array('nom'=> $_COOKIE['Nomres'],'prenom'=> $_COOKIE['Prenomres'])); while($don = $req4->fetch()){echo $don['Telephone'];}?>"></td></tr>
	<tr><td 			height='35' colspan='2' >
		<center><input type='submit' name='sup' value='Modifier' style='background-color:grey;  width:auto;  padding:8px 0;   display: inline-block;   margin:0 8px 0 0;  border-radius:7px;  font-size: 0.85em;  width:120px;  color:black;  font-family: Arial,sans-serif;'></input></center>
		</td>
	</tr>
</table></center>
</form>