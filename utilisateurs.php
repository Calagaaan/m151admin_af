<!DOCTYPE html>
<?php

include 'dbfunction.php';
include 'phpToHtml.php';

$stateConnection = "";

if(isset($_SESSION['stateSession']))
{
    $stateConnection = $_SESSION["stateSession"];
}

if($stateConnection == "connected")
{
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
            if(isset($_GET['idToDelete']))
            {
                $idToDelete = $_REQUEST['idToDelete'];
                deleteUser($idToDelete);
            }
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
        <br />
        <?php
            echo $stateConnection;
        ?>
        <br /><br />
        <a href="index.php">Index</a> -
        <a href="login.php">Login</a> -
        <a href="utilisateurs.php">Utilisateurs</a> -
        <a href="choisirSport.php">Chosir un sport</a>
    </body>
</html>
<?php
}
else
{
    redirect("login.php");
}
?>

