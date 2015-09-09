<!DOCTYPE html>
<?php
include 'dbfunction.php';
include 'phpToHtml.php';

?>
<html>
    <head>
        <title>Formulaire</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Utilisateurs dans la base de données</h1>
        <div>
        <?php
            buildTable(selectAllUsers());        
        ?>
        </div>
    </body>
</html>

