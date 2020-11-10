<?php
session_start();
include('conditionConsultPages.php');
include("service/ServiceService.php");
include_once('model/Service2.php');
include_once('afficheTabServ.php');


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

        //ici je fait appel à la foction add que j'ai créé dans crudnoserv.php qui s'occupe de inserer les infos dans les variable dans la tab service en donnant mon objet en argu
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

    //j'appelle la fonction edit que j'ai créé dans crudnoserv.php qui s'occupe de modifier les infos correspondant a noserv  dans la tab service en lui donnant en argu mon objet $service
    ServiceService::modiff($service2);
} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'sup' && $_GET['id']) { //je verifie si le tableau $_GET n'est pas vide et si dans le GET[action]==sup et que id est present dans le get
    $id = $_GET['id']; // ici je recupere l'id dans le get et je le met dans une variable

    ServiceService::sup($id); //je fais appel à la fonction delete dans crudnoserv.php qui va s'ocuper de sup la row corespondant id

} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'modif' && $_GET['id']) { //je verifie si le tableau $_GET n'est pas vide , si dans le GET[action]==modif et si l'id est bien presente dans le get
    $id = $_GET['id']; //je recup l'id du get et je la met dans la variable $id
    $data = ServiceService::recheById($id); //j'utilise la fonction rechercheserv, créé dans crud.php, pour recuperer la row de la tab emp vis à $id, qui m'est retourné en tableau associatif dans la variable data
    //ici je recupère chaque élement dans data grace au clés du tableau assoc et je les met dans une variable et je les echo dans le form de la modification
    $noserv = $data['noserv'];
    $service = $data['service'];
    $ville = $data['ville'];
}
require('tabServiceAcceuil.php');
