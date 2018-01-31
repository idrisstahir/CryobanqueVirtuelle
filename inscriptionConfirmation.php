<?php

$bdd = new PDO('mysql:host=localhost;dbname=membres', 'root', '');

if(isset($_GET['email'], $_GET['cle']) AND !empty($_GET['email']) AND !empty($_GET['cle'])) {
    $email = htmlspecialchars(urldecode($_GET['email']));
    $cle = htmlspecialchars($_GET['cle']);
    $req1 = $bdd->prepare("SELECT * FROM users WHERE email = ? AND cleConfirmation = ?");
    $req1->execute(array($email, $cle));
    $emailexist = $req1->rowCount();
    if($emailexist == 1) {
        $user = $req1->fetch();
        if($user['active'] == 0) {
            $req2 = $bdd->prepare("UPDATE users SET active = '1' WHERE email = ? AND cleConfirmation = ?");
            $req2->execute(array($email, $cle));
            $success = "Votre compte a bien été confirmé !";
        } else {
            $erreur = "Votre compte a déjà été confirmé !";
        }
    } else {
        $erreur = "L'utilisateur n'existe pas !";
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
	<p>
    <?php
        if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
        }
        if(isset($success)) {
            echo '<font color="green">'.$success."</font>";
        }
    ?>
    </p>
    </body>
</html>