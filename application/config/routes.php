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
$route['login'] = 'loginContr';
$route['login'] = 'loginContr/login';
$route['admin']['GET']= 'adminPageContr/index';
$route['logout']= 'adminPageContr/logout';
$route['ajouterCompte'] = 'ajoutComContr/index';
$route['emplois(:num)'] = 'emploisContr/fetchClasse/$1';
$route['add']['POST'] = 'emploisContr/add';
$route['ajouterCompte/register'] = 'ajoutComContr/register';
$route['modifier'] = 'compteContr/edit';
$route['modifier/(:any)'] ['POST']= 'compteContr/update/$1';
$route['listeComptes'] = 'compteContr/index';
$route['listeComptes/supprimer/(:any)'] = 'compteContr/supprimer/$1';
$route['listeComptes/modifier/(:any)'] = 'compteContr/modifier/$1';
$route['listeComptes/editer/(:any)'] ['POST']= 'compteContr/editer/$1';
$route['listeMatieres']= 'matiereContr';
$route['listeMatieres/ajouter']= 'matiereContr/ajouter';
$route['listeMatieres/add']= 'matiereContr/register';
$route['register']['GET'] = 'registerContr/index';
$route['register']['POST'] = 'registerContr/register';
$route['enseignant'] = 'ajoutEnseigContr/index';
$route['enseignant/ajouter'] = 'ajoutEnseigContr/ajouter';
$route['listeEnseignants'] = 'listeEnseigContr/index';
$route['listeEnseignants/effacer/(:any)'] = 'listeEnseigContr/effacer/$1';
$route['listeEnseignants/modifier/(:any)'] = 'listeEnseigContr/modifier/$1';
$route['listeEnseignants/editer/(:any)'] ['POST']= 'listeEnseigContr/editer/$1';
$route['listeClasses'] = 'classeContr/index';
$route['listeClasses/ajouter'] = 'classeContr/ajouter';
$route['listeClasses/add'] = 'classeContr/add';
$route['emplois'] = 'emploisContr';
// partie enseignant
$route['enseigZone'] = 'enseignantContr';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
