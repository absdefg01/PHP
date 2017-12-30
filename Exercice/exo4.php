<?php
$jour=date("d");
$mois=date("m");
$annee=2012;
$heure=date("H");
$min=date("i");
$sec=date("s");
$anneer="2012";

echo"Nous somme le $jour/$mois/$annee; il est $heure:$min:$sec.";
echo"Next<br/><br/>";


if ($annee%4 !==0)
{
	echo"L'annee n'est pas bissextile!";
}
else if($annee%100 !==0 && $annee%400 ==0)
{
	echo"L'annee est bissextile";
}

?>
