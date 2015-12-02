<?php

include 'dbfunction.php';
include 'phpToHtml.php';

$sports = getSports();

if(isset($_SESSION['stateSession']))
{
    $stateConnection = $_SESSION["stateSession"];
}

if(isset($_REQUEST['idSport']))
{
    
}

if($stateConnection == "connected")
{
?>
<html>
    <head>
        <title>Modifier les sports</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <table>
            <tr><td>Cliquer sur un sport pour le modifier</td></tr>
    <?php
        foreach ($sports as $data)
        {
            echo '<tr><td><a href="afficherSports.php?idSport='. $data['idSport'] .'">'. $data['label'] .'</a></td></tr>';
        }
    ?>
        </table>
    </body>
</html>
<?php
}
else 
{
    redirect("login.php");
}
?>

