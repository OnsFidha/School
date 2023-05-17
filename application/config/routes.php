<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'loginContr';
//login
$route['login'] = 'loginContr';
$route['login/connecter'] = 'loginContr/login';
$route['admin']= 'adminPageContr/index';
$route['logout']= 'adminPageContr/logout';
// eleve
$route['eleve/create'] = 'eleveController/create';
$route['eleve/store'] = 'eleveController/store';
$route['eleve/liste'] = 'eleveController/index';
$route['eleve/modifier/(:any)'] = 'eleveController/edit/$1';
$route['eleve/update/(:any)'] = 'eleveController/update/$1';
$route['eleve/supprimer/(:any)'] = 'eleveController/delete/$1';
$route['eleve/consulter/(:any)'] = 'eleveController/getEleve/$1';
//evenement
$route['listeEvenement'] = 'evenementContr/index';
$route['listeEvenement/ajouter'] = 'evenementContr/ajouter';
$route['listeEvenement/add'] = 'evenementContr/add';
$route['listeEvenement/modifier/(:any)'] = 'evenementContr/modifier/$1';
$route['listeEvenement/editer/(:any)'] = 'evenementContr/editer/$1';
$route['listeEvenement/supprimer/(:any)'] = 'evenementContr/supprimer/$1';
$route['listeEvenement/details/(:any)'] = 'evenementContr/consulter/$1';


//parent
$route['parent/liste']= 'ParentController/index';
$route['parent/ajouter']= 'ParentController/ajouter';
$route['parent/create']= 'ParentController/create';
$route['parent/supprimer/(:any)'] = 'ParentController/supprimer/$1';
$route['parent/consulter/(:any)'] = 'ParentController/consulter/$1';
$route['parent/enfant/(:any)'] = 'ParentController/consulterEnfants/$1';
$route['parent/compte/(:any)']= 'ParentController/creer/$1';
//$route['parent/enfant'] = 'ParentController/consulterEnfants';
// demande
$route['demande/liste'] = 'demandeController/index';
$route['demande/accepter/(:any)'] = 'demandeController/accepterDemande/$1';
$route['demande/refuser/(:any)'] = 'demandeController/refuserDemande/$1';
$route['demande/ajouter'] = 'demandeController/ajouter';
$route['test/store']= 'testController/store';

//menu
$route['menu/form']= 'MenuController/index';
$route['menu/ajouter']= 'MenuController/ajouter';
$route['menu/liste']= 'MenuController/listerMenu';
$route['menu/consulter']= 'MenuController/consulterMenu';
$route['menu/consulter/(:any)'] = 'MenuController/consulterMenu/$1';
$route['menu/modifier/(:any)'] = 'MenuController/consulterMenu/$1';

//club
$route['club/creer']= 'ClubController/creer';
$route['club/ajouter']= 'ClubController/insererClub';
$route['club/liste']= 'ClubController/index';
$route['club/consulter/(:any)'] = 'ClubController/consulter/$1';
$route['club/supprimer/(:any)'] = 'ClubController/supprimerClub/$1';
$route['club/modconst/(:any)'] = 'ClubController/consulter/$1';
$route['club/modifier/(:any)'] = 'ClubController/modifier/$1';

//enseignant
$route['espaceEnseignant'] = 'espaceEnseignant/index';
$route['listeEnseignants'] = 'EnseignantContr/index';
$route['listeEnseignant/ajouter'] = 'EnseignantContr/ajouter';
$route['enseignant/ajout'] = 'EnseignantContr/ajouterEnseignant';
$route['listeEnseignants/effacer/(:any)'] = 'EnseignantContr/effacer/$1';
$route['listeEnseignants/modifier/(:any)'] = 'EnseignantContr/modifier/$1';
$route['listeEnseignants/editer/(:any)'] ['POST']= 'EnseignantContr/editer/$1';
$route['listeEnseignants/compte/(:any)']= 'EnseignantContr/creer/$1';
//comptes
$route['listeComptes'] = 'compteContr/index';
$route['listeComptes/supprimer/(:any)'] = 'compteContr/supprimer/$1';
$route['listeComptes/modifier/(:any)'] = 'compteContr/modifier/$1';
$route['listeComptes/editer/(:any)'] ['POST']= 'compteContr/editer/$1';
$route['modifier'] = 'compteContr/edit';
$route['modifier/(:any)'] ['POST']= 'compteContr/update/$1';
//classe
$route['listeClasses'] = 'classeContr/index';
$route['listeClasses/ajouter'] = 'classeContr/ajouter';
$route['listeClasses/add'] = 'classeContr/add';
//matiere
$route['listeMatieres']= 'matiereContr';
$route['listeMatieres/ajouter']= 'matiereContr/ajouter';
$route['listeMatieres/add']= 'matiereContr/register';
$route['listeMatieres/effacer/(:any)']= 'matiereContr/delete/$1';
//emplois
$route['listeEmplois']= 'emploisContr/get';
$route['listeEmplois/consulter/(:any)']= 'emploisContr/consulter/$1';
$route['emplois'] = 'emploisContr';
$route['emplois/add/(:any)'] = 'emploisContr/btn/$1';
//$route['listeEmplois']= 'listeEnseigContr/creer/$1';
//$route['add']['POST'] = 'emploisContr/add';
//encaissement
$route['eleve/facture/(:any)'] = 'EncaissementController/afficherFacture/$1';
$route['facture/payer/(:any)/(:any)'] = 'EncaissementController/payerFacture/$1/$2';
$route['encaissement/liste'] = 'EncaissementController/listeEncaissements';

//notification 
$route['menu/notification/(:any)'] = 'MenuController/notifierMenu/$1';
//
$route['register']['GET'] = 'registerContr/index';
$route['register']['POST'] = 'registerContr/register';
//assiduit
$route['ficheAppel']='assiduiteContr/index';
// partie enseignant
$route['enseigZone'] = 'enseignantContr';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
