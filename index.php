<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=membres', 'root', '');

if(isset($_POST['connexion'])) {
    $emailconnexion = htmlspecialchars($_POST['emailconnexion']);
    $mdpconnexion = sha1($_POST['mdpconnexion']);
    if(!empty($emailconnexion) AND !empty($mdpconnexion)) {
        $requser = $bdd->prepare("SELECT * FROM users WHERE email = ? AND password = ? AND active = '1' ");
        $requser->execute(array($emailconnexion, $mdpconnexion));
        $userexist = $requser->rowCount();
        if($userexist == 1) {
            $userinfo = $requser->fetch();
            $_SESSION['userid'] = $userinfo['userid'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['email'] = $userinfo['email'];
            header("Location: espace_membre.php?userid=".$_SESSION['userid']);
            
            $reqDerLog = $bdd->prepare("UPDATE users SET der_log = NOW() WHERE email = ?");
            $reqDerLog->execute(array($emailconnexion));
            
        } else {
            $erreur = "Mauvais mail ou mot de passe! ou compte pas encore confirmer";
        }
    } else {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Accueil</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
	<div class="centerConnexion">
		<h1>espace membre</h1><br />
		<form action="index.php" method="post">
			<input type="text" name="emailconnexion" placeholder="adresse mail" /><br />
			<p></p>
			<input type="password" name="mdpconnexion" placeholder="password" /><br />
			<p></p>
			<input type="submit" name="connexion" value="Connexion" />
		</form>
		
		<p> <?php if(isset($erreur)) echo '<br /><br />', $erreur; ?> </p>
		<p><a href ="inscriptionFormulaire.php">S'inscrire</a></p>
		<p><a href ="regenerePasswordEmail.php">Mot de passe perdu ?</a></p>
	</div>
	</body>
</html>
