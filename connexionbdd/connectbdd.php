<?php
function connectBdd()
{
    $db=mysqli_init();
    mysqli_real_connect($db,'localhost','malakaie','123456','gestionemploye');
    return $db;
}