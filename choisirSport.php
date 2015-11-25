<?php

include 'dbfunction.php';
include 'phpToHtml.php';

$sports = getSports();


?>
<html>
    <head>
        <title>Formulaire</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Choisir vos sports</h1>
        <form action="#" method="post">
        <label for="sport1">Premier sport : </label>
        <select name="sport1">
        <?php
            foreach ($sports as $data)
            {
                echo '<option value="'. $data['idSport'] .'">'. $data['label'] .'</option>';
            }
        ?>
        </select><br /><br />
        <label for="sport2">Deuxième sport : </label>
        <select name="sport2">
        <?php
            foreach ($sports as $data)
            {
                echo '<option value="'. $data['idSport'] .'">'. $data['label'] .'</option>';
            }
        ?>
        </select><br /><br />
        <label for="sport3">Troisième sport : </label>
        <select name="sport3">
        <?php
            foreach ($sports as $data)
            {
                echo '<option value="'. $data['idSport'] .'">'. $data['label'] .'</option>';
            }
        ?>
        </select><br /><br />
        <label for="sport4">Quatrième sport : </label>
        <select name="sport4">
        <?php
            foreach ($sports as $data)
            {
                echo '<option value="'. $data['idSport'] .'">'. $data['label'] .'</option>';
            }
        ?>
        </select><br /><br />
        <input type="submit" name="sendSports" value="Envoyer" />
        </form>
    </body>
</html>
        

