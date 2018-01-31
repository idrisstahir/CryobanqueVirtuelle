<?php
if(isset($_POST['connexion'])) {
    
    $email = htmlspecialchars($_POST['email']);
    
    $header="MIME-Version: 1.0\r\n";
    $header.='From:"cryobanquevirtuelle.fr"<contact@cryobanquevirtuelle>'."\n";
    $header.='Content-Type:text/html; charset="uft-8"'."\n";
    $header.='Content-Transfer-Encoding: 8bit';
    
    $message='
            <html>
            	<body>
            		<div align="center">
            			<br />
            			<p><Strong>Cliquer sur le lien ci-dessous pour créer un nouveau mot de passe !!!</Strong></p>
            			<br />
                        <a href="http://localhost:8081/CryobanqueVirtuelle/regenerePasswordFormulaire.php">Cliquer ici !!!</a>
            		</div>
            	</body>
            </html>
            ';
    
    mail($email, "Espace membre", $message, $header);
    $success = "Vous recevrez un email avec un lien qui vous permettra de créer un nouveau mot de passe.";
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>MotdepassePerdu</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
	<div class="centerConnexion">
		<p>Veuillez saisir votre email afin de créer un nouveau mot de passe</p>
		<form action="regenerePasswordEmail.php" method="post">
			<input type="text" name="email" placeholder="adresse mail" /><br />
			<p></p>
			<input type="submit" name="connexion" value="envoyer un email" />
		</form>
		<p> <?php if(isset($success)) echo '<br /><br />', $success; ?> </p>
	</div>
	</body>
</html>