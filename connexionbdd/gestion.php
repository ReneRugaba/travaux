<?php
session_start();
include('conditionConsultPages.php');
include_once('model/EmployeService.php');
include_once('model/Employe2.php');
include_once('afficheTabEmp.php');



if (!empty($_POST) && isset($_GET['action']) && $_GET['action'] == 'ajouter') { //je verifie si le tableau $_POST n'est pas vide et si dans le GET[action]==ajouter
    if (isset($_POST['noemp']) && !empty($_POST['noemp']) && isset($_POST['noserv']) && !empty($_POST['noserv'])) { //Si la verification est ok je verifie si dans le post noemp  et noserv existe et qu'il ne sont pas vide

        $sup = $_POST['sup'] ? $_POST['sup'] : NULL;
        $sal = $_POST['sal'] ? $_POST['sal'] : NULL;
        $comm = $_POST['comm'] ? $_POST['comm'] : NULL;
        $empServ = new Employe2();
        $empServ->setNoemp($_POST['noemp'])->setNom($_POST['nom'])->setPrenom($_POST['prenom'])
            ->setEmploi($_POST['emploi'])->setSup($sup)->setEmbauche($date = new DateTime($_POST['embauche']))
            ->setSal($sal)->setComm($comm)->setNoserv($_POST['noserv']);
        EmployeService::AddEmploye($empServ);
    }
} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'edit') { //je verifie si le tableau $_GET n'est pas vide et si dans le GET[action]==edit
    //je rentre les valeurs reçu dans le post dans des variables en anticipant leur valeur, s'ils sont vides, en leur donnant une valeur NULL


    $employe = new Employe2(); //ici je crée mon employe avec ma class Employe2

    /**
     * ici je mets mes $_POST dans des variable avec anticipation valeur null pour int et float
     */
    $id = $_POST['noemp'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $emp = $_POST['emploi'];
    $sup = $_POST['sup'] ? $_POST['sup'] : NULL;
    $embauche = $_POST['embauche'];
    $sal = $_POST['sal'] ? $_POST['sal'] : NULL;
    $comm = $_POST['comm'] ? $_POST['comm'] : NULL;

    $noser = $_POST['noserv'];
    /**
     * à partir d'ici grace au setter, je donne la valeur de mes $_POST à mon objet employe
     */
    $employe->setNoemp($id)->setNom($nom)->setPrenom($prenom)->setEmploi($emp)->setSup($sup)->setEmbauche($date = new DateTime($embauche))->setSal($sal)->setComm($comm)->setNoserv($noser);



    //j'appelle la fonction edit que j'ai créé dans crud.php qui s'occupe de modifier les infos correspondant a noemp dans la tab employe et je lui donne Mon objet employe en argu
    EmployeService::edit($employe);
} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'sup' && $_GET['id']) { //je verifie si le tableau $_GET n'est pas vide et si dans le GET[action]==sup et que id est present dans le get
    $id = $_GET['id']; // ici je recupere l'id dans le get et je le met dans une variable
    employeService::sup($id); //je fais appel à la fonction delete dans crudnoserv.php qui va s'ocuper de sup la row corespondant id


} elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'modif' && $_GET['id']) { //je verifie si le tableau $_GET n'est pas vide , si dans le GET[action]==modif et si l'id est bien presente dans le get
    $id = $_GET['id']; //je recup l'id et je la met dans la variable $id
    $data = employeService::modif($id); //j'utilise la fonction rechercheEmpId, créé dans crud.php, pour recuperer la row de la tab emp vis à $id, qui m'est retourné en tableau associatif dans la variable data

    //ici je recupère chaque élement dans data grace au clés du tableau assoc et je les met dans une variable
    $noemp = $data['noemp'];
    $nom = $data['nom'];
    $prenom = $data['prenom'];
    $emploi = $data['emploi'];
    $sup = $data['sup'];
    $embauche = $data['embauche'];
    $sal = $data['sal'];
    $comm = $data['comm'];
    $noserv = $data['noserv'];
}

require('tabEmpAcceuil.php');
