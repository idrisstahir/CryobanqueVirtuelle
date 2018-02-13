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
	<p><a href ="depotEspeceFormulaire.php">Déposer un échantillon dans la base</a></p>

	<p>
		Consulter les échantillons d'une espèce dans la base</p>
		<form action="consultationEspeceTraitement.php" method="post">
	    		Nom de l'espèce: 
	    		<input type="text" name="espece" placeholder="espece"/>	
	    		<input type="submit" name="consultation" value="consulter" />
		</form>
	<p></p>
	<p></p>
	<p></p>
	<p></p>
	<p><a href = "deconnexion.php">Deconnexion</a></p>
	</body>
</html>
