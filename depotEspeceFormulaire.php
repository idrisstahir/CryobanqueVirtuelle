<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Depot d'échantillon</title>
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div class="centerInscription">
        <h1>Centre de depôt de l'espèce dans la Cryobanque Virtuelle</h1>
		<h3>Vous pouvez maintenant saisir les informations sur l'échantillon que vous voulez déposer</h3>
    		<form action="depotEspeceTraitement.php" method="post">
    			<table>
    				
    				<tr>
    					<td align="right"><label for="id_deposant">Votre id de déposant :</label></td>
    					<td><input type="text" name="id_deposant" placeholder="ID du déposant"/><br /></td>	
    				</tr>
    				
    				<tr>
    					<td align="right"><label for="id_individu">ID de l'individu :</label></td>
    					<td><input type="text" name="id_individu" placeholder="ID de l'individu"/><br /></td>
    				</tr>
    				
    				<tr>
    					<td align="right"><label for="sexe">Sexe de l'individu:</label></td>
    					<td><input type="text" name="sexe" placeholder="(ex : F / M / inconnu)"/><br /></td>
    				</tr>
    				
    				<tr>
    					<td align="right"><label for="espece">Espece de l'individu :</label></td>
    					<td><input type="text" name="espece" placeholder="Espece de l'individu"/><br /></td>
    				</tr>
    				
    				<tr>
    					<td align="right"><label for="date_prelevement">Date du prélèvement :</label></td>
    					<td><input type="text" name="date_prelevement" placeholder="(ex: 20/10/2005)"/><br /></td>
    				</tr>
    				<tr>
    					<td align="right"><label for="commentaire">Commentaire à propos de l'échantillon :</label></td>
    					<td><textarea type="text" name="commentaire"/></textarea><br /></td>
    				</tr>
    				<tr>
    					<td></td>
    					<td align="center"><input type="submit" name="depot" value="Déposer l'échantillon" /></td>
    				</tr>
    			</table>
    		</form>
    	
		</div>
	</body>
</html>