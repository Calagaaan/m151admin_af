<?php
include 'dbfunction.php';
connexionBase();
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
            <label for="nom" >Nom : </label><input id="nom" type="text" name="nom" /><br /><br />
            <label for="prenom" >Prénom : </label><input id="prenom" type="text" name="prenom" /><br /><br />
            <label for="email" >Email : </label><input id="email" type="email" name="email" /><br /><br />
            <label for="date" >Date de naissance : </label><input id="date" type="date" name="date" /><br /><br />
            <label for="pseudo" >Pseudo : </label><input id="pseudo" type="text" name="pseudo" /><br /><br />
            <label for="pass" >Mot de passe : </label><input id="pass" type="password" name="pass" /><br /><br />
            <label for="passconfirm" >Confirmation : </label><input id="passconfirm" type="password" name="passconfirm" /><br /><br />
            <label for="description" >Description de vous : </label><textarea id="description" name="description"></textarea><br /><br />
            <input id="reset" name="reset" type='reset' value='Rénitialiser' /><input name="submit" id="submit" type="submit" value="Envoyer" />
        </form>
    </div>
    </body>
</html>


