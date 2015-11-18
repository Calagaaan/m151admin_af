<?php

session_start();

//TODO sortir tout accès au POST, SESSION et autre dans ce fichier, et le mettre là où vous faites l'appel
//comme ça ici on a juste une bibliothèque de fonctions d'accès la BD

require_once 'mysql.inc.php';

include 'getData.php';

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

function login($pseudo, $password)
{
    $pdo = getConnexion();

    $RequeteSql = 'SELECT * FROM user WHERE pseudo = "' . $pseudo . '" AND password = "' . sha1($password) . '"';
    $RequeteData = $pdo->query($RequeteSql);

    return($RequeteData->fetchAll(PDO::FETCH_ASSOC));

}

function ajouterUser($nom, $prenom, $email, $dateNaissance, $pseudo, $password, $description)
{
    $password = sha1($password);

    $data = getConnexion()->prepare('INSERT INTO user VALUES("", :nom, :prenom, :email, :date, :pseudo, :pass, :description, "")');
    $data->bindParam(':nom', $nom, PDO::PARAM_STR);
    $data->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $data->bindParam(':email', $email, PDO::PARAM_STR);
    $data->bindParam(':date', $dateNaissance, PDO::PARAM_STR);
    $data->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $data->bindParam(':pass', $password, PDO::PARAM_STR);
    $data->bindParam(':description', $description, PDO::PARAM_STR);
    $data->execute();
}

function updateUser($nom, $prenom, $email, $dateNaissance, $pseudo, $password, $description, $id, $level) {

    // Si l'utilisateur souhaite modifier son mot de passe
    if($password != "")
    {
        $password = sha1($password);
	$data = getConnexion()->prepare('UPDATE user SET nom=:nom, prenom=:prenom, email=:email, dateNaissance=:date, pseudo=:pseudo, password=:pass, description=:description, isAdmin=:level WHERE idUser='.$id.'');
	$data->bindParam(':pass', $password, PDO::PARAM_STR);
    }
    // Au contraire si il ne souhaite pas le modifier
    else
    {
	$data = getConnexion()->prepare('UPDATE user SET nom=:nom, prenom=:prenom, email=:email, dateNaissance=:date, pseudo=:pseudo, description=:description, isAdmin=:level WHERE idUser='.$id.'');
    }

    $data->bindParam(':nom', $nom, PDO::PARAM_STR);
    $data->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $data->bindParam(':email', $email, PDO::PARAM_STR);
    $data->bindParam(':date', $dateNaissance, PDO::PARAM_STR);
    $data->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $data->bindParam(':description', $description, PDO::PARAM_STR);
    $data->bindParam(':level', $level, PDO::PARAM_STR);
    $data->execute();    
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

function getClasses()
{
    $RequeteSql =  'SELECT * FROM classes;';
    $RequeteData = getConnexion()->query($RequeteSql);
    return $RequeteData;
}

