<?php
include(__DIR__ . "/service/UtilisateurService.php"); //connection au fichier das la couche service

/**
 * ici se trouve le programe principal pour insertion des inscriptions
 */
if (!empty($_POST)) { //ici je verifie que le POST n'est pas vide
    if (
        isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['password2'])
        && !empty($_POST['password2']) // ici je verifie que chaque POST existe et qu'il n'est pas vide
    ) {
        if ($_POST['password'] == $_POST['password2']) { // je verifie que les mots de passe sont identique
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //ici je hash le mot de passe et je le met dans une variable
            $mail = $_POST['email']; //je meit le mail dans une variable
            $util = new utilisateurService();
            $util->setUserServ($mail, $password); // je fait appel à la fonction setUser qui se trouve dans la couche service
            header('location: connexion.php?action=succes');
        } else //dans le cas ou mon mot de passe n'est pas identique 
        {
            echo 'merci de mettre deux mots de passe identique'; //se mesage est affiché
        }
    } else //dans le cas ou tous les champs ne sont pas renseigner
    {
        echo 'merci de remplir tous les champs du formulaire'; //se message est affichés
    }
}
