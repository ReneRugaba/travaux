<?php
session_start();
include('conditionConsultPages.php');
include_once('service/EmployeService.php');
include_once('model/Employe.php');
include_once(__DIR__ . '/vues/afficheTabEmp.php');
include_once __DIR__ . "/vues/tabEmpAcceuil.php";
include_once __DIR__ . '/vues/Formulaire.php';
include_once __DIR__ . '/service/ErreursService.php';
include_once __DIR__ . '/dao/ConnectBaseDeDonnee.php';


/**
 * ce fichier est le fichier controleur qui gere le traitement de la tab employe
 */
if (isset($_GET['action']) && $_GET['action'] == 'ajouter') { //je verifie si le tableau $_POST n'est pas vide et si dans le GET[action]==ajouter
    try {
        if (!empty($_POST) && isset($_POST['noemp']) && !empty($_POST['noemp']) && isset($_POST['noserv']) && !empty($_POST['noserv'])) { //Si la verification est ok je verifie si dans le post noemp  et noserv existe et qu'il ne sont pas vide
            $noemp = htmlspecialchars($_POST['noemp']);
            $nom = htmlspecialchars($_POST['nom']);
            $prnom = htmlspecialchars($_POST['prenom']);
            $emploi = htmlspecialchars($_POST['emploi']);
            $embauche = htmlspecialchars($_POST['embauche']);
            $sup = htmlspecialchars($_POST['sup']) ? $_POST['sup'] : NULL;
            $sal = htmlspecialchars($_POST['sal']) ? $_POST['sal'] : NULL;
            $comm = htmlspecialchars($_POST['comm']) ? $_POST['comm'] : NULL;
            $noserv = htmlspecialchars($_POST['noserv']);
            $empServ = new Employe2(); //ici je crée mon Employe
            $empServ->setNoemp($noemp)->setNom($nom)->setPrenom($prnom)
                ->setEmploi($emploi)->setSup($sup)->setEmbauche($date = new DateTime($embauche))
                ->setSal($sal)->setComm($comm)->setNoserv($noserv);
            $emp = new EmployeService();
            $emp->Add($empServ); //après avoir donnée une valeur à chaque atrtibu de ma class employe2, je fait appel à 
            //la methode abstraite de employeService dans la couche service en lui donnant mon instance d'employe
?>
            <h1 class="text-success">Ajout employé réssit avec succès!

            </h1> <?php
                }
            } catch (ErreursService $c) {
                $data = null; // en donnant la valeur null par defaut à data j'enticipe les erreurs de mon formulaire car je gère la modification et l'ajout dans le même form
                Formulaire($data, $c->getMessage()); //ici j'appel le form en html

            }
            $data = null; // en donnant la valeur null par defaut à data j'enticipe les erreurs de mon formulaire car je gère la modification et l'ajout dans le même form
            Formulaire($data); //ici j'appel le form en html
        } elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'edit') { //je verifie si le tableau $_GET n'est pas vide et si dans le GET[action]==edit

            $employe = new Employe2(); //ici je crée mon employe avec ma class Employe2

            /**
             * ici je mets mes $_POST dans des variable avec anticipation valeur null pour int et float
             */
            $id = htmlspecialchars($_POST['noemp']);
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $emp = htmlspecialchars($_POST['emploi']);
            $sup = htmlspecialchars($_POST['sup']) ? $_POST['sup'] : NULL;
            $embauche = htmlspecialchars($_POST['embauche']);
            $sal = htmlspecialchars($_POST['sal']) ? $_POST['sal'] : NULL;
            $comm = htmlspecialchars($_POST['comm']) ? $_POST['comm'] : NULL;

            $noser = htmlspecialchars($_POST['noserv']);
            /**
             * à partir d'ici grace au setter, je donne la valeur de mes $_POST à mon objet employe
             */
            $employe->setNoemp($id)->setNom($nom)->setPrenom($prenom)->setEmploi($emp)->setSup($sup)->setEmbauche($date = new DateTime($embauche))->setSal($sal)->setComm($comm)->setNoserv($noser);

            //j'appelle la fonction edit la methode abstraite de employeService qui s'occupe de faire la liaison avec le dao
            $emp = new EmployeService();
            $emp->edit($employe);
            tabEmpaccueil(); //j'appel la page de d'accueil de mon tableau employe
        } elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'sup' && $_GET['id']) { //je verifie si le tableau $_GET n'est pas vide et si dans le GET[action]==sup et que id est present dans le get
            $id = htmlspecialchars($_GET['id']); // ici je recupere l'id dans le get et je le met dans une variable
            $emp = new EmployeService();
            $emp->sup($id); //je fais appel à la methode abstraite sup dans dans la couche EmployeService qui fait le lien avec dao
            tabEmpaccueil();
        } elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'modif' && $_GET['id']) { //je verifie si le tableau $_GET n'est pas vide , si dans le GET[action]==modif et si l'id est bien presente dans le get

            $id = htmlspecialchars($_GET['id']); //je recup l'id et je la met dans la variable $id
            $emp = new EmployeService();
            $data = $emp->modif($id); //j'utilise la methode modif abstraite qui se trouve dans ma couche service et qui fait le lien ave le dao
            //ici je recupère chaque élement dans data grace au clés du tableau assoc et je les met dans une variable

            Formulaire($data); //je fait appel au formulaire en lui donnant mon objet data en argu
        } elseif (!empty($_POST) && isset($_POST['nom']) && isset($_POST['noserv']) && isset($_POST['nom']) &&  $_GET['action'] == 'recherche') {
            $emp = new EmployeService();
            $nom = htmlspecialchars($_POST['nom']);
            $emploi = htmlspecialchars($_POST['emploi']);
            $noserv = htmlspecialchars($_POST['noserv']);
            $tab = $emp->rechInTab($nom, $emploi, $noserv);
            $tab = [
                'nom' => $nom,
                'emploi' => $emploi,
                'noserv' => $noserv
            ];
            tabEmpaccueil($comp = null, $tab);
        } else {
            $emp = new EmployeService();
            $comp = $emp->compteur();
            tabEmpaccueil($comp); //j'appel la page de la table employe par défaut de mon controleur
        }
