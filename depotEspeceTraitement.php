<?php
$bdd = new PDO('mysql:host=localhost;dbname=membres', 'root', '');

if(isset($_POST['depot'])) {

    
    $id_deposant = $_POST['id_deposant'];
    $id_individu = $_POST['id_individu'];
    $sexe = $_POST['sexe'];
    $espece = $_POST['espece'];
    $date_prelevement = $_POST['date_prelevement'];
    $commentaire = $_POST['commentaire'];        

                            $insertmembre = $bdd->prepare("INSERT INTO echantillon(id_deposant, id_individu, sexe, espece, dateDePrelevement,commentaire, date_depot) VALUES(?, ?, ?, ?, ?, ?, NOW())");
                            $insertmembre->execute(array($id_deposant, $id_individu, $sexe, $espece, $date_prelevement, $commentaire));
                            $success = "Votre échantillon a bien été ajouté à la base <br \>";
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
        if(isset($success)) {
            echo '<font color="green">'.$success."</font>";
        }
    ?>
    </p>
    </body>
</html>
    
