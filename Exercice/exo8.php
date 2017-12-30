

<?php
 
$fichier = "compteur.txt";
if (isset($_COOKIE['VisitCounter']))
{ 
     $fp = fopen($fichier,"r+");
     $hits = fgets($fp,10);
     fclose($fp);
} else {
	setcookie("Nom","$nom"); 
     setcookie("VisitCounter","1");
     if (!file_exists($fichier)) {
        $fp = fopen($fichier,"w");
        $hits = 0;
	echo "<form method='POST' action='exo8.php'>Comment vous appelez-vous ? <input type='text' name='nom'></input></form>";
	$nom=$_POST['nom'];
     } else {
	echo "Bonjour monsieur"; $_COOKIE['Nom'];
        $fp = fopen($fichier,"r+");
        $hits = fgets($fp,10);
     }
     $hits ++;
     fseek($fp,0);
     fputs($fp,$hits);
     fclose($fp);
 
} 
if ($hits == 1) {
    print "Bonjour mr $nom<br/><div align = 'center'><font color='#FF000' size='2' face='Verdana'><b>$hits</b></font><font face='verdana' size='2' color='#000000'> visite au totals.</font></div>";
} else {
    print "<div align = 'center'><font color='FF0000' size='2' face='verdana'><b>$hits</b></font><font face='verdana' size='2' color='#000000'> visites au total.</font></div>"; 
}
?>
