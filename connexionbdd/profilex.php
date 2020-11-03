<?php
include("crudex.php");

/**
 * ici se trouve le programe principal pour la connexion au profil
 */
if (!empty($_POST)) { //ici je verifie que le POST n'est pas vide
    if (
        isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) // ici je verifie que chaque le tableau POST existe et qu'il n'est pas vide
    ) {
        $array = getConnectUser($_POST['email']); //je fait appel à ma fonction getConnectUser et je met en argu le $_POST[mail]

        if (password_verify($_POST['password'], $array['password'])) { //je verifie que le hash du mot de passe de l'utilisateur correspondant est bien identique à celui renseigé par le user
            echo 'bienvenu sur votre profil'; //si c'est ok j'affiche ce message
        } else { //le cas contraire
            echo 'mot de passe ou identifiant erronné!'; //comme c'est ko j'affiche ce message
        }
    } else { //si le post est vide ou un element manque
        echo 'merci de remplir tous les champs du formulaire'; //j'affiche se message
    }
}
