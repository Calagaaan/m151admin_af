<?php

include 'dbfunction.php';

$stateConnection = "";

if(isset($_SESSION['stateSession']))
{
    $stateConnection = $_SESSION["stateSession"];
}

$error = "";

$pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : "";

if(isset($_REQUEST['connexion']))
{
    $userinfo = login($pseudo, $password);

    if(count($userinfo)>0)
    {
        // Le login a réussi si l'on arrive ici
        $_SESSION["stateSession"]="connected";
        foreach ($userinfo as $data)
        {
            $_SESSION['idUser'] = $data['idUser'];
            $_SESSION['isAdmin'] = $data['isAdmin'];
        }
        redirect("login.php");
    }
    else
    {
        $error = "Pseudo et/ou mot de passe incorrect.";
    }
}
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
        <form method="post" action="#">
            <input type="text" name="pseudo" placeholder="Pseudo" value="<?php echo $pseudo; ?>" /><br /><br />
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
        <a href="utilisateurs.php">Utilisateurs</a> -
        <a href="choisirSport.php">Chosir un sport</a>
    </body>
</html>
