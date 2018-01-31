<?php
     session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Espace membre</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="style.css" />
</head>
	<body>
	<p>Bienvenue <?php echo $_SESSION['pseudo']; ?>!!!</p><br />
	<p>Ici c'est votre espace personnel !!!<br />
	Vous pouvez deposer un matériel génétique ou consuler le matériel existant.</p><br />
	<p><a href = "deconnexion.php">Deconnexion</a></p>
	</body>
</html>
