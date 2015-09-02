<!DOCTYPE html>
<?php

?>
<html>
    <head>
        <title>Formulaire</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Formulaire d'inscription</h1>
        <div>
        <form id="monformulaire" method="post" action="dbfunction.php">
            <label for="nom" >Nom : </label><input id="nom" type="text" name="nom" required /><br /><br />
            <label for="prenom" >Prénom : </label><input id="prenom" type="text" name="prenom" required /><br /><br />
            <label for="email" >Email : </label><input id="email" type="email" name="email" required /><br /><br />
            <label for="date" >Date de naissance : </label><input id="date" type="date" name="date" required /><br /><br />
            <label for="pseudo" >Pseudo : </label><input id="pseudo" type="text" name="pseudo" required /><br /><br />
            <label for="pass" >Mot de passe : </label><input id="pass" type="password" name="pass" required /><br /><br />
            <label for="description" >Description de vous : </label><textarea id="description" name="description" ></textarea><br /><br />
            <input id="reset" name="reset" type='reset' value='Rénitialiser' /><input name="envoyer" id="submit" type="submit" value="Envoyer" />
        </form>
    </div>
    </body>
</html>


