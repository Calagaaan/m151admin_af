<?php

function buildTable($tableau)
{   
    echo '<table border="2"><tr><td>Nom</td><td>Prénom</td><td>Email</td><td>Pseudo</td></tr>';
    foreach ($tableau as $data) 
    {
        echo '<tr><td>'.$data['nom'].'</td><td>'.$data['prenom'].'</td><td>'.$data['email'].'</td><td>'.$data['pseudo'].'</td></tr>';
    }
    echo '</table>';
} 
?>

