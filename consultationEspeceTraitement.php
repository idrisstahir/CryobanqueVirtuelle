<?php
$bdd = new PDO('mysql:host=localhost;dbname=membres', 'root', '');

if(isset($_POST['consultation'])) {

    $espece = $_POST['espece'];
    $consultEspece = $bdd->prepare("SELECT * FROM echantillon WHERE espece = ?");
    $consultEspece->execute(array($espece));
    $infoEspece = $consultEspece->fetch();
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
            echo "$infoEspece[espece]"."<br />";
            echo "$infoEspece[commentaire]"."<br />";
            echo "$infoEspece[date_depot]"."<br />";
        ?>
        </p>
    </body>
</html>
    
