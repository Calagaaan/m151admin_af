<!DOCTYPE html>
<?php

include 'dbfunction.php';
include 'phpToHtml.php';

$stateConnection = "";
$isAdmin = "";

if(isset($_SESSION['stateSession']))
{
    $stateConnection = $_SESSION["stateSession"];
    $isAdmin = $_SESSION['isAdmin'];
}

// On part du principe que l'on n'est pas sur la page pour modifier un utilisateur
$modifUser = false;

$nom = "";
$prenom = "";
$email = "";
$dateNaissance = "";
$pseudo = "";
$desc = "";
$id = "";

// On vérifie si une variable get id est présente. Si c'est le cas, c'est qu'on est là pour modifier un utilisateur.
if(isset($_GET['id']))
{
    $id = $_REQUEST['id']; 
    $modifUser = true;
    $tableau = selectOneUser($id);
                
    foreach ($tableau as $data) 
    {
        $idUser = $data['idUser'];
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $email = $data['email'];
        $dateNaissance = $data['dateNaissance'];
        $pseudo = $data['pseudo'];
        $desc = $data['description'];
    }    
}


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
                <label for="nom" >Nom : </label><input id="nom" type="text" name="nom" value="<?php echo $nom; ?>" required /><br /><br />
                <label for="prenom" >Prénom : </label><input id="prenom" type="text" name="prenom" value="<?php echo $prenom; ?>" required /><br /><br />
                <label for="email" >Email : </label><input id="email" type="email" name="email" value="<?php echo $email; ?>" required /><br /><br />
                <label for="date" >Date de naissance : </label><input id="date" type="date" name="date" value="<?php echo $dateNaissance; ?>" required /><br /><br />
                <label for="pseudo" >Pseudo : </label><input id="pseudo" type="text" name="pseudo" value="<?php echo $pseudo; ?>" required /><br /><br />
                <label for="pass" >Mot de passe : </label><input id="pass" type="password" name="pass" <?php if($modifUser == TRUE) { ?>placeholder="Leave blank to not modify."<?php } ?> /><br /><br />
                <label for="description" >Description de vous : </label><textarea id="description" name="description" ><?php echo $desc; ?></textarea><br /><br />
                
                <?php
                    if($modifUser == FALSE)
                    {
                ?>
                <input id="reset" name="reset" type='reset' value='Rénitialiser' />
                <input name="envoyer" id="submit" type="submit" value="Envoyer" />
                <?php
                    }
                    else
                    {
                    if($isAdmin == true)
                    {
                ?>
                <select name="userLevel">
                    <option value='Utilisateur'>Utilisateur</option>
                    <option value='Administrateur'>Administrateur</option>
                </select><br /><br />
                <?php
                    }
                ?>
                <input id="reset" name="reset" type='reset' value='Rénitialiser' />
                <input name="id" type="hidden" value="<?php echo $id; ?>" />
                <input name="update" id="submit" type="submit" value="Envoyer" />
                <a href="utilisateurs.php">Retour</a>
                <?php
                    }
                ?>
            </form>
        </div>
        <br />
        <?php
            echo $stateConnection;
        ?>
        <br /><br />
        <a href="index.php">Index</a> -
        <a href="login.php">Login</a> -
        <a href="utilisateurs.php">Utilisateurs</a>
    </body>
</html>