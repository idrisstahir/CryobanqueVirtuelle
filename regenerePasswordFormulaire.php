<!DOCTYPE html>
<html>
   <head>
      <title>Change password</title>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style.css" />
   </head>
   <body>
      <div class="centerRegenererPassword">
         <h1>Changement de mot de passe</h1>
         <div align="left">
            <form method="POST" action="regenerePasswordTraitement.php" enctype="multipart/form-data">
            <table>
            <tr>
               <td align="right"><label>Mail :</label></td>
               <td><input type="text" name="email" placeholder="Votre email" /><br /><br /></td>
            </tr>
            <tr>
               <td align="right"><label>Mot de passe :</label></td>
               <td><input type="password" name="newmdp1" placeholder="Nouveau password"/><br /><br /></td>
            </tr>
            <tr>
               <td align="right"><label>Confirmation :</label></td>
               <td><input type="password" name="newmdp2" placeholder="Confirmation password" /><br /><br /></td>
            </tr>
            <tr>
               <td></td>
               <td><input type="submit" value="Changer mon mot de passe !" /></td>
            </tr>
            </table>
            </form>
         </div>
      </div>
   </body>
</html>

