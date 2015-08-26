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
            <label>Nom : </label><input  type="text" name="nom" /><br /><br />
            <label>Prénom : </label><input type="text" name="prenom" /><br /><br />
            <label>Email : </label><input type="email" name="email" /><br /><br />
            <label>Date de naissance : </label><input type="date" name="date" /><br /><br />
            <label>Pseudo : </label><input type="text" name="pseudo" /><br /><br />
            <label>Mot de passe : </label><input type="password" name="pass" /><br /><br />
            <label>Confirmation : </label><input type="password" name="passconfirm" /><br /><br />
            <label>Description de vous : </label><textarea name="description"></textarea><br /><br />
            <input id="reset" name="reset" type='reset' value='Rénitialiser' /><input name="submit" id="submit" type="submit" value="Envoyer" />
        </form>
    </div>
    </body>
</html>


