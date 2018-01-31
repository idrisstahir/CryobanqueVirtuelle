<?php

$bdd = new PDO('mysql:host=localhost;dbname=membres', 'root', '');

$email = htmlspecialchars($_POST['email']);

$req1 = $bdd->prepare("SELECT * FROM users WHERE email = ?");
$req1->execute(array($email));
$user = $req1->fetch();

if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
    $mdp1 = sha1($_POST['newmdp1']);
    $mdp2 = sha1($_POST['newmdp2']);
    if($mdp1 == $mdp2) {
        $insertmdp = $bdd->prepare("UPDATE users SET password = ? WHERE email = ?");
        $insertmdp->execute(array($mdp1, $email));
        header('Location: passwordUpdated.php');
    } else {
        
        $erreur = "Vos deux mot de passe ne correspondent pas !";
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>création nouveau mot de passe</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
	<p>
    <?php
        if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
        }
    ?>
    </p>
    </body>
</html>