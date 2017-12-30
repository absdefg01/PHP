<html>
	<form action = "deconnexion.php" method = "post">
		<input type ="submit" value="Deconnexion" name = "Deconnexion"/>
	</form>
	<?php
	@session_start();
	if (isset($_POST["Deconnexion"])){
		session_destroy();
		header('Location : identification.php')	
	}	
	?>
</html>
