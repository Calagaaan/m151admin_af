<?php

require_once 'mysql.inc.php';

function getConnexion()
{
    static $bdd = null;
    if($bdd == null)
    {
        try 
        {
            $bdd = new PDO('mysql:'. HOST .'=;dbname='. DBNAME .'', USER, PASS);
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
    ajouterUser();
}

function ajouterUser()
{
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $dateNaissance = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_SPECIAL_CHARS);
    $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
    
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
    
}

