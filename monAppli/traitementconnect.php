<?php
include(__DIR__ . "/service/UtilisateurService.php");
include_once __DIR__ . '/model/Utilisateur.php';

/**
 * ici se trouve le programe principal pour la connexion au profil
 */
if (!empty($_POST)) { //ici je verifie que le POST n'est pas vide
    if (
        isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) // ici je verifie que chaque le tableau POST existe et qu'il n'est pas vide
    ) {
        $array = new Utilisateur();
        $array->setEmail($_POST['email'])->setPassWord($_POST['password']);
        try {
            $utServ = new utilisateurService();
            $data = $utServ->getConnectU($array); //je fait appel à la methode getConnectUser et je met en argu le un objet de Utilisateur et je recupère le données de
            //ma BDD en objet utilisteur également
        } catch (ErreursExceptionService $b) {
            echo 'code erreur: ' . $b->getCode(); //. 'message: ' . $b->getMessage();
        }

        if ($array != null && $data != null) {

            if (password_verify($array->getPassWord(), $data->getPassWord())) { //je verifie que le hash du mot de passe de l'utilisateur correspondant est bien identique à celui renseigé par le user
                session_start(); //si tout va bien je demarre la session

                /**
                 * ici je met les clés values de mon instance dans la variable globale $_SESSION
                 */
                $_SESSION['username'] = $data->getEmail();
                $_SESSION['profil'] = $data->getProfil();
                header("location: profilsession.php");
            } else { //le cas contraire
                header('location: connexion.php?action=erreur');
            }
        } else {
            header('location: connexion.php?action=unknow');
        }
    } else { //si le post est vide ou un element manque
        header('location: connexion.php?action=empty');
    }
}
