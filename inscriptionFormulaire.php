<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Inscription</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div class="centerInscription">
		<h1>Bienvenue sur la page d'inscription</h1>
    		<form action="inscriptionTraitement.php" method="post">
    			<table>
    				<tr>
    					<td align="right"><label for="nom">Nom :</label></td>
    					<td><input type="text" name="nom" placeholder="nom"/><br /></td>
    				</tr>
    				
    				<tr>
    					<td align="right"><label for="prenom">Prenom :</label></td>
    					<td><input type="text" name="prenom" placeholder="prenom"/><br /></td>	
    				</tr>
    				
    				<tr>
    					<td align="right"><label for="email">Mail :</label></td>
    					<td><input type="email" name="email" placeholder="email"/><br /></td>
    				</tr>
    				
    				<tr>
    					<td align="right"><label for="email2">Confirmation :</label></td>
    					<td><input type="email" name="email2" placeholder="comfirmation email"/><br /></td>
    				</tr>
    				
    				<tr>
    					<td align="right"><label for="pseudo">Pseudo :</label></td>
    					<td><input type="text" name="pseudo" placeholder="pseudo"/><br /></td>
    				</tr>
    				
    				<tr>
    					<td align="right"><label for="mdp">Mot de passe :</label></td>
    					<td><input type="password" name="mdp" placeholder="mot de passe"/><br /></td>
    				</tr>
    				<tr>
    					<td align="right"><label for="mdp2">Confirmation :</label></td>
    					<td><input type="password" name="mdp2" placeholder="confirmation password"/><br /></td>
    				</tr>
    				<tr>
    					<td></td>
    					<td align="center"><input type="submit" name="inscription" value="inscription" /></td>
    				</tr>
    			</table>
    		</form>
    		<p><a href ="index.php">Se connecter</a></p>
		</div>
	</body>
</html>