<?php
include("UtilisateurMysqliDao.php");

/**
 * ici se trouve le programe principal pour la connexion au profil
 */
if (!empty($_POST)) { //ici je verifie que le POST n'est pas vide
    if (
        isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) // ici je verifie que chaque le tableau POST existe et qu'il n'est pas vide
    ) {
        $array = new UtilisateurMysqliDao();
        $array = $array->getConnectUser($_POST['email']); //je fait appel à ma fonction getConnectUser et je met en argu le $_POST[mail]

        if (password_verify($_POST['password'], $array['password'])) { //je verifie que le hash du mot de passe de l'utilisateur correspondant est bien identique à celui renseigé par le user
            session_start();
            $_SESSION['username'] = $_POST['email'];
            $_SESSION['profil'] = $array['profil'];
            header("location: profilsession.php");
        } else { //le cas contraire
            header('location: connexion.php?action=erreur');
        }
    } else { //si le post est vide ou un element manque
        header('location: connexion.php?action=empty');
    }
}
