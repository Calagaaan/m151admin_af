<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
        <form id="monformulaire" method="post" action="#">
            <label>Nom : </label><input  type="text" name="nom" /><br /><br />
            <label>Prénom : </label><input type="text" name="prenom" /><br /><br />
            <label>Email : </label><input type="email" name="email" /><br /><br />
            <label>Date de naissance : </label><input type="date" name="date" /><br /><br />
            <label>Pseudo : </label><input type="text" name="pseudo" /><br /><br />
            <label>Mot de passe : </label><input type="password" name="pass" /><br /><br />
            <label>Confirmation : </label><input type="password" name="passconfirm" /><br /><br />
            <label>Description de vous : </label><textarea name="description"></textarea><br /><br />
            <input id="reset" type='reset' value='Rénitialiser' /><input id="submit" type="submit" value="Envoyer" /></div>
        </form>
    </body>
</html>


