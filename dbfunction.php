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
            $bdd->exec('SET NAMES UTF8');

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

function ajouterUser($nom, $prenom, $email, $dateNaissance, $pseudo, $password, $description, $classe)
{
    $password = sha1($password);

    $data = getConnexion()->prepare('INSERT INTO user VALUES("", :nom, :prenom, :email, :date, :pseudo, :pass, :description, "", :classe)');
    $data->bindParam(':nom', $nom, PDO::PARAM_STR);
    $data->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $data->bindParam(':email', $email, PDO::PARAM_STR);
    $data->bindParam(':date', $dateNaissance, PDO::PARAM_STR);
    $data->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $data->bindParam(':pass', $password, PDO::PARAM_STR);
    $data->bindParam(':description', $description, PDO::PARAM_STR);
    $data->bindParam(':classe', $classe, PDO::PARAM_STR);
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
    return($RequeteData->fetchAll(PDO::FETCH_ASSOC));
}

function selectOneUser($id)
{
    $RequeteSql =  'SELECT * FROM user WHERE idUser ='.$id.';';
    $RequeteData = getConnexion()->query($RequeteSql);
    return($RequeteData->fetchAll(PDO::FETCH_ASSOC));
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
    return($RequeteData->fetchAll(PDO::FETCH_ASSOC));
}

function getSports()
{
    $RequeteSql =  'SELECT * FROM sports;';
    $RequeteData = getConnexion()->query($RequeteSql);
    return($RequeteData->fetchAll(PDO::FETCH_ASSOC));
}

function insertSports($idUser, $sport1, $sport2, $sport3, $sport4)
{
    try {
    getConnexion()->beginTransaction();
    
    $req1 = getConnexion()->prepare('INSERT INTO choix VALUES(:sport1, :idUser, 1 )');
    $req1->bindParam(':sport1', $sport1, PDO::PARAM_STR);
    $req1->bindParam(':idUser', $idUser, PDO::PARAM_STR);
    $req1->execute();
    
    $req2 = getConnexion()->prepare('INSERT INTO choix VALUES(:sport2, :idUser, 2 )');
    $req2->bindParam(':sport2', $sport2, PDO::PARAM_STR);
    $req2->bindParam(':idUser', $idUser, PDO::PARAM_STR);
    $req2->execute();
    
    $req3 = getConnexion()->prepare('INSERT INTO choix VALUES(:sport3, :idUser, 3 )');
    $req3->bindParam(':sport3', $sport3, PDO::PARAM_STR);
    $req3->bindParam(':idUser', $idUser, PDO::PARAM_STR);
    $req3->execute();
    
    $req4 = getConnexion()->prepare('INSERT INTO choix VALUES(:sport4, :idUser, 4 )');
    $req4->bindParam(':sport4', $sport4, PDO::PARAM_STR);
    $req4->bindParam(':idUser', $idUser, PDO::PARAM_STR);
    $req4->execute();
    
    getConnexion()->commit();
    
    return true;
    
    }
    catch (Exception $e)
    {
        getConnexion()->rollBack();
        return false;
    }
}

