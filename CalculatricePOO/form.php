<?php
class form
{
///Constructeur de l'en-tête du formulaire
public function  __construct($nomfichier,$titre){echo '	<form method="POST" action="'.$nomfichier.'"><fieldset>
														<legend style="font-size:25px;font-family:Engravers MT;color:black;">'.$titre.'</legend>';}
///Methode creant une zone de texte
public function settext ($type,$name,$value){echo '<input type="'.$type.'" name="'.$name.'" value="'.$value.'"></input>';}
///Methode creant un libelle
public function setlib ($lib){echo $lib;}

public function getform ($ent)  {
 echo"<table><tr><td width='100' height='50'><b>";
	$ent->setlib('Nombre 1');
 echo "</b></td><td>";
	$ent->settext('text','var1',''); 
 echo"</td></tr><tr><td><b>";
	$ent->setlib('Nombre 2'); 
 echo"</b></td><td>"; 
	$ent->settext('text','var2',''); 
 echo"</td></tr></fieldset></form></table><table><tr><td width='100' height='50'><b>";
	$ent->setlib('Resultat'); 
 echo "</b></td><td>";
	 $res=0;
		if (isset($_POST['add'])){
			$res=$_POST['var1']+$_POST['var2'];
			echo $_POST['var1'].' + '.$_POST['var2'].' = '.$res;}
		if (isset($_POST['sous'])){
			$res=$_POST['var1']-$_POST['var2'];
			echo $_POST['var1'].' - '.$_POST['var2'].' = '.$res;}
		if (isset($_POST['mult'])){
			$res=$_POST['var1']*$_POST['var2'];
			echo $_POST['var1'].' * '.$_POST['var2'].' = '.$res;}
		if (isset($_POST['div'])){
			$res=$_POST['var1']/$_POST['var2'];
			echo $_POST['var1'].' / '.$_POST['var2'].' = '.$res;}			
		
	///$ent->settext('text','res', ''.$res.'' );
	
 echo "</td></tr></table><table><tr><td width='100'><b>";
	$ent->setlib('Operateur'); 
 echo "</b></td><td width='160'><center>";
	$ent->settext('submit','add','Addition'); 
 echo "</td><td width='160'>";
	$ent->settext('submit','sous','Soustraction'); 
 echo "</td><td width='160'>";
	$ent->settext('submit','mult','Multiplication'); 
 echo "</td><td width='160'>";
	$ent->settext('submit','div','Division'); 
 echo "</center></td></tr></table></td></tr></table></center>";
}
}
?>