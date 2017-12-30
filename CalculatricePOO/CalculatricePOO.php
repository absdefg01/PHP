<?php

include('form.php');
?>
<html>
	<head><title>Calculatrice</title></head>
<body>
<center><br/><table><tr><td>
<?php 	
		$ent=new form('CalculatricePOO.php', 'Calculatrice en ligne');  
		$ent->getform($ent);
?>

</body>
</html>
