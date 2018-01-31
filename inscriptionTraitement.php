<?php
$bdd = new PDO('mysql:host=localhost;dbname=membres', 'root', '');

if(isset($_POST['inscription'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $email2 = htmlspecialchars($_POST['email2']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = sha1($_POST['mdp']);
    $password2 = sha1($_POST['mdp2']);        
    
    if(!empty($_POST['nom']) && 
        !empty($_POST['prenom']) && 
        !empty($_POST['email']) && 
        !empty($_POST['email']) && 
        !empty($_POST['email2']) && 
        !empty($_POST['pseudo']) && 
        !empty($_POST['mdp']) && 
        !empty($_POST['mdp2'])) {
            if($email == $email2) {
                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $req1 = $bdd->prepare("SELECT * FROM users WHERE email = ?");
                    $req1->execute(array($email));
                    $emailexist = $req1->rowCount();
                    if($emailexist == 0) {
                        if($password == $password2) {
                            
                            $longueurCle = 15;
                            $cle = "";
                            for($i=1;$i<$longueurCle;$i++) {
                                $cle .= mt_rand(0,9);
                            }
                            
                            $insertmembre = $bdd->prepare("INSERT INTO users(nom, prenom, email, pseudo, password, cleConfirmation, date_ins) VALUES(?, ?, ?, ?, ?, ?, NOW())");
                            $insertmembre->execute(array($nom, $prenom, $email, $pseudo, $password, $cle));
                            $success = "Vous recevrez un email avec un lien pour activer votre compte! <br \>";
                            
                            
                            $header="MIME-Version: 1.0\r\n";
                            $header.='From:"cryobanquevirtuelle.fr"<contact@cryobanquevirtuelle>'."\n";
                            $header.='Content-Type:text/html; charset="uft-8"'."\n";
                            $header.='Content-Transfer-Encoding: 8bit';
                            
                            $message='
                                    <html>
                                    	<body>
                                    		<div align="center">
                                    			<br />
                                    			<p><Strong>Votre espace membre a bien été crée !!!</Strong></p>
                                    			<br />
                                                <a href="http://localhost:8081/CryobanqueVirtuelle/inscriptionConfirmation.php?email='.urlencode($email).'&cle='.$cle.'">Cliquer sur ce lien pour confirmer votre compte !</a>
                                    		</div>
                                    	</body>
                                    </html>
                                    ';
                            
                            mail($email, "Espace membre", $message, $header);
                            
                        } else {
                            $erreur = "Vos mots de passes ne correspondent pas !";
                        }
                    } else {
                        $erreur = "Adresse mail déjé utilisée !";
                    }
                } else {
                    $erreur = "Votre adresse mail n'est pas valide !";
                }
            } else {
                $erreur = "Vos adresses mail ne sont pas identique !";
            }

    } else {
        $erreur = "Tous les champs ne sont pas remplis !";
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
    
