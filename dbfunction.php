<?php

$nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
$prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
$dateNaissance = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
$pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);

require_once 'mysql.inc.php';

function getConnexion()
{
    static $bdd = null;
    if($bdd == null)
    {
        try 
        {
            $bdd = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASS);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            /* mysql:127.0.0.1=;dbname=m151adminaf,m151admin,m151admin */
        } 
        catch (PDOException $e) 
        {
            print "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }        
    }
    return $bdd;
}

if(isset($_REQUEST['envoyer']))
{
    ajouterUser($nom, $prenom, $email, $dateNaissance, $pseudo, $password, $description);
}

if(isset($_REQUEST['update']))
{   
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
    updateUser($nom, $prenom, $email, $dateNaissance, $pseudo, $password, $description, $id);
}

function ajouterUser($nom, $prenom, $email, $dateNaissance, $pseudo, $password, $description)
{
    $password = sha1($password);
    
    $data = getConnexion()->prepare('INSERT INTO user VALUES("", :nom, :prenom, :email, :date, :pseudo, :pass, :description)');
    $data->bindParam(':nom', $nom, PDO::PARAM_STR);
    $data->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $data->bindParam(':email', $email, PDO::PARAM_STR);
    $data->bindParam(':date', $dateNaissance, PDO::PARAM_STR);
    $data->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $data->bindParam(':pass', $password, PDO::PARAM_STR);
    $data->bindParam(':description', $description, PDO::PARAM_STR);
    $data->execute();
    
    header("Location:index.php");
}

function updateUser($nom, $prenom, $email, $dateNaissance, $pseudo, $password, $description, $id) {
    
    // Si l'utilisateur souhaite modifier son mot de passe
    if($password != "")
    {
        $password = sha1($password);
	$data = getConnexion()->prepare('UPDATE user SET nom=:nom, prenom=:prenom, email=:email, dateNaissance=:date, pseudo=:pseudo, password=:pass, description=:description WHERE idUser='.$id.'');
	$data->bindParam(':pass', $password, PDO::PARAM_STR);
    }
    // Au contraire si il ne souhaite pas le modifier
    else
    {
	$data = getConnexion()->prepare('UPDATE user SET nom=:nom, prenom=:prenom, email=:email, dateNaissance=:date, pseudo=:pseudo, description=:description WHERE idUser='.$id.'');
    }

    $data->bindParam(':nom', $nom, PDO::PARAM_STR);
    $data->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $data->bindParam(':email', $email, PDO::PARAM_STR);
    $data->bindParam(':date', $dateNaissance, PDO::PARAM_STR);
    $data->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $data->bindParam(':description', $description, PDO::PARAM_STR);
    $data->execute();
    
    // On renvoie l'utilisateur sur la page d'affichage des utilisateurs
    header("Location:utilisateurs.php");
}

function selectAllUsers()
{
    $RequeteSql =  'SELECT * FROM user';
    $RequeteData = getConnexion()->query($RequeteSql);
    return $RequeteData;
}

function selectOneUser($id)
{
    $RequeteSql =  'SELECT * FROM user WHERE idUser ='.$id.';';
    $RequeteData = getConnexion()->query($RequeteSql);
    return $RequeteData;   
}

function deleteUser($id)
{
    $RequeteSql =  'DELETE FROM user WHERE idUser ='.$id.';';
    getConnexion()->query($RequeteSql);
}






