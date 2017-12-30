<?php
session_start();
if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {
echo'sss';
}
else{
echo'caac';
}
		
?>

<html>
<head>
<title> Page Deux</title>
</head>
<body>


</body>
</html>