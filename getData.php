<?php

$nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
$prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
$classe = filter_input(INPUT_POST, 'classe', FILTER_SANITIZE_SPECIAL_CHARS);
$dateNaissance = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
$pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
$level = filter_input(INPUT_POST, 'userLevel', FILTER_SANITIZE_SPECIAL_CHARS);

if(isset($_REQUEST['envoyer']))
{
    ajouterUser($nom, $prenom, $email, $dateNaissance, $pseudo, $password, $description, $classe);
    redirect("index.php");
}

if(isset($_REQUEST['update']))
{
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
    if($level == "Utilisateur")
    {
        $level = 0;
    }
    else
    {
        $level = 1;
    }
    
    // Envoyer vers la fonction
    updateUser($nom, $prenom, $email, $dateNaissance, $pseudo, $password, $description, $id, $level);
    // On renvoie l'utilisateur sur la page d'affichage des utilisateurs
    redirect("utilisateurs.php");
}

if(isset($_REQUEST['deconnexion']))
{
    session_destroy();
    redirect("login.php");
}

function redirect($page)
{
    header('Location: '. $page .'');
}
