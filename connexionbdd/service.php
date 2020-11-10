<?php
session_start();
include('conditionConsultPages.php');
include("service/ServiceService.php");
include_once('model/Service.php');
include_once(__DIR__ . '/vues/afficheTabServ.php');

/**
 * ce fichier est le fichier controleur qui gere le traitement de la tab service
 */
if (!empty($_POST) && isset($_GET['action']) && $_GET['action'] == 'ajouter') { //je verifie si le tableau $_POST n'est pas vide et si dans le GET[action]==ajouter
    if (isset($_POST['noserv'])) { //Si la verification est ok je verifie si dans le post noserv n'est pas vide
        //je recupere chaque element du post dans des variables en anticipant leur valeur, s'ils sont vides, en leur donnant une valeur NULL
        $noserv = $_POST['noserv'];
        $serv = $_POST['service'] ? $_POST['service']  : NULL;
        $ville = $_POST['ville'] ? $_POST['ville']  : NULL;

        $service2 = new Service2(); //ici je crée mon objet instance de ma class Service2

        /**
         * ici je donne une valeur à chaque attribut de mon obje employe
         */
        $service2->setNoserv($noserv)->setService($serv)->setVille($ville);

        //ici je fait appel à la methode abstraite de ma class ServiceService qui fait le lien avec dao dans ma couche service
        ServiceService::ajout($service2);
    }
} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'edit') { //je verifie si le tableau $_GET n'est pas vide et si dans le GET[action]==edit
    //je rentre les valeurs reçu dans le post dans des variables en anticipant leur valeur, s'ils sont vides, en leur donnant une valeur NULL
    $noserv = $_POST['noserv'];
    $serv = $_POST['service'] ? $_POST['service']  : NULL;
    $ville = $_POST['ville'] ? $_POST['ville']  : NULL;

    $service2 = new Service2(); //ici je crée mon objet $service

    /**
     * ici je donne une nouvelle valeur à chaque attribu de mon objet $service à l'aide des setter
     */
    $service2->setNoserv($noserv)->setService($serv)->setVille($ville);

    //j'appelle la methode modiff abstraite de ma class ServiceService qui fait le lien avec dao dans ma couce service
    ServiceService::modiff($service2);
} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'sup' && $_GET['id']) { //je verifie si le tableau $_GET n'est pas vide et si dans le GET[action]==sup et que id est present dans le get
    $id = $_GET['id']; // ici je recupere l'id dans le get et je le met dans une variable

    ServiceService::sup($id); //je fais appel à methode supp abstraite de ma class ServiceService qui fait le lien avec dao dans ma couche service

} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'modif' && $_GET['id']) { //je verifie si le tableau $_GET n'est pas vide , si dans le GET[action]==modif et si l'id est bien presente dans le get
    $id = $_GET['id']; //je recup l'id du get et je la met dans la variable $id
    $data = ServiceService::recheById($id); //j'utilise la methode recheById abstraite de ma class ServiceService qui fait le lien avec dao dans ma couche service et je recupere un array
    //ici je recupère chaque élement dans data grace au clés du tableau assoc et je les met dans une variable et je les echo dans le form de la modification
    $noserv = $data['noserv'];
    $service = $data['service'];
    $ville = $data['ville'];
}
require(__DIR__ . '/vues/tabServiceAcceuil.php');
