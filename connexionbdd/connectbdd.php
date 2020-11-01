<?php
// cette fonction gere la connection à la base de donnéé pour chaque fonction de crud et de crudnoserv
function connectBdd()
{
    $db = mysqli_init();
    mysqli_real_connect($db, 'localhost', 'root', '', 'gestionemploye');
    return $db; // je retourene cet acces ici
}
