<!DOCTYPE html>
<?php
include 'dbfunction.php';
include 'phpToHtml.php';

?>
<html>
    <head>
        <title>Utilisateurs</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Utilisateurs dans la base de données</h1>
        <div>
        <?php
            if(!isset($_GET['id']))
            {
                buildTable(selectAllUsers());
            }
            else
            {
                $id = $_REQUEST['id'];
                buildTableOneUser(selectOneUser($id));
            }
        ?>
        </div>
    </body>
</html>

