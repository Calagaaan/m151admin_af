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
        } 
        catch (PDOException $e) 
        {
            print "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }
    }
    return $bdd;
}

function ajouterUser($nom, $prenom, $email, $dateNaissance, $pseudo, $password, $passwordconfirm, $description)
{
    
}

