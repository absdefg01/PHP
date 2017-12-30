<html>
<head><title>Calculatrice</title></head>
<body>
<?php

$res=0; 

if (isset($_POST['add']))
$res=$_POST['var1']+$_POST['var2'];
if (isset($_POST['sous']))
$res=$_POST['var1']-$_POST['var2'];
if (isset($_POST['mult']))
$res=$_POST['var1']*$_POST['var2'];
if (isset($_POST['div']))
$res=$_POST['var1']/$_POST['var2'];

?>
<center><br/>
<table>
<tr>
<td>
<form method='POST' action='Calculatrice.php'>
<fieldset>
<legend style='font-size:25px;font-family:Engravers MT;color:black;'>Calculatrice en ligne</legend>
<table>
<tr><td width='100' height='50'><b>Nombre 1</b></td><td><input type='text' name='var1'></input></td></tr>
<tr><td><b>Nombre 2</b></td><td><input type='text' name='var2'></input></td></tr>
</fieldset>
</form>
</table>
<table><tr><td width='100' height='50'><b>Resultat</b></td><td><input type='text' name='res' value='<?php echo $res; ?>'></input></td></tr></table>
<table><tr><td width='150'><b>Operateur</b></td>
<td width='160'><center><input type='submit' name='add' value='Addition' 	style='background-color:#6A5ACD;  width:auto;  padding:8px 0;  text-align:center;  display: inline-block;  float:left;  margin:0 8px 0 0;  border-radius:7px;  font-size: 0.85em;  width:120px;  color:black;  font-family: Arial,sans-serif;  '></input></td>
<td width='160'><input type='submit' name='sous' value='Soustraction' 		style='background-color:#6A5ACD;  width:auto;  padding:8px 0;  text-align:center;  display: inline-block;  float:left;  margin:0 8px 0 0;  border-radius:7px;  font-size: 0.85em;  width:120px;  color:black;  font-family: Arial,sans-serif;  '></input></td>
<td width='160'><input type='submit' name='mult' value='Multiplication' 	style='background-color:#6A5ACD;  width:auto;  padding:8px 0;  text-align:center;  display: inline-block;  float:left;  margin:0 8px 0 0;  border-radius:7px;  font-size: 0.85em;  width:120px;  color:black;  font-family: Arial,sans-serif;  '></input></td>
<td width='160'><input type='submit' name='div' value='Division' 		style='background-color:#6A5ACD;  width:auto;  padding:8px 0;  text-align:center;  display: inline-block;  float:left;  margin:0 8px 0 0;  border-radius:7px;  font-size: 0.85em;  width:120px;  color:black;  font-family: Arial,sans-serif;  '></input></center></td>
</tr></table>
</td>
</tr>
</table></center>
</body>
</html>
