<?php

require_once './mysqlinc.php';

function connexionBase()
{
    try 
    {
        $bdd = new PDO('mysql:'. $HOST .'=;dbname='. $DBNAME .'', $USER, $PASS);
    } 
    catch (PDOException $e) 
    {
        print "Erreur : " . $e->getMessage() . "<br/>";
        die();
    }
    return $bdd;
}

function ajouterUser($nom, $prenom, $email, $dateNaissance, $pseudo, $password, $description)
{
    
}

