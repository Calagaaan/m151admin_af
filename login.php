<?php

session_start();

$stateConnection = "";

if(isset($_SESSION['stateSession']))
{
    $stateConnection = $_SESSION["stateSession"];
}
$error = "";
?>
<html>
    <head>
        <title>Connexion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
            if(isset($_REQUEST['error']))
            {
                $error = $_REQUEST['error'];
                
                if($error == true)
                {
                    $error = "L'utilisateur ou le mot de passe sont erronés.";
                }
            }
            
            if($stateConnection == "connected")
            {
        ?>
        <form action="dbfunction.php" method="post">
            <input type="submit" name="deconnexion" value="Se Deconnecter" /><br /><br />
        </form>
        <?php
            }else{
        ?>
        <form method="post" action="dbfunction.php">
            <input type="text" name="pseudo" placeholder="Pseudo" /><br /><br />
            <input type="password" name="pass" placeholder="Mot de Passe" /><br />
            <?php echo $error; ?><br />
            <input type="submit" name="connexion" value="Se Connecter" /><br /><br />
        </form>
        <br />
        <?php
            }
            echo $stateConnection;
        ?>
        <br /><br />
        <a href="index.php">Index</a> -
        <a href="login.php">Login</a> -
        <a href="utilisateurs.php">Utilisateurs</a>
    </body>
</html>
