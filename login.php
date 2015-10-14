<?php
$error = "";
?>
<html>
    <head>
        <title>Connexion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
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
        ?>
        <form method="post" action="dbfunction.php">
            <input type="text" name="pseudo" placeholder="Pseudo" /><br /><br />
            <input type="password" name="pass" placeholder="Mot de Passe" /><br />
            <?php echo $error; ?><br />
            <input type="submit" name="connexion" value="Se Connecter" /><br /><br />
        </form>
    </body>
</html>
