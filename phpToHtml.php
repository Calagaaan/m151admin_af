<?php

function buildTable($tableau)
{   
    echo '<table border="2"><tr><td>Nom</td><td>Prénom</td><td>Email</td><td>Pseudo</td><td>Age</td><td>Détails</td><td>Modifier</td></tr>';
    foreach ($tableau as $data) 
    {
        $from = new DateTime($data['dateNaissance']);
        $to   = new DateTime('today');
        
        echo '<tr><td>'.$data['nom'].'</td><td>'.$data['prenom'].'</td><td>'.$data['email'].'</td><td>'.$data['pseudo'].'</td><td>'.$from->diff($to)->y.'</td><td><a href="utilisateurs.php?id='.$data['idUser'].'">Détails</a></td></tr>';
    }
    echo '</table>';
} 
?>
