<?php
session_start();
include('conditionConsultPages.php');
include_once('service/EmployeService.php');
include_once('model/Employe.php');
include_once(__DIR__ . '/vues/afficheTabEmp.php');
include_once __DIR__ . "/vues/tabEmpAcceuil.php";
include_once __DIR__ . '/vues/Formulaire.php';


/**
 * ce fichier est le fichier controleur qui gere le traitement de la tab employe
 */
if (isset($_GET['action']) && $_GET['action'] == 'ajouter') { //je verifie si le tableau $_POST n'est pas vide et si dans le GET[action]==ajouter
    if (!empty($_POST) && isset($_POST['noemp']) && !empty($_POST['noemp']) && isset($_POST['noserv']) && !empty($_POST['noserv'])) { //Si la verification est ok je verifie si dans le post noemp  et noserv existe et qu'il ne sont pas vide
        $sup = $_POST['sup'] ? $_POST['sup'] : NULL;
        $sal = $_POST['sal'] ? $_POST['sal'] : NULL;
        $comm = $_POST['comm'] ? $_POST['comm'] : NULL;
        $empServ = new Employe2(); //ici je crée mon Employe
        $empServ->setNoemp($_POST['noemp'])->setNom($_POST['nom'])->setPrenom($_POST['prenom'])
            ->setEmploi($_POST['emploi'])->setSup($sup)->setEmbauche($date = new DateTime($_POST['embauche']))
            ->setSal($sal)->setComm($comm)->setNoserv($_POST['noserv']);
        EmployeService::AddEmploye($empServ); //après avoir donnée une valeur à chaque atrtibu de ma class employe2, je fait appel à 
        //la methode abstraite de employeService dans la couche service
?>
        <h1 class="text-success">Ajout employé réssit avec succès!

        </h1> <?php
            }
            $data = null;
            Formulaire($data);
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

            //j'appelle la fonction edit la methode abstraite de employeService qui s'occupe de faire la liaison avec le dao
            EmployeService::edit($employe);
            $data = null;
            tabEmpaccueil();
        } elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'sup' && $_GET['id']) { //je verifie si le tableau $_GET n'est pas vide et si dans le GET[action]==sup et que id est present dans le get
            $id = $_GET['id']; // ici je recupere l'id dans le get et je le met dans une variable
            employeService::sup($id); //je fais appel à la methode abstraite sup dans dans la couche EmployeService qui fait le lien avec dao
            $data = null;
            tabEmpaccueil();
        } elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'modif' && $_GET['id']) { //je verifie si le tableau $_GET n'est pas vide , si dans le GET[action]==modif et si l'id est bien presente dans le get

            $id = $_GET['id']; //je recup l'id et je la met dans la variable $id
            $data = employeService::modif($id); //j'utilise la methode modif abstraite qui se trouve dans ma couche service et qui fait le lien ave le dao
            //ici je recupère chaque élement dans data grace au clés du tableau assoc et je les met dans une variable

            Formulaire($data);
        } else {
            tabEmpaccueil();
        }
